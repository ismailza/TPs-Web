<?php 
    require_once ("inc.php");
    require_once("connect.php");
    if (isset($_POST['submit']))
    {
        $s = $_POST['somme'];
        $n = $_POST['n_compte'];
        $stm = $pdo->prepare("UPDATE compte SET solde = solde+$s WHERE NCompte = $n");
        $stm->execute();
        if ($stm) header("location: Menu.html");
        else $error = "Error: something is wrong!";
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depot</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="logo">
        <form action="" method="POST">
            <table>
                <?php if (isset($error)): ?>
                <tr>
                    <td colspan="2"><?php echo $error; ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td><label for="login">N° compte</label></td>
                    <td>
                        <select name="n_compte" id="n_compte" required>
                            <?php 
                                $stm = $pdo->prepare("SELECT NCompte FROM Compte");
                                $stm->execute();
                                $comptes = $stm->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($comptes as $c):
                            ?>
                            <option value="<?php echo $c['NCompte'] ?>"><?php echo $c['NCompte'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="somme">Somme</label></td>
                    <td><input type="number" min="0" step="any" name="somme" id="somme" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="OK" name="submit"></td>
                    <td><a href="Menu.html"><input type="button" value="Annuler"></a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>