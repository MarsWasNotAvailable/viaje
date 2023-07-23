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

        $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

        if (isset($_POST['Intention']))
        {
            switch ($_POST['Intention']) {
                case 'AddComment':
                    $Values = array(
                        'nom' => $_POST['nom'],
                        'email' => $_POST['email'],
                        'mot_de_passe' => bin2hex(openssl_random_pseudo_bytes(4)),
                        'role' => 'guest'
                    );

                    // $Success = $NewConnection->insert($UsersTableName, $Values);
                    $UserID = $NewConnection->insert($UsersTableName, $Values);

                    // var_dump($UserID);

                    $Comments = array(
                        'contenu' => $_POST['contenu'],
                        'id_article' => $_POST['id_article'],
                        'id_utilisateur' => $UserID
                    );

                    $CommentsID = $NewConnection->insert($CommentsTableName, $Comments);

                    // var_dump($CommentsID);

                    if ($UserID && $CommentsID)
                    {
                        header("Location: " . 'article.php' . "?id_article=" . $_POST['id_article']);
                        die();
                    }

                    break;

                case 'Signup':
                    $Values = array(
                        'mail' => $_POST['mail'],
                        'password' => $_POST['password'],
                        'role' => 'Admin',
                        'current_ip' => $_SERVER['REMOTE_ADDR']
                    );

                    if (isset($_POST['nickname']))
                    {
                        $Values += array('nickname' => $_POST['nickname']);
                    }
                    
                    // var_dump($Values);

                    $Success = $NewConnection->insert($UsersTableName, $Values);

                    if (!$Success)
                    {
                        session_start();

                        $_SESSION['HasFailedSignedUp'] = true;

                        header("Location: " . 'signup.php');
                        die();
                        // break;
                    }

                    // break;
                    
                case 'Login':
                    $Condition = '(`email` = "' . $_POST['email'] . '" AND `mot_de_passe` = "' . $_POST['mot_de_passe'] . '")';
                    $UniqueUser = $NewConnection->select($UsersTableName, "*", $Condition);

                    // var_dump($UniqueUser[0]);
                    session_start();

                    if ($UniqueUser) {
                        $_SESSION['CurrentUser'] = $UniqueUser[0]['nom'];
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
                    $ArticleID = $NewConnection->insert( 'article', array(
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
                        'categorie' => 1
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

                case 'UpdateComment':
                    $Values = array();
                    
                    $FieldsToUpdate = array('contenu');
                    foreach ($FieldsToUpdate as $EachKey => $EachValue){
                        if ($_POST[$EachValue]) $Values += array($EachValue => $_POST[$EachValue]);
                    }

                    // var_dump($Values);

                    $Condition = array('id_commentaire' => $_POST['id_commentaire']);

                    $Success = $NewConnection->update($CommentsTableName, $Condition, $Values);

                    if ($Success) {
                        header("Location: " . $ArticlePageRedirection . '?edit=true#Commentaires');
                        die();
                    }
                    break;

                case 'DeleteComment':
                    $UpdateFieldCondition = array('id_commentaire' => $_POST['id_commentaire']);

                    $Success = $NewConnection->delete($CommentsTableName, $UpdateFieldCondition);

                    if ($Success) {
                        header("Location: " . $ArticlePageRedirection);
                        die();
                    }
                    break;

                case 'UpdateArticleField':
                    $Values = array(
                        $_POST['Column'] => $_POST['Value']
                    );

                    $Condition = array('id_article' => $_POST['id_article']);

                    // var_dump($Values);
                    // var_dump($Condition);

                    $Success = $NewConnection->update($ArticleTableName, $Condition, $Values);

                    // echo "success";

                    // if ($Success) {
                    //     // header("Location: " . $ArticlePageRedirection);
                        die();
                    // }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    ?>

</body>
</html>
