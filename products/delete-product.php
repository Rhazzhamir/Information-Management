<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "Invalid Request";
  exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

include('../include/Connection.php');
$sql = "DELETE FROM Product WHERE Product_Id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$connect->close();
$stmt->close();

header("Location: ../Manage_product.php");