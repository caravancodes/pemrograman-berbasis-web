<?php
    //import file koneksi
    //include('koneksi1.php'); //baris code dibawahnya akan tetap dijalankan
    //require('koneksi1.php'); //baris code dibawahnya tidak akan dijalankan
    //include_once('koneksi1.php'); //memastikan file yg disertakan hanya dieksekusi sekali
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST') {
        
        $nim = $_POST['nim_mhs'];
        $nama = $_POST['nama_mhs'];
        $alamat = $_POST['almt_mhs'];

        //query untuk tambah data
        $sql = "insert into mahasiswa (nim, nama, alamat) values ('$nim', '$nama', '$alamat')";

        //eksekusi query
        if(mysqli_query($conn,$sql)) {
            echo "Data mahasiswa berhasil ditambah";
        }
        else {
            echo "Gagal tambah data mahasiswa";
        }

        //tutup database 
        mysqli_close($conn);
    }
?>
