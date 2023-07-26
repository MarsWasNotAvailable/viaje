<?php
    session_start();
    // var_dump($_SESSION);

    require_once("./components/commons.php");
    require_once("./components/connexion.php");
    $NewConnection = new MaConnexion("viaje", "root", "", "localhost");

    // Vérifie si des mot-clés de recherches ont été soumis
    $HaveKeywords = $_GET && isset($_GET["search_query"]);
    $MotsRecherche = $HaveKeywords ? $_GET["search_query"] : '';

    $HaveKeywords = $MotsRecherche != '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje: Recherche</title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include_once './components/navbar.php' ?>
    </header>

    <main>
        <!-- entête de la page avec l'introduction de la section -->
        <section class="entete">
            <h1 class="titre">Résultats de la recherche</h1>
            <h2 class='searched'>
                <?php echo ($HaveKeywords) ? 'Vous avez recherché : ' . htmlspecialchars($MotsRecherche) : 'Veuillez entrer un terme de recherche.' ?>
            </h2>
        </section>

        <!-- Cette section contient les articles qui correspondent aux mots de la recherche -->
        <section class="display-result">
            <?php
                // On créer des cartes seulement pour chacun des articles correspondants au mots clé fourni.
                if ($HaveKeywords)
                {
                    if (!empty($MotsRecherche))
                    {
                        $ArticlesCorrespondants = $NewConnection->select("article", "*", "titre LIKE '%$MotsRecherche%' OR resume LIKE '%$MotsRecherche%'");
                        foreach ($ArticlesCorrespondants as $Each)
                        {
                            echo
                            '<div class="card">
                                <div>
                                    <img src="' . GetImagePath( $Each['photo_principale'], $Each['sous_categorie'] ) . '" class="card-image" alt="">
                                </div>
                                <div class= "card-text">
                                    <a href="categorie.php?id_categorie=' . $Each['categorie'] . '" class="card-title"><h3>' . $Each['titre'] . '</h3></a>
                                    <p class="date">' . $Each['date'] . '</p>
                                    <p class="resume">' . $Each['resume'] . '</p>
                                </div>
                            </div>';
                        }
                    }
                }
            ?>
        </section>
    </main>
</body>

</html>