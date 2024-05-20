<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "Invalid Request";
  exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
try {
  include_once('../include/Connection.php');
  $sql = "CALL Force_Delete_Category(?)";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  header("Location: ../Manage_Category.php");
} catch (Exception $error) {
  echo $error;
} finally {
  $stmt->close();
  $connect->close();
}