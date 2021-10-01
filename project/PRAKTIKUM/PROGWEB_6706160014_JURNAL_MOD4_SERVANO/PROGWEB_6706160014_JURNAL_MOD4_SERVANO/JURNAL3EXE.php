<html>
<head>
<title></title>
</head>
<body>
<?php
if(isset($_GET['login'])) {
	$id = $_GET['user'];
	$pw = $_GET['pass'];
	$idasli = "amir";
	$pwasli = "amir";
	
	if ($id != $idasli && $pw != $pwasli) {
		if ($id == null && $pw == null) {
			echo "<center><font size='50'>INPUTAN MASIH KOSONG</font></center>";
			echo "<center><font size ='10'><a href='JURNAL3.php'>LOGIN</a> Di Sini</font></center>";
		} else {
			echo "<center><font size='50'>USERNAME DAN PASSWORD SALAH</font></center>";
				echo "<center><font size ='10'><a href='JURNAL3.php'>LOGIN</a> Di Sini</font></center>";
		}
	} else if ($id == $idasli && $pw != $pwasli) {
			echo "<center><font size='50'>PASSWORD SALAH</font></center>";
				echo "<center><font size ='10'><a href='JURNAL3.php'>LOGIN</a> Di Sini</font></center>";
	} else if ($id != $idasli && $pw == $pwasli) {
			echo "<center><font size='50'>USERNAME SALAH</font></center>";
				echo "<center><font size ='10'><a href='JURNAL3.php'>LOGIN</a> Di Sini</font></center>";
	} else {
		echo "<center><font color='blue' size='50'>WELCOME Mr. AMIR</font></center>";
		echo "<center><font color='blue' size='10'>D3 TEKNIK INFORMATIKA</font></center><br>";
		echo "<center><font color='blue' size='10'>MUHAMMAD FAISAL AMIR</font></center>";
		echo "<center><font color='blue' size='10'>6706160014</font></center>";
		echo "<center><font color='blue' size='10'>D3IF-40-02</font></center>";
	}
}	

?>

</body>
</html>