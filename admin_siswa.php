<?php include('global.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Fixed Sidebar</title>

  <?php include('partials/head.php'); ?>  
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  
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
            <h1>Siswa</h1>
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
                  <table id="siswaTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Token</th>                                               
                        <th>Nama</th>
                        <th>Tgl. Lahir</th> 
                        <th>NIS</th>
                        <th>Kelas</th>
                        
                                                                   
                        <th>No.HP</th>
                        <th>Alamat</th>
                        <th>Nama Ortu</th>
                        <th>HP Ortu</th>
                        <th>Foto</th>
                        <!-- <th>Mulai</th> -->
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        include('db_access.php');
                        // $load = mysqli_query($conn, "SELECT log.token, log.id_log, log.gambar, log.waktu, siswa.nama, siswa.nis, siswa.kelas, siswa.tglLahir, siswa.noHP, siswa.alamat, siswa.namaOrtu, siswa.noHpOrtu, siswa.timestamp, siswa.foto FROM log INNER JOIN siswa ON log.token = siswa.token ORDER BY id_log DESC");
                        $load = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id_siswa");
                        
                        while ($row = mysqli_fetch_array($load)){
                          echo '<tr>';
                          echo '<td>'.$row['id_siswa'].'</td>';
                          echo '<td>'.$row['id_token'].'</td>';                         
                          echo '<td>'.$row['nama'].'</a></td>'; 
                          echo '<td>'.$row['tglLahir'].'</td>';                                                 
                          echo '<td>'.$row['nis'].'</td>'; 
                          echo '<td>'.$row['kelas'].'</td>';
                          
                          echo '<td>'.$row['noHp'].'</td>';
                          echo '<td>'.$row['alamat'].'</td>';  
                          echo '<td>'.$row['namaOrtu'].'</td>'; 
                          echo '<td>'.$row['noHpOrtu'].'</td>';  
                          echo '<td>'.$row['foto'].'</td>';                                               
                          // echo '<td>'.$row['timestamp'].'</td>';                                               
                          echo '</tr>';
                        }    
                        
                                          
                    ?>
                    </tbody>
                  </table>
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
<script src="plugins/jquery-tabledit/jquery.tabledit.js"></script>
<script>
   
     
        $('#siswaTable').Tabledit({
            url: 'form/siswa.php',
            columns: {
                identifier: [0, 'id_siswa'],
                restoreButton: false,
                editable: [[1, 'id_token'], [2, 'nama'], [3, 'tglLahir'], [4, 'nis'], [5, 'kelas'], 
                [6, 'noHp'], [7, 'alamat'], [8, 'namaOrtu'], [9, 'noHpOrtu'], [10, 'foto']]
            },buttons: {
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: 'Hapus',
                    action: 'delete'
                },
                confirm: {
                    class: 'btn btn-sm btn-default',
                    html: 'Yakin?'
                },
                edit: {
                    class: 'btn btn-sm btn-info',
                    html: 'Edit',
                    action: 'edit'
                }
            },
        });

    
   
  </script>

</body>
</html>
