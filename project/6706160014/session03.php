<?php
session_start();
if (isset($_SESSION['oke'])) {
unset ($_SESSION);
session_destroy();

echo '
<h1> Anda sudah berhasil logout<br> 
klik <a href="TP6_1.php">di sini</a> untuk Login kembali<br>
anda sekarang tidak bisa masuk ke halaman <br>
<a href="session02.php">session02.php</a> lagi 
<h2>
';
}
?>