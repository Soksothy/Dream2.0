<?php
global $con;
include "connection.php";
session_start();
if(isset($_POST["login_btn"])){


    $sql = "SELECT user.username , user.password FROM user";
    $result = $con->query($sql);

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    while($row = $result->fetch_assoc()){
        $username_inDB = $row['username'];
        $password_inDB = $row['password'];
        
        if($username == $username_inDB && $password == $password_inDB){
            if($row['type_user'] = 'customer'){
                $_SESSION['login'] = 'success';
                header("location: checkout.php");
            }
            if($row['type_user'] == 'admin'){
                $_SESSION["login_btn"] = "sucessfull";
                header("location:Homepage.php");
            }
        }

    }

    
}

?>

