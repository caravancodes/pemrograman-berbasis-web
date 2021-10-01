<html>
<head>
<title>struktur kontrol</title>
</head>
<body>
	<?php 
		/*========== struktur kontrol  ================================*/
		
		/*========== 1. struktur kondisional ==========================*/
		/*========== if else ==========================================*/
		
		$nilai = 70;
		if ($nilai >= 70) {
			echo "anda lulus";
		}
		else {
			echo "anda tidak lulus";
		}
		
		echo "<br><br>";

		/*========== if elseif =======================================*/

		$kode_hari = date("w");
		if ($kode_hari == 0) {
			echo "ini hari minggu";
		}
		else if ($kode_hari == 1) {
			echo "ini hari senin";
		}
		else if ($kode_hari == 2) {
			echo "ini hari selasa";
		}
		else if ($kode_hari == 3) {
			echo "ini hari rabu";
		}
		else if ($kode_hari == 4) {
			echo "ini hari kamis";
		}
		else if ($kode_hari == 5) {
			echo "ini hari jumat";
		}
		else {
			echo "ini hari sabtu";
		}
				

		echo "<br><br>";	
	
		/*========== switch case =====================================*/
		
		$kode_bulan = date("m");		
		switch ($kode_bulan) {
			case 1:
				echo "ini bulan januari";
				break;
			case 2:
				echo "ini bulan februari";
				break;
			case 3:
				echo "ini bulan maret";
				break;
			case 4:
				echo "ini bulan april";
				break;
			case 5:
				echo "ini bulan mei";
				break;
			case 6:
				echo "ini bulan juni";
				break;
			case 7:
				echo "ini bulan juli";
				break;
			case 8:
				echo "ini bulan agustus";
				break;
			case 9:
				echo "ini bulan september";
				break;
			case 10:
				echo "ini bulan oktober";
				break;
			case 11:
				echo "ini bulan november";
				break;
			default:
				echo "ini bulan desember";
		}

	?>
</body>
</html>