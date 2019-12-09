<?php
    session_start();
    require_once("connect.php");
    $token = $_SESSION['token'];
    if(!isset($_SESSION['token']) || !isset($_POST['token_csrf'])){
        echo 'Invalid Token!';
        die();
    }
    if(time()>$_SESSION['token_expire']){
        unset($_SESSION['token']);
        echo 'Token expire!';
        header("Location: index.php");
    }
    if(isset($_POST['token_csrf']) == $token){
        if(isset($_POST['username'])){
        $Username = htmlentities($_POST["username"]);
        $Password = htmlentities($_POST["password"]);
        $resultusername = $con->query("SELECT * FROM datalogin WHERE username = '$Username' and password = '$Password'");
        $count = mysqli_num_rows($resultusername);
        if($count == 1){
            $_SESSION['Username'] = $Username;
            session_regenerate_id();
            header("Location: index.php");
        }
        else{
            echo "Your Username or Password Seems Invalid";
        }
    }

    }
    
?>