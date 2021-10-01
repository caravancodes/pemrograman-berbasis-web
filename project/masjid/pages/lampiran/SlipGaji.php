<?php
 include '../../conf/conf.php';
   $_sql         = "SELECT * FROM set_tahun";
   $hasil        = bukaquery($_sql);
   $baris        = mysql_fetch_row($hasil);
   $tahun         = $baris[0];
   $bln_leng=strlen($baris[1]);
   $bulan="0";
   $bulanindex=$baris[1];
   if ($bln_leng==1){
    	$bulan="0".$baris[1];
   }else{
	$bulan=$baris[1];
   }
?>
<html>
    <head>
        <link href="../../css/default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
	
   <?php
        echo "<center><h2 class=title><font color='999999'>Slip Gaji Karyawan Tahun ".$tahun." Bulan ".$bulan."</font></h2></center>";
        $id=$_GET['id'];
        
        $say=" pegawai.pendidikan=pendidikan.tingkat
                and pegawai.stts_kerja =stts_kerja.stts
                and pegawai.jnj_jabatan=jnj_jabatan.kode
                and pegawai.stts_aktif<>'KELUAR'";
        $_sql = "select pegawai.id,
                pegawai.nik,
                pegawai.nama,
                pegawai.jbtn,
                pegawai.jnj_jabatan,
                pegawai.departemen,
                pegawai.indexins,
                CONCAT(FLOOR(PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'),DATE_FORMAT(mulai_kerja, '%Y%m'))/12), ' Tahun ',MOD(PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(mulai_kerja, '%Y%m')),12), ' Bulan ') as lama,
                pendidikan.indek as index_pendidikan,
                (To_days(NOW())-to_days(mulai_kerja))/365 as masker,
                stts_kerja.indek as index_status,
                jnj_jabatan.indek as index_struktural,
                pegawai.pengurang,
                pegawai.wajibmasuk,
		pegawai.gapok,
                jnj_jabatan.tnj
                from pegawai inner join pendidikan
                inner join stts_kerja
                inner join jnj_jabatan
                where ".$say." and pegawai.id ='".$id."' 
                order by pegawai.nik ASC ";
        $hasil=bukaquery($_sql);
        $jumlah=mysql_num_rows($hasil);
        $hasilcari=bukaquery($_sql);
              //untuk mencari nilai referensinya
		//hapusinput("delete from  indekref");
		while($baris = mysql_fetch_array($hasilcari)) {
			$masa_kerja=0;
                          if($baris[9]<1){
                             $masa_kerja=0;
                          }else if(($baris[9]>=1)&&($baris[9]<2)){
                             $masa_kerja=2;
                          }else if(($baris[9]>=2)&&($baris[9]<3)){
                             $masa_kerja=4;
                          }else if(($baris[9]>=3)&&($baris[9]<4)){
                             $masa_kerja=6;
                          }else if(($baris[9]>=4)&&($baris[9]<5)){
                             $masa_kerja=8;
                          }else if(($baris[9]>=5)&&($baris[9]<6)){
                             $masa_kerja=10;
                          }else if($baris[9]>=6){
                             $masa_kerja=12;
                          }
                          $total=0;
                          if($baris[12]==0){
                              $total=($baris[8]+$masa_kerja+$baris[10]+$baris[11]);
                          }else if($baris[12]>0){
                              $total=($baris[8]+$masa_kerja+$baris[10]+$baris[11])*($baris[12]/100);
                          }

                         $_sql2         = "SELECT normal FROM set_tahun";
			 $hasil2        = bukaquery($_sql2);
			 $baris2        = mysql_fetch_row($hasil2);
			 $jmlmsk         = $baris2[0];
			 if($baris[13]!=0){
			     $jmlmsk=$baris[13];
			 }else if(!($baris[13]==0)){
			     $jmlmsk=$baris2[0];
			 }

                            $_sql3    = "SELECT count(id)
                            from jgmlm  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' group by id";
                            $hasil3   = bukaquery($_sql3);
                            $baris3   = mysql_fetch_row($hasil3);
                            $jgmlm    = $baris3[0];
                            $sisamlm  =0;
                            if($baris3[0]<=8){
                                $jgmlm=0;
                                $sisamlm=0;
                            }else if($baris3[0]>8){
                                $jgmlm=$baris3[0];
                                $sisamlm=$baris3[0]-8;
                            }

                            $_sql4    = "SELECT count(id)
                            from ketidakhadiran  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='A' group by id";
                            $hasil4   = bukaquery($_sql4);
                            $baris4   = mysql_fetch_row($hasil4);
                            $ttla     = $baris4[0];
                            if(empty ($baris4[0])){
                                $ttla=0;
                            }

                            $_sql5    = "SELECT count(id)
                            from ketidakhadiran  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='S' group by id";
                            $hasil5   = bukaquery($_sql5);
                            $baris5   = mysql_fetch_row($hasil5);
                            $ttls     = $baris5[0];
                            if(empty ($baris5[0])){
                                $ttls=0;
                            }

                            $_sql6    = "SELECT count(id)
                            from ketidakhadiran  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='C' group by id";
                            $hasil6   = bukaquery($_sql6);
                            $baris6   = mysql_fetch_row($hasil6);
                            $ttlc     = $baris6[0];
                            if(empty ($baris6[0])){
                                $ttlc=0;
                            }

                            $_sql7    = "SELECT count(id)
                            from ketidakhadiran  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='I' group by id";
                            $hasil7   = bukaquery($_sql7);
                            $baris7   = mysql_fetch_row($hasil7);
                            $ttli     = $baris7[0];
                            if(empty ($baris7[0])){
                                $ttli=0;
                            }

                            $_sql8    = "SELECT count(id)
                            from tambahjaga  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' group by id";
                            $hasil8   = bukaquery($_sql8);
                            $baris8   = mysql_fetch_row($hasil8);
                            $ttltmb   = $baris8[0];
                            if(empty ($baris8[0])){
                                $ttltmb=0;
                            }

                            $ttln=$jmlmsk+$ttltmb-($ttla+$ttls+$ttlc+$ttli);
			//bukainput("insert into indekref values('$baris[6]','$ttln','$total')");
			echo "<table width='500px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
			        <tr class='isi3'>
				  <td width='60px'>NIK</td><td width='3px'>:</td><td width='170px'>$baris[1]</td>
				  <td width='60px'>Nama</td><td width='3px'>:</td><td width='170px'>$baris[2]</td>
				</tr>
				<tr class='isi3'>
				  <td width='60px'>Jabatan</td><td width='3px'>:</td><td width='170px'>$baris[3]</td>
				  <td width='60px'>Index Kary</td><td width='3px'>:</td><td width='170px'>$total</td>
				</tr>
			     </table><br>";
		}

		//insert data ke total index
		$hasilindex=bukaquery("select kdindex,n,ttl from indekref");
		//untuk mencari nilai referensinya
		//hapusinput("delete from  indextotal");
		while($barisindex = mysql_fetch_array($hasilindex)) {
		    $_sql22  ="SELECT ($barisindex[1]/sum(n))*100 from indekref where kdindex='$barisindex[0]'";
		    $hasil22 =bukaquery($_sql22);
		    $baris22 = mysql_fetch_array($hasil22);
		    $indexjaga=$baris22[0];

		    $ttlindex=$barisindex[2]+$indexjaga;
		    //bukainput("insert into indextotal  values('$barisindex[0]','$ttlindex')");
		}

                $ttlgapok=0;
                $ttltnjjbtn=0;
                $ttltnjtnj=0;
                $ttltmbhjgmlm=0;
                $ttltmbahanjg=0;
                $ttltnjhadir=0;
                $ttljmlgaji=0;
                $ttllemburhb=0;
                $ttllemburhr=0;
                $ttltotal=0;
                $ttlindexjaga=0;
                $ttlttlinsentif=0;
                $ttljm=0;
                $ttljmltmb=0;
                $ttlttlgaji=0;
                $ttljamsostek=0;
                $ttldansos=0;
                $ttlsimwajib=0;
                $ttlangkop=0;
                $ttlangla=0;
                $ttltelpri=0;
                $ttlpajak=0;
                $ttlpribadi=0;
                $ttllain=0;
                $ttlttlditerima=0;
        if(mysql_num_rows($hasil)!=0) {	
                    while($baris = mysql_fetch_array($hasil)) {
                          $masa_kerja=0;
                          if($baris[9]<1){
                             $masa_kerja=0;
                          }else if(($baris[9]>=1)&&($baris[9]<2)){
                             $masa_kerja=2;
                          }else if(($baris[9]>=2)&&($baris[9]<3)){
                             $masa_kerja=4;
                          }else if(($baris[9]>=3)&&($baris[9]<4)){
                             $masa_kerja=6;
                          }else if(($baris[9]>=4)&&($baris[9]<5)){
                             $masa_kerja=8;
                          }else if(($baris[9]>=5)&&($baris[9]<6)){
                             $masa_kerja=10;
                          }else if($baris[9]>=6){
                             $masa_kerja=12;
                          }
                          $total=0;
                          if($baris[12]==0){
                              $total=($baris[8]+$masa_kerja+$baris[10]+$baris[11]);
                          }else if($baris[12]>0){
                              $total=($baris[8]+$masa_kerja+$baris[10]+$baris[11])*($baris[12]/100);
                          }
                          $ttltotal=$ttltotal+$total;

                         $_sql2         = "SELECT normal FROM set_tahun";
			 $hasil2        = bukaquery($_sql2);
			 $baris2        = mysql_fetch_row($hasil2);
			 $jmlmsk         = $baris2[0];
			 if($baris[13]!=0){
			     $jmlmsk=$baris[13];
			 }else if(!($baris[13]==0)){
			     $jmlmsk=$baris2[0];
			 }

                            $_sql3    = "SELECT count(id)
                            from jgmlm  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' group by id";
                            $hasil3   = bukaquery($_sql3);
                            $baris3   = mysql_fetch_row($hasil3);
                            $jgmlm    = $baris3[0];
                            $sisamlm  =0;
                            if($baris3[0]<=8){
                                $jgmlm=0;
                                $sisamlm=0;
                            }else if($baris3[0]>8){
                                $jgmlm=$baris3[0];
                                $sisamlm=$baris3[0]-8;
                            }

                            $_sql4    = "SELECT count(id)
                            from ketidakhadiran  where id='$id'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='A' group by id";
                            $hasil4   = bukaquery($_sql4);
                            $baris4   = mysql_fetch_row($hasil4);
                            $ttla     = $baris4[0];
                            if(empty ($baris4[0])){
                                $ttla=0;
                            }

                            $_sql5    = "SELECT count(id)
                            from ketidakhadiran  where id='$baris[0]'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='S' group by id";
                            $hasil5   = bukaquery($_sql5);
                            $baris5   = mysql_fetch_row($hasil5);
                            $ttls     = $baris5[0];
                            if(empty ($baris5[0])){
                                $ttls=0;
                            }

                            $_sql6    = "SELECT count(id)
                            from ketidakhadiran  where id='$baris[0]'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='C' group by id";
                            $hasil6   = bukaquery($_sql6);
                            $baris6   = mysql_fetch_row($hasil6);
                            $ttlc     = $baris6[0];
                            if(empty ($baris6[0])){
                                $ttlc=0;
                            }

                            $_sql7    = "SELECT count(id)
                            from ketidakhadiran  where id='$baris[0]'
                            and tgl like '%".$tahun."-".$bulan."%' and jns='I' group by id";
                            $hasil7   = bukaquery($_sql7);
                            $baris7   = mysql_fetch_row($hasil7);
                            $ttli     = $baris7[0];
                            if(empty ($baris7[0])){
                                $ttli=0;
                            }

                            $_sql8    = "SELECT count(id)
                            from tambahjaga  where id='$baris[0]'
                            and tgl like '%".$tahun."-".$bulan."%' group by id";
                            $hasil8   = bukaquery($_sql8);
                            $baris8   = mysql_fetch_row($hasil8);
                            $ttltmb   = $baris8[0];
                            if(empty ($baris8[0])){
                                $ttltmb=0;
                            }


                            $ttln=$jmlmsk+$ttltmb-($ttla+$ttls+$ttlc+$ttli);
                            $tmbh=($ttltmb-$ttla-$ttls-$ttlc-$ttli);

			    $_sql9    = "SELECT id from kasift  where id='$baris[0]'";
                            $hasil9   = bukaquery($_sql9);
                            $baris9   = mysql_fetch_row($hasil9);
                            $ks   = $baris9[0];
                            if(empty ($baris9[0])){
                                $ks=0;
                            }else {
				$ks=$ttln;
			    }

			    $_sql10="select sum(presensi.lembur)
                                from presensi
                                where presensi.id='$baris[0]' and presensi.tgl like '%".$tahun."-".$bulan."%'
                                and presensi.jns='HB'
                                group by presensi.id";
			    $hasil10=bukaquery($_sql10);
			    $baris10 = mysql_fetch_array($hasil10);
			    $hb   = $baris10[0];
			    if(empty ($baris10[0])){
                                $hb=0;
                            }else {
				$hb=$baris10[0];
			    }

			    $_sql11="select sum(presensi.lembur)
                                from presensi
                                where presensi.id='$baris[0]' and presensi.tgl like '%".$tahun."-".$bulan."%'
                                and presensi.jns='HR'
                                group by presensi.id";
			    $hasil11=bukaquery($_sql11);
			    $baris11 = mysql_fetch_array($hasil11);
			    $hr   = $baris11[0];
			    if(empty ($baris11[0])){
                                $hr=0;
                            }else {
				$hr=$baris11[0];
			    }

			    $gapok=0;
			    if(empty ($baris[14])){
                                $gapok=0;
                            }else {
				$gapok=$baris[14];
			    }
                            $ttlgapok=$ttlgapok+$gapok;

			    $tnjjbtn=0;
		            if(empty ($baris[15])){
                                $tnjjbtn=0;
                            }else {
				$tnjjbtn=$baris[15];
			    }
                            $ttltnjjbtn=$ttltnjjbtn+$tnjjbtn;

                            $_sql17  ="SELECT tnj from set_jgmlm ";
			    $hasil17 =bukaquery($_sql17);
			    $baris17 = mysql_fetch_array($hasil17);
			    $tmbhjgmlm = $sisamlm*$baris17[0];
                            $ttltmbhjgmlm=$ttltmbhjgmlm+$tmbhjgmlm;

			    $_sql18  ="SELECT tnj from set_jgtambah ";
			    $hasil18 =bukaquery($_sql18);
			    $baris18 = mysql_fetch_array($hasil18);
			    $tmbahanjg =0;
			    if(($jmlmsk<=26)&&($tmbh>0)){
				 $tmbahanjg=$tmbh*$baris18[0];
			    }
                            $ttltmbahanjg=$ttltmbahanjg+$tmbahanjg;

			    $_sql19  ="SELECT tnj from set_hadir ";
			    $hasil19 =bukaquery($_sql19);
			    $baris19 = mysql_fetch_array($hasil19);
			    $tnjhadir =0;
			    if($ttln>=$jmlmsk){
				 $tnjhadir=$baris19[0];
			    }
                            $ttltnjhadir=$ttltnjhadir+$tnjhadir;

                            $_sql20  ="SELECT tnj from set_lemburhb";
			    $hasil20 =bukaquery($_sql20);
			    $baris20 = mysql_fetch_array($hasil20);
			    $lemburhb=$hb*$baris20[0];
                            $ttllemburhb=$ttllemburhb+$lemburhb;

                            $_sql21  ="SELECT tnj from set_lemburhr";
			    $hasil21 =bukaquery($_sql21);
			    $baris21 = mysql_fetch_array($hasil21);
			    $lemburhr=$hr*$baris21[0];
                            $ttllemburhr=$ttllemburhr+$lemburhr;

                            $_sql22  ="SELECT ($ttln/sum(n))*100 from indekref where kdindex='$baris[6]'";
			    $hasil22 =bukaquery($_sql22);
			    $baris22 = mysql_fetch_array($hasil22);
			    $indexjaga=$baris22[0];
                            $ttlindexjaga=$ttlindexjaga+$indexjaga;

			    $ttlindex=$total+$indexjaga;

                            $_sql24="select sum(tindakan.jm)
                                from tindakan
                                where tindakan.id='$baris[0]' and tindakan.tgl like '%".$tahun."-".$bulan."%'
                                group by tindakan.id";
			    $hasil24=bukaquery($_sql24);
			    $baris24 = mysql_fetch_array($hasil24);
			    $jm   = $baris24[0];
			    if(empty ($baris24[0])){
                                $jm=0;
                            }else {
				$jm=$baris24[0];
			    }
                            $ttljm=$ttljm+$jm;

                        echo "     <table width='500px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
				      <caption><font size='2' face='Verdana' color='999999'><strong>Kehadiran</strong></font></caption>
                                       <TR class='isi3'>
                                         <TD width='20px'>WJB</TD>
                                         <TD width='20px'>N</TD>
                                         <TD width='20px'>+/-</TD>
                                         <TD width='20px'>MLM</TD>
                                         <TD width='20px'>+/-</TD>
                                         <TD width='20px'>KS</TD>
                                         <TD width='20px'>A</TD>
                                         <TD width='20px'>S</TD>
                                         <TD width='20px'>C</TD>
                                         <TD width='20px'>I</TD>
                                       </TR>
                                       <TR class='isi3'>
                                         <TD>$jmlmsk</TD>
                                         <TD>$ttln</TD>
                                         <TD>$tmbh</TD>
                                         <TD>$jgmlm</TD>
                                         <TD>$sisamlm</TD>
                                         <TD>$ks</TD>
                                         <TD>$ttla</TD>
                                         <TD>$ttls</TD>
                                         <TD>$ttlc</TD>
                                         <TD>$ttli</TD>
                                       </TR>
                                     </table><br>
									 
				     <table width='500px' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
					<caption><font size='2' face='Verdana' color='999999'><strong>Gaji & Tunjangan diterima</strong></font></caption>
				       <tr class='isi3'>
					 <TD width='150px'>Gaji Pokok</TD><td width='3px'>:</td><td width='190px'>".formatDuit($gapok)."</td>
				       </tr>
				       <tr class='isi3'>
				         <TD width='150px'>Tunjangan Jabatan</TD><td width='3px'>:</td><TD>".formatDuit($tnjjbtn)."</TD>
				       </tr>";
					 $_sql16="select master_tunjangan_harian.nama,
				         master_tunjangan_harian.tnj
					 from pnm_tnj_harian,master_tunjangan_harian
					 where pnm_tnj_harian.id_tnj=master_tunjangan_harian.id
					 and pnm_tnj_harian.id='$baris[0]'";
					 $hasil16=bukaquery($_sql16);
                                         $tnjtnj=0;
                                         while($baris16 = mysql_fetch_array($hasil16)) {
                                                $tnjtnj=$tnjtnj+($ttln*$baris16[1]);
                                                echo "<tr class='isi3'>
						 <td width='150px'>$baris16[0]</td><td width='3px'>:</td><td width='190px'> ".formatDuit($ttln*$baris16[1])."</td></tr>";
                                         }
                                         $ttltnjtnj=$ttltnjtnj+$tnjtnj;
                                         $ttljmlgaji=$ttljmlgaji+$gapok+$tnjjbtn+$tnjtnj+$tmbhjgmlm+$tmbahanjg+$tnjhadir;
									   
				    echo"
					<TR class='isi3'>
                                          <TD width='150px'>Tunjangan Jaga Malam</TD><td width='3px'>:</td><td width='190px'>".formatDuit($tmbhjgmlm)."</td>
					</TR>
					<TR class='isi3'>
                                          <TD width='150px'>Tunjangan Tambahan Jaga</TD><td width='3px'>:</td><td width='190px'>".formatDuit($tmbahanjg)."</td>
					</TR>
					<TR class='isi3'>
                                          <TD width='150px'>Tunjangan Kehadiran</TD><td width='3px'>:</td><td width='190px'>".formatDuit($tnjhadir)."</td>
				        </TR>
					 <TR class='isi3'>
                                           <TD width='150px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Jumlah Gaji & Tunjangan</i></TD>
					   <td width='3px'>:</td>
					   <td width='190px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>".formatDuit($gapok+$tnjjbtn+$tnjtnj+$tmbhjgmlm+$tmbahanjg+$tnjhadir)."</i></td>
					 </TR>
					 <TR class='isi3'>
                                            <TD width='150px'>Lembur :</TD><td></td><td></td>
					 </TR>
					 <TR class='isi3'>
                                             <TD width='150px'>Lembur Hari Biasa</TD><td width='3px'>:</td><td width='190px'>".formatDuit($lemburhb)."</td>
					 </TR>
					 <TR class='isi3'>
                                           <TD width='150px'>Lembur Hari Raya</TD><td width='3px'>:</td><td width='190px'>".formatDuit($lemburhr)."</td>
					 </TR>
					 <TR class='isi3'>
                                            <TD width='150px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Jumlah Lembur Diterima</i></TD>
					    <td width='3px'>:</td>
					    <td width='190px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>".formatDuit($lemburhb+$lemburhr)."</i></td>
					 </TR>
					 <TR class='isi3'>
                                            <TD width='150px'>Tambahan :</TD><td></td><td></td>
					 </TR>";
					    $_sql23="SELECT ($ttlindex/sum(indextotal.ttl))*((indexins.persen/100)*total_insentif)
                                                    from indextotal,indexins,set_insentif where
                                                    set_insentif.tahun='$tahun' and set_insentif.bulan='$bulanindex' and
                                                    indextotal.kdindex=indexins.dep_id and
                                                    indextotal.kdindex='$baris[6]'";
                                            $hasil23=bukaquery($_sql23);
                                            $baris23 = mysql_fetch_array($hasil23);
                                            $ttlinsentif=$baris23[0];
                                            $ttlttlinsentif=$ttlttlinsentif+$ttlinsentif;
                                            $jmltmb=$ttlinsentif+$jm;
                                            $ttljmltmb=$ttljmltmb+$jmltmb;

                                            $ttlgaji=$jmltmb+$lemburhb+$lemburhr+$gapok+$tnjjbtn+$tnjtnj+$tmbhjgmlm+$tmbahanjg+$tnjhadir;
                                            $ttlttlgaji=$ttlttlgaji+$ttlgaji;
			        echo "<TR class='isi3'>
                                         <TD width='150px'>Insentif Rumah Sakit</TD><td width='3px'>:</td><td width='190px'>".formatDuit($ttlinsentif)."</td>
				      </TR>
				      <TR class='isi3'>
                                         <TD width='150px'>Tindakan Medis </TD><td width='3px'></td><td width='190px'></td>";
                                         $_sql30="select master_tindakan.nama,sum(tindakan.jm)
                                              from master_tindakan,tindakan
                                              where tindakan.tnd=master_tindakan.id and
                                              tindakan.id='$baris[0]'
                                              and tgl like '%".$tahun."-".$bulan."%'
                                              group by tindakan.tnd ";
				         $hasil30=bukaquery($_sql30);
				         while($baris30 = mysql_fetch_array($hasil30)) {
					     echo "<tr class='isi3'><td width='150px'>&nbsp;&nbsp;- $baris30[0]</td><td width='3px'>:</td><td width='190px'>".formatDuit($baris30[1])."</td></tr>";
				         }
                                echo" </TR>
				      <TR class='isi3'>
                                         <TD width='150px'>Jasa Lain</TD><td width='3px'>:</td><td width='190px'>-</td>
				      </TR>
				      <TR class='isi3'>
                                         <TD width='150px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Jumlah Tambahan Diterima</i></TD>
					 <td width='3px'>:</td>
					 <td width='190px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>".formatDuit($jmltmb)."</i></td>
				     </TR>";
                                        $_sql25="select potongan.jamsostek,
                                                potongan.dansos,
                                                potongan.simwajib,
                                                potongan.angkop,
                                                potongan.angla,
                                                potongan.telpri,
                                                potongan.pajak,
                                                potongan.pribadi,
                                                potongan.lain from potongan
                                                where potongan.id='$baris[0]' and
                                                potongan.tahun='$tahun' and potongan.bulan='$bulanindex' ";
                                        $hasil25=bukaquery($_sql25);
                                        $baris25 = mysql_fetch_array($hasil25);
                                        $jamsostek   = $baris25[0];
                                        $dansos      = $baris25[1];
                                        $simwajib    = $baris25[2];
                                        $angkop      = $baris25[3];
                                        $angla       = $baris25[4];
                                        $telpri      = $baris25[5];
                                        $pajak       = $baris25[6];
                                        $pribadi     = $baris25[7];
                                        $lain        = $baris25[8];
                                        if(empty ($baris25[0])){
                                            $jamsostek=0;
                                        }else {
                                            $jamsostek=$baris25[0];
                                        }
                                        $ttljamsostek=$ttljamsostek+$jamsostek;

                                        if(empty ($baris25[1])){
                                            $dansos=0;
                                        }else {
                                            $dansos=$baris25[1];
                                        }
                                        $ttldansos=$ttldansos+$dansos;

                                        if(empty ($baris25[2])){
                                            $simwajib=0;
                                        }else {
                                            $simwajib=$baris25[2];
                                        }
                                        $ttlsimwajib=$ttlsimwajib+$simwajib;

                                        if(empty ($baris25[3])){
                                            $angkop=0;
                                        }else {
                                            $angkop=$baris25[3];
                                        }
                                        $ttlangkop=$ttlangkop+$angkop;

                                        if(empty ($baris25[4])){
                                            $angla=0;
                                        }else {
                                            $angla=$baris25[4];
                                        }
                                        $ttlangla=$ttlangla+$angla;

                                        if(empty ($baris25[5])){
                                            $telpri=0;
                                        }else {
                                            $telpri=$baris25[5];
                                        }
                                        $ttltelpri=$ttltelpri+$telpri;

                                        if(empty ($baris25[6])){
                                            $pajak=0;
                                        }else {
                                            $pajak=$baris25[6];
                                        }
                                        $ttlpajak=$ttlpajak+$pajak;

                                        if(empty ($baris25[7])){
                                            $pribadi=0;
                                        }else {
                                            $pribadi=$baris25[7];
                                        }
                                        $ttlpribadi=$ttlpribadi+$pribadi;

                                        if(empty ($baris25[8])){
                                            $lain=0;
                                        }else {
                                            $lain=$baris25[8];
                                        }
                                        $ttllain=$ttllain+$lain;

                                        $ttlditerima=$ttlgaji-($jamsostek+$dansos+$simwajib+$angkop+$angla+$telpri+$pajak+$pribadi+$lain);
                                        $ttlttlditerima=$ttlttlditerima+$ttlditerima;
				 echo "<TR class='isi3'>
                                         <TD width='150px'>Potongan Gaji :</TD><td></td><td></td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Jamsostek</TD><td width='3px'>:</td><td width='190px'>".formatDuit($jamsostek)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Dana Sosial</TD><td width='3px'>:</td><td width='190px'>".formatDuit($dansos)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Simpanan Wajib</TD><td width='3px'>:</td><td width='190px'>".formatDuit($simwajib)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Angsuran Koperasi</TD><td width='3px'>:</td><td width='190px'>".formatDuit($angkop)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Angsuran Lain</TD><td width='3px'>:</td><td width='190px'>".formatDuit($angla)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Telepon Pribadi</TD><td width='3px'>:</td><td width='190px'>".formatDuit($telpri)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Pajak</TD><td width='3px'>:</td><td width='190px'>".formatDuit($pajak)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Pribadi</TD><td width='3px'>:</td><td width='190px'>".formatDuit($pribadi)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>Lain-Lain</TD><td width='3px'>:</td><td width='190px'>".formatDuit($lain)."</td>
				       </TR>
				       <TR class='isi3'>
                                         <TD width='150px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>TOTAL GAJI DITERIMA</i></TD>
					 <td width='3px'>:</td>
					 <td width='190px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>".formatDuit($ttlditerima)."</i></td>
				      </TR>
                                      <TR class='isi3'>
                                         <TD width='150px'>&nbsp;</TD>
					 <td width='3px'>&nbsp;</td>
					 <td width='190px'>&nbsp;</td>
				      </TR>
				      <TR class='isi3'>
                                         <TD width='150px'></TD><td></td><td><center>Yogyakarta, ".date('d-m-Y')."</center> </td>
				      </TR>
				      <TR class='isi3'>
                                         <TD width='150px'><center>Karyawan Ybs</center></TD>
					 <td width='3px'>&nbsp;</td>
					 <td width='190px'><center>Pengelola</center></td>
				      </TR>
				      <TR class='isi3'>
                                         <TD width='150px'>&nbsp;</TD>
					 <td width='3px'>&nbsp;</td>
					 <td width='190px'>&nbsp;</td>
				      </TR>
				      <TR class='isi3'>
                                         <TD width='150px'>&nbsp;</TD>
					 <td width='3px'>&nbsp;</td>
					 <td width='190px'>&nbsp;</td>
				      </TR>
				      <TR class='isi3'>
                                         <TD width='150px'><center>( $baris[2] )</center></TD>
					 <td width='3px'>&nbsp;</td>
					 <td width='190px'><center>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</center></td>
				      </TR>
				      </table>
				      <br>
				      <center><font size='2' face='Verdana' color='999999'><i>..Terima kasih atas kerjasamanya <br>dalam memberikan pelayanan yang berkualitas..</i></font></center>" ;
                    }
        } 
    ?>
    </body>
</html>