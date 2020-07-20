<?php 

if(isset($_POST["token"]) && isset($_POST["gambar"]) ) {

    include('db_access.php');

    $gambar = $_POST['gambar'];
    $token = $_POST['token'];
    

    $namapic='gambar/'.$timestamp.'.jpg';
    file_put_contents($namapic, base64_decode($gambar));

    $namapic = $timestamp.'.jpg';

    $sql = "INSERT INTO log (token,foto,waktu) VALUES ('$token','$namapic','$waktu')";        

    if (!mysqli_query($conn,$sql)){
        echo "Terjadi Kesalahan.<br>"; 
        echo("Error description: " . mysqli_error($conn));         
    }else{
        echo 'berhasil';
    }
   

}else{
    echo 'Error Request';
}


?>