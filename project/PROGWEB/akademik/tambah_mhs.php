<?php
    require_once('koneksi.php');
    require_once('adminpage.php');
?>
<html>
<head>
<title></title>
</head>
<body>
<div align="center">
<h4>Form Tambah Mahasiswa</h4>
	<form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td align="right">NIM : </td>
                <td><input type="text" name="nim_mhs"></td>
            </tr>
            <tr>
                <td align="right">Nama : </td>
                <td><input type="text" name="nama_mhs"></td>
            </tr>
            <tr>
                <td align="right">Alamat : </td>
                <td><textarea name="almt_mhs" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td align="right">Upload Foto <font size="2" color="silver"><i>(maks 2MB)</i></font> : </td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td align="right">Jurusan : </td>
                <td>
                    <select name="jur">
                    <?php
                        $qry = mysqli_query($conn, "select id_jur, nama_jurusan from jurusan");
                        while ($row = mysqli_fetch_row($qry))
                        {
                            echo "<option value=$row[0]>$row[1]";
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
                    <input type="reset" value="Reset">
                    <input type="submit" value="Tambah" name="upload">
                </td>
            </tr>
        </table> 
	</form>
    
    <?php
        if(isset($_POST['upload'])) 
        {

            $nim = $_POST['nim_mhs'];
            $nama = $_POST['nama_mhs'];
            $alamat = $_POST['almt_mhs'];
            $idjur = $_POST['jur'];
            
            $nama_file = $_FILES['foto']['name'];
            $ukuran_file = $_FILES['foto']['size'];
            $tipe_file = $_FILES['foto']['type'];
            $tmp_file = $_FILES['foto']['tmp_name'];
            
            $waktu = date('His');
            $nama_file_baru = $waktu.$nama_file;
            $path = "photos/".$nama_file_baru;
            
            if (!empty($nim) && !empty($nama))
            {
                if($tipe_file == "image/jpeg" || $tipe_file == "image/png")
                {
                    if($ukuran_file <= 2000000)
                    {
                        move_uploaded_file($tmp_file, $path);
                        
                        $sql = "insert into mahasiswa (nim, nama, alamat, id_jur, foto) values ('$nim', '$nama', '$alamat', '$idjur', '$nama_file_baru')";
                        if(mysqli_query($conn,$sql)) 
                        {
                            echo "<font color='blue'>Data mahasiswa berhasil ditambah</font>";
                        }
                        else 
                        {
                            echo "<font color='red'>Gagal tambah data mahasiswa!</font>";
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
                echo "<font color='red'>NIM dan Nama tidak boleh kosong!</font>";
            }

            //mysqli_close($conn);
        }
    ?>
    
</div>
</body>
</html>
