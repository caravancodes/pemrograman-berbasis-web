<?php
    require_once('koneksi.php');

    $sql = "select * from jurusan";
    $qry = mysqli_query($conn,$sql);

    while($data = mysqli_fetch_array($qry)) { 
        echo $data['id_jur'];
        echo "<br>";
        echo $data['nama_jur'];
        echo "<br><br>";
    }
    
    mysqli_close($conn);
?>
