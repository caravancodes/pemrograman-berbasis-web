<?php
    //================= koneksi PDO dengan object-oriented ===============
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=dbdemo", $username, $password);
        
        //tangkap PDO error dengan catch
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "koneksi berhasil"; 
    }
    catch(PDOException $e) {
        echo "koneksi gagal: " . $e->getMessage();
    }
?>
