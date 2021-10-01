<?php
    require_once('koneksi.php');
    require_once('adminpage.php');
     
    $nim = $_GET['nim_mhs'];
    $qry = mysqli_query($conn, "select * from mahasiswa where nim='$nim'");
    $data = mysqli_fetch_array($qry);
?>
<html>
<head>
<title></title>
</head>
<body>
<div align="center">
<h4>Form Edit Mahasiswa</h4>
	<form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td align="right">NIM : </td>
                <td><input type="text" name="nim_mhs" value="<?php echo $data['nim']; ?>" readonly></td>
            </tr>
            <tr>
                <td align="right">Nama : </td>
                <td><input type="text" name="nama_mhs" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td align="right">Alamat : </td>
                <td><textarea name="almt_mhs" cols="30" rows="5"><?php echo $data['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td align="right">Upload Foto <font size="2" color="silver"><i>(maks 2MB)</i></font> : </td>
                <td>
                    <input type="radio" name="pilih_foto" value="foto_lama" checked="checked"> Foto Lama
                    <input type="radio" name="pilih_foto" value="foto_baru"> Upload Baru : <input type="file" name="foto">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php echo "<img src='photos/".$data['foto']."' width='100px' height='100px'/>"; ?>
                </td>
            </tr>
            <tr>
                <td align="right">Jurusan : </td>
                <td>
                    <select name="jur">
                    <?php
                        $qry = mysqli_query($conn, "select id_jur, nama_jurusan from jurusan");
                        while ($row = mysqli_fetch_row($qry))
                        {
                    ?>
                            <option value="<?php echo $row[0]; ?>" 
                                <?php
                                    if ($row[0] == $data['id_jur']) 
                                    {
                                        echo 'selected="selected"';
                                    } 
                                ?>> 
                                <?php echo $row[1]; ?> 
                            </option>
                    <?php
                        }
                    ?>    
                    </select>    
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="button" onclick="location.href='view_mhs.php';" value="Batal">
                    <input type="submit" value="Ubah" name="update">
                </td>
            </tr>
        </table> 
	</form>
    
    <?php
        if(isset($_POST['update'])) 
        {
            $nim = $_POST['nim_mhs'];
            $nama = $_POST['nama_mhs'];
            $alamat = $_POST['almt_mhs'];
            $idjur = $_POST['jur'];
            
            if ($_POST['pilih_foto'] == "foto_baru")
            {
                $nama_file = $_FILES['foto']['name'];
                $ukuran_file = $_FILES['foto']['size'];
                $tipe_file = $_FILES['foto']['type'];
                $tmp_file = $_FILES['foto']['tmp_name'];

                $waktu = date('His');
                $nama_file_baru = $waktu.$nama_file;
                $path = "photos/".$nama_file_baru;

                if (!empty($nama))
                {
                    if($tipe_file == "image/jpeg" || $tipe_file == "image/png")
                    {
                        if($ukuran_file <= 2000000)
                        {
                            move_uploaded_file($tmp_file, $path);

                            $sql = "update mahasiswa set nama='".$nama."', alamat='".$alamat."', id_jur='".$idjur."', foto='".$nama_file_baru."' where nim='".$nim."'";
                            if(mysqli_query($conn,$sql)) 
                            {
                                echo "<script>alert('Data mahasiswa berhasil diubah');document.location='view_mhs.php'</script>";
                            }
                            else 
                            {
                                echo "<font color='red'>Gagal ubah data mahasiswa!</font>";
                            }
                        }
                        else
                        {
                            echo "<font color='red'>Maaf, ukuran filenya terlalu besar.</font>";
                        }
                    }
                    else
                    {
                        echo "<font color='red'>Maaf, tipe filenya harus jpg/png.</font>";
                    }
                }
                else
                {
                    echo "<font color='red'>Nama tidak boleh kosong!</font>";
                }
            }
            
            else
            {
                if (!empty($nama))
                {
                    $sql = "update mahasiswa set nama='".$nama."', alamat='".$alamat."', id_jur='".$idjur."' where nim='".$nim."'";
                    if(mysqli_query($conn,$sql)) 
                    {
                        echo "<script>alert('Data mahasiswa berhasil diubah');document.location='view_mhs.php'</script>";
                    }
                    else 
                    {
                        echo "<font color='red'>Gagal ubah data mahasiswa!</font>";
                    }
                }
                else
                {
                    echo "<font color='red'>Nama tidak boleh kosong!</font>";
                }
            }
            
        }
    ?>
    
</div>
</body>
</html>
