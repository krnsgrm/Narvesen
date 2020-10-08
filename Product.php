<?php

class Product
{
    private string $name;
    private int $price;
    private int $amount;
    private int $id;

    public function __construct(int $id, string $name, int $price, int $amount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function reduceStock()
    {
        $this->amount = $this->getAmount() - 1;
    }
}