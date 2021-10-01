<?php
    require_once('koneksi.php');
    require_once('adminpage.php');
    if (isset($_GET['nim_mhs'])) {

        $nim = $_GET['nim_mhs'];
        $sql = "delete from mahasiswa where nim='$nim'";

        if(mysqli_query($conn,$sql)) {
            header("location:view_mhs.php");
        }
        else {
            echo "<br><br>";
            echo "<div align='center'><font color='red'>Gagal menghapus data mahasiswa.</font></div>";
        }

        mysqli_close($conn);
    }
?>
