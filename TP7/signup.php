<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="style/style1.css">
</head>
<body>
    <section class="container">
        <form action="signup_trait.php" method="post">
            <h2 align="center">S'inscrire</h2>
            <?php if (isset($_SESSION['error'])): ?>   
                <div class="error">
                    <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif ?>
            <table align="center">
                <tr>
                    <td><label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" id="nom"></td>
                </tr>
                <tr><td class="msg" id="nom_msg" colspan="2"></td></tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <tr><td class="msg" id="email_msg" colspan="2"></td></tr>
                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="text" name="login" id="login"></td>
                </tr>
                <tr><td class="msg" id="controle_msg" colspan="2"></td></tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr><td class="msg" id="password_msg" colspan="2"></td></tr>
                <tr>
                    <th colspan="2"><input type="submit" name="submit" value="SignUp"></th>
                </tr>
            </table>
            <a href="login.php" style="float: right;">Se connecter</a>
        </form>
    </section>
</body>
</html>