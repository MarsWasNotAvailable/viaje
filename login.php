<?php
    session_start();
    // var_dump($_SESSION);

    require_once("./components/commons.php");
    require_once("./components/connexion.php");

    $DatabaseName = "viaje";
    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje - Connexion</title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="login-box">
        <a href="index.php"><img id="Blazon" class="logo" src="./images/icons_site_main.png" alt="L'image principale du site" ></a>
        <h1>Connection</h1>

        <form action="controller.php" method="POST">
            <div class="input-group">
                <label for="email">Adresse e-mail :</label>
                <input type="text" name="email" required>
            </div>

            <div class="input-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" required>
            </div>

            <div class="input-group">
                <input name="Intention" value="Login" type="submit">
            </div>
        </form>

        <h5>New here ? Do you want to <a href="./signin.php">signup</a> ?</h5>

        <!-- Ici, le lien Facebook -->
        <div class="social-login">
            <a href="https://www.facebook.com/login">Se connecter avec Facebook</a>
            <a href="https://twitter.com/login">Se connecter avec Twitter</a>
        </div>
    </section>
</body>
</html>
