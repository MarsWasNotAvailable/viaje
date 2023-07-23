<?php
    require_once("./components/commons.php");
    require_once("./components/connexion.php");
    $NewConnection = new MaConnexion("viaje", "root", "", "localhost");

    if (session_id() == "")
    {
        session_start();
    }

    $IsUserLoggedIn = isset($_SESSION['CurrentUser']);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    .navbar {
        background-color: #333;
        /* margin-top: 20px; */

        padding-top: 1em;
        padding-right: 3em;
        padding-bottom: 1em;
        padding-left: 3em;
        display: flex;
        position: relative;
        z-index: 2;
    }

    /* .topnav > * {
        margin-right: 2em;
    } */

    .navbar a {
        color: white;
        font-size: 1em;
        margin-right: 2em;
        /* Ajuste l'espace entre les onglets */
        text-decoration: none;
    }

    .navbar a:hover {
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

    #search {
        display: inline-block;
    }

    #search input[type="text"] {
        padding: 5px;
        border-radius: 3px;
        border: none;
    }

    #search button {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    .icon {
        display: none;
    }

    /* body {
        background-color: #F0EAD6;
        margin: 0;
    } */

    /* Ajuster la valeur pour decaler le texte a droite ou gauche */
    /* section {
        padding-left: 15%;
        padding-right: 15%;
    } */
    @media (max-width:1023px) {

        .navbar {
            padding: 3% 0;
            display: flex;
            justify-content: space-between;
        }

        .topnav a,
        .topnav input,
        .topnav button {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
            margin-right: 0%;
            color: #000000;
        }

        .topnav.responsive {
            position: relative;
            display: grid;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a,
        .topnav.responsive input {
            float: none;
            display: block;
            text-align: left;
        }

        #search{
            width: 30%;
        }
        .topnav.responsive input{
            width: 3em;
        }
    }

    .float-login {
        float: right;
    }
</style>

<div id="SiteHead">
    <a z-index="1" href="index.php"><img id="Blazon" class="logo" src="./images/icons_site_main.png" alt="L'image principale du site">
    </a>
    <div z-index="2" class="float-login">
        <?php if ($IsUserLoggedIn): $UserIcon = './images/icons_user_role_' . $_SESSION['UserRole'] . '.png';
            ?>
            <form method="POST" action="controller.php"><input type="submit" name="Intention" value="Logout" class="ConnexionButtons" ></form>
            <img src=<?php echo '"' . $UserIcon . '"'; ?> alt="User Role Image" style="width: 32px; height: 32px;">
        <?php else: ?>
            <button class="ConnexionButtons" onclick="window.location='./login.php'">Login</button>
        <?php endif ?>
    </div>
</div>



<nav class="navbar">
    <div class="topnav" id="myTopnav">
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
                <a href="categorie.php?id_categorie=1">Canada</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">ASIE</a>
            <div class="dropdown-content">
                <a href="categorie.php?id_categorie=2">Chine</a>
                <a href="categorie.php?id_categorie=8">Japon</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">EUROPE</a>
            <div class="dropdown-content">
                <a href="categorie.php?id_categorie=3">Allemagne</a>
                <a href="categorie.php?id_categorie=7">Islande</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">AFRIQUE &amp; MOYEN-ORIENT</a>
            <div class="dropdown-content">
                <a href="categorie.php?id_categorie=10">Afrique du Sud</a>
                <a href="categorie.php?id_categorie=4">Bahrein</a>
                <a href="categorie.php?id_categorie=5">Egypte</a>
                <a href="categorie.php?id_categorie=9">Emirats Arabes Unies</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">OCÉANIE</a>
            <div class="dropdown-content">
                <a href="categorie.php?id_categorie=6">Australie</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="./contact.php">CONTACT</a>
            <div class="dropdown-content">
                <a href="contact.php">Contact</a>
            </div>
        </div>

        <?php if($IsUserLoggedIn): ?>
            <div class="dropdown">
                <a href="./gestion.php">GESTION</a>
            </div>
        <?php endif; ?>

        <!--  je ne pense pas qu'on ai besoin de deux barre de recherche -->
        <!-- <div class="search-container">
            <form method="GET" action="recherche.php">
                <label for="search_query"></label>
                <input type="text" name="search_query" id="search_query" placeholder="Entrez votre recherche ici">
                <button type="submit">Rechercher</button>
            </form>
        </div>-->
        <a href="javascript:void(0);" class="icon" onclick="burgerMenu()">
            <i class="fa fa-bars"></i>
        </a> 
    </div>
    <div class="topnav" id="search">
        <form method="GET" action="recherche.php">
            <input type="text" name="search_query" id="search_query" placeholder="Entrez votre recherche ici">
            <button type="submit">Rechercher</button>
            <a href="javascript:void(0);" class="icon" onclick="searchLogo()">
                <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
            </a>
        </form>
    </div>
</nav>

<script>
    function burgerMenu() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function searchLogo() {
        var x = document.getElementById("search");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script> 

<!-- il n'y a pas besoin de ça, action du form envoie vers la page d'affichage des recherches (recherche.php)!!!!!!!!!!!! -->
<!-- <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["search_query"])) {
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
?> -->
