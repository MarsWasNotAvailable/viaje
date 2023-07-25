# viaje
Brief En Groupe De 3 - Blog Voyage

## Contexte du projet

Vous travaillez pour une entreprise de développement web qui souhaite élargir son offre de services en proposant des blogs personnalisés à ses clients.
Votre mission est de créer un prototype de blog en PHP qui comprendra une gestion des articles depuis un backoffice. Le projet doit être réalisé sur une période de 10 jours, avec des objectifs quotidiens pour vous aider à rester sur la bonne voie.

## Séquençage du travail :

* Jour 1 : Planification du projet et définition des objectifs, Création du cahier des charges

* Jour 2 : Conception des maquettes et wireframes

* Jour 3 : Développement de l'interface utilisateur web statique

* Jour 4 : Création de la base de données

* Jour 5 : Développement de l'interface utilisateur web dynamique

* Jour 6 : Développement de la partie back-end Jour

* Jours 7, 8 et 9: Finalisation et revue du projet

* Jour 10 : Préparation et présentation du projet

## Objectif :

L'objectif de ce projet est de vous permettre de créer un blog en PHP. Vous allez développer une interface utilisateur web dynamique, créer une base de données, développer la partie back-end, réaliser une interface utilisateur web statique et adaptable, et réaliser une interface utilisateur avec une solution de gestion de contenu.

​
## En PJ : une liste d'exemple de blog.

https://animalaxy.fr/
https://www.greenpeace.fr/
https://www.capital.fr/
https://www.presse-citron.net/
https://www.voyageway.com/
https://www.cadremploi.fr/emploi/top_recruteurs
https://siecledigital.fr/
https://www.voyageperou.info/

## Optionnel :

Idées de fonctionnalités optionnelles si vous avez le temps et/ou l'envie.

Poster des commentaires sur les articles
Noter les articles



## Présentation du projet ##


Les données de notre projet web utilise des styles CSS pour la mise en page et inclut des éléments tels qu'une barre de navigation comprenant des articles par categorie, une barre de recherche par mots clé également un login et d'autre fonctionnalités si rapportent.



1. La ligne require_once("components/connexion.php") inclut un fichier de connexion à la base de données. Cela permet au code d'accéder à la base de données et d'exécuter des requêtes.

2. La classe MaConnexion est utilisée pour créer une instance de connexion à la base de données. Les informations de connexion sont passées en paramètres lors de l'instanciation de la classe.

3. La méthode select de la classe MaConnexion est utilisée pour récupérer tous les enregistrements de la table "article" dans la base de données. Le résultat de cette requête est stocké dans la variable $Result.

4. Le code HTML et CSS définit la structure et le style de la page. Des balises telles que <header>, <main>, <section>, <div>, <img>, <a>, <h1>, <h2>, <h3>, <p>, etc. sont utilisées pour structurer le contenu et appliquer le style.

5. À l'intérieur de la boucle foreach, chaque article est affiché dans une carte (<div class="card">). Les données de chaque article, telles que le titre, la date et le résumé, sont extraites de la variable $display et affichées à l'aide de balises HTML.

6. Les images des articles sont affichées à l'aide de la balise <img> avec la source spécifiée dans $display['photo_principale'].


  ## PROBLEMES ET SOLUTIONS ##
 

1. Transfert d'informations de PHP à JavaScript : Il semble y avoir des difficultés à transférer des informations de PHP à JavaScript dans ce code. Pour résoudre ce problème, des fonctions pourraient être créées en tant qu'interfaces entre les deux technologies. Ces fonctions pourraient être utilisées pour échanger des données entre PHP et JavaScript.

2. Script SQL de la base de données : L'implémentation du script SQL de la base de données a été un défi. Une solution pourrait être d'automatiser le processus en utilisant un script PHP, bien que cela n'ait pas été réalisé dans ce cas. Un script PHP pourrait être créé pour exécuter le script SQL et mettre en place la structure de la base de données.

3. Conflits Git : Des conflits de fusion Git ont ralenti la progression du travail. Une solution consiste à travailler sur des parties distinctes du code pour éviter les conflits. En travaillant sur des branches distinctes, les développeurs peuvent fusionner leur travail sans rencontrer de conflits. L'utilisation d'outils de gestion de version, tels que des clients Git avec une interface utilisateur graphique, peut également aider à résoudre les conflits plus facilement.

4. Création d'un éditeur d'article : La création d'un éditeur d'article a été difficile en raison de la structure de la base de données où les contenus sont séparés. Une solution envisagée a été de stocker les contenus au format HTML pour permettre plus d'options de formatage, mais cela aurait augmenté la taille du contenu. Finalement, une solution plus simple a été adoptée pour une démonstration. Pour simplifier l'éditeur d'article, il est possible de limiter les options de formatage ou de stocker les contenus dans un format simplifié, puis de les formater lors de l'affichage sur la page.

