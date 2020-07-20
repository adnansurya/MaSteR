<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include('global.php'); ?>
<html lang="en">
<head>
 
  <?php include('partials/head.php'); ?>
  <title><?php echo $web_name; ?>  | Log</title> 
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('partials/topbar.php'); ?>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Log</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">              
              <div class="card-body">
                <div class="table-responsive">                
                  <table id="logTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Log ID</th>
                        <th>Waktu</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>NIS</th>                                            
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        include('db_access.php');
                        $load = mysqli_query($conn, "SELECT log.id_log, log.gambar, log.waktu, siswa.nama, siswa.nis, siswa.kelas, siswa.foto FROM log INNER JOIN siswa ON log.token = siswa.id_token ORDER BY id_log DESC");   
                        while ($row = mysqli_fetch_array($load)){
                          echo '<tr>';
                          echo '<td>'.$row['id_log'].'</td>';
                          echo '<td><a href="http://'.$server.'/gambar/'.$row['gambar'].'">'.$row['waktu'].'</a></td>';
                          echo '<td><a href="http://'.$server.'/foto/'.$row['foto'].'">'.$row['nama'].'</a></td>';                        
                          echo '<td>'.$row['kelas'].'</td>';
                          echo '<td>'.$row['nis'].'</td>';                                                
                          echo '</tr>';
                        }                      
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Main Footer -->
  <?php include('partials/footer.php'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

  <?php include('partials/scripts.php') ?>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
     $(function () {
      $("#logTable").DataTable({
        "responsive": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }            
        ]
      });
     });
  </script>
</body>
</html>
