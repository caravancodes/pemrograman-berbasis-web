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
        $_sql = "select id, tanggal, jam, pemateri, materi, jenis from kegiatan
                 where
                 tanggal like '%".$keyword."%' or
                 jam like '%".$keyword."%' or
                 pemateri like '%".$keyword."%' or
                 materi like '%".$keyword."%' or
                 jenis like '%".$keyword."%'
                 order by tanggal ASC  ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {
            echo "<table  border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
				<caption><h1 class=title>Data Kegiatan Masjid</h1><br></caption>
                    <tr class='head'>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Kegiatan</strong></font></div></td>
                                 <td width='70px'><div align='center'><font size='2' face='Verdana'><strong>Jam</strong></font></div></td>
                                 <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Pemateri</strong></font></div></td>
                                 <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Materi</strong></font></div></td>
                                 <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Jenis Kegiatan</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                 <td>$baris[1]</td>
                                 <td>$baris[2]</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                                 <td>$baris[5]</td>
                               </tr>";
                    }
            echo "</table><br><font color='999999' size='3'> <b>Data : $jumlah</b></font>";
        } 
    ?>

    </body>
</html>