<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="" method="GET">
Nama : <input type="text" name="nama"><br><br>
NIM  : <input type="text" name="nim"><br><br>
Kelas : <select name="kelas">
	<option value="">Pilih</option>
	<option value="D3IF-39-01">D3IF-39-01</option>
	<option value="D3IF-39-02">D3IF-39-02</option>
	<option value="D3IF-39-03">D3IF-39-03</option>
	<option value="D3IF-39-04">D3IF-39-04</option>
	<option value="D3IF-39-05">D3IF-39-05</option>
	<option value="D3IF-40-01">D3IF-40-01</option>
	<option value="D3IF-40-02">D3IF-40-02</option>
	<option value="D3IF-40-03">D3IF-40-03</option>
	<option value="D3IF-40-04">D3IF-40-04</option>
</select><br><br>
Gender : <input type="radio" name="gender" value="male"> Laki - Laki
<input type="radio" name="gender" value="female"> Perempuan
<br><br><br>
Your Comment : <br>
<textarea name="comment" rows="10" cols="40">
</textarea>
<br>
<input type="submit" name="submit" value="OKE">
</form>

<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
	$nama = $_GET['nama'];
	$nim = $_GET['nim'];
	$kelas = $_GET['kelas'];
	$gender = $_GET['gender'];
	$komen	= $_GET['comment'];
	$submit = $_GET['submit'];
	
?>

</body>
</html>