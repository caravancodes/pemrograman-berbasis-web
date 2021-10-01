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
    <h1 class="title">::[ Input Data Janda ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputJanda&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListJanda>| List Data |</a>
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
                    $_sql         	= "SELECT * FROM janda WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id                 = $baris[0];
                    $nama               = $baris[1];
                    $pendidikan         = $baris[2];
                    $tmp_lahir          = $baris[3];

                    $Thnlahir           =substr($baris[4],0,4);
                    $Blnlahir           =substr($baris[4],5,2);
                    $Tgllahir           =substr($baris[4],8,2);
                    
                    $tgl_lahir          = $Thnlahir+"-"+$Blnlahir+"-"+$Tgllahir;

                    $alamat             = $baris[5];
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Nama Janda</td><td width="">:</td>
                    <td width="75%"><input name="nama" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $nama;?>" size="50" maxlength="50">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>           
                <tr class="head">
                    <td width="25%" >Pendidikan</td><td width="">:</td>
                    <td width="75%">
                        <select name="pendidikan" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                $_sql = "SELECT tingkat FROM pendidikan  ORDER BY tingkat";
                                $hasil=bukaquery($_sql);

                                if($action == "UBAH"){
                                    $_sql2 = "SELECT tingkat FROM pendidikan where tingkat='$pendidikan' ORDER BY tingkat";
                                    $hasil2=bukaquery($_sql2);
                                    while($baris2 = mysql_fetch_array($hasil2)) {
                                        echo "<option id='TxtIsi2' value='$baris2[0]'>$baris2[0]</option>";
                                    }
                                }

                                while($baris = mysql_fetch_array($hasil)) {
                                    echo "<option id='TxtIsi2' value='$baris[0]'>$baris[0]</option>";
                                }
                            ?>
                        </select>
                        <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Tempat Lahir</td><td width="">:</td>
                    <td width="75%"><input name="tmp_lahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $tmp_lahir;?>" size="30" maxlength="20">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
		<tr class="head">
                    <td width="25%" >Tanggal Lahir</td><td width="">:</td>
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
                    <td width="25%" >Alamat</td><td width="">:</td>
                    <td width="75%"><input name="alamat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" class="inputbox" value="<?php echo $alamat;?>" size="50" maxlength="50">
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>					
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>

            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		    $id             = trim($_POST['id']);
                    $nama           = trim($_POST['nama']);
                    $pendidikan     = trim($_POST['pendidikan']);
                    $tmp_lahir      = trim($_POST['tmp_lahir']);                     
                    $tgl_lahir      = trim($_POST['Thnlahir'])."-".trim($_POST['Blnlahir'])."-".trim($_POST['Tgllahir']);
                    $alamat         = trim($_POST['alamat']);	
                    
                    if ((!empty($nama))&&(!empty($pendidikan))&&(!empty($tmp_lahir))
                            &&(!empty($tgl_lahir))&&(!empty($alamat))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" janda ","'','$nama','$pendidikan','$tmp_lahir','$tgl_lahir','$alamat'", " Janda " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputJanda&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" janda "," nama='$nama',pendidikan='$pendidikan',
					tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat' WHERE id='$id' ", " Janda ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListJanda'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($nama))||(empty($pendidikan))||(empty($tmp_lahir))||
                            (empty($tgl_lahir))||(empty($alamat))) {
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