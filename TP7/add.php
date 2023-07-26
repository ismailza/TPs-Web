<?php
    session_start();
    if (!$_SESSION['auth']) header("location:login.php");
    include('connect.php');
    if (isset($_POST['submit']))
    {
        $stm = $pdo->prepare("INSERT INTO etudiant (nom, filiere, controle, exam) VALUES (:n,:f,:c,:e)");
        $stm->bindValue("n", $_POST['nom'], PDO::PARAM_STR);
        $stm->bindValue("f", $_POST['filiere'], PDO::PARAM_STR);
        $stm->bindValue("c", $_POST['controle'], PDO::PARAM_STR);
        $stm->bindValue("e", $_POST['exam'], PDO::PARAM_STR);
        $stm->execute();
        if ($stm) $_SESSION['success'] = "Etudiant est ajouté avec succès";
        else $_SESSION['error'] = "Erreur: Etudiant n'est pas ajouté!";
        header("location:index.php");
    }
?>