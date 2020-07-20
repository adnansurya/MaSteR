<?php 
if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){

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

    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $temp = explode(".", $file_name);
    $newfilename = $timestamp . '.' . end($temp);

    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
        $logged = mysqli_query($conn,"SELECT * from log WHERE token='".$token."'");
        if(mysqli_num_rows($logged) > 0){        
        
            if(move_uploaded_file($file_tmp,"../foto/".$newfilename)){

                $sql = "INSERT INTO siswa(id_token, nama, tglLahir, nis, kelas, noHp, alamat, namaOrtu, noHpOrtu, foto, timestamp) VALUES 
                ('$token', '$nama', '$tglLahir', '$nis', '$kelas', '$noHp', '$alamat', '$namaOrtu', '$hpOrtu', '$newfilename' ,'$timestamp')";
                $result = mysqli_query($conn, $sql);
                
                if(!($result)){
                    echo 'Error query daftar';
                }else{
                    header('Location: ../index.php'); 
                }
            }else{
                echo "Kesalahan Upload File";
            }

            
        }else{            
            echo 'Token tidak dikenali. Tap Kartu pada Scanner untuk mendapatkan token';
        }        
        
    }else{
        print_r($errors);
    }
    
    

}else{
    echo "Data Tidak Lengkap";
}

?>