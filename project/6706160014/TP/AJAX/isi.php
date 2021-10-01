<?php 
/*$judul = $_GET['judul'];
$conn = new mysqli("localhost", "root", "", "6706160014");
$read = "Select * from peminjaman where judul='$judul'";
$query = $conn->query($read);*/
$i = 1;
    $judul=$_GET['judul'];
    $koneksi=mysqli_connect("localhost","root","","6706160014");
    $sql=mysqli_query($koneksi,"select * from peminjaman where judul= '$judul'");
            echo'
            <table class="isi">
                <tr>
                    <td>No.</td>
                    <td>Kode Buku</td>
                    <td>Nama</td>
                    <td>NIM</td>
                    <td>Kelas</td>
                    <td>Tanggal Pinjam</td>
                    <td>Judul Buku</td>
                    <td>Cover</td>
                </tr>';
                while ($lihat=mysqli_fetch_array($sql)) {
                /*while ($lihat=$query->fetch_array()) {*/
                echo'
                <tr>
                    <td>'.$i.'.</td>
                    <td>'.$lihat['kodeBuku'].'</td>
                    <td>'.$lihat['nama'].'</td>
                    <td>'.$lihat['nim'].'</td>
                    <td>'.$lihat['kelas'].'</td>
                    <td>'.$lihat['tglPinjam'].'</td>
                    <td>'.$lihat['judul'].'</td>
                    <td><img src="images/'.$lihat['foto'].'" /></td>
                </tr>';
                $i++;
                }
            echo'</table>';
            mysqli_close($koneksi);
?>