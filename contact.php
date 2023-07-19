<?php
    // session_start();
    
    require_once("components/connexion.php");

    $DatabaseName = "viaje";

    $NewConnection = new MaConnexion($DatabaseName, "root", "", "localhost");

    // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaje</title>
    <link rel="icon" href="./cache/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>

<style>

/* le background du main  */
    .bg{
        background-color: #fff;
        margin: 5% 10%;
    }

    /* la partie textuelle */
    .titre{
        text-transform: uppercase;
        font-weight: bold;
        font-size: 34px;
        margin-bottom: 1.5%;
    }

    .entete{
        padding: 0 1.5%;
    }

    .entete h2 {
        color:#D66D40;
        font-size: 28px;
        margin-bottom: 1.5%;
    }

    .presentation{
        margin-bottom: 1.6%;
    }

    /* le style du formulaire de contact */
    .contactForm{
        display: grid;
    }

    .contactForm input{
        width: 30%;
        height: 3em;
        border: solid 1px #D9D9D9;
        margin:1% 0 1.5%;
    }

    .contactForm textarea{
        border: solid 1px #D9D9D9;
        margin:1% 0 1.5%;
    }

    .submit{
        width: 25%;
        border: solid 1px #ffff;
        margin:1% 0;
    }

        /* version mobile */
    @media (max-width: 900px) {

        .titre{
            font-size: 28px;
        }

        .entete h2{
            font-size: 24px;
        }

        .presentation{
            font-size: 13px;
            margin-bottom: 10%;
            line-height: 2em;
        }

        .contactForm input, .submit{
            width: 60%;
        }
        }
</style>
<body>
    <header>
        <?php include_once './components/navbar.php' ?>
    </header>

    <main class="bg">
        <!-- La section une avec les textes explicatifs-->
        <section class="entete">
            <h1 class="titre">Contact</h1>
            <p class="presentation">
            Bonjour et bienvenue sur mon <a>blog Voyage Way</a> !
Par avance, je vous remercie de l’intérêt que vous portez à mon blog de voyage ! J’espère que le contenu que je publie sur ce blog vous plait et qu’il vous est utile pour préparer vos voyages …            </p>

            <h2>Vous êtes un lecteur du blog ?</h2>
            
            <p class="presentation">
            Vous souhaitez me contacter pour  me poser une question concernant l’un des billets de mon blog ou concernant les préparatifs de votre prochain voyage ?

Si c’est le cas, je vous invite à compléter le formulaire ci-dessous.

Je m’efforce de répondre dans les plus brefs délais. Sauf si je suis en voyage, vous aurez une réponse de ma part sous 48 heures. Si ce n’est pas le cas, ne vous inquiétez pas, je vous répondrai dès que possible ;-)

Si vous jugez que votre question ainsi que ma réponse peuvent être utiles à d’autres lecteurs du blog, merci d’utiliser l’espace de commentaire sur un billet approprié. Cela m’évite d’avoir des échanges identiques à plusieurs reprises et permet de partager les informations avec d’autres lecteurs du blog qui comme vous, préparent un voyage et peuvent surement se poser la même question.
            </p>

            <h2>Vous êtes un annonceur, sponsor ou agence?</h2>

            <p class="presentation">Vous souhaitez me contacter pour une demande de collaboration, de partenariat ou autre ?

Si c’est le cas, je vous invite à lire cette page dédiée à ce sujet.

Pour information, je ne fais pas d’échange de liens gratuits pour les sites à vocation commerciale. Si vous êtes une start-up dans le domaine du voyage, contactez-moi tout de même, on en discutera ;-)

Vous pouvez également trouver ici une version allégée du media kit du blog Voyage Way. Nous pouvons échanger plus précisément sur la visibilité du blog par email ou directement par téléphone. N’hésitez donc pas à me contacter.
            </p>

            <h2>Contactez-moi</h2>
            <form action="" method="POST" class="contactForm">
                <div class="contactForm">
                    <label for="name"> Nom </label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="contactForm">
                    <label for="email">Email </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="contactForm">
                    <label for="subject">Sujet</label>
                    <input type="text" name="subject" id="subject" required>
                </div>
                <div class="contactForm">
                    <label for="message">Ecrire</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <div class="contactForm submit">
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </section>    
    </main>
    <footer>
        <?php include_once './components/footer.php' ?>
    </footer>
</body>
</html>