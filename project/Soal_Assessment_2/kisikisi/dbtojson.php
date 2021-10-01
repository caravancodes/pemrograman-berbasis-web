<?php
	include "connection.php";
	$query = mysqli_query($link,"SELECT * FROM pinjamruangan");
	$datapinjam = array();
	$data = array();
	$contents = array();

/*
	foreach($query as $row) {
		$contents[] = $row;
	}
*/

	while($row = mysqli_fetch_array($query)) {
		$contents[] = array(
			'idpeminjaman' => ''.$row['idPeminjaman'].'',
			'namapeminjam' => ''.$row['namaPeminjam'].'',
			'notelp' => ''.$row['noTelp'].'',
			'idruangan' => ''.$row['idRuangan'].'',
			'tglpeminjaman' => ''.$row['tglPeminjaman'].''
		);
	}

	$data['data'] = $contents;
	$datapinjam['datapinjam'] = $data;

	$json_data = json_encode($datapinjam, JSON_PRETTY_PRINT);
	echo $json_data;
	file_put_contents('datapinjam_other.json', $json_data); //export to "data.json"
?>
