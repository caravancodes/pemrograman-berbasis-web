<html>
<head>
<title>cookies</title>
</head>
<body>
	<?php
		if (isset($_COOKIE['cookie_test'])) {
			echo $_COOKIE['cookie_test'];		
		}
		else {
			echo "cookies kamu telah expired!";
		}	
		
		//C:\Users\<your_username>\AppData\Local\Google\Chrome\User Data\Default\
	?>
</body>
</html>
