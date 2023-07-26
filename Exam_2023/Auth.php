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
        <form action="auth_trait.php" method="post" class="auth">
            <table border="1">
                <?php
                    session_start();
                    if (isset($_SESSION['error'])):
                ?>
                    <tr>
                    <td class="error" colspan="3">
                        <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="3">
                        <img src="logo.png" alt="logo" width="80px" height="60px">
                        Votes en ligne
                    </td>
                </tr>
                <tr>
                    <td><label for="login">login</label></td>
                    <td><input type="text" name="login" id="login" required></td>
                    <td><input type="submit" value="OK" name="submit"></td>
                </tr>
                <tr>
                    <td><label for="password">password</label></td>
                    <td><input type="password" name="password" id="password"></td>
                    <td><input type="reset" value="annuler"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>