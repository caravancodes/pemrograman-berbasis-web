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
    <h1 class="title">::[ Input Pemasukan ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputPemasukan&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListPemasukan>| List Data |</a>
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
                    $_sql         	= "SELECT * FROM pemasukan WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id             = $baris[0];
                    $pemberi        = $baris[1];
                    $besarnya       = $baris[2];
                    $jenis          = $baris[3];
					
					$Thnlahir           =substr($baris[4],0,4);
                    $Blnlahir           =substr($baris[4],5,2);
                    $Tgllahir           =substr($baris[4],8,2);
                    
                    $tanggal         = $Thnlahir+"-"+$Blnlahir+"-"+$Tgllahir;
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Pemberi</td><td width="">:</td>
                    <td width="75%"><input name="pemberi" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $pemberi;?>" size="50" maxlength="40">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Besarnya</td><td width="">:</td>
                    <td width="75%">Rp. <input name="besarnya" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $besarnya;?>" size="20" maxlength="15">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>		
		<tr class="head">
                    <td width="25%" >Jenis Pemberian</td><td width="">:</td>
                    <td width="75%"><input name="jenis" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $jenis;?>" size="20" maxlength="20">
                    Zakat\Sodaqoh\Infaq\-
					<span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr> 
                <tr class="head">
                    <td width="25%" >Tanggal</td><td width="">:</td>
                    <td width="75%">
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
                    
                    $pemberi= trim($_POST['pemberi']);
                    $besarnya= trim($_POST['besarnya']);
                    $jenis= trim($_POST['jenis']);
					$tanggal      = trim($_POST['Thnlahir'])."-".trim($_POST['Blnlahir'])."-".trim($_POST['Tgllahir']);
                    
                    if ((!empty($pemberi))&&(!empty($besarnya))&&(!empty($jenis))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pemasukan ","'','$pemberi','$besarnya','$jenis','$tanggal'", " pemasukan " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPemasukan&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" pemasukan "," pemberi='$pemberi',besarnya='$besarnya',jenis='$jenis',tanggal='$tanggal' WHERE id='$id' ", " pemasukan ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListPemasukan'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($pemberi))||(empty($besarnya))||(empty($jenis))) {
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