<html>
<head>
<title>cookies</title>
</head>
<body>
    
    <form action="" method="get">
    <input type ="text" name="key_cari">
    <input type ="submit" value="Cari">
    </form>
    
    <?php
        $durasi = time()+60;
        if (isset($_GET['key_cari'])) {
            setcookie("history_pencarian",$_GET['key_cari'],$durasi);   
        }
        //else {
        //    setcookie("history_pencarian","0 history",$durasi); 
        //}
    
        if (isset($_COOKIE['history_pencarian'])) {
			echo $_COOKIE['history_pencarian'];		
		}
		//else {
		//	echo "cookies pencarian telah dihapus!";
		//}
    ?>
    
</body>
</html>
