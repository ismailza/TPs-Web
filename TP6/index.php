<?php
    include('../connect.php');
    if (isset($_POST['submit']))
    {
        $nom = $_POST['nom'];
        $email = $_POST['email'];

        $stm = $pdo->prepare("INSERT INTO etudiant (nom, email) VALUES (:n,:e)");
        $stm->bindValue("n", $nom, PDO::PARAM_STR);
        $stm->bindValue("e", $email, PDO::PARAM_STR);
        $stm->execute();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="container">
        <h3>Ajouter un étudiant</h3>
        <form action="" method="post" onsubmit="return Verify_input();">
            <table align="center">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" id="nom"></td>
                </tr>
                <tr><td id="nom_msg" colspan="2"></td></tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <tr><td id="email_msg" colspan="2"></td></tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Ajouter"></td>
                </tr>
            </table>
        </form>
    </section>
    <hr>
    <section class="etudiants_view">
        <h1 align="center">Tables des étudiants</h1>
        <table border="1" align="center" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>Email</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            
            <?php
            $stm = $pdo->prepare("SELECT * FROM etudiant");
            $stm->execute();
            
            if (!$stm->rowCount()) echo"<tr><td colspan='5' align='center'>Table vide</td></tr>";
            else
            {
                $etudiants = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($etudiants as $et) { ?>
                    <tr>
                        <td><?php echo $et['id']; ?></td>
                        <td><?php echo $et['nom']; ?></td>
                        <td><?php echo $et['email']; ?></td>
                        <td><a href="delete.php?id=<?php echo $et['id']; ?>">Delete</a></td>
                        <td><a href="update.php?id=<?php echo $et['id']; ?>">Update</a></td>
                    </tr>
                <?php }   
            } ?>
        </table>
    </section>

    <script>
        in_name = document.querySelector('#nom');
        in_email = document.querySelector('#email');
        msg1 = document.querySelector('#nom_msg');
        msg2 = document.querySelector('#email_msg');
        function Verify_input()
        {
            let t = 1;    
            if (in_name.value == "") 
            {
                msg1.innerHTML = "Champ obligatoire";
                msg1.style.color = "red";
                t = 0;
            }
            else msg1.innerHTML = "";
            if (in_email.value == "") 
            {
                msg2.innerHTML = "Champ Obligatoire";
                msg2.style.color = "red";
                t = 0;
            }
            else msg2.innerHTML = "";
            if (!t) return false;
            return true;
        }
    </script>
</body>
</html>