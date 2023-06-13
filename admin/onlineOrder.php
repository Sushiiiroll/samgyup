<?php
include("header.php");
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
      <a href="#" class="nav-link active">
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
          <a href="onlineOrder.php" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p> Online Order</p>
          </a>
        </li>
      </ul>
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
      <div class="alert alert-info" role="alert">
        <i class="fa-solid fa-circle-info mr-2"></i> This table shows the information of ONLINE ORDERS in the MOBILE APPLICATION!
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold mt-1">ONLINE ORDER</h3>


          <!-- <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus"></i> Add Customer</button> -->

        </div>

        <div class="card-body">
          <table id="example2" class="table table-striped table-bordered">
            <thead class="text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
              <tr>
                <th>Order Id</th>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Order Date</th>
                <th class="col-2 text-center">Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sql = "select * from online_orders";
              $res = $conn->query($sql);
              while ($row = $res->fetch_assoc()) {
              ?>
                <tr>
                  <td><?php echo $row['order_id'] ?></td>
                  <td><?php echo $row['menu'] ?></td>
                  <td><?php echo $row['quantity'] ?></td>
                  <td><?php echo $row['unit_price'] ?></td>

                  <td><?php echo $row['order_date'] ?></td>


                  <td class="text-center">
                    <a class="btn btn-sm btn-success" href="updateOnlineCustomer.php?id=<?php echo $row['order_id']; ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger delete" data-id="<?php echo $row['order_id']; ?>" onclick="confirmDelete(this);">
                      <i class="fas fa-trash"></i></a>&nbsp;
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
        <h5 class="modal-title" id="exampleModalLabel">ADD CUSTOMER</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controller/process.php" method="post">
          <label Class="text-secondary">Fullname:</label>
          <input type="text" class="form-control mb-2" name="name" placeholder="Full Name" required>

          <!-- <label class="text-secondary">Customer Type</label>
      <select class="form-control mb-2" name="customertype">
        <option selected value="">Choose</option>
        <option value="Walk-In">Walk-In</option>
        <option value="Online">Online</option>
      </select> -->

          <label Class="text-secondary">Address</label>
          <input type="text" class="form-control mb-2" name="address" placeholder="Address" required>
          <label Class="text-secondary">Contact Number:</label>
          <input type="text" class="form-control mb-2" name="contact_num" placeholder="Contact Number" required>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="add_customer" class="btn btn-primary">Add</button>
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
include("alert.php");
?>

<script>
  function confirmDelete(self) {
    var id = self.getAttribute("data-id");

    document.getElementById("form-delete").id.value = id;
    $("#deleteModal").modal("show");
  }
</script>