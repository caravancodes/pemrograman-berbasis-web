<?php
    require_once('koneksi.php');

    if (isset($_POST['id_jurusan'])) 
    {
        $id = $_POST['id_jurusan'];
        
        $sql = "delete from jurusan where id_jur='$id'";

        if(mysqli_query($conn,$sql)) {
            echo "Data jurusan berhasil dihapus";
        }
        else {
            echo "Gagal menghapus data jurusan";
        }

        mysqli_close($conn);    
    }
?>