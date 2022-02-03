<?php

namespace Infrastructure\Integrity\Service;

use Carbon\CarbonImmutable;
use InvalidArgumentException;

class ValidateAndParseValue {
    public static function parseInt(mixed $value): int {
        if (is_int($value) ||$value(is_string($value) && ctype_digit($value))) {
            return (int) $value;
        }
        throw new InvalidArgumentException("$value is not an integer, type: " . gettype($value));
    }

    public static function parseFloat(mixed $value): float {
        if (is_float($value) || (is_string($value) && is_numeric($value))) {
            return (float) $value;
        }
        throw new InvalidArgumentException("$value is not a float, type: " . gettype($value));
    }

    public static function parseString(mixed $value): string {
        if (is_string($value)) {
            return $value;
        }
        throw new InvalidArgumentException("$value is not a string, type: " . gettype($value));
    }

    public static function parseBool(mixed $value): bool {
        return match ($value) {
            'true', true => true,
            'false', false => false,
            default => throw new InvalidArgumentException("$value is not a float, type: " . gettype($value)),
        };
    }

    public static function parseDate(mixed $value): CarbonImmutable {
        if ($value instanceof CarbonImmutable) {
            return $value;
        }
        if (!is_string($value)) {
            throw new InvalidArgumentException("$value is not a string, type: " . gettype($value));
        }
        $arr = explode('-', $value);
        if (count($arr) !== 3 || strlen($arr[0]) !== 4 || strlen($arr[1]) !== 2 || strlen($arr[2]) !== 2) {
            throw new InvalidArgumentException("Invalid date format: $value, must be YYYY-MM-DD");
        }
        $year = (int)$arr[0];
        $month = (int)$arr[1];
        $day = (int)$arr[2];
        if (!checkdate(month: $month, day: $day, year: $year)) {
            throw new InvalidArgumentException("Invalid date: $value");
        }
        return CarbonImmutable::createFromDate(year: $year, month: $month, day: $day);

    }
}