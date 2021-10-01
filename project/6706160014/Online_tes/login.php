<?php
/*--------------------------------------------------------
 Halaman untuk memproses aktivitas login dari user
 *--------------------------------------------------------*/ 
session_start();
include_once "include/koneksi.php"; 
// cek apakah id_user dan password telah terdaftar
function cek_login($username,$pass){
	$sql = "select * from user where id_user='".$username."' and password='".md5($pass)."'";
	$sql_exe = mysqli_query($sql);
	if(mysqli_num_rows($sql_exe) > 0){
		// simpan level dari user yang login
		$data_login = mysqli_fetch_assoc($sql_exe);
		$_SESSION['level_kj'] = $data_login['level']; 
		return true;
		}
	else {
		return false;
		}	
	}
function ambil_data($username){
	$sql = "select * from admin where nis='".$username."'";
	$sql_exe = mysqli_query($sql);
	$data = mysqli_fetch_assoc($sql_exe);
	return $data;
	}
function ambil_data_kelas($username){
	$sql = "select id_kelas from detail_kelas where nis='".$username."'";
	$sql_exe = mysqli_query($sql);
	$data = mysqli_fetch_assoc($sql_exe);
	return $data['id_kelas'];
	}	
$id_user = $_POST['id_user'];
$pass = $_POST['password'];
if(cek_login($id_user,$pass)){
	$data_siswa = ambil_data($id_user);
	// buat session berdasarkan data siswa
	$_SESSION['nis_kj'] = $id_user;
	$_SESSION['nama_kj'] = $data_siswa['nama'];
	$_SESSION['login_kj'] = true;
	if($_SESSION['level_kj'] == "siswa"){
		$_SESSION['id_kelas'] = ambil_data_kelas($id_user);
		}
	header("location:hal_admin.php");
	}		
else{
	header("location:hal_admin.php");
	}	
?>
