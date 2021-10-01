<?php 
$user='root';   // user dari database saya
$server='localhost'; // name server
$pass=''; // password database
$database='test'; // nama database
mysqli_connect($server,$user, $pass, $database) or die('koneksi gagal');

?>
