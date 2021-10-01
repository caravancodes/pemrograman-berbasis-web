<html>
<head>
<title>struktur kontrol</title>
</head>
<body>
	<?php 
		/*========== 1. fungsi built-in  ==================*/
		
		//fungsi aritmatik --------------------------------------
		$a = pow(2,10);    //Fungsi perpangkatan
		$b = sqrt(100);    //Fungsi akar - square root (kuadrat)
		$c = ceil(4.25);   //Pembulatan keatas
		$d = floor(4.25);  //Pembulatan kebawah
	
		echo "2 pangkat 10 = $a <br>";
		echo "akar 100 = $b <br>";
		echo "pembulatan keatas 4.25 = $c <br>";
		echo "pembulatan kebawah 4.25 = $d <br>";
			
		echo "<br><br>";
		
		//fungsi date ---------------------------------------------
		echo date("d/m/Y H:i:s") . "<br>"; 
		echo date("F j, Y, g:i a") . "<br>"; 
		echo date("d.m.Y") . "<br>";
		echo date("Ymd") . "<br>";
		
		echo "<br><br>";

		//fungsi string ------------------------------------------------------
		$str = "Belajar PHP ternyata Menyenangkan";
		echo $str;
		echo "<br>";
		echo strtolower($str); //Ubah huruf ke kecil semua
		echo "<br>";
		echo strtoupper($str); //Ubah huruf ke besar semua
		echo "<br>";
		echo str_replace("Menyenangkan","mudah lho",$str); //Mengganti string
		
		echo "<br><br>";

		//split string ---------------------------------------------------------
		$alamat = "Jalan Bojongsoang Bandung 40288";
		$splitAlamat  = explode(" ", $alamat);
		
		echo $splitAlamat[3];
		
		echo "<br><br>";

		//fungsi strip_tags, htmlspecialchars, htmlentities ---------------------
		$salam = "<b><i>Hello Udin how are u?</i></b>";
		
		echo $salam. "<br>";
		
		echo strip_tags($salam). "<br>";
		
		echo htmlspecialchars($salam). "<br>";
		echo htmlentities($salam). "<br>";
	

	?>

</body>
</html>
