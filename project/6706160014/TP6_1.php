<?php
session_start();
if (isset($_POST['oke'])) {
	$nama = $_POST['nama'];
	$nim = $_POST['nim'];
	//periksa login
	if ($nama == "amir" && $nim == "123") {
		//menciptakan session
		$_SESSION['oke'] = $nama;
		//menuju ke halaman
		echo '
		<h2>KLIK <a href="session02.php"> disini</a>
		untuk menuju ke halaman pmeriksaan session
		';
	} 
}
	else {
?>

<html>
	<head>
		<title></title>
	</head>
	<body>	
		<center>
		<br><br><br><br>
			<h1>LOGIN UNTUK MEMULAI SESION</h1>
			<form action="" method="POST">
				<table>
					<tr>
						<td>Nama</td>
						<td><input type="text" name="nama"></td>
					</tr>
					<tr>
						<td>Nim</td>
						<td><input type="password" name="nim"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="oke" value="Log in"></td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>
	<?php } ?>