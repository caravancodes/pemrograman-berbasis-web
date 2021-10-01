<?php
session_start();
if(isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$nim = $_POST['nim'];

	if ($nama == "amir" && $nim == "123") {
		$_SESSION['submit'] = $nama;
		echo '<h2>Masuk <a href="">halaman ini</a> untuk menuju halaman pemeriksaan sesion</h2>';
	} else {
		echo "ZONK";
	}
	}
	?>