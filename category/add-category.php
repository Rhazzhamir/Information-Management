<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "Inavlid Request: " . $_SERVER['REQUEST_METHOD'];
  exit;
}

$name = filter_input(INPUT_POST, "category_name", FILTER_SANITIZE_SPECIAL_CHARS);

include_once('../include/Connection.php');

$sql = "INSERT INTO category (category_name) VALUES (?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $name);
echo $stmt->execute();
$stmt->close();
$connect->close();
if (isset($_SERVER['HTTP_REFERER'])) {
  header("Location: " . $_SERVER['HTTP_REFERER']);
}