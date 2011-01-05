
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- magasin_categorie
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `magasin_categorie`;


CREATE TABLE `magasin_categorie`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- magasin_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `magasin_article`;


CREATE TABLE `magasin_article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255),
	`prix` FLOAT,
	`description` TEXT,
	`popularite` INTEGER,
	`stock` INTEGER,
	`categorie_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `magasin_article_FI_1` (`categorie_id`),
	CONSTRAINT `magasin_article_FK_1`
		FOREIGN KEY (`categorie_id`)
		REFERENCES `magasin_categorie` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- magasin_client
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `magasin_client`;


CREATE TABLE `magasin_client`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255),
	`prenom` VARCHAR(255),
	`adresse` VARCHAR(255),
	`mail` VARCHAR(255),
	`telephone` VARCHAR(15),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- magasin_panier
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `magasin_panier`;


CREATE TABLE `magasin_panier`
(
	`client_id` INTEGER,
	`article_id` INTEGER,
	`quantite` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `magasin_panier_FI_1` (`client_id`),
	CONSTRAINT `magasin_panier_FK_1`
		FOREIGN KEY (`client_id`)
		REFERENCES `magasin_client` (`id`),
	INDEX `magasin_panier_FI_2` (`article_id`),
	CONSTRAINT `magasin_panier_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `magasin_article` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- magasin_commande
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `magasin_commande`;


CREATE TABLE `magasin_commande`
(
	`client_id` INTEGER,
	`article_id` INTEGER,
	`quantite` INTEGER,
	`prix` FLOAT,
	`created_at` DATETIME,
	`etat` VARCHAR(10) default 'attente',
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `magasin_commande_FI_1` (`client_id`),
	CONSTRAINT `magasin_commande_FK_1`
		FOREIGN KEY (`client_id`)
		REFERENCES `magasin_client` (`id`),
	INDEX `magasin_commande_FI_2` (`article_id`),
	CONSTRAINT `magasin_commande_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `magasin_article` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
