<!DOCTYPE html>
<html>
	<head>
		<title>Input Peminjaman</title>
		<link rel="stylesheet" type="text/css" href="css/sidebar.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

		<script src="ajax.js"></script>
	</head>
	<body>
		<div id="container">
			<ul class="nav nav-pills nav-stacked sidebar">
				 <li role="presentation" class="active"><a href="index.php">Tambah Peminjaman</a></li>
				 <li role="presentation"><a href="dbtoxml.php">DB to XML</a></li>
				 <li role="presentation"><a href="dbtojson.php">DB to JSON</a></li>
				 <li role="presentation"><a href="xmlparse.php">View XML</a></li>
				 <li role="presentation"><a href="jsonparse.php">View JSON</a></li>
			</ul>
			<div id="content">
				<form class="form-horizontal" method="post" action="insert_peminjaman.php">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Nama Mahasiswa</label>
						<div class="col-sm-6">
								<input type="text" class="form-control" id="namaPeminjam" name="namapeminjam" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">No. Telp</label>
						<div class="col-sm-6">
								<input type="text" class="form-control" id="noTelp" name="noTelp" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Tanggal Peminjaman</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" id="tglPeminjaman" name="tglPeminjaman" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label"></label>
						<div class="col-sm-6">
							<select name="idGedung" id="idGedung" class="form-control" onChange="showRuang(this.value)" required>
								<option>--Pilih Gedung--</option>
								<?php
									include 'connection.php';
									$sql = mysqli_query($link, "SELECT * FROM gedung");
									while($data = mysqli_fetch_array($sql)){
										echo "<option value='".$data['idGedung']."'>".$data['namaGedung']."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label"></label>
						<div class="col-sm-6">
							<div id="divRuangan"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label"></label>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-primary" name="submit">Submit</button>
							<button type="reset" class="btn btn-default" name="reset">Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
