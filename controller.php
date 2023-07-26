<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Controller</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // var_dump($_POST);
        
        include("./components/connexion.php");
        $DatabaseName = "viaje";
        $UsersTableName = "utilisateur";
        $CommentsTableName = "commentaire";
        $ArticleTableName = "article";
        $Redirection = "index.php";
        $ArticlePageRedirection = './article.php';
        $NotAllowedRedirection = './index.php';

        $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

        if (isset($_POST['Intention']))
        {
            switch ($_POST['Intention']) {

                case 'Signup':
                    $Values = array(
                        'email' => $_POST['email'],
                        'nom' => $_POST['nom'],
                        'mot_de_passe' => $_POST['mot_de_passe'],
                        'role' => 'guest'
                    );
                    var_dump($Values);

                    $Success = $NewConnection->insert($UsersTableName, $Values);

                    if (!$Success)
                    {
                        session_start();

                        $_SESSION['HasFailedSignedUp'] = true;

                        header("Location: " . 'signin.php');
                        die();
                    }

                    // we let fall through from signup to login, so it automatically logs in
                    // break;
                    
                case 'Login':
                    $Condition = '(`email` = "' . $_POST['email'] . '" AND `mot_de_passe` = "' . $_POST['mot_de_passe'] . '")';
                    $UniqueUser = $NewConnection->select($UsersTableName, "*", $Condition);

                    // var_dump($UniqueUser[0]);
                    session_start();

                    if ($UniqueUser) {
                        $_SESSION['CurrentUser'] = $UniqueUser[0]['email'];
                        $_SESSION['CurrentUserName'] = $UniqueUser[0]['nom'];
                        $_SESSION['UserRole'] = $UniqueUser[0]['role'];
                        $_SESSION['UserID'] = $UniqueUser[0]['id_utilisateur'];

                        // if (isset($_SESSION['HasFailedSignedUp']))
                        //     unset($_SESSION['HasFailedSignedUp']);

                        // if (isset($_SESSION['HasFailedLogin']))
                        //     unset($_SESSION['HasFailedLogin']);

                        header("Location: " . 'index.php');
                        die();
                    }
                    else {
                        // $_SESSION['CurrentUser'] = "Guest";
                        $_SESSION['HasFailedLogin'] = true;

                        //TODO: can add a message to say the user does not exist
                        // echo '<span>We do not know who you are. Do you mean to <a href="signup.php" >sign up</a> ?</span>';

                        header("Location: " . 'login.php');
                        die();
                    }

                    // var_dump($_SESSION);

                    break;

                case 'Logout':
                    session_start();

                    // session_unset();
                    session_destroy();
                
                    var_dump($_SESSION);
                
                    header('Location: ' . $Redirection );
                    die();

                    break;

                case 'AddArticle':
                    $Condition = '(`nom` = "Brouillon")';
                    $CategoryID = $NewConnection->select('categorie', "id_categorie", $Condition);
                    $CategoryID = $CategoryID ? $CategoryID[0]['id_categorie'] : '1';
                    // var_dump($CategoryID);

                    $ArticleID = $NewConnection->insert( 'article', array(
                        'titre' => 'Sans titre',
                        'date' => '2000-01-01',
                        'photo_principale' => '',
                        'resume' => 'Ajouter un résumé ici.',
        
                        'sous_titre_1' => 'Ajouter un premier sous titre ici',
                        'contenu_1' => 'Ajouter un premier paragraphe ici',
                        'photo_1' => '',
        
                        'sous_titre_2' => 'Ajouter un deuxieme sous titre ici',
                        'contenu_2' => 'Ajouter un deuxieme paragraphe ici',
                        'photo_2' => '',
        
                        'sous_titre_3' => 'Ajouter un troisieme sous titre ici',
                        'contenu_3' => 'Ajouter un troisieme paragraphe ici',
                        'photo_3' => '',
                        'categorie' => $CategoryID,
                        'sous_categorie' => 'brouillon'
                    ));
            
                    if ($ArticleID)
                    {
                        header("Location: " . "./article.php?edit=true&id_article=$ArticleID");
                        die();
                    }

                    break;

                case 'DeleteArticle':
                    $UpdateFieldCondition = array('id_article' => $_POST['id_article']);

                    $Success = $NewConnection->delete($ArticleTableName, $UpdateFieldCondition);

                    if ($Success) {
                        header("Location: " . 'gestion.php');
                        die();
                    }
                    break;

                case 'AddComment':

                    session_start();
                    // var_dump($_POST);

                    $Values = array(
                        'nom' => $_POST['nom'],
                        'email' => $_POST['email'],
                        'mot_de_passe' => bin2hex(openssl_random_pseudo_bytes(4)),
                        'role' => 'guest'
                    );

                    // $Condition = '(`email` = "' . $Values['email'] . '")';
                    // $UniqueUser = $NewConnection->select($UsersTableName, "id_utilisateur", $Condition);
                    // $UserID = ($UniqueUser) ? $UniqueUser[0]['id_utilisateur'] : $NewConnection->insert($UsersTableName, $Values);

                    $UserID = $NewConnection->insert_update($UsersTableName, $Values, array('Key' => 'nom', 'Value' => $Values['nom']));
                    // var_dump($UserID);

                    $Comments = array(
                        'contenu' => $_POST['contenu'],
                        'id_article' => $_POST['id_article'],
                        'id_utilisateur' => $UserID
                    );

                    var_dump($Comments);

                    $CommentsID = $NewConnection->insert($CommentsTableName, $Comments);
                    var_dump($CommentsID);

                    if ($UserID && $CommentsID)
                    {
                        require_once('./components/commons.php');

                        $CanEditToken = CanEditComments($_SESSION['UserRole']) ? 'edit=true&' : '&';
                        // header("Location: " . 'article.php' . "?id_article=" . $_POST['id_article']);
                        header("Location: " . $ArticlePageRedirection . '?' . $CanEditToken . 'id_article=' . $_POST['id_article'] . '#Commentaires');
                        die();
                    }

                    break;

                case 'UpdateComment':
                    require_once('./components/commons.php');
                    session_start();

                    if (CanEditComments($_SESSION['UserRole']))
                    {
                        $Values = array();
                    
                        $FieldsToUpdate = array('contenu');
                        foreach ($FieldsToUpdate as $EachKey => $EachValue){
                            if ($_POST[$EachValue]) $Values += array($EachValue => $_POST[$EachValue]);
                        }
                        // var_dump($Values);
    
                        $Condition = array('id_commentaire' => $_POST['id_commentaire']);
    
                        $Success = $NewConnection->update($CommentsTableName, $Condition, $Values);
    
                        if ($Success) {
                            // header("Location: " . $ArticlePageRedirection . '?edit=true#Commentaires');
                            header("Location: " . $ArticlePageRedirection . '?edit=true&id_article=' . $_POST['id_article'] . '#Commentaires');
                            die();
                        }
                    }
                    else
                    {
                        header("Location: " . $NotAllowedRedirection . '?edit=failed&id_article=' . $_POST['id_article'] . '#Commentaires');
                        die();
                    }

                    break;

                case 'DeleteComment':
                    require_once('./components/commons.php');
                    session_start();

                    if (CanEditComments($_SESSION['UserRole']))
                    {
                        $UpdateFieldCondition = array('id_commentaire' => $_POST['id_commentaire']);

                        $Success = $NewConnection->delete($CommentsTableName, $UpdateFieldCondition);
    
                        if ($Success) {
                            header("Location: " . $ArticlePageRedirection . '?edit=true&id_article=' . $_POST['id_article'] . '#Commentaires');
                            die();
                        }
                    }
                    else
                    {
                        header("Location: " . $NotAllowedRedirection . '?edit=failed&id_article=' . $_POST['id_article'] . '#Commentaires');
                        die();
                    }

                    break;

                case 'UploadImage':
                case 'UpdateArticleField':

                    //'id_article' => $_POST['id_article']
                    $Condition = '(`id_article` = "' . $_POST['id_article'] . '")';
                    $CurrentCategorySub = $NewConnection->select('article', 'sous_categorie', $Condition);
                    $CurrentCategorySub = $CurrentCategorySub ? $CurrentCategorySub[0]['sous_categorie'] : '';

                    if (isset($_POST['sous_categorie']) )
                    {
                        $NewCategorySub = strtolower($_POST['sous_categorie']);

                        if ($NewCategorySub != $CurrentCategorySub)
                        {
                            require_once('./components/commons.php');

                            $Source = './images/' . $CurrentCategorySub;
                            $Destination = './images/' . $NewCategorySub;

                            CopyFolder($Source, $Destination);
    
                            //TODO: I'm wondering: could there be two articles storing in same folder (sub-category)
                            //technically no, but there's those articles that have bad subcategory, like China instead of a city Beijing

                            //if the rest of the code uses the sub categorie to point to folder we got nothing else to do,
                            //except delete source folder
                            //TODO: I'm not yet confident to uncomment that, but the function works
                            // DeleteFolder($Source);
                        }
                    }

                    else if (isset($_FILES) && $_FILES)
                    {
                        // var_dump($_FILES);
                        // var_dump($_POST);

                        $CategoryFolderName = './images/' . $CurrentCategorySub;
                        $CurrentCategorySubFolder = $CurrentCategorySub ? $CurrentCategorySub . '/' : '';

                        $LocalTempName = $_FILES[$_POST['Column']]['tmp_name'];
                        // $ProjectDirectory = realpath(dirname(getcwd()));
                        // $DestinationName = $ProjectDirectory . "/viaje/images/" . strtolower($_POST['Category']) . '/' . $_FILES[$_POST['Column']]['name'] ;
                        $DestinationName = './images/' . $CurrentCategorySubFolder . $_FILES[$_POST['Column']]['name'] ;
                        // var_dump($LocalTempName);
                        // var_dump($DestinationName);

                        if ((file_exists( $CategoryFolderName ) && is_dir( $CategoryFolderName )) || mkdir($CategoryFolderName))
                        {
                            if (!file_exists($DestinationName))
                            {
                                move_uploaded_file($LocalTempName, $DestinationName);
                            }
                        }

                        // We should only store the filename below
                        // $_POST[$_POST['Column']] = $DestinationName;
                        $_POST[$_POST['Column']] = $_FILES[$_POST['Column']]['name'];
                    }

                    $Values = array(
                        $_POST['Column'] => $_POST[$_POST['Column']]
                    );

                    $Condition = array('id_article' => $_POST['id_article']);

                    $Success = $NewConnection->update($ArticleTableName, $Condition, $Values);

                    die();
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        else if (isset($_PUT['Intention']))
        {
            switch ($_PUT['Intention']) {
                case 'UpdateArticleField':
                    $Values = array(
                        $_PUT['Column'] => $_PUT['Value']
                    );

                    $Condition = array('id_article' => $_PUT['id_article']);

                    echo "yellow";

                    // $Success = $NewConnection->update($ArticleTableName, $Condition, $Values);

                    die();
                    break;

                // case 'UploadImage':
                //     $Values = array(
                //         $_PUT['Column'] => $_PUT['Value']
                //     );

                //     $Condition = array('id_article' => $_PUT['id_article']);

                //     $Success = $NewConnection->update($ArticleTableName, $Condition, $Values);

                //     die();
                //     break;
                default:
                    break;
            }
        }
    ?>

</body>
</html>
