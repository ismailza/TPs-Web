<?php
    if (isset($_POST['submit']))
    {
        session_start();
        include('connect.php');
        $stm = $pdo->prepare("INSERT INTO admin (nom, email, login, password) VALUES (:n, :e, :l, :p)");
        $stm->bindValue("n",$_POST['nom'], PDO::PARAM_STR);
        $stm->bindValue("e",$_POST['email'], PDO::PARAM_STR);
        $stm->bindValue("l",$_POST['login'], PDO::PARAM_STR);
        $stm->bindValue("p",md5($_POST['password']), PDO::PARAM_STR);
        $stm->execute();
        if (!$stm) 
        {
            $_SESSION['error'] = "Inscription non effectuee";
            header("location:signup.php");
        }
        $_SESSION['success'] = "Inscription bien effectuee";
        header("location:login.php");
    }
    else header("location:signup.php");
?>