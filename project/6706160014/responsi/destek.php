<?php
include ('connect.php');
$gedung = "select * from gedung";
$qgedung = $conn->query($gedung);
?>
<html>
    <head>
    <script></scirpt>
    </head>
    <body>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td><input type="text" name="telp"></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <select name="gedung">
                        <option>--Pilih Gedung--</option>
                        <?php 
                        while ($data = $qgedung->fetch_array()) {
                            echo '
                            <option value ="'.$data['idGedung'].'">'. $data['namaGedung'] .'</option>
                            ';
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="oke"></td>
                </tr>
            </table>
        </form>
    </body>
</html>

