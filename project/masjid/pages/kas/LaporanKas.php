<?php
 include '../../conf/conf.php';
?>
<html>
    <head>
        <link href="../../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

    <?php
        $keyword=$_GET['keyword'];
$_sql = "select id, pemberi, besarnya, jenis, tanggal from pemasukan
                 where
                 pemberi like '%".$keyword."%' or
                 besarnya like '%".$keyword."%' or
                 tanggal like '%".$keyword."%' or
                 jenis like '%".$keyword."%' 
                 order by tanggal ASC  ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
		$pemasukan=0;

        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
				<caption><h1 class=title>Daftar Pemasukan</h1><br></caption>
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
            echo "</table><br><font color='999999' size='3'> <b>Data : $jumlah, Total Pemasukan : ".formatDuit($pemasukan)."</b></font>";
        } 

		
        $_sql = "select id, pengurus, besarnya, keperluan, tanggal
		         from pengeluaran
                 where
                 pengurus like '%".$keyword."%' or
                 besarnya like '%".$keyword."%' or
                 tanggal like '%".$keyword."%' or
                 keperluan like '%".$keyword."%' 
                 order by tanggal ASC  ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
		$pengeluaran=0;

        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
				<caption><h1 class=title>Daftar Pengeluaran</h1><br></caption>
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
            echo "</table><br><font color='999999' size='3'> <b>Data : $jumlah, Total Pengeluaran : ".formatDuit($pengeluaran)."</b></font>
			     <br><br><hr><br><br><font color='999999' size='3'> <b>Kas Saat Ini : ".formatDuit($pemasukan-$pengeluaran)."</b></font>";
        } 
    ?>

    </body>
</html>