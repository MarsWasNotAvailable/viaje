# viaje

## Présentation du projet ##

Viaje est un blog de voyage. Il comprend plusieurs articles illustrés sous lesquels il est possible de laisser des commentaires. Les utilisateurs peuvent créer un compte ou se connecter. Il existe 4 rôles d'utilisateurs donnant accès à des fonctionnalités différentes allant de la publication d'un commentaire à la création ou suppression d'un article.

## Objectif :

L'objectif de ce projet est de vous permettre de créer un blog en PHP. Nous avons développer une interface utilisateur web dynamique et adaptable, créer une base de données, développer la partie back-end, et réaliser une interface utilisateur avec une solution de gestion de contenu.

## Conception ##
Tous les fichiers sont utiles au bon fonctionnement du blog, néanmoins 2 fichiers permettent les interactions entre l'interface et la base de données.

En effet, pour concevoir notre application web, nous avons utilisé le modèle MVC (Model View Controller), ici :
* Le fichier connexion.php correspond au Model,
* Le fichier controller.php correspond au Controller,
* Les autres fichiers front end qui constituent l'interface corrsepondent au View.

1. **Model** : connexion.php : 
Le fichier connexion.php contient une **class** nous permettant d'intéragir avec la base de donnée, en utilisant des fonctions Create Read Update Delete (CRUD). Sans ce fichier, aucune interaction n'est possible tout simplement car la base de données et l'interface ne sont pas liées.

2. **Controller** : controller.php : 
Il permet de récupérer les données du formulaire envoyer via les méthodes POST pour en faire des requêtes envoyées à la base de données. Il fait appelle aux fonctions de la class `MaConnexion` selon les actions faites par les utilisateurs. 

Afin d'éviter de répéter les mêmes codes pour composer l'interface nous avons isolé des bouts de codes qui se répetaient. Ainsi la navbar et le footer sont inclus grâce à la fonction PHP `require_once()`. Vous les retrouverez dans le dossier components.

## Installation ##
Pour le bon fonctionnement de l'application chaque document doit rester dans son dossier d'origine. La version de php que nous utilisons est la version 8.1.13.

1. Pour commencer, clonez, le dépot Git sur votre ordinateur. 
Pour garantir une meilleurs facilité à utiliser les fonctionnalités, en permettant de garder tous les fichiers dans leur emplacement originel.

2. Importez le fichier viaje.sql, qui se situe dans le dossier utilities, sur votre système de gestion de données.
Nous utilisons phpMyAdmin version 5.2.0.

3. Il y a une instance de maConnexion dans $NewConnection, n'hésitez pas à la modifier pour la connecter à votre système de gestion de données. Pour ce faire modifier les à l'aide de votre éditeur de texte. 

4. Ouvrez index.php sur votre navigateur dans le local host. Pour commencer à tester le blog. Nous avons tester le blog dans différents navigateurs tels que : 
            - Mozilla
            - Google Chrome
            -Brave

## Utilisation ##
Voici des exemples d'utilisation. 

### Exemple 1
Pour se connecter à son compte:

Etape 1: cliquer sur le bouton login en haut à droite de l'écran

Etape 2: sur la page de connexion, taper un email et un mot de passe existant dans la base de données, sinon il y a possibilité de s'inscrire en cliquant sur le lien vers _Do you mean to [signin]_. 

Etape 3: cliquer sur login

>La connexion permet selon le rôle de :

> gérer son compte via la page profile symboliser par un icon en haut à droite

> supprimer ou modifier des commentaires

> écrire, modifier ou supprimer un article via la page gestion

### Exemple 2

Pour effectuer une recherche avec la barre de recherche, pour un utilisateur qui voudrait voyager en "Australie":

Etape 1: entrer le mot "Australie", suivi de la touche entrer

Etape 2: visualiser et cliquer sur l'article qui vous intéresse dans les résultats

Etape 3: visualiser l'article jusqu'à la fin, et trouver la section commentaires

Etape 4: laisser votre commentaire