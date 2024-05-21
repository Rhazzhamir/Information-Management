<?php

include_once '../include/Connection.php';

$SellerID = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$connect = mysqli_connect($con, $username, $password, $dbname);
$sql = "DELETE FROM Seller WHERE Seller_Id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $SellerID);
$stmt->execute();
$stmt->close();
$connect->close();

header("Location: ../Register_User.php");
