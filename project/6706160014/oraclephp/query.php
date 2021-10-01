<?php
$conn = oci_connect('oci', 'oci', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}





$sql = "select * from kampus where idkampus='$idkampus'  ";
					$sqlparse=oci_parse($conn, $sql);
					oci_execute($sqlparse) or die(oci_error());
					$baris = oci_fetch_object($sqlparse);

                    $parsesql = oci_parse($conn, $query);
                    oci_execute($parsesql);

?>