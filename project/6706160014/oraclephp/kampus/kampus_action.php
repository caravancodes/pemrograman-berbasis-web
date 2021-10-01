<?php
include ('../inc/config.php');
//data dari kampus

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$aksi = $_POST['aksi'];
$idkampus = $_POST['idkampus'];
$sql = null;
if($aksi == 'tambah') {

	$sql = "INSERT INTO kampus(idkampus,nama,alamat)
		VALUES('$idkampus','$nama','$alamat')";
}
if($aksi == 'edit') {

	$sql = "update kampus set nama='$nama' ,
		alamat='$alamat'  where idkampus='$idkampus'";

}
/* mysql way
 * $result=mysql_query($sql) or die(mysql_error());
 */
 
 /* This is the oracle way */
$sqlparse =oci_parse($conn,$sql);
$result=oci_execute($sqlparse) or die(oci_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=kampus&pg=kampus_view&status=0');
} else {
	header('location:../index.php?mod=kampus&pg=kampus_form&status=1');
}
mysql_close();
?>
