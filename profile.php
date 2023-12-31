<?php
    session_start();
    // var_dump($_SESSION);

    if (!isset($_SESSION['crsf_token']) || !isset($_SESSION['CurrentUser']))
    {
        header("Location: " . 'login.php');
        die();
    }

    require_once("./components/commons.php");
    require_once("./components/connexion.php");

    $IsUserLoggedIn = isset($_SESSION['CurrentUser']);

    $DatabaseName = "viaje";
    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje - Profile</title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>

<body class="chunks">
    <section class="entete profile" >
        <h1 class="titre" >Profile</h1>
        <a class="control back-button green-button" href="./index.php">Retour</a>
        <div id="Control">
            <div>
                
            </div>
            <form method="POST" action="controller.php">
                <input type="submit" name="Intention" value="Logout" class="control ConnexionButtons red-button" >
            </form>
        </div>
    </section>

    <section class="login-box">
        <?php if ($IsUserLoggedIn): $UserIcon = './images/icons_user_role_' . $_SESSION['UserRole'] . '.png';
            ?>
            <form class="profile-box" action="controller.php" method="POST">
                <img src=<?php echo '"' . $UserIcon . '"'; ?> alt="User Role Image" style="width: 256px; height: 256px;">

                <input type="hidden" name="id_utilisateur" value=<?php echo '"' . $_SESSION['UserID'] . '"'; ?> required >

                <div class="input-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" value=<?php echo '"' . $_SESSION['CurrentUserName'] . '"'; ?> required >
                </div>

                <!-- <div class="input-group">
                    <label for="email">Adresse e-mail :</label>
                    <input type="text" name="email" value=<?php echo '"' . $_SESSION['CurrentUser'] . '"'; ?> required >
                </div> -->

                <!-- <div class="input-group">
                    <label for="mot_de_passe">Mot de passe :</label>
                    <input type="password" name="mot_de_passe" required>
                </div> -->

                <div class="input-group">
                    <!-- <input name="Intention" value="UpdateProfile" type="submit"> -->
                    <button name="Intention" value="UpdateProfile" type="submit">Mettre à jour</button>
                </div>
            </form>

        <?php else: ?>
            <button class="ConnexionButtons" onclick="window.location='./login.php'">Login</button>
        <?php endif ?>
    </section>
</body>
</html>
