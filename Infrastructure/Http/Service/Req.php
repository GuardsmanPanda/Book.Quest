<?php

namespace Infrastructure\Http\Service;

use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Infrastructure\Integrity\Service\ValidateAndParseValue;
use RuntimeException;

class Req {
    public static ?Request $r = null;

    public static function hasHeader(string $name): bool {
        return self::$r?->hasHeader($name) ?? false;
    }

    public static function header(string $name): string {
        $value = self::$r?->header($name);
        if (!is_string($value)) {
            throw new RuntimeException("Header '$name' is missing or not a string");
        }
        return $value;
    }

    /**
     * @return array<string, array<string>>
     */
    public static function allHeaders(): array {
        $value = self::$r?->header();
        if (!is_array($value)) {
            throw new RuntimeException('Headers not found');
        }
        return  $value;
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
        return self::hasHeader('CF_IPCOUNTRY') ? self::header('CF_IPCOUNTRY') : 'XX';
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


    public static function getString(string $name): ?string {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseString($val);
    }

    public static function getInt(string $name): ?int {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseInt($val);
    }

    public static function getFloat(string $name): ?float {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseFloat($val);
    }

    public static function getBool(string $name): ?bool {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseBool($val);
    }

    /**
     * @param string $name
     * @return array<string, mixed>|null
     */
    public static function getArray(string $name): ?array {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseArray($val);
    }

    /**
     * @param string $name
     * @return array<string, mixed>|null
     */
    public static function getJson(string $name): ?array {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseJson($val);
    }

    public static function getDate(string $name): ?CarbonImmutable {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseDate($val);
    }

    public static function getDateTime(string $name): ?CarbonImmutable {
        if (!self::has($name)) {
            throw new RuntimeException("No input field named: $name");
        }
        $val = self::$r->get($name);
        return $val === null ? null : ValidateAndParseValue::parseDate($val);
    }
}