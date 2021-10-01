<!DOCTYPE html>
<html>
<head>
	<title>Input Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<?php include("config.php");?>
</head>
<body>
	<div id="container">
		<ul class="nav nav-pills nav-stacked sidebar">
			 <li role="presentation"><a href="index.php">Tambah Mahasiswa</a></li>
			 <li role="presentation"><a href="buku.php">Tambah Buku</a></li>
			 <li role="presentation"><a href="pinjam.php">Peminjaman Buku</a></li>
			 <li role="presentation"><a href="hapusmhs.php">Hapus Mahasiswa</a></li>
			 <li role="presentation"><a href="hapusbuku.php">Hapus Buku</a></li>
			 <li role="presentation" class="active"><a href="hapuspeminjaman.php">Hapus Peminjaman</a></li>
			 <li role="presentation"><a href="#">Cari</a></li>
			 <li role="presentation"><a href="#">Update</a></li>
		</ul>
		<div id="content">
			<form class="form-horizontal" method="post" action="deletebuku.php">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">ID Buku</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="ID Buku" name="id_buku">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">Hapus Buku</button>
					</div>
  				</div>
			</form>
		</div>
	</div>
</body>
</html>