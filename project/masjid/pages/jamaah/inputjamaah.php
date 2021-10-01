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
    <h1 class="title">::[ Input Jamaah ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputJamaah&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListJamaah>| List Data |</a>
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
                    $_sql         	= "SELECT * FROM Jamaah WHERE id='$id'";
                    $hasil        	= bukaquery($_sql);
                    $baris        	= mysql_fetch_row($hasil);
                    $id                 = $baris[0];
                    $nmkepala           = $baris[1];
                    $nmistri            = $baris[2];
                    $jmlanggota         = $baris[3];
                    $namaanaklk         = $baris[4];
                    $namaanakpr         = $baris[5];
                    $pekerjaan          = $baris[6];
                    $pendapatan         = $baris[7];
                    $kendaraan          = $baris[8];
                    $kwalitasrumah      = $baris[9];
                    $luasrumah          = $baris[10];
                    $kategoriklrga      = $baris[11];
                }
                echo"<input type=hidden name=id value=$id><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="35%" >Nama Kepala Keluarga</td><td width="">:</td>
                    <td width="65%"><input name="nmkepala" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $nmkepala;?>" size="50" maxlength="50">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Nama Istri</td><td width="">:</td>
                    <td width="65%"><input name="nmistri" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $nmistri;?>" size="50" maxlength="50">
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>	
		<tr class="head">
                    <td width="35%" >Jml.Anggota Keluarga</td><td width="">:</td>
                    <td width="65%"><input name="jmlanggota" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $jmlanggota;?>" size="10" maxlength="10">
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>           
                <tr class="head">
                    <td width="35%" >Anak Laki-laki</td><td width="">:</td>
                    <td width="65%"><input name="namaanaklk" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" class="inputbox" value="<?php echo $namaanaklk;?>" size="50" maxlength="150">
                    <br>bisa diisi lebih dari 2 nama
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Anak Perempuan</td><td width="">:</td>
                    <td width="65%"><input name="namaanakpr" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" class="inputbox" value="<?php echo $namaanakpr;?>" size="50" maxlength="150">
                    <br>bisa diisi lebih dari 2 nama
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>						
		<tr class="head">
                    <td width="35%" >Pekerjaan</td><td width="">:</td>
                    <td width="65%"><input name="pekerjaan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $pekerjaan;?>" size="30" maxlength="30">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Pendapatan/Bulan</td><td width="">:</td>
                    <td width="65%">Rp. <input name="pendapatan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" type=text id="TxtIsi7" class="inputbox" value="<?php echo $pendapatan;?>" size="25" maxlength="15">
                    <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Jenis Kendaraan</td><td width="">:</td>
                    <td width="65%"><input name="kendaraan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" type=text id="TxtIsi8" class="inputbox" value="<?php echo $kendaraan;?>" size="50" maxlength="40">
                    <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Kwalitas Rumah</td><td width="">:</td>
                    <td width="65%"><input name="kwalitasrumah" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi9'));" type=text id="TxtIsi9" class="inputbox" value="<?php echo $kwalitasrumah;?>" size="30" maxlength="30">
                    <span id="MsgIsi9" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Luas Rumah</td><td width="">:</td>
                    <td width="65%"><input name="luasrumah" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi10'));" type=text id="TxtIsi10" class="inputbox" value="<?php echo $luasrumah;?>" size="30" maxlength="30">
                    <span id="MsgIsi10" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="35%" >Kategori Keluarga</td><td width="">:</td>
                    <td width="65%"><input name="kategoriklrga" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi11'));" type=text id="TxtIsi11" class="inputbox" value="<?php echo $kategoriklrga;?>" size="30" maxlength="30">
                    <span id="MsgIsi11" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp;<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>

            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		    $id             = trim($_POST['id']);
                    $nmkepala       = trim($_POST['nmkepala']);
                    $nmistri       = trim($_POST['nmistri']);
                    $jmlanggota    = trim($_POST['jmlanggota']);
                    $namaanaklk    = trim($_POST['namaanaklk']);
                    $namaanakpr    = trim($_POST['namaanakpr']);
                    $pekerjaan     = trim($_POST['pekerjaan']);
                    $pendapatan    = trim($_POST['pendapatan']);
                    $kendaraan     = trim($_POST['kendaraan']);
                    $kwalitasrumah = trim($_POST['kwalitasrumah']);
                    $luasrumah     = trim($_POST['luasrumah']);
                    $kategoriklrga = trim($_POST['kategoriklrga']);
                    
                    if ((!empty($nmkepala))&&(!empty($nmistri))&&
                         (!empty($jmlanggota))&&(!empty($namaanaklk))&&(!empty($namaanakpr))&&
                         (!empty($pekerjaan))&&(!empty($pendapatan))&&(!empty($kendaraan))&&
                         (!empty($kwalitasrumah))&&(!empty($luasrumah))&&(!empty($kategoriklrga))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" Jamaah ","'','$nmkepala','$nmistri','$jmlanggota','$namaanaklk',
                                 '$namaanakpr','$pekerjaan','$pendapatan','$kendaraan',
                                 '$kwalitasrumah','$luasrumah','$kategoriklrga'", " Jamaah " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputJamaah&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" Jamaah "," nmkepala='$nmkepala',nmistri='$nmistri',jmlanggota='$jmlanggota',namaanaklk='$namaanaklk',
                                   namaanakpr='$namaanakpr',pekerjaan='$pekerjaan',pendapatan='$pendapatan',kendaraan='$kendaraan',
                                   kwalitasrumah='$kwalitasrumah',luasrumah='$luasrumah',kategoriklrga='$kategoriklrga' WHERE id='$id' ", " Jamaah ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListJamaah'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($nmkepala))||(empty($nmistri))||(empty($jmlanggota))||
                            (empty($namaanaklk))||(empty($namaanakpr))||(empty($pekerjaan))||
                            (empty($pendapatan))||(empty($kendaraan))||(empty($kwalitasrumah))||
                            (empty($luasrumah))||(empty($kategoriklrga))) {
                        echo '<b>Semua field harus isi..!!</b>';
                        echo " nmkepala='$nmkepala',nmistri='$nmistri',jmlanggota='$jmlanggota',namaanaklk'='$namaanaklk',
                                   namaanakpr='$namaanakpr',pekerjaan='$pekerjaan',pendapatan='$pendapatan',kendaraan='$kendaraan',
                                   kwalitasrumah='$kwalitasrumah',luasrumah='$luasrumah',kategoriklrga='$kategoriklrga' ";
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