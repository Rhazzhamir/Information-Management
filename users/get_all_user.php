<?php

include_once './include/Connection.php';


$connect = mysqli_connect($con, $username, $password, $dbname);
$sql = "select * FROM Seller";
$stmt = $connect->prepare($sql);
$stmt->execute();
$sellers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$connect->close();
