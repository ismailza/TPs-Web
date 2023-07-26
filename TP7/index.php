<?php
    session_start();
    if (!$_SESSION['auth']) header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title> 
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <img src="logo_fstm.png" alt="logo" srcset="">
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="recherche.php">Recherche</a></li>
            <li><a href="logout.php">LogOut</span></a></li>
            <span class="mdi mdi-account-circle-outline"></span><?php echo $_SESSION['auth']; ?>
        </ul>
    </header>
    <section class="container">
        <h1>Ajouter un étudiant</h1>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success">
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </div>
        <?php elseif (isset($_SESSION['error'])): ?>
            <div class="error">
                <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);    
                ?>
            </div>
        <?php endif ?>
        <form action="add.php" method="post" onsubmit="return Verify_input();">
            <table align="center">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" id="nom"></td>
                </tr>
                <tr><td class="msg" id="nom_msg" colspan="2"></td></tr>
                <tr>
                    <td><label for="filiere">Filière</label></td>
                    <td><input type="text" name="filiere" id="filiere"></td>
                </tr>
                <tr><td class="msg" id="filiere_msg" colspan="2"></td></tr>
                <tr>
                    <td><label for="controle">Note controle</label></td>
                    <td><input type="number" name="controle" id="controle"></td>
                </tr>
                <tr><td class="msg" id="controle_msg" colspan="2"></td></tr>
                <tr>
                    <td><label for="exam">Note exam</label></td>
                    <td><input type="number" name="exam" id="exam"></td>
                </tr>
                <tr><td class="msg" id="exam_msg" colspan="2"></td></tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Ajouter"></td>
                </tr>
            </table>
        </form>
    </section>
    <hr>
    <section class="etudiants_view">
        <h1 align="center">Tables des étudiants</h1>
        <?php if (isset($_SESSION['t_success'])): ?>
            <div class="success">
                <?php 
                    echo $_SESSION['t_success']; 
                    unset($_SESSION['t_success']);    
                ?>
            </div>
        <?php elseif (isset($_SESSION['t_error'])): ?>
            <div class="error">
                <?php 
                    echo $_SESSION['t_error']; 
                    unset($_SESSION['t_error']);
                ?>
            </div>
        <?php endif ?>
        <table cellspacing="0">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Filière</th>
                <th>Contrôle</th>
                <th>Examen</th>
                <th>Moyenne</th>
                <th>Action</th>
            </tr>
            <?php
            include('connect.php');
            $stm = $pdo->prepare("SELECT id, nom, filiere, controle, exam, (2*exam + controle)/3 moyenne 
                                  FROM etudiant");
            $stm->execute();
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
                        <th>
                            <a href="update.php?id=<?php echo $et['id']; ?>"><button class="update">Modifier</button></a>
                            <a href="delete.php?id=<?php echo $et['id']; ?>" onclick="return confirm('Vous-voulez vraiment supprimer?');"><button class="delete">Supprimer</button></a>
                        </th>
                    </tr>
                <?php endforeach;
            endif ?>
        </table>
    </section>
    <script src="js.js"></script>
</body>
</html>