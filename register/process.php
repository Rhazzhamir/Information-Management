<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "Invalid Request";
  header($_SERVER['HTTP_REFERER']);
  exit;
}


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_EMAIL);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
$contactno = filter_input(INPUT_POST, 'contactno', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if (empty($name) || empty($address) || empty($contactno) || empty($email) || empty($password)) {
  echo "Invalid Request";
  header($_SERVER['HTTP_REFERER']);
  exit;
}

include_once('../include/Connection.php');
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "CALL Customer_With_Cart(?, ?, ?, ?, ?)";

$stmt = $connect->prepare($sql);
$stmt->bind_param("sssss", $name, $address, $contactno, $email, $password);
if ($stmt->execute()) {
    echo "<h1>Registration successful</h1>";
    echo '<a href="../login">Login</a>';
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
$stmt->close();
$connect->close();