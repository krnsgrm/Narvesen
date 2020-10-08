<?php
require_once 'Formatter.php';

class ProductFormatter extends Formatter
{
    public static function id(int $id): string
    {
        return $id . '. ';
    }

    public static function name(string $name): string
    {
        return self::withColon($name);
    }

    public static function price(int $price): string
    {
        return self::centsInEUR($price);
    }

    public static function amount(int $amount): string
    {
        return $amount . 'x';
    }

    public static function bought(Product $product): string
    {
        return 'You have bought this product: ' .
            self::id($product->getId()) .
            self::name($product->getName()) .
            self::price($product->getPrice()) . PHP_EOL;
    }

    public static function format(Product $product): string
    {
        return self::id($product->getId()) .
            self::name($product->getName()) .
            self::price($product->getPrice()) . ", " .
            self::amount($product->getAmount()) . PHP_EOL;
    }

    public static function cannotBuy(): string
    {
        return 'You cannot buy this product, sorry' . PHP_EOL;
    }
}
