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
    <h1 class="title">:: List Presensi Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">
	<br/>
        <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
        <?php
                echo "";
                $action      =$_GET['action'];
                //$keyword     =$_GET['keyword'];
                echo "<input type=hidden name=keyword value=$keyword><input type=hidden name=action value=$action>";
        ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="25%" >Keyword</td><td width="">:</td>
                    <td width="82%"><input name="keyword" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $keyword;?>" size="65" maxlength="250" />

                    </td>
                </tr>
            </table>
            <div align="center"><input name=BtnCari type=submit class="button" value="&nbsp;&nbsp;Cari&nbsp;&nbsp;">
            </div><br>
            
    <div style="width: 598px; height: 500px; overflow: auto; padding: 5px">
	
    <?php
        $awal=$_GET['awal'];
	$keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;
        echo  $keyword;

        /*$cari  = bukaquery("select * from sesion ");
        $row   = mysql_fetch_row($cari);
        $usi   = $row[0];
        if($usi=="ADMIN"){
            $qry="";
        }else{
            $cariuser  = bukaquery("select type from user where nip='$usi' ");
            $rowuser   = mysql_fetch_row($cariuser);
            $typeuser  = $rowuser[0];
            if($typeuser=="OPERATOR"){
                 $qry="";
            }else{
                 $qry=" where nip_baru='$usi' ";
            }
        }*/

        $_sql = "SELECT pegawai.id,pegawai.nik,pegawai.nama,count(presensi.id) 
                FROM pegawai LEFT OUTER JOIN presensi
                ON pegawai.id=presensi.id and tgl like '%".$tahun."-".$bulan."%' and pegawai.nik like '%".$keyword."%' or
                pegawai.id=presensi.id and tgl like '%".$tahun."-".$bulan."%' and pegawai.nama like '%".$keyword."%'
                group by pegawai.id ORDER BY pegawai.nik ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {

            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='65%'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='65%'><div align='center'><font size='2' face='Verdana'><strong>Kehadiran</strong></font></div></td>
                        <td width='15%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td>
                                    <center>
                                        <a href=?act=DetailPresensi&action=TAMBAH&id=$baris[0]>[Detail]</a>&nbsp;
                                    </center>
                               </td>
                             </tr>";
                    }
            echo "</table>";

        } else {echo "<b>Data Presensi masih kosong !</b>";}

    ?>
    </div>
	</form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            /*$cari  = bukaquery("select * from sesion ");
            $row   = mysql_fetch_row($cari);
            $usi   = $row[0];
            if($usi=="ADMIN"){
                $qry="";
            }else{
                $cariuser  = bukaquery("select type from user where nip='$usi' ");
                $rowuser   = mysql_fetch_row($cariuser);
                $typeuser  = $rowuser[0];
                if($typeuser=="OPERATOR"){
                    $qry="";
                }else{
                    $qry=" where nip_baru='$usi' ";
                }
            }
            $hasil1=bukaquery("select nip_baru,nama FROM pegawai ".$qry." ORDER BY nip_baru");*/
            $jumlah1=mysql_num_rows($hasil);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah <a target=_blank href=http://".host()."/penggajian/pages/presensi/laporanpresensi.php?&keyword=$keyword>| Laporan |</a> | Halaman: ");
            for($j=1;$j<=$i;$j++){
                 $awal=(($j-1)*19+$j)-1;
                 echo("<a href='?act=ListPresensi&awal=$awal&page=$j'>[$j]</a>");
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