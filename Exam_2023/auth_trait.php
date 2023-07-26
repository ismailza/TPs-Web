<?php
    if (isset($_POST['submit']))
    {
        session_start();
        require_once("connect.php");
        $stm = $pdo->prepare("SELECT * FROM Comptes WHERE login = :l AND password = :p");
        $stm->bindValue("l", $_POST['login'], PDO::PARAM_STR);
        $stm->bindValue("p", md5($_POST['password']), PDO::PARAM_STR);
        $stm->execute();
        if (!$stm->rowCount())
        {
            $_SESSION['error'] = "login ou mot de passe incorrect!";
            header("location:Auth.php");
        }
        else 
        {
            $_SESSION['auth'] = $_POST['login'];
            if (isset($_SESSION['page'])) header("location:".$_SESSION['page']);
            else header("location: vote.php");
        }
    } 
    else header("location: Auth.php");