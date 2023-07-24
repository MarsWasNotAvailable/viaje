<?php
    // session_start();
    
    require_once("components/connexion.php");

    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    $Result = $NewConnection->select("article", "*");

    // var_dump($_SESSION);
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

<style>

/*style du texte de presentation de la catégorie*/
    .titre{
        text-transform: uppercase;
        font-weight: bold;
        font-size: 34px;
        margin-bottom: 1.5%;
    }

    .entete{
        padding: 0 3.5%;
    }

    .entete h2 {
        color:#D66D40;
        font-size: 28px;
        margin-bottom: 1.5%;
    }

    .presentation{
        margin-bottom: 1.6%;
    }

    .date{
        color: #6B6B6B;
        font-size: 13px;
        margin-top: 1%;
    }

    .resume{
        line-height: 1.5;
        font-size: 15px;
        margin-top: 5%;

    }

    /* version mobile */
    @media (max-width: 900px) {

        .titre{
            font-size: 28px;
        }

        .entete h2{
            font-size: 24px;
        }

        .presentation, .resume{
            font-size: 13px;
            margin-bottom: 10%;
        }
    }
</style>
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
        
        <!-- affichage des articles -->
        <section class="card-container">
            <?php
            foreach($Result as $display){
                
                echo 
                '<div class="card">
                    <div>
                        <img src="' .$display['photo_principale']. '" class="card-image" alt="">
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
