<?php

abstract class Formatter
{
    protected static function withColon(string $name): string
    {
        return $name . ': ';
    }

    protected static function centsInEUR(int $price): string
    {
        return '€' . number_format($price / 100, 2);
    }
}