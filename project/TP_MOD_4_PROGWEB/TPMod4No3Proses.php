<!DOCTYPE html>
<html>
	<head>
		<title>TPMod4No3Proses</title>
	</head>
	<body>
		<?php
			error_reporting(0);
			$nama=$_POST['nama'];
			$nim=$_POST['nim'];
			$kelas=$_POST['kelas'];
			$gender=$_POST['gender'];
			$komen=$_POST['komen'];
			if (isset($_POST['sbt'])) {
				if (empty($nama)) {
					echo "Maaf Anda harus ngisi nama terlebih dahulu";
				}
				elseif (empty($nim)) {
					echo "Maaf Anda harus ngisi nim terlebih dahulu";
				}
				elseif ($kelas=="kosong") {
					echo "Maaf Anda harus ngisi kelas terlebih dahulu";
				}
				elseif (empty($gender)) {
					echo "Maaf Anda harus ngisi Jenis Kelamin terlebih dahulu";
				}
				elseif (empty($komen)) {
					echo "Maaf Anda harus ngisi Komentar terlebih dahulu";
				}
				else{
					echo "Hai, $nama semangat Modul 4 dan selamat mengerjakan Tugas Pendahuluan<br><b>NIM</b> : $nim<br><b>Kelas</b> : $kelas<br><br><b>Jenis Kelamin</b> : $gender<br><br><b>Comments</b> : $komen";
				}
			}
			else{
				echo "Anda tidak mengisi dari form, silahkan mengisi lewat form <a href=TPMod4No3.php>ini</a>";
			}
		?>
	</body>
</html>