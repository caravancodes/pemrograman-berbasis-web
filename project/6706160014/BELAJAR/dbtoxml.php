<?php
include('connect.php');
$sql = "select * from pembelian";
$query = $conn->query($sql);
$xml = new SimpleXMLElement ('<pembelian/>');
while ($row = $query->fetch_array()) {
    $data = $xml->addChild('data');
    $data->addChild('nama',''.$row['nama'].'');
    $data->addChild('idBarang',''.$row['id_barang'].'');
}
Header('Contents-type: text/xml');
print($xml->asXML());
file_put_contents('pembelian.xml',$xml->saveXML());
?>