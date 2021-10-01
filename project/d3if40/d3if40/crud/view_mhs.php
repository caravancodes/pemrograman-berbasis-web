<?php
    //untuk koneksi ke database 
    require_once('koneksi.php');

    //query untuk menampilkan data mahasiswa
    $sql = "select * from mahasiswa";

    //hasil eksekusi query
    $qry = mysqli_query($conn,$sql);

//    $jml_kolom = mysqli_num_fields($qry); //mengetahui jumlah field
//    echo "jumlah field: $jml_kolom <br>";
//
//    $jml_record = mysqli_num_rows($qry); //mengetahui jumlah record
//    echo "jumlah record: $jml_record <br>";

    //looping semua record data

    //menghasilkan struktur data dalam bentuk array asosiatif maupun array numerik
    /*
        Array Asosiatif, merupakan array yang setiap elemennya kita tentukan secara manual,
        (berupa string atau nomor).
        Bisa menggunakan nama kolom dari tabel MySQL sebagai key atau index array.
    */
//    while($data = mysqli_fetch_array($qry)) { 
//        echo $data['nim'];
//        echo "<br>";
//        echo $data['nama'];
//        echo "<br>";
//        echo $data['alamat'];
//        echo "<br><br>";
//    }
    
    //menghasilkan sruktur data dalam bentuk array berindeks
    /*
        Array Berindeks, merupakan array yang setiap elemennya menggunakan nomor elemen (indeks).
    */
//    while($data = mysqli_fetch_row($qry)) { 
//        echo $data[0];
//        echo "<br>";
//        echo $data[1];
//        echo "<br>";
//        echo $data[2];
//        echo "<br><br>";
//    }

    //menjadikan nama kolom menjadi properti dari objek
    while($data = mysqli_fetch_object($qry)) { 
            echo $data -> nim;
            echo "<br>";
            echo $data -> nama;
            echo "<br>";
            echo $data -> alamat;
            echo "<br><br>";
    }

    //performance dari ketiga fungsi diatas yg paling cepat adalah row, array, object

    mysqli_close($conn);
?>
