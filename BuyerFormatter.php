<?php
require_once 'Formatter.php';

class BuyerFormatter extends Formatter
{
    public static function name(string $name): string
    {
        return self::withColon($name);
    }

    public static function money(int $money): string
    {
        return 'Your money: ' . self::centsInEUR($money);
    }

    public static function format(Buyer $buyer): string
    {
        return self::name($buyer->getName()) . self::money($buyer->getMoney()) . PHP_EOL;
    }

    public static function boughtProduct(Product $product): string
    {
        return ProductFormatter::name($product->getName()) . ProductFormatter::price($product->getPrice()) . PHP_EOL;
    }
}