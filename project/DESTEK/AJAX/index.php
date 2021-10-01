<?php
$conn = new mysqli("localhost", "root", "", "6706160014");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>AJAX</title>
        <link rel="stylesheet" type="text/css" href="css.css">
        <script src="ajax.js"></script>
    </head>
    <body>
        <center>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: MUHAMMAD FAISAL AMIR</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: D3IF-40-02</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: 6706160014</td>
                </tr>
            </table><br>
                <form>
                    Pilih Buku
                    <select onchange="show(this.value)">
                        <option>--Pilih Judul Buku--</option>
	                    <?php
                        $query=$conn->query("select * from peminjaman group by judul");
                        while ($take=$query->fetch_array()) {
                            echo '<option value="'.$take['judul'].'">'.$take['judul'].'</option>';
                        }
                        ?>
                    </select><br><br>                   
                </form>
                <div id="duste">--Informasi Peminjaman Buku Akan Tampil Disini--</div>
        </center>
    </body>
</html>