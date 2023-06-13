<?
session_start();
include_once('../controller/config.php');


if (isset($_SESSION['login_id'])) {
    
    $log_id = $_SESSION['login_id'];
    
    $get_record = mysqli_query($conn, "select * from account where account_id ='$log_id'");
    $row = mysqli_fetch_assoc($get_record);
    $log_name = $row['name'];
    $usertype = $row['usertype'];
    
    if($usertype == "staff"){
        //redirect to admin
        header('Location: index.php');
    }
    else{
        header ('Location: ../admin/index.php');
    }
    
}
echo $log_name;
?>