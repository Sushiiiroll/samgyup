<?php
session_start();
include_once('../controller/config.php');
if(isset($_GET['id'])){
    $customer_id = $_GET['id'];
    
    $order_id =  $_SESSION['order_number'];
    //add stocks when voided before delete
    $sql = "SELECT * FROM walkin_orders WHERE order_number = $order_id";
    $result = mysqli_query($conn, $sql);
    
    while ($row = $result->fetch_assoc()) {
        
        $menu_id =  $row['menu'];
        $quantity = $row['quantity'];
        
        $get_record = mysqli_query($conn, "select * from menu where menu_id ='$menu_id' ");
        $row = mysqli_fetch_assoc($get_record);
        
        $stock = $row['stock'];
        
        //update stocks
        $new_stock = $quantity+$stock;
        $updateStocks = "UPDATE menu SET stock='$new_stock' WHERE menu_id='$menu_id' ";
        $updateResult = mysqli_query($conn, $updateStocks);
        
    }
    
    
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