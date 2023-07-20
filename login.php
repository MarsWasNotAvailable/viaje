<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje - Connexion</title>
    <link rel="stylesheet" href="signin.css">
</head>

<body>
    <div class="container">
        <img src="./images/icons_site_main.png" alt="L'image principale du site">
        <h1>Connection</h1>
        <?php if (isset($erreur)) : ?>
            <p class="error"><?php echo $erreur; ?></p>
        <?php endif; ?>
        <form action="signin.php" method="POST">
            <div class="input-group">
                <label for="username_email">Nom d'utilisateur/Adresse e-mail :</label>
                <input type="text" name="username_email" required>
            </div>

            <div class="input-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" required>
            </div>

            <div class="input-group">
                <input type="submit" value="Se connecter">
            </div>
        </form>

        <div class="social-login">
            <a href="https://www.facebook.com/login">
                <!-- Ici, le lien Facebook -->
                Se connecter avec Facebook
            </a>
            <a href="https://twitter.com/login">
                <!-- Ici, le lien Twitter -->
                Se connecter avec Twitter
            </a>
        </div>
    </div>
</body>

</html>