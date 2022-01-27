<?php

namespace Infrastructure\Http\Service;

use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use RuntimeException;

class Req {
    public static ?Request $r = null;

    public static function header(string $name): string|array {
        return self::$r?->header($name) ?? throw new RuntimeException("No Header with name: $name");
    }

    public static function allHeaders(): array {
        return self::$r?->header() ?? throw new RuntimeException("No Request");
    }



    public static function method(): string {
        return self::$r?->method() ?? 'CLI';
    }

    public static function path(): string|null {
        return self::$r?->path();
    }

    public static function userAgent(): string|null {
        return self::$r?->userAgent();
    }

    public static function ip(): string|null {
        return self::$r?->ip();
    }

    public static function ipCountry(): string {
        return self::header('CF_IPCOUNTRY') ?? 'XX';
    }

    public static function isWriteRequest(): bool {
        return match (self::method()) {
            'GET', 'HEAD' => false,
            default => true
        };
    }

    public static function getAreaFromPath(): string {
        return explode('/', self::$r->path())[0];
    }

    // METHODS FOR GETTING ALL THE REQUEST DATA
    public static function allInput(): array {
        return self::$r?->all() ?? throw new RuntimeException('No Request');
    }

    public static function allJson(): array {
        $tmp = self::$r?->json()?->all();
        return empty($tmp) ? throw new RuntimeException('No JSON') : $tmp;
    }

    public static function content(): string {
        return self::$r?->getContent() ?? throw new RuntimeException('No Content');
    }


    public static function getString(string $name, bool $null_if_missing  = false): ?string {
        if (!self::$r->has($name)) {
            if ($null_if_missing) {
                return null;
            }
            throw new RuntimeException("No input field named: $name");
        }
        return self::$r->get($name);
    }

    public static function getInt(string $name, bool $null_if_missing  = false): ?int {
        if (!self::$r->has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $value = self::$r->get($name);
        if (!ctype_digit($value)) {
            throw new RuntimeException("Input field named: $name is not an integer, value: $value");
        }
        return (int)$value;
    }

    public static function getFloat(string $name, bool $null_if_missing  = false): ?float {
        if (!self::$r->has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $value = self::$r->get($name);
        if (!is_numeric($value)) {
            throw new RuntimeException("Input field named: $name is not a float, value: $value");
        }
        return (float)self::$r->get($name);
    }

    public static function getBool(string $name, bool $null_if_missing  = false): ?bool {
        if (!self::$r->has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        return match (self::$r->get($name)) {
            'true' => true,
            'false' => false,
            default => throw new RuntimeException("Invalid boolean value: " . self::$r->get($name))
        };
    }

    public static function getArray(string $name, bool $null_if_missing  = false): ?array {
        if (!self::$r->has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        return explode(',', self::$r->get($name));
    }

    public static function getJson(string $name, bool $null_if_missing  = false): ?array {
        if (!self::$r->has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        return json_decode(self::$r->get($name), false, 512, JSON_THROW_ON_ERROR);
    }

    public static function getDate(string $name, bool $null_if_missing  = false): ?CarbonImmutable {
        if (!self::$r->has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $input = explode('-', self::$r->get($name));
        if (count($input) !== 3 || !checkdate($input[1], $input[2], $input[0])) {
            throw new RuntimeException("Invalid date format: $name, must be YYYY-MM-DD");
        }
        return CarbonImmutable::createFromDate($input[0], $input[1], $input[2]);
    }

    public static function getDateTime(string $name, bool $null_if_missing  = false): ?CarbonImmutable {
        if (!self::$r->has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $input = explode(' ', self::$r->get($name));
        //TODO: finish this
        return self::$r->get($name);
    }
}
