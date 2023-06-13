<?php
session_start();
include('../controller/config.php');

$customer_name = $_SESSION['login_id'];
$customer_id = $_SESSION['customer_id'];
$total = $_SESSION['total'];
$order_type = $_SESSION['order_type'];
$grandTotal = $_SESSION['grand_total'];
$discount = $_SESSION['discount'];

if (isset($_GET['id'])) {

    $sales_id = $_GET['id'];

    $sql = "INSERT INTO `sales`(`order_number`, `customer_id`, `total`,`account_id`, `order_type`, `order_category`, `discounted`)
            VALUES ('$sales_id','$customer_id','$grandTotal','$customer_name', '$order_type', 'WALK-IN', '$discount')";
    $result = mysqli_query($conn, $sql);

    $insertNotif = "INSERT INTO `notification` (`sales_id`,`isRead`) VALUES ('$sales_id','NO')";
    $notifQuery = mysqli_query($conn,$insertNotif);
}
unset($_SESSION['customer_id']);
unset($_SESSION['order_type']);
unset($_SESSION['total']);
unset($_SESSION['order_number']);
unset($_SESSION['grand_total']);
unset($_SESSION['discount']);

header('location: index.php');

$_SESSION['status'] = "Transaction Complete! ";
$_SESSION['code'] = "success";
