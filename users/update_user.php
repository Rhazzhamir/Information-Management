<?php

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  echo "Invalid Request";
}
include_once '../include/Connection.php';

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

$SellerID = filter_var($data["Seller_Id"], FILTER_VALIDATE_INT);
$fname = filter_var($data["First_Name"], FILTER_SANITIZE_SPECIAL_CHARS);
$lname = filter_var($data["Last_Name"], FILTER_SANITIZE_SPECIAL_CHARS);
$contactNo = filter_var($data["ContactNumber"], FILTER_SANITIZE_SPECIAL_CHARS);
$address = filter_var($data["Address"], FILTER_SANITIZE_SPECIAL_CHARS);


$connect = mysqli_connect($con, $username, $password, $dbname);
$sql = "UPDATE Seller SET
First_Name = ?, LAST_NAME = ?,
ContactNumber = ?, Address = ?
WHERE Seller_Id = ?";

$stmt = $connect->prepare($sql);
$stmt->bind_param("ssssi", $fname, $lname, $contactNo, $address, $SellerID);
$stmt->execute();
$stmt->close();
$connect->close();
