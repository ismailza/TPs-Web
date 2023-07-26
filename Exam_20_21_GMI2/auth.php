<?php
    if (isset($_POST['submit']))
    {
        session_start();
        require_once ("connexion.php");
        $stm = $pdo->prepare("SELECT * FROM comptes WHERE login = :lg AND password = :ps");
        $stm->bindValue("lg", $_POST['login'], PDO::PARAM_STR);
        $stm->bindValue("ps", $_POST['password'], PDO::PARAM_STR);
        $stm->execute();
        if (!$stm->rowCount())
        {
            $_SESSION['error'] = "Your login or password is wrong!";
            header("location: index.php");
        } 
        else 
        {
            $user = $stm->fetch(PDO::FETCH_ASSOC);
            $_SESSION['auth'] = $user['nom'];
            if (isset($_SESSION['page'])) header("location:".$_SESSION['page']);
            else header("location:frmConsultation.php");
        }
    }
    else header("location: index.php");