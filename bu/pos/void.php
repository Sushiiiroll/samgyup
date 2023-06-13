<?php
session_start();
include_once('../controller/config.php');
if(isset($_GET['id'])){
$customer_id = $_GET['id'];

    $sql = "DELETE FROM walkincustomer where customer_id = $customer_id ";
    $res =$conn->query($sql);

        if($res == TRUE){
        $_SESSION['status'] = "Void Order!";
        $_SESSION['code'] = "success";
            
        }
unset($_SESSION['customer_id']);
unset($_SESSION['order_number']);

header('location: index.php');
}
?>