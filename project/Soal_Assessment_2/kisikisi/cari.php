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
				 <li role="presentation"><a href="index.php">Tambah Peminjaman</a></li>
				 <li role="presentation" class="active"><a href="cari.php">Cari Mahasiswa</a></li>
			</ul>
			<div id="content">	
				<form class="form-horizontal"> 
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Nama Mahasiswa</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" onKeyup="showHint(this.value)" placeholder="Cari nama mahasiswa">
						</div>
						<br/>
						<br/>
						<label for="inputEmail3" class="col-sm-4 control-label">Suggestions</label>
						<div class="col-sm-6" style="margin-top:8px">
							<p id="txtHint"></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>