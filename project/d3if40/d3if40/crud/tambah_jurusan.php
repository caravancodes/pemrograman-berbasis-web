<?php
    require_once('koneksi.php');

    if (isset($_POST['id_jurusan']) && isset($_POST['nama_jurusan']))
    {
        $id = $_POST['id_jurusan'];
        $jurusan = $_POST['nama_jurusan'];

        $sql = "insert into jurusan (id_jur, nama_jur) values ('$id', '$jurusan')";

        if(mysqli_query($conn,$sql)) 
        {
            echo "Data jurusan berhasil ditambah";
        }
        else 
        {
            echo "Gagal tambah data jurusan!";
        }
        mysqli_close($conn);
    }
?>