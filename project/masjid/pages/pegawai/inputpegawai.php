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
    <h1 class="title">::[ Input Pengurus ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputPegawai&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListCariPegawai>| List Data |</a>
    </div>
    <div class="entry">
        <form name="frm_unit" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $id     =$_GET['id'];
                if($action == "TAMBAH"){
                    $id    	= $_GET['id'];
                    $nik              ='';
                }else if($action == "UBAH"){
                    $_sql         	= "SELECT * FROM pegawai WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id                 = $baris[0];
                    $nik                = $baris[1];
                    $nama               = $baris[2];
                    $jk                 = $baris[3];
                    $jbtn               = $baris[4];
                    $pendidikan         = $baris[5];
                    $tmp_lahir          = $baris[6];

                    $Thnlahir           =substr($baris[7],0,4);
                    $Blnlahir           =substr($baris[7],5,2);
                    $Tgllahir           =substr($baris[7],8,2);
                    
                    $tgl_lahir          = $Thnlahir+"-"+$Blnlahir+"-"+$Tgllahir;

                    $alamat             = $baris[8];
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >NIP</td><td width="">:</td>
                    <td width="75%"><input name="nik" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $nik;?>" size="20" maxlength="12">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Nama Pengurus</td><td width="">:</td>
                    <td width="75%"><input name="nama" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $nama;?>" size="50" maxlength="50">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Jenis Kelamin</td><td width="">:</td>
                    <td width="75%">
                        <select name="jk" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3">
                            <!-- <option id='TxtIsi2' value=' '>- Jenis Kelamin -</option> -->
                            <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi3' value=$jk>$jk</option>";
                                }                                 
                            ?>

                            <option id='TxtIsi3' value='Pria'>Pria</option>
                            <option id='TxtIsi3' value='Wanita'>Wanita</option>
                        </select>
                        <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>		
		<tr class="head">
                    <td width="25%" >Jabatan</td><td width="">:</td>
                    <td width="75%"><input name="jbtn" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" class="inputbox" value="<?php echo $jbtn;?>" size="30" maxlength="25">
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>                
                <tr class="head">
                    <td width="25%" >Pendidikan</td><td width="">:</td>
                    <td width="75%">
                        <select name="pendidikan" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                $_sql = "SELECT tingkat FROM pendidikan  ORDER BY tingkat";
                                $hasil=bukaquery($_sql);

                                if($action == "UBAH"){
                                    $_sql2 = "SELECT tingkat FROM pendidikan where tingkat='$pendidikan' ORDER BY tingkat";
                                    $hasil2=bukaquery($_sql2);
                                    while($baris2 = mysql_fetch_array($hasil2)) {
                                        echo "<option id='TxtIsi5' value='$baris2[0]'>$baris2[0]</option>";
                                    }
                                }

                                while($baris = mysql_fetch_array($hasil)) {
                                    echo "<option id='TxtIsi5' value='$baris[0]'>$baris[0]</option>";
                                }
                            ?>
                        </select>
                        <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="25%" >Tempat Lahir</td><td width="">:</td>
                    <td width="75%"><input name="tmp_lahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $tmp_lahir;?>" size="30" maxlength="20">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
		<tr class="head">
                    <td width="25%" >Tanggal Lahir</td><td width="">:</td>
                    <td width="75%">
                        <select name="Tgllahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi7">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi7' value=$Tgllahir>$Tgllahir</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
			<select name="Blnlahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi7">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi7' value=$Blnlahir>$Blnlahir</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnlahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi7">
                             <?php                               
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi7' value=$Thnlahir>$Thnlahir</option>";
                                }

                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>						
		<tr class="head">
                    <td width="25%" >Alamat</td><td width="">:</td>
                    <td width="75%"><input name="alamat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" type=text id="TxtIsi8" class="inputbox" value="<?php echo $alamat;?>" size="50" maxlength="50">
                    <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>					
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>

            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		    $id             = trim($_POST['id']);
                    $nik            = trim($_POST['nik']);
                    $nama           = trim($_POST['nama']);
                    $jk             = trim($_POST['jk']);
                    $jbtn           = trim($_POST['jbtn']);
                    $pendidikan     = trim($_POST['pendidikan']);
                    $tmp_lahir      = trim($_POST['tmp_lahir']);                     
                    $tgl_lahir      = trim($_POST['Thnlahir'])."-".trim($_POST['Blnlahir'])."-".trim($_POST['Tgllahir']);
                    $alamat         = trim($_POST['alamat']);	
                    
                    if ((!empty($nik))&&(!empty($nama))&&(!empty($jk))&&(!empty($jbtn))&&
                            (!empty($pendidikan))&&(!empty($tmp_lahir))&&(!empty($tgl_lahir))&&(!empty($alamat))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pegawai ","'','$nik','$nama','$jk','$jbtn','$pendidikan','$tmp_lahir','$tgl_lahir','$alamat'", " pengurus " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPegawai&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" pegawai "," nik='$nik',nama='$nama',jk='$jk',jbtn='$jbtn',pendidikan='$pendidikan',
					tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat' WHERE id='$id' ", " pengurus ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListCariPegawai'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($nik))||(empty($nama))||(empty($jk))||(empty($jbtn))||
                            (empty($pendidikan))||(empty($tmp_lahir))||(empty($tgl_lahir))||(empty($alamat))) {
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