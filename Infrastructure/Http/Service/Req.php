<?php

namespace Infrastructure\Http\Service;

use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use JsonException;
use RuntimeException;

class Req {
    public static ?Request $r = null;

    public static function header(string $name): string {
        return self::$r?->header($name) ?? throw new RuntimeException("No Header with name: $name");
    }

    /**
     * @return array<string, array<string>>
     */
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
        return  self::$r?->header('CF_IPCOUNTRY') ?? 'XX';
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

    /**
     * @return array<string, string>
     */
    public static function allInput(): array {
        return self::$r?->all() ?? throw new RuntimeException('No Request');
    }

    /**
     * @return array<string, mixed>
     */
    public static function allJson(): array {
        $tmp = self::$r?->json()?->all();
        return empty($tmp) ? throw new RuntimeException('No JSON') : $tmp;
    }

    public static function content(): string {
        return self::$r?->getContent() ?? throw new RuntimeException('No Content');
    }

    public static function has(string $key): bool {
        return self::$r?->has($key) ?? false;
    }


    public static function getString(string $name, bool $null_if_missing  = false): ?string {
        if (!self::has($name)) {
            return $null_if_missing ? null :  throw new RuntimeException("No input field named: $name");
        }
        return self::$r->get($name);
    }

    public static function getInt(string $name, bool $null_if_missing  = false): ?int {
        if (!self::has($name)) {
            return $null_if_missing ? null :  throw new RuntimeException("No input field named: $name");
        }
        $value = self::$r->get($name);
        if (!ctype_digit($value)) {
            throw new RuntimeException("Input field named: $name is not an integer, value: $value");
        }
        return (int)$value;
    }

    public static function getFloat(string $name, bool $null_if_missing  = false): ?float {
        if (!self::has($name)) {
            return $null_if_missing ? null :  throw new RuntimeException("No input field named: $name");
        }
        $value = self::$r->get($name);
        if (!is_numeric($value)) {
            throw new RuntimeException("Input field named: $name is not a float, value: $value");
        }
        return (float)self::$r->get($name);
    }

    public static function getBool(string $name, bool $null_if_missing  = false): ?bool {
        if (!self::has($name)) {
            return $null_if_missing ? null :  throw new RuntimeException("No input field named: $name");
        }
        return match (self::$r->get($name)) {
            'true', true => true,
            'false', false => false,
            default => throw new RuntimeException("Invalid boolean value: " . self::$r->get($name))
        };
    }

    /**
     * @param string $name
     * @return string[]
     */
    public static function getArray(string $name): array {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        return explode(',', self::$r->get($name));
    }

    /**
     * @param string $name
     * @param bool $null_if_missing
     * @return array<string, mixed>|null
     * @throws JsonException
     */
    public static function getJson(string $name, bool $null_if_missing  = false): ?array {
        if (!self::has($name)) {
            return $null_if_missing ? null :  throw new RuntimeException("No input field named: $name");
        }
        return json_decode(self::$r->get($name), false, 512, JSON_THROW_ON_ERROR);
    }

    public static function getDate(string $name, bool $null_if_missing  = false): ?CarbonImmutable {
        $text = self::getString(name: $name, null_if_missing: $null_if_missing);
        if ($text === null) {
            return null;
        }
        $arr = explode('-', $text);
        if (count($arr) !== 3 || strlen($arr[0]) !== 4 || strlen($arr[1]) !== 2 || strlen($arr[2]) !== 2) {
            throw new RuntimeException("Invalid date format: $text, must be YYYY-MM-DD");
        }
        $year = (int)$arr[0];
        $month = (int)$arr[1];
        $day = (int)$arr[2];
        if (!checkdate(month: $month, day: $day, year: $year)) {
            throw new RuntimeException("Invalid date: $text");
        }
        return CarbonImmutable::createFromDate(year: $year, month: $month, day: $day);
    }

    public static function getDateTime(string $name, bool $null_if_missing  = false): ?CarbonImmutable {
        $text = self::getString(name: $name, null_if_missing: $null_if_missing);
        if ($text === null) {
            return null;
        }
        //TODO: finish this
        return self::$r->get($name);
    }
}
