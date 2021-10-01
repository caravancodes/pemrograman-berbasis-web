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

<form action="" method="get">
    <font size="2" color="silver"><i>pencarian berdasarkan nama : </i></font>
    <input type="text" name="cari_mahasiswa"> <input type="submit" value="Cari"> 
    
</form>
    
<h4>Daftar Mahasiswa</h4>
    
    <table cellpadding="5" border="0" cellspacing="0" bordercolor="silver">
        <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>

        <?php
            if (isset($_GET['cari_mahasiswa'])) 
            {
                $cari_mhs = $_GET['cari_mahasiswa'];
            }
            
            if (empty($cari_mhs)) {
                $qry = mysqli_query($conn, "SELECT * from mahasiswa inner join jurusan on mahasiswa.id_jur=jurusan.id_jur");
            }
            else {
                $qry = mysqli_query($conn, "SELECT * from mahasiswa inner join jurusan on mahasiswa.id_jur=jurusan.id_jur where nama like '%".$cari_mhs."%'");
            }
            
            $no = 1;
            while ($data = mysqli_fetch_array($qry)) {
        ?>

            <tr>
                <td align="center"><?php echo $no; ?></td>
                <td><?php echo "<img src='photos/" . $data['foto'] . "' width='100px' height='100px'/>"; ?></td>
                <td align="center"><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nama_jurusan']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                    <a href="ubah_mhs.php?nim_mhs=<?php echo $data['nim']; ?>">Ubah</a> |
                    <a href="hapus_mhs.php?nim_mhs=<?php echo $data['nim']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                </td>
            </tr>

        <?php    
            $no++;
            }
        ?>

    </table>
</div>
</body>
</html>
