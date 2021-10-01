<html>
<head>
<title>Hapus Mahasiswa</title>
</head>
<body>
	<form action="" method="post">
        NIM : <input type="text" name="nim_mhs"> <br><br>
		<input type="submit" value="Hapus"> 
	</form>
    <?php
        require_once('koneksi.php');
        if (isset($_POST['nim_mhs'])) {
            
            $nim = $_POST['nim_mhs'];
            //query untuk hapus data
            $sql = "delete from mahasiswa where nim=$nim";

            //eksekusi query
            if(mysqli_query($conn,$sql)) {
                echo "Data mahasiswa berhasil dihapus";
            }
            else {
                echo "Gagal menghapus data mahasiswa";
            }

            mysqli_close($conn);
        }
    ?>
	
</body>
</html>
