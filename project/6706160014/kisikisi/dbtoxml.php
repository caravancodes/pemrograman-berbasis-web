<?php
	include "connection.php";
	$query = mysqli_query($link, "SELECT * FROM pinjamruangan");
	$datapinjam = new SimpleXMLElement('<datapinjam/>');

	while($row = mysqli_fetch_array($query)) {
			$data = $datapinjam->addChild('data');
			$data->addChild("idpeminjaman", "".$row['idPeminjaman']."");
			$data->addChild("namapeminjam", "".$row['namaPeminjam']."");
			$data->addChild("nohp", "".$row['noTelp']."");
			$data->addChild("idruangan", "".$row['idRuangan']."");
			$data->addChild("tglpeminjaman", "".$row['tglPeminjaman']."");
	}

	Header('Content-type: text/xml');
	print($datapinjam->asXML());
	file_put_contents('datapinjam.xml',$datapinjam->saveXML()); //export to "data.xml"
?>
