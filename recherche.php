<?php
    // session_start();
    
    require_once("components/connexion.php");

    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    // $Result = $NewConnection->select("article", "*");

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
        margin-bottom: 3%;
    }

    .cardImage{
        width: 100%;
    }

    .cardText{
        padding: 4%;
        height: 15em;
        overflow: hidden;
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

        .affichageArticles{
            display: grid;
            justify-items: center;
        }

        .card{
            width: 97%;
            margin: 3% 0;
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
            <h1 class="titre">Résultats de la recherche</h1>

            <h2>il faudra un get des recherches pour afficher le mot recherché</h2>
        </section>

 <!--               // affichage des articles il faudra un select pour récupérer les infos de l'article
        <section class="affichageArticles">
            <?php
            foreach($Result as $display){
                
                echo 
                '<div class="card">
                    <div>
                        <img src="' .$display['photo_principale']. '" class="cardImage" alt="">
                    </div>
                    <div class= "cardText">
                        <a href="article.php?id_article=' . $display['id_article'] . '" class="cardTitle"><h3>' . $display['titre'] . '</h3></a>
                        <p class="date">' . $display['date'] . '</p>
                        <p class="resume">' . $display['resume'] . '</p>
                    </div>
                </div>';
            }
            ?>
            -->
        </section>    
    </main>
</body>
</html>
        