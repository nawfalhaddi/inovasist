-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 23 sep. 2018 à 11:52
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inovasist`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_CLI` int(11) NOT NULL AUTO_INCREMENT,
  `FNAME_CLI` longtext,
  `LNAME_CLI` longtext,
  `BIRTH_DATE` date DEFAULT NULL,
  `PHONE_NUM` varchar(15) DEFAULT NULL,
  `CIN_NUM` longtext,
  `CIN_LOCATION` longtext,
  `JOB_CLI` longtext,
  `ADDRESS_CLI` longtext,
  `SEX_CLI` longtext,
  `BALANCE_CLI` float DEFAULT NULL,
  `IS_ACTIF` tinyint(1) DEFAULT NULL,
  `IS_VERIFIED` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_CLI`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_CLI`, `FNAME_CLI`, `LNAME_CLI`, `BIRTH_DATE`, `PHONE_NUM`, `CIN_NUM`, `CIN_LOCATION`, `JOB_CLI`, `ADDRESS_CLI`, `SEX_CLI`, `BALANCE_CLI`, `IS_ACTIF`, `IS_VERIFIED`) VALUES
(3, 'NAWFAL', 'HADDI', '1996-06-11', '0682971474', 'L581141', 'public/upload/cin/IDcard face.jpg', 'ETUDIANT', '22 RUE SANAWBAR AIN HAYANI TANGER ', 'Mr', 14790, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `ID_EMPLOYEE` int(11) NOT NULL AUTO_INCREMENT,
  `FNAME_EMPLOYEE` longtext,
  `LNAME_EMPLOYEE` longtext,
  `BIRTH_DATE_EMPLOYEE` date DEFAULT NULL,
  `PHONE_NUM_EMPLOYEE` varchar(15) DEFAULT NULL,
  `CIN_NUM_EMPLOYEE` longtext,
  `IS_ACTIVE` tinyint(1) DEFAULT NULL,
  `IS_ADMIN` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_EMPLOYEE`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`ID_EMPLOYEE`, `FNAME_EMPLOYEE`, `LNAME_EMPLOYEE`, `BIRTH_DATE_EMPLOYEE`, `PHONE_NUM_EMPLOYEE`, `CIN_NUM_EMPLOYEE`, `IS_ACTIVE`, `IS_ADMIN`) VALUES
(1, 'Nawfal', 'Haddi', '2018-06-06', '626171', 'L12312', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `ID_FEEDBACK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLI` int(11) NOT NULL,
  `FEEDBACK_CONTENT` text,
  `FEEDBACK_NAME` longtext,
  PRIMARY KEY (`ID_FEEDBACK`),
  KEY `FK_ASSOCIATION_5` (`ID_CLI`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_MESSAGE` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` longtext,
  `EMAIL` longtext,
  `CONTENT_MESSAGE` text,
  `DATE_MESSAGE` datetime NOT NULL,
  `IS_ANSWERED` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_MESSAGE`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`ID_MESSAGE`, `NAME`, `EMAIL`, `CONTENT_MESSAGE`, `DATE_MESSAGE`, `IS_ANSWERED`) VALUES
