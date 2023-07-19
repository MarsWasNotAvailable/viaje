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
    <link rel="icon" href="./cache/favicon.ico" type="image/x-icon" >

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
    /*style de la section contenant les articles*/
    .affichageArticles{
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        padding: 1% 0 ;
    }

    .card {
        display: grid;
        justify-items: center;
        width: 29%;
        background-color: #fff;
        margin-left: 3.5%;
    }

    .cardImage{
        width: 100%;
    }

    .cardText{
        padding:4%;
        height:15em
    }
    .cardTitle{
        color: #000;
        font-size: 20px;
        text-decoration: none;
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
</style>
<body>
    <header>
        <?php include_once './components/navbar.php' ?>
    </header>

    <main>
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
        
        <section class="affichageArticles">
            <?php
            foreach($Result as $display){
                
                echo 
                '<div class="card">
                    <div>
                        <img src="' .$display['photo_principale']. '" class="cardImage" alt="">
                    </div>
                    <div class= "cardText">
                        <a href=""class = "cardTitle"><h3>' . $display['titre']. '</h3></a>
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
