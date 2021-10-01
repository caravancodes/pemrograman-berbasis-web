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
   $_sql         = "SELECT batas FROM nisob ";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $nisob        = $baris[0];
?>

<div id="post">
    <h1 class="title">:: Data Jamaah Masjid ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputJamaah&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListJamaah>| List Data |</a>
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
        <div style="width: 598px; height:400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        $keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;
        $_sql = "select id, nmkepala, nmistri, jmlanggota, 
                 namaanaklk, namaanakpr, pekerjaan, pendapatan,
                 kendaraan, kwalitasrumah, luasrumah, kategoriklrga
                 from jamaah
                 where
                 nmkepala like '%".$keyword."%' or
                 nmistri like '%".$keyword."%' or
                 namaanaklk like '%".$keyword."%' or
                 namaanakpr like '%".$keyword."%' or
                 pekerjaan like '%".$keyword."%' or
                 kendaraan like '%".$keyword."%' or
                 kategoriklrga like '%".$keyword."%' or
                 kwalitasrumah like '%".$keyword."%'
                 order by nmkepala ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        if(mysql_num_rows($hasil)!=0) {            
            echo "<table width='2200px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                 <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama Kepala Keluarga</strong></font></div></td>
                                 <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama Istri</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jml.Anggota Keluarga</strong></font></div></td>
                                 <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Anak Laki-laki</strong></font></div></td>
                                 <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Anak Perempuan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Pekerjaan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Pendapatan/Bulan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jenis Kendaraan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Kwalitas Rumah</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Luas Rumah</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Kategori Keluarga</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Zakat Profesi/Tahun</strong></font></div></td>
                    </tr>";					
					
                    while($baris = mysql_fetch_array($hasil)) {
                        $zakat=0;
                        if(($baris[7]*12)>=$nisob){
                            $zakat=($baris[7]*0.025)*12;
                        }else if(($baris[7]*12)<$nisob){
                            $zakat=0;
                        }
                        echo "<tr class='isi'>
			        <td>
                                        <center>
                                        <a href=?act=InputJamaah&action=UBAH&id=$baris[0]>[edit]</a>"; ?>
                                        <a href="?act=ListJamaah&action=HAPUS&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data Jamaah <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                           echo "       </center>
                                </td>								
                                 <td>$baris[1]</td>
                                 <td>$baris[2]</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                                 <td>$baris[5]</td>
                                 <td>$baris[6]</td>
                                 <td>".formatDuit($baris[7])."</td>
                                 <td>$baris[8]</td>
                                 <td>$baris[9]</td>
                                 <td>$baris[10]</td>
                                 <td>$baris[11]</td>
                                 <td>".formatDuit($zakat)."</td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Jamaah masih kosong !</b>";}

    ?>

    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" jamaah "," id ='".$_GET['id']."' ","?act=ListJamaah");
       }
    ?>
    </div>

    </form>

     
       <?php
            if(mysql_num_rows($hasil)!=0) {
		$hasil1=bukaquery("select id, nmkepala, nmistri, jmlanggota,
                 namaanaklk, namaanakpr, pekerjaan, pendapatan,
                 kendaraan, kwalitasrumah, luasrumah, kategoriklrga
                 from jamaah
                 where
                 nmkepala like '%".$keyword."%' or
                 nmistri like '%".$keyword."%' or
                 namaanaklk like '%".$keyword."%' or
                 namaanakpr like '%".$keyword."%' or
                 pekerjaan like '%".$keyword."%' or
                 kendaraan like '%".$keyword."%' or
                 kategoriklrga like '%".$keyword."%' or
                 kwalitasrumah like '%".$keyword."%'
                 order by nmkepala ASC");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo(" Data : $jumlah<a target=_blank href=http://".host()."/masjid/pages/jamaah/laporanjamaah.php?&keyword=$keyword>| Laporan |</a> | Halaman: ");
                for($j=1;$j<=$i;$j++){
                    $awal=(($j-1)*19+$j)-1;
                    echo("<a href='?act=ListJamaah&awal=$awal&page=$j'>[$j]</a> ");
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