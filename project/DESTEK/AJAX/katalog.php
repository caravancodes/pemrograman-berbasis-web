<?php 
$judul = $_GET['judul'];
$conn = new mysqli("localhost", "root", "", "6706160014");
$read = "Select * from peminjaman where judul='$judul'";
$query = $conn->query($read);
$name = $query->fetch_array();
            echo'
            <table class="isi">
                <tr>
                    <td>Kode Buku</td>
                    <td>Nama</td>
                    <td>NIM</td>
                    <td>Kelas</td>
                    <td>Tanggal Pinjam</td>
                    <td>Judul Buku</td>
                    <td>Cover</td>
                </tr>
            ';
            ?>
            <?php
                foreach ($query as $lihat) {
                echo'
                <tr>
                    <td>'.$lihat['kodeBuku'].'</td>
                    <td>'.$lihat['nama'].'</td>
                    <td>'.$lihat['nim'].'</td>
                    <td>'.$lihat['kelas'].'</td>
                    <td>'.$lihat['tglPinjam'].'</td>
                    <td>'.$lihat['judul'].'</td>
                    <td><img src="images/'.$lihat['foto'].' /></td>
                </tr>
                ';
                }
            echo'</table>';
            $close = $conn->close();
            ?>