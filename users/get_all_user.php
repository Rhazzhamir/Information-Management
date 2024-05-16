<?php

include_once './include/Connection.php';


$conn = mysqli_connect($con, $username, $password, $dbname);
$sql = "select * FROM Seller";
$stmt = $conn->prepare($sql);
$stmt->execute();
$sellers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
