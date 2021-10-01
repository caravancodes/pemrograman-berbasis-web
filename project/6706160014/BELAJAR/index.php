<?php
include('connect.php');
$sql = "select * from toko";
$query = $conn->query($sql);
?>

<html>
    <head>
    <script src="ajax.js"></script>
    <script src="xml.js"></script>
    <script src="xmlparse.js"></script>
    <script src="json.js"></script>
    <script src="jsonparse.js"></script>

    </head>
    <body>
    <center>
    PEMBELIAN PERALATAN ASRAMA<br><br>
        <form method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Toko</td>
                    <td>
                        <select onChange="barang(this.value)">
                        <?php
                        while ($row = $query->fetch_array()) {
                            echo '
                            <option value="'.$row['id_toko'].'">'.$row['nama_toko'].'</option>
                            ';
                        }

                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Barang</td>
                    <td id="tdbarang">Pilih Toko</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="oke" value="INPUT"></td>
                </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['oke'])){
            $nama = $_POST['nama'];
            $barang = $_POST['barang'];
            $qin = "insert into pembelian values ('$nama','$barang')";
            $inject = $conn->query($qin);
            if ($inject) {
                echo 'Sukses';
            } else {
                echo 'Zonk';
            }
        }
        ?>
        <hr>
        <input type="submit" value="Jadi XML" onClick="jadi()">
        <input type="submit" value="Jadi JSON" onCLick="jjson()">
        <input type="submit" value="Tarik XML" onCLick="xmlparse()">
        <input type="submit" value="Tarik JSON" onCLick="jsonparse()">
        <br>
        <hr>
        <div id="xml">
        </div>
        <hr>
        <div id="json">
        </div>
        <hr>
        <div id="xmlparse">
        </div>
        <hr>
        <div id="jse">
        </div>
        <hr>
        </center>
    </body>
</html>