<?php
		session_start();		
?>
<html>
<head>
<title>sessions</title>
</head>
<body>
	<?php
        $_SESSION["username"] = "asep";
        echo "session sudah di register";
    ?>
</body>
</html>
