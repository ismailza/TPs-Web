<?php include('inc.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
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
    <h2 align="center">Recherche</h2>
    <div class="recherche">
        <span id="msg" style="color: red;"></span>
        <form action="resultatRecherche.php" method="post" onsubmit="return verify_key();">
            <label for="filtre">Filtre </label>
            <select name="filtre" id="filtre">
                <option value="filiere">Filière</option>
                <option value="nom">Nom</option>
            </select>
            <input type="search" name="key" id="key">
            <input type="submit" value="Valider" name="search">
        </form>
    </div>

    <script>
        function verify_key()
        {
            if (document.getElementById("key").value == "")
            {
                document.getElementById("msg").innerHTML = "Champ obligatoire";
                return false;
            }
            return true;
        }
    </script>
</body>
</html>