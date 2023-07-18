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
        $Redirection = "index.php";

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
                    $Condition = '(`mail` = "' . $_POST['mail'] . '" AND `password` = "' . $_POST['password'] . '")';
                    $UniqueUser = $NewConnection->select($UsersTableName, "*", $Condition);

                    // var_dump($UniqueUser[0]);
                    session_start();

                    if ($UniqueUser) {
                        $_SESSION['CurrentUser'] = $UniqueUser[0]['nickname'];
                        $_SESSION['UserRole'] = $UniqueUser[0]['role'];
                        $_SESSION['UserID'] = $UniqueUser[0]['id'];

                        // if (isset($_SESSION['HasFailedSignedUp']))
                        //     unset($_SESSION['HasFailedSignedUp']);

                        // if (isset($_SESSION['HasFailedLogin']))
                        //     unset($_SESSION['HasFailedLogin']);

                        header("Location: " . $Redirection);
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

                case 'Add':
                    $Success = $NewConnection->insert( 'contacts', array(
                        'name_last' => $_POST['name_last'],
                        'name_first' => $_POST['name_first'],
                        'email' => $_POST['email'],
                        'phone' => $_POST['phone'],
                        'address' => $_POST['address'],
                    ));
            
                    if ($Success)
                    {
                        header("Location: " . './add.php');
                        die();
                    }

                    break;

                case 'Update':
                    $Values = array();
                    
                    $FieldsToUpdate = array('name_last','name_first','email','phone', 'address');
                    foreach ($FieldsToUpdate as $EachKey => $EachValue){
                        if ($_POST[$EachValue]) $Values += array($EachValue => $_POST[$EachValue]);
                    }

                    // var_dump($Values);

                    $Condition = array('idContact' => $_POST['idContact']);

                    $Success = $NewConnection->update($ContactTableName, $Condition, $Values);

                    if ($Success) {
                        header("Location: " . "./show.php");
                        die();
                    }
                    break;

                case 'Remove':
                    $UpdateFieldCondition = array('idContact' => $_POST['idContact']);

                    $Success = $NewConnection->delete($ContactTableName, $UpdateFieldCondition);

                    if ($Success) {
                        header("Location: " . './show.php');
                        die();
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    ?>

</body>
</html>
