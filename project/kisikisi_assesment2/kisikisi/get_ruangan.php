<?php
	include 'connection.php';
	$idGedung = $_GET['idGedung'];
	if(!$link){
		die("Koneksi gagal");
	}
	$sql = mysqli_query($link, "SELECT idRuangan FROM ruangan WHERE idGedung = '$idGedung'");
	
	if(mysqli_num_rows($sql) > 0){
		echo "<select name='idRuangan' id='idRuangan' class='form-control' required><option value=''>--Pilih Ruangan--</option>";
		while($data = mysqli_fetch_array($sql)){
			echo "<option value='".$data['idRuangan']."'>".$data['idRuangan']."</option>";
		}
		echo "</select>";
	}
?>