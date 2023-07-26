<?php
    session_start();
    if (isset($_SESSION['auth'])) header("location:index.php");
    if (isset($_POST['submit']))
    {
        include('connect.php');
        $stm = $pdo->prepare("SELECT * FROM admin WHERE (login = :l OR email = :e) AND password = :p");
        $stm->bindValue("l", $_POST['login'], PDO::PARAM_STR);
        $stm->bindValue("e", $_POST['login'], PDO::PARAM_STR);
        $stm->bindValue("p", md5($_POST['password']), PDO::PARAM_STR);  
        $stm->execute();
        if (!$stm->rowCount())
        {
            $_SESSION['error'] = "Login or Password is wrong!";
            header("location:login.php");
        }
        else
        {
            $admin = $stm->fetch();
            $_SESSION['auth'] = $admin['nom'];
            if (isset($_SESSION['page'])) header("location:".$_SESSION['page']);
            else header("location:index.php");
        }
    }
    else header("location:index.php");
?>