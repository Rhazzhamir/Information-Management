<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  echo "Inavlid Request: " . $_SERVER['REQUEST_METHOD'];
  exit;
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

include('./include/Connection.php');

$sql = "SELECT * FROM category WHERE id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$connect->close();