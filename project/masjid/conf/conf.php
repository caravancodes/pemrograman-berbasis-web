<?php

    $db_hostname    ="localhost";
    $db_username    ="root";
    $db_password    ="";
    $db_name        ="masjid";

    function host(){
        global $db_hostname;
        return $db_hostname;
    }

     function  bukakoneksi()
	 {
     	global $db_hostname, $db_username, $db_password, $db_name;
        $konektor=@mysql_connect($db_hostname,$db_username,$db_password)
        or die ("<font color=red><h3>Not Connected ..!!</h3></font>");
        $db_select=mysql_select_db($db_name)
        or die("<font color=red><h3>Cannot chose database..!!</h3></font>");
     }


     function tutupkoneksi()
	 {
       global  $konektor;
       mysql_close($konektor);
     }

     function bukaquery($sql)
	 {
       bukakoneksi();
       $result=mysql_query($sql)
        or die(mysql_error()."<br/><font color=red><b>Gagal</b> menjalankan perintah query !");
        return $result;
     }

     function bukainput($sql)
	 {
       bukakoneksi();
       $result=mysql_query($sql)
        or die(mysql_error()."<br/><font color=red><b>Gagal</b>, Ada data dengan primary key yang sama !");
        return $result;
     }

     function hapusinput($sql)
	 {
       bukakoneksi();
       $result=mysql_query($sql)
        or die(mysql_error()."<br/><font color=red><b>Gagal</b>, Data masih dipakai di tabel lain !");
        return $result;
     }

	function Tambah($tabelname,$attrib,$pesan) {

             $command = bukainput("INSERT INTO ".$tabelname." VALUES (".$attrib.")");
        echo  "<img src='images/simpan.gif' />&nbsp;&nbsp; Data $pesan berhasil disimpan";
        return $command;
     }

     function InsertData($tabelname,$attrib) {

             $command = bukaquery("INSERT INTO ".$tabelname." VALUES (".$attrib.")");
        return $command;
     }

     function Ubah($tabelname,$attrib,$pesan) {
             $command = bukaquery("UPDATE ".$tabelname." SET ".$attrib." ");
        echo  "<img src='images/simpan.gif' />&nbsp;&nbsp; Data $pesan berhasil diubah";
        return $command;
     }

     function Hapus($tabelname,$param,$hal) {
        $sql ="DELETE FROM ".$tabelname." WHERE ".$param." ";
             $command = hapusinput($sql);
        Zet($hal);
        return $command;
     }

     function HapusAll($tabelname) {
        $sql ="DELETE FROM ".$tabelname;
             $command = bukaquery($sql);
        return $command;
     }

     function JSRedirect($url)
	 {
		 echo"<html><head><title></title><meta http-equiv='refresh' content='1;URL=$url'></head><body></body></html>";
	 }

	 function Zet($url)
	 {
		 echo"<html><head><title></title><meta http-equiv='refresh' content='0;URL=$url'></head><body></body></html>";
	 }


	function JurusKibasNaga()
	{
		$id	= $_SERVER['REMOTE_ADDR'];
		$sql=bukaquery("DELETE FROM tmp WHERE ID='$id'");
		return $sql;
	}


    function konversiTgl($tanggal)
	{
		list($thn,$bln,$tgl)=explode('-',$tanggal);
		$tmp = $tgl."-".$bln."-".$thn;
		return $tmp;
	}

    	function konversiBulan($bln) {
		switch($bln) {
			case "01": $bulan="Januari"; break;
			case "02": $bulan="Februari"; break;
			case "03": $bulan="Maret"; break;
			case "04": $bulan="April"; break;
			case "05": $bulan="Mei"; break;
			case "06": $bulan="Juni"; break;
			case "07": $bulan="Juli"; break;
			case "08": $bulan="Agustus"; break;
			case "09": $bulan="September"; break;
			case "10": $bulan="Oktober"; break;
			case "11": $bulan="Nopember"; break;
			case "12": $bulan="Desember"; break;
			default  : $bulan="Tidak Boleh";
		}
		return $bulan;
	}

    function konversiTanggal($tanggal)
	{
		list($thn,$bln,$tgl)=explode('-',$tanggal);
		$tmp = $tgl." ".konversiBulan($bln)." ".$thn;
		return $tmp;
	}

    function formatDuit($duit)
	{
		return "Rp. ".number_format($duit,0,",",".").",-";
	}

    function JumlahBaris($result) {
  		return mysql_num_rows($result);
	}

	 function getOne($sql) {
     $hasil=bukaquery($sql);
     list($result) =mysql_fetch_array($hasil);
     return $result;
     }

     function cekKosong($sql) {
		$jum = mysql_num_rows($sql);
		if ($jum==0) return true;
		else return false;
	}
	
	function loadTgl(){
		//echo "<option selected>------&nbsp</option>";
		for($tgl=1; $tgl<=31; $tgl++){
			$tgl_leng=strlen($tgl);
			if ($tgl_leng==1)
			$i="0".$tgl;
			else
			$i=$tgl;                        
			echo "<option value=$i>$i</option>";
		}
	}
	
	function loadBln(){
		//echo "<option selected>-----&nbsp</option>";
		for($bln=1; $bln<=12; $bln++){
			$bln_leng=strlen($bln);
			if ($bln_leng==1)
			$i="0".$bln;
			else
			$i=$bln;                        
			echo "<option value=$i>$i</option>";
		}
	}
	
	function loadThn(){
		$thnini=date('Y');
		//echo "<option selected>--------</option>";
		for($thn=$thnini; $thn>=1980; $thn--){
			$thn_leng=strlen($thn);
			if ($thn_leng==1)
			$i="0".$thn;
			else
			$i=$thn;                        
			echo "<option value=$i>$i</option>";
		}
	}
	
	function loadJam(){
		//echo "<option selected>-----&nbsp</option>";
		for($jam=0; $jam<=23; $jam++){
			$jam_leng=strlen($jam);
			if ($jam_leng==1)
			$i="0".$jam;
			else
			$i=$jam;                        
			echo "<option value=$i>$i</option>";
		}
	}
	
	function loadMenit(){
		//echo "<option selected>-----&nbsp</option>";
		for($menit=0; $menit<=60; $menit++){
			$menit_leng=strlen($menit);
			if ($menit_leng==1)
			$i="0".$menit;
			else
			$i=$menit;                        
			echo "<option value=$i>$i</option>";
		}
	}
        
?>