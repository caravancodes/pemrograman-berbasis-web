<html>
<head>
<title>operator perbandingan - logika - string</title>
</head>
<body>
	<?php 
		$x = 9;
		$y = 2;

		/*========== operator perbandingan ==================*/

		printf ("%d", $x < $y);
		echo "<br>";

		printf ("%d", $x > $y);
		echo "<br>";

		printf ("%d", $x <= $y);
		echo "<br>";

		printf ("%d", $x >= $y);
		echo "<br>";

		printf ("%d", $x == $y);
		echo "<br>";

		printf ("%d", $x != $y);
		echo "<br>";

		
		/*========== operator logika ==================*/

		//AND
		$z = 0;
		if ($x > $y && $z == 0)
		{
			echo "kondisi 1 : true";
		}
		else
		{
			echo "kondisi 1 : false";
		}
		echo "<br>";
		
		//OR
		if ($x > $y || $z == 1)
		{
			echo "kondisi 2 : true";
		}
		else
		{
			echo "kondisi 2 : false";
		}
		echo "<br>";

		//XOR
		if ($x < $y XOR $z == 1)
		{
			echo "kondisi 3 : true";
		}
		else
		{
			echo "kondisi 3 : false";
		}
		echo "<br>";		
		
		//NEGASI
		if (!($x > $y && $z == 1))
		{
			echo "kondisi 4 : true";
		}
		else
		{
			echo "kondisi 4 : false";
		}
		echo "<br>";


		/*=========== cara 1 =================================*/
		$teks1 = "saya sedang belajar";
		$teks2 = "pemrograman php";
		echo $teks1."&nbsp;".$teks2;

		/*=========== cara 2 ==================================*/
		//$teks1 = "saya sedang belajar";
		//$teks2 = "pemrograman php";
		//echo "{$teks1} {$teks2}";
	
	?>
</body>
</html>
