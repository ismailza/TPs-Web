<?php
    include ("inc.php");
    require_once ("connect.php");
    $stm = $pdo->prepare("SELECT * FROM candidats ORDER BY score DESC");
    $stm->execute();
    $candidats = $stm->fetchAll(PDO::FETCH_ASSOC);
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
    <div class="container">
        <table border="1" class="table">
            <thead>
                <tr>
                    <td colspan="3">
                        <img src="logo.png" alt="logo" width="80px" height="60px">
                        Bonjour <?php echo $_SESSION['auth']; ?>
                    </td>
                </tr>
            </thead>
            <tbody class="consult">
                <tr>
                    <td colspan="3" align="center">Liste des Scores</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Score</td>
                </tr>
                <?php if (empty($candidats)): ?>
                <tr><td colspan="3" align="center">Aucun candidats</td></tr>
                <?php else: 
                    foreach ($candidats as $c): ?>
                    <tr>
                        <td><?php echo $c['ID']; ?></td>
                        <td><?php echo $c['Nom']; ?></td>
                        <td><?php echo $c['score']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <hr>
        <a href="logout.php">Déconnecter</a>
    </div>
</body>
</html>