<?php
session_start();
include_once('../controller/config.php');
$customer_id = 0;
$db_name = "";
$db_date = "";
$db_order_number = "";
$order_type = "";
// CREATING RANDOM STRING AND NUMBER


//VARIABLE EMPTY WHEN NOTHINS IS SET
if(isset($_POST['add_customer'])){

$name = $_POST['name'];
$order_post = $_POST['order_type'];

$sql = "INSERT INTO `walkincustomer`(`name`) VALUES ('$name')";
$result = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;
$_SESSION['customer_id'] = $last_id;
	if($result == true){
	
		$random = rand(1,9999999);
	
		$_SESSION['status'] = "Data Successfully Added!";
		$_SESSION['code'] = "success";
		$_SESSION['order_number'] = $random;
		$_SESSION['order_type'] = $order_post;
	   
	}

	
}

// GETTING RECORD TO SHOW THE CUSTOMER NAME AND DATE OF ORDER
if(isset($_SESSION['customer_id'])){
	$customer_id = $_SESSION['customer_id'];
}

if(isset($_SESSION['order_number'])){
   
	$db_order_number = $_SESSION['order_number'];
	
	$get_record = mysqli_query($conn, "select * from walkincustomer where customer_id ='$customer_id' ");
	$row = mysqli_fetch_assoc($get_record);
	$db_name = $row['name'];
	$db_date = $row['date'];
	
}


if(isset($_POST['add_order'])){
	
	$menu_id = $_POST['menu_id'];
	$quantity = $_POST['quantity'];
	
	$current_stock = $_POST['stock'];
	$unit_price = $_POST['unit_price'];
	
	$sql = "INSERT INTO `walkin_orders`( `order_number`, `menu`, `quantity`, `unit_price`,`customer_id`)
	VALUES ('$db_order_number','$menu_id','$quantity','$unit_price','$customer_id')";
	$result = mysqli_query($conn, $sql);

	$new_stock = $current_stock - $quantity;
	//update stocks
	$updateStocks = "UPDATE menu SET stock='$new_stock' WHERE menu_id='$menu_id' ";
	$updateResult = mysqli_query($conn, $updateStocks);


}  
?>