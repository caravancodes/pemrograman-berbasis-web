<div>
<?php
if(isset($_SESSION['id_admin'])){

	$id=$_GET['id'];
	
	$query=mysqli_query("delete from tabel_soal where id_soal='$id'");
	
	if($query){
		?><script language="javascript">document.location.href="?page=view"</script><?php
	}else{
		echo mysqli_error();
	}

}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
</div>
