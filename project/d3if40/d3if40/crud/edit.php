<?php
    require_once('koneksi.php');

    //query untuk update data
    $sql = "update mahasiswa set alamat='Makasar' where nim=123";

    //eksekusi query
    if(mysqli_query($conn,$sql)) {
        echo "Data mahasiswa berhasil diubah";
    }
    else {
        echo "Gagal mengubah data mahasiswa";
    }

    mysqli_close($conn);
?>
