<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function convertFloatToInt(float $value): int
    {
        $multiplier = 10 ** 6;
        return (int)round($value * $multiplier);
    }

    public static function convertIntToFloat(int $value): float
    {
        $divider = 10 ** 6;
        return $value / $divider;
    }

    public static function convertIntToFloatRounded(int $value): float
    {
        $float = self::convertIntToFloat($value);
        return round($float, 2);
    }

    public static function displayPrice(int $value): string
    {
        $float = self::convertIntToFloatRounded($value);
        return $float . '€';
    }

    public static function displayOnlyPrice(int $value): string
    {
        $float = self::convertIntToFloatRounded($value);
        return $float;
    }
}
