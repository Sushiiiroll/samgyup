<?php
session_start();
include('controller/config.php');


    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password' ";
        $user = $conn->query($sql) or die($conn->error);
        $row = $user->fetch_assoc();
        $valid = $user->num_rows;
        
        if($username != $valid and $password != $valid){
          $_SESSION['error'] = "** Incorrect Username or Password **";
        }
          
        if($valid > 0){
            $_SESSION['login_id'] = $row['account_id'];

            echo $_SESSION['login_id'];
            header("Location: admin/index.php");
                          
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zamjy | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page bg-dark">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card" style="border: rounded;">
    <div class="card-body login-card-body p-4">
      <div class="login-logo">
        <img src="img/zamjy.png" style="width: 70px; height: 70px;">
      </div>
       <h4 class="text-center mb-3 font-weight-bold text-dark">ZAMJY LOGIN</h4>

       <?php if (isset($_SESSION['error'])){ ?>
        <div class="text-center">
        <span class="text-center mb-3 text-danger font-weight-bold">
        
        <?php echo  $_SESSION['error']; ?>
        </span></div><?php } unset($_SESSION['error']); ?>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
             
              <span class="fas fa-solid fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-4">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
      

      <div class="social-auth-links text-center mb-3">
        
        <button type="submit" class="btn btn-block btn-primary" name="submit">Login</button>
        
      </div>

      </form>
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
