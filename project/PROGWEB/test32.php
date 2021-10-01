<html>
<head>
<title>struktur kontrol</title>
</head>
<body>
	<?php 
		/*========== 1. fungsi udf  ==================*/
		
		// membuat fungsi tanpa parameter =====================================
		function tulis1() {
			echo "Tulisan ini menggunakan fungsi";
			//disini adalah perintah2 fungsi
		}

		tulis1();
		
		echo "<br><br>";

		tulis1();

		echo "<br><br>";

		// membuat fungsi dengan satu parameter ===============================
		function tulis2($test2) {
			echo $test2;
		}
		
		tulis2("test fungsi 2");
	
		echo "<br><br>";

		tulis2("ini adalah fungsi yg kedua");

		echo "<br><br>";

		// membuat fungsi dengan banyak parameter ==============================
		function tulis3($tulisan, $warna, $ukuran)
		{
			echo "<font color=\"$warna\" size=\"$ukuran\">$tulisan</font>";
		}

		tulis3("Tulisan ini menggunakan fungsi tulis3","blue",5);

		echo "<br><br>";

		tulis3("Test fungsi ketiga","red",4);

		echo "<br><br>";
		
		echo "<br><br>";


		// membuat fungsi luas (mengembalikan nilai) ============================
		function luas($panjang, $lebar)
		{
			$hasil = $panjang * $lebar;
			return $hasil;
			//echo $hasil;
		}

		echo luas(10,5);
		echo "<br><br>";

		echo luas(30,5);
		
		echo "<br><br>";
	
		// passing by value dan by reference (&a) ==============================
		$a=5;

		function ubahVariabel($a) {
			return $a=10;
		}

		ubahVariabel($a);
		echo $a;

		echo "<br><br>";


		// get ip =================================================================
		function ip_client() {
			return $_SERVER['REMOTE_ADDR'];
		}

		echo ip_client();
	?>
</body>
</html>
