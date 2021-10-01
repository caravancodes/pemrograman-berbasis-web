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
    <h1 class="title">::[ Input Jadwal ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputJadwal&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListJadwal>| List Data |</a>
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
                    $_sql         	= "SELECT * FROM jadwal WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id                 = $baris[0];
                    $hari= $baris[1];
                    $jam= $baris[2];
                    $jenis= $baris[3];
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Hari</td><td width="">:</td>
                    <td width="75%"><input name="hari" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $hari;?>" size="20" maxlength="15">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Jam</td><td width="">:</td>
                    <td width="75%"><input name="jam" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $jam;?>" size="20" maxlength="15">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>		
		<tr class="head">
                    <td width="25%" >Kegiatan</td><td width="">:</td>
                    <td width="75%"><input name="jenis" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $jenis;?>" size="30" maxlength="30">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr> 					
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>

            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		    $id             = trim($_POST['id']);                 
                    
                    $hari= trim($_POST['hari']);
                    $jam= trim($_POST['jam']);
                    $jenis= trim($_POST['jenis']);
                    
                    if ((!empty($hari))&&(!empty($jam))&&(!empty($jenis))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" jadwal ","'','$hari','$jam','$jenis'", " jadwal " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputJadwal&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" jadwal "," hari='$hari',jam='$jam',jenis='$jenis' WHERE id='$id' ", " jadwal ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListJadwal'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($hari))||(empty($jam))||(empty($jenis))) {
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