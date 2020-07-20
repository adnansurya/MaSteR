<?php 

if(isset($_POST["token"]) && isset($_POST["gambar"]) ) {

    include('db_access.php');

    $gambar = $_POST['gambar'];
    $token = $_POST['token'];
    

    $namapic='gambar/'.$timestamp.'.jpg';
    file_put_contents($namapic, base64_decode($gambar));

    $namapic = $timestamp.'.jpg';

    $sql = "INSERT INTO log (token,foto,waktu) VALUES ('$token','$namapic','$waktu')";    
    
    $resObj -> result = "";

    if (!mysqli_query($conn,$sql)){
        
        $resObj -> result = "error";
        $resObj -> data = "Error description: " . mysqli_error($conn);
                           
    }else{         
        
        $result = mysqli_query($conn,"SELECT * FROM siswa WHERE token='".$token."' LIMIT 1");                       
        $r = mysqli_fetch_assoc($result); 

        $data -> nama = $r['nama'];
        $data -> waktu = $waktu;
        
        $resObj -> result = "success";
        $resObj -> data = $data;

        echo json_encode($resObj);
    }
   

}else{
    echo 'Error Request';
}


?>