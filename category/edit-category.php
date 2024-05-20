<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "Invalid Request";
  exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, "category_name", FILTER_SANITIZE_SPECIAL_CHARS);

include_once('../include/Connection.php');
$sql = "UPDATE Category SET category_name = ? WHERE Category_Id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("si", $name, $id);
$stmt->execute();
$connect->close();
$stmt->close();
header('Location: ../Manage_Category.php');