<?php
include ('connect.php');
$sql = "select * from gedung";
$query = $conn->query($sql);
$gedung = new SimpleXmlElement('<gedung/>');
while ($row = $query->fetch_array()) {
    $boy = $gedung -> addChild('data');
    $boy->addChild("nama","".$row['namaGedung']."");
}
Header('Content-type: text/html');
print($gedung->asXML());
file_put_contents('gedung.xml', $gedung->saveXML());
?>