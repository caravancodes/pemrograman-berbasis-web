<html>
<head>
<title>operator</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="nilai1"> <br><br>
		<select name="operasi">
			<option> + </option>
			<option> - </option>
			<option> * </option>
			<option> / </option>
			<option> % </option>		
		</select> <br><br>
		<input type="text" name="nilai2"> <br><br>
		<input type="submit" value="hitung"> <br><br>
		Hasilnya :  	
	</form>

	<?php
		//if($_SERVER['REQUEST_METHOD']=='POST') 
		if (isset($_POST['nilai1']) && isset($_POST['nilai2']) && isset($_POST['operasi']))
		{
			$nil1 = $_POST['nilai1'];
			$nil2 = $_POST['nilai2'];
			$opr = $_POST['operasi'];
		
			if ($opr == "+") {
				echo $nil1 + $nil2;
			}
			else if ($opr == "-") {
				echo $nil1 - $nil2;
			}
			else if ($opr == "*") {
				echo $nil1 * $nil2;
			}
			else if ($opr == "/") {
				echo $nil1 / $nil2;
			}
			else if ($opr == "%") {
				echo $nil1 % $nil2;
			}
			else {
				echo "null";
			}
		}
	?>
</body>
</html>
