<?php

include_once './include/Connection.php';

$category = 1;
$product_name = "T-shirt";
$product_price = 100;
$product_img = file_get_contents('./img_logo/Logo.png');


$conn = mysqli_connect($con, $username, $password, $dbname);
$imageData = $conn->real_escape_string($product_img);
$sql = "INSERT INTO manage_product (Category_ID, Product_Name, Product_price, Product_Img)
VALUES (?, ?, ?, '$imageData');";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $category, $product_name, $product_price);
$stmt->execute();
$stmt->close();
$conn->close();