<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">

<div id="post">
    <h1 class="title">::[ Input Pengeluaran ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputPengeluaran&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListPengeluaran>| List Data |</a>
    </div>
    <div class="entry">
        <form name="frm_unit" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $id     =$_GET['id'];
                if($action == "TAMBAH"){
                    $id    	= $_GET['id'];
                }else if($action == "UBAH"){
                    $_sql         	= "SELECT * FROM pengeluaran WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id             = $baris[0];
                    $pengurus        = $baris[1];
                    $besarnya       = $baris[2];
                    $keperluan          = $baris[3];
					
					$Thnlahir           =substr($baris[4],0,4);
                    $Blnlahir           =substr($baris[4],5,2);
                    $Tgllahir           =substr($baris[4],8,2);
                    
                    $tanggal         = $Thnlahir+"-"+$Blnlahir+"-"+$Tgllahir;
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="35%" >Pengurus Yang Menggunakan</td><td width="">:</td>
                    <td width="65%"><input name="pengurus" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $pengurus;?>" size="50" maxlength="50">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Besarnya</td><td width="">:</td>
                    <td width="65%">Rp. <input name="besarnya" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $besarnya;?>" size="20" maxlength="15">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>		
		<tr class="head">
                    <td width="35%" >Keperluan Pengeluaran</td><td width="">:</td>
                    <td width="65%"><input name="keperluan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $keperluan;?>" size="50" maxlength="60">
					<span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr> 
                <tr class="head">
                    <td width="35%" >Tanggal</td><td width="">:</td>
                    <td width="65%">
                        <select name="Tgllahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Tgllahir>$Tgllahir</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
			<select name="Blnlahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Blnlahir>$Blnlahir</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnlahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4">
                             <?php                               
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi4' value=$Thnlahir>$Thnlahir</option>";
                                }

                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>					
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>

            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		            $id             = trim($_POST['id']);                 
                    
                    $pengurus= trim($_POST['pengurus']);
                    $besarnya= trim($_POST['besarnya']);
                    $keperluan= trim($_POST['keperluan']);
					$tanggal      = trim($_POST['Thnlahir'])."-".trim($_POST['Blnlahir'])."-".trim($_POST['Tgllahir']);
                    
                    if ((!empty($pengurus))&&(!empty($besarnya))&&(!empty($keperluan))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pengeluaran ","'','$pengurus','$besarnya','$keperluan','$tanggal'", " pengeluaran " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPengeluaran&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" pengeluaran "," pengurus='$pengurus',besarnya='$besarnya',keperluan='$keperluan',tanggal='$tanggal' WHERE id='$id' ", " pengeluaran ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListPengeluaran'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($pengurus))||(empty($besarnya))||(empty($keperluan))) {
                        echo '<b>Semua field harus isi..!!</b>';
                        /*echo " nik='$nik',nama='$nama',jk='$jk',jbtn='$jbtn',jnj_jabatan='$jnj_jabatan',departemen='$departemen',
								                bidang='$bidang',stts_wp='$stts_wp',stts_kerja='$stts_kerja',npwp='$npwp',pendidikan='$pendidikan',
												gapok='$gapok',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',kota='$kota',
												mulai_kerja='$mulai_kerja',ms_kerja='$ms_kerja',indek='$indek',indexins='$indexins',bpd='$bpd',
												rekening='$rekening' ";*/
                    }
                }
            ?>
        </form>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>