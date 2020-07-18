<?php 
if(isset($_POST['submit'])){
    include('../db_access.php');

    $token = $_POST['token'];
    $nama =  $_POST['nama'];
    $tglLahir =  $_POST['tglLahir'];
    $nis = $_POST['nis'];
    $kelas =  $_POST['kelas'];
    $noHp = $_POST['noHp'];
    $alamat = $_POST['alamat'];
    $namaOrtu = $_POST['namaOrtu'];
    $hpOrtu = $_POST['hpOrtu'];
    
    $sql = "INSERT INTO siswa(token, nama, tglLahir, nis, kelas, noHp, alamat, namaOrtu, noHpOrtu, timestamp) VALUES 
    ('$token', '$nama', '$tglLahir', '$nis', '$kelas', '$noHp', '$alamat', '$namaOrtu', '$hpOrtu', '$timestamp')";
    $result = mysqli_query($conn, $sql);
    
    if(!($result)){
        echo 'Error query daftar';
    }

}

?>