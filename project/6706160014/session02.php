<?php
session_start();
if (isset($_SESSION['oke'])) {
	echo "<h1>Selamat Datang " . $_SESSION['oke'] . "</h1>";
	echo "<h2>Halaman ini hanya bisa diakses jika anda sudah login</h2>";
	echo "<h2>KLIK <a href='session03.php'>di sini</a> untuk LOGOUTM</h2>"; 
} 
else {
	die ("BELUM LOGIN !!! Situ tidak berhak masuk ke halaman ini. Silahkan login <a href='TP6_1.php'>di sini</a>");
}
?>