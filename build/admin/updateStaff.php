<?php 
include("header.php");
include("topnav.php");

$account_id = $_GET['id'];




if(isset($_POST['update_staff'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE `account` SET `name`='$name',`username`='$username',
    `password`='$password' WHERE account_id = $account_id";
    $res =$conn->query($sql);

    if($res == TRUE){
        $_SESSION['status'] = "Data Successfully Updated!";
        $_SESSION['code'] = "success";
        header("location: addStaff.php");
            
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
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-users"></i>
              <p>
                Manage Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addStaff.php" class="nav-link active">
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
                <a href="onlinOrder.php" class="nav-link">
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
      <div class="container">

        <div class="card">
              <div class="card-header" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
                <h3 class="card-title font-weight-bold mt-1 text-white" >UPDATE STAFF</h3>
                
              </div>
              
              <div class="card-body">
                <table id="example2" class="table table-bordered">

                <?php 
                        $sql2 = "select * from account where account_id = '$account_id'";
                        $res2 =$conn->query($sql2);
                        while($row=$res2->fetch_assoc()){ 
                    ?>
                   <form action="" method="post">
                        <td class="col-2 text-center font-weight-bold">FULLNAME:</td>
                        <td><input class="form-control" name="name" type="text" value="<?php echo $row['name'] ?>"></td>
                        </tr>
                        <tr>
                            <td class="col-2 text-center font-weight-bold">USERNAME:</td>
                            <td><input class="form-control" name="username" type="text" value="<?php echo $row['username'] ?>"></td>
                        </tr>
                        <tr>
                            <td class="col-2 text-center font-weight-bold">PASSWORD:</td>
                            <td><input class="form-control" name="password" type="text" value="<?php echo $row['password'] ?>"></td>
                        </tr>
                        
                        <?php } ?>
                        </table>
                        <div class="table-footer">
                            <button type="submit" name="update_staff" class="btn btn-primary mt-2 float-right">Update Staff</button>
                            <a href="addStaff.php">
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
