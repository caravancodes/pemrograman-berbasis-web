<?php
    require_once('koneksi.php');

    //query untuk hapus data
    $sql = "delete from mahasiswa where nim=456";

    //eksekusi query
    if(mysqli_query($conn,$sql)) {
        echo "Data mahasiswa berhasil dihapus";
    }
    else {
        echo "Gagal menghapus data mahasiswa";
    }

    mysqli_close($conn);
?>
