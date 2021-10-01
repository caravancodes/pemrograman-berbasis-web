<?php
		$durasi = time()+30; //set cookie selama 30 detik
		setcookie("cookie_test","string ini disimpan dalam cookies",$durasi);			
?>
<html>
<head>
<title>cookies</title>
</head>
<body>
	<a href="view.php">klik disini untuk melihat test cookies</a>
</body>
</html>
