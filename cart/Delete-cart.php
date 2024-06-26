<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

try {
    include_once('../include/Connection.php');
    $sql = "DELETE FROM Cart_Product WHERE Product_Id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../cart.php");
} catch (Exception $error) {
    echo $error;
} finally {
    $stmt->close();
    $connect->close();
}