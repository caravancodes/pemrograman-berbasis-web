<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Faisal Amir</title>
		<style>
			*{
				font-family: arial;
			}
			table tr td {
				border: 1px grey solid;
				padding: 10px;
				font-size: 20px;
			}
			table tr th {
				border: 1px grey solid;
				padding: 5px;

			}

			span.Judul {
				font-size: 30px;
			}
			 input[type=button] {
			padding: 0px 20px;
			margin: 10px;
			border-radius: 5px;
			background-color: lightgrey;
			border: 1px solid grey;
			font-size: 20px;
			}
		</style>
	</head>
	<body>
		<center>
			<span class="Judul">DAFTAR MAHASISWA</span><br><hr>
			<a href="http://localhost/CodeCI/index.php/insert"><input type="button" name="insert" value="Insert"></a>
			<a href="http://localhost/CodeCI/index.php/view"><input type="button" value="View"></a>
		<table>
		<tr>
			<th>NO.</th>
			<th>NIM</th>
			<th>NAMA</th>
			<th>KELAS</th>
		</tr>	
			<?php
				$i = 1;
				foreach($mahasiswa as $show){
			?>
				<tr>
					<td><?php echo $i++;?>.</td>
					<td><?php echo $show->nim;?></td>
					<td><?php echo $show->nama;?></td>
					<td><?php echo $show->kelas;?></td>
				</tr>
			<?php
				}
			?>
		</table>
		</center>
	</body>
</html>