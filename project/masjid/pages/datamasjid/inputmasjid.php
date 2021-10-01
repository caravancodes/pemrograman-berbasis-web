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
    <h1 class="title">::[ Input Masjid ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputMasjid&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListMasjid>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_pelatihan" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $email     =str_replace("_"," ",$_GET['email']);
                if($action == "TAMBAH"){
                    $email      = str_replace("_"," ",$_GET['email']);
                }else if($action == "UBAH"){
                    $_sql         = "SELECT * FROM datamasjid WHERE email='$email'";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $email        = $baris[0];
                    $nama         = $baris[1];
                    $alamat       = $baris[2];
                    $kota         = $baris[3];
                    $kabupaten    = $baris[4];
                    $propinsi     = $baris[5];
                    $luastotal    = $baris[6];
                    $luasbangunan = $baris[7];
                    $statustanah  = $baris[8];
                }
                echo"<input type=hidden name=email value=$email><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Email Masjid</td><td width="">:</td>
                    <td width="67%"><input name="email" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $email;?>" size="30" maxlength="30">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nama Masjid</td><td width="">:</td>
                    <td width="67%"><input name="nama" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" type=text id="TxtIsi2" class="inputbox" value="<?php echo $nama;?>" size="50" maxlength="50" />
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Alamat Masjid</td><td width="">:</td>
                    <td width="67%"><input name="alamat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $alamat;?>" size="50" maxlength="50" />
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Kota</td><td width="">:</td>
                    <td width="67%"><input name="kota" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" class="inputbox" value="<?php echo $kota;?>" size="30" maxlength="30">
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Kabupaten</td><td width="">:</td>
                    <td width="67%"><input name="kabupaten" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" class="inputbox" value="<?php echo $kabupaten;?>" size="30" maxlength="30">
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Propinsi</td><td width="">:</td>
                    <td width="67%"><input name="propinsi" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $propinsi;?>" size="30" maxlength="30">
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Luas Total</td><td width="">:</td>
                    <td width="67%"><input name="luastotal" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi7'));" type=text id="TxtIsi7" class="inputbox" value="<?php echo $luastotal;?>" size="30" maxlength="20">
                    <span id="MsgIsi7" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Luas Bangunan</td><td width="">:</td>
                    <td width="67%"><input name="luasbangunan" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi8'));" type=text id="TxtIsi8" class="inputbox" value="<?php echo $luasbangunan;?>" size="30" maxlength="20">
                    <span id="MsgIsi8" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Status Tanah</td><td width="">:</td>
                    <td width="67%"><input name="statustanah" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi9'));" type=text id="TxtIsi9" class="inputbox" value="<?php echo $statustanah;?>" size="30" maxlength="20">
                    <span id="MsgIsi9" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $email     = trim($_POST['email']);
                    $nama      = trim($_POST['nama']);
                    $alamat    = trim($_POST['alamat']);
                    $kota      = trim($_POST['kota']);
                    $kabupaten = trim($_POST['kabupaten']);
                    $propinsi  = trim($_POST['propinsi']);
                    $luastotal    = trim($_POST['luastotal']);
                    $luasbangunan = trim($_POST['luasbangunan']);
                    $statustanah  = trim($_POST['statustanah']);

                    if ((!empty($email))&&(!empty($nama))&&(!empty($alamat))&&(!empty($kota))&&
                        (!empty($kabupaten))&&(!empty($propinsi))&&(!empty($luastotal))&&
                        (!empty($luasbangunan))&&(!empty($statustanah))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" datamasjid "," '$email','$nama','$alamat','$kota','$kabupaten',
                                        '$propinsi','$luastotal','$luasbangunan','$statustanah' ", " masjid " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputMasjid&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" datamasjid "," nama='$nama',alamat='$alamat',kota='$kota',kabupaten='$kabupaten',
                                        propinsi='$propinsi',luastotal='$luastotal',luasbangunan='$luasbangunan',
                                        statustanah='$statustanah' WHERE email='$email' ", " masjid ");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListMasjid'></head><body></body></html>";
                                break;
                        }
                    }else if ((empty($email))||(empty($nama))||(empty($alamat))||
                        (empty($kota))||(empty($kabupaten))||(empty($propinsi))||
                        (empty($luastotal))||(empty($luasbangunan))||(empty($statustanah))){
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