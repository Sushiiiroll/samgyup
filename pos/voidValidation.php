<?php
session_start();
include_once('../controller/config.php');

if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
}

if (isset($_SESSION['order_number'])) {
    $order_number = $_SESSION['order_number'];
}

if (isset($_POST['void'])) {
    $password = $_POST['password'];
    
    
    $sql = "SELECT * FROM account WHERE username = 'admin' AND password = '$password' ";
    $user = $conn->query($sql) or die($conn->error);
    $row = $user->fetch_assoc();
    $valid = $user->num_rows;
    
    if ($valid > 0) {
        header("location: void.php?id=" . "$customer_id" ."&order_id=" . "$order_number");
    } else {
        $_SESSION['status'] = "Invalid Credential!";
        $_SESSION['code'] = "error";
        header('location: index.php');
    }
}
