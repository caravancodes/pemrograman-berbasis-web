<?php
 include '../conf/conf.php';
?>
<html>
    <head>
        <link href="../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
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
    <h1 class="title"><center>DATA DOSEN FAKULTAS USHULUDDIN, STUDI AGAMA DAN PEMIKIRAN ISLAM UIN SUNAN KALIJAGA YOGYAKARTA</center></h1>
    <div class="entry">
	<br/>
 

    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;

        $_sql = "SELECT nip_baru,nama FROM pegawai where stt_pgw like '%DOSEN%' ORDER BY nip_baru ASC";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {

            echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='10%'><div align='center'><font size='2' face='Verdana'><strong>NO</strong></font></div></td>
                        <td width='90%'><div align='center'><font size='2' face='Verdana'><strong>Nama</strong></font></div></td>
                    </tr>";
                    $i=0;
                    while($baris = mysql_fetch_array($hasil)) {
                        $i++;
                        echo "<tr class='isi'>
                                <td>$i</td>
                                <td><a target=_blank href=prevdosen.php?&nip=$baris[0]>$baris[1]</a></td>
                             </tr>";
                    }
            echo "</table>";

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
        </body>
</html>