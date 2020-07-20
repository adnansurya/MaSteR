<!DOCTYPE html>
<html lang="en">
<?php include('global.php'); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Fixed Sidebar</title>

  <?php include('partials/head.php'); ?>  
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include('partials/admin_topbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include('partials/admin_sidebar.php'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Log</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">              
              <div class="card-body">
              <div class="table-responsive">                
                  <table id="logTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Token</th>
                        <th>Waktu</th>                        
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>NIS</th>
                        <th>Tgl. Lahir</th>                                            
                        <th>No.HP</th>
                        <th>Alamat</th>
                        <th>Nama Ortu</th>
                        <th>HP Ortu</th>
                        <th>Mulai</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        include('db_access.php');
                        // $load = mysqli_query($conn, "SELECT log.token, log.id_log, log.gambar, log.waktu, siswa.nama, siswa.nis, siswa.kelas, siswa.tglLahir, siswa.noHP, siswa.alamat, siswa.namaOrtu, siswa.noHpOrtu, siswa.timestamp, siswa.foto FROM log INNER JOIN siswa ON log.token = siswa.token ORDER BY id_log DESC");
                        $load = mysqli_query($conn, "SELECT * FROM log LEFT JOIN siswa ON log.token = siswa.id_token ORDER BY log.id_log");
                        
                        while ($row = mysqli_fetch_array($load)){
                          echo '<tr>';
                          echo '<td>'.$row['id_log'].'</td>';
                          echo '<td>'.$row['token'].'</td>';
                          echo '<td><a href="http://'.$server.'/gambar/'.$row['gambar'].'">'.$row['waktu'].'</a></td>';
                          echo '<td><a href="http://'.$server.'/foto/'.$row['foto'].'">'.$row['nama'].'</a></td>';                        
                          echo '<td>'.$row['kelas'].'</td>';
                          echo '<td>'.$row['nis'].'</td>'; 
                          echo '<td>'.$row['tglLahir'].'</td>'; 
                          echo '<td>'.$row['noHp'].'</td>';
                          echo '<td>'.$row['alamat'].'</td>';  
                          echo '<td>'.$row['namaOrtu'].'</td>'; 
                          echo '<td>'.$row['noHpOrtu'].'</td>';  
                          echo '<td>'.$row['timestamp'].'</td>';                                               
                          echo '</tr>';
                        }    
                        
                                          
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->             
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('partials/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include('partials/scripts.php'); ?>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>  
  <script>
     $(function () {
      $("#logTable").DataTable({
        "responsive": true
      });
     
      
     });  
   
  </script>


</body>
</html>
