<?php
echo 'JSON PARSE';
echo '
<table>
    <tr>
        <td>NAMA</td>
        <td>ID BARANG</td>
    </tr>
';
$url = 'pembelian.json';
$json = file_get_contents($url);
$link = json_decode($json);
foreach ($link->pembelian->data as $row){
echo '
<tr>
<td>'.$row->nama.'</td>
<td>'.$row->idBarang.'</td>
</tr>
';
}
echo'</table>';
?>