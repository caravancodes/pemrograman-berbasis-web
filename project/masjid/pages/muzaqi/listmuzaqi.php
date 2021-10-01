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
    <h1 class="title">:: Data Mustahiq ::</h1>
    <div class="entry">   

    <div align="center" class="link">
        <a href=?act=InputMuzaqi&action=TAMBAH>| Input Data |</a>
        <a href=?act=ListMuzaqi>| List Data |</a>
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
        <div style="width: 598px; height:400px; overflow: auto; padding: 5px">
    <?php
        $awal=$_GET['awal'];
        $keyword=trim($_POST['keyword']);
        if (empty($awal)) $awal=0;
        $_sql = "select id, nama, jk, pendidikan, tmp_lahir, tgl_lahir, alamat,pekerjaan
                 from muzaqi
                 where
                 nama like '%".$keyword."%' or
                 jk like '%".$keyword."%' or
                 pendidikan like '%".$keyword."%' or
                 tmp_lahir like '%".$keyword."%' or
                 tgl_lahir like '%".$keyword."%' or
                 alamat like '%".$keyword."%'
                 order by nama ASC LIMIT $awal,20";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);

        if(mysql_num_rows($hasil)!=0) {            
            echo "<table width='1100px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    <tr class='head'>
                                 <td width='110px'><div align='center'><font size='2' face='Verdana'><strong>Proses</strong></font></div></td>
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
			        <td>
                                        <center>
                                        <a href=?act=InputMuzaqi&action=UBAH&id=$baris[0]>[edit]</a>"; ?>
                                        <a href="?act=ListMuzaqi&action=HAPUS&id=<?php print $baris[0] ?>" onClick="if (!confirm('Anda yakin menghapus data muzaqi <?php print $baris[1]?>?')) return false;">[hapus]</a>
                            <?php
                           echo "       </center>
                                </td>								
                                 <td>$baris[1]</td>
                                 <td>$baris[2]</td>
                                 <td>$baris[3]</td>
                                 <td>$baris[4]</td>
                                 <td>$baris[5]</td>
                                 <td>$baris[6]</td>
                                 <td>$baris[7]</td>
                               </tr>";
                    }
            echo "</table>";
            
        } else {echo "<b>Data muzaqi masih kosong !</b>";}

    ?>

    <?php
       if ($_GET['action']=="HAPUS") {
            Hapus(" muzaqi "," id ='".$_GET['id']."' ","?act=ListMuzaqi");
       }
    ?>
    </div>

    </form>

     
       <?php
            if(mysql_num_rows($hasil)!=0) {
		$hasil1=bukaquery("select id, nama, jk, pendidikan, tmp_lahir, tgl_lahir, alamat,pekerjaan
                 from muzaqi
                 where
                 nama like '%".$keyword."%' or
                 jk like '%".$keyword."%' or
                 pendidikan like '%".$keyword."%' or
                 tmp_lahir like '%".$keyword."%' or
                 tgl_lahir like '%".$keyword."%' or
                 alamat like '%".$keyword."%'
                 order by nama ASC");
                $jumlah1=mysql_num_rows($hasil1);
                $i=$jumlah1/19;
                $i=ceil($i);
                echo(" Data : $jumlah<a target=_blank href=http://".host()."/masjid/pages/muzaqi/laporanmuzaqi.php?&keyword=$keyword>| Laporan |</a> | Halaman: ");
                for($j=1;$j<=$i;$j++){
                    $awal=(($j-1)*19+$j)-1;
                    echo("<a href='?act=ListMuzaqi&awal=$awal&page=$j'>[$j]</a> ");
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