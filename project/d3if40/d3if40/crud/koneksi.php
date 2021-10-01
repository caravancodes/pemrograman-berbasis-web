<?php
    //============= koneksi dengan MySQL dan MySQLi secara prosedural ==================
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "dbdemo"; 
    //buat database di phpmyadmin kmdn buat table mahasiswa
    //field nya nim, nama, alamat

    //buat koneksi
    //$conn = mysql_connect($servername, $username, $password);
    
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    //$conn = mysqli_connect("locahost", "root", "", "dbdemo");

    //cek koneksi
//    if (!$conn) {
//        //die("koneksi gagal");
//        die("koneksi gagal: " . mysqli_connect_error());
//    }
//    else {
//        echo "koneksi berhasil";
//    }

?>
