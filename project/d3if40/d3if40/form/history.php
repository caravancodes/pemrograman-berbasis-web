<?php
        if (isset($_COOKIE['history_pencarian'])) {
			echo $_COOKIE['history_pencarian'];		
		}
		else {
			echo "cookies pencarian telah dihapus!";
		}				
?>
