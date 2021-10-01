<!DOCTYPE html>
<html>
    <head>
    <title>JSON</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>    
        <center>
        MASUKKAN DATA MAHASISWA -- JSON<br><hr><br>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>NAMA</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td><input type="text" name="nim"></td>
                    </tr>
                    <tr>
                        <td>KELAS</td>
                        <td><input type="text" name="kelas"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="oke" value="SIMPAN"></td>
                    </tr>               
                </table>
                <?php
                    if(isset($_POST['oke'])) {
                        $nama = $_POST['name'];
                        $nim = $_POST['nim'];
                        $kelas = $_POST['kelas'];
                        $array = Array (
                            "0" => Array (
                                "name" => "$nama",
                                "nim" => "$nim",
                                "kelas" => "$kelas",));
                        $json = json_encode(array('data' => $array));
                        if (file_put_contents("mhs_data.json", $json))
                        echo "INPUT DATA BERHASIL";
                        else
                        echo "OOPS!! TERJADI ERROR saat Membuat File JSON...";
                    }
                    ?>
            </form>
        </center>
    </body>
</html>