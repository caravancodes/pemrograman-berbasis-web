<html>
<head>
<title>jurnal1</title>
</head>
<body>
<form action="jurnal1.php" method="post">
Tentukan banyaknya data = 
<input type="text" name="data">
<input type="submit" value="kirim">
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$data = $_POST['data'];
echo "Bilangan genap antara 1 sampai dengan $data adalah ";
for ($x = 2 ; $x <= $data ; $x=$x+2) {
echo $x . ", ";

}
}
?>

</body>
</html>