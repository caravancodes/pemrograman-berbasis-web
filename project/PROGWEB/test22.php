<html>
<head>
<title>struktur kontrol</title>
</head>
<body>
	<?php 
		/*========== struktur kontrol  ==================*/
		
		/*========== 2. struktur perulangan  ==================*/
		/*========== while ==================*/

		$a = 5;
		while ($a > 0) {
			echo $a;
			$a--;
		}
		
		echo "<br><br>";
		
		/*========== do while ==================*/
		
		$b = 0;
		do {
			echo $b;
			$b++;
		} while ($b <= 5);	
		
		echo "<br><br>";

		/*========== for ==================*/
		
		for ($c = 0; $c < 5; $c++) 
		{
			echo $c;
		}

		echo "<br><br>";

		//menampilkan array dengan perulangan for
		$kota[] = "jakarta"; //0
		$kota[] = "bandung"; //1
		$kota[] = "semarang"; //ignore
		$kota[] = "surabaya";
		$kota[] = "jogja";
		$kota[] = "solo";		

		$jmlArray = count($kota);
		for ($i = 0; $i < $jmlArray; $i++) {	

			if ($i == 2) {
				//break;
				continue;
			}
			
			echo ($i + 1).". ".$kota[$i];
			echo "<br>";
		}

		echo "<br><br>";


		/*========== foreach ==================*/
		
		//foreach ($kota as $test) {
		
		foreach ($kota as $a => $b) {		
			
			echo "indeks : $a adalah $b";
			
			//echo "$test";	
			echo "<br>";
		}

	?>
</body>
</html>


// 03
// for select html

// 02
// for select html

// 04
// for select html

