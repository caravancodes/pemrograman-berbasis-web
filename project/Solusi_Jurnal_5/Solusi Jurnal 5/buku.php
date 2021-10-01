<!DOCTYPE html>
<html>
<head>
	<title>Input Buku-2062</title>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<?php include("config.php");?>
</head>
<body>
	<div id="container">
		<ul class="nav nav-pills nav-stacked sidebar">
			 <li role="presentation"><a href="index.php">Tambah Mahasiswa</a></li>
			 <li role="presentation" class="active"><a href="buku.php">Tambah Buku</a></li>
			 <li role="presentation"><a href="pinjam.php">Peminjaman Buku</a></li>
			 <li role="presentation"><a href="hapusmhs.php">Hapus Mahasiswa</a></li>
			 <li role="presentation"><a href="hapusbuku.php">Hapus Buku</a></li>
			 <li role="presentation"><a href="lihatdata.php">Lihat Data</a></li>
			 <li role="presentation"><a href="cari.php">Cari</a></li>
			 <li role="presentation"><a href="update.php">Update</a></li>
		</ul>
		<div id="content">
			<form class="form-horizontal" method="post">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Nama Buku</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Buku" name="nama_bk">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Pengarang</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Buku" name="pengarang">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Tahun Terbit</label>
				    <div class="col-sm-10">
				      <input type="number" class="form-control" id="inputEmail3" placeholder="Tahun Terbit" name="thn">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
					</div>
  				</div>
			</form>
			<?php
				include("config.php");
				if (isset($_POST['tambah'])) {
					$nama_bk=$_POST['nama_bk'];
					$pengarang=$_POST['pengarang'];
					$thn=$_POST['thn'];
					$query="Insert into buku values('','$nama_bk','$pengarang',$thn)";
					$tambah=$conn->query($query);
					if($tambah==true){
						?>
						<script type="text/javascript">alert('Data berhasil ditambahkan!');</script>
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