<?php


function getProductsByCategory($id) {
  include('./include/Connection.php');
  $query = "SELECT * FROM Product_With_CategoryName WHERE Category_Id = ?";
  $stmt = $connect->prepare($query);
  $stmt->execute([$id]);
  $result = $stmt->get_result();
  $data = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  $connect->close();
  return $data;
}