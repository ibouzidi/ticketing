-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 mars 2020 à 15:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

DROP TABLE IF EXISTS `etats`;
CREATE TABLE IF NOT EXISTS `etats` (
  `id` int(11) NOT NULL,
  `nom_etat` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom_etat`) VALUES
(1, 'ouvert'),
(2, 'en attente'),
(3, 'fermé');

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

DROP TABLE IF EXISTS `t_commentaire`;
CREATE TABLE IF NOT EXISTS `t_commentaire` (
  `COM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(255) NOT NULL,
  `COM_CONTENU` varchar(255) NOT NULL,
  `tic_ID` int(11) NOT NULL,
  PRIMARY KEY (`COM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `tic_ID`) VALUES
(1, '2020-03-20 16:29:44', 'Colin', 'On peut commenter ce ticket ouvert ?', 2),
(2, '2020-03-20 16:30:00', 'Julie', 'Oui, c\'est plutôt agréable !', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_ticket`
--

DROP TABLE IF EXISTS `t_ticket`;
CREATE TABLE IF NOT EXISTS `t_ticket` (
  `TIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIC_DATE` datetime NOT NULL,
  `TIC_TITRE` varchar(255) NOT NULL,
  `TIC_CONTENU` varchar(255) NOT NULL,
  `TIC_ETAT` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`TIC_ID`),
  KEY `TIC_ETAT` (`TIC_ETAT`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_ticket`
--

INSERT INTO `t_ticket` (`TIC_ID`, `TIC_DATE`, `TIC_TITRE`, `TIC_CONTENU`, `TIC_ETAT`) VALUES
(1, '2020-03-20 16:26:48', 'Ajout des tickets', 'Test des tickets', 2),
(2, '2020-03-20 16:28:56', 'Test des tickets', 'Ticket ouvert !', 1),
(3, '2020-03-20 16:29:07', 'Ticket fermé', 'Ce ticket est fermé !', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  ADD CONSTRAINT `t_ticket_ibfk_1` FOREIGN KEY (`TIC_ETAT`) REFERENCES `etats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
