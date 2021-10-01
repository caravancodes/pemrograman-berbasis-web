<html>
<head>
<title>struktur kontrol</title>
</head>
<body>

Pilih kota : 
<select name = "pilih_kota">
	<?php 
		$kota[] = "jakarta";
		$kota[] = "bandung";
		$kota[] = "jogja";
		$kota[] = "solo";
		$kota[] = "semarang";
		$kota[] = "surabaya";

		$jmlArray = count($kota);
		for ($i = 0; $i < $jmlArray; $i++) {
			echo "<option value = $i> $kota[$i]";
		}
	?>
</select>
	
</body>
</html>
