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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje - Inscription</title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" >
</head>

<body>

<section class="login-box">
        <a href="index.php"><img id="Blazon" class="logo" src="./images/icons_site_main.png" alt="L'image principale du site" ></a>
        <h1>Inscription</h1>
        <?php
            if (isset($_SESSION['HasFailedSignedUp']) && $_SESSION['HasFailedSignedUp'])
            {
                echo '<h4 class="animate__animated animate__shakeX" >Impossible de vous inscrire.</h4>';
                
                unset($_SESSION['HasFailedSignedUp']);
            }
        ?>

        <form action="controller.php" method="POST">
            <div class="input-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" required>
            </div>

            <div class="input-group">
                <label for="email">Adresse e-mail :</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" required>
            </div>

            <div class="input-group">
                <input name="Intention" value="Signup" type="submit" >
            </div>
        </form>

        <h5>Do you mean to <a href="./login.php">log in</a> ?</h5>

        <!-- Ici, les liens sociaux -->
        <div class="social-login">
            <a href="https://www.facebook.com/login">Se connecter avec Facebook</a>
            <a href="https://twitter.com/login">Se connecter avec Twitter</a>
        </div>
    </section>
</body>

</html>
