<?php
    session_start();
    require_once("connect.php");
    if(isset($_POST['username'])){
        $Username = htmlentities($_POST["username"]);
        $Password = htmlentities($_POST["password"]);
        $resultusername = $con->query("SELECT * FROM datalogin WHERE username = '$Username' and password = '$Password'");
        $count = mysqli_num_rows($resultusername);
        if($count == 1){
            $_SESSION['Username'] = $Username;
            header("Location: index.php");
        }
        else{
            echo "Your Username or Password Seems Invalid";
        }
    }

?>