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

        position: relative;
        z-index: 2;
    }

    .navbar a {
        color: white;
        font-size: 18px;
        margin-right: 50px;
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

    /* body {
        background-color: #F0EAD6;
        margin: 0;
    } */

    /* Ajuster la valeur pour decaler le texte a droite ou gauche */
    /* section {
        padding-left: 15%;
        padding-right: 15%;
    } */

</style>

<a href="index.php"><img id="Blazon" class="logo" src="./images/icons_site_main.png" alt="L'image principale du site" ></a>

<nav class="navbar">
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
        <input type="text" placeholder="Rechercher...">
        <button type="submit">Rechercher</button>
    </div>
</nav>
