<?php

if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
  echo "Invalid Request";
  exit;
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

include_once('../include/Connection.php');
$sql = "DELETE FROM Category WHERE Category_Id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$connect->close();
$stmt->close();