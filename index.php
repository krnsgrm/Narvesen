<?php

require_once 'Product.php';
require_once 'Store.php';
require_once 'Buyer.php';
require_once 'ProductFormatter.php';
require_once 'Formatter.php';

$narvesen = new Store('Narvesen');

$narvesen->add(new Product(1, 'Apple', 50, 10));
$narvesen->add(new Product(2, 'Toast', 200, 10));
$narvesen->add(new Product(3, 'Avocado', 250, 10));
$narvesen->add(new Product(4, 'Lemon pepper', 50, 50));

$buyer = new Buyer('Egons', 300);
echo 'Hello, welcome to our shop!' . PHP_EOL;
sleep(1);
$buyer->printInfo();
sleep(1);
$narvesen->printProducts();

while ($inputID = readline("Choose the product you want to buy or type \"print\" to see what you have bought: ")) {
    if ($inputID == 'print') {
        $buyer->printProducts();
    } elseif ($narvesen->attemptToBuy($inputID, $buyer)) {
        usleep(500000);
        echo PHP_EOL;
        $buyer->printInfo();
        sleep(1);
    } else {
        exit;
    }
    sleep(1);
    echo PHP_EOL;
    $narvesen->printProducts();
}