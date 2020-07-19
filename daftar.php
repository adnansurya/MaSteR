<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php include('global.php'); ?>
<html lang="en">
<head>
 
  <?php include('partials/head.php'); ?>
  <title><?php echo $web_name; ?>  | Daftar</title>
  <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.css">
  
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
            <h1 class="m-0 text-dark"> Daftar</h1>           
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
              <form action="form/daftar.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row justify-content-md-center">
                    <h5 class="card-title">Form Pendaftaran</h5>
                  </div>                  
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tokenTxt">Token</label>
                        <input type="text" class="form-control" id="tokenTxt" placeholder="Masukkan Token" name="token">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="namaLengkapTxt">Nama Siswa</label>
                        <input type="text" class="form-control" id="namaTxt" placeholder="Masukkan Nama Lengkap" name="nama">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tglLahirTxt">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tglLahirTxt" placeholder="Tahun-Bulan-Tanggal (Contoh : 2000-10-31)" name="tglLahir">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="nisTxt">NIS</label>
                        <input type="text" class="form-control" id="nisTxt" placeholder="Masukkan NIS" name="nis">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="kelasTxt">Kelas</label>
                        <input type="text" class="form-control" id="kelasTxt" placeholder="Masukkan Kelas" name="kelas">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="noHpTxt">No. HP Siswa</label>
                        <input type="text" class="form-control" id="noHpTxt" placeholder="Masukkan Nomor Handphone" name="noHp">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="alamatTxt">Alamat Domisili</label>
                        <input type="text" class="form-control" id="alamatTxt" placeholder="Masukkan Alamat Rumah Tempat Tinggal" name="alamat">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="namaOrtuTxt">Nama Orang Tua</label>
                        <input type="text" class="form-control" id="namaOrtuTxt" placeholder="Masukkan Nama Lengkap Orang Tua" name="namaOrtu">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="hpOrtuTxt">No. HP Orang Tua</label>
                        <input type="text" class="form-control" id="hpOrtuTxt" placeholder="Masukkan Nomor Handphone Orang Tua" name="hpOrtu">
                      </div>
                    </div>                  
                  </div>
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto 3x4</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgFile" name="image">
                            <label class="custom-file-label" for="imgFile">Format JPG/PNG Maks. 1 MB</label>                            
                          </div>                          
                        </div>
                      </div> 
                    </div>                  
                  </div> 
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <img id="blah" src="#" alt="Preview" class="img-thumbnail"/>
                    </div>                  
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row justify-content-md-center">                 
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
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
  <script src="plugins/jquery-ui/jquery-ui.js"></script>  
  <script>
    $('#tglLahirTxt').datepicker({ dateFormat: 'yy-mm-dd' });

    function readURL(input) {

      if (input.files && input.files[0]) {
          var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgFile").change(function() {
      readURL(this);
    });      
  </script>
</body>
</html>
