<?php
include('connect.php');
$read = "Select * from peminjaman";
$i = 1;
$query = $conn->query($read);
$name = $query->fetch_array();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>AJAX</title>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>
        <center>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: <?php echo $name['nama']; ?> </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: <?php echo $name['kelas']; ?></td>
                </tr>
                <tr>
                    <td>Nim</td>
                    <td>: <?php echo $name['nim']; ?></td>
                </tr>
            </table><br>

                <form action="" method="POST">
                    Pilih Buku
                    <select>
                        <option>--Pilih Judul Buku--</option>
                        <option value="A1">One Piece</option>
                        <option value="A2">Fairy Tail</option>
                        <option value="A3">Naruto</option>
                        <option value="A4">Doraemon</option>
                        <option value="A5">Detektif Conan</option>
                    </select><br><br>
                    <b>--Informasi Peminjaman Buku Akan Tampil Disini--</b>
                </form>

            <table class="isi">
                <tr>
                    <td>No</td>
                    <td>Kode Buku</td>
                    <td>Nama</td>
                    <td>NIM</td>
                    <td>Kelas</td>
                    <td>Tanggal Pinjam</td>
                    <td>Judul Buku</td>
                    <td>Cover</td>
                </tr>
                <?php
                foreach ($query as $lihat) {
                    ?>
                <tr>
                    <td><?php echo "$i" . "."; ?></td>
                    <td><?php echo $lihat['kodeBuku']; ?></td>
                    <td><?php echo $lihat['nama']; ?></td>
                    <td><?php echo $lihat['nim']; ?></td>
                    <td><?php echo $lihat['kelas']; ?></td>
                    <td><?php echo $lihat['tglPinjam']; ?></td>
                    <td><?php echo $lihat['judul']; ?></td>
                    <td><?php echo "<img src='images/" . $lihat['foto'] . "' />"; ?></td>
                </tr>
                <?php 
                $i++;
                }
                ?>
            </table>
        </center>
    </body>
</html>