<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="title">Authentification</h2>
        <form action="auth.php" method="post">
            <?php
                session_start();
                if (isset($_SESSION['error'])):
            ?>
            <div class="error">
                <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']);
                ?>
            </div>
            <?php endif; ?>
            <table class="table" cellspacing="20">
                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="text" name="login" id="login" placeholder="Your login" required></td>
                </tr>
                <tr>
                    <td><label for="pass">Password</label></td>
                    <td><input type="password" name="password" id="pass" placeholder="Password" required></td>
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