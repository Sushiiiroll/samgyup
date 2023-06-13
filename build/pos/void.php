<?php
session_start();

unset($_SESSION['customer_id']);
unset($_SESSION['order_number']);

header('location: index.php');

?>