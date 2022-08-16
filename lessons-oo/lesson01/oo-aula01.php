<?php

require('Product.php');

// Setting product 1 using normal method
$prod1 = new Product(null, null, null, null);
$prod1->setPrice(10);
$prod1->setName("Macarrão instantaneo");
//$prod1->name = "Macarrão instantaneo";

echo "Os valores prod1 de são: <br> Nome: ";
$prod1->getName();
echo "<br> Preço: ";
$prod1->getPrice();
echo "<br> Propriedades: ". $prod1->id . ", " . $prod1->name . " , " . $prod1->image . " , " . $prod1->price;
echo "<br><br>";

// Setting product 2 using construct method
$prod2 = new Product(null, "   Bolacha Trakinas   com TV 23' de brinde          ", null, 20);

echo "<br> Os valores prod2 de são: <br> Nome: ";
$prod2->getName();
echo "<br> Preço: ";
$prod2->getPrice();
echo "<br><br>";

?>