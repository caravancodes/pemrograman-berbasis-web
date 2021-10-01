<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">
<?php
   $_sql         = "SELECT * FROM set_tahun";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $tahun         = $baris[0];
   $bln_leng=strlen($baris[1]);
   $bulan="0";
   if ($bln_leng==1){
    	$bulan="0".$baris[1];
   }else{
		$bulan=$baris[1];
   }
?>
<div id="post">
    <h1 class="title">::[ Detail Tindakan Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ]::</h1>
    <a href=?act=ListTindakan>| List Tindakan |</a><br/>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
                $id                 =$_GET['id'];
                $tgl                =$tahun."-".$bulan."-".$_GET['TglPres']." ".$_GET['JamDatang'].":".$_GET['MenitDatang'].":".$_GET['DetikDatang'];
                $tnd                =$_GET['tnd'];
                $jm                 =$_GET['jm'];
                $nm_pasien          =$_GET['nm_pasien'];
                $kamar              =$_GET['kamar'];
                $diagnosa           =$_GET['diagnosa'];
                echo "<input type=hidden name=id  value=$id><input type=hidden name=tgl value=$tgl><input type=hidden name=action value=$action>";
		        $_sql = "SELECT nik,nama FROM pegawai where id='$id'";
                $hasil=bukaquery($_sql);
                $baris = mysql_fetch_row($hasil); 
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >NIK</td><td width="">:</td>
                    <td width="67%"><?php echo $baris[0];?></td>
                </tr>
				<tr class="head">
                    <td width="31%">Nama</td><td width="">:</td>
                    <td width="67%"><?php echo $baris[1];?></td>
                </tr>
                <tr class="head">
                    <td width="31%" >Tanggal</td><td width="">:</td>
                    <td width="67%">
                        <select name="TglPres" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                             <?php
                                loadTgl();
                             ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
		<tr class="head">
                    <td width="25%" >Jam Datang</td><td width="">:</td>
                    <td width="75%">
                        <select name="JamDatang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                             <?php
                                loadJam();
                             ?>
                        </select>
			<select name="MenitDatang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                             <?php
                                loadMenit();
                             ?>
                        </select>
			<select name="DetikDatang" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                             <?php
                                loadMenit();
                             ?>
                        </select>
                        <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
		<tr class="head">
                    <td width="25%" >Tindakan</td><td width="">:</td>
                    <td width="75%">
                        <select name="tnd" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3">
                            <?php
                                $_sql = "SELECT id,nama FROM master_tindakan ORDER BY nama";
                                $hasil=bukaquery($_sql);
                                while($baris = mysql_fetch_array($hasil)) {
                                    echo "<option id='TxtIsi3' value='$baris[0]'>$baris[1]</option>";
                                }
                            ?>
                        </select>
                        <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Nama Pasien</td><td width="">:</td>
                    <td width="67%"><input name="nm_pasien" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" type=text id="TxtIsi4" class="inputbox" value="<?php echo $nm_pasien;?>" size="35" maxlength="30" />
                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Kamar Pasien</td><td width="">:</td>
                    <td width="67%"><input name="kamar" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" type=text id="TxtIsi5" class="inputbox" value="<?php echo $kamar;?>" size="35" maxlength="20" />
                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Diagnosa</td><td width="">:</td>
                    <td width="67%"><input name="diagnosa" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi6'));" type=text id="TxtIsi6" class="inputbox" value="<?php echo $diagnosa;?>" size="50" maxlength="50" />
                    <span id="MsgIsi6" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $id                 =trim($_POST['id']);
                    $tgl                =$tahun."-".$bulan."-".trim($_POST['TglPres'])." ".trim($_POST['JamDatang']).":".trim($_POST['MenitDatang']).":".trim($_POST['DetikDatang']);
                    $tnd                =trim($_POST['tnd']);
                    $_sql = "SELECT jm FROM master_tindakan where id='$tnd'";
                    $hasil=bukaquery($_sql);
                    $baris = mysql_fetch_array($hasil);
                    $jm                 =$baris[0];
                    $nm_pasien          =trim($_POST['nm_pasien']);
                    $kamar              =trim($_POST['kamar']);
                    $diagnosa           =trim($_POST['diagnosa']);
                    if ((!empty($id))&&(!empty($tgl))&&(!empty($tnd))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" tindakan "," '$tgl','$id','$tnd','$jm','$nm_pasien',
                                        '$kamar','$diagnosa'", " detail tindakan " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=InputTindakan&action=TAMBAH&id=$id'>";
                                break;
                        }
                    }else if ((empty($id))||(empty($tgl))||(empty($tnd))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 500px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "select tindakan.tgl,
                        tindakan.id,
                        tindakan.tnd,
                        master_tindakan.nama,
                        tindakan.jm,
                        tindakan.nm_pasien,
                        tindakan.kamar,
                        tindakan.diagnosa
                        from tindakan inner join master_tindakan
                        where tindakan.tnd=master_tindakan.id and tindakan.id='$id'
			and tgl like '%".$tahun."-".$bulan."%' ORDER BY tgl ASC LIMIT $awal,20";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);
                $ttljm=0;

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='1150px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Tindakan</strong></font></div></td>
                                <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama Tindakan</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>JM Tindakan</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Nama Pasien</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Kamar Pasien</strong></font></div></td>
                                <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Diagnosa</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        $ttljm=$ttljm+$baris[4];
                      echo "<tr class='isi'>
                                <td width='70'>
                                    <center>"; ?>
                                    <a href="?act=InputTindakan&action=HAPUS&tgl=<?php print $baris[0] ?>&tnd=<?php print $baris[2] ?>&id=<?php print $baris[1] ?>" onClick="if (!confirm('Anda yakin menghapus data tindakan tanggal <?php print $baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[0]</td>
                                <td>$baris[3]</td>
                                <td>".formatDuit($baris[4])."</td>
                                <td>$baris[5]</td>
                                <td>$baris[6]</td>
                                <td>$baris[7]</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data Detail masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" tindakan "," id ='".$_GET['id']."' and tgl ='".$_GET['tgl']."' and tnd ='".$_GET['tnd']."'","?act=InputTindakan&action=TAMBAH&id=$id");
            }

        if(mysql_num_rows($hasil)!=0) {
                $hasil1=bukaquery("select tindakan.tgl,
                        tindakan.id,
                        tindakan.tnd,
                        master_tindakan.nama,
                        tindakan.jm,
                        tindakan.nm_pasien,
                        tindakan.kamar,
                        tindakan.diagnosa
                        from tindakan inner join master_tindakan
                        where tindakan.tnd=master_tindakan.id and tindakan.id='$id'
			and tgl like '%".$tahun."-".$bulan."%' ORDER BY tgl ASC");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo("Data : $jumlah, Ttl.JM : ".formatDuit($ttljm)." <a target=_blank href=http://".host()."/penggajian/pages/tindakan/laporandetailtindakan.php?&id=$id>| Laporan |</a> | Halaman: ");
                for($j=1;$j<=$i;$j++){
                    $awal=(($j-1)*19+$j)-1;
                    echo("<a href='?act=InputTindakan&action=TAMBAH&id=$id&awal=$awal&page=$j'>[$j]</a>");
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