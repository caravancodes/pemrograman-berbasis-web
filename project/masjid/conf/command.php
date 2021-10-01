<?php
	function title(){
 		$judul ="Sistem Informasi Masjid & Jamaah Masjid --)(*!!@#$%";
		$judul = ereg_replace("[^A-Za-z0-9_\-\./,|]"," ",$judul);
		$judul = str_replace(array('.','-','/',',')," ",$judul);
		$judul = trim($judul);
		echo "$judul";	
 	}
 
 	function cekSessiKunjung() {
		if (session_is_registered('ses_kunjung'))
			return true;
		else
			return false;
	}

	function cekSessiAdmin() {
		if (session_is_registered('ses_admin'))
			return true;
		else
			return false;
	}

        function cekSessiPegawai() {
		if (session_is_registered('ses_pegawai'))
			return true;
		else
			return false;
	}

        function cekSessiDosen() {
		if (session_is_registered('ses_dosen'))
			return true;
		else
			return false;
	}

        function cekSessiOperator() {
		if (session_is_registered('ses_operator'))
			return true;
		else
			return false;
	}
	
	function kunjungAktif() {
		if (cekSessiPakar()) return $_SESSION['ses_kunjung'];
	}

	function adminAktif() {
		if (cekSessiAdmin()) return $_SESSION['ses_admin'];
	}

        function pegawaiAktif() {
		if (cekSessiPegawai()) return $_SESSION['ses_pegawai'];
	}

        function dosenAktif() {
		if (cekSessiDosen()) return $_SESSION['ses_dosen'];
	}

        function operatorAktif() {
		if (cekSessiOperator ()) return $_SESSION['ses_operator'];
	}
	
	function isGuest() {
		if (cekSessiKunjung()|| cekSessiAdmin()) return false;
		else return true;
	}
	
	
	function samping()
	{
            
		if (cekSessiAdmin()):
			echo "<br/>  <h2>.: MASTER &nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :.</h2>
                                 <p>
                                 <ul class=\"left_menu\">
					<li class=\"odd\"><a href='index.php?act=ListPendidikan'>Pendidikan</a></li>
					<li class=\"even\"><a href='index.php?act=ListCariPegawai'>Data Pengurus</a></li>
					<li class=\"odd\"><a href='index.php?act=ListMasjid'>Data Masjid</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListInventaris'>Inventaris Masjid</a></li>
					<li class=\"odd\"><a href='index.php?act=ListNisob&action=TAMBAH'>Nisob</a></li>
					<li class=\"even\"><a href='index.php?act=ListJamaah'>Jamaah</a></li>
					<li class=\"odd\"><a href='index.php?act=ListKegiatan'>Kegiatan Masjid</a></li>
					<li class=\"even\"><a href='index.php?act=ListJadwal'>Jadwal Kegiatan</a></li>
					<li class=\"odd\"><a href='index.php?act=ListYatim'>Anak Yatim</a></li>
					<li class=\"even\"><a href='index.php?act=ListJanda'>Janda</a></li>
					<li class=\"odd\"><a href='index.php?act=ListFakir'>Fakir Miskin</a></li>
					<li class=\"even\"><a href='index.php?act=ListMustahiq'>Mustahiq</a></li>
					<li class=\"odd\"><a href='index.php?act=ListMuzaqi'>Muzaki</a></li>
					<li class=\"even\"><a href='index.php?act=ListPemasukan'>Pemasukan</a></li>
					<li class=\"odd\"><a href='index.php?act=ListPengeluaran'>Pengeluaran</a></li>
					<li class=\"even\"><a href='index.php?act=ListKas'>Kas Masjid</a></li>
					<li class=\"odd\"><a href='index.php?act=Zakat'>Hitung Zakat</a></li>
				  </ul>
                                  </p><br>
                               ";
                        calender();
		/*elseif(cekSessiDosen()):
                         echo "<br/>  <h2>.: FILE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :.</h2>
                                 <p>
                                 <ul class=\"left_menu\">
					<li class=\"odd\"><a href='index.php?act=ListPegawai'>Data Pegawai</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPangkat'>Riwayat Kepegawaian</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPendidikan'>Riwayat Pendidikan</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListSeminar'>Kegiatan Ilmiah</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListDiklat'>Pelatihan</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListNaikgaji'>Kenaikan Gaji Berkala</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPilih'>Data Keluarga</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPenghargaan'>Riwayat Penghargaan</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPenelitian'>Penelitian Pegawai</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListLn'>Kunjungan Keluar Negeri</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListAbdi'>Pengabdian Masyarakat</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPengalaman'>Pengalaman Kerja</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPengajaran'>Pendidikan & Pengajaran</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListKomponen'>Komponen Karya Ilmiah</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListAhli'>Riwayat Keahlian</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListBimbing'>Pembimbing Skripsi</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListUji'>Penguji Skripsi</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListSidang'>Ketua Sidang</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPenasehat'>Penasehat Akademik</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListBahasa'>Penguasaan Bahasa</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListCetak'>Preview Data</a></li>
				  </ul>
                                  </p>
                                  <br/>
                               ";
                    calender();
                elseif(cekSessiPegawai ()):
                         echo "<br/>  <h2>.: FILE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :.</h2>
                                 <p>
                                 <ul class=\"left_menu\">
					<li class=\"odd\"><a href='index.php?act=ListPegawai'>Data Pegawai</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPangkat'>Riwayat Kepegawaian</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPendidikan'>Riwayat Pendidikan</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListSeminar'>Kegiatan Ilmiah</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListDiklat'>Pelatihan</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListNaikgaji'>Kenaikan Gaji Berkala</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPilih'>Data Keluarga</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPenghargaan'>Riwayat Penghargaan</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPenelitian'>Penelitian Pegawai</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListLn'>Kunjungan Keluar Negeri</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListAbdi'>Pengabdian Masyarakat</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPengalaman'>Pengalaman Kerja</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPengajaran'>Pendidikan & Pengajaran</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListKomponen'>Komponen Karya Ilmiah</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListAhli'>Riwayat Keahlian</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListBimbing'>Pembimbing Skripsi</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListUji'>Penguji Skripsi</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListSidang'>Ketua Sidang</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPenasehat'>Penasehat Akademik</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListBahasa'>Penguasaan Bahasa</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListCetak'>Preview Data</a></li>
				  </ul>
                                  </p>
                                  <br/>
                               ";
                    calender();

                    elseif(cekSessiOperator()):
                         echo "<br/>  <h2>.: MASTER DATA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :.</h2>
                                 <p>
                                 <ul class=\"left_menu\">
					<li class=\"even\"><a href='index.php?act=ListStruktural'>Struktural</a></li>
					<li class=\"odd\"><a href='index.php?act=ListRuang'>Pangkat</a></li>
					<li class=\"even\"><a href='index.php?act=ListFungsional'>Fungsional</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListUnitkerja'>Dosen Jurusan</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListSttsaktif'>Status Aktif</a></li>
				  </ul>
                                  </p>
                               ";

                        echo "<br/>  <h2>.: FILE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :.</h2>
                                 <p>
                                 <ul class=\"left_menu\">
					<li class=\"odd\"><a href='index.php?act=ListPegawai'>Data Pengurus</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPangkat'>Riwayat Kepegawaian</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPendidikan'>Riwayat Pendidikan</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListSeminar'>Kegiatan Ilmiah</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListDiklat'>Pelatihan</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListNaikgaji'>Kenaikan Gaji Berkala</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPilih'>Data Keluarga</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPenghargaan'>Riwayat Penghargaan</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPenelitian'>Penelitian Pegawai</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListLn'>Kunjungan Keluar Negeri</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListAbdi'>Pengabdian Masyarakat</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListPengalaman'>Pengalaman Kerja</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPengajaran'>Pendidikan & Pengajaran</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListKomponen'>Komponen Karya Ilmiah</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListAhli'>Riwayat Keahlian</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListBimbing'>Pembimbing Skripsi</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListUji'>Penguji Skripsi</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListSidang'>Ketua Sidang</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListPenasehat'>Penasehat Akademik</a></li>
                                        <li class=\"even\"><a href='index.php?act=ListBahasa'>Penguasaan Bahasa</a></li>
                                        <li class=\"odd\"><a href='index.php?act=ListCetak'>Preview Data</a></li>
				  </ul>
                                  </p>
                                  <br/>
                               ";
                    calender();*/

		elseif(isGuest()):
			menuLogin();
			calender();
                        //kategori();

		endif;	
	}
	
	function bawah() 
	{
	  echo	"<p id=\"legal\">Copyright &copy; 2011 STIE Swastamandiri. All Rights Reserved. Design by Khanza.Soft Media</p>
                ";
	}
 
 	function tampilMenu() {
		if (cekSessiKunjung()) {
			$menu = array(
				'Home'			=> '?act=HomeKunjung',
				'Data Komentar'		=> '?act=DataKomentar',
				'Sign Out'		=> 'logout.php');
		} elseif (cekSessiAdmin()) {
			$menu = array(
				'Informasi'		=> '?act=ListArtikel',
                                'About Program'	        => '?act=HomeAdmin',
				'Data Admin'	 	=> '?act=InputDataAdmin&action=TAMBAH',
				'Sign Out'		=> 'logout.php');
		}elseif (cekSessiDosen ()) {
			$menu = array(
                                'About Program'	        => '?act=HomeAdmin',
                                'Data Admin'	 	=> '?act=InputDataAdmin&action=TAMBAH',
				'Sign Out'		=> 'logout.php');
		}elseif (cekSessiPegawai ()) {
			$menu = array(
                                'About Program'	        => '?act=HomeAdmin',
                                'Data Admin'	 	=> '?act=InputDataAdmin&action=TAMBAH',
				'Sign Out'		=> 'logout.php');
		}elseif (cekSessiOperator ()) {
			$menu = array(
				'Informasi'		=> '?act=ListArtikel',
                                'About Program'	        => '?act=HomeAdmin',
                                'Data Admin'	 	=> '?act=InputDataAdmin&action=TAMBAH',
				'Sign Out'		=> 'logout.php');
		} else {
			$menu = array(
				'Informasi & Pengumuman'=> 'index.php?act=Home',
				'Hitung Zakat'	=> 'index.php?act=Zakat',
	                        'About Program'		=> 'index.php?act=Kontak');
		}		
		echo "<ul id=\"navlist\">";
		$i=0;
		foreach ($menu as $key => $val) {
			$i++;
			if ($key=='Sign Out')	$klik = "onclick=\"return confirm('Yakinkah anda akan logout.?');\""; 
			if (isGuest()) {
				if ($i == 5) $last = "id='current'";
			} else {
				if ($i == 5) $last = "id='current'";
			}
			echo "<li title='$key'><a href='$val' >$key</a></li>";
		}
		echo "</ul>";
	} 	
	
	
	function ListArtikel()
	{
		$x= bukaquery("SELECT * FROM artikel where page='artikel' ORDER BY id DESC LIMIT 4");
		while($row=mysql_fetch_array($x))
		{
		  $judul=$row['1'];
		  $isi  = substr($row['1'],0,160);
		  $post =konversiTanggal((substr($row[4],0,10)));  	
		  echo "<ul><li><b>$judul</b><br />
					<small>posted on $post</small><br/>";
		  echo	"$isi<a href=\"index.php?act=News&id=$row[0]\">...detail</a>";	  	
		  echo "</li></ul>";	
		} 
	}
		
	function calender() {
		echo "  
                        <h2>.: KALENDER :.</h2>                     
                        <p>";
		include_once "include/calender.php";
		echo "    
                        </p>
                        <br>
                      ";
	}

        function kategori() {
		echo "
                        <h2>.: KATEGORI :.</h2>
                      
                      <p>
                          ";
		include_once "pages/subside.php";
		echo "    
                       </p>";
	}
	
	
	function formProtek() {
		if (!cekSessiAdmin()) {
			$form = array ('HomeAdmin','Pengguna','olahpengguna');
				foreach ($form as $page) {
					if ($_GET['act']==$page) {
						echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = ?act=Home'>";
						exit;
						break;
					}
				}
			}

		if (!cekSessiKunjung()||!cekSessiDosen()||!cekSessiPegawai()||!cekSessiOperator()) {
			$form = array ('HomePelanggan','BasisAturan');
			    foreach ($form as $page) {
					if ($_GET['act']==$page) {
						echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = ?act=HomeAdmin'>";
						exit;
						break;
					}
				}
			}
			
		
	}
	
	function actionPages() {
		formProtek();
		switch ($_REQUEST['act']) {
			case 'Kontak'		  	: include_once('pages/kontak.php'); break;
			case 'InputLokasi'              : include_once('pages/lokasi/inputlokasi.php'); break;
			
			case 'InputPegawai'		: include_once('pages/pegawai/inputpegawai.php'); break;
                        case 'ListCariPegawai'		: include_once('pages/pegawai/listcaripegawai.php'); break;
                        case 'PrintPegawai'		: include_once('pages/pegawai/laporanpegawai.php'); break;
                        case 'ListMasjid'		: include_once('pages/datamasjid/listmasjid.php'); break;
                        case 'InputMasjid'		: include_once('pages/datamasjid/inputmasjid.php'); break;

                        case 'InputPendidikan'		: include_once('pages/pendidikan/inputpendidikan.php'); break;
			case 'ListPendidikan'		: include_once('pages/pendidikan/listpendidikan.php'); break;
                        
                        case 'ListInventaris'		: include_once('pages/inventaris/listinventaris.php'); break;
                        case 'InputInventaris'		: include_once('pages/inventaris/inputinventaris.php'); break;

			case 'ListNisob'		: include_once('pages/nisob/listnisob.php'); break;
			case 'ListJamaah'		: include_once('pages/jamaah/listjamaah.php'); break;
                        case 'InputJamaah'		: include_once('pages/jamaah/inputjamaah.php'); break;
			case 'ListKegiatan'		: include_once('pages/kegiatan/listkegiatan.php'); break;
			case 'InputKegiatan'		: include_once('pages/kegiatan/inputkegiatan.php'); break;
                        case 'ListJadwal'		: include_once('pages/jadwal/listjadwal.php'); break;
                        case 'InputJadwal'	        : include_once('pages/jadwal/inputjadwal.php'); break;

                        case 'InputYatim'	        : include_once('pages/yatim/inputyatim.php'); break;
                        case 'ListYatim'	        : include_once('pages/yatim/listyatim.php'); break;
                        case 'InputJanda'	        : include_once('pages/janda/inputjanda.php'); break;
                        case 'ListJanda'	        : include_once('pages/janda/listjanda.php'); break;
                        case 'ListFakir'	        : include_once('pages/fakir/listfakir.php'); break;
			case 'InputFakir'               : include_once('pages/fakir/inputfakir.php'); break;                        

                        case 'ListMustahiq'	        : include_once('pages/mustahiq/listmustahiq.php'); break;
			case 'InputMustahiq'            : include_once('pages/mustahiq/inputmustahiq.php'); break;
                        case 'ListMuzaqi'	        : include_once('pages/muzaqi/listmuzaqi.php'); break;
			case 'InputMuzaqi'              : include_once('pages/muzaqi/inputmuzaqi.php'); break;
                        case 'ListPemasukan'	        : include_once('pages/pemasukan/listpemasukan.php'); break;
			case 'InputPemasukan'           : include_once('pages/pemasukan/inputpemasukan.php'); break;
			
			case 'ListPengeluaran'	        : include_once('pages/pengeluaran/listpengeluaran.php'); break;
			case 'InputPengeluaran'           : include_once('pages/pengeluaran/inputpengeluaran.php'); break;
			
			case 'ListKas'		: include_once('pages/kas/listkas.php'); break;
			case 'Zakat'		: include_once('pages/kas/hitungzakat.php'); break;
						
                        case 'HomeAdmin'		: include_once('pages/admin.php'); break;
			case 'BukuTamu'			: include_once('pages/listtamu.php'); break;
			
			case 'InputArtikel'		: include_once('pages/inputartikel.php'); break;
			case 'InputDataAdmin'		: include_once('pages/aturadmin.php'); break;			
			case 'InputTahun'		: include_once('pages/aturtahun.php'); break;
			case 'ListArtikel'		: include_once('pages/listartikel.php'); break;
			

                        case 'ListCetak'                 : include_once('pages/cetak/listcetak.php'); break;
			case 'DetailCetak'              : include_once('pages/cetak/detailcetak.php'); break;

                        case 'ListDepan'                 : include_once('pages/dosendepan/listdepan.php'); break;
			case 'PrevDepan'              : include_once('pages/dosendepan/prevdepan.php'); break;
                        case 'PrevDosen'              : include_once('../dosen/prevdepan.php'); break;

                        default			          : include_once('pages/home.php');
			
		}
	}
	
	
	 
 function menuLogin(){
 
 	echo "  <br>
                <h2>.: LOGIN ADMIN :.</h2>
              
              <p>
              
	     <form name=\"form\" action=\"login.php?act=login\"  method='post'  onSubmit=\"return validasiLogin();\">
		<table>
			<tr>
                            <td class=\"caption\">User</td>
                            <td><input class=\"teks_input\" type=\"text\"  size=\"16\" value=\"$_GET[usere]\" id=\"TxtUser\" name=\"usere\" title=\"Masukkan username kamu...\" onKeyDown=\"setDefault(this, document.getElementById('MsgUser'));\" />
				 <span id=\"MsgUser\" style=\"color:#CC0000; font-size:10px;\"></span>
			    </td>
                        </tr>
			<tr>
                            <td class=\"caption\">Password</td>
                            <td><input class=\"teks_input\" type=\"password\" size=\"16\"value=\"$_GET[passwordte]\" id=\"TxtPassword\" name=\"passwordte\" title=\"Masukkan password kamu...\" onKeyDown=\"setDefault(this, document.getElementById('MsgPassword'));\" />
				 <span id=\"MsgPassword\" style=\"color:#CC0000; font-size:10px;\"></span>
			    </td>
                        </tr>
			<tr>
                            <td></td>
                            <td><input class='register' name=\"BtnOk\" value='Log-in' type='submit' />&nbsp;
                                <input class='register' type='reset' name=\"BtnReset\" value='Reset'/>&nbsp;
                            </td>
                        </tr>
		</table>
	    </form>
            </p>
            <br>
            ";
 }	
?>