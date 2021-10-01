<?php
	session_start();
    if(isset($_SESSION['usr']) && isset($_SESSION['pwd'])) {
?>
<html>
<head>
<title>Halaman Admin</title>
</head>
<body>
<br>
<div align="center">
<h2>Halaman Administrator</h2>
<font size="2" color="silver">&copy; 2017 [Fery]</font>
<hr>
    | <a href="tambah_mhs.php">Tambah Mahasiswa</a> 
    | <a href="view_mhs.php">Daftar Mahasiswa</a> 
    | <a href="tambah_jur.php">Tambah Jurusan</a> 
    | <a href='logout.php'>Logout</a> |
<hr>
</div>
</body>
</html>

<?php
}
	else
	{
  		header("location:login.php");
	}
?>
