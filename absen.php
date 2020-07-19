<?php 
if(isset($_POST["token"]) && isset($_POST["gambar"]) ) {

    include('../db_access.php');

    $gambar = $_POST['gambar'];
    $token = $_POST['token'];
    $waktu = $_POST['waktu'];
    $less_waktu = explode('.',$waktu);
    $waktu = $less_waktu[0];

    $namapic='gambar/'.$waktu.'.jpg';
    file_put_contents($namapic, base64_decode($gambar));

    $namapic = $waktu.'.jpg';

    $sql = "INSERT INTO log(token,foto,waktu) VALUES ('$token','$namapic','$waktu')";

    if (mysqli_query($conn,$sql)){    
        echo 'berhasil';
    }
    else{
        echo "Terjadi Kesalahan.<br>";          
    }
    echo $waktu;
    echo $token;
    echo $namapic;

}else{
    echo 'Error Request';
}


?>