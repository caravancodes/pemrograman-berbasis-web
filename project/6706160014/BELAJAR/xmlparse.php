<?php
echo 'XML PARSE';
echo '
<table>
    <tr>
        <td>NAMA</td>
        <td>ID BARANG</td>
    </tr>
';
$xml = simplexml_load_file('pembelian.xml');
foreach ($xml as $row) {
    echo'
    <tr>
    <td>'.$row->nama.'</td>
    <td>'.$row->idBarang.'</td>
    </tr>
    ';
}
echo'</table>';
?>