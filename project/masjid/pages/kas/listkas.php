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
    <h1 class="title">:: Kas Masjid ::</h1>
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
			&nbsp;&nbsp;<b>Pemasukkan Masjid :</b>
        <div style="width: 598px; height:300px; overflow: auto; padding: 5px">
    <?php
        $keyword=trim($_POST['keyword']);
        $_sql = "select id, pemberi, besarnya, jenis, tanggal from pemasukan
                 where
                 pemberi like '%".$keyword."%' or
                 besarnya like '%".$keyword."%' or
                 tanggal like '%".$keyword."%' or
                 jenis like '%".$keyword."%' 
                 order by tanggal ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        $pemasukan=0;
        if(mysql_num_rows($hasil)!=0) {            
            echo " 
			       <table width='900px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                                 <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Pemberi Zakat/Infaq/Sodaqoh/-</strong></font></div></td>
                                 <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Besarnya Pemberian</strong></font></div></td>
                                 <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Jenis Pemberian</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tanggal</strong></font></div></td>
                    </tr>";					
					
                    while($baris = mysql_fetch_array($hasil)) {
					   $pemasukan=$pemasukan+$baris[2];
                        echo "<tr class='isi'>								
                                 <td>$baris[1]</td>
                                 <td>".formatDuit($baris[2])."</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data pemasukan masih kosong !</b>";}

    ?>
    </div>
	<?php
            if(mysql_num_rows($hasil)!=0) {
                echo("<b>Total Pemasukkan : ".formatDuit($pemasukan)."</b>");
             }
    ?>
	<br><br><br>&nbsp;&nbsp;<b>Pengeluaran Masjid :</b>
	<div style="width: 598px; height:300px; overflow: auto; padding: 5px">
    <?php
        $keyword=trim($_POST['keyword']);
        $_sql = "select id, pengurus, besarnya, keperluan, tanggal
		         from pengeluaran
                 where
                 pengurus like '%".$keyword."%' or
                 besarnya like '%".$keyword."%' or
                 tanggal like '%".$keyword."%' or
                 keperluan like '%".$keyword."%' 
                 order by tanggal ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
		$pengeluaran=0;
        if(mysql_num_rows($hasil)!=0) { 		
            echo "<table width='1000px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                                 <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Pngurus Yang Menggunakan</strong></font></div></td>
                                 <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Besarnya Pengeluaran</strong></font></div></td>
                                 <td width='300px'><div align='center'><font size='2' face='Verdana'><strong>Keperluan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tanggal</strong></font></div></td>
                    </tr>";					
					
                    while($baris = mysql_fetch_array($hasil)) {					     
						$pengeluaran=$pengeluaran+$baris[2];
                        echo "<tr class='isi'>							
                                 <td>$baris[1]</td>
                                 <td>".formatDuit($baris[2])."</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data pengeluaran masih kosong !</b>";}

    ?>
    </div>
	<?php
             if(mysql_num_rows($hasil)!=0) {
                echo("<b>Total Pengeluaran : ".formatDuit($pengeluaran)."</b>");
             }
			 echo("<br><hr><br><b>Kas Saat Ini : ".formatDuit($pemasukan-$pengeluaran)."</b> &nbsp;&nbsp; <a target=_blank href=http://".host()."/masjid/pages/kas/laporankas.php?&keyword=$keyword>| Laporan |</a> ");
			 
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