<?php 
    session_start();
    if (!$_SESSION['auth']) header("location:login.php");
    if (isset($_GET['id']))
    {
        include('connect.php');
        $stm = $pdo->prepare("DELETE FROM etudiant WHERE id = :i");
        $stm->bindValue(':i',$_GET['id'], PDO::PARAM_INT);
        $stm->execute();
        if ($stm) $_SESSION['t_success'] = "Etudiant est supprime avec success";
        else $_SESSION['t_error'] = "Etudiant n'est pas supprime";
    }
    header("location:index.php");
?>