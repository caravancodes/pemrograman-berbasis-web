<?php
include_once "include/cek_session.php";
include_once "include/koneksi.php";
?>
<div class="row-fluid">
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">Pilih Kelas</div>
        </div>
<?php
// ambil data kelas dari database
$mp_exe = mysqli_query("select * from kelas");
$jml_kelas = mysqli_num_rows($mp_exe);
if($jml_kelas > 0){
?>	
		<div class="block-content collapse in">
			<div class="span12">                                    
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
					<thead>
						<tr>
							<th>Nama Kelas</th>
							<th>Menu</th>
						</tr>
					</thead>
					<?php
						while($data = mysqli_fetch_assoc($mp_exe)){
						echo "<tbody>
							<tr class='odd gradeX'>
								<td>".$data['nama_kelas']."</td>
                                <td><button onclick=\"daftar_mengajar('".$data['id_kelas']."')\" class='btn btn-success'><i class='icon-eye-open icon-white'></i> Mata Pelajaran</button>
								
                            </tr>";
						}
					?>
					<?php	
						}
						else {
						echo "kelas Belum Dibuat";
						}	
					?>
				</table>
			</div>
		</div>
	</div>
</div>
<script>	
function daftar_mengajar(id_kelas){
	// load content dengan data darin daftar_ujian.php
	$("#content").html(info_loading).load("daftar_mengajar.php?id_kelas="+id_kelas);
	$("body").data("back_url","mengajar.php");
	}		
</script>
