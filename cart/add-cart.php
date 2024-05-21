<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "Inavlid Request";
  exit;
}

$product_id = filter_input(INPUT_POST, "product_id", FILTER_VALIDATE_INT);
$cart_id = filter_input(INPUT_POST, "cart_id", FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);

include_once('../include/Connection.php');

$sql = "INSERT INTO Cart_Product (Cart_Id, Product_Id, Quantity)
          VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE
          Quantity = Quantity + VALUES(Quantity)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("iii", $cart_id, $product_id, $quantity);
$stmt->execute();
$stmt->close();
$connect->close();
