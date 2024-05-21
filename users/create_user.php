<?php

include_once '../include/Connection.php';


$fname = filter_input(INPUT_POST, "First_Name", FILTER_SANITIZE_SPECIAL_CHARS);
$lname = filter_input(INPUT_POST, "Last_Name", FILTER_SANITIZE_SPECIAL_CHARS);
$contactNo = filter_input(INPUT_POST, "Contact_Number", FILTER_SANITIZE_SPECIAL_CHARS);
$address = filter_input(INPUT_POST, "Address", FILTER_SANITIZE_SPECIAL_CHARS);

echo $fname . '<br>';
echo $lname . '<br>';
echo $contactNo . '<br>';
echo $address . '<br>';


$connect = mysqli_connect($con, $username, $password, $dbname);
$sql = "INSERT INTO Seller (First_Name, Last_Name, Address, ContactNumber)
VALUES (?, ?, ?, ?);";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ssss", $fname, $lname, $address, $contactNo);
$stmt->execute();
$stmt->close();
$connect->close();

header("Location: ../Register_User.php");