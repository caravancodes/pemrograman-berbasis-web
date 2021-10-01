<html>
<head>
<title></title>
</head>
<body>
<?php

if(isset($_GET['oke'])) {
$angka1 = $_GET['angka1'];
$angka2 = $_GET['angka2'];
$tambah = $angka1 + $angka2;
$kurang = $angka1 - $angka2;
$kali = $angka1 * $angka2;
$bagi = $angka1 / $angka2;
echo "Hasil Penjumlahan : $tambah <br>";
echo "Hasil Kurang : $kurang <br> ";
echo "Hasil Kali : $kali <br> ";
echo "Hasil Bagi : $bagi <br>";
}
?>
</body>
</html>