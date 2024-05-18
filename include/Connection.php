<?php

$con = "localhost";
$username = "root";
$password = "";
$dbname = 'shopping_cart';

$connect = new mysqli($con , $username , $password ,$dbname );

if($connect -> connect_error){
    die("Connect failed: " . $connect->connect_error);
}