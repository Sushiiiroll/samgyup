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
<!-- ./wrapper -->


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>

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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "pdf" ]
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