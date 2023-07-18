<?php
    session_start();
    
    require_once("./components/connexion.php");

    // var_dump($_SESSION);

    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    $Result = $NewConnection->select("article", "*", "id_article = 1");
    // var_dump($Result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje</title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img id="Blazon" src="./images/icons_site_main.png" alt="L'image principale du site" >
        <?php include("./components/navbar.php"); ?>
    </header>

    <article>
        <section id="Tete" class="container">
            <?php
                foreach ($Result as $Key => $Value)
                {
                    echo '<h2>' . $Value['titre'] . '</h2>';
                    echo '<h6>' . $Value['date'] . '</h6>';
                    echo '<img src="' . $Value['photo_principale'] . '" alt="Image 1">';
                    echo '<p>' . $Value['resume'] . '</p>';
                    echo '<div >';
                    echo '<fieldset class="Sommaire">';
                    echo '  <legend >Sommaire:</legend>';
                    echo '    <ul>';
                    echo '        <li><a href="#Section1">' . $Value['sous_titre_1'] . '</a></li>';
                    echo '        <li><a href="#Section2">' . $Value['sous_titre_2'] . '</a></li>';
                    echo '        <li><a href="#Section3">' . $Value['sous_titre_3'] . '</a></li>';
                    echo '    </ul>';
                    echo '</fieldset>';
                }
            ?>
        </section>

        <section id="Section1" class="container">
            <?php
                foreach ($Result as $Key => $Value)
                {
                    echo '<h4>' . $Value['sous_titre_1'] . '</h4>';
                    echo '<p>' . $Value['contenu_1'] . '</p>';
                    echo '<img src="' . $Value['photo_1'] . '" alt="Fancy contextual image for this section" >';
                }
            ?>
        </section>

        <section id="Section2" class="container">
            <?php
                foreach ($Result as $Key => $Value)
                {
                    echo '<h4>' . $Value['sous_titre_2'] . '</h4>';
                    echo '<p>' . $Value['contenu_2'] . '</p>';
                    echo '<img src="' . $Value['photo_2'] . '" alt="Fancy contextual image for this section" >';
                }
            ?>
        </section>

        <section id="Section3" class="container">
            <?php
                foreach ($Result as $Key => $Value)
                {
                    echo '<h4>' . $Value['sous_titre_3'] . '</h4>';
                    echo '<p>' . $Value['contenu_3'] . '</p>';
                    echo '<img src="' . $Value['photo_3'] . '" alt="Fancy contextual image for this section" >';
                }
            ?>
        </section>

    </article>

    <section id="Commentaires" class="container">
        <?php
            $AllComments = $NewConnection->select_join("article", "*", );

            foreach ($AllComments as $Key => $Value)
            {
                echo '<fieldset class="comments">';
                echo '<legend>' . $Value['nom'] .'</legend>';
                echo '<h6>' . $Value['date'] . '</h6>';
                echo '<p>' . $Value['contenu_3'] . '</p>';
                echo '</fieldset>';
            }
        ?>

        <form action="controller.php" method="POST">
            <h3>Laisser un commentaires</h3>
            <input type="text" name="nom" placeholder="Insérer votre nom ici">
            <input type="email" name="email" placeholder="Insérer votre email ici">
            <textarea type="text" name="contenu" placeholder="Insérer votre commentaire ici"></textarea>
        </form>
    </section>

</body>
</html>
