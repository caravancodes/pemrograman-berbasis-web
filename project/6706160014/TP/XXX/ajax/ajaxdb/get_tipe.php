<?php
	require_once ('koneksi.php');

	$merk = $_GET['id'];

    $qry = mysqli_query($conn, "select * from tipe_hp where id_merk = '$merk'");
	
	if(mysqli_num_rows($qry) > 0)
    {	
        echo "Tipe : ";
        echo "<select>";
            while($row = mysqli_fetch_row($qry)) {
                echo "<option value=$row[0]>$row[1]";
            }
        echo "</select>";
	}
?>
