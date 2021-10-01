<?php
        require_once('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
    <script src="get_tipe.js"></script>
</head>
<body>
    <h3>Contoh Form dengan AJAX</h3>
<form>
<!--
    <select onchange="tampilkanTipeHP(this.value)">
        <option value="">---Pilih Merk---</option>
        <option value="1">Nokia</option>
        <option value="2">Samsung</option>
    </select>
-->
    Merk HP : 
    <select onchange="tampilkanTipeHP(this.value)">
        <option value="">--Pilih--</option>
        <?php
            $qry = mysqli_query($conn, "select * from merk_hp");
            while ($row = mysqli_fetch_row($qry))
            {
                echo "<option value=$row[0]>$row[1]";
            }
        ?>    
    </select>
    <br><br>
    <div id="demo_pilih"></div>
    
</form>
</body>
</html>
