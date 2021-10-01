<?php
include('connect.php');
$id = $_GET['id_toko'];
$sql = "select * from barang where id_toko = '$id'";
$query = $conn->query($sql);
echo '<select name="barang">';
while ($row = $query->fetch_array()) {
    echo '<option value="'.$row['id_barang'].'">'.$row['nama_barang'].'</option>';
}
echo '</select>';
?>