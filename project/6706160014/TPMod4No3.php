<!DOCTYPE html>
<html>
	<head>
		<title>TPMod4No3</title>
	</head>
	<body>
		<form action="TPMod4No3Proses.php" method="POST">
			<p>Nama : <input type="text" name="nama"></input></p>
			<p>NIM : <input type="text" name="nim"></input></p>
			<p>Kelas : 
			<select type="" name="kelas">
				<option value="kosong">--Pilih--</option>
				<option value="D3IF-39-01">D3IF-39-01</option>
				<option value="D3IF-39-02">D3IF-39-02</option>
				<option value="D3IF-39-03">D3IF-39-03</option>
				<option value="D3IF-39-04">D3IF-39-04</option>
				<option value="D3IF-39-05">D3IF-39-05</option>
				<option value="D3IF-40-01">D3IF-40-01</option>
				<option value="D3IF-40-02">D3IF-40-02</option>
				<option value="D3IF-40-03">D3IF-40-03</option>
				<option value="D3IF-40-04">D3IF-40-04</option>
			</select></p>
			<p>Gender : <input type="radio" name="gender" value="Male">Male</input>
			<input type="radio" name="gender" value="Female">Female</input><p>
			<p>Your Comments :<br>
			<textarea cols="40" rows="10" name="komen"></textarea></p>
			<input type="submit" name="sbt"></input>
		</form>
	</body>
</html>