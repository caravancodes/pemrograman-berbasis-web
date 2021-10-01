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
    <h1 class="title">::[ Input Detail Ketidakhadiran Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ]::</h1>
    <a href=?act=ListLampiran&action=LIHAT>| List Lampiran |</a><br/>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action             =$_GET['action'];
                $id                 =$_GET['id'];
                $tgl                =$tahun."-".$bulan."-".$_GET['TglPres'];
                $jns                =$_GET['jns'];
                $ktg                =$_GET['ktg'];
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
                    <td width="25%" >Ketidakhadiran</td><td width="">:</td>
                    <td width="75%">
                        <select name="jns" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                            <!-- <option id='TxtIsi2' value=' '>- Jenis Kelamin -</option> -->                            
                            <option id='TxtIsi2' value='A'>A</option>
                            <option id='TxtIsi2' value='S'>S</option>
                            <option id='TxtIsi2' value='C'>C</option>
                            <option id='TxtIsi2' value='I'>I</option>
                        </select>
                        <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Keterangan</td><td width="">:</td>
                    <td width="67%"><input name="ktg" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" type=text id="TxtIsi3" class="inputbox" value="<?php echo $ktg;?>" size="50" maxlength="40" />
                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {
                    $id                 =trim($_POST['id']);
                    $tgl                =$tahun."-".$bulan."-".trim($_POST['TglPres']);
                    $ktg                =trim($_POST['ktg']);
                    $jns                =trim($_POST['jns']);
                    if ((!empty($id))&&(!empty($tgl))&&(!empty($jns))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                Tambah(" ketidakhadiran "," '$tgl','$id','$jns','$ktg'", " ketidakhadiran " );
                                echo"<meta http-equiv='refresh' content='1;URL=?act=InputTidakHadir&action=TAMBAH&id=$id'>";
                                break;
                        }
                    }else if ((empty($id))||(empty($tgl))||(empty($jns))){
                        echo 'Semua field harus isi..!!!';
                    }
                }
            ?>
            <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;
                $_sql = "SELECT tgl,id,jns,ktg
                        from ketidakhadiran where id='$id'
			and tgl like '%".$tahun."-".$bulan."%' ORDER BY tgl ASC LIMIT $awal,20";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);
                $ttls=0;
                $ttla=0;
                $ttlc=0;
                $ttli=0;

                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='598px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                <td width='120px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Tdk Hadir</strong></font></div></td>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Jns.Tdk Hadir</strong></font></div></td>
                                <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Katerangan</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        if($baris[2]=='S'){
                            $ttls=$ttls+1;
                        }
                        if($baris[2]=='A'){
                            $ttla=$ttla+1;
                        }
                        if($baris[2]=='C'){
                            $ttlc=$ttlc+1;
                        }
                        if($baris[2]=='I'){
                            $ttli=$ttli+1;
                        }
                        
                      echo "<tr class='isi'>
                                <td width='70'>
                                    <center>"; ?>
                                    <a href="?act=InputTidakHadir&action=HAPUS&tgl=<?php print $baris[0] ?>&id=<?php print $baris[1] ?>" onClick="if (!confirm('Anda yakin menghapus data ketidakhadiran tanggal <?php print $baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                                </td>
                                <td>$baris[0]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                           </tr>";
                    }
                echo "</table>";

            } else {echo "<b>Data ketidakhadiran masih kosong !</b>";}
        ?>
        </div>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                Hapus(" ketidakhadiran"," id ='".$_GET['id']."' and tgl ='".$_GET['tgl']."'","?act=InputTidakHadir&action=TAMBAH&id=$id");
            }

        if(mysql_num_rows($hasil)!=0) {
                $hasil1=bukaquery("SELECT tgl,id,jns,ktg
                        from ketidakhadiran where id='$id'
			     and tgl like '%".$tahun."-".$bulan."%' ORDER BY tgl ASC ");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo("Data : $jumlah, A : ".$ttla." , S : ".$ttls.", C : ".$ttlc.", I : ".$ttli." <a target=_blank href=http://".host()."/penggajian/pages/lampiran/laporantidakhadir.php?&id=$id>| Laporan |</a> | Halaman: ");
                for($j=1;$j<=$i;$j++){
                    $awal=(($j-1)*19+$j)-1;
                    echo("<a href='?act=InputTidakHadir&action=TAMBAH&id=$id&awal=$awal&page=$j'>[$j]</a>");
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