<html>
<head>
<title>input variabel</title>
</head>
<body>
	<form method="post">
		Silahkan masukkan nama anda : <br>
		<input type="text" name="nama_pemakai"> <br><br>
		<input type="submit" value="Kirim"> 
	</form>
	
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST') 
		{
			$nama = $_POST['nama_pemakai'];
			//if ($nama != null)
			//{
				echo "<br>";
				echo $nama;
			//}
		}
	?>
</body>
</html>