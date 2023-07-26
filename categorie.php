<?php
    // session_start();
    
    require_once("components/connexion.php");

    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    $CurrentCategorieID = isset($_GET['id_categorie']) ? $_GET['id_categorie'] : 1;

    $SelectedCategorie = $NewConnection->select("categorie", "*", "id_categorie = $CurrentCategorieID");

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

<body>
    <header>
        <?php include_once './components/navbar.php' ?>
    </header>

    <main>
        <!-- entête de la page avec l'introduction de la section -->
        <section class="entete">
        <?php
            foreach($SelectedCategorie as $value)
            {    
                echo 
                '<h1 class="titre">' . $value['titre'] . '</h1>
                <p class="presentation">' . $value['description'] . '</p>'
                ;
            }
            ?>
        </section>
        
        <!-- affichage des categories -->
        <section class="display-result">
            <?php
            $Result = $NewConnection->select_article($CurrentCategorieID);
            foreach($Result as $display){
                
                echo 
                '<div class="card">
                    <div>
                        <img src="' . GetImagePath( $display['photo_principale'], $display['sous_categorie'] ) . '" class="card-image" alt="Image principale">
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
