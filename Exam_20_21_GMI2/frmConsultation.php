<?php 
    require_once("inc.php");
    $constr = "";
    $choix = "all";
    if (isset($_POST['search']))
    {
        $choix = $_POST['choix'];
        if ($choix == "admis") $constr = "WHERE moyenne >= 12";
        elseif ($choix == "ajournes") $constr = "WHERE moyenne < 12";
    }
    require_once("connexion.php");
    $qrt = "SELECT * 
            FROM (SELECT *, (25*controle+15*projet+60*examen)/100 as 'moyenne' FROM etudiants) E
            $constr
            ORDER BY moyenne DESC";
    $stm = $pdo->prepare($qrt);
    $stm->execute();
    $students = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include('menu.php'); ?>
    </header>
    <div class="container">
        <h2 class="title">Recherche des étudiants</h2>
        <form action="" method="post" class="search">
            <table class="table-100">
                <tr>
                    <td><label for="choix">Recherche</label></td>
                    <td>
                        <select name="choix" id="choix">
                            <option value="all">Tous les étudiants</option>
                            <option value="admis" <?php if ($choix == "admis") echo "selected"; ?>>Les étudiants admins</option>
                            <option value="ajournes" <?php if ($choix == "ajournes") echo "selected"; ?>>Les étudiants ajournés</option>
                        </select>
                    </td>
                    <td><input type="submit" value="Cherche" name="search"></td>
                </tr>
            </table>            
        </form>
        <h2 class="title">Listes des étudiants</h2>
        <table class="table-100">
            <tr>
                <td>Id</td>
                <td>Nom</td>
                <td>Contrôle</td>
                <td>Projet</td>
                <td>Examen</td>
                <td>Moyenne</td>
            </tr>
            <?php
                if (empty($students)): echo "<tr><td colspan=\"6\" align=\"center\">Table vide</td></tr>";
                else: 
                    foreach ($students as $st): 
            ?>
                <tr>
                    <td><?php echo $st['id']; ?></td>
                    <td><a href="mailto:<?php echo $st['email']; ?>"><?php echo $st['nom']; ?></a></td>
                    <td><?php echo $st['controle']; ?></td>
                    <td><?php echo $st['projet']; ?></td>
                    <td><?php echo $st['examen']; ?></td>
                    <td><?php echo $st['moyenne']; ?></td>
                </tr>
            <?php 
                    endforeach;
                endif;
            ?>
        </table>
    </div>
</body>
</html>