<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>
  <?php require "app/views/Header/Header.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>SALDO</th>
                    <th>Opciones</th>

                  </tr>
                  </thead>
                  <tbody id="tarjeta">
                  <?php
                      $query = "SELECT * FROM sanmarcos_usuarios";
                      $mysqli = new mysqli(HOST, USER, PASSWORD, DB_NAME);                 
                      $result_tasks = mysqli_query($mysqli, $query);
                      $contador=1;
                      while($row = mysqli_fetch_assoc($result_tasks)) {
                    ?>
                  <tr>
                    <td><?php echo $row['usu_txt_nombre']; ?></td>
                    <td><?php echo $row['usu_txt_apellido']; ?></td>
                    <td><?php echo $row['usu_txt_dni']; ?></td>
                    <td><?php echo $row['saldo']; ?></td>

                    <td>
                     <a href="/monedadigital/User/usuario/<?php echo $row['usu_int_id']; ?>">Recargar</a>
                     <a href="/monedadigital/Historial/usuario/<?php echo $row['usu_int_id']; ?>">Historial</a>
                    </td>
                  </tr>
                  <?php $contador++;} ?>
                    


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>SALDO</th>
                    <th>Opciones</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="app/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="app/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="app/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="app/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="app/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="app/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="app/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="app/assets/plugins/jszip/jszip.min.js"></script>
<script src="app/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="app/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="app/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="app/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="app/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="app/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="app/assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>