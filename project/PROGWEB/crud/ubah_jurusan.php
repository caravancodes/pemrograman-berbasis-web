<?php
    require_once('koneksi.php');
    
    $qry = mysqli_query($conn, "select * from jurusan where id_jur='TE'");
    $data = mysqli_fetch_array($qry);
?>

<form action="" method="post">
        <input type="text" name="id_jurusan" value="<?php echo $data['id_jur']; ?>">
        <input type="text" name="nama_jurusan" value="<?php echo $data['nama_jur']; ?>"> <input type="submit" value="Ubah">
</form>
    
<?php
    require_once('koneksi.php');

    if (isset($_POST['id_jurusan']) && isset($_POST['nama_jurusan']))
    {
        $id = $_POST['id_jurusan'];
        $jurusan = $_POST['nama_jurusan'];

        $sql = "update jurusan set nama_jur='".$jurusan."' where id_jur='".$id."'";

        if(mysqli_query($conn,$sql)) 
        {
            echo "Data jurusan berhasil diubah";
        }
        else 
        {
            echo "Gagal ubah data jurusan!";
        }
        mysqli_close($conn);
    }
?>                                           