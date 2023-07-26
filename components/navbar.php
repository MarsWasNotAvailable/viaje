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

<!-- Because this link element is set as rel stylesheet, it is body-ok
    That means, it does not need to be placed in the head of each documents:
    https://webmasters.stackexchange.com/questions/55130/can-i-use-link-tags-in-the-body-of-an-html-document/137977#137977
    It is clearer to have it there
 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* Styles spécifiques pour la navbar */

    .logo {
        width: 200px;
        height: auto;
        display: block;
        margin: 10px auto;
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

    /* #myTopnav > * {
        margin-right: 7%;
    } */

    .navbar a {
        color: white;
        font-size: 1em;
        margin-right: 2em;
        /* Ajuste l'espace entre les onglets */
        text-decoration: none;
        text-transform: uppercase;
    }

    .navbar a:hover {
        color: #4CAF50;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    @media (max-width:1023px) {
        .topnav.responsive .dropdown {
            margin-left: 7%;
        }
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
            display: inline-grid;
            justify-content: center;
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
        <div class="dropdown">
            <a href="./index.php">BLOG VOYAGE</a>
        </div>

        <div class="dropdown">
            <?php $Nav = $NewConnection->select("categorie", "*", "continent= 'Pratique'");
           foreach ($Nav as $display) {
                echo'<a href="categorie.php?id_categorie='. $display['id_categorie']. '">' .$display['nom'] . '</a>';
                }
            ?>
        </div>
        <div class="dropdown">
            <a href="#">AMÉRIQUE</a>
            <div class="dropdown-content">
                <?php $Nav = $NewConnection->select("categorie", "*", "continent= 'Amérique'");
                foreach ($Nav as $display) {
                        echo'<a href="categorie.php?id_categorie='. $display['id_categorie']. '">' .$display['nom'] . '</a>';
                        }
                    ?>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">ASIE</a>
            <div class="dropdown-content">
                <?php $Nav = $NewConnection->select("categorie", "*", "continent= 'Asie'");
                foreach ($Nav as $display) {
                    echo'<a href="categorie.php?id_categorie='. $display['id_categorie']. '">' .$display['nom'] . '</a>';
                    }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">EUROPE</a>
            <div class="dropdown-content">
                <?php $Nav = $NewConnection->select("categorie", "*", "continent= 'Europe'");
                foreach ($Nav as $display) {
                    echo'<a href="categorie.php?id_categorie='. $display['id_categorie']. '">' .$display['nom'] . '</a>';
                    }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">AFRIQUE &amp; MOYEN-ORIENT</a>
            <div class="dropdown-content">
                <?php $Nav = $NewConnection->select("categorie", "*", "continent= 'Afrique et Moyen-Orient'");
                foreach ($Nav as $display) {
                    echo'<a href="categorie.php?id_categorie='. $display['id_categorie']. '">' .$display['nom'] . '</a>';
                    }
                ?>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">OCÉANIE</a>
            <div class="dropdown-content">
                <?php $Nav = $NewConnection->select("categorie", "*", "continent= 'Océanie'");
                foreach ($Nav as $display) {
                    echo'<a href="categorie.php?id_categorie='. $display['id_categorie']. '">' .$display['nom'] . '</a>';
                    }
                ?>                        
            </div>
        </div>
        <div class="dropdown">
            <a href="./contact.php">CONTACT</a>
            <div class="dropdown-content">
                <a href="contact.php">Contact</a>
            </div>
        </div>

        <?php if($IsUserLoggedIn && (isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == 'admin')): ?>
            <div class="dropdown">
                <a href="./gestion.php">GESTION</a>
            </div>
        <?php endif; ?>

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
