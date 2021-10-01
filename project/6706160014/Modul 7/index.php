<?php
	$koneksi=mysqli_connect("localhost","root","","6706160014");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TP Modul 7</title>
		<script src="ajax.js"></script>
	</head>
	<body>
		<form>
			<div align="center">
				<p>Nama : Hudio Hizari<br>NIM : 6706160053<br>Kelas : D3IF-40-02</p>
				Pilih Buku
				<select onchange="tampil(this.value)">
					<?php
					$qry=mysqli_query($koneksi,"select * from peminjaman group by judul");
					while ($dataQry=mysqli_fetch_array($qry)) {
						echo '<option value="'.$dataQry['judul'].'">'.$dataQry['judul'].'</option>';
					}
					?>
				</select>
			</div>
		</form>
		<div align="center" id="kosong"><b>Informasi Peminjaman Buku akan tampil disini</b></div>
	</body>
</html>