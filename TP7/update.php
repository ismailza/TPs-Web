<?php
    session_start();
    if (!$_SESSION['auth']) header("location:login.php");
    include('connect.php');
    if (isset($_POST['update']))
    {
        $stm = $pdo->prepare("UPDATE etudiant SET nom = :n, filiere = :f, controle = :c, exam = :e WHERE id = :i");
        $stm->bindValue("n", $_POST['nom'], PDO::PARAM_STR);
        $stm->bindValue("f", $_POST['filiere'], PDO::PARAM_STR);
        $stm->bindValue("c", $_POST['controle'], PDO::PARAM_STR);
        $stm->bindValue("e", $_POST['exam'], PDO::PARAM_STR);
        $stm->bindValue("i", $_POST['id'], PDO::PARAM_STR);
        $stm->execute();
        if ($stm) $_SESSION['t_success'] = "Etudiant a ete modifie avec succès";
        else $_SESSION['t_error'] = "Erreur: Etudiant n'est pas modifie!";
        header("location:index.php");
    }
    if (isset($_GET['id']))
    {
        $stm = $pdo->prepare("SELECT * FROM etudiant WHERE id = :i");
        $stm->bindValue(':i',$_GET['id'], PDO::PARAM_INT);
        $stm->execute();
        if (!$stm->rowCount()) header("location:index.php");
        $etu = $stm->fetch();
    }
    else header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <section class="container">
    <h1 align="center">Modifier un étudiant</h1>
    <form action="" method="post" onsubmit="return Verify_input();">
        <input type="text" name="id" value="<?php echo $etu['id']; ?>" hidden>
        <table align="center">
            <tr>
                <td><label for="nom">Nom</label></td>
                <td><input type="text" name="nom" id="nom" value="<?php echo $etu['nom']; ?>"></td>
            </tr>
            <tr><td class="msg" id="nom_msg" colspan="2"></td></tr>
            <tr>
                <td><label for="filiere">Filière</label></td>
                <td><input type="text" name="filiere" id="filiere" value="<?php echo $etu['filiere']; ?>"></td>
            </tr>
            <tr><td class="msg" id="filiere_msg" colspan="2"></td></tr>
            <tr>
                <td><label for="controle">Note controle</label></td>
                <td><input type="number" name="controle" id="controle" value="<?php echo $etu['controle']; ?>"></td>
            </tr>
            <tr><td class="msg" id="controle_msg" colspan="2"></td></tr>
            <tr>
                <td><label for="exam">Note exam</label></td>
                <td><input type="number" name="exam" id="exam" value="<?php echo $etu['exam']; ?>"></td>
            </tr>
            <tr><td class="msg" id="exam_msg" colspan="2"></td></tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="update" value="Modifier">
                    <input type="button" value="Annuler" onclick="window.location.href='index.php'";>
                </td>
            </tr>
        </table>
    </form>
    </section>
    <script src="js.js"></script>
</body>
</html>