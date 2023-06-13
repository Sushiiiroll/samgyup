<?php
session_start();
include('../controller/config.php');

if (isset($_GET['id'])) {
  $inv_id = $_GET['id'];
  $get_record = mysqli_query($conn, "select * from inventory where inv_id='$inv_id'");
  $row = mysqli_fetch_assoc($get_record);
  $db_stock = $row['stock'];

  if (isset($_POST['add_stock'])) {

    $stock = $_POST['stock'];

    $total = $db_stock + $stock;

    $sql = "UPDATE `inventory` SET `stock`='$total'  WHERE inv_id = $inv_id";
    $result = mysqli_query($conn, $sql);

    $_SESSION['status'] = "Stock Successfully Added!";
    $_SESSION['code'] = "success";

    header("location: inventory.php");
  }
}






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
  <title>ZAMJY | Inventory</title>
  <link href="../img/zamjy.png" rel="icon" />
  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="../includes/sweetalert.min.js"></script>
</head>

<?php

include("topnav.php");

if (isset($_POST['id'])) {
  $customer_id = $_POST['id'];

  $sql = "DELETE FROM onlinecustomer where customer_id = $customer_id ";
  $res = $conn->query($sql);

  if ($res == TRUE) {
    $_SESSION['status'] = "Data Successfully Deleted";
    $_SESSION['code'] = "success";
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
      <a href="#" class="nav-link ">
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
          <a href="walkinOrder.php" class="nav-link ">
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
      <a href="inventory.php" class="nav-link active">
        <i class="fa-solid fa-warehouse nav-icon"></i>
        <p>
          Manage inventory
          <!-- <span class="right badge badge-danger">1</span> -->
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="manageMenu.php" class="nav-link">
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
          <!-- <h4 class="m-0">MANAGE STAFF</h4> -->
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
    <div class="container">



      <div class="card">
        <div class="card-header" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
          <h3 class="card-title font-weight-bold mt-1 text-white">ADD STOCK</h3>

        </div>

        <div class="card-body">
          <table id="example2" class="table table-bordered">

            <?php
            $sql2 = "select * from inventory where inv_id = '$inv_id'";
            $res2 = $conn->query($sql2);
            while ($row = $res2->fetch_assoc()) {
            ?>
              <form action="" method="post">
                <td class="col-2 text-center font-weight-bold">BRAND:</td>
                <td><input class="form-control" name="brand" type="text" value="<?php echo $row['brand'] ?>" disabled></td>
                </tr>
                <td class="col-2 text-center font-weight-bold">ITEM:</td>
                <td><input class="form-control" name="item" type="text" value="<?php echo $row['item'] ?>" disabled></td>
                </tr>
                <tr>
                  <td class="col-2 text-center font-weight-bold">CURRENT STOCK:</td>
                  <td><input class="form-control" name="stock1" type="text" value="<?php echo $row['stock'] ?>" disabled></td>
                </tr>
                <tr>
                  <td class="col-2 text-center font-weight-bold">ADD STOCK:</td>
                  <td><input class="form-control" name="stock" type="number"></td>
                </tr>


              <?php } ?>
          </table>
          <div class="table-footer">
            <button type="submit" name="add_stock" class="btn btn-success mt-2 float-right pl-4 pr-4">Add</button>
            <a href="inventory.php">
              <input type="button" class="btn btn-danger mt-2 float-right mr-3" value="Cancel"></a>
          </div>

          </form>


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
        <h5 class="modal-title" id="exampleModalLabel">ADD STOCK</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="addstock.php" method="post">
          <label Class="text-secondary">Stock:</label>
          <input type="number" class="form-control mb-2" name="stock" required>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="add_stock" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- DELETE MODAL -->
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

<?php
include("footer.php");

?>

<script>
  function confirmDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete").id.value = id;
    $("#deleteModal").modal("show");
  }
</script>