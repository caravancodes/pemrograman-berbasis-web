<?php
 include '../../conf/conf.php';
   $_sql         = "SELECT batas FROM nisob ";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $nisob        = $baris[0];
?>
<html>
    <head>
        <link href="../../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

    <?php
        $keyword=$_GET['keyword'];   
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
                 order by nmkepala ASC  ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        $ttlzakat=0;
        $ttlanggota=0;

        if(mysql_num_rows($hasil)!=0) {
            echo "<table  border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
				<caption><h1 class=title>DAFTAR JAMAAH MASJID</h1><br></caption>
                    <tr class='head'>
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
                        $ttlzakat=$ttlzakat+$zakat;
                        $ttlanggota=$ttlanggota+$baris[3];
                        echo "<tr class='isi'>
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
            echo "<br><font color='999999' size='3'><b>Jml.Jamaah : ".$ttlanggota.", Total Zakat/Tahun : ".formatDuit($ttlzakat)."</b></font>";
        } 
    ?>

    </body>
</html>