<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "Inavlid Request";
  exit;
}

$category_id = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);
$product_name = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);
$product_price = filter_input(INPUT_POST, "product_price", FILTER_VALIDATE_FLOAT);
$product_stock = filter_input(INPUT_POST, "product_stock", FILTER_VALIDATE_INT);


if (empty($category_id) || empty($product_name) || empty($product_price) || empty($product_stock)) {
  echo "Invalid Input";
  exit;
}


$product_img = $_FILES['product_img'];
$maxFileSize = 16 * 1024 * 1024;
$allowedExtension = ['jpeg', 'jpg', 'png'];
$product_img_size = $product_img['size'];
$product_img_extention = strtolower(pathinfo($product_img['name'], PATHINFO_EXTENSION));


if ($product_img_size >= $maxFileSize || 
  !in_array($product_img_extention, $allowedExtension)) {
    echo "Invalid Image";
    exit;
}

include_once('../include/Connection.php');


$query = "INSERT INTO Product (Category_Id, Product_Name, Product_Price, Product_img, Product_Stock)
VALUES (?, ?, ?, ?, ?)";
$stmt = $connect->prepare($query);
$stmt->bind_param("isdbi", $category_id, $product_name, $product_price, $product_img, $product_stock);
$stmt->execute();
$stmt->close();
$connect->close();
header("Location: ../Manage_product.php.php");