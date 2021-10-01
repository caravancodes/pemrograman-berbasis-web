<!DOCTYPE html>
<html>
<head>
	<title>Lihat Data-2062</title>
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
			 <li role="presentation" class="active"><a href="lihatdata.php">Lihat Data</a></li>
			 <li role="presentation"><a href="cari.php">Cari</a></li>
			 <li role="presentation"><a href="update.php">Update</a></li>
		</ul>
		<div id="content">
			<form class="form-horizontal" method="post">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">NIM</label>
				    <div class="col-sm-10">
				      <select class="form-control" name="data">
						  <option value="mahasiswa">Data Mahasiswa</option>
						  <option value="buku">Data Buku</option>
						  <option value="pinjam">Data Peminjaman</option>
					  </select>
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="submit">Lihat Data</button>
					</div>
  				</div>
			</form>
			<?php
				if(isset($_POST['submit'])){
					$data=$_POST['data'];
					$query="Select * from $data";
					$hasil=$conn->query($query);
					$i=1;
					if ($_POST['data']=="mahasiswa"){
						?>
						<table class="table">
							<tr>
								<td>No</td>
								<td>NIM</td>
								<td>Nama</td>
							</tr>
							<?php
								foreach ($hasil as $value) {
									$nim=$value['NIM'];
									$nama=$value['Nama_mhs'];
									?>
									<tr>
										<td><?php echo "$i"; ?></td>
										<td><?php echo "$nim"; ?></td>
										<td><?php echo "$nama"; ?></td>
									</tr>
									<?php
									$i++;
								}
							?>
						</table>
						<?php
					}elseif($_POST['data']=="buku"){
						?>
						<table class="table">
							<tr>
								<td>No</td>
								<td>ID_Buku</td>
								<td>Nama Buku</td>
								<td>Pengarang</td>
								<td>Tahun Terbit</td>
							</tr>
							<?php
								foreach ($hasil as $value) {
									$id=$value['Id_buku'];
									$nama_bk=$value['Nama_buku'];
									$pengarang=$value['Pengarang'];
									$thn=$value['Thn_terbit'];
									?>
									<tr>
										<td><?php echo "$i"; ?></td>
										<td><?php echo "$id"; ?></td>
										<td><?php echo "$nama_bk"; ?></td>
										<td><?php echo "$pengarang"; ?></td>
										<td><?php echo "$thn"; ?></td>
									</tr>
									<?php
									$i++;
								}
							?>
						</table>
						<?php
					}else{
						?>
						<table class="table">
							<tr>
								<td>No</td>
								<td>ID_Peminjaman</td>
								<td>Tgl Peminjaman</td>
								<td>NIM</td>
								<td>Id_Buku</td>
							</tr>	
							<?php
								foreach ($hasil as $value) {
									$id_pinjam=$value['Id_peminjaman'];
									$tgl=$value['Tgl_pinjam'];
									$nim=$value['NIM'];
									$id_buku=$value['Id_buku'];
									?>
									<tr>
										<td><?php echo "$i"; ?></td>
										<td><?php echo "$id_pinjam"; ?></td>
										<td><?php echo "$tgl"; ?></td>
										<td><?php echo "$nim"; ?></td>
										<td><?php echo "$id_buku"; ?></td>
									</tr>
									<?php
									$i++;
								}
							?>
						</table>
						<?php
					}
				}
			?>
		</div>
	</div>
</body>
</html>