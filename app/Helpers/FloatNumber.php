<?php

namespace App\Helpers;

class FloatNumber
{

    public static function parseFloat(string $value): float|null
    {
        if (empty($value)) return null;

        if (strpos($value, ',')) {
            $number_without_thousand_dots = preg_replace('/\./', '', $value);

            $operable_number = preg_replace('/,/', '.', $number_without_thousand_dots);

            return floatval($operable_number);
        }
        return floatval($value);
    }
}
