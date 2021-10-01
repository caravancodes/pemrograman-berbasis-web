<div class="t">
<div class="b">
<div class="l">
<div class="r">
<div class="bl">
<div class="br">
<div class="tl">
<div class="tr">
<div class="y">
<?php
   $_sql         = "SELECT hargamas,batas FROM nisob ";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $hargamas     = $baris[0];
   $nisob        = $baris[1];
?>

<div id="post">
    <h1 class="title">:: Perhitungan Zakat Maal ::</h1>
    <div class="entry">     
	<br/>
    <form name="frm_aturadmin" onsubmit="return validasiIsi();" method="post" action="" enctype=multipart/form-data>
        <?php
                echo "";
                $action      =$_GET['action'];
                $gaji        =$_GET['gaji'];
				$transport        =$_GET['transport'];
				$telp        =$_GET['telp'];
				$pln         =$_GET['pln'];
				$dapur         =$_GET['dapur'];
				$pam         =$_GET['pam'];
				$spp         =$_GET['spp'];
				$lain         =$_GET['lain'];
				$gajitahun=$gaji*12;
				$pengeluarantahun=($transport+$telp+$pln+$dapur+$pam+$spp+$lain)*12;
				$sisatahun=$gajitahun-$pengeluarantahun;
				
				$zakat=0;
                if($sisatahun>=$nisob){
                       $zakat=$sisatahun*0.025;
                }else if($sisatahun<$nisob){
                      $zakat=0;
                }
				
                echo "<input type=hidden name=action value=$action>";
        ?>
            <table width="100%" align="center">
                <tr class="head">
                    <td width="50%" >Penghasilan/Bulan</td><td width="">:</td>
                    <td width="50%">Rp. <input name="gaji" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $gaji;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="isi5">
                    <td width="50%" ><b>Pengeluaran/Bulan :<b></td><td width="">&nbsp;</td><td width="50%">&nbsp;</td>
                </tr>
				<tr class="head">
                    <td width="50%" >Transportasi</td><td width="">:</td>
                    <td width="50%">Rp. <input name="transport" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $transport;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="head">
                    <td width="50%" >Bayar Telephone</td><td width="">:</td>
                    <td width="50%">Rp. <input name="telp" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $telp;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="head">
                    <td width="50%" >Bayar PLN</td><td width="">:</td>
                    <td width="50%">Rp. <input name="pln" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $pln;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="head">
                    <td width="50%" >Belanja Dapur</td><td width="">:</td>
                    <td width="50%">Rp. <input name="dapur" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $dapur;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="head">
                    <td width="50%" >Bayar PAM</td><td width="">:</td>
                    <td width="50%">Rp. <input name="pam" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $pam;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="head">
                    <td width="50%" >SPP Anak</td><td width="">:</td>
                    <td width="50%">Rp. <input name="spp" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $spp;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="head">
                    <td width="50%" >Lain-lain</td><td width="">:</td>
                    <td width="50%">Rp. <input name="lain" class="text" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" type=text id="TxtIsi1" value="<?php echo $lain;?>" size="20" maxlength="15" />                 
                    </td>
                </tr>
				<tr class="isi5">
                    <td width="50%" ><b>Harga Mas & Nisob Zakat :<b></td><td width="">&nbsp;</td><td width="50%">&nbsp;</td>
                </tr>
				<tr class="head">
                    <td width="50%" >Harga Mas/Gram</td><td width="">:</td>
                    <td width="50%"><?php echo formatDuit($hargamas);?></td>
                </tr>
				<tr class="head">
                    <td width="50%" >Nisob Zakat</td><td width="">:</td>
                    <td width="50%"><?php echo formatDuit($nisob);?></td>
                </tr>
				<tr class="isi5">
                    <td width="50%" ><b>Hasil Perhitungan :<b></td><td width="">&nbsp;</td><td width="50%">&nbsp;</td>
                </tr>
				<tr class="head">
                    <td width="50%" >Penghasilan/Tahun</td><td width="">:</td>
                    <td width="50%"><?php echo formatDuit($gajitahun);?></td>
                </tr>
				<tr class="head">
                    <td width="50%" >Pengeluaran/Tahun</td><td width="">:</td>
                    <td width="50%"><?php echo formatDuit($pengeluarantahun);?></td>
                </tr>
				<tr class="head">
                    <td width="50%" >Sisa Pendapatan/Tahun</td><td width="">:</td>
                    <td width="50%"><?php echo formatDuit($sisatahun);?></td>
                </tr>
				<tr class="isi5">
                    <td width="50%" ><b>Kewajiban Zakat :<b></td><td width="">&nbsp;</td><td width="50%">&nbsp;</td>
                </tr>
				<tr class="head">
                    <td width="50%" >Zakat Jika dibayarkan/Tahun</td><td width="">:</td>
                    <td width="50%"><?php echo formatDuit($zakat);?></td>
                </tr>
				<tr class="head">
                    <td width="50%" >Zakat Jika dibayarkan/Bulan</td><td width="">:</td>
                    <td width="50%"><?php echo formatDuit($zakat/12);?></td>
                </tr>
            </table>
            <div align="center"><input name=BtnCari type=submit class="button" value="&nbsp;&nbsp;Hitung&nbsp;&nbsp;">
                                <input name=BtnKosong type=reset class="button" value="KOSONG">
            </div><br>
			<?php
                $BtnCari=$_POST['BtnCari'];
                if (isset($BtnCari)) {
				  $gaji        =trim($_POST['gaji']);
				  $transport        =trim($_POST['transport']);
				  $telp        =trim($_POST['telp']);
				  $pln         =trim($_POST['pln']);
				  $dapur         =trim($_POST['dapur']);
				  $pam         =trim($_POST['pam']);
				  $spp         =trim($_POST['spp']);
				  $lain         =trim($_POST['lain']);
				  
				  echo"<html><head><title></title><meta http-equiv='refresh' content='2;?act=Zakat&gaji=$gaji
				  &transport=$transport&telp=$telp&pln=$pln&dapur=$dapur&pam=$pam&spp=$spp&lain=$lain'></head><body></body></html>";
				}
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