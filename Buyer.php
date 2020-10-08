<?php
require_once 'BuyerFormatter.php';

class Buyer
{
    private string $name;
    private string $money;
    private array $boughtProducts = [];

    public function __construct(string $name, string $money)
    {
        $this->name = $name;
        $this->money = $money;
    }

    public function buy(Product $product): void
    {
        $product->reduceStock();
        $this->money = ($this->money - $product->getPrice());
        $this->boughtProducts[] = $product;
    }

    public function canBuy(Product $product): bool
    {
        if ($this->money >= $product->getPrice()) {
            return true;
        }
        return false;
    }

    public function printInfo()
    {
        echo BuyerFormatter::format($this);
    }

    public function printProducts()
    {
        echo 'Bought products: ' . PHP_EOL;
        foreach ($this->getBoughtProducts() as $product) {
            echo BuyerFormatter::boughtProduct($product);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMoney(): string
    {
        return $this->money;
    }

    public function getBoughtProducts(): array
    {
        return $this->boughtProducts;
    }
}