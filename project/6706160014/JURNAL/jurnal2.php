<html>
<head>
<title>jurnal2</title>
</head>
<body>
<form action="jurnal2.php" method="post">
MENU PILIHAN : <br>
1. HITUNG POTONGAN HARGA <br>
2. HITUNG LUAS PERSEGI PANJANG <br>
Masukkan pilihan menu (menggunakan angka) : 
<input type="text" name="data">
<input type="submit" value="SUBMIT">
</form>
<br><br>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $data = $_POST['data'];
    switch ($data) {
    case 1 :
        echo "<form action='jurnal2.php' method='get'>";
        echo "Menghitung Potongan Harga <br>";
        echo "Masukkan harga : ";
        echo "<input type='text' name='harga'>";
        echo "<input type='submit' value='HITUNG'>";
        echo "</form>";

        if($_SERVER['REQUEST_METHOD']=='GET') {
        $harga = $_GET['harga'];
        $diskon = $harga / 2;
        echo "Potongan harga dari Rp $harga adalah Rp $diskon";
        }
        break;


    case 2 :
        echo "<form action='jurnal2.php' method='post'>";
        echo "Menghitung Luas Persegi Panjang <br>";
        echo "Masukkan panjang (cm) : ";
        echo "<input type='text' name='panjang'>";
        echo "Masukkan lebar (cm) : ";
        echo "<input type='text name='lebar'>";
        echo "<input type='submit' value='HITUNG'>";
        echo "</form>";

        if($_SERVER['REQUEST_METHOD']=='POST') {
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $luas = $panjang * $lebar;
        echo "Luas persegi panjang dengan panjang $panjang cm dan lebar $lebar cm adalah $luas"; 
        }
        break;

    default :
        echo "Kode yang anda masukkan salah";
        break;
        }
}


?>

</body>
</html>