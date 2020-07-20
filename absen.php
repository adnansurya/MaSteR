<?php 

if(isset($_POST["token"]) && isset($_POST["gambar"]) ) {

    include('db_access.php');

    $gambar = $_POST['gambar'];
    $token = $_POST['token'];
    

    $namapic='gambar/'.$timestamp.'.jpg';
    file_put_contents($namapic, base64_decode($gambar));

    $namapic = $timestamp.'.jpg';

    $sql = "INSERT INTO log (token,gambar,waktu) VALUES ('$token','$namapic','$waktu')";    
    
    $resObj -> result = "";

    if (!mysqli_query($conn,$sql)){
        
        $resObj -> result = "error";
        $resObj -> data = "Error description: " . mysqli_error($conn);
                           
    }else{         
        
        $registered = mysqli_query($conn,"SELECT * FROM siswa WHERE token='".$token."'");
        
        if(mysqli_num_rows($registered) > 0){
            $r = mysqli_fetch_assoc($registered); 

            $data -> nama = $r['nama'];
            $data -> waktu = $waktu;
            
            $resObj -> result = "success";
            $resObj -> data = $data;
        }else{
            $resObj -> result = "unknown";
            $resObj -> data = $token;
        }
        

        echo json_encode($resObj);
    }
   

}else{
    echo 'Error Request';
}


?>