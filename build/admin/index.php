<?php
 
$dataPoints = array( 
	array("y" => 3373.64, "label" => "January" ),
	array("y" => 2435.94, "label" => "February" ),
	array("y" => 1842.55, "label" => "March" ),
	array("y" => 1828.55, "label" => "April" ),
	array("y" => 1039.99, "label" => "May" ),
	array("y" => 765.215, "label" => "June" ),
	array("y" => 612.453, "label" => "July" ),
  array("y" => 1828.55, "label" => "August" ),
  array("y" => 2435.94, "label" => "September" )
);
 
?>

<?php
session_start();
include("../controller/config.php");
include('user.php');
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zamjy | Administrator</title>
  <link href="../img/zamjy.png" rel="icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">


  <script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: ""
	},
	axisY: {
		title: ""
	},
	data: [{
		type: "column",
		yValueFormatString: "₱ #,##0.## ",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link"><h4 class="font-weight-bold text-dark">ZAMJY RESTAURANT MANAGEMENT SYSTEM</h4></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <li class="nav-item">
        <a class="nav-link" href="../controller/logout.php" role="button">
         <button class="btn btn-sm btn-danger mt-0"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../img/zamjy.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold ml-2">ADMINISTRATOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/logo.webp" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $db_name ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
                       
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-users nav-icon"></i>
              <p>
                Manage Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addStaff.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Store Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addDeliveryStaff.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Delivery Staff</p>
                </a>
              </li>
            </ul>
          </li>

         <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-people-line nav-icon"></i>
              <p>
                Manage Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addWalkinCustomer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Walk-In Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="onlineCustomer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Online Customer</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-cart-shopping nav-icon"></i>
              <p>
                Manage Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="walkinOrder.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Walk-In Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Online Order</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="inventory.php" class="nav-link">
              <i class="fa-solid fa-warehouse nav-icon"></i>
              <p>
                 Manage inventory
                <!-- <span class="right badge badge-danger">1</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-utensils nav-icon"></i>
              <p>
                 Manage Menu
                <!-- <span class="right badge badge-danger">1</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-calendar-check nav-icon"></i>
              <p>
                 Manage Reservation
                <!-- <span class="right badge badge-danger">1</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-sack-dollar nav-icon"></i>
              <p>
                 Manage Sales
                <!-- <span class="right badge badge-danger">1</span> -->
              </p>
            </a>
          </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Dashboard</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

         <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>1</h3>

                <h4>Orders</h4>
              </div>
              <div class="icon">
                <i class="fa-solid fa-bag-shopping"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>₱ 53.00</h3>

                <h4>Sales Today</h4>
              </div>
              <div class="icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <h4>Online Customers</h4>
              </div>
              <div class="icon">
                <i class="fa-solid fa-users-rectangle"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <h4>Walk-in Customers</h4>
              </div>
              <div class="icon">
                <i class="fa-solid fa-person-walking"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>13</h3>

                <h4>Online Orders</h4>
              </div>
              <div class="icon">
                <i class="fa-solid fa-cart-shopping"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>5</h3>

                <h4>Online Reservation</h4>
              </div>
              <div class="icon">
                <i class="fa-solid fa-calendar-check"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



        </div>

        <div class="row">
          <div class="col">
             <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-center">
                  <h1 class="card-title font-weight-bold">MONTHLY SALES</h1>
                  
                </div>
              </div>
              <div class="card-body">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>



        </div>


        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Zamjy V.1
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; UCU Students <a href="#">BSIT</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="../dist/js/pages/dashboard3.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>