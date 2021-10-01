<?php
    $user = 'udin';
    $pass = '123';
    
    if($_POST['uid'] == $user and $_POST['pw'] == $pass) {	
        session_start();
        $_SESSION['usr']=$user;
        $_SESSION['pwd']=$pass;
        header("location:adminpage.php");
    }
    else {
        echo "username dan password salah!";
    }
?>
