<?php
	include 'connection.php';

	if(isset($_POST['idRuangan'])){
		$nama = $_POST['namaPeminjam'];
		$telp = $_POST['noTelp'];
		$tgl = $_POST['tglPeminjaman'];
		$idruangan = $_POST['idRuangan'];
		$query = mysqli_query($link,"INSERT INTO pinjamruangan (idRuangan, namaPeminjam, noTelp, tglPeminjaman) VALUES ('$idruangan','$nama','$telp','$tgl')");
		if($query){
			echo "
			<script>
				alert('Peminjaman ruangan ".$idruangan." pada ".$tgl." berhasil disimpan. Peminjaman dilakukan oleh saudara/i atas nama: ".$nama.".');
				window.location.href='index.php';
			</script>";
		}else{
			echo "
			<script>
				alert('Peminjaman ruangan ".$idruangan." pada ".$tgl." gagal disimpan. Peminjaman dilakukan oleh saudara/i atas nama: ".$nama.".');
				window.location.href='index.php';
			</script>";
		}
	}else{
		echo "
		<script>
			alert('Ruangan harus dipilih!');
			window.location.href='index.php';
		</script>";
	}
?>
