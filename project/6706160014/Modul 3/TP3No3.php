<!DOCTYPE html>
<html>
	<head>
		<title>TPMod3No3</title>
	</head>
	<body>
		<?php
			echo '
				<form action="TP3No3.php" method="POST"> 
					Nama : <input type="text" name="nama"><br><br>
					NIM : <input type="text" name="nim"><br><br>
					String : <input type="text" name="tulisan"><br><br>
					<input type="submit"><br><br>
				</form>
			';
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$nama=$_POST['nama'];
				$nim=$_POST['nim'];
				$tulisan=$_POST['tulisan'];
				$angkatan=substr($nim, 4,2);
				$tanggal=date("j F Y");
				$pjg=strlen($tulisan);
				$kebalik=strrev($tulisan);
				$up=strtoupper($tulisan);
				$edit="<b><u><i>$tulisan</i></u></b>";
				?>
				<table border="1">
				<?php
				echo "
					<tr>
						<td>Nama</td>
						<td>$nama</td>
					</tr>
					<tr>
						<td>NIM</td>
						<td>$nim</td>
					</tr>
					<tr>
						<td>Angkatan</td>
						<td>20$angkatan</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>$tanggal</td>
					</tr>
					<tr>
						<td>String Asli</td>
						<td>$tulisan</td>
					</tr>
					<tr>
						<td>Panjang String</td>
						<td>$pjg</td>
					</tr>
					<tr>
						<td>String Dibalik</td>
						<td>$kebalik</td>
					</tr>
					<tr>
						<td>Uppercase</td>
						<td>$up</td>
					</tr>
					<tr>
						<td>Bold, Italic, Underline</td>
						<td>$edit</td>
					</tr>
				";
				?>
				</table>
				<?php
			}
		?>
	</body>
</html>