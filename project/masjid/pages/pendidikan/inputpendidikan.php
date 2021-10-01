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
    <h1 class="title">::[ Input Pendidikan ]::</h1>
    <div align="center" class="link">
        <a href=?act=InputPendidikan&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListPendidikan>| List Data |</a>
    </div>  
    <div class="entry">
        <form name="frm_pendidikan" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $tingkat     =str_replace("_"," ",$_GET['tingkat']);
                if($action == "TAMBAH"){
                    $tingkat      = $_GET['tingkat'];
                }else if($action == "UBAH"){
                    $_sql         = "SELECT tingkat FROM pendidikan WHERE tingkat='$tingkat'";
                    $hasil        = bukaquery($_sql);
                    $baris        = mysql_fetch_row($hasil);
                    $tingkat      = $baris[0];
                }
                echo"<input type=hidden name=tingkat value=$tingkat><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Tingkat Pendidikan</td><td width="">:</td>
                    <td width="67%"><input name="tingkat" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" class="inputbox" value="<?php echo $tingkat;?>" size="40" maxlength="30">
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $tingkat   = trim($_POST['tingkat']);
                    if (!empty($tingkat)) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" pendidikan "," '$tingkat' ", " Pendidikan " );
                                echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=?act=InputPendidikan&action=TAMBAH'></head><body></body></html>";
                                break;
                            case "UBAH":
                                Ubah(" pendidikan "," tingkat='$tingkat' WHERE tingkat='$tingkat' ", "Pendidikan");
                                echo"<html><head><title></title><meta http-equiv='refresh' content='2;URL=?act=ListPendidikan'></head><body></body></html>";
                                break;
                        }
                    }else if (empty($tingkat)){
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