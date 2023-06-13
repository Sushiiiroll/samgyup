<?php
session_start();
include('process.php');

$total = 0;


if(isset($_POST['plus'])){
  $order_id = $_POST['order_id'];
  $quantity = $_POST['quantity'];
  $unit_price = $_POST['unit_price'];
  $qty = $quantity + 1;
  $sub_total = $qty * $unit_price;
  

  $sql = "UPDATE `walkin_orders` SET `quantity`='$qty', `subtotal`='$sub_total' WHERE order_id = $order_id";
  $result = mysqli_query($conn, $sql);

}

  if(isset($_POST['minus'])){
    $order_id = $_POST['order_id'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];
    $qty = $quantity - 1;
    $sub_total = $qty * $unit_price;
    
    if($qty <= 0){
        $_SESSION['status'] = "Invalid Quantity";
        $_SESSION['code'] = "error";
     }else{
      $sql = "UPDATE `walkin_orders` SET `quantity`='$qty', `subtotal`='$sub_total' WHERE order_id = $order_id";
    $result = mysqli_query($conn, $sql);
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
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
    <script src="../includes/sweetalert.min.js"></script>

  




  </head>
  <body class="hold-transition layout-top-nav">
    <div class="wrapper">
      <!-- Navbar -->
      <nav
        class="main-header navbar navbar-expand-md navbar-light navbar-dark" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);"
      >
        <div class="container-fluid">
          <a href="index.php" class="navbar-brand">
            <img
              src="../img/zamjy.png"
              alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3 border-light"
              style="opacity: 0.8"
            />
            <span class="brand-text font-weight-bold">ZAMJY</span>
          </a>

          <button
            class="navbar-toggler order-1"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="index3.html" class="nav-link active">Home</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  id="dropdownSubMenu1"
                  href="#"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  class="nav-link dropdown-toggle"
                  >Dropdown</a
                >
                <ul
                  aria-labelledby="dropdownSubMenu1"
                  class="dropdown-menu border-0 shadow"
                >
                  <li><a href="#" class="dropdown-item">Some action </a></li>
                  <li>
                    <a href="#" class="dropdown-item">Some other action</a>
                  </li>

                  <li class="dropdown-divider"></li>

                  <!-- Level two dropdown-->
                  <li class="dropdown-submenu dropdown-hover">
                    <a
                      id="dropdownSubMenu2"
                      href="#"
                      role="button"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                      class="dropdown-item dropdown-toggle"
                      >Hover for action</a
                    >
                    <ul
                      aria-labelledby="dropdownSubMenu2"
                      class="dropdown-menu border-0 shadow"
                    >
                      <li>
                        <a tabindex="-1" href="#" class="dropdown-item"
                          >level 2</a
                        >
                      </li>

                      <!-- Level three dropdown-->
                      <li class="dropdown-submenu">
                        <a
                          id="dropdownSubMenu3"
                          href="#"
                          role="button"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          class="dropdown-item dropdown-toggle"
                          >level 2</a
                        >
                        <ul
                          aria-labelledby="dropdownSubMenu3"
                          class="dropdown-menu border-0 shadow"
                        >
                          <li>
                            <a href="#" class="dropdown-item">3rd level</a>
                          </li>
                          <li>
                            <a href="#" class="dropdown-item">3rd level</a>
                          </li>
                        </ul>
                      </li>
                      <!-- End Level three -->

                      <li><a href="#" class="dropdown-item">level 2</a></li>
                      <li><a href="#" class="dropdown-item">level 2</a></li>
                    </ul>
                  </li>
                  <!-- End Level two -->
                </ul>
              </li>
            </ul>

            

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
           
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa-solid fa-user mr-1"></i> User Account
                <i class="fa-solid fa-angle-down ml-1"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                <a href="#" class="dropdown-item">
                  <i class="fa-solid fa-gears mr-2"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
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
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg">
                <?php if(!isset($_SESSION['customer_id'])){ ?>
                  <div class="alert alert text-center text-black mb-4 font-weight-bold" role="alert" style="background-color: #cce6ff;">
                    <i class="fa-solid fa-circle-info"></i> Add Customer First to Begin Transaction.
                  </div>
                  <?php  } ?>
                <div class="card card-primary">
                  <div class="card-header bg-navy">
                    <h5 class="card-title m-0 font-weight-bold">ORDER INFORMATION</h5>
                    <?php if(!isset($_SESSION['customer_id'])){ ?>
                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus"></i> Add Customer</button>
                    <?php  } ?>
                  </div>
                  
                  <div class="card-body">
                    <?php if(isset($_SESSION['customer_id'])){ ?>
                    <div class="form-group">
                      <span class="text-capitalize font-weight-bold float-right mr-4">Date: <h5 class="text-success font-weight-bold"><?php echo $db_date ?></h5> </span>
                      <span class="text-capitalize font-weight-bold">Customer Name: <h5 class="text-success font-weight-bold"><?php echo $db_name ?></h5></span>
                      <span class="text-capitalize font-weight-bold">Order Code: <h5 class="text-success font-weight-bold"><?php echo $db_order_number ?></h5>   </span>
                    </div>
                    <?php  } ?>
                    
                    <table class="table" id="example1">
                    <thead class="bg-primary">
                      <tr>
                        <th scope="col">Menu</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Sub-total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "select * from walkin_orders where customer_id = $customer_id";
                    $res =$conn->query($sql);
                    while($row=$res->fetch_assoc()){
                    ?>
                      <tr>
                        <td><?php echo $row['menu']; ?></td>
                        <td>
                          <div class="form-group">
                          <form action="" method="post">
                          <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
                          <input type="hidden" name="unit_price" value="<?php echo $row['unit_price'] ?>">
                          <button type="submit" name="minus" class="mr-1 pt-0 border-danger">-</button>
                          <input type="text" class="border-0 " name="quantity" style="width: 23px;"value="<?php echo $row['quantity']; ?>">
                          <button type="submit" name="plus" class="ml-1 pt-0 border-success">+</button>
                          </div>
                          </form>
                        </td>
                        <td><?php echo $row['unit_price']; ?></td>
                        <td><?php echo $row['subtotal']; ?></td>
                      </tr>
                       
                      <?php $total += $row['subtotal']; } ?>
                    </tbody>
                    <?php if(isset($_SESSION['customer_id'])){ ?>
                    <div class="table-footer">
                      <tr>
                        <th></th>
                        <th></th>
                        <th>TOTAL: </th>
                        <th><?php echo $total ?></th>
                      </tr>
                    </div>
                    <?php }else{ ?>
                      <div class="table-footer">
                      <tr>
                        <th></th>
                        <th></th>
                        <th>No Orders Found!</th>
                        <th></th>
                      </tr>
                    </div>

                    <?php } ?>
                  </table>

                  </div>
                  
                </div>

                
                <!-- /.card -->
              </div>
              <!-- /.col-md-6 -->
            <?php if(isset($_SESSION['customer_id'])){ ?>
              <div class="col-lg-4">
                <div class="card card-primary">
                  <div class="card-header font-weight-bold bg-navy">
                    ADD PRODUCTS
                  </div>
                  <div class="card-body">
                        <div class="row">
                            <div class="col">
                              <form action="" method="post">
                                <div class="form-group">
                                    <label for="sel1">Select Menu:</label>
                                    <select class="form-control" name="menu" id="item">
                                      <option value="">Select</option>
                                        <?php
                                        $sql = "select * from menu";
                                        $res =$conn->query($sql);
                                        while($row=$res->fetch_assoc()){
                                          if($row['status'] == "Available"){
                                        ?>
                                        <option value="<?php echo $row['menu']; ?>" data-price="<?php echo $row['price']; ?>"><?php echo $row['menu']; ?></option>
                                        <?php } else {?>
                                        <option value="<?php echo $row['menu']; ?>" data-price="<?php echo $row['price']; ?>" disabled class="text-danger"><?php echo $row['menu'] ?> - Unavailable</option>
                                        
                                        <?php } } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Quantity:</label>
                                  <input class="form-control" id="quantity" name="quantity" type="number" placeholder="Enter Quantity">
                                </div>
                                <div class="form-group">
                                  <label for="">Price:</label>
                                  <input class="form-control" id="price" name="unit_price" type="number" required>
                                </div>
                                <div class="form-group">
                                  <label for="">Total:</label>
                                  <input class="form-control" name="subtotal" id="totalPrice" type="number">
                                </div>
                                <button type="submit" name ="add_order" class="btn-block btn btn-primary p-4 mb-2"><i class="fa-solid fa-cart-plus"></i> Add</button>
                                </form>
                                <a href="void.php?id=<?php echo $customer_id ?>">
                                <button class="btn-block btn btn-danger p-4 mb-2"><i class="fa-solid fa-triangle-exclamation"></i> Void Order</button></a>
                                <a href="index.php">
                                <button class="btn-block btn btn-warning p-4 mb-2"><i class="fa-solid fa-eraser"></i> Clear</button></a>
                                <a href="pay.php?=<?php echo $db_order_number ?>">
                                <button class="btn-block btn btn-success p-5 mb-2"><i class="fa-solid fa-file-invoice-dollar"></i> PAY</button></a>
                            </div>
                            
                        </div>

                  </div>
                </div>

                
              </div>
            <?php } ?>
              <!-- /.col-md-6 -->
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
            Zamjy V.1
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; UCU Students <a href="#">BSIT</a>.</strong> All rights reserved.
        </footer>
    </div>



      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
              <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <label Class="text-secondary">Customer Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Customer" required>
              </div>

              <!-- <div class="form-group">
                <label class="text-secondary">Order Type:</label>
                <select class="form-control" name="type" required>
                  <option value="">...</option>
                  <option value="Dine-In">Dine-In</option>
                  <option value="Take Out">Take Out</option>
                </select>
              </div>   -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="add_customer" class="btn btn-primary">Add</button>
            </div>
            </form>
          </div>
        </div>
      </div>


      <!-- VOID MODAL -->
      <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog bd-example-modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(82deg, rgba(2,0,36,1) 0%, rgba(9,9,40,1) 33%, rgba(53,141,159,1) 100%);">
              <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <label Class="text-secondary">Customer Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Customer" required>
              </div>

              <!-- <div class="form-group">
                <label class="text-secondary">Order Type:</label>
                <select class="form-control" name="type" required>
                  <option value="">...</option>
                  <option value="Dine-In">Dine-In</option>
                  <option value="Take Out">Take Out</option>
                </select>
              </div>   -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="add_customer" class="btn btn-primary">Add</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    
    <!-- AdminLTE for demo purposes -->
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
    <script src="../dist/js/adminlte.min.js"></script>
  </body>
</html>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
  function updateTotal(){
  var pricePer = $('#item').find('option:selected').data('price');
  var quantity = $('#quantity').val();
 
  var total = pricePer * quantity;
  $('#price').val(pricePer);
  $('#totalPrice').val(total);
 
}

$('#item').change(updateTotal);
$('#quantity').change(updateTotal);
</script>

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


