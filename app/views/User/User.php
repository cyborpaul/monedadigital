<?php defined('BASEPATH') or exit('No se permite acceso directo'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuarios</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="/monedadigital/app/assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <!-- Theme style -->
  <link rel="stylesheet" href="/monedadigital/app/assets/dist/css/adminlte.min.css">
  <link href="/monedadigital/app/assets/css/dropzone.css" type="text/css" rel="stylesheet" />
  

  <?php require "app/views/Header/Header.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Recarga de moneda digital - usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Zona de recargas moneda virtual</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Monto de recarga</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Saldo actual</label>
                    <input type="text" class="form-control" id="actual" value="<?=$saldo?>" placeholder="S/. MONTO A RECARGAR" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Recarga</label>
                    <input type="text" class="form-control" id="saldo" value="" placeholder="S/. MONTO A RECARGAR">
                    <input type="text" class="form-control" style="display:none;"id="usuario" value="<?=$nombre?>">
                  </div>

                  <button class="btn btn-success" id="recargar">Recargar</button>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        </div>
        <!-- /.card -->

        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Subir comprobante de recarga</h3>
              </div>
              <div class="card-body">

              
                        <form action="/monedadigital/User/subirarchivo/" method="POST" class="dropzone"></form>
            
  
 <!-- 3 -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- /.card -->
          </div>
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

<script src="/monedadigital/app/assets/plugins/jquery/jquery.min.js"></script>
<script src="/monedadigital/app/assets/js/dropzone.min.js"></script>
<!-- Bootstrap 4 -->

<!-- AdminLTE App -->
<script src="/monedadigital/app/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/monedadigital/app/assets/dist/js/demo.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Page specific script -->

<script>

$(document).on('click', '#recargar', function(){
    var actual=$('#actual').val(); 
    var saldo= $('#saldo').val();  
    var usuario=$('#usuario').val();
    var final= parseFloat(actual)+parseFloat(saldo);

$.ajax({
    method:"POST",
    dataType : "json",
    data:{'id_jugador': usuario, 'saldo': final},
    url: 'User/level/',
    success: function(response){ 
      if(response=="Hola"){
        Swal.fire('Recarga exitosa');


      }
    }
}); 

});

function actualizar(){  

} 
</script>
</body>
</html>
