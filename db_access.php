<?php
$host="localhost";
$username="admin";
$password="makassar";
$databasename="MaSteR_db";
$conn=mysqli_connect($host,$username,$password,$databasename);

$date = new DateTime("now", new DateTimeZone('Asia/Makassar') );
$waktu = $date->format('Y-m-d H:i:s');
$timestamp = date_timestamp_get($date);

if(!$conn){
    echo 'Database Access Denied';
}
?>