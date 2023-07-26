<?php
    session_start();
    if (isset($_SESSION['auth'])) header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link rel="stylesheet" href="style/style1.css">
</head>
<body>
    <div class="container">
        <form action="login_trait.php" method="post">
            <h2 align="center">Se connecter</h2>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="error">
                    <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="success">
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <table align="center">
                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="text" name="login" id="login" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" name="submit" value="Connecter"></th>
                </tr>
            </table>
            <a href="signup.php" style="float: right;">S'inscrire</a>
        </form>
    </div>
</body>
</html>