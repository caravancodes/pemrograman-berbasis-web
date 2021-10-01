<?php
    session_start();
    if(isset($_SESSION['usr']) && isset($_SESSION['pwd'])){
        header("location: adminpage.php");
    }
?>
<html>
<head>
<title>Login Form</title>
</head>
<body>
<br>
<div align="center">
<h2>Login Form</h2>
    <form method="post" action="">
        <table bgcolor="silver">
            <tr>
                <td align="right">username</td>
                <td><input type="text" name="uid"></td>
            </tr>
            <tr>
                <td align="right">password</td>
                <td><input type="password" name="pw"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <font size="2" color="silver">&copy; 2017 [Fery]</font>
    <br><br>
    
    <?php
        require_once('koneksi.php');
        
        if (isset($_POST['uid']) && isset($_POST['pw'])) 
        {
            $user = $_POST['uid'];
            $pass = $_POST['pw'];
            
            $qry = mysqli_query($conn, "select * from admin where username = '$user' and password = '$pass'"); 
            $cek = mysqli_num_rows($qry);
            
            if($cek > 0) 
            {	
                session_start();
                $_SESSION['usr']=$user;
                $_SESSION['pwd']=$pass;
                header("location:adminpage.php");
            }
            else 
            {
                echo "<font color='red'>username dan password salah!</font>";
            }
            
        }    
    ?>
    
</div>
</body>
</html>
