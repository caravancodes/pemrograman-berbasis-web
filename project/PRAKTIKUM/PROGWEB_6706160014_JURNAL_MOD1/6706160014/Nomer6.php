<html>
<head>
<title>6706160014</title>
</head>
<body>

<form action="nomer6.php" method="post">

<input type="text" name="nilai">
<input type="submit" value="OK">

</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$x = $_POST['nilai'];

echo "value = " . $x . "<br>";
for ($i = 1 ; $i <= $x ; $i++) {
for ($j = 1 ; $j <= $i ; $j++) {
echo "*";
}
echo "<br>";
}

}
?>


</body>
</html>
