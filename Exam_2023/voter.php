<?php
    if (isset($_POST['submit']))
    {
        require_once ("connect.php");
        $s = $_POST['appr'];
        $i = $_POST['candidat'];
        $stm = $pdo->prepare("UPDATE Candidats SET score = score+$s WHERE ID = $i");
        $stm->execute();
        if (!$stm) 
        {
            session_start();
            $_SESSION['error'] = "Something is wrong!";
            header("location: vote.php");
        }
        else header("location: consult.php");
    }
    else header("location:vote.php");