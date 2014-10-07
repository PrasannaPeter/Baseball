-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 15 Juin 2012 à 16:21
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `baseball`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL auto_increment,
  `LOGIN` varchar(10) NOT NULL,
  `MDP` varchar(10) NOT NULL,
  PRIMARY KEY  (`ID_ADMIN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `LOGIN`, `MDP`) VALUES
(1, 'az', 'az');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CATEGORIE` int(2) NOT NULL,
  `NOM_CATEGORIE` char(32) default NULL,
  PRIMARY KEY  (`ID_CATEGORIE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID_CATEGORIE`, `NOM_CATEGORIE`) VALUES
(1, 'Batte'),
(2, 'Gant'),
(3, 'Ball'),
(4, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(11) NOT NULL auto_increment,
  `LOGIN_CLIENT` varchar(20) default NULL,
  `MDP1_CLIENT` char(32) default NULL,
  `MDP2_CLIENT` char(32) default NULL,
  `NOM_CLIENT` char(32) default NULL,
  `PRENOM_CLIENT` char(32) default NULL,
  `ADD_CLIENT` char(32) default NULL,
  `CP_CLIENT` smallint(5) default NULL,
  `TEL_CLIENT` smallint(10) default NULL,
  `EMAIL_CLIENT` char(32) default NULL,
  PRIMARY KEY  (`ID_CLIENT`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `LOGIN_CLIENT`, `MDP1_CLIENT`, `MDP2_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `ADD_CLIENT`, `CP_CLIENT`, `TEL_CLIENT`, `EMAIL_CLIENT`) VALUES
(11, 'aa', 'aa', 'qsdf', 'dfg', 'dfgfd', 'dfhgf', 32767, 5643, 'sdegyr'),
(12, 'bb', 'bb', 'Sun', 'Latha', 'bd GL', 'arg', 95, 1487, 'l@gmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_COMMANDE` int(11) NOT NULL auto_increment,
  `ID_CLIENT` int(11) NOT NULL,
  `DATE_COMMANDE` date default NULL,
  `TOTALAPAYE` double NOT NULL,
  PRIMARY KEY  (`ID_COMMANDE`),
  KEY `I_FK_COMMANDE_CLIENT` (`ID_CLIENT`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`ID_COMMANDE`, `ID_CLIENT`, `DATE_COMMANDE`, `TOTALAPAYE`) VALUES
(2, 11, '2012-06-15', 200),
(3, 11, '2012-06-15', 200),
(4, 11, '2012-06-15', 29.95),
(5, 1, '2012-06-15', 564.95);

-- --------------------------------------------------------

--
-- Structure de la table `correspondre`
--

CREATE TABLE `correspondre` (
  `ID_PRODUIT` char(32) NOT NULL,
  `ID_COMMANDE` int(32) NOT NULL,
  `QUANTITE` smallint(5) default NULL,
  PRIMARY KEY  (`ID_PRODUIT`,`ID_COMMANDE`),
  KEY `I_FK_CORRESPONDRE_PRODUIT` (`ID_PRODUIT`),
  KEY `I_FK_CORRESPONDRE_COMMANDE` (`ID_COMMANDE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `correspondre`
--

INSERT INTO `correspondre` (`ID_PRODUIT`, `ID_COMMANDE`, `QUANTITE`) VALUES
('6', 3, 4),
('6', 2, 4),
('10', 4, 5),
('16', 5, 5),
('10', 5, 5),
('1', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_PRODUIT` int(11) NOT NULL auto_increment,
  `ID_CATEGORIE` int(5) NOT NULL,
  `MARQUE` char(32) default NULL,
  `DESCRIPTION` char(32) default NULL,
  `POSITION_JOUEUR` char(32) default NULL,
  `PRIX` double(5,2) default NULL,
  `IMAGE` char(32) default NULL,
  PRIMARY KEY  (`ID_PRODUIT`),
  KEY `I_FK_PRODUIT_CATEGORIE` (`ID_CATEGORIE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`ID_PRODUIT`, `ID_CATEGORIE`, `MARQUE`, `DESCRIPTION`, `POSITION_JOUEUR`, `PRIX`, `IMAGE`) VALUES
(1, 1, 'Easton', 'Batte en Bois', 'batteur', 95.00, 'images/batteB/BB1.jpg'),
(2, 1, 'Easton', 'Batte en Bois', 'batteur', 95.00, 'images/batteB/BB2.jpg'),
(3, 1, 'Easton', 'Batte en Bois', 'batteur', 95.00, 'images/batteB/BBe.jpg'),
(4, 1, 'Reflex', 'Batte en Aluminum', 'batteur', 135.00, 'images/batteA/BA1.jpg'),
(5, 1, 'Rampage', 'Batte en Aluminum', 'batteur', 32.00, 'images/batteA/BA4.jpg'),
(6, 2, 'Easton', 'Gant receveur', 'receveur', 50.00, 'images/gants/BMX20.jpg'),
(7, 2, 'Easton', 'Gant joueur champ', '1erbase', 169.00, 'images/gants/K3.jpg'),
(8, 2, 'Easton', 'Gant joueur champ', 'DefenseInterieur', 179.00, 'images/gants/K44.jpg'),
(9, 2, 'Easton', 'Gant joueur champ', 'DefenseExterieur', 199.00, 'images/gants/K81.jpg'),
(10, 3, 'Rawlings', 'Balle de baseball CUIR', 'lanceur', 5.99, 'images/balles/B1.jpg'),
(11, 3, 'BB12', 'Balle de baseball CUIR', 'lanceur', 4.49, 'images/balles/B3.jpg'),
(12, 3, 'Easton', 'Balle de baseball Fluorescent NY', 'lanceur', 3.99, 'images/balles/B4.jpg'),
(13, 3, 'Easton', 'Balle d entrainement de baseball', 'lanceur', 1.25, 'images/balles/B5.jpg'),
(14, 2, 'Easton', 'Gants batteur noir', 'battteur', 40.00, 'images/gantsB/GB1.jpg'),
(15, 2, 'Easton', 'Gants batteur n/r/b', 'battteur', 22.00, 'images/gantsB/GB2.jpg'),
(16, 4, 'Easton', 'Casque de protection', 'receveur', 69.00, 'images/divers/C1.jpg'),
(17, 4, 'Easton', 'Jambiéres', 'receveur', 69.00, 'images/divers/J1.jpg'),
(18, 4, 'Easton', 'Plastron de protection', 'receveur', 79.00, 'images/divers/P1.jpg');