(22, 'Nawfal', 'nawfalhiddi@gmail.com', 'Bonjour', '2018-06-21 14:56:26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `ID_NEWS` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL_NEWS` longtext,
  PRIMARY KEY (`ID_NEWS`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`ID_NEWS`, `EMAIL_NEWS`) VALUES
(8, 'nawfalhiddi@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `ID_NOTIF` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLI` int(11) NOT NULL,
  `CONTENT_NOTIF` longtext,
  `DATE_NOTIF` datetime DEFAULT NULL,
  `IS_READ` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_NOTIF`),
  KEY `FK_ASSOCIATION_3` (`ID_CLI`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`ID_NOTIF`, `ID_CLI`, `CONTENT_NOTIF`, `DATE_NOTIF`, `IS_READ`) VALUES
(88, 3, 'Votre réservation a été bien effectué.', '2018-06-21 15:02:36', 1),
(87, 3, 'Un versement d\'un montant de  15000 MAD a été effectué par vous. Votre nouveau solde est 15000 MAD', '2018-06-21 15:01:47', 1),
(86, 3, 'Nous avons bien reçu votre ticket, nous allons le traiter dans quelques minutes', '2018-06-21 14:59:14', 1),
(85, 3, 'Bienvenue chez Inovasist , veuillez attendre la validation de votre compte avant de passer votre première réservation', '2018-06-21 14:57:50', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `ID_OFFER` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE` longtext,
  `DURATION` longtext,
  PRIMARY KEY (`ID_OFFER`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offer`
--

INSERT INTO `offer` (`ID_OFFER`, `TYPE`, `DURATION`) VALUES
(1, 'Réservation sans abonnement', '1 DAY'),
(2, 'Réservation avec abonnement-3mois', '3 MONTHS'),
(3, 'Réservation avec abonnement-6mois', '6 MONTHS'),
(4, 'Réservation avec abonnement-12mois', '12 MONTHS');

-- --------------------------------------------------------

--
-- Structure de la table `reeservation_lines`
--

DROP TABLE IF EXISTS `reeservation_lines`;
CREATE TABLE IF NOT EXISTS `reeservation_lines` (
  `ID_RES_LINE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_RES` int(11) NOT NULL,
  `RESERVATION_DATE` date DEFAULT NULL,
  `HOURS_RES_LINE` int(11) DEFAULT NULL,
  `STAFF_RES_LINE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_RES_LINE`),
  KEY `FK_ASSOCIATION_9` (`ID_RES`)
) ENGINE=MyISAM AUTO_INCREMENT=421 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reeservation_lines`
--

INSERT INTO `reeservation_lines` (`ID_RES_LINE`, `ID_RES`, `RESERVATION_DATE`, `HOURS_RES_LINE`, `STAFF_RES_LINE`) VALUES
(420, 3, '2018-06-23', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `ID_RES` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLI` int(11) NOT NULL,
  `ID_STATE` int(11) NOT NULL,
  `ID_OFFER` int(11) NOT NULL,
  `START_DATE` date DEFAULT NULL,
  `FINAL_DATE` date DEFAULT NULL,
  `HOURS` int(11) DEFAULT NULL,
  `TOTAL_PRICE` int(11) DEFAULT NULL,
  `STAFF` int(11) DEFAULT NULL,
  `RESERVATION_TIME` time DEFAULT NULL,
  `EXIST_ANIMAL` tinyint(1) NOT NULL,
  `RESERVATION_ADRESS` longtext NOT NULL,
  PRIMARY KEY (`ID_RES`),
  KEY `FK_ASSOCIATION_7` (`ID_STATE`),
  KEY `FK_ASSOCIATION_8` (`ID_OFFER`),
  KEY `FK_ASSOCIATION_18` (`ID_CLI`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`ID_RES`, `ID_CLI`, `ID_STATE`, `ID_OFFER`, `START_DATE`, `FINAL_DATE`, `HOURS`, `TOTAL_PRICE`, `STAFF`, `RESERVATION_TIME`, `EXIST_ANIMAL`, `RESERVATION_ADRESS`) VALUES
(3, 3, 4, 1, '2018-06-23', '2018-06-23', 3, 210, 2, '10:00:00', 0, '22 RUE SANAWBAR AIN HAYANI TANGER ');

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `ID_STATE` int(11) NOT NULL AUTO_INCREMENT,
  `STATE_DISC` longtext,
  PRIMARY KEY (`ID_STATE`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `state`
--

INSERT INTO `state` (`ID_STATE`, `STATE_DISC`) VALUES
(1, 'EN COURS'),
(2, 'TERMINÉ'),
(3, 'En progression'),
(4, 'Validé');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT,
  `ID_STATE` int(11) NOT NULL,
  `ID_CLI` int(11) NOT NULL,
  `OBJECT_TICKET` longtext,
  `CONTENT_TICKET` text,
  `IS_ANSWERED` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_TICKET`),
  KEY `FK_ASSOCIATION_1` (`ID_STATE`),
  KEY `FK_ASSOCIATION_2` (`ID_CLI`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`ID_TICKET`, `ID_STATE`, `ID_CLI`, `OBJECT_TICKET`, `CONTENT_TICKET`, `IS_ANSWERED`) VALUES
(22, 2, 3, 'Problème ', 'je veux verifier mon compte maintenant', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLI` int(11) DEFAULT NULL,
  `ID_EMPLOYEE` int(11) DEFAULT NULL,
  `EMAIL_USER` varchar(255) DEFAULT NULL,
  `PASSWORD_USER` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  KEY `FK_ASSOCIATION_4` (`ID_CLI`),
  KEY `FK_ASSOCIATION_6` (`ID_EMPLOYEE`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `ID_CLI`, `ID_EMPLOYEE`, `EMAIL_USER`, `PASSWORD_USER`) VALUES
(44, NULL, 1, 'nawfalhaddi@gmail.com', '$2y$10$QfueofNomOQrDQ3BNsqCvuvGJ/C.fMcwL2Rq9bztIWfEzvVIXgYW.'),
(61, 3, NULL, 'nawfalhiddi@gmail.com', '$2y$10$e3tJ4sqdtjEh1CCWtA.6ReDRmyAJExoUmaQhmgAyFaipDxxMrk1Me');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_ASSOCIATION_18` FOREIGN KEY (`ID_CLI`) REFERENCES `client` (`ID_CLI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
