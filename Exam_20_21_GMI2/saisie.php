<?php
    if (isset($_POST['submit']))
    {
        session_start();
        require_once("connexion.php");
        $stm = $pdo->prepare("INSERT INTO etudiants (nom, email, controle, projet, examen) VALUES (:n, :e, :c, :p, :x)");
        $stm->bindValue("n", $_POST['nom'], PDO::PARAM_STR);
        $stm->bindValue("e", $_POST['email'], PDO::PARAM_STR);
        $stm->bindValue("c", $_POST['controle'], PDO::PARAM_STR);
        $stm->bindValue("p", $_POST['projet'], PDO::PARAM_STR);
        $stm->bindValue("x", $_POST['examen'], PDO::PARAM_STR);
        $stm->execute();
        if (!$stm) $_SESSION['error'] = "Erreur: l'etudiant n'est pas ajoute!";
        else $_SESSION['success'] = "Etudiant ajoute avec success";
    }
    header("location:frmSaisie.php");