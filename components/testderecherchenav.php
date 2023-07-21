<?php
session_start();
// var_dump($_SESSION);

require_once("./components/commons.php");
require_once("./components/connexion.php");
$NewConnection = new MaConnexion("viaje", "root", "", "localhost");
?>



<style>
    /* Styles spécifiques pour la navbar */

    .logo {
        width: 200px;
        /* Largeur de l'image */
        height: auto;
        /* Hauteur automatique proportionnelle */
        display: block;
        /* Affichage en tant que bloc */
        margin: 10px auto;
        /* Marge : 10px haut et bas, centrage horizontal */
    }

    .navbar-container {
        background-color: #333;
        padding-top: 1em;
        padding-right: 3em;
        padding-bottom: 1em;
        padding-left: 3em;
        position: relative;
        z-index: 2;
    }

    .navbar-container a {
        color: white;
        font-size: 1em;
        margin-right: 2em;
        /* Ajuste l'espace entre les onglets */
        text-decoration: none;
    }

    .navbar-container a:hover {
        color: #4CAF50;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        padding: 8px 0;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: #333;
        text-decoration: none;
        display: block;
        padding: 8px 16px;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .search-container {
        display: inline-block;
    }

    .search-container input[type="text"] {
        padding: 5px;
        border-radius: 3px;
        border: none;
    }

    .search-container button {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>

<a href="index.php"><img id="Blazon" class="logo" src="./images/icons_site_main.png" alt="L'image principale du site"></a>

<nav class="navbar-container">
    <a href="./index.php">BLOG VOYAGE</a>
    <div class="dropdown">
        <a href="#">PRATIQUE</a>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#">AMÉRIQUE</a>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#">ASIE</a>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#">EUROPE</a>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#">AFRIQUE &amp; MOYEN-ORIENT</a>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#">OCÉANIE</a>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="./contact.php">CONTACT</a>
        <div class="dropdown-content">
            <a href="#">Option 1</a>
            <a href="#">Option 2</a>
            <a href="#">Option 3</a>
        </div>
    </div>
    <div class="search-container">
        <form method="GET" action="recherche.php">
            <label for="search_query"></label>
            <input type="text" name="search_query" id="search_query" placeholder="Entrez votre recherche ici">
            <button type="submit">Rechercher</button>
        </form>
    </div>
</nav>

<!-- <section class="affichagecategories"> 
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        // Récupérer la valeur de la requête de recherche
        $searchQuery = $_GET["search_query"];
        $trouver = $NewConnection->select("article", "*", "`resume` LIKE '%$searchQuery%'");
        foreach ($trouver as $display) {
            echo
            '<div class="card">
        <div>
            <img src="' . $display['photo_principale'] . '" class="cardImage" alt="">
        </div>
        <div class= "cardText">
            <a href="categorie.php?id_categorie=' . $display['categorie'] . '" class="cardTitle"><h3>' . $display['titre'] . '</h3></a>
            <p class="date">' . $display['date'] . '</p>
            <p class="resume">' . $display['resume'] . '</p>
        </div>
    </div>';
        }
        // Vérifier si la requête de recherche n'est pas vide
        if (!empty($searchQuery)) {
            // Effectuer votre traitement de recherche ici (par exemple, interroger une base de données)

            // Afficher les résultats (exemple : afficher simplement la requête de recherche pour le test)
            echo "Vous avez recherché : " . htmlspecialchars($searchQuery);
        } else {
            echo "Veuillez entrer un terme de recherche.";
        }
    }
    ?>
</section>-->