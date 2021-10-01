<?php
	$judul=$_GET['judul'];
	$koneksi=mysqli_connect("localhost","root","","6706160014");
	$sql=mysqli_query($koneksi,"select * from peminjaman where judul= '$judul'");
	echo '
	<table border="1">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>tglPinjam</th>
			<th>Cover</th>
			<th>Judul</th>
		</tr>
	';
 	while ($dataQry=mysqli_fetch_array($sql)) {
		echo '
		<tr>
			<td>'.$dataQry['nim'].'</td>
			<td>'.$dataQry['nama'].'</td>
			<td>'.$dataQry['kelas'].'</td>
			<td>'.$dataQry['tglPinjam'].'</td>
			<td><img width="150px" height="200px" src="'.$dataQry['foto'].'"></td>
			<td>'.$dataQry['judul'].'</td>
		</tr>
		';
	}
	echo "</table>";
	mysqli_close($koneksi);
?>