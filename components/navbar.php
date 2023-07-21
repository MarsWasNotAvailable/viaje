<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    .navbar{
        padding: 3% 0;
        display: flex;
        justify-content: space-between;
    }
    .topnav a, input, button{
        display: none;
    }

    .topnav a.icon, .search-container a.icon{
        float: right;
        display: block;
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

    .topnav.responsive a, .topnav.responsive input, .topnav.responsive button {
        float: none;
        display: block;
        text-align: left;
    }
    }
</style>

<a href="index.php"><img id="Blazon" class="logo" src="./images/icons_site_main.png" alt="L'image principale du site" ></a>

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
        <div class="dropdown">
            <a href="./gestion.php">GESTION</a>
        </div>
        <a  href="javascript:void(0);" class="icon" onclick="burgerMenu()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="topnav" id="search">
        <input type="text" placeholder="Rechercher...">
        <button type="submit">Rechercher</button>
        <a  href="javascript:void(0);" class="icon" onclick="searchLogo()">
            <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
        </a>
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