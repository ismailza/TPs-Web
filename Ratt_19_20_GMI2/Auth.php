<?php
    
    if (!isset($_POST['submit'])) header("location: Auth.html");

    session_start();

    require_once ("connect.php");

    $stm = $pdo->prepare("SELECT * FROM admin WHERE login = :log AND password = :pass");
    $stm->bindValue("log", $_POST['login'], PDO::PARAM_STR);
    $stm->bindValue("pass", md5($_POST['password']), PDO::PARAM_STR);
    $stm->execute();

    if ($stm->rowCount()) 
    {
        $_SESSION['auth'] = TRUE;
        if (isset($_SESSION['page'])) header("location: ".$_SESSION['page']);
        else header("location: Menu.html");
    }
    else header("location: Auth.html?error=Votre login ou mot de passe est incorrect!");