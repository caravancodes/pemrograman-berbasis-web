<?php
if(isset($_POST['oke'])) {
    $nama = $_POST['name'];
    $nim = $_POST['nim'];
$siswa = array();
$siswa [] = array(
    'nama' => $nama,
    'nim' => $nim,
);
$doc = new DOMDocument();
$doc->formatOutput  = true;
$set = $doc->createElement("daftarMahasiswa");
$doc->appendChild( $set );
foreach ($siswa as $msiswa) {
    $build = $doc->createElement( "Mahasiswa" );
    $xmlnama = $doc->createElement( "nama" );
    $xmlnama->appendChild(
        $doc->createTextNode ( $msiswa['nama'] )
    );
    $build->appendChild( $xmlnama );
    $xmlnim = $doc->createElement( "nim" );
    $xmlnim->appendChild(
        $doc->createTextNode ( $msiswa['nim'] )
    );
    $build->appendChild( $xmlnim );
    $set->appendChild( $build );    
}
$doc->saveXML();
$doc->save("mahasiswa.xml");
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>XML</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <script>
function sukses() {
      if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
      }  else { 
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("perubahan").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET", "reload.php", true);
      xmlhttp.send();
}
    </script>
    </head>
    <body>    
        <center>
        MASUKKAN DATA MAHASISWA -- XML<br><hr><br>
        
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
                        <td></td>
                        <td><input type="submit" name="oke" value="SIMPAN" onclick="sukses()"></td>
                    </tr>               
                </table>
            </form>
            <div id="perubahan">
            <?php
            echo "SILAHKAN ISI DATA MAHASISWA INI";
            ?>
            </div>
        </center>
    </body>
</html>