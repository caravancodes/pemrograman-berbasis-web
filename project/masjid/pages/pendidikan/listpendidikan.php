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
    <h1 class="title">:: Data Pendidikan ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputPendidikan&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListPendidikan>| List Data |</a>
    </div>   
	<br/>
    <div style="width: 598px; height: 400px; overflow: auto; padding: 5px">

    <?php
        $awal=$_GET['awal'];
        if (empty($awal)) $awal=0;
        $_sql = "SELECT tingkat FROM pendidikan ORDER BY tingkat ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        
        if(mysql_num_rows($hasil)!=0) {            
            
            echo "<table width='600px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                        <td width='20%'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
                        <td width='60%'><div align='center'><font size='2' face='Verdana'><strong>Tingkat Pendidikan</strong></font></div></td>
                    </tr>";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi'>
			      <td>
                                    <center>";?>
                                        <a href="?act=ListPendidikan&action=HAPUS&tingkat=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data Pendidikan <?php print $baris[0]?>?')) return false;">[hapus]</a>
                            <?php
                            echo "</center>
                               </td>
                                <td>$baris[0]</td>                            
                             </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data Pendidikan masih kosong !</b>";}

    ?>   
    
    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" pendidikan "," tingkat ='".$_GET['tingkat']."' ","?act=ListPendidikan");
       }
    ?>
    </div>
    <?php
        if(mysql_num_rows($hasil)!=0) {
            $hasil1=bukaquery("SELECT tingkat FROM pendidikan order by tingkat ASC");
            $jumlah1=mysql_num_rows($hasil1);
            $i=$jumlah1/19;
            $i=ceil($i);
            echo("Data : $jumlah | Halaman: ");
            for($j=1;$j<=$i;$j++){
                 $awal=(($j-1)*19+$j)-1;
                 echo("<a href='?act=ListPendidikan&awal=$awal&page=$j'>[$j]</a>");
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