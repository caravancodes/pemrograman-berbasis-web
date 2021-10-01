<?php
include('connect.php');
$sql = "select * from pembelian";
$query = $conn->query($sql);
$pembelian = array();
$data = array();
$isi = array();

while ($row = $query->fetch_array()) {
    $isi[] = array(
        'nama' => ''.$row['nama'].'',
        'idBarang' => ''.$row['id_barang'].''
    );
}

$data['data'] = $isi;
$pembelian['pembelian'] = $data;
$json = json_encode($pembelian, JSON_PRETTY_PRINT);
echo $json;
file_put_contents('pembelian.json', $json);
?>