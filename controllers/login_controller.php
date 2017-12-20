<?php

    $db = mysqli_connect('localhost', 'root','', 'tasker');

    $mail = "";
    $pass = "";
    $result = "";

    //call to create a new account
    if(isset($_POST['subscribe'])){
        $mail = $_POST['email'];
        $pass = $_POST['password'];
        $query = "SELECT mail FROM tb_users as u
                  WHERE u.mail = '$mail'";
        $result = mysqli_query($db, $query);
        //check if there is an account with the same e-mail created
        if(mysqli_num_rows($result)){
            session_start();
            $_SESSION['signupError'] = true;
            header('location: ../views/signup.php');
        }
        else{
            $query = "INSERT INTO tb_users(mail, pass)
                  VALUES ('$mail', '$pass')";

            mysqli_query($db, $query);
            header('location: ../views/tasks.php');
        }
    }

    //call to validate login
    if(isset($_POST['login'])){
        $mail = $_POST['email'];
        $pass = $_POST['password'];
        $query = "SELECT mail, pass FROM tb_users as u
                  WHERE u.mail = '$mail' AND u.pass = '$pass'";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result)){
            header('location: ../views/tasks.php');
        }
        else{
            session_start();
            $_SESSION['loginError'] = true;
            header('location: ../index.php');
        }
    }
?>