<?php
    include ("inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="voter.php" method="post">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
            <table border="1" class="table">
                <tr>
                    <td colspan="2">
                        <img src="logo.png" alt="logo" width="80px" height="60px">
                        Bonjour <?php echo $_SESSION['auth'] ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td>
                        <select name="candidat" id="nom">
                        <?php
                            require_once ("connect.php");
                            $stm = $pdo->prepare("SELECT * FROM candidats");
                            $stm->execute();
                            $candidats = $stm->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($candidats as $c):
                        ?>
                            <option value="<?php echo $c['ID']; ?>"><?php echo $c['Nom']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Appréciation</label></td>
                    <td>
                        <input type="radio" name="appr" id="Nul" value="0" required><label for="Nul">Nul</label><br>
                        <input type="radio" name="appr" id="Moyen" value="2"><label for="Moyen">Moyen</label><br>
                        <input type="radio" name="appr" id="Excellent" value="4"><label for="Excellent">Excellent</label>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="OK" name="submit"></td>
                    <td><input type="reset" value="Annuler"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>