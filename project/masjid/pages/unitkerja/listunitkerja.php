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
    <h1 class="title">:: Data Dosen Jurusan ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputUnitkerja&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListUnitkerja>| List Data |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 500px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;
        $_sql = "SELECT kode,nama FROM dosen_jurusan ORDER BY kode ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Kode Jurusan</strong></font></div></td>
                        <td width='57%'><div align='center'><font size='2' face='Verdana'><strong>Nama Jurusan</strong></font></div></td>
                        <td width='23%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td width='120'>
                                    <center>
                                        <a href=?act=InputUnitkerja&action=UBAH&kode=$baris[0]>edit</a>";?>
                                        <a href="?act=ListUnitkerja&action=HAPUS&kode=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data dosen jurusan  <?php print $baris[1]?>?')) return false;">| hapus</a>
                            <?php
                            echo "</center>
                               </td>
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Dosen Jurusan masih kosong !</b>";}

    ?>
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" dosen_jurusan "," kode ='".$_GET['kode']."' ","?act=ListUnitkerja");
       }
    ?>
    </div>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT kode,nama FROM dosen_jurusan order by kode");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("<br/>Jumlah Record : $jumlah | Halaman: ");
            for($j=1;$j<=$i;$j++){
                 $awal=(($j-1)*19+$j)-1;
                 echo("<a href='?act=ListUnitkerja&awal=$awal&page=$j'>[$j]</a>");
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