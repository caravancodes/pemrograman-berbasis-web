<?php	
/* cara mysql 
 * mysql_connect("localhost","user","password");
 * 
 * cara oracle 
 * oci_connect("user","password","localhost/XE");
 */
$conn = oci_connect('oci', 'oci', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

	
