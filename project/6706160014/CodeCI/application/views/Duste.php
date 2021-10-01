<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>Faisal Amir</title>
	<style>
		* {
			font-family: arial;
			font-size: 40px;
		}
		table tr td span {
			float: right;
			padding-right: 25px;
		}

		table tr td input[type=submit], input[type=button] {
			padding: 0px 20px;
			margin-left: 30px;
			border-radius: 5px;
			background-color: gery;
			border: 1px solid grey;
		}

table tr td {
	padding: 10px 0px;
}

		table tr td input[type=submit]:hover , input[type=button]:hover {
			box-shadow: 0px 2px 2px 2px lightgrey;
		}
	</style>
	</head>
	<body>
		<center>
			<span>PROGRAM MAHASISWA</span><br><hr><br>
			<form action="<?php echo base_url(). '/index.php/insert/inject';?>" method="POST">
				<table>
					<tr>
						<td><span>NIM</span></td>
						<td><input type="text" name="nim"></td>
					</tr>
					<tr>
						<td><span>NAMA</span></td>
						<td><input type="text" name="nama"></td>
					</tr>
					<tr>
						<td><span>KELAS</span></td>
						<td><input type="text" name="kelas"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="insert" value="Insert"><a href="http://localhost/CodeCI/index.php/view"><input type="button" value="View"></a></td>
					</tr>
				</table>
			</form>
			<a href="<?php echo base_url(). '/index.php/insert/inject';?>"></a>
		</center>
	</body>
</html>