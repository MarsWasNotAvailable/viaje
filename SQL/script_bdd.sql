-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2023 at 12:01 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viaje`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(90) NOT NULL,
  `date` date NOT NULL,
  `photo_principale` varchar(255) NOT NULL,
  `resume` varchar(1000) NOT NULL,
  `sous_titre_1` varchar(100) NOT NULL,
  `contenu_1` text NOT NULL,
  `photo_1` varchar(255) NOT NULL,
  `sous_titre_2` varchar(90) NOT NULL,
  `contenu_2` text NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `sous_titre_3` varchar(90) NOT NULL,
  `contenu_3` text NOT NULL,
  `photo_3` varchar(255) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `date`, `photo_principale`, `resume`, `sous_titre_1`, `contenu_1`, `photo_1`, `sous_titre_2`, `contenu_2`, `photo_2`, `sous_titre_3`, `contenu_3`, `photo_3`) VALUES
(1, 'Observation des baleines à Tadoussac', '2023-07-16', './images/canada/baleine-tadoussac.jpg', 'Voir des baleines à Tadoussac fait partie des incontournables lors d’un road trip au Québec. En effet, dans le fleuve Saint-Laurent, elles y sont nombreuses ! Et on y trouve plusieurs espèces. Des croisières en bateau permettent l’observation des baleines au Québec.', 'L’essentiel sur la baleine à Tadoussac', 'Pour voir des baleines au Québec, 2 options sont possibles. Seul le type d’excursion change car dans les 2 cas, le départ de la croisière se fait depuis la baie de Tadoussac et l’observation se déroule plus précisément sur le Saint-Laurent. Focus sur ces détails pratiques.\r\n\r\nNotons qu’il est également possible de réserver une excursion baleine au départ de la ville de Québec. Dans cette réservation, la sortie en bateau est incluse  ainsi que le transfert aller / retour depuis la ville de Québec. Pratique pour ceux qui voyagent sans voiture, totalement inutile au cours d’un road trip bien évidemment … Mais forcément, le tarif est alors plus élevé : 150 euros environ (transferts inclus).', './images/canada/baleine-saint-laurent-quebec.jpg', 'Déroulement d’une croisière baleine à Tadoussac', 'Place maintenant à quelques explications sur la croisière en elle-même et sur son déroulement.\r\n\r\nComme indiqué sur la confirmation de réservation, il faut arriver avant l’heure de départ. Il est recommandé d’arriver 30 minutes avant le départ de la croisière.\r\n\r\nA votre arrivée, on vous remet une pantalon et une veste coupe-vent qui s’avère très utile. On vous donne également quelques informations sur les espèces marines que l’on peut observer lors de l’excursion baleine sur la Saint-Laurent. Bien sûr, il n’est pas garanti de voir toutes les espèces à chaque croisière … Néanmoins, vous verrez les espèces les plus courantes !\r\n\r\nAprès la départ du bateau, sur le trajet qui mène au parc marin du Saguenay Saint-Laurent, on peut souvent observer des phoques qui sont à la surface de l’eau. En pleine recherche de poissons.\r\n\r\nEnsuite, en arrivant dans la zone où se trouve les cétacés, on peut observer différentes espèces. La croisière durant en tout près de 3 heures (pour le zodiac), vous aurez largement le temps de profiter de ces moments magiques, à proximité des rorquals ou autres espèces visibles.\r\n\r\nLe retour se fait ensuite au même endroit que le point de départ.', './images/canada/excursion-baleine-tadoussac.jpg', 'Observer des baleines à Tadoussac … mais pas seulement !', 'La ville attire pour ses cétacés. C’est indéniable et c’est l’atout majeur de cette petite ville du Québec. Néanmoins, cette charmante petite ville a d’autres atouts.\r\n\r\nBien sûr, il faut y aller principalement pour faire une croisière et voir des baleines. Mais je vous recommande aussi d’y rester un peu plus longtemps pour profiter de la petite ville et des magnifiques paysages sur les rives du fleuve Saint-Laurent.\r\nCombien de temps rester à Tadoussac ?\r\n\r\nEn fonction de l’activité choisie pour l’observation des cétacés sur le Saint-Laurent, la croisière en mer vous prendra 2h30 à 3 heures. En gros, une demi-journée.\r\n\r\nPour profiter pleinement de la ville en faisant une croisière pour voir des cétacés mais aussi en découvrant les villes et la côte, il faut donc passer une nuit sur place.\r\n\r\nPensez à réserver rapidement si vous voyagez entre fin mai et début octobre car il n’y a pas énormément d’hôtels / auberges où dormir à Tadoussac. Et les meilleures adresses ont tendance à faire le plein en premier ;-)\r\n\r\nCe guide pratique touche à sa fin. Véritable incontournable lors d’un séjour au Québec, je vous conseille vivement de faire une excursion baleine depuis la ville de Tadoussac.\r\n\r\nComme évoqué ici, Tadoussac ne se limite pas à l’observation de ces cétacés en mer. Cette petite ville du Québec est charmante et vous pouvez facilement y passer une nuit et une journée. Une demi-journée pour l’observation dans le fleuve Saint-Laurent et l’autre demi-journée pour profiter de la ville et ses paysages.\r\n\r\nA priori, si vous vous posiez des questions sur ces sorties en bateau, vous devriez y avoir trouvé ici les réponses. Néanmoins, si des interrogations persistent quant à l’observation des baleines à Tadoussac, n’hésitez pas à commenter cet article du blog. Je réponds rapidement aux commentaires postés sur le blog. De plus, nos échanges en commentaires pourront peut-être s’avérer utiles à d’autres lecteurs du blog qui comptent aller voir les cétacés lors de leur voyage au Québec.', './images/canada/tadoussac-quebec.jpg'),
(3, 'Où dormir à Berlin ?', '2022-08-22', './images/berlin/ou-dormir-a-berlin.jpg', 'Où loger à Berlin : l’une des premières questions à se poser lorsque l’on se préparer à visiter la capitale allemande. Dans ce guide, nous allons tenter de trouver le meilleur endroit où dormir à Berlin. Les voyageurs y passent souvent 3 ou 4 nuits. Et sur un séjour aussi court, il est primordial de séjourner au coeur de la ville.\n\nDans cet article entièrement centré sur l’hébergement, je vais débuter par une présentation des meilleurs quartiers où dormir à Berlin. Pour chaque secteur géographique, nous aborderons sa situation, les choses à faire mais aussi l’offre en terme de logements touristiques.\n\nEnsuite, dans la dernière partie de ce guide, je partage mes recommandations sur les hôtels où loger à Berlin. Ces bonnes adresses sont classées par tarif à la nuitée. Et ce, afin que chaque lecteur du blog puisse trouver un hébergement en accord avec son budget.', 'L’essentiel pour savoir où dormir à Berlin', 'Comme pour toutes les grandes villes européennes, la capitale allemande est assez étendue. Dès lors, plusieurs questions peuvent se poser : dans quel quartier loger à Berlin, comment choisir son logement pour un week-end berlinois, …\r\n\r\nIl n’est jamais évident de choisir la situation géographique de son hôtel lorsque l’on ne connait pas une ville ni les spécificités des principaux secteurs où séjourner en voyage.\r\n\r\nDans cette première partie, je fais une rapide synthèse, pour les lecteurs les plus pressés. Je partage ici ce que je considère comme les meilleurs endroits pour loger dans la ville en voyage. Dans la suite de l’article, j’évoquerai plus en détails les principales zones géographiques en évoquant les choses à voir ou à faire, mais aussi sa situation dans la ville.', './images/berlin/dormir-a-berlin-600x397.jpg', 'Les meilleurs quartiers où loger à Berlin', 'De nombreux paramètres peuvent entrer en compte pour le choix du secteur où séjourner à Berlin : séjour en famille, budget limité ou plus large, durée du séjour et besoin d’être hébergé au coeur de la ville, …\r\n\r\nDans cette partie, j’évoque plus en détails les principaux coins de la ville. Pour chacun d’entre eux, je vais mentionner ce qu’il faut savoir : choses à faire, offre en logements disponibles, tarif à la nuitée à prévoir, situation géographique, accès au réseau de transport en commun. Ces différentes informations devraient vous permettre de cibler rapidement l’endroit où dormir à Berlin. Bien évidemment en choisissant la zone la plus adaptée à vos intentions de séjour.\r\nDormir à Mitte, centre historique et culturel de Berlin\r\n\r\nMitte est le secteur le plus central. C’est aussi le centre historique et culturel de la capitale allemande. C’est l’un des meilleurs endroits où dormir pour visiter Berlin.', './images/berlin/dans-quel-quartier-loger-a-berlin.jpg', 'Recommandations d’hébergements où dormir à Berlin', 'Avec la première partie de ce billet, vous devriez savoir dans quel quartier loger. En effet, avec la présentation des meilleures zones géographiques de la capitale allemande, vous devriez trouver celui qui correspond le plus aux attentes de votre séjour mais aussi au budget hébergement que vous pouvez consacrer au logement où vous passerez vos nuits.\r\n\r\nDans la dernière partie de ce post, je partage mes recommandations & bonnes adresses d’hôtels où se loger en voyage. Afin que chaque lecteur du blog puisse trouver une chambre en accord avec son budget, j’ai classé mes recommandations par gamme de prix / catégorie.', './images/berlin/loger-a-berlin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` varchar(1500) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `commentaire_article` (`id_article`),
  KEY `commentaire_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `date`, `contenu`, `id_utilisateur`, `id_article`) VALUES
(1, '2019-01-21 09:38:09', 'Bonjour,\r\nNous allons au Québec cet été (fin du mois de juin) et nous souhaitez faire une excursion pour observer des baleines. Nous sommes tombés sur ton blog et nous avons encore plus envie d aller à Tadoussac.\r\nMerci pour ce beau partage, ton blog est très bien organisé !\r\nCécile', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(25) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `role`, `nom`, `email`, `mot_de_passe`) VALUES
(1, 'admin', 'admin', 'admin@voyage', 'superpower'),
(2, 'moderator', 'Nostradamus', 'nosotros@damus', 'somos'),
(3, 'redactor', 'Jane', 'jane@doe', 'ohdear'),
(4, 'guest', 'Cécile', 'notafakemail@all', 'cilou'),
(20, 'guest', 'yo', 'fuck@you', '7f1850fc');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `commentaire_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
