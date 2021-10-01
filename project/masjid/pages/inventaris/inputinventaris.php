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
    <h1 class="title">::[ Input Inventaris Masjid ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputInventaris&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListInventaris>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_pelatihan" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $no_inventaris     =str_replace("_"," ",$_GET['no_inventaris']);
                if($action == "TAMBAH"){
                    $no_inventaris      = str_replace("_"," ",$_GET['no_inventaris']);
                }else if($action == "UBAH"){
                    $_sql         = "SELECT * FROM inventaris  WHERE no_inventaris='$no_inventaris'";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $no_inventaris        = $baris[0];
                    $nm_barang         = $baris[1];
                    $resume       = $baris[2];
                    $asal_barang         = $baris[3];
                    $Thnlahir           =substr($baris[4],0,4);
                    $Blnlahir           =substr($baris[4],5,2);
                    $Tgllahir           =substr($baris[4],8,2);
                    
                    $tgl_pengadaan    = $Thnlahir+"-"+$Blnlahir+"-"+$Tgllahir;
                    $harga_barang     = $baris[5];
                    $kondisi    = $baris[6];
                }
                echo"<input type=hidden name=no_inventaris value=$no_inventaris><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Kode Inventaris</td><td width="">:</td>
                    <td width="67%"><input name="no_inventaris" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $no_inventaris;?>" size="20" maxlength="10">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nama Barang</td><td width="">:</td>
                    <td width="67%"><input name="nm_barang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $nm_barang;?>" size="30" maxlength="20" />
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Resume Barang</td><td width="">:</td>
                    <td width="67%"><input name="resume" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $resume;?>" size="50" maxlength="60" />
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Asal Barang</td><td width="">:</td>
                    <td width="67%"><input name="asal_barang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" class="inputbox" value="<?php echo $asal_barang;?>" size="30" maxlength="25">
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tgl.Pengadaan</td><td width="">:</td>
                    <td width="67%">
                        <select name="Tgllahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Tgllahir>$Tgllahir</option>";
                                }
                                loadTgl();
                             ?>
                        </select>
			<select name="Blnlahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Blnlahir>$Blnlahir</option>";
                                }
                                loadBln();
                             ?>
                        </select>
			<select name="Thnlahir" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" id="TxtIsi5">
                             <?php
                                if($action == "UBAH"){
                                    echo "<option id='TxtIsi5' value=$Thnlahir>$Thnlahir</option>";
                                }

                                loadThn();
                             ?>
                        </select>
                        <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Harga Barang</td><td width="">:</td>
                    <td width="67%">Rp. <input name="harga_barang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $harga_barang;?>" size="25" maxlength="15">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Kondisi</td><td width="">:</td>
                    <td width="67%"><input name="kondisi" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" type=text id="TxtIsi7" class="inputbox" value="<?php echo $kondisi;?>" size="30" maxlength="10">
                    <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $no_inventaris     = trim($_POST['no_inventaris']);
                    $nm_barang      = trim($_POST['nm_barang']);
                    $resume    = trim($_POST['resume']);
                    $asal_barang      = trim($_POST['asal_barang']);
                    $tgl_pengadaan      = trim($_POST['Thnlahir'])."-".trim($_POST['Blnlahir'])."-".trim($_POST['Tgllahir']);
                    $harga_barang  = trim($_POST['harga_barang']);
                    $kondisi    = trim($_POST['kondisi']);

                    if ((!empty($no_inventaris))&&(!empty($nm_barang))&&(!empty($resume))&&(!empty($asal_barang))&&
                        (!empty($tgl_pengadaan))&&(!empty($harga_barang))&&(!empty($kondisi))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" inventaris  "," '$no_inventaris','$nm_barang','$resume','$asal_barang','$tgl_pengadaan',
                                        '$harga_barang','$kondisi' ", " inventaris " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputInventaris&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" inventaris  "," nm_barang='$nm_barang',resume='$resume',asal_barang='$asal_barang',tgl_pengadaan='$tgl_pengadaan',
                                        harga_barang='$harga_barang',kondisi='$kondisi' WHERE no_inventaris='$no_inventaris' ", " inventaris ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListInventaris'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($no_inventaris))||(empty($nm_barang))||(empty($resume))||
                        (empty($asal_barang))||(empty($tgl_pengadaan))||(empty($harga_barang))||
                        (empty($kondisi))){
                        echo '<b>Semua field harus isi..!!</b>';
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