<?php
    session_start();
    // var_dump($_SESSION);

    require_once("./components/commons.php");
    require_once("./components/connexion.php");
    $NewConnection = new MaConnexion("viaje", "root", "", "localhost");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje</title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
</head>

<style>
/*style du texte de presentation de la catégorie*/
    .titre {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 34px;
        margin-bottom: 1.5%;
    }

    .entete{
        padding: 0 3.5%;
    }

    .presentation{
        margin-bottom: 1.6%;
    }
    /*style de la section contenant les cartes*/
    .searched {
        color:#D66D40;
        font-size: 28px;
        margin-bottom: 1.5%;
        margin-left: 3.5%;
    }

    .affichageArticles{
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        padding: 1% 0 ;
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

        .presentation, .resume{
            font-size: 13px;
            margin-bottom: 10%;
        }

        .searched{
            font-size: 24px;
        }

        .affichageArticles{
            display: grid;
            justify-items: center;
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

            <!-- <h2>il faudra un get des recherches pour afficher le mot recherché</h2> -->
        </section>

        <!-- // affichage des articles il faudra un select pour récupérer les infos de l'article  -->
        <section class="affichageArticles">
            <?php
            // Vérifier si le formulaire a été soumis
            if ($_GET) {
                // Récupérer la valeur de la requête de recherche
                $searchQuery = $_GET["search_query"];
                // Vérifier si la requête de recherche n'est pas vide
                if (!empty($searchQuery)) {
                    // Effectuer votre traitement de recherche ici (par exemple, interroger une base de données)

                    // Afficher les résultats (exemple : afficher simplement la requête de recherche pour le test)
                    echo "<div><h2 class='searched'>Vous avez recherché : " . htmlspecialchars($searchQuery) . "</h2></div>";
                } else {
                    echo "Veuillez entrer un terme de recherche.";
                }
                $trouver = $NewConnection->select("article", "*", "titre LIKE '%$searchQuery%' OR resume LIKE '%$searchQuery%'");
                foreach ($trouver as $display) {
                    echo
                    '<div class="card">
                        <div>
                            <img src="' . $display['photo_principale'] . '" class="card-image" alt="">
                        </div>
                        <div class= "card-text">
                            <a href="categorie.php?id_categorie=' . $display['categorie'] . '" class="card-title"><h3>' . $display['titre'] . '</h3></a>
                            <p class="date">' . $display['date'] . '</p>
                            <p class="resume">' . $display['resume'] . '</p>
                        </div>
                    </div>';
                }
            }
            ?>
        </section>
    </main>
</body>

</html>