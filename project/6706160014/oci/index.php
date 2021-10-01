<?php

$username = "deknappe";
$password = "deknappe";
$db = "localhost/XE";

$conn = oci_connect($username, $password, $db);

if ($conn) {
    echo 'CONNECT';

$mapel = "select * from mapel";
$exe_mapel = oci_parse($conn, $mapel);
oci_execute($exe_mapel);
while ($row = oci_fetch_object($exe_mapel)) {
    echo $row->JURUSAN . '<br>';
}



} else {
    echo 'ZONK';
}







?>