<?php
	session_start();
    if(isset($_SESSION['usr'])) {
		echo "selamat datang di halaman admin<br>";
		echo "<a href='logout.php'>Logout</a>";
	}
	else
	{
        //echo "kamu harus login dulu";
		header("location:login.php");
	}
?>