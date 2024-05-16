<?php

include_once './include/Connection.php';


$conn = mysqli_connect($con, $username, $password, $dbname);
$sql = "select product_img from manage_product limit 1 offset 2";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("Content-Type: image/png");
$imgData = $stmt->get_result()->fetch_assoc()['product_img'];
echo $imgData;
$stmt->close();
$conn->close();