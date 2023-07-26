<?php
    include('../connect.php');
    
    if (isset($_POST['update']))
    {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $stm = $pdo->prepare("UPDATE etudiant SET nom=?, email=? WHERE id = ?");
        $stm->execute(array($nom, $email, $_POST['id']));
        header("location:index.php");
    }

    $stm = $pdo->prepare("SELECT * FROM etudiant WHERE id=?");
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $stm->execute(array($_GET['id']));
    $etu = $stm->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="container">
        <form action="" method="post">
            <input type="hidden" value="<?php echo $etu['id']; ?>" name="id">
            <table align="center">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $etu['nom']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email" value="<?php echo $etu['email']; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="update" value="Modifier" width="50%">
                        <input type="button" value="Annuler" onclick="window.location.href='index.php'";>
                    </td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>