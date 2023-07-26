<?php 
    require_once("inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include('menu.php'); ?>
    </header>
    <div class="container">
        <h2 class="title">Saisie des articles</h2>
        <form action="saisie.php" method="post"> 
            <?php if (isset($_SESSION['success'])): ?>
                <div class="success">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
            <table class="table" cellspacing="20">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" id="nom" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td><label for="controle">Contrôle</label></td>
                    <td><input type="number" name="controle" id="controle" min="0" step="any" required></td>
                </tr>
                <tr>
                    <td><label for="projet">Projet</label></td>
                    <td><input type="number" name="projet" id="projet" min="0" step="any" required></td>
                </tr>
                <tr>
                    <td><label for="examen">Examen</label></td>
                    <td><input type="number" name="examen" id="examen" min="0" step="any" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="OK" name="submit"></td>
                    <td><input type="button" value="Annuler" onclick="window.location.href = 'frmConsultation.php'";></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>