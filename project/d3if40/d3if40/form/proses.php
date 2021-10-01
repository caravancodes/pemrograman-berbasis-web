<html>
<head>
<title>input variabel</title>
</head>
<body>
	<?php
		//method GET ========================================================
		//$nama = $_GET['nama_pemakai']; 
		//$alamat = $_GET['almt_pemakai']; 
		//echo "Hello nama saya: <b> $nama </b> <br>";
		//echo $alamat;

//		echo $_GET['nama_pemakai'];
//		echo "<br>";
//		echo $_GET['almt_pemakai']; 
	
		//method POST =======================================================
		//cek apakah variabel sudah di set atau belum
//		if (isset($_POST['nama_pemakai']) && isset($_POST['almt_pemakai']))
//		{
//			$nama = $_POST['nama_pemakai']; 
//			$alamat = $_POST['almt_pemakai']; 
//			echo "Hello nama saya: <b> $nama </b> <br>";
//			echo $alamat;
//		}
//		else
//		{
//			echo "isi lewat form html";
//		}
		
		//server request ====================================================
		//menghasilkan method yang dipakai untuk mengakses suatu halaman
		//cek apakah menggunakan post atau get
		/*if($_SERVER['REQUEST_METHOD']=='POST') 
		{
			$nama = $_POST['nama_pemakai']; 
			$alamat = $_POST['almt_pemakai']; 
			echo "Hello nama saya: <b> $nama </b> <br>";
			echo $alamat;
		}*/

		//cek apakah variabel yg sudah di set nilainya kosong atau tidak
		if (isset($_GET['nama_pemakai']) && isset($_GET['almt_pemakai']))
		{
			$nama = $_GET['nama_pemakai']; 
			$alamat = $_GET['almt_pemakai']; 	
		}
		else
		{
			echo "silahkan isi lewat form html";
		}

		if (!empty($nama) && !empty($alamat))
		{
			echo "Hello nama saya: <b> $nama </b> <br>";
			echo $alamat;
		}
		else
		{
			echo "nama harus di isi";
		}
	?>
</body>
</html>
