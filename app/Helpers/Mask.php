<?php

namespace App\Helpers;

class Mask
{
    /**
     * Format a value with a CPF mask
     * @param string $value Value to be formatted
     * @return string Formatted value.
     */
    public static function Cpf(string $value): string {
        $pattern = '/(\d{3})(\d{3})(\d{3})(\d{2})/';
        $replacement = '$1.$2.$3-$4';
        $value = preg_replace($pattern, $replacement, trim($value));

        return $value ?? '';
    }

    /**
     * Format a value with a RG mask
     * @param string $value Value to be formatted
     * @return string Formatted value.
     */
    public static function Rg(string $value): string {
        $pattern = '/(\d{2})(\d{3})(\d{3})(\w{1})/';
        $replacement = '$1.$2.$3-$4';
        $value = preg_replace($pattern, $replacement, trim($value));

        return $value ?? '';
    }
}