CREATE TABLE `article` (
	`id_article` INT NOT NULL AUTO_INCREMENT,
	`titre` varchar(100) NOT NULL,
	`resume` INT(2000) NOT NULL,
	`titre2` INT(100) NOT NULL,
	`contenu2` INT(5000) NOT NULL,
	`titre3` INT(100) NOT NULL,
	`contenu3` INT(5000) NOT NULL,
	`photo1` varchar(500) NOT NULL,
	`photo2` varchar(500) NOT NULL,
	`photo3` varchar(500) NOT NULL,
	PRIMARY KEY (`id_article`)
);

CREATE TABLE `commentaire` (
	`id_commentaire` INT NOT NULL AUTO_INCREMENT,
	`date` DATETIME NOT NULL,
	`contenu` varchar(2000) NOT NULL,
	`id_utilisateur` varchar(100) NOT NULL,
	`id_article` INT NOT NULL,
	PRIMARY KEY (`id_commentaire`)
);

CREATE TABLE `utilisateur` (
	`id_utilisateur` INT NOT NULL AUTO_INCREMENT,
	`role` varchar(50) NOT NULL,
	`nom` varchar(50) NOT NULL,
	`email` varchar(100) NOT NULL,
	`mot_de_passe` varchar(50) NOT NULL,
	PRIMARY KEY (`id_utilisateur`)
);

ALTER TABLE `commentaire` ADD CONSTRAINT `commentaire_fk0` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur`(`id_utilisateur`);

ALTER TABLE `commentaire` ADD CONSTRAINT `commentaire_fk1` FOREIGN KEY (`id_article`) REFERENCES `article`(`id_article`);




