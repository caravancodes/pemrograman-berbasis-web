<html>
<head>
<title>6706160014</title>
</head>
<body>
<?php
$array1 = array(0,2,6,12,20,30,42,56,72,90,110);
$array2 = array(1,3,5,7,9,11,13,15,17,19);

echo "Instanisasi Array dari nilai1 : <br>";

for($i = 0 ; $i <= 10; $i++) {
echo "nilai1[" . $i . "] = " .$array1[$i] . "<br>";
}

echo "<hr>";

echo "Instanisasi Array dari nilai2 : <br>";

for($i = 0 ; $i <= 9; $i++) {
echo "nilai2[" . $i . "] = " .$array2[$i] . "<br>";
}

echo "<hr>";
?>

<table border="1">
<tr>
<td>No</td>
<td>Nilai1</td>
<td>Nilai2</td>
<td>Penjumlahan</td>
<td>Pengurangan</td>
<td>Perkalian</td>
<td>Pembagian</td>
<td>Penggabungan</td>
</tr>

<?php
for($i = 0 ; $i <= 9; $i++) {
echo "<tr>";
echo "<td>" . ($i + 1) . "</td>";
echo "<td>$array1[$i]</td>";
echo "<td>$array2[$i]</td>";
echo "<td>" . ($array1[$i]+$array2[$i]) . "</td>";
echo "<td>" . ($array1[$i]-$array2[$i]) . "</td>";
echo "<td>" . ($array1[$i]*$array2[$i]) . "</td>";
echo "<td>" . ($array1[$i]/$array2[$i]) . "</td>";
echo "<td>" . $array1[$i] . $array2[$i] . "</td>";
echo "</tr>";
}
?>


</table>

</body>
</html>
