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
    <h1 class="title">::[ Seting Tahun & Bulan Penggajian ]::</h1><br>
    <div class="entry">
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
            <?php
                echo "";
                $action      =$_GET['action'];
                $tahun       =$_GET['tahun'];
                $bulan       =$_GET['bulan'];
                echo "<input type=hidden name=tahun value=$tahun><input type=hidden name=action value=$action>";
            ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="31%" >Tahun Gaji</td><td width="">:</td>
                    <td width="67%">
                        <select name="tahun" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                loadThn();
                            ?>
                        </select>
                        <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>
                <tr class="head">
                    <td width="31%" >Bulan Gaji</td><td width="">:</td>
					<td width="67%">
                       <select name="bulan" class="text2" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2">
                            <!--<option id='TxtIsi12' value='null'>- Ruang -</option>-->
                            <?php
                                loadBln();
                            ?>
                        </select>
                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                    </td>
                </tr>       
            </table>
            <div align="center"><input name=BtnSimpan type=submit class="button" value="SIMPAN">&nbsp<input name=BtnKosong type=reset class="button" value="KOSONG"></div><br>
            <?php
                $BtnSimpan=$_POST['BtnSimpan'];
                if (isset($BtnSimpan)) {                    
                    $bulan          = trim($_POST['bulan']);
                    $bln_leng=strlen(trim($_POST['bulan']));
                    if ($bln_leng==1){
                        $bulan="0".trim($_POST['bulan']);
                    }else{
                        $bulan=trim($_POST['bulan']);
                    }
                    
                    $tahun   =  trim($_POST['tahun']);
                    $jumHari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
                    $date1   = "01-".$bulan."-".$tahun;
                    $date2   = $jumHari."-".$bulan."-".$tahun;

                    $pecahTgl1 = explode("-", $date1);
                    $tgl1 = $pecahTgl1[0];
                    $bln1 = $pecahTgl1[1];
                    $thn1 = $pecahTgl1[2];
                    $i = 0;
                    // counter untuk jumlah hari minggu
                    $sum = 0;
                    do{
                        // mengenerate tanggal berikutnya
                        $tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));

                        // cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
                        if (date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0){
                            $sum++;
                        }
                        // increment untuk counter looping
                        $i++;
                    }while ($tanggal != $date2);

                    $selisihhari=$jumHari-$sum;
                    
                    
                    if ((!empty($tahun))&&(!empty($bulan))) {
                        switch($_GET['action']) {
                            case "TAMBAH":
                                    Tambah(" set_tahun "," '$tahun','$bulan','$jumHari','$sum','$selisihhari'", " Seting Tahun & Bulan gaji " );
                                    echo"<meta http-equiv='refresh' content='1;URL=?act=InputTahun&action=TAMBAH&bulan=$bulan&tahun=$tahun'>";
                                    break;                                
                        }
                    }else if ((empty($tahun))||(empty($bulan))){
                        echo 'Semua field harus isi..!!!';
                        /*echo $jumHari;
                        echo "<br>".$date1."<br>".$date2."<br>".$sum."<br>".$selisihhari;*/
                    }
                }
            ?>
            <?php
                $awal=$_GET['awal'];
                if (empty($awal)) $awal=0;

                $_sql = "SELECT * FROM set_tahun ORDER BY tahun ASC LIMIT $awal,20";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);



                if(mysql_num_rows($hasil)!=0) {
                    echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            <tr class='head'>
                                <td width='17%'><div align='center'><font size='2' face='Verdana'><strong>Tahun Gaji</strong></font></div></td>
                                <td width='17%'><div align='center'><font size='2' face='Verdana'><strong>Bulan gaji</strong></font></div></td>
                                <td width='17%'><div align='center'><font size='2' face='Verdana'><strong>Jumlah Hari</strong></font></div></td>
                                <td width='17%'><div align='center'><font size='2' face='Verdana'><strong>Jumlah Akhad</strong></font></div></td>
                                <td width='17%'><div align='center'><font size='2' face='Verdana'><strong>Normal Masuk</strong></font></div></td>
                                <td width='15%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                            </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi'>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td>$baris[4]</td>
                                <td width='120'>
                                    <center>"; ?>
                                    <a href="?act=InputTahun&action=HAPUS&tahun=<?php print $baris[0] ?>&bulan=<?php print $baris[1] ?>" onClick="if (!confirm('Anda yakin menghapus data Tahun Gaji <?php print $baris[0]?> bulan gaji <?php print $baris[1]?>?')) return false;">hapus</a>
                            <?php
                            echo "</center>
                                </td>
                           </tr>";
                    }
                echo "</table>";
            } else {echo "<b>Data Setting tahun & bulan gaji masih kosong !</b>";}
        ?>
        </form>
        <?php
            if ($_GET['action']=="HAPUS") {
                    Hapus(" set_tahun "," tahun ='".$tahun."' and bulan ='".$bulan."' ","?act=InputTahun&action=TAMBAH&bulan=$bulan&tahun=$tahun");
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