<?php
    session_start();
    // var_dump($_SESSION);

    require_once("./components/commons.php");
    require_once("./components/connexion.php");



    $_SESSION['UserRole'] = 'admin';
    $IsEditingArticle = isset($_GET['edit']) ? $_GET['edit'] && CanEditArticles($_SESSION['UserRole']) : false;
    $IsEditingComment = isset($_GET['edit']) ? $_GET['edit'] && CanEditComments($_SESSION['UserRole']) : false;


    $DatabaseName = "viaje";
    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    $CurrentArticleID = isset($_GET['id_article']) ? $_GET['id_article'] : 0;


    $SelectedCategories = $NewConnection->select("categorie", "nom, id_categorie");
    $SelectedArticle = null;
    $CurrentArticleCategorie = "none";

    // Create new article
    if ($CurrentArticleID < 1 || $CurrentArticleID == 'new')
    {
        $SelectedArticle = array();
    }
    else {
        $SelectedArticle = $NewConnection->select("article", "*", "id_article = $CurrentArticleID");

        foreach ($SelectedArticle as $Key => $Value)
        {
            // $CurrentArticleCategorie = $Value['categorie'];
            $CurrentArticleCategorie = strtolower( $SelectedCategories[$Value['categorie'] - 1]['nom'] );
            // var_dump($CurrentArticleCategorie);
        }
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
            <?php
                function GenerateSection($IsEditingArticle, $SelectedArticle, $SectionNumber)
                {
                    foreach ($SelectedArticle as $Key => $Value)
                    {
                        // if (isset($Value['id_article']))
                        // {    echo '<input type="hidden" name="id_article" value="' . $Value['id_article'] . '">'; }
                            
                        echo '<h4 name="' . "sous_titre_$SectionNumber" . '" contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value["sous_titre_$SectionNumber"] . '</h4>';
                        echo '<p name="' . "contenu_$SectionNumber" . '" contenteditable="' . boolalpha($IsEditingArticle) . '">' . $Value["contenu_$SectionNumber"] . '</p>';

                        if ($IsEditingArticle){
                            echo '<label for="' . "photo_$SectionNumber" . '">Selectionner une image:</label>';
                            echo '<input name="' . "photo_$SectionNumber" . '" class="image-selector" type="file" accept="image/*"> ';

                            
                            echo '<img width="256" class="image-preview" src="' . $Value["photo_$SectionNumber"] . '" alt="Image Preview">';
                            // echo '<img width="256" class="image-preview" src="' . GetImagePath($Value["photo_$SectionNumber"], 'Australie') . '" alt="Image Preview">';
                        }
                        else {
                            echo '<img src="' . $Value["photo_$SectionNumber"] . '" alt="Fancy contextual image for this section" >';
                        }
                    }
                }

                function GenerateCategorieSelector($Categories, $Name, $SelectedId)
                {
                    $SelectedId--; //zero-based vs one-based

                    $Options = "";
                    foreach ($Categories as $Key => $Value)
                    {
                        $SelectState = ($Key == ($SelectedId)) ? 'selected="true' : '';

                        $Options .= '<option ' . $SelectState . ' value="' . $Value['id_categorie'] . '">' . $Value['nom'] . '</option>';
                    }

                    echo '
                        <label for="Categorie">Choose a Categorie:</label>
                        <select name="' . $Name . '" id="Categorie">'
                        . $Options .
                        '</select>
                    ';
                }
            ?>
            <section id="Tete" class="container">

                <?php
                    foreach ($SelectedArticle as $Key => $Value)
                    {
                        // $SelectedCategories = $NewConnection->select("categorie", "nom, id_categorie");

                        if ($IsEditingArticle){
                            
                            GenerateCategorieSelector($SelectedCategories, 'Categorie', $Value['categorie']);
                            
                            echo '<h2 name="titre" contenteditable="true">' . $Value['titre'] . '</h2>';
                            echo '<h6>' . date('Y-d-m') . '</h6>';

                            echo '<label for="photo_principale">Selectionner une image:</label>';
                            echo '<input name="photo_principale" class="image-selector" type="file" accept="image/*"> ';

                            echo '<img width="256" class="image-preview" src="' . $Value['photo_principale'] . '" alt="Image 1">';
                        }
                        else {
                            echo '<h1 name="categorie">Categorie: ' . $SelectedCategories[$Value['categorie'] - 1]['nom'] . '</h1>';
                            echo '<h2 name="titre">' . $Value['titre'] . '</h2>';
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
                ?>
            </section>

            <section id="Section2" class="container">
                <?php
                    GenerateSection($IsEditingArticle, $SelectedArticle, 2);
                ?>
            </section>

            <section id="Section3" class="container">
                <?php
                    GenerateSection($IsEditingArticle, $SelectedArticle, 3);
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
        function GetCurrentArticleID()
        {
            return Number( <?php echo $CurrentArticleID; ?> );
        }

        function GetCurrentArticleCategory()
        {
            return <?php echo '"' . $CurrentArticleCategorie . '"'; ?> ;
        }

        [...document.getElementsByClassName('image-selector')].forEach(Each => {
            Each.addEventListener('change', (Event) => {
                let Section = Event.target.parentNode;
                // console.log(Section);

                let url = "./controller.php";
                // const Category = GetCurrentArticleCategory();
                // console.log(Category);
                // let FileNameRelativeToDatabse = "./" + Category + "/" + Each.value.split('\\').pop();
                // console.log(FileNameRelativeToDatabse);


                // let form_data = new FormData();
                // form_data.append('Intention', 'UploadImage');
                // form_data.append('id_article', GetCurrentArticleID());
                // form_data.append('Column', Each.getAttribute('name'));
                // // form_data.append('Value', FileNameRelativeToDatabse);
                // // form_data.append('Value', Each );
                // form_data.append('Value', Each.files[0] );

                // console.log(form_data);

                // const Request = fetch(url, {
                //     method: "POST",
                //     mode: "cors", // no-cors, *cors, same-origin
                //     cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                //     credentials: "same-origin", // include, *same-origin, omit
                //     // It doesnt work with Content-Type
                //     // headers: { 'Content-Type': 'multipart/form-data' },
                //     redirect: "follow", // manual, *follow, error
                //     referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url

                //     body: form_data
                // })
                // .then(function (Response) { return Response.text(); })
                //     .then(function (ResponseText) {
                //         console.log(ResponseText);
                //     })
                // ;


                let src = URL.createObjectURL(Event.target.files[0]);
                let ImagePreviewPlaceholder = Section.getElementsByClassName('image-preview');
                if (ImagePreviewPlaceholder)
                {
                    ImagePreviewPlaceholder[0].src = src;
                }
            });
        });

        // We're using the same button for all ajax submit
        let UpdateButton = document.createElement('button');
            UpdateButton.innerHTML = "Update";
            UpdateButton.className = 'update-edit';
            UpdateButton.type = 'button';
        ;

        [...document.querySelectorAll('*[contenteditable="true"]')]
        .concat([...document.querySelectorAll('.image-selector')])
        .concat(document.querySelector("#Categorie"))
        .forEach(Each => {

            async function SendUpdateArticleField (Event) {
                // console.log("SendUpdateArticleField: ", Event.target);

                let url = "./controller.php";


                let form_data = new FormData();
                form_data.append('Intention', 'UpdateArticleField');
                form_data.append('id_article', GetCurrentArticleID());
                form_data.append('Category', GetCurrentArticleCategory());
                form_data.append('Column', Each.getAttribute('name'));

                //TODO: still aint perfect, I do want to preserve the generic code but we have a specific with the file paths
                // form_data.append('Value', File || Each.value || Each.innerHTML);
                //for images we need to cut the directory name off
                // form_data.append('Value', (Each.value.split('\\').pop() || Each.innerHTML));

                // Either a file, the content of the form value, or the actual editable text content
                const File = Each.files ? Each.files[0] : null;
                // console.log(File);
                form_data.append(Each.getAttribute('name'), File || Each.value || Each.innerHTML );


                // console.log(form_data);

                const Request = await fetch(url, {
                    method: "POST",
                    mode: "cors", // no-cors, *cors, same-origin
                    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: "same-origin", // include, *same-origin, omit
                    // It doesnt work with Content-Type
                    // headers: { 'Content-Type': 'multipart/form-data' },
                    redirect: "follow", // manual, *follow, error
                    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url

                    body: form_data

                })
                .then(function (Response) { 
                    
                    UpdateButton.remove();
                    UpdateButton.removeEventListener('click', SendUpdateArticleField, true);

                    return Response.text();
                })
                    .then(function (ResponseText) {
                        console.log(ResponseText);
                    })
                ;

                return true;
            }

            Each.addEventListener('focus', (Event) => {

                Event.target.insertAdjacentElement('afterend', UpdateButton);

                UpdateButton.addEventListener('click', SendUpdateArticleField);

                UpdateButton.style.display = 'block';
            });

            Each.addEventListener('blur', (Event) => {
                //Because the button click causes a blur event on the editable element,
                //we cannot remove the button here: otherwise we cripple the async fetch
                //NOTE: the button is still there existing, and can be clicked by a (malicious?) script
                // setTimeout(()=>{
                //     UpdateButton.style.display = 'none';
                // }, 3600);

            });
        });
    </script>

    <!-- <form id="form" action="./controller.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_article" value="1">
        <input type="hidden" name="Column" value="photo_principale">
        <input type="hidden" name="Value" value="ertetr">
        <input type="hidden" name="Categorie" value="Allemagne">

        <input name="photo_principale" type="file" accept="image/*">
        <button type="submit" name="Intention" value="UploadImage" >Update</button>
    </form> -->

</body>
</html>
