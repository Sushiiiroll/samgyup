<?php
session_start();

unset($_SESSION['login_id']);
session_unset();
session_destroy();


header("Location: ../index.php");

?>

