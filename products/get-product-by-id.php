<?php

function getProductById($id, $cart_id) {
  include('./include/Connection.php');
  $query = "SELECT p.*, cp.Quantity FROM Product p, Cart_product cp
  WHERE p.Product_Id = ? AND Cart_Id = ?";
  $stmt = $connect->prepare($query);
  $stmt->execute([$id, $cart_id]);
  $result = $stmt->get_result();
  $data = $result->fetch_assoc();
  $stmt->close();
  $connect->close();
  return $data;
}