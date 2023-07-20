<?php
    session_start();
    // var_dump($_SESSION);

    require_once("./components/connexion.php");

    $DatabaseName = "viaje";
    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    $AllArticles = $NewConnection->select("article", "*");
    // var_dump($AllArticles);
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
<body>
    <header>
        <?php include("./components/navbar.php"); ?>
    </header>

    <main class="chunks">
        <h3>Tout les articles</h3>
        <section id="ArticlesViewerBox">
            <form action="controller.php" method="post" class="card-gestion">
                <input type="hidden" name="id_article" value="' . $Value['id_article'] . '">
                <img id="AddNewIcon" src="./images/icons_plus.png" alt="New article picture">
                <h5>Pour créer un nouvel article:</h5>
                <a href="./article.php?edit=true&id_article=0" >Clicker ici</a>
            </form>

            <?php
                foreach ($AllArticles as $Key => $Value)
                {
                    $ArticlePageRedirectionWithParameters = './article.php?edit=true&id_article=' . $Value['id_article'];

                    echo '<form action="controller.php" method="post" class="card-gestion">';
                    echo '<input type="hidden" name="id_article" value="' . $Value['id_article'] . '">';
                    echo '<button name="Intention" value="Delete" type="submit" class="floating"></button>';
                    echo '<img src="' . $Value['photo_principale'] . '" alt="Article picture">';
                    echo '<h5>' . $Value['titre'] . '</h5>';
                    // echo '<button name="Intention" value="UpdateArticle" type="button">Modifier</button>';
                    echo '<a href="' . $ArticlePageRedirectionWithParameters . '" >Modifier</a>';

                    echo '</form>';
                }
            ?>
        </section>
    </main>

    <footer>
        <?php include("./components/footer.php"); ?>
    </footer>
</body>
</html>
