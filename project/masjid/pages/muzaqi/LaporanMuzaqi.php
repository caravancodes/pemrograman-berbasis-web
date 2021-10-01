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
        $_sql = "select id, nama, jk, pendidikan, tmp_lahir, tgl_lahir, alamat,pekerjaan
                 from muzaqi
                 where
                 nama like '%".$keyword."%' or
                 jk like '%".$keyword."%' or
                 pendidikan like '%".$keyword."%' or
                 tmp_lahir like '%".$keyword."%' or
                 tgl_lahir like '%".$keyword."%' or
                 alamat like '%".$keyword."%'
                 order by nama ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%'  border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
				<caption><h1 class=title>DAFTAR MUZAKI</h1><br></caption>
                    <tr class='head'>
                                 <td width='200px'><div align='center'><font size='2' face='Verdana'><strong>Nama Muzaki</strong></font></div></td>
                                 <td width='50px'><div align='center'><font size='2' face='Verdana'><strong>J.K.</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Pendidikan</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Tmp.Lahir</strong></font></div></td>
                                 <td width='80px'><div align='center'><font size='2' face='Verdana'><strong>Tgl.Lahir</strong></font></div></td>
                                 <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Alamat</strong></font></div></td>
                                 <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Pekerjaan</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                 <td>$baris[1]</td>
                                 <td>$baris[2]</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                                 <td>$baris[5]</td>
                                 <td>$baris[6]</td>
                                 <td>$baris[7]</td>
                               </tr>";
                    }
            echo "</table><br><font color='999999' size='3'> <b>Data : $jumlah</b></font>";
        } 
    ?>

    </body>
</html>