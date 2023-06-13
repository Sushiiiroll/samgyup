<?php
include("header.php");
include("topnav.php");

if (isset($_POST['id'])) {
	$menu_id = $_POST['id'];

	$sql = "DELETE FROM menu where menu_id = $menu_id ";
	$res = $conn->query($sql);

	if ($res == TRUE) {
		$_SESSION['status'] = "Data Successfully Deleted";
		$_SESSION['code'] = "success";
	}
}

if (isset($_POST['search'])) {
	$menu = $_POST['menu'];
	$category = $_POST['category'];
	$type = $_POST['order_type'];
	$start = $_POST['start'];
	$end = $_POST['end'];

	$filter = '';
	if ($menu != null) {
		$filter = $filter . " AND m.menu = '$menu'";
	}
	if ($category != null) {
		$filter = $filter . " AND s.order_category = '$category'";
	}
	if ($type != null) {
		$filter = $filter . " AND s.order_type = '$type'";
	}
	if($start !=null && $end !=null){
		$filter = $filter . " AND s.date>='$start' and s.date <='$end'";
	}
}
?>





<!-- Sidebar Menu -->
<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
		<li class="nav-item">
			<a href="index.php" class="nav-link">
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
					<a href="addStaff.php" class="nav-link ">
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
					<a href="addWalkinCustomer.php" class="nav-link ">
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
			<a href="#" class="nav-link ">
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
					<a href="onlineOrder.php" class="nav-link">
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
			<a href="manageMenu.php" class="nav-link ">
				<i class="fa-solid fa-utensils nav-icon"></i>
				<p>
					Manage Menu
					<!-- <span class="right badge badge-danger">1</span> -->
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="manageReservation.php" class="nav-link">
				<i class="fa-solid fa-calendar-check nav-icon"></i>
				<p>
					Manage Reservation
					<!-- <span class="right badge badge-danger">1</span> -->
				</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="manageSales.php" class="nav-link active">
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
					<h5 class="m-0 ml-2 font-weight-bold">SALES REPORT</h5>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Manage Staff / </a></li>
                        <li class="breadcrumb-item"><a href="#">Add Staff</a></li> -->

					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<!-- <div class="alert alert-info text-center" role="alert">
                <i class="fa-solid fa-circle-info mr-2"></i> This table shows the information of ONLINE ORDERS in the MOBILE APPLICATION!
            </div> -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title font-weight-bold mt-1">MENUS</h3>
					<button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus"></i> Add Filter</button>
				</div>

				<div class="card-body">
					<table id="example1" class="table table-striped table-bordered">
						<thead class="text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
							<tr>
								<th>ORDER NUMBER</th>
								<th>ORDER</th>
								<th>CATEGORY</th>
								<th>QTY</th>
								<th>DISCOUNT</th>
								<th>ORDER TYPE</th>
								<th>DATE</th>
							</tr>
						</thead>

						<tbody>
							<?php if (isset($_POST['search'])) {

								$sql = "select * from sales";
								$result = mysqli_query($conn, $sql);
								while ($row = $result->fetch_assoc()) {

									$order_no = $row['order_number'];

									$getOrders = "SELECT m.menu, m.price, 
								o.quantity, s.order_category, s.order_type, s.date, s.order_number, s.discounted
								FROM menu AS m
								JOIN walkin_orders as o
								ON m.menu_id=o.menu
								JOIN sales AS s
								ON s.order_number = o.order_number
								WHERE s.order_number = '$order_no'" . $filter;
									$res = mysqli_query($conn, $getOrders);

									while ($order_row = $res->fetch_assoc()) {
										$total = $order_row['quantity'] * $order_row['price'];
										$vat = $total * 0.03;

										$total = $total + $vat;
										$discount =  $order_row['discounted'];

										$discountedTotal = $total - $discount;
							?>
										<tr>
											<td><?php echo $order_row['order_number'] ?></td>
											<td><?php echo $order_row['menu'] ?></td>
											<td><?php echo $order_row['order_category'] ?></td>
											<td><?php echo $order_row['quantity'] ?></td>
											<td><?php echo $discount ?></td>
											<td><?php echo $order_row['order_type'] ?></td>
											<td><?php echo $order_row['date'] ?></td>
										</tr>
									<?php
									}
								}
							} else {
								$sql = "SELECT * FROM sales";
								$result = mysqli_query($conn, $sql);
								while ($row = $result->fetch_assoc()) {

									$order_no = $row['order_number'];

									$getOrders = "SELECT m.menu, m.price, 
								o.quantity, s.order_category, s.order_type, s.date, s.order_number, s.discounted
								FROM menu AS m
								JOIN walkin_orders as o
								ON m.menu_id=o.menu
								JOIN sales AS s
								ON s.order_number = o.order_number
								WHERE s.order_number = '$order_no'";
									$res = mysqli_query($conn, $getOrders);

									while ($order_row = $res->fetch_assoc()) {
										$total = $order_row['quantity'] * $order_row['price'];
										$vat = $total * 0.03;

										$total = $total + $vat;
										$discount = $order_row['discounted'];

										$discountedTotal = $total - $discount;
									?>
										<tr>
											<td><?php echo $order_row['order_number'] ?></td>
											<td><?php echo $order_row['menu'] ?></td>
											<td><?php echo $order_row['order_category'] ?></td>
											<td><?php echo $order_row['quantity']  ?></td>
											<td><?php echo $discount . "%" ?></td>
											<td><?php echo $order_row['order_type'] ?></td>
											<td><?php echo $order_row['date'] ?></td>
										</tr>
							<?php
									}
								}
							} ?>


						</tbody>

					</table>

				</div>

				<!-- /.card-body -->
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
				<h5 class="modal-title" id="exampleModalLabel">ADD MENU</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label Class="text-secondary">Menu:</label>
						<input type="text" class="form-control mb-2" name="menu" placeholder="Menu">
					</div>
					<div class="form-group">
						<label Class="text-secondary">Category:</label>
						<select class="form-control" name="category">
							<option value="">....</option>
							<option value="walk-in">Walk-in</option>
							<option value="online">Online</option>
						</select>
					</div>
					<div class="form-group">
						<label Class="text-secondary">Order Type:</label>
						<select class="form-control" name="order_type">
							<option value="">....</option>
							<option value="Dine in">Dine in</option>
							<option value="Take out">Take out</option>
						</select>
					</div>
					<div class="row">
						<div class="col">
							<smal for="">Select Start Date: </smal>
							<input type="date" class="form-control" name="start">
						</div>
						<div class="col">
							<smal for="">Select End Date: </smal>
							<input type="date" class="form-control" name="end">
						</div>
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="submit" name="search" class="btn btn-primary">Add</button>
			</div>
			</form>
		</div>
	</div>
</div>


<?php
include("footer.php");
include("alert.php");
?>