<?php
    require_once('koneksi.php');
    require_once('adminpage.php');
?>
<html>
<head>
<title></title>
</head>
<body>
<br>
<div align="center">
<h4>Form Tambah Jurusan</h4>
    <form method="post" action="">
        <table>
            <tr>
                <td align="right">ID Jurusan : </td>
                <td><input type="text" name="id_jurusan" size="4"></td>
            </tr>
            <tr>
                <td align="right">Nama Jurusan : </td>
                <td><input type="text" name="nm_jurusan"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah" name="t_jur"></td>
            </tr>
        </table>
    </form>
    
    <?php
        //if (isset($_POST['id_jurusan']) && isset($_POST['nm_jurusan']))
        if (isset($_POST['t_jur']))
        {
            $id = $_POST['id_jurusan'];
            $jurusan = $_POST['nm_jurusan'];
            
            if (!empty($id) && !empty($jurusan))
            {  
                $sql = "insert into jurusan (id_jur, nama_jurusan) values ('$id', '$jurusan')";

                if(mysqli_query($conn,$sql)) 
                {
                    echo "<font color='blue'>Data jurusan berhasil ditambah</font>";
                }
                else 
                {
                    echo "<font color='red'>Gagal tambah data jurusan!</font>";
                }
            }
            else
            {
                echo "<font color='red'>ID dan Jurusan tidak boleh kosong!</font>";
            }

            mysqli_close($conn);
        }
    ?>
    
</div>
</body>
</html>
