<?php
    session_start();
    if(isset($_SESSION['usr']) && isset($_SESSION['pwd'])){
        header("Location: adminpage.php");
    }
?>
<html>
<head>
<title>Login Form</title>
</head>
<body>
<h2>Login Form</h2>
    <form method="post" action="checklogin.php">
        User Id  : <input type="text" name="uid"><br><br>
        Password : <input type="password" name="pw"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>