<?php
// Fichier de connexion à la base de données
include('components/connexion.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username_email = $_POST['username_email'];
    $motDePasse = $_POST['mot_de_passe'];

    // Vérifier si l'utilisateur existe dans la base de données
    $requete = "SELECT * FROM utilisateurs WHERE email = :email";
    $statement = $connexion->prepare($requete);
    $statement->bindValue(':email', $username_email);
    $statement->execute();

    $utilisateur = $statement->fetch();

    // Vérifier le mot de passe
    if ($utilisateur && password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
        // Authentification réussie
        session_start();
        $_SESSION['utilisateur_id'] = $utilisateur['id'];
        $_SESSION['utilisateur_email'] = $utilisateur['email'];

        // Rediriger vers la page de profil par exemple
        header('Location: profil.php');
        exit;
    } else {
        // Authentification échouée, afficher un message d'erreur
        $erreur = 'Identifiants invalides';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje - Connexion</title>
    <link rel="stylesheet" href="signin.css">
</head>

<body>
    <a href="index.php">Retour à la page d'accueil</a>
    <h1>Connexion</h1>
    <?php if (isset($erreur)) : ?>
        <p><?php echo $erreur; ?></p>
    <?php endif; ?>
    <form action="signin.php" method="POST">
        <label for="username_email">Nom d'utilisateur/Adresse e-mail :</label>
        <input type="text" name="username_email" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br>

        <input type="submit" value="Se connecter">
    </form>

    <a href="https://www.facebook.com/login">Se connecter avec Facebook</a>
    <a href="https://twitter.com/login">Se connecter avec Twitter</a>
</body>

</html>
