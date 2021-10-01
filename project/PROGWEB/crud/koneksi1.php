<?php
    //================= koneksi MySQLi dengan object-oriented ===============
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "dbdemo";

    //buat koneksi
    $conn = new mysqli($servername, $username, $password, $db);

    //cek koneksi
//    if ($conn->connect_error) {
//        die("koneksi gagal: " . $conn->connect_error);
//    } 
//    else {
//        echo "koneksi berhasil";    
//    }
    
?>
