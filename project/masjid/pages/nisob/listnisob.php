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
    <h1 class="title">::[ Nisob Harta ]::</h1>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
		$hargamas           =$_GET['hargamas'];
                echo "<input type=hidden name=id  value=$hargamas><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Harga Mas Saat Ini</td><td width="">:</td>
                    <td width="67%">Rp. <input name="hargamas" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $hargamas;?>" size="30" maxlength="15">&nbsp;X 85 gram
                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
		    $hargamas      =trim($_POST['hargamas']);
                    $nisob         =$hargamas*85;
                    if (!empty($hargamas)) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" nisob ","'$hargamas','$nisob'", " nisob " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=ListNisob&action=TAMBAH&hargamas='$hargamas'>";
                                break;
                        }
                    }else if (empty($hargamas)){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 300px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT hargamas,batas from nisob ORDER BY hargamas ASC LIMIT $awal,20";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='180px'><div align='center'><font size='2' face='Verdana'><strong>Harga Mas Saat Ini</strong></font></div></td>
                                <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Besar Nisob(1 tahun)</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>
                                    <center>";?>
                                    <a href="?act=ListNisob&action=HAPUS&hargamas=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus nisob ?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>".formatDuit($baris[0])."</td>
                                <td>".formatDuit($baris[1])."</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data Nisob masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" nisob "," hargamas ='".$hargamas."' ","?act=ListNisob&action=TAMBAH&hargamas=".$hargamas);
            }

        if(mysql_num_rows($hasil)!=0) {
                $hasil1=bukaquery("SELECT hargamas,batas from nisob ORDER BY hargamas ");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo(" Data : $jumlah | Halaman: ");
                for($j=1;$j<=$i;$j++){
                    $awal=(($j-1)*19+$j)-1;
                    echo("<a href='?act=ListNisob&action=TAMBAH&hargamas=$hargamas&awal=$awal&page=$j'>[$j]</a> ");
                }
        }
        ?>
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