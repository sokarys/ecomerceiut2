
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- categorie
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categorie`;


CREATE TABLE `categorie`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article`;


CREATE TABLE `article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255),
	`prix` FLOAT,
	`description` TEXT,
	`popularite` INTEGER,
	`stock` INTEGER,
	`categorie_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `article_FI_1` (`categorie_id`),
	CONSTRAINT `article_FK_1`
		FOREIGN KEY (`categorie_id`)
		REFERENCES `categorie` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- client
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `client`;


CREATE TABLE `client`
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
#-- commande
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `commande`;


CREATE TABLE `commande`
(
	`client_id` INTEGER,
	`created_at` DATETIME,
	`etat` VARCHAR(10) default 'attente',
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `commande_FI_1` (`client_id`),
	CONSTRAINT `commande_FK_1`
		FOREIGN KEY (`client_id`)
		REFERENCES `client` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ligne_commande
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ligne_commande`;


CREATE TABLE `ligne_commande`
(
	`commande_id` INTEGER  NOT NULL,
	`article_id` INTEGER  NOT NULL,
	`quantite` INTEGER,
	`prix` FLOAT,
	PRIMARY KEY (`commande_id`,`article_id`),
	CONSTRAINT `ligne_commande_FK_1`
		FOREIGN KEY (`commande_id`)
		REFERENCES `commande` (`id`),
	INDEX `ligne_commande_FI_2` (`article_id`),
	CONSTRAINT `ligne_commande_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
