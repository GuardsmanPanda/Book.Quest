<?php

namespace Infrastructure\Database\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Ramsey\Collection\Set;
use RuntimeException;

class GenerateModels extends Command {
    protected $signature = 'database:generate';
    protected $description = 'Generate Database Models';

    private string $default_namespace = "App\\Models";
    private string $default_output_dir;

    public function __construct() {
        parent::__construct();
        $this->default_output_dir = base_path('app/Models/');
    }

    public function handle(): void {
        $models = config('database.model_generator');

        $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_type = 'BASE TABLE'");

        // Load each table.
        foreach ($tables as $table) {
            if (!isset($models[$table->table_name])) {
                continue; //skip tables not in the config
            }

            $models[$table->table_name] ??= [];

            // First set the class name in case it is not supplied in the config.
            $models[$table->table_name]['class'] ??= $this->snakeCaseToPascalCase($table->table_name);

            // Then set the output directory if it is not supplied in the config.
            if (isset($models[$table->table_name]['location']))       {
                $models[$table->table_name]['namespace'] = str_replace('/', '\\', ucfirst($models[$table->table_name]['location']));
                $models[$table->table_name]['location'] = base_path(trim($models[$table->table_name]['location'], '/') . '/');
            } else {
                $models[$table->table_name]['namespace'] = $this->default_namespace;
                $models[$table->table_name]['location'] = $this->default_output_dir;
            }

            $cc = [];
            $cols = DB::select("SELECT * FROM information_schema.columns WHERE table_name = ?", [$table->table_name]);
            foreach ($cols as $col) {
                $cc[$col->column_name] = [$col->data_type, $col->column_default];
            }
            $models[$table->table_name]['col'] = $cc;

            // Fill header with default values.
            $headers = new Set('string');
            $headers->add('use Illuminate\Database\Query\Builder;');
            $headers->add('use Illuminate\Database\Eloquent\Model;');
            $headers->add('use Closure;');
            if (array_key_exists('deleted_at', $cc)) {
                $headers->add('use Illuminate\Database\Eloquent\SoftDeletes;');
            }
            if (array_key_exists('traits', $models[$table->table_name])) {
                foreach ($models[$table->table_name]['traits'] as $trait) {
                    $headers->add("use $trait;");
                }
            }
            $models[$table->table_name]['headers'] = $headers;
        }

        $constraints = DB::select("
            SELECT tc.table_name, tc.constraint_name, tc.constraint_type, kcu.column_name, ccu.table_name as foreign_table, ccu.column_name as foreign_key
            FROM information_schema.table_constraints tc
            JOIN information_schema.key_column_usage kcu ON kcu.constraint_name = tc.constraint_name AND tc.table_schema = kcu.table_schema
            JOIN information_schema.constraint_column_usage AS ccu ON ccu.constraint_name = tc.constraint_name AND ccu.table_schema = tc.table_schema
        ");
        foreach ($constraints as $constraint) {
            if (!isset($models[$constraint->table_name])) {
                continue; //skip tables not in the config
            }
            if ($constraint->constraint_type === 'PRIMARY KEY') {
                $models[$constraint->table_name]['key'] = $constraint->column_name;
            } else if ($constraint->constraint_type === 'FOREIGN KEY') {
                if (!isset($models[$constraint->table_name])) {
                    continue; //skip legacy tables
                }
                $models[$constraint->table_name]['col'][$constraint->column_name][] = $constraint->foreign_table;
                $models[$constraint->table_name]['col'][$constraint->column_name][] = $constraint->foreign_key;
            }
        }

        // Generate the models.
        foreach ($models as $table_name => $model) {
            $this->info("Generating model for table '$table_name'");
            $headers = $model['headers'];
            $class_name = $model['class'];
            $casts = [];
            $cols = [];
            foreach ($model['col'] as $col_name => $col_val) {
                $headers->add($this->postgresTypeToPhpHeader($col_val[0]));
                $cols[] = [$col_name, $this->postgresTypeToPhpType($col_val[0]), $this->postgresTypeSortOrder($col_val[0])];
                $casts[] = $this->postgresTypeToEloquentCast($col_name, $col_val[0]);
                if (count($col_val) > 2) {
                    if (!isset($models[$col_val[2]])) {
                        continue; //skip tables without mapping
                    }
                    $this->info($model['class'] . ' -> foreign key to ' . $col_val[2] . ' -> ' . $col_val[3]);
                    if ($col_val[2] !== $table_name) {
                        $headers->add('use ' . $models[$col_val[2]]['namespace'].'\\'. $models[$col_val[2]]['class'] .';');
                    }
                    $cols[] = [preg_replace('/_id$/', '', $col_name), $models[$col_val[2]]['class'], 1000];
                    $headers->add('use Illuminate\Database\Eloquent\Relations\BelongsTo;');
                }
            }
            if ($model['col'][$model['key']][0] === 'uuid') {
                $headers->add('use Illuminate\Support\Str;');
            }
            $casts = array_filter($casts);
            sort($casts);
            $key_type = $this->postgresTypeToPhpType($model['col'][$model['key']][0]);
            $content = $this->insertTopOfClass($model['namespace'], $class_name, $headers->toArray(), $key_type);

            // Sort and insert the variable hints.
            usort($cols, static function ($a, $b) {
                if ($a[2] === $b[2]) {
                    return strlen($a[0]) - strlen($b[0]) === 0 ? strcmp($a[0], $b[0]) : strlen($a[0]) - strlen($b[0]);
                }
                return $a[2] - $b[2];
            });
            foreach ($cols as $col) {
                $content .= " * @property " . $col[1] . " $" . $col[0] . PHP_EOL;
            }

            $content .= " *" . PHP_EOL;
            $content .= " * AUTO GENERATED FILE DO NOT MODIFY" . PHP_EOL;
            $content .= " */" . PHP_EOL;

            $content .= "class " . $model['class'] . " extends Model {" . PHP_EOL;

            // Insert the traits.
            $wrote_trait = false;
            if (array_key_exists('traits', $model)) {
                foreach ($model['traits'] as $trait) {
                    $tmp = explode('\\',$trait);
                    $trait = array_pop($tmp);
                    $content .= "    use $trait;" . PHP_EOL;
                    $wrote_trait = true;
                }
            }
            if (array_key_exists('deleted_at', $model['col'])) {
                $content .= "    use SoftDeletes;" . PHP_EOL;
                $wrote_trait = true;
            }
            $content .= $wrote_trait ? PHP_EOL : '';
            $content .= "    protected \$table = '$table_name';" . PHP_EOL;
            $content .= "    protected \$dateFormat = 'Y-m-d H:i:sO';" . PHP_EOL;

            if ($key_type !== 'int') {
                $content .= "    protected \$keyType = '$key_type';" . PHP_EOL;
            }
            if ($model['key'] !== 'id') {
                $content .= "    protected \$primaryKey = '" . $model['key'] . "';" . PHP_EOL;
            }
            if ($model['key'] !== 'id' || $key_type !== 'int') {
                $content .= "    public \$incrementing = false;" . PHP_EOL;
            }

            if (!array_key_exists('updated_at', $model['col'])) {
                $content .= "    public \$timestamps = false;" . PHP_EOL;
            }
            $content .= PHP_EOL;

            if (count($casts) > 0) {
                $content .= "    /**" . PHP_EOL;
                $content .= "     * @var array<string, string>" . PHP_EOL;
                $content .= "     */" . PHP_EOL;
                $content .= "    protected \$casts = [" . PHP_EOL;
                foreach ($casts as $cast) {
                    $content .= "        '" . $cast[0] . "' => " . $cast[1] . "," . PHP_EOL;
                }
                $content .= "    ];" . PHP_EOL;
                $content .= PHP_EOL;
            }
            if ($model['col'][$model['key']][0] === 'uuid') {
                $content .= "    public static function boot(): void {" . PHP_EOL;
                $content .= "        parent::boot();" . PHP_EOL;
                $content .= "        static::creating(static function (self \$model) {" . PHP_EOL;
                $content .= "            if (\$model->" . $model['key'] . " === null) {" . PHP_EOL;
                $content .= "                \$model->" . $model['key'] . " = Str::uuid()->toString();" . PHP_EOL;
                $content .= "            }" . PHP_EOL;
                $content .= "        });" . PHP_EOL;
                $content .= "    }" . PHP_EOL;
                $content .= PHP_EOL;
            }

            $content .= "    protected \$guarded = ['id','updated_at','created_at','deleted_at'];" . PHP_EOL;

            // create relations
            $relation_created = false;
            ksort($model['col']);
            foreach ($model['col'] as $col_name => $col_val) {
                if (count($col_val) <= 2 || !isset($models[$col_val[2]])) {
                    continue; //skip tables without mapping
                }
                if (!$relation_created) {
                    $relation_created = true;
                    $content .= PHP_EOL;
                }

                $rel_method_name = preg_replace('/_id$/', '', $col_name);
                $content .= '    public function ' . lcfirst($this->snakeCaseToPascalCase($rel_method_name)) . '(): BelongsTo {' . PHP_EOL;
                $content .= '        return $this->belongsTo(' . $models[$col_val[2]]['class'] ." ::class, '" . $col_name . "', '" . $col_val[3] . "');" . PHP_EOL;
                $content .= '    }' . PHP_EOL;
            }

            $content .= "}" . PHP_EOL;
            file_put_contents($model['location'] . $model['class'] . '.php', $content);
        }
    }


    private function insertTopOfClass(string $namespace, string $class_name, array $headers, string $primary_key_type = 'int'): string {
        sort($headers);
        $content = "<?php" . PHP_EOL . PHP_EOL . 'namespace ' . $namespace . ';' . PHP_EOL . PHP_EOL;
        foreach (array_unique(array_map(static function ($ele) { return trim($ele); }, $headers)) as $header) {
            if ($header === '') {
                continue;
            }
            $content .= $header . PHP_EOL;
        }
        $content .= PHP_EOL;

        $content .= "/**" . PHP_EOL;
        $content .= " * AUTO GENERATED FILE DO NOT MODIFY" . PHP_EOL;
        $content .= " *" . PHP_EOL;

        $content .= " * @method static $class_name find($primary_key_type \$id, array \$columns = ['*'])" . PHP_EOL;
        $content .= " * @method static $class_name findOrFail($primary_key_type \$id, array \$columns = ['*'])" . PHP_EOL;
        $content .= " * @method static $class_name findOrNew($primary_key_type \$id, array \$columns = ['*'])" . PHP_EOL;
        $content .= " * @method static $class_name sole(array \$columns = ['*'])" . PHP_EOL;
        $content .= " * @method static $class_name first(array \$columns = ['*'])" . PHP_EOL;
        $content .= " * @method static $class_name firstOrFail(array \$columns = ['*'])" . PHP_EOL;
        $content .= " * @method static $class_name firstOrCreate(array \$filter, array \$values)" . PHP_EOL;
        $content .= " * @method static $class_name firstOrNew(array \$filter, array \$values)" . PHP_EOL;
        $content .= " * @method static $class_name|null firstWhere(string \$column, string \$operator = null, string \$value = null, string \$boolean = 'and')" . PHP_EOL;
        $content .= " * @method static Builder|$class_name lockForUpdate()" . PHP_EOL;
        $content .= " * @method static Builder|$class_name select(array \$columns = ['*'])" . PHP_EOL;
        $content .= " * @method static Builder|$class_name with(array  \$relations)" . PHP_EOL;
        $content .= " * @method static Builder|$class_name leftJoin(string \$table, string \$first, string \$operator = null, string \$second = null)" . PHP_EOL;
        $content .= " * @method static Builder|$class_name where(string \$column, string \$operator = null, string \$value = null, string \$boolean = 'and')" . PHP_EOL;
        $content .= " * @method static Builder|$class_name whereIn(string \$column, array \$values, string \$boolean = 'and', bool \$not = false)" . PHP_EOL;
        $content .= " * @method static Builder|$class_name whereHas(string \$relation, Closure \$callback, string \$operator = '>=', int \$count = 1)" . PHP_EOL;
        $content .= " * @method static Builder|$class_name whereNull(string|array \$columns, string \$boolean = 'and')" . PHP_EOL;
        $content .= " * @method static Builder|$class_name whereNotNull(string|array \$columns, string \$boolean = 'and')" . PHP_EOL;
        $content .= " * @method static Builder|$class_name orderBy(string \$column, string \$direction = 'asc')" . PHP_EOL;
        $content .= " *" . PHP_EOL;
        return $content;
    }
    //public function leftJoin($table, $first, $operator = null, $second = null)

    private function snakeCaseToPascalCase(string $snake_case): string {
        return str_replace('_', '', ucwords($snake_case, '_'));
    }

    private function postgresTypeToPhpType(string $postgres_type): string {
        return match ($postgres_type) {
            'date', 'timestamp with time zone' => 'CarbonInterface',
            'text', 'inet', 'cidr', 'uuid' => 'string',
            'integer', 'bigint', 'smallint' => 'int',
            'double precision' => 'float',
            'jsonb' => 'ArrayObject',
            'boolean' => 'bool',
            default => throw new RuntimeException("Unknown type: $postgres_type")
        };
    }

    private function postgresTypeSortOrder(string $postgres_type): int {
        return match ($postgres_type) {
            'integer', 'bigint', 'smallint' => 0,
            'timestamp with time zone' => 10,
            'date', => 9,
            'text', 'inet', 'cidr', 'uuid' => 3,
            'double precision' => 2,
            'jsonb' => 5,
            'boolean' => 1,
            default => throw new RuntimeException("Unknown type: $postgres_type")
        };
    }

    private function postgresTypeToPhpHeader(string $postgres_type): string {
        return match ($postgres_type) {
            'jsonb' => 'use Illuminate\Database\Eloquent\Casts\ArrayObject;'.PHP_EOL.'use Illuminate\Database\Eloquent\Casts\AsArrayObject;',
            'text', 'inet', 'cidr', 'uuid', 'integer', 'bigint', 'smallint', 'double precision', 'boolean' => '',
            'date', 'timestamp with time zone' => 'use Carbon\\CarbonInterface;',
            default => throw new RuntimeException("Unknown type: $postgres_type")
        };
    }

    private function postgresTypeToEloquentCast(string $name, string $postgres_type): ?array {
        if (str_starts_with($name, 'encrypted_')) {
            return [$name, "'encrypted'"];
        }
        return match ($postgres_type) {
            'text', 'inet', 'cidr', 'uuid', 'integer', 'bigint', 'smallint', 'double precision', 'boolean' => null,
            'timestamp with time zone' => [$name, "'immutable_datetime'"],
            'jsonb' => [$name, "AsArrayObject::class"],
            'date' => [$name, "'immutable_date'"],
            default => throw new RuntimeException("Unknown type: $postgres_type")
        };
    }
}
