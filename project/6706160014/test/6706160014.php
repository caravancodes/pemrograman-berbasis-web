<?php
$conn = mysql_connect("localhost","","");
if($conn) {
mysql_select_db("6706160014");
echo "berhasil connect dengan database 6706160014";
} else {
echo "gagal Koneksi";
}
?>
