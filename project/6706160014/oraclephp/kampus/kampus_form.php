<?		
include ('inc/config.php');

				$aksi = 'tambah';
				if(isset($_GET['idkampus'])) {
					$aksi = "edit";
					$idkampus = $_GET['idkampus'];
					//baris dibawah ini disesuaikan dengan nm tabel dan idtabelnya
					$sql = "select * from kampus where idkampus='$idkampus'  ";
					$sqlparse=oci_parse($conn, $sql);
					oci_execute($sqlparse) or die(oci_error());
					$baris = oci_fetch_object($sqlparse);

				} else {
					$aksi = "tambah";
				}?>


<form  id="form1" class="form-horizontal" method="POST"
enctype="multipart/form-data" action="kampus/kampus_action.php">
	<legend>
	<?=$aksi?>	kampus
	</legend>
	
	<div class="control-group">
		<label class="control-label" for="nm">IDKAMPUS </label>
		<div class="controls">
			<input type="text" name='idkampus' class='input-mini'
			value='<?=$baris ->IDKAMPUS;?>'>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="nm">nama </label>
		<div class="controls">
			<input type="text" name='nama' class='input-xxlarge'
			value='<?=$baris ->NAMA;?>'>
		</div>
	</div>
	 <div class="control-group">
    <label class="control-label" for="alamat">alamat</label>
    <div class="controls">
      <textarea name='alamat'  rows="5" class='input-xxlarge'><?=$baris->ALAMAT;?> </textarea>
     
    </div>
    
  </div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-danger" name='aksi'value=<?=$aksi?>>
				<?=$aksi
				?>
			</button>
		</div>
	</div>
</form>
