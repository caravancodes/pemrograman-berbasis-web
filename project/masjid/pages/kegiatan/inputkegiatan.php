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
    <h1 class="title">::[ Input Kegiatan ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputKegiatan&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListKegiatan>| List Data |</a>
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
                    $_sql         	= "SELECT * FROM kegiatan WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id                 = $baris[0];

                    $Thnlahir           =substr($baris[1],0,4);
                    $Blnlahir           =substr($baris[1],5,2);
                    $Tgllahir           =substr($baris[1],8,2);
                    
                    $tanggal          = $Thnlahir+"-"+$Blnlahir+"-"+$Tgllahir;

                    $jam= $baris[2];
                    $pemateri= $baris[3];
                    $materi= $baris[4];
                    $jenis= $baris[5];
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Pemateri</td><td width="">:</td>
                    <td width="75%"><input name="pemateri" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $pemateri;?>" size="50" maxlength="50">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Isi Materi</td><td width="">:</td>
                    <td width="75%"><input name="materi" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $materi;?>" size="50" maxlength="60">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>		
		<tr class="head">
                    <td width="25%" >Jenis Kegiatan</td><td width="">:</td>
                    <td width="75%"><input name="jenis" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $jenis;?>" size="30" maxlength="30">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr> 
		<tr class="head">
                    <td width="25%" >Tanggal Kegiatan</td><td width="">:</td>
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
		<tr class="head">
                    <td width="25%" >Jam</td><td width="">:</td>
                    <td width="75%"><input name="jam" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" class="inputbox" value="<?php echo $jam;?>" size="15" maxlength="15">
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>					
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>

            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		    $id             = trim($_POST['id']);                   
                    $tanggal      = trim($_POST['Thnlahir'])."-".trim($_POST['Blnlahir'])."-".trim($_POST['Tgllahir']);
                    $jam= trim($_POST['jam']);
                    $pemateri= trim($_POST['pemateri']);
                    $materi= trim($_POST['materi']);
                    $jenis= trim($_POST['jenis']);
                    
                    if ((!empty($tanggal))&&(!empty($jam))&&(!empty($pemateri))&&(!empty($materi))&&(!empty($jenis))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" kegiatan ","'','$tanggal','$jam','$pemateri','$materi','$jenis'", " kegiatan " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputKegiatan&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" kegiatan "," tanggal='$tanggal',jam='$jam',pemateri='$pemateri',materi='$materi',jenis='$jenis' WHERE id='$id' ", " kegiatan ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListKegiatan'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($tanggal))||(empty($jam))||(empty($pemateri))||(empty($materi))||(empty($jenis))) {
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