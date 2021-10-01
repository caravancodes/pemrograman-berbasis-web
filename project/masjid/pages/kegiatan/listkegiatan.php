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
    <h1 class="title">:: Data Kegiatan Masjid ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputKegiatan&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListKegiatan>| List Data |</a>
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
                                <input name=BtnPrint type=submit class="button" value="&nbsp;Print&nbsp;">
            </div><br>
        <div style="width: 598px; height:400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        $keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;
        $_sql = "select id, tanggal, jam, pemateri, materi, jenis from kegiatan
                 where
                 tanggal like '%".$keyword."%' or
                 jam like '%".$keyword."%' or
                 pemateri like '%".$keyword."%' or
                 materi like '%".$keyword."%' or
                 jenis like '%".$keyword."%' 
                 order by tanggal ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {            
            echo "<table width='1000px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Kegiatan</strong></font></div></td>
                                 <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Jam</strong></font></div></td>
                                 <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Pemateri</strong></font></div></td>
                                 <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Materi</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jenis Kegiatan</strong></font></div></td>
                    </tr>";					
					
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
			        <td>
                                        <center>
                                        <a href=?act=InputKegiatan&action=UBAH&id=$baris[0]>[edit]</a>"; ?>
                                        <a href="?act=ListKegiatan&action=HAPUS&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data pengurus <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                           echo "       </center>
                                </td>								
                                 <td>$baris[1]</td>
                                 <td>$baris[2]</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                                 <td>$baris[5]</td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Kegiatan masih kosong !</b>";}

    ?>

    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" kegiatan "," id ='".$_GET['id']."' ","?act=ListKegiatan");
       }
       $BtnPrint=$_POST['BtnPrint'];
       if (isset($BtnPrint)) {
           echo"<html><head><title></title><meta http-equiv='refresh' content='2;pages/kegiatan/laporankegiatan.php?&keyword=$keyword'></head><body></body></html>";
                    
       }
    ?>
    </div>

    </form>

     
       <?php
            if(mysql_num_rows($hasil)!=0) {
		$hasil1=bukaquery("select id, tanggal, jam, pemateri, materi, jenis from kegiatan
                 where
                 tanggal like '%".$keyword."%' or
                 jam like '%".$keyword."%' or
                 pemateri like '%".$keyword."%' or
                 materi like '%".$keyword."%' or
                 jenis like '%".$keyword."%'
                 order by tanggal ASC");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo(" Data : $jumlah<a target=_blank href=http://".host()."/masjid/pages/kegiatan/laporankegiatan.php?&keyword=$keyword>| Laporan |</a> | Halaman: ");
                for($j=1;$j<=$i;$j++){
                    $awal=(($j-1)*19+$j)-1;
                    echo("<a href='?act=ListKegiatan&awal=$awal&page=$j'>[$j]</a> ");
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