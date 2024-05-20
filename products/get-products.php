<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  echo "Inavlid Request";
  exit;
}

include('./include/Connection.php');
$query = "SELECT * FROM Product_With_CategoryName";
$stmt = $connect->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$connect->close();