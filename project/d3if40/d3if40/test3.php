<html>
<head>
<title>array</title>
</head>
<body>
	<?php 
		/*------------------------cara 1-----------------------------------------*/
		//jika tidak disertai indeks/key, dimulai dari 0 dan +1 untuk selanjutnya
			
		$kota[] = "jakarta";
		$kota[] = "bandung";
		$kota[] = "jogja";
		$kota[] = "semarang";

		//tampilkan array	
		echo "elemen 0 : $kota[0] <br>";
		echo "elemen 1 : $kota[1] <br>";
		echo "elemen 2 : $kota[2] <br>";
		echo "elemen 3 : $kota[3] <br>";	
	
		/*------------------------cara 2-----------------------------------------*/
		//indeks tidak harus dimulai dari 0
		
		//$kota[8] = "jakarta";
		//$kota[9] = "bandung";
		//$kota[5] = "jogja";
		//$kota[] = "semarang";	
		
		/*
		 $kota[] indeks yg digunakan berupa indeks tertinggi dari 
		  elemen array yg sudah terbentuk
		*/


		//echo "elemen 8 : $kota[8] <br>";
		//echo "elemen 9 : $kota[9] <br>";
		//echo "elemen 5 : $kota[5] <br>";
		//echo "elemen 10 : $kota[10] <br>";



		/*------------------------cara 3-----------------------------------------*/
		
		//$kota = array("jakarta", "bandung", "jogja", "semarang");
		
		//$kota = array(1 => "jakarta", "bandung", "jogja", "semarang");
		
		//$kota = array("jakarta", 5 => "bandung", "jogja", "semarang");
		
		
		//echo "elemen 0 : $kota[0] <br>";
		//echo "elemen 5 : $kota[5] <br>";
		//echo "elemen 6 : $kota[6] <br>";
		//echo "elemen 7 : $kota[7] <br>";
		

		/*------------------menghitung jumlah elemen array-----------------------*/
		echo count($kota);
		//printf ("jumlah elemen array adalah %d", count($kota));
	?>
</body>
</html>
