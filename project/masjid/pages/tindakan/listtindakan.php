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
    <h1 class="title">:: List Tindakan Medis Tahun <?php echo$tahun ;?> Bulan <?php echo$bulan ;?> ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=DetailTindakan&action=TAMBAH>| Master Tindakan |</a>
        <a href=?act=ListTindakan>| List Tindakan |</a>
    </div>   
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
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
		$keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;

        $_sql = "SELECT pegawai.id,pegawai.nik,pegawai.nama,
		        pegawai.departemen,count(tindakan.id),sum(tindakan.jm)
                FROM tindakan right OUTER JOIN pegawai
				ON tindakan.id=pegawai.id and tgl like '%".$tahun."-".$bulan."%'
				where pegawai.nik like '%".$keyword."%' or 
				pegawai.nama like '%".$keyword."%' or
				pegawai.departemen like '%".$keyword."%' 
				group by pegawai.id order by pegawai.nik ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        $ttljm=0;
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='1050px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                        <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Jumlah Tindakan</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Ttl.JM Tindakan</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
					    $ttljm=$ttljm+$baris[5];
                        echo "<tr class='isi'>
                                <td>
                                    <center>
                                        <a href=?act=InputTindakan&action=TAMBAH&id=$baris[0]>[Detail]</a>
                                    </center>
                               </td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td>";$_sql2="select master_tindakan.nama,count(tindakan.tnd)
                                              from master_tindakan,tindakan
                                              where tindakan.tnd=master_tindakan.id and
                                              tindakan.id='$baris[0]' 
                                              and tgl like '%".$tahun."-".$bulan."%'
                                              group by tindakan.tnd ";
				      $hasil2=bukaquery($_sql2);
				     while($baris2 = mysql_fetch_array($hasil2)) {
					  echo "<table width='300px'><tr class='isi3'><td width='200px'>$baris2[0]</td><td>: $baris2[1]</td></tr></table>";
				     }
				    echo"&nbsp;
				</td>
                                <td>".formatDuit($baris[5])."</td>
                             </tr>";
                    }
            echo "</table>";           
        } else {echo "<b>Data keanggotaan masih kosong !</b>";}

    ?>
    </div>
	</form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT pegawai.id,pegawai.nik,pegawai.nama,
		        pegawai.departemen,count(tindakan.id),sum(tindakan.jm)
                FROM tindakan right OUTER JOIN pegawai
				ON tindakan.id=pegawai.id and tgl like '%".$tahun."-".$bulan."%'
				where pegawai.nik like '%".$keyword."%' or 
				pegawai.nama like '%".$keyword."%' or
				pegawai.departemen like '%".$keyword."%' 
				group by pegawai.id order by pegawai.nik ASC");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah, Ttl.JM : ".formatDuit($ttljm)."  <a target=_blank href=http://".host()."/penggajian/pages/tindakan/laporantindakan.php?&keyword=$keyword>| Laporan |</a> | Halaman: ");
            for($j=1;$j<=$i;$j++){
                 $awal=(($j-1)*19+$j)-1;
                 echo("<a href='?act=ListTindakan&awal=$awal&page=$j'>[$j]</a>");
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