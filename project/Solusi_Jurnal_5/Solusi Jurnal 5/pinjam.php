<!DOCTYPE html>
<html>
<head>
	<title>Pinjam Buku-2062</title>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<?php include("config.php");?>
</head>
<body>
	<div id="container">
		<ul class="nav nav-pills nav-stacked sidebar">
			 <li role="presentation"><a href="index.php">Tambah Mahasiswa</a></li>
			 <li role="presentation"><a href="buku.php">Tambah Buku</a></li>
			 <li role="presentation" class="active"><a href="pinjam.php">Peminjaman Buku</a></li>
			 <li role="presentation"><a href="hapusmhs.php">Hapus Mahasiswa</a></li>
			 <li role="presentation"><a href="hapusbuku.php">Hapus Buku</a></li>
			 <li role="presentation"><a href="lihatdata.php">Lihat Data</a></li>
			 <li role="presentation"><a href="cari.php">Cari</a></li>
			 <li role="presentation"><a href="update.php">Update</a></li>
		</ul>
		<div id="content">
			<form class="form-horizontal" method="post">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">NIM</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="NIM" name="nim">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">ID Buku</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="ID Buku" name="id_buku">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
					</div>
  				</div>
			</form>
			<?php
				if (isset($_POST['tambah'])) {
					include("config.php");
					$nim=$_POST['nim'];
					$id_buku=$_POST['id_buku'];
					$tgl=date('y-m-d');
					$query="Insert into pinjam values('','$tgl','$nim','$id_buku')";
					if($conn->query($query)==true){
						?>
						<script type="text/javascript">alert('Data berhasil ditambah!');</script>
						<?php
					}else{
						?>
						<script type="text/javascript">alert('Gagal!');</script>
						<?php
					}
				}
			?>
		</div>
	</div>
</body>
</html>