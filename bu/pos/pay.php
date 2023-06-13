<?php
session_start();

$customer_id = $_SESSION['customer_id'];

if(isset($_GET['id'])){

$sales_id = $_GET['id'];

    $sql = "INSERT INTO `sales`(`order_number`, `customer_id`, `total`, `date`, `account_id`)
            VALUES ('$sales_id','$customer_id','[value-4]','[value-5]','[value-6]')";
            $result = mysqli_query($conn, $sql);


}

?>