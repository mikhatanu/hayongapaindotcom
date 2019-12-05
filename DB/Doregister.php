<?php

    require_once("connect.php");

    $Username = htmlentities($_POST["username"]);
    $Password = htmlentities($_POST["password"]);
    $ConfirmPassword = htmlentities($_POST["confirmpassword"]);

    if($Password == $ConfirmPassword){
        $result = $con->query("INSERT INTO datalogin(username,password) VALUES('$Username','$Password')");
    }
    else{
        header("location: register.php");
    }
    header("Location: index.php");

    $con->close();


?>