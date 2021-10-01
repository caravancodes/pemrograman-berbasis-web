<!DOCTYPE html>
<html>
	<head>
		<title>CI Leh Uga</title>
	</head>
	<body>
		<h1>Upload File</h1>
		<form action="http://localhost/6706160053/TP/modul10/index.php/welcome/upload" method="POST" enctype="multipart/form-data">
			<p>Judul : <input type="text" name="judul"></p>
			<p>Upload Gambar : <input type="file" name="gambar"></p>
			<br><input type="submit" name="sbt" value="Upload File">
		</form>
		<div class="align" align="center">
		</div>
		<?php
		if ($hasil==""){
			echo '<h1 align="center">Tidak ada data boy</h1>';
		}
		else{
			?>
			<h1 align="center">Data Pada Tabel</h1>
			<table border="1" align="center">
				<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Gambar</th>
				</tr>
				<?php
				$a=1;
				foreach ($hasil as $data){
					echo'
					<tr>
						<td>'.$a++.'</td>
						<td>'.$data->judul.'</td>
						<td><img src="http://localhost/6706160053/TP/modul10/'.$data->gambar.'" height="150px" width="300px"></td>
					</tr>
					';
				}
			?>
			</table>
		<?php
		}
		?>
	</body>
</html>