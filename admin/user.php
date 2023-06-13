<?php


if(isset($_SESSION['login_id'])){
$account_id = $_SESSION['login_id'];

$get_record = mysqli_query($conn, "select * from account where account_id ='$account_id'");
    $row = mysqli_fetch_assoc($get_record);
    $db_name = $row['name'];
    $usertype = $row['usertype'];

          if($usertype != "admin"){
        //redirect to admin
        header('Location: ../pos/index.php');
        }
        else{
           
        }
        
}

?>