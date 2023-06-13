<?php

include('process.php');

$res_id = $_GET['id'];

if (isset($_SESSION['login_id'])) {
	
	$log_id = $_SESSION['login_id'];
	
	$get_record = mysqli_query($conn, "select * from account where account_id ='$log_id'");
	$row = mysqli_fetch_assoc($get_record);
	$log_name = $row['name'];
	$usertype = $row['usertype'];
	
	if ($usertype == "admin") {
		//redirect to admin
		header('Location: ../admin/index.php');
	} else {
	}
}

if (isset($_POST['update'])) {
	
	
	$name = $_POST['name'];
	$contact_num = $_POST['contact_num'];
	$pax = $_POST['pax'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$fee = $_POST['fee'];
	
	$sql = "UPDATE `reservation` SET `pax`='$pax',`name`='$name',
	`contact_num`='$contact_num',`date`='$date',`time`='$time',`fee`='$fee' WHERE res_id = '$res_id'";
	$result = mysqli_query($conn, $sql);
	
	$_SESSION['status'] = "Data Successfully Updated!";
	$_SESSION['code'] = "success";
	header('Location: manageReservation.php');
}

if (isset($_POST['id'])) {
	$res_id = $_POST['id'];
	
	$sql = "DELETE FROM reservation where res_id = $res_id ";
	$res = $conn->query($sql);
	
	if ($res == TRUE) {
		$_SESSION['status'] = "Data Successfully Deleted";
		$_SESSION['code'] = "success";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Zamjy | User</title>
<link href="../img/zamjy.png" rel="icon" />
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/adminlte.min.css" />
<script src="../includes/sweetalert.min.js"></script>






</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%); ">
<div class="container-fluid">
<a href="index.php" class="navbar-brand">
<img src="../img/zamjy.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 border-light" style="opacity: 0.8" />
<span class="brand-text font-weight-bold">ZAMJY</span>
</a>

<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse order-3" id="navbarCollapse">
<!-- Left navbar links -->
<ul class="navbar-nav">
<li class="nav-item">
<a href="index.php" class="nav-link ">POS</a>
</li>
<li class="nav-item">
<a href="manageReservation.php" class="nav-link active bg-primary">Manage Reservation</a>
</li>

</ul>
</li>
</ul>



<!-- Right navbar links -->
<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
<!-- Messages Dropdown Menu -->

<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="fa-solid fa-user mr-1"></i> <?php echo $log_name ?>
<i class="fa-solid fa-angle-down ml-1"></i>
</a>
<div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
<a href="#" class="dropdown-item">
<i class="fa-solid fa-gears mr-2"></i> Settings
</a>
<div class="dropdown-divider"></div>
<a href="../controller/logout.php" class="dropdown-item">
<i class="fa-solid fa-right-to-bracket mr-2"></i> Logout
</a>
</div>
</li>

</ul>
</div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container">
<div class="row mb-2">

<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
<div class="container">
<div class="row">
<div class="col-3"></div>
<div class="col-lg-6">
<div class="card">
<div class="card-header text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">

<h5 class="font-weight-bold">UPDATE RESERVATION</h5>
</div>
<form action="" method="post">
<div class="card-body">
<?php
$sql = "select * from reservation where res_id = '$res_id'";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
	?>
	<div class="form-group">
	<label Class="text-secondary">Customer Name:</label>
	<input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" placeholder="Enter Customer" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Contact Number:</label>
	<input type="number" class="form-control" name="contact_num" value="<?php echo $row['contact_num'] ?>" placeholder="Enter Contact Number" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">No. of Pax:</label>
	<input type="number" class="form-control" name="pax" value="<?php echo $row['pax'] ?>" placeholder="" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Date:</label>
	<input type="date" class="form-control" name="date" value="<?php echo $row['date'] ?>" placeholder="" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Time:</label>
	<input type="time" class="form-control" name="time" value="<?php echo $row['time'] ?>" placeholder="" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Reservation Fee/Amount:</label>
	<input type="number" class="form-control" name="fee" value="<?php echo $row['fee'] ?>" placeholder="Enter Customer" required>
	</div>
	
	<?php } ?>
	</div>
	<div class="card-footer">
	<button type="submit" name="update" class="btn btn-primary btn-block float-right">Update</button>
	</div>
	</form>
	</div>
	</div>
	<div class="col-3"></div>
	</div>
	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	
	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	
	<!-- Main Footer -->
	<footer class="main-footer text-dark">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
	<small>Running: </small> <strong class="h6"><?php echo date("F m, Y") . " " . date("l"); ?></strong>
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; UCU Students <a href="#">BSIT</a>.</strong> All rights reserved.
	</footer>
	</div>
	
	
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
	<h5 class="modal-title" id="exampleModalLabel">Add Reservation</h5>
	
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>
	<div class="modal-body">
	<form action="" method="post">
	
	<div class="form-group">
	<label Class="text-secondary">Customer Name:</label>
	<input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" placeholder="Enter Customer" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Contact Number:</label>
	<input type="number" class="form-control" name="contact_num" value="<?php echo $row['contact_num'] ?>" placeholder="Enter Contact Number" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">No. of Pax:</label>
	<input type="number" class="form-control" name="pax" value="<?php echo $row['pax'] ?>" placeholder="" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Date:</label>
	<input type="date" class="form-control" name="date" value="<?php echo $row['date'] ?>" placeholder="" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Time:</label>
	<input type="time" class="form-control" name="time" value="<?php echo $row['time'] ?>" placeholder="" required>
	</div>
	
	<div class="form-group">
	<label Class="text-secondary">Reservation Fee/Amount:</label>
	<input type="number" class="form-control" name="fee" value="<?php echo $row['fee'] ?>" placeholder="Enter Customer" required>
	</div>
	
	
	
	</div>
	<div class="modal-footer">
	<button type="submit" name="add" class="btn btn-primary">Update</button>
	</div>
	</form>
	</div>
	</div>
	</div>
	
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<h5 class="modal-title text-dark font-weight-bold" id="exampleModalLabel">DELETE CONFIRMATION</h5>
	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">×</span>
	</button>
	</div>
	<div class="modal-body">
	<form method="POST" id="form-delete">
	
	<h6>Are sure you want to Delete this Data?</h6>
	
	<input type="hidden" name="id">
	
	</div>
	<div class="modal-footer">
	<button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
	<button type="submit" form="form-delete" class="btn btn-primary">Yes. Delete It!</button>
	</div>
	</form>
	</div>
	</div>
	</div>
	
	
	
	
	
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
	
	<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="../plugins/jszip/jszip.min.js"></script>
	<script src="../plugins/pdfmake/pdfmake.min.js"></script>
	<script src="../plugins/pdfmake/vfs_fonts.js"></script>
	<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	</body>
	
	</html>
	<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["csv", "excel", "pdf", "print"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
	</script>
	
	<script>
	function confirmDelete(self) {
		var id = self.getAttribute("data-id");
		
		document.getElementById("form-delete").id.value = id;
		$("#deleteModal").modal("show");
	}
	</script>