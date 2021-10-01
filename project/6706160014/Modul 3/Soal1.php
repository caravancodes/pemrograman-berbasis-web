<!DOC html>
<html>
<head>
<title>TP MODUL 3</title>
</head>
<body>
<?php
echo "Nama : Muhammad Faisal Amir <br>
NIM : 6706160014 <br>
Kelas : D3IF-40-02 <br><br> ";
?>

<form action="Soal1.php" method="post">
<textarea name="input" cols="40" row=10></textarea><br>
<input type="submit" name="Submit" value="OKE">

<?php
if (isset($_POST['Submit'])) {
$isi = $_POST['input'];

</form>
</body>
</html>