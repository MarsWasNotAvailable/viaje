<?php
    session_start();
    // var_dump($_SESSION);

    require_once("./components/commons.php");
    require_once("./components/connexion.php");

    $DatabaseName = "viaje";
    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $UsersTableName = 'utilisateur';
        $userName = $_POST['username'];
        $email = $_POST['email'];
        $mdp = $_POST['mot_de_passe'];

        $selectUser = $NewConnection->select($UsersTableName, 'email', "email ='$email'");


        if(!empty($selectUser)){

            echo '<a href="login.php">Cette adresse email est déja utilisée, connectez-vous ici ! </a>';

        }else{    
            $Values = array(
                'nom'=>$userName,
                'email'=>$email,
                'mot_de_passe'=>$mdp,
                'role'=>'guest'
            );
            $NewConnection->insert($UsersTableName, $Values);
    }}
?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje - Inscription</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signin.css">
</head>

<body>

<section class="login-box">
        <a href="index.php"><img id="Blazon" class="logo" src="./images/icons_site_main.png" alt="L'image principale du site" ></a>
        <h1>Inscription</h1>

        <form action="signin.php" method="POST">
            <div class="input-group">
                <label for="username">Nom :</label>
                <input type="text" name="username" required>
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
                <input name="Intention" value="Inscrire" type="submit" value="S'inscrire'">
            </div>
        </form>

        <div class="social-login">
            <!-- Ici, le lien Facebook -->
            <a href="https://www.facebook.com/login">Se connecter avec Facebook</a>
            <!-- Ici, le lien Twitter -->
            <a href="https://twitter.com/login">Se connecter avec Twitter</a>
        </div>
    </section>
</body>

</html>
