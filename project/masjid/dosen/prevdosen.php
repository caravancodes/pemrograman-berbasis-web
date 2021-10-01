<?php
 include '../conf/conf.php';
?>
<!-- -->
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
    <h1 class="title">::[ Data Dosen ]::</h1>
    <div class="entry">
        <div style="width: 100%;  padding: 5px">
        
            <?php
                echo "";
                $nip            =$_GET['nip'];
                $_sql = "SELECT pegawai.nama,
                        pegawai.nip_baru,
                        jbtn_struktural.nama,
                        fungsional.nama,
                        pegawai.tmp_lahir,
                        pegawai.tgl_lahir,pegawai.photo,pegawai.alamat,
                        pegawai.telpon,pegawai.email
                        FROM pegawai inner join
                        jbtn_struktural inner join
                        fungsional
                        where nip_baru='$nip'
                        and pegawai.struktural=jbtn_struktural.kode
                        and pegawai.fungsional=fungsional.kode
                        ORDER BY pegawai.nama";
                $hasil=bukaquery($_sql);
                while($baris = mysql_fetch_array($hasil)) {
                   echo "<table width='100%' align='center'>
                           <tr class='head3'>
                             <td width='20%' ROWSPAN=7><img src='../$baris[6]' width='145px' height='145px'></td>
                             <td width='25%' >Nama</td><td width=''>:</td>
                             <td width='55%'>$baris[0]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='25%' >NIP</td><td width=''>:</td>
                             <td width='55%'>$baris[1]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='25%' >Jabatan </td><td width=''>:</td>
                             <td width='55%'>$baris[2]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='25%' >Jabatan Fungsional</td><td width=''>:</td>
                             <td width='55%'>$baris[3]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='25%' >Alamat</td><td width=''>:</td>
                             <td width='55%'>$baris[7]</td>
                          </tr>
                         <tr class='head3'>
                             <td width='25%' >No.Telp</td><td width=''>:</td>
                             <td width='55%'>$baris[8]</td>
                          </tr>
                          <tr class='head3'>
                             <td width='25%' >E-Mail</td><td width=''>:</td>
                             <td width='55%'>$baris[9]</td>
                          </tr>
                    </table><br/>";
                }

                $_sql = "SELECT pendidikan_pegawai.pendidikan,
                         pendidikan_pegawai.sekolah,
                         pendidikan_pegawai.jurusan,
                         pendidikan_pegawai.thn_lulus
                         FROM pendidikan_pegawai
                         where pendidikan_pegawai.nip='$nip' and pendidikan_pegawai.pendidikan='S1'
                         or pendidikan_pegawai.nip='$nip' and pendidikan_pegawai.pendidikan='S2'
                         or pendidikan_pegawai.nip='$nip' and pendidikan_pegawai.pendidikan='S3'
                         or pendidikan_pegawai.nip='$nip' and pendidikan_pegawai.pendidikan='Post Doctor' ORDER BY pendidikan_pegawai.pendidikan ASC ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {

                    echo "&nbsp;&nbsp;<b>Riwayat Pendidikan : </b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    ";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi5'>
                                <td>$baris[0]</td>
                                <td>$baris[1],$baris[2]</td>
                                <td>$baris[3]</td>
                             </tr>";
                    }
                    echo "</table><br/>";
                }

                $_sql = "SELECT pengalaman.id,
                         pengalaman.nip,
                         pengalaman.rentang,
                         pengalaman.posisi,
                         pengalaman.pengalaman from pengalaman where nip='$nip' ORDER BY pengalaman.rentang ASC ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {
                    echo "&nbsp;&nbsp;<b>Pengalaman Kerja  </b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                    while($baris = mysql_fetch_array($hasil)) {
                      echo "<tr class='isi5'>
                                <td>$baris[2]</td>
                                <td>$baris[4]</td>
                                <td>$baris[3]</td>
                              </tr>";
                    }
                   echo "</table><br/>";
               }

               $_sql = "SELECT keahlian.id,
                          keahlian.nip,
                          keahlian.keahlian,
                          keahlian.dasar,
                          keahlian.bahasa from keahlian where nip='$nip' ORDER BY keahlian.keahlian ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "&nbsp;&nbsp;<b>Keahlian</b> <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi5'>
                                    <td>$baris[2]</td>

                                </tr>";
                        }
                        echo "</table><br/>";
               }

               $_sql = "SELECT bahasa.id,
                          bahasa.nip,
                          bahasa.bahasa from bahasa where nip='$nip' ORDER BY bahasa.bahasa";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "&nbsp;&nbsp;<b>Penguasaan Bahasa</b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi5'>
                                    <td>$baris[2]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
               }

               $_sql = "SELECT komponenilmiah.penerbit,
                        komponenilmiah.tahun,
                       komponenilmiah.judul,komponenilmiah.dokumen from komponenilmiah where nip='$nip' ORDER BY komponenilmiah.tahun ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {

                    echo "&nbsp;&nbsp;<b>Publikasi  </b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    ";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi5'>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td><a target=_blank href=../$baris[3]>$baris[2]<a></td>
                             </tr>";
                    }
                    echo "</table><br/>";
                }

                $_sql = "SELECT seminar_pegawai.id,
                        seminar_pegawai.nip,
                        seminar_pegawai.tingkat,
                        seminar_pegawai.jenis,
                        seminar_pegawai.nama_seminar,
                        seminar_pegawai.peranan,
                        seminar_pegawai.tanggal,
                        seminar_pegawai.sd,
                        seminar_pegawai.penyelengara,
                        seminar_pegawai.tempat from seminar_pegawai where nip='$nip' ORDER BY seminar_pegawai.tanggal ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "&nbsp;&nbsp;<b>Kegiatan Ilmiah</b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi5'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[8]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
               }

               $_sql = "SELECT pelatihan_pegawai.nama_pelatihan,
                        pelatihan_pegawai.tgl_mulai,
                        pelatihan_pegawai.tgl_akhir,
                        pelatihan_pegawai.jml_jam,
                        pelatihan_pegawai.thn_sertifikat,
                        pelatihan_pegawai.tempat,
                        pelatihan_pegawai.keterangan,
                        pelatihan_pegawai.peran
                        FROM pelatihan_pegawai
                        where pelatihan_pegawai.nip='$nip'
                        ORDER BY nip ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "&nbsp;&nbsp;<b>Pelatihan</b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi5'>
                                    <td>$baris[0]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
               }

               $_sql = "SELECT penghargaan.id,
                        penghargaan.nip,
                        penghargaan.jenis,
                        penghargaan.nama_penghargaan,
                        penghargaan.tanggal,
                        penghargaan.instansi,
                        penghargaan.pejabat_pemberi from penghargaan where penghargaan.nip='$nip' ORDER BY penghargaan.tanggal ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "&nbsp;&nbsp;<b>Penghargaan</b> <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi5'>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
               }

               
               $_sql = "SELECT penelitian.peranan,
                         penelitian.judul_buku,
                         penelitian.tahun from penelitian where nip='$nip' ORDER BY penelitian.tahun ";
                $hasil=bukaquery($_sql);
                $jumlah=mysql_num_rows($hasil);

                if(mysql_num_rows($hasil)!=0) {

                    echo "&nbsp;&nbsp;<b>Penelitian : </b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                    ";
                    while($baris = mysql_fetch_array($hasil)) {
                        echo "<tr class='isi5'>
                                <td>$baris[0]</td>
                                <td>$baris[1]</td>
                                <td>$baris[2]</td>
                             </tr>";
                    }
                    echo "</table><br/>";
                }

                $_sql = "SELECT kunjungan.id,
                         kunjungan.nip,
                         kunjungan.jenis_kegiatan,
                         kunjungan.tujuan,
                         kunjungan.negara,
                         kunjungan.tgl_mulai,
                         kunjungan.tgl_selesai,
                         kunjungan.asal_dana from kunjungan where nip='$nip' ORDER BY kunjungan.tgl_mulai ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "&nbsp;&nbsp;<b>Kunjungan Keluar Negeri</b> <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi5'>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
                 }

                 $_sql = "SELECT pengabdian.id,
                        pengabdian.nip,
                        pengabdian.target_peserta,
                        pengabdian.tempat,
                        pengabdian.tgl_mulai,
                        pengabdian.tgl_selesai,
                        pengabdian.kegiatan,
                        pengabdian.jml_peserta,
                        pengabdian.asal_dana,
                        pengabdian.besar_dana from pengabdian where nip='$nip' ORDER BY pengabdian.tgl_mulai ASC";
                    $hasil=bukaquery($_sql);
                    $jumlah=mysql_num_rows($hasil);
                    if(mysql_num_rows($hasil)!=0) {
                        echo "&nbsp;&nbsp;<b>Pengabdian Masyarakat</b><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='tbl_form'>
                            ";
                        while($baris = mysql_fetch_array($hasil)) {
                            echo "<tr class='isi5'>
                                    <td>$baris[2]</td>
                                    <td>$baris[3]</td>
                                    <td>$baris[4]</td>
                                    <td>$baris[5]</td>
                                    <td>$baris[6]</td>
                                    <td>$baris[7]</td>
                                </tr>";
                        }
                        echo "</table><br/>";
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
</div>
        </body>
</html>
