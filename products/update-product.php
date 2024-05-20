<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid Request";
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
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
$product_img_extension = strtolower(pathinfo($product_img['name'], PATHINFO_EXTENSION));

if ($product_img_size >= $maxFileSize || !in_array($product_img_extension, $allowedExtension)) {
    $product_img_data = null;
    echo "Upload error";
    exit;
} else {
    $product_img_data = file_get_contents($product_img['tmp_name']);
}

include('../include/Connection.php');

$sql = "CALL Edit_Product(?, ?, ?, ?, ?, ?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("iisdsi", $id, $category_id, $product_name, $product_price, $product_img_data, $product_stock);

if ($stmt->execute()) {
    // Product updated successfully
    header("Location: ../Manage_product.php");
} else {
    // Failed to update the product
    echo "Error: " . $stmt->error;
}

$stmt->close();
$connect->close();