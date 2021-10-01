<?php
	include "connection.php";
	$query = mysqli_query($link, "SELECT namaPeminjam FROM pinjamruangan");
	while($data = mysqli_fetch_array($query)){
		$a[]= $data['namaPeminjam'];  //semua namaPeminjam yg ada di dB disimpan dalam array a ($a[])
	}
	
	/*ISI ARRAY $a[] HARUS DIAMBIL DARI DATABASE, DI BAWAH INI HANYA SEBAGAI CONTOH*/
	$a[] = "Nama Mahasiswa 1";
	$a[] = "Nama Mahasiswa 2";
	$a[] = "Nama Mahasiswa 3";
	/*ISI ARRAY $a[] HARUS DIAMBIL DARI DATABASE, DI ATAS INI HANYA SEBAGAI CONTOH*/
	
	$q = $_GET["q"];  //hasil GET q disimpan dalam variable q ($q), dimana q = inputan dari text yang dioper ke URL melalui ajax.js
	$hint = "";
	if ($q != "") {  //kondisi jika hasil GET q tidak kosong
			$q = strtolower($q); //q sekarang telah diubah menjadi huruf kecil, supaya case-insensitive(huruf kecil/besar tidak dihiraukan)
			$len = strlen($q);  //hitung jumlah string dari q
			foreach($a as $name) {
					//stristr = mengambil sebagian string dari suatu posisi sub-string yang dicari -> stristr("string","sub-string")
					//substr = mengambil string berdasarkan indeks / nomor posisi huruf dalam string -> substr("string",int start, int length)
					if (stristr($q, substr($name, 0, $len))) { //kondisi pencarian string dg stristr, dimana parameter kedua menggunakan fungsi substr yg dimulai dari karakter pertama (0)
							if ($hint == "") {
									$hint = "$name";
							} else {
									$hint .= ", $name";
							}
					}
			}
	}
	// Output "No suggestion" jika inputan tidak ditemukan pada database
	echo $hint == "" ? "<font color='grey'>No suggestion</font>" : $hint;
?>