 Serveur: localhost   Base de données: baseball   Table: produit "InnoDB free: 10240 kB; (`ID_CATEGORIE`) REFER `baseball/categorie`(`ID_CATEGORIE" 
-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 19 Octobre 2011 à 15:14
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `baseball`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_PRODUIT` int(2) NOT NULL,
  `ID_CATEGORIE` int(2) NOT NULL,
  `MARQUE` char(32) default NULL,
  `DESCRIPTION` char(32) default NULL,
  `POSITION_JOUEUR` char(32) default NULL,
  `PRIX` float default NULL,
  `IMAGE` varchar(50) default NULL,
  PRIMARY KEY  (`ID_PRODUIT`),
  KEY `I_FK_PRODUIT_CATEGORIE` (`ID_CATEGORIE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`ID_PRODUIT`, `ID_CATEGORIE`, `MARQUE`, `DESCRIPTION`, `POSITION_JOUEUR`, `PRIX`, `IMAGE`) VALUES
(1, 1, 'Easton', 'Batte en Bois', 'batteur', 95,'images/batteB/BB1.jpg'),
(2, 1, 'Easton', 'Batte en Bois', 'batteur', 95, 'images/batteB/BB2.jpg'),
(3, 1, 'Easton', 'Batte en Bois', 'batteur', 95, 'images/batteB/BBe.jpg'),
(4, 1, 'Reflex', 'Batte en Aluminum', 'batteur', 135, 'images/batteA/BA1.jpg'),
(5, 1, 'Rampage', 'Batte en Aluminum', 'batteur', 32, 'images/batteA/BA4.jpg'),
(6, 2, 'Easton', 'Gant receveur', 'receveur', 50, 'images/gants/BMX20.jpg'),
(7, 2, 'Easton', 'Gant joueur champ', '1erbase', 169, 'images/gants/K3.jpg'),
(8, 2, 'Easton', 'Gant joueur champ', 'DefenseInterieur', 179 'images/gants/K44.jpg'),
(9, 2, 'Easton', 'Gant joueur champ', 'DefenseExterieur', 199, 'images/gants/K81.jpg'),
(10, 3, 'Rawlings', 'Balle de baseball CUIR', 'lanceur', 5.99, 'images/balles/B1.jpg'),
(11, 3, 'BB12', 'Balle de baseball CUIR', 'lanceur', 4.49, 'images/balles/B3.jpg'),
(12, 3, 'Easton', 'Balle de baseball Fluorescent NYLON','lanceur', 3.99, 'images/balles/B4.jpg'),
(13, 3, 'Easton', 'Balle d entrainement de baseball en plastique', 'lanceur', 1.25, 'images/balles/B5.jpg'),
(14, 2, 'Easton', 'Gants batteur noir', 'battteur', 40, 'images/gantsB/GB1.jpg'),
(15, 2, 'Easton', 'Gants batteur n/r/b', 'battteur', 22, 'images/gantsB/GB2.jpg'),
(16, 4, 'Easton', 'Casque de protection', 'receveur', 69, 'images/divers/C1.jpg'),
(17, 4, 'Easton', 'Jambiéres', 'receveur', 69, 'images/divers/J1.jpg'),
(18, 4, 'Easton', 'Plastron de protection', 'receveur', 79, 'images/divers/P1.jpg'),

;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`);
 