<?php 
    if(isset($_SESSION['status'])){ 
?>

    <script>
    swal.fire("<?php echo $_SESSION['status']; ?> ", " ", "<?php echo $_SESSION['code']; ?>");
    </script>
                
<?php 
    unset($_SESSION['status']);
    unset($_SESSION['code']);
}

?>