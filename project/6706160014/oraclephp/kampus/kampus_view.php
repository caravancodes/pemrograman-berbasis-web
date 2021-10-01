<?php		//===========CODE DELETE RECORD ================
					require_once ('inc/config.php');
					if(isset($_GET['act'])) {
						$idkampus = $_GET['idkampus'];
						$sql = "delete from kampus where idkampus='$idkampus' ";
						/* mysql  way 
						 * mysql_query($sql) or die(mysql_error());
						 */
						 /*this is oracle way */
						$parsesql = oci_parse($conn, $sql);
						oci_execute($parsesql) or die(oci_error());

					}
?>
	<h2 idkampus="headings"> Data kampus</h2>
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>nama </b></td><td><b>Alamat </b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
			<?php

$query="SELECT * from kampus order by idkampus  ";
/* mysql way 
 * $result= mysql_query($query) or die(mysql_error());
 * while ($rows=mysql_fetch_object($resutl)){
 *  echo $rows->nama 
 * }
 */
 /* ini cara oracle */
$parsesql = oci_parse($conn, $query);
oci_execute($parsesql);
$no=1;
//proses menampilkan data
while($rows=oci_fetch_object($parsesql)){


			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
				<td><?		echo $rows ->NAMA;?></td>
				<td><?		echo $rows ->ALAMAT;?></td>
				<td><a
				<td><a href="index.php?mod=kampus&pg=kampus_form&idkampus=<?=	$rows -> IDKAMPUS;?>" class='btn btn-primary'><i class="icon-pencil icon-white"></i>Ubah</a><a href="index.php?mod=kampus&pg=kampus_view&act=del&idkampus=<?=	$rows ->IDKAMPUS;?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash icon-white"></i>Hapus</a></td>
			</tr>
			<?	$no++;
}
oci_free_statement($parsesql);
oci_close($conn);
	?>
			<tr>
				<td colspan='3' ></td><td><a href="index.php?mod=kampus&pg=kampus_form"
				class='btn btn-success'	><i class="icon-plus icon-white"></i>Tambah</a></td>
			</tr>
		</tbody>
	</table>
	<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}
}
?>