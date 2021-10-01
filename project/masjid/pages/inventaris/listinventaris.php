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
    <h1 class="title">:: Data Inventaris Masjid ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputInventaris&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListInventaris>| List Data |</a>
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
        $_sql = "SELECT no_inventaris, nm_barang, resume, asal_barang, tgl_pengadaan,
                harga_barang, kondisi
                FROM inventaris
                where no_inventaris like '%".$keyword."%' or
		nm_barang like '%".$keyword."%' or
		asal_barang like '%".$keyword."%' or
                tgl_pengadaan like '%".$keyword."%' or
                harga_barang like '%".$keyword."%' ORDER BY no_inventaris ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='1600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>					    
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Kode Inventaris</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama Barang</strong></font></div></td>
                        <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Resume</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Asal Barang</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Pengadaan</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Harga Barang</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Kondisi</strong></font></div></td>
                    </tr>";
                    $ttlinv=0;
                    while($baris = mysql_fetch_array($hasil)) {
                        $ttlinv=$ttlinv+$baris[5];
                        echo "<tr class='isi'>
				<td>
                                    <center>
                                        <a href=?act=InputInventaris&action=UBAH&no_inventaris=".str_replace(" ","_",$baris[0]).">[edit]</a>";?>
                                        <a href="?act=ListInventaris&action=HAPUS&no_inventaris=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data inventaris <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                                <td>$baris[3]</td>
                                <td>$baris[4]</td>
                                <td>".formatDuit($baris[5])."</td>
                                <td>$baris[6]</td>
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data inventaris masih kosong !</b>";}

    ?>
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" inventaris  "," no_inventaris ='".$_GET['no_inventaris']."' ","?act=ListInventaris");
       }
    ?>
    </div>
    </form>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT no_inventaris, nm_barang, resume, asal_barang, tgl_pengadaan,
                harga_barang, kondisi
                FROM inventaris
                where no_inventaris like '%".$keyword."%' or
		nm_barang like '%".$keyword."%' or
		asal_barang like '%".$keyword."%' or
                tgl_pengadaan like '%".$keyword."%' or
                harga_barang like '%".$keyword."%' ORDER BY no_inventaris ASC");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("<br/>Data : $jumlah, Invantaris :".formatDuit($ttlinv)." | Halaman: ");
            for($j=1;$j<=$i;$j++){
                 $awal=(($j-1)*19+$j)-1;
                 echo("<a href='?act=ListInventaris&awal=$awal&page=$j'>[$j]</a>");
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