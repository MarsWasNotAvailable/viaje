<?php
    // session_start();
    // var_dump($_SESSION);

    require_once("./components/connexion.php");
    require_once('./components/commons.php');

    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje: Welcome</title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include_once './components/navbar.php' ?>
    </header>

    <main>
        <!-- entête de la page avec l'introduction de la section -->
        <section class="entete">
            <h1 class="titre">Le blog pour mieux voyager !</h1>
            <p class="presentation">
                Bienvenue sur le blog ! Sur Voyage Way, je partage plus d'une décennie de voyage. Des conseils, récits ou retours d'expérience sur des destinations multiples et variées. Du city trip dans une ville française à un road trip à l'autre bout du monde. Ce blog voyage devrait vous aider à préparer vos prochains séjours en France ou l'étranger !
            </p>

            <h2>Les articles du moment sur le blog ...</h2>
            
            <p class="presentation">
                Ci-dessous, vous trouverez les articles populaires en ce moment. Bien évidemment, n'hésitez pas à utiliser le menu du blog pour trouver rapidement les guides pratiques ou récits de voyage portant sur la destination qui vous intéresse.
            </p>
        </section>
        
        <!-- Cette section contient tout les articles -->
        <section class="card-container">
            <?php
                // TODO: currently checking on sous_categorie to hide the drafts, but we should use categorie (makes more sense)
                // will require a INNER JOIN here, replacing the select call
                $AllVisibleArticles = $NewConnection->select("article", "*", '`article`.`sous_categorie` <> "brouillon"');
                foreach($AllVisibleArticles as $display)
                {    
                    echo
                    '<div class="card">
                        <div>
                            <img src="' . GetImagePath( $display['photo_principale'], $display['sous_categorie'] ) . '" class="card-image" alt="">
                        </div>
                        <div class= "card-text">
                            <a href="article.php?id_article=' . $display['id_article'] . '" class="card-title"><h3>' . $display['titre'] . '</h3></a>
                            <p class="date">' . $display['date'] . '</p>
                            <p class="resume">' . $display['resume'] . '</p>
                        </div>
                    </div>';
                }
            ?>
        </section> 
    </main>
 
<footer>
    <?php include_once './components/footer.php' ?>
</footer>

</body>
</html>
