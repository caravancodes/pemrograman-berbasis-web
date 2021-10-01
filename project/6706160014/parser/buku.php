<?php
    $xml = simplexml_load_file("buku.xml");
    $root = $xml -> getName();
    echo "<h3>".strtoupper($root)."</h3>";
    
    foreach($xml->children() as $buku) {
        $katalog_buku = $buku->children();
        //echo "No Buku : ".$buku->attributes()."<br>";
        foreach($katalog_buku as $b) {
            echo $b->getName(). " : " .$b. "<br>";
        }
        echo "<br><hr>";
    }
?>
