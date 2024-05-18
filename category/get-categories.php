<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  echo "Inavlid Request: " . $_SERVER['REQUEST_METHOD'];
  exit;
}


include('./include/Connection.php');

$sql = "SELECT * FROM category";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$connect->close();