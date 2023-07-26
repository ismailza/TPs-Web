<?php 
    require_once ("inc.php");
    require_once("connect.php");
    $stm = $pdo->prepare("SELECT * FROM compte");
    $stm->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation des comptes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 85%;
        }
    </style>
</head>
<body>
    <img src="logo.png" alt="logo">
    <div class="container">
        <h1 align="center">Liste des comptes bancaire</h1>
        <table>
            <tr>
                <td>NCompte</td>
                <td>Solde</td>
                <td>Client</td>
            </tr>
            <?php if (!$stm->rowCount()): ?>
            <tr>
                <td colspan="3" align="center">Aucun compte</td>
            </tr>
            <?php else: 
                $comptes = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach($comptes as $c): 
            ?>
            <tr>
                <td><?php echo $c['NCompte']; ?></td>
                <td><?php echo $c['Solde']; ?></td>
                <td><?php echo $c['Client']; ?></td>
            </tr>
                <?php endforeach; ?>

            <?php endif; ?>
        </table>
    </div>

    <div class="menu">
        <ul>
            <a href="Depot.php"><li>Dépot</li></a>
            <a href="Retrait.php"><li>Retrait</li></a>
            <a href="logout.php"><li>Déconnexion</li></a>
        </ul>
    </div>
</body>
</html>