<!DOCTYPE html>
<html>
	<head>
		<title>TPMod3No2</title>
	</head>
	<body>
	Nama  : Ahmad Dzaky Abrori<br>
	NIM	  : 6706160131<br>
	Kelas : D3IF-40-02<br><br>
		<form action="TP3No2.php" method="POST"> 
			<textarea name="kata"></textarea><br>
			<input type="submit" value="submit"></input><br><br>
		</form>
		<?php
			if(!empty($_POST)){
				$katanya=$_POST['kata'];
				$splitkata= strtok($katanya,".");
				while ($splitkata) {
					echo "$splitkata <br>";
					$splitkata = strtok(".");
				}
			}
		?>
	</body>
</html>