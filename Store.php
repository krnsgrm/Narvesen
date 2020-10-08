<?php
require_once 'ProductFormatter.php';

class Store
{
    private string $name;
    private array $products = [];

    public function __construct(string $name, array $products = [])
    {
        $this->name = $name;

        $this->setProducts($products);
    }

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): void
    {
        foreach ($products as $product) {
            $this->add($product);
        }
    }

    public function sellProduct(int $id, Buyer $buyer): ?Product
    {
        foreach ($this->getProducts() as $product) {
            if ($product->getId() == $id) {
                if ($buyer->canBuy($product)) {
                    $buyer->buy($product);
                    return $product;
                }
                return null;
            };
        }
        return null;
    }

    public function attemptToBuy(int $id, Buyer $buyer): bool
    {
        $foundProduct = $this->sellProduct($id, $buyer);

        if ($foundProduct != null) {
            echo ProductFormatter::bought($foundProduct);
            return true;
        } else {
            echo ProductFormatter::cannotBuy($id);
            return false;
        }
    }

    public function printProducts()
    {
        echo 'Product in the store: ' . PHP_EOL;
        foreach ($this->getProducts() as $product) {
            echo ProductFormatter::format($product);
        }
    }
}