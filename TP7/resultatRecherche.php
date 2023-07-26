<?php
    require_once('inc.php');
    include('connect.php');
    if (isset($_POST['search']))
    {
        $filtre = $_POST['filtre'];
        $key = $_POST['key'];
        $stm = $pdo->prepare("SELECT id, nom, filiere, controle, exam, (2*exam + controle)/3 moyenne 
                            FROM etudiant
                            WHERE $filtre = :k");
        $stm->bindValue("k", $key, PDO::PARAM_STR);
        $stm->execute();
    }
    else header("location:recherche.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de recherche</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <img src="logo_fstm.png" alt="logo" srcset="">
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="recherche.php">Recherche</a></li>
            <?php 
                if (isset($_SESSION['auth'])) echo "<li><a href=\"logout.php\">Logout</a></li>";
                else echo "<li><a href=\"login.php\">Login</a></li>"; 
            ?>
        </ul>
    </header>
    <h2 align="center">Résultat de recherche</h2> 
    <section class="etudiants_view">
        <table align="center" cellspacing="0">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Filière</th>
                <th>Contrôle</th>
                <th>Examen</th>
                <th>Moyenne</th>
            </tr>
            <?php
            if (!$stm->rowCount()): echo"<tr><td colspan='6' align='center'>Table vide</td></tr>";
            else:
                $etudiants = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($etudiants as $et): ?>
                    <tr>
                        <td><?php echo $et['id']; ?></td>
                        <td><?php echo $et['nom']; ?></td>
                        <td><?php echo $et['filiere']; ?></td>
                        <td><?php echo $et['controle']; ?></td>
                        <td><?php echo $et['exam']; ?></td>
                        <td><?php echo $et['moyenne']; ?></td>
                    </tr>
                <?php endforeach;  
            endif ?>
        </table>
    </section>
</body>
</html>