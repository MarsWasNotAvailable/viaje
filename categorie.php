<?php
    // session_start();
    
    require_once("components/connexion.php");

    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    $CurrentCategorieID = isset($_GET['id_categorie']) ? $_GET['id_categorie'] : 1;

    $SelectedCategorie = $NewConnection->select("categorie", "*", "id_categorie = $CurrentCategorieID");

    $Result = $NewConnection->select_article($CurrentCategorieID);

    // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje:
        <?php
            $categorie = "Categorie";
            foreach ($SelectedCategorie as $Key => $Value) {
                $categorie .= (' - ' . $Value['nom']);
            }
            echo $categorie;
        ?>
    </title>
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

    .presentation{
        margin-bottom: 1.6%;
    }
    /*style de la section contenant les categories*/
    .affichagecategories{
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

        .presentation, .resume{
            font-size: 13px;
            margin-bottom: 10%;
        }

        .affichagecategories{
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
        <?php
            foreach($SelectedCategorie as $value){
                
                echo 
                '<h1 class="titre">' .$value['titre'] . '</h1>
            <p class="presentation">
                Bienvenue sur le blog ! Sur Voyage Way, je partage plus d’une décennie de voyage. Des conseils, récits ou retours d’expérience sur des destinations multiples et variées. Du city trip dans une ville française à un road trip à l’autre bout du monde. Ce blog voyage devrait vous aider à préparer vos prochains séjours en France ou l’étranger !
            </p>';

            }
            ?>
        </section>
        
        <!-- affichage des categories -->
        <section class="affichagecategories">
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
        </section>        
    </main>
 
<footer>
    <?php include_once './components/footer.php' ?>
</footer>

</body>
</html>
