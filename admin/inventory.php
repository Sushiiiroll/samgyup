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
  $inv_id = $_POST['id'];

  $sql = "DELETE FROM inventory where inv_id = $inv_id ";
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
      <a href="#" class="nav-link active">
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
      <a href="manageReservation.php" class="nav-link">
        <i class="fa-solid fa-calendar-check nav-icon"></i>
        <p>
          Manage Reservation
          <!-- <span class="right badge badge-danger">1</span> -->
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="manageSales.php" class="nav-link">
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
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold mt-1">INVENTORY</h3>


          <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus"></i> Add Item</button>

        </div>

        <div class="card-body">
          <table id="example1" class="table table-striped table-bordered">
            <thead class="text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
              <tr>
                <th>Brand</th>
                <th>Item</th>
                <th>Stock</th>
                <th>Unit</th>
                <th>Stock Date</th>
                <th class="col-2 text-center">Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sql = "select * from inventory order by stock <= 3 ASC ";
              $res = $conn->query($sql);
              while ($row = $res->fetch_assoc()) {
                $stock =  $row['stock'];
              ?>
                <tr>
                  <td><?php echo $row['brand'] ?></td>
                  <td><?php echo $row['item'] ?></td>
                  <?php if ($stock <= 3) { ?>
                    <td class="text-danger font-weight-bold"><?php echo $row['stock'] ?></td>
                  <?php } else { ?>
                    <td><?php echo $row['stock'] ?></td>
                  <?php } ?>
                  <td><?php echo $row['unit'] ?></td>
                  <td><?php echo $row['stock_date'] ?></td>


                  <td class="text-center">
                    <a class="btn btn-sm btn-success" href="addstock.php?id=<?php echo $row['inv_id']; ?>"><i class="fas fa-plus"></i> Add Stock</a>
                    <a class="btn btn-sm btn-warning" href="updateInventory.php?id=<?php echo $row['inv_id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger delete" data-id="<?php echo $row['inv_id']; ?>" onclick="confirmDelete(this);">
                      <i class="fas fa-trash"></i> Delete</a>&nbsp;
                  </td>
                </tr>
              <?php } ?>
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
        <h5 class="modal-title" id="exampleModalLabel">ADD STOCK</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controller/process.php" method="post">
          <div class="form-group">
            <label Class="text-secondary">Brand:</label>
            <input type="text" class="form-control" name="brand" required>
          </div>
          <div class="form-group">
            <label Class="text-secondary">Item:</label>
            <input type="text" class="form-control" name="item" required>
          </div>
          <div class="form-group">
            <label Class="text-secondary">Quantity:</label>
            <input type="number" class="form-control" name="stock" required>
          </div>
          <div class="form-group">
            <label class="text-secondary">Select Unit:</label>
            <select class="form-control" name="unit" required>
              <option value="">...</option>
              <option value="Bottles">Bottles</option>
              <option value="Pieces">Pieces</option>
              <option value="Packs">Packs</option>
              <option value="Boxes">Boxes</option>
            </select>
          </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="add_item" class="btn btn-primary">Add</button>
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
<?php

include("alert.php");
?>

<script>
  function confirmDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete").id.value = id;
    $("#deleteModal").modal("show");
  }
</script>
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