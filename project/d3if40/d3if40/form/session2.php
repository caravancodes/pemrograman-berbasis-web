<?php
		session_start();		
?>
<html>
<head>
<title>sessions</title>
</head>
<body>
	<?php
        if(!isset($_SESSION["username"])) {
            echo "session belum register";
        }
        else {
            echo $_SESSION['username'];
        }
    ?>
</body>
</html>
