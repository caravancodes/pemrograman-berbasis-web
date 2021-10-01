<!DOCTYPE HTML>
<html>
<head>
<title></title>
</head>
<body>
<?php
if(isset($_GET['oke'])) {
$nilai = $_GET['nilai'];
function uji($nilai) {
if ($nilai>=50) {
	echo "<font size ='10'>Nilai $nilai : Sukses</font> <br>";
	echo "<font size ='10'>Klik <a href='JURNAL2.php'>ini</a><font size ='10'> untuk mengulang</font></font>";
}
 else {
	echo "<font size ='10'>Nilai ----SALAH----</font><br>";
	echo "<font size ='10'>Klik <a href='JURNAL2.php'>ini</a><font size ='10'> untuk mengulang</font></font>";
}
}
uji($nilai);
}
?>
</body>
</html>