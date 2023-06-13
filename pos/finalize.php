<?php

include('process.php');


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

$total = 0;
$change = "";
$c_money = "";
$discount = 0;
$order = $_SESSION['total'];
$db_order = $_GET['id'];
$discounted = 0;
$vated = 0;
$discountedtotal = 0;
$grandTotal = 0;
$discountedPRice = 0;

if (isset($_POST['calculate'])) {

  $discounted = $_POST['less'];
  $c_money = $_POST['c_money'];
  $order_total = $_POST['order_total'];

  $vated = round($order_total) * 0.03;
  $newTotal = round((float)$order_total) + (float)$vated;
  $discountedtotal = round((float)$newTotal) * (float)$discounted;
  $grandTotal = round((float)$newTotal) - (float) $discountedtotal;
  $change = $c_money - $grandTotal;
  
  $_SESSION['discount'] = $discounted;
  $_SESSION['grand_total'] = (float)$grandTotal;
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
              <a href="index3.html" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item">Some action </a></li>
                <li>
                  <a href="#" class="dropdown-item">Some other action</a>
                </li>

                <li class="dropdown-divider"></li>

                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                  <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                  <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                    <li>
                      <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                    </li>

                    <!-- Level three dropdown-->
                    <li class="dropdown-submenu">
                      <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                      <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-4"></div>
            <div class="col-lg-4 col-sm-12 col-md-12">

              <div class="alert alert text-center text-black mb-4 font-weight-bold" role="alert" style="background-color: #cce6ff;">
                <i class="fa-solid fa-circle-info"></i> Zamjy POS V.1.22
              </div>

              <div class="card card-primary">
                <div class="card-header bg-navy">
                  <h5 class="card-title m-0 font-weight-bold">PAYMENT</h5>
                </div>

                <div class="card-body">
                  <form method="post">

                    <div class="form-group">
                      <label for="">Order:</label>
                      <input type="number" class="form-control" name="order_total" value="<?php echo $order ?>.00" required>
                    </div>

                    <div class="form-group">
                      <label for="">Discount:</label>
                      <select name="less" class="form-control">
                        <option value="0">Select .. </option>
                        <option value="0.20">Pwd & Senior</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Customer Money:</label>
                      <input type="number" class="form-control" name="c_money" value="<?php echo $c_money ?>" required>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <button type="submit" name="calculate" class="btn btn-sm btn-primary btn-block">Calculate</button>
                        </div><br><br>
                      </div>
                      <div class="col-8">
                        <table class="table table-bordered">
                          <tr>
                            <td><small class="font-weight-bold">ORDER TOTAL: </small></td>
                            <td><strong class="ml-3"><?php echo $order ?>.00</strong></td>
                          </tr>
                          <tr>
                            <td><small class="font-weight-bold">VAT added 3%: </small></td>
                            <td> <strong class="ml-3"><?php echo $newTotal ?></strong></td>
                          </tr>
                          <tr>
                            <td><small class="font-weight-bold">DISCOUNT for PWD SENIOR 20%: </small></td>
                            <td> <strong class="ml-3"><?php echo $discountedtotal ?></strong></td>
                          </tr>
                          <tr>
                            <td><small class="font-weight-bold">GRAND TOTAL: </small></td>
                            <td> <strong class="ml-3"><?php echo $grandTotal ?></strong></td>
                          </tr>
                          <tr>
                            <td>
                              <small class="font-weight-bold">CHANGE:</small>
                            </td>
                            <td>
                              <?php if ($change < 0) { ?>

                                <h5 class="font-weight-bold text-danger ml-3">₱ <?php echo $change ?></h5><br>

                              <?php } else { ?>

                                <h5 class="font-weight-bold text-success ml-3">₱ <?php echo $change ?></h5><br>

                              <?php } ?>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>








                  </form>
                  <div class="form-group">
                    <a href="pay.php?id=<?php echo $db_order ?>" class="btn btn-block btn-success">PAY</a>
                  </div>
                </div>
              </div>

            </div>


            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <!-- /.col-md-6 -->
          <div class="col-4"></div>
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






  <!-- VOID MODAL -->



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
  function updateTotal() {
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
if (isset($_SESSION['status'])) {
?>

  <script>
    swal.fire("<?php echo $_SESSION['status']; ?> ", " ", "<?php echo $_SESSION['code']; ?>");
  </script>

<?php
  unset($_SESSION['status']);
  unset($_SESSION['code']);
}

?>