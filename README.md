# viaje

## Présentation du projet ##

Viaje est un blog de voyage. Il comprend plusieurs articles illustrés sous lesquels il est possible de laisser des commentaires. Les utilisateurs peuvent créer un compte ou se connecter. Il existe 4 rôles d'utilisateurs donnant accès à des fonctionnalités différentes allant de la publication d'un commentaire à la création ou suppression d'un article.

## Objectif :

L'objectif de ce projet est de vous permettre de créer un blog en PHP. Nous avons développer une interface utilisateur web dynamique et adaptable, créer une base de données, développer la partie back-end, et réaliser une interface utilisateur avec une solution de gestion de contenu.

## Conception ##

Tous les fichiers sont utiles au bon fonctionnement du blog, néanmoins pour permettre les interactions entre l'interface et la base de données, 2 fichiers sont très importants.
1. connexion.php : 
Il contient **la class de connexion à la base de donnée** `MaConnexion` et ses fonctions. Sans ce fichier, aucune interaction n'est possible tout simplement car la base de données et le blog ne sont pas lié.

2. controller.php : 
Il permet de récupérer les données du formulaire envoyer via les méthodes POST pour en faire des requêtes envoyées à la base de données. Il applique les fonctions de la class `MaConnexion` selon les actions faites par les utilisateurs. 

## Installation ##
Pour le bon fonctionnement de l'application chaque document doit rester dans son dossier d'origine. La version de php que nous utilisons est la version 8.1.13.

1. Pour commencer, clonez, le dépot Git sur votre ordinateur. 
Pour garantir une meilleurs facilité à utiliser les fonctionnalités, en permettant de garder tous les fichiers dans leur emplacement originel.

2. Importez le fichier viaje.sql, qui se situe dans le dossier utilities, sur votre système de gestion de données.
Nous utilisons phpMyAdmin version 5.2.0.

3. Il y a une instance de maConnexion dans $NewConnection, n'hésitez pas à la modifier pour la connecter à votre système de gestion de données. Pour ce faire modifier les à l'aide de votre éditeur de texte. 

4. Ouvrez index.php sur votre navigateur dans le local host. Pour commencer à tester le blog. Nous avons tester le blog dans différents navigateurs tels que : 
* Mozilla
* Google Chrome
* Brave

## Utilisation ##
Voici un exemple d'utilisation. 

Pour se connecter à son compte, cliquez sur le bouton login en haut à droite de l'écran. Ceci ménera vers une page de connexion. Il faudra taper un email et un mot de passe existant dans la base de données, sinon il y a possibilité de s'inscrire en cliquant sur le lien vers _Do you mean to [signin]_. 

La connexion permet selon le rôle de :
* gérer son compte via la page profile symboliser par un icon en haut à droite
* supprimer ou modifier des commentaires
* écrire, modifier ou supprimer un article via la page gestion

Pour se deconnecter, il suffit de cliquer sur le bouton logout apparu en haut à droite à la palce de login. 