<?php
session_start();
include("config.php");
// PROCESS CONTROLLER //

if (isset($_POST['add_staff'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $sql = "INSERT INTO `account`(`name`, `username`, `password`, `usertype`) VALUES ('$name','$username','$password','$type')";
    $result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/addStaff.php");
}



if (isset($_POST['add_deliveryStaff'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `delivery_staff`(`name`, `username`, `password`) VALUES ('$name','$username','$password')";
    $result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/addDeliveryStaff.php");
}

if (isset($_POST['add_customer'])) {

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


if (isset($_POST['add_item'])) {

    $item = $_POST['item'];
    $unit = $_POST['unit'];
    $stock = $_POST['stock'];
    $brand = $_POST['brand'];


    $sql = "INSERT INTO `inventory`(`brand`, `item`, `stock`, `unit`)
VALUES ('$brand','$item','$stock','$unit')";
    $result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/inventory.php");
}

if (isset($_POST['add_menu'])) {

    $menu = $_POST['menu'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $stock = $_POST['stock'];
    $package = $_POST['package'];
    $category = $_POST['category'];

    $sql = "INSERT INTO `menu`(`menu`, `price`, `description`, `stock`, `package`, `category`) 
    VALUES ('$menu','$price','$desc','$stock','$package', '$category')";
    $result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Data Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/manageMenu.php");
}

if (isset($_POST['add_category'])) {

    $category = $_POST['category'];

    $sql = "INSERT INTO `category`(`category`) 
    VALUES ('$category')";
    $result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Category Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: ../admin/manageMenu.php");
}

if (isset($_POST['add_filter'])) {

    $category = $_POST['category'];

    if($category=="NONE"){
        echo "1";
    }else{
        $sql ="SELECT * FROM sales WHERE order_category='$category'";
    }


    $result = mysqli_query($conn, $sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row['order_category'];
        }
    } else {
        echo "0 results";
    }

    // $_SESSION['status'] = "Filter Successfully Added!";
    // $_SESSION['code'] = "success";

    // header("location: ../admin/manageSales.php");
}
