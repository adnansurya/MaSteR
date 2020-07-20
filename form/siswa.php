<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

include("../db_access.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);


if ($input['action'] === 'edit') {    
    mysqli_query($conn, 
    "UPDATE siswa SET id_token='" . $input['id_token'] . "', nama='" . $input['nama'] . "', tglLahir='" . $input['tglLahir'] . "', nis='" . $input['nis'] . "'
     , kelas='" . $input['kelas'] . "', noHp='" . $input['noHp'] . "', alamat='" . $input['alamat'] . "', namaOrtu='" . $input['namaOrtu'] . "'
     , noHpOrtu='" . $input['noHpOrtu'] . "', foto='" . $input['foto'] . "'
     WHERE id_siswa='" . $input['id_siswa'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($conn, "DELETE from siswa WHERE id_siswa='" . $input['id_siswa'] . "'");
    header('Location: ../admin_siswa.php'); 
    mysqli_close($conn);
} else if ($input['action'] === 'restore') {
    mysqli_query($koneksi, "UPDATE tbl_brand SET deleted=0 WHERE id_brand='" . $input['id_brand'] . "'");
}

mysqli_close($conn);