<?php
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		$ambil = $_GET['id_siswa'];
		$sql_siswa = "select * from siswa where id_siswa = $ambil";
		$query_siswa = $conn->query($sql_siswa);
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="../../css/template.css">
		<link rel="stylesheet" type="text/css" href="../../css/add.css">
		<link rel="stylesheet" type="text/css" href="../../css/font/flaticon.css">
		<link rel="icon" href="../images/logo.png">
	</head>
	<body>
		<header>
			<ul class="navbar">
			  <li><a href="../../php/logout_guru.php">Keluar<i class="flaticon-close"></i></a></li>
			  <li><a href="../profil_guru.php"><?php echo $data['nama_guru']; ?><i class="flaticon-user-3"></i></a></li>
			</ul>
		</header>
		<?php require_once('../body_part/sidebar_edit.php') ?>
		<div class="content">	
			<div class="gambar">
			</div>
			<div class="isijudul">
			UBAH DATA SISWA
			</div>
			<div class="isi">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="form">
                <?php
                while ($r_siswa = $query_siswa->fetch_array()) {
                ?>
                    <tr>
						<td><span>Id Siswa</span></td>
						<td><input type="text" name="id_siswa" value="<?php echo $r_siswa['id_siswa'] ?>" disabled></td>
					</tr>
                    <tr>
						<td><span>Password</span></td>
						<td><input type="text" name="password" value="<?php echo $r_siswa['password'] ?>"></td>
					</tr>
					<tr>
						<td><span>Nama</span></td>
						<td><input type="text" name="nama" value="<?php echo $r_siswa['nama_siswa'] ?>"></td>
					</tr>
					<tr>
						<td><span>Jurusan</span></td>
						<td>
  							<input type="radio" name="jurusan" value="MIA" checked>MIA
  							<input type="radio" name="jurusan" value="IIS">IIS
						</td>
                    </tr>
					<tr>
						<td><span>Kelas</span></td>
						<td>
							<input type="radio" name="kelas" value="10" checked>10
							<input type="radio" name="kelas" value="11">11
							<input type="radio" name="kelas" value="12">12
						</td>
                    </tr>
					<tr>
						<td><span>Tempat Lahir</span></td>
						<td><input type="text" name="tempat" value="<?php echo $r_siswa['tempat_lahir'] ?>"></td>
					</tr>
					<tr>
						<td><span>Tanggal Lahir</span></td>
						<td><input type="date" name="date" value="<?php echo $r_siswa['tanggal_lahir'] ?>"></td>
					</tr>
					<tr>
                        <td><span>Alamat</span></td>
						<td><input type="text" name="alamat" value="<?php echo $r_siswa['alamat_siswa'] ?>"></td>
					</tr>
                    <tr>
						<td><span>Jenis Kelamin</span></td>
						<td>
							<input type="radio" name="gender" value="Laki-Laki" checked>Laki-Laki
  							<input type="radio" name="gender" value="Perempuan">Perempuan
						</td>
					</tr>
                    <tr>
                        <td><span>No. Telepon</span></td>
						<td><input type="text" name="no_telp" value="<?php echo $r_siswa['no_telp'] ?>"></td>
					</tr>
					<tr>
						<td><span>Upload Foto</span></td>
						<td><input type="file" name="foto"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" class="tombol" name="upload" value="UBAH DATA SISWA">
						<?php
					
					if(isset($_POST['upload'])){
						$pw = $_POST['password'];
						$nama = $_POST['nama'];
							$k1 = $_POST['kelas'];
							$k2 = $_POST['jurusan'];
						$kelas = $k1." ".$k2;
							$tempat = $_POST['tempat'];
							$tanggal = $_POST['date'];
						$alamat = $_POST['alamat'];
						$gender = $_POST['gender'];
						$telp = $_POST['no_telp'];

						$nama_file = $_FILES['foto']['name'];
						$ukuran_file = $_FILES['foto']['size'];
						$tipe_file = $_FILES['foto']['type'];
						$tmp_file = $_FILES['foto']['tmp_name'];
								
						$waktu = date('His');
						$nama_file_baru = $waktu.$nama_file;
						$path = "../../images/foto_siswa/".$nama_file_baru;
						if($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
						if($ukuran_file <= 2000000) {
								move_uploaded_file($tmp_file, $path);                       
								$query_update_siswa = "UPDATE siswa SET password='$pw', nama_siswa='$nama', jurusan='$k2', kelas='$k1', alamat_siswa='$alamat', tempat_lahir='$tempat', tanggal_lahir='$tanggal', gender_siswa='$gender', no_telp=$telp, foto_siswa='$nama_file_baru' WHERE id_siswa=$ambil";
								if($update_siswa = $conn->query($query_update_siswa)) {
									echo 'Data siswa berhasil diubah';
								} else {
									echo 'Gagal ubah data siswa!';
								}
							} else {
								echo 'Maaf, ukuran filenya terlalu besar';
							}
					} else {
							$query_update_siswa = "UPDATE siswa SET password='$pw', nama_siswa='$nama', jurusan='$k2', kelas='$k1', alamat_siswa='$alamat', tempat_lahir='$tempat', tanggal_lahir='$tanggal', gender_siswa='$gender', no_telp=$telp WHERE id_siswa=$ambil";
							if($update_siswa = $conn->query($query_update_siswa)) {
								echo 'Data siswa berhasil diubah';						
							} else {
								echo 'Gagal ubah data siswa!';
							}
					}
				}

			?>
						</td>
					</tr>
				</table>
				<?php
                }
                ?>
				</form>
			</div>
		</div>
		<footer>
			<div class="footer">
			Copyright &copy; De-Knappe [ Remedial Online Sistem ] 2017<br> 
			All rights reserved Telkom University - D3 Teknik Informatika<br>
			</div>
		</footer>
	</body>
</html>
<?php
} else {
  		header("location: ../../php/login_guru.php");
	}
?>