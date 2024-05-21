<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo 'Invalid Request';
  exit;
}


$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($email) || empty($password)) {
  $_SESSION['error'] = "Invalid Email and Password";
  header("Location: .");
  exit;
}


try {
  include('../include/Connection.php');
  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

  $sql = "SELECT Customer.*, Cart_Id From Customer, Cart WHERE Cart.Customer_Id = Customer.Customer_Id and EMAIL = ?";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows <= 0) {
    $_SESSION['error'] = "Invalid Email and Password";
    header("Location: .");
  } else {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['Password'])) {
      $_SESSION['id'] = $user['Customer_Id'];
      $_SESSION['name'] = $user['Name'];
      $_SESSION['address'] = $user['Address'];
      $_SESSION['contactno'] = $user['ContactNo'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['cart_id'] = $user['Cart_Id'];
      header("Location: ../");
    } else {
      $_SESSION['error'] = "Invalid Email and Password";
      header("Location: .");
    }
  }
} catch (Exception $e) {
  echo $e;
} finally {
  $stmt->close();
  $connect->close();
}
