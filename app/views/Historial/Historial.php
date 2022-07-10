<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Historial</title>

  <?php require "app/views/Header/Header.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Historial de consultas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Historial de compras</li>
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
                <h3 class="card-title">Historial de Recargas</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    <h3 class="card-title"><strong>Total de recargas:</strong> <?= $total?></h3>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap ">
                <thead>
                    <tr>
                      <th>N°</th>
                      <th>Monto</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query = "SELECT * FROM inventalogame_historial WHERE usu_int_id='$nombre'  ORDER BY his_varchar_fecha DESC";
                      $mysqli = new mysqli(HOST, USER, PASSWORD, DB_NAME);                 
                      $result_tasks = mysqli_query($mysqli, $query);
                      $contador=1;
                      while($row = mysqli_fetch_assoc($result_tasks)) {
                    ?>
                  <tr>
                    <td><?php echo $contador ?></td>
                    <td>S/. <?php echo $row['his_varchar_monto']; ?></td>
                    <td><?php echo $row['his_varchar_fecha']; ?></td>
                  </tr>
                  <?php $contador++;} ?>
                  </tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

          <!-- /.col -->

          <!-- /.col -->

        <!-- /.row -->
        
        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div>
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Movimientos realizados</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                    
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                      <th>N°</th>
                      <th>Concepto</th>
                      <th>Monto</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query = "SELECT * FROM inventalogame_movimientos WHERE usu_int_id='$nombre' ORDER BY mov_varchar_date DESC";
                      $mysqli = new mysqli(HOST, USER, PASSWORD, DB_NAME);                 
                      $result_tasks = mysqli_query($mysqli, $query);
                      $contador=1;
                      while($row = mysqli_fetch_assoc($result_tasks)) {
                    ?>
                  <tr>
                    <td><?php echo $contador ?></td>
                    <td><?php echo $row['mov_varchar_concepto']; ?></td>
                    <td style="color:red;"><strong>S/. <?php echo $row['mov_varchar_evento']; ?></strong></td>
                    <td><?php echo $row['mov_varchar_date']; ?></td>
                  </tr>
                  <?php $contador++;} ?>
                  </tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

          <!-- /.col -->

          <!-- /.col -->

        <!-- /.row -->
        
        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div>
    </section>

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
<script src="/monedadigital/app/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/monedadigital/app/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/monedadigital/app/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/monedadigital/app/assets/dist/js/demo.js"></script>
</body>
</html>
