<?php
 include '../../conf/conf.php';
?>
<html>
    <head>
        <link href="../../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
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
		
        $keyword=$_GET['keyword'];
        $_sql = "SELECT pegawai.id,pegawai.nik,pegawai.nama,
		        pegawai.departemen,count(tindakan.id),sum(tindakan.jm)
                FROM tindakan right OUTER JOIN pegawai
				ON tindakan.id=pegawai.id and tgl like '%".$tahun."-".$bulan."%'
				where pegawai.nik like '%".$keyword."%' or 
				pegawai.nama like '%".$keyword."%' or
				pegawai.departemen like '%".$keyword."%' 
				group by pegawai.id order by pegawai.nik ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
		$ttljm=0;
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <caption><h2 class=title><font color='999999'>Laporan Tindakan Tahun ".$tahun." Bulan ".$bulan."</font></h2><br></caption>
                    <tr class='head'>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>NIK</strong></font></div></td>
                        <td width='250px'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Departemen</strong></font></div></td>
                        <td width='100px'><div align='center'><font size='2' face='Verdana'><strong>Jumlah Tindakan</strong></font></div></td>
                        <td width='150px'><div align='center'><font size='2' face='Verdana'><strong>Ttl.JM Tindakan</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
					    $ttljm=$ttljm+$baris[5];
                        echo "<tr class='isi'>
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
			echo "<br><font color='999999' size='3'><b>Jumlah Total JM : ".formatDuit($ttljm)."</b></font>";
        } 
    ?>
    </body>
</html>