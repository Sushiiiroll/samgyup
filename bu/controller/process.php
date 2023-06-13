<?php
session_start();
include("config.php");
// PROCESS CONTROLLER //

if(isset($_POST['add_staff'])){

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO `account`(`name`, `username`, `password`, `usertype`) VALUES ('$name','$username','$password','staff')";
$result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/addStaff.php");

}



if(isset($_POST['add_deliveryStaff'])){

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO `delivery_staff`(`name`, `username`, `password`) VALUES ('$name','$username','$password')";
$result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/addDeliveryStaff.php");

}

if(isset($_POST['add_customer'])){

$name = $_POST['name'];
$address = $_POST['address'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];


$sql = "INSERT INTO `customer`(`name`, `address`, `email` `contact_num`)
 VALUES ('$name',$address','$email','$contact_num')";
$result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/addWalkinCustomer.php");

}


if(isset($_POST['add_item'])){

$item = $_POST['item'];
$unit = $_POST['unit'];
$stock = $_POST['stock'];


$sql = "INSERT INTO `inventory`(`item`, `stock`, `unit`)
VALUES ('$item','$stock','$unit')";
$result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/inventory.php");

}

if(isset($_POST['add_menu'])){

$menu = $_POST['menu'];
$price = $_POST['price'];
$status = $_POST['status'];


$sql = "INSERT INTO `menu`(`menu`, `price`, `status`) 
VALUES ('$menu','$price','$status')";
$result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/manageMenu.php");

}





?>

