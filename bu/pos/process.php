<?php
include_once('../controller/config.php');
$customer_id = 0;
$db_name = "";
$db_date = "";
$db_order_number = "";


// CREATING RANDOM STRING AND NUMBER


//VARIABLE EMPTY WHEN NOTHINS IS SET



if(isset($_POST['add_customer'])){

$name = $_POST['name'];

$sql = "INSERT INTO `walkincustomer`(`name`) VALUES ('$name')";
$result = mysqli_query($conn, $sql);

$last_id = $conn->insert_id;
$_SESSION['customer_id'] = $last_id;
    if($result == true){
    
        $random = rand(1,9999999);
    
       
    
        $_SESSION['status'] = "Data Successfully Added!";
        $_SESSION['code'] = "success";
        $_SESSION['order_number'] = $random;
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
    

    $menu = $_POST['menu'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $subtotal = $_POST['subtotal'];
    

    $sql = "INSERT INTO `walkin_orders`( `order_number`, `menu`, `quantity`, `unit_price`, `subtotal`,`customer_id`)
     VALUES ('$db_order_number','$menu','$quantity','$unit_price','$subtotal','$customer_id')";
    $result = mysqli_query($conn, $sql);

}  
?>