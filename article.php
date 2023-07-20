<?php
    session_start();
    // var_dump($_SESSION);

    require_once("./components/commons.php");
    require_once("./components/connexion.php");

    function GenerateSection($IsEditingArticle, $SelectedArticle, $SectionNumber)
    {
        foreach ($SelectedArticle as $Key => $Value)
        {
            echo '<h4 contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value["sous_titre_$SectionNumber"] . '</h4>';
            echo '<p contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value["contenu_$SectionNumber"] . '</p>';

            if ($IsEditingArticle){
                echo '<label for="photo_' . $SectionNumber . '">Selectionner une image:</label>';
                echo '<input name="photo_' . $SectionNumber . '" class="image-selector" type="file" accept="image/*"> ';

                echo '<img width="256" class="image-preview" src="' . $Value["photo_$SectionNumber"] . '" alt="Image Preview">';
            }
            else {
                echo '<img src="' . $Value["photo_$SectionNumber"] . '" alt="Fancy contextual image for this section" >';
            }
        }
    }

    $_SESSION['UserRole'] = 'admin';


    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    // TODO: change the default 1 at the end
    $CurrentArticleID = isset($_GET['id_article']) ? $_GET['id_article'] : 1;
    
    $IsEditingArticle = isset($_GET['edit']) ? $_GET['edit'] && CanEditArticles($_SESSION['UserRole']) : false;
    // $IsEditingArticle = true;

    $IsEditingComment = isset($_GET['edit']) ? $_GET['edit'] && CanEditComments($_SESSION['UserRole']) : false;
    $IsEditingComment = true;

    $SelectedArticle = $NewConnection->select("article", "*", "id_article = $CurrentArticleID");

    if ($IsEditingArticle && !$SelectedArticle)
    {
        // var_dump($SelectedArticle);
        array_push($SelectedArticle, array(
            'titre' => 'Sans titre',
            'date' => '2000-01-01',
            'photo_principale' => './images/icons_plus.png',
            'resume' => 'Ajouter un résumé ici.',

            'sous_titre_1' => 'Ajouter un premier sous titre ici',
            'contenu_1' => 'Ajouter un premier paragraphe ici',
            'photo_1' => './images/icons_plus.png',

            'sous_titre_2' => 'Ajouter un deuxieme sous titre ici',
            'contenu_2' => 'Ajouter un deuxieme paragraphe ici',
            'photo_2' => './images/icons_plus.png',

            'sous_titre_3' => 'Ajouter un troisieme sous titre ici',
            'contenu_3' => 'Ajouter un troisieme paragraphe ici',
            'photo_3' => './images/icons_plus.png',
        ));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje:
        <?php
            $ArticlesName = "Article";
            foreach ($SelectedArticle as $Key => $Value) {
                $ArticlesName .= (' - ' . $Value['titre']);
            }
            echo $ArticlesName;
        ?>
    </title>
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include("./components/navbar.php"); ?>
    </header>

    <main>
        <article class="chunks">
            <section id="Tete" class="container">
                <?php
                    foreach ($SelectedArticle as $Key => $Value)
                    {
                        echo '<h2 contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['titre'] . '</h2>';
                        
                        if ($IsEditingArticle){
                            echo '<h6>' . date('Y-d-m') . '</h6>';

                            echo '<label for="photo_principale">Selectionner une image:</label>';
                            echo '<input name="photo_principale" class="image-selector" type="file" accept="image/*"> ';

                            echo '<img width="256" class="image-preview" src="' . $Value['photo_principale'] . '" alt="Image 1">';
                        }
                        else {
                            echo '<h6>' . $Value['date'] . '</h6>';
                            echo '<img src="' . $Value['photo_principale'] . '" alt="Image 1">';
                        }
                        
                        echo '<p contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['resume'] . '</p>';
                        echo '<div >';
                        echo '<fieldset class="Sommaire">';
                        echo '  <legend >Sommaire:</legend>';
                        echo '    <ul>';
                        echo '        <li><a href="#Section1">' . $Value['sous_titre_1'] . '</a></li>';
                        echo '        <li><a href="#Section2">' . $Value['sous_titre_2'] . '</a></li>';
                        echo '        <li><a href="#Section3">' . $Value['sous_titre_3'] . '</a></li>';
                        echo '    </ul>';
                        echo '</fieldset>';
                    }
                ?>
            </section>

            <section id="Section1" class="container">
                <?php
                    GenerateSection($IsEditingArticle, $SelectedArticle, 1);

                    // foreach ($SelectedArticle as $Key => $Value)
                    // {
                    //     echo '<h4 contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['sous_titre_1'] . '</h4>';
                    //     echo '<p contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['contenu_1'] . '</p>';

                    //     if ($IsEditingArticle){
                    //         echo '<label for="photo_1">Selectionner une image:</label>';
                    //         echo '<input name="photo_1" class="image-selector" type="file" accept="image/*"> ';

                    //         echo '<img width="256" class="image-preview" src="" alt="Image Preview">';
                    //     }
                    //     else {
                    //         echo '<img src="' . $Value['photo_1'] . '" alt="Fancy contextual image for this section" >';
                    //     }
                    // }
                ?>
            </section>

            <section id="Section2" class="container">
                <?php
                    GenerateSection($IsEditingArticle, $SelectedArticle, 2);

                    // foreach ($SelectedArticle as $Key => $Value)
                    // {
                    //     echo '<h4 contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['sous_titre_2'] . '</h4>';
                    //     echo '<p contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['contenu_2'] . '</p>';

                    //     if ($IsEditingArticle){
                    //         echo '<label for="photo_2">Selectionner une image:</label>';
                    //         echo '<input name="photo_2" class="image-selector" type="file" accept="image/*"> ';

                    //         echo '<img width="256" class="image-preview" src="" alt="Image Preview">';
                    //     }
                    //     else {
                    //         echo '<img src="' . $Value['photo_2'] . '" alt="Fancy contextual image for this section" >';
                    //     }
                    // }
                ?>
            </section>

            <section id="Section3" class="container">
                <?php
                    GenerateSection($IsEditingArticle, $SelectedArticle, 3);

                    // foreach ($SelectedArticle as $Key => $Value)
                    // {
                        // echo '<h4 contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['sous_titre_3'] . '</h4>';
                        // echo '<p contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value['contenu_3'] . '</p>';

                        // if ($IsEditingArticle){
                        //     echo '<label for="photo_3">Selectionner une image:</label>';
                        //     echo '<input name="photo_3" class="image-selector" type="file" accept="image/*"> ';

                        //     echo '<img width="256" class="image-preview" src="" alt="Image Preview">';
                        // }
                        // else {
                        //     echo '<img src="' . $Value['photo_3'] . '" alt="Fancy contextual image for this section" >';
                        // }
                    // }
                ?>
            </section>

        </article>
    </main>

    <section id="Commentaires" class="container chunks">
        <?php
            $AllComments = $NewConnection->select_comments($CurrentArticleID);

            // var_dump($AllComments);

            foreach ($AllComments as $Key => $Value)
            {
                if ($IsEditingComment)
                {
                    echo '<form action="controller.php" method="post" class="article-editor">';
                    // echo '<input type="hidden" name="id_article" value="' . $CurrentArticleID . '">';
                    echo '<input type="hidden" name="id_commentaire" value="' . $Value['id_commentaire'] . '">';
                }

                echo '<fieldset class="comments">';
                echo '<legend>' . $Value['nom'] .'</legend>';
                echo '<h6>' . $Value['date'] . '</h6>';

                if ($IsEditingComment)
                {
                    echo '<textarea name="contenu" rows="5">' . $Value['contenu'] . '</textarea>';
                }
                else {
                    echo '<p>' . $Value['contenu'] . '</p>';
                }

                echo '</fieldset>';

                if ($IsEditingComment)
                {
                    echo '<button name="Intention" value="UpdateComment" type="submit">Mettre à jour</button>';
                    echo '<button name="Intention" value="DeleteComment" type="submit">Supprimer</button>';
                    echo '</form>';
                }
            }

        ?>

        <?php if (!$IsEditingComment || $IsEditingArticle): ?>
            <form id="CommentaireForm" action="controller.php" method="POST" >
                <h3>Laisser un commentaires</h3>
                <?php
                    echo '<input type="hidden" name="id_article" value="' . $CurrentArticleID . '">';
                ?>
                
                <input type="text" name="nom" placeholder="Insérer votre nom ici" >
                <input type="email" name="email" placeholder="Insérer votre email ici">
                <textarea type="text" name="contenu" placeholder="Insérer votre commentaire ici"></textarea>
                <button name="Intention" value="AddComment" type="submit">Publier le commentaire</button>
            </form>
        <?php endif; ?>
    </section>

    <footer>
        <?php include("./components/footer.php"); ?>
    </footer>

    <script>
        [...document.getElementsByClassName('image-selector')].forEach(Each => {
            Each.onchange = function (event) {
                let Section = event.target.parentNode;
                // console.log(Section);

                let src = URL.createObjectURL(event.target.files[0]);
                let ImagePreviewPlaceholder = Section.getElementsByClassName('image-preview');
                if (ImagePreviewPlaceholder)
                {
                    ImagePreviewPlaceholder[0].src = src;
                }
            }
        });
    </script>
</body>
</html>
