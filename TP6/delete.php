<?php
    include('../connect.php');

    $stm = $pdo->prepare("DELETE FROM etudiant WHERE id = ?");
    $stm->execute(array($_GET['id']));
    header("location:index.php");
?>