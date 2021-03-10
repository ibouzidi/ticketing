-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 mars 2021 à 23:02
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ticketing`
--

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` int(11) NOT NULL,
  `nom_etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom_etat`) VALUES
(1, 'Ouvert'),
(2, 'Fermé'),
(3, 'En attente'),
(4, 'Stand by'),
(7, 'test'),
(8, 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(255) NOT NULL,
  `COM_CONTENU` varchar(255) NOT NULL,
  `tic_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `tic_ID`) VALUES
(3, '2020-11-06 10:38:14', 'fbd', 'fgerg', 3),
(4, '2020-11-06 10:38:18', 'f', ' gfb', 3),
(5, '2020-11-06 10:38:24', 'aa', 'aaaa', 3),
(6, '2020-11-19 10:32:30', 'sc', 'sc', 11),
(7, '2020-11-19 10:32:48', 'lkcdsjkvc', 'jwdk,vkds', 11),
(8, '2020-11-30 15:39:43', 'idris', 'ahh walah sa se fait pas, tu abuse', 23),
(9, '2020-11-30 15:40:43', 'yanis', 't vraiment un gros chien t\'aurais pu cacher les preuves\r\n', 23);

-- --------------------------------------------------------

--
-- Structure de la table `t_ticket`
--

CREATE TABLE `t_ticket` (
  `TIC_ID` int(11) NOT NULL,
  `TIC_DATE` datetime NOT NULL,
  `TIC_TITRE` varchar(255) NOT NULL,
  `TIC_CONTENU` varchar(255) NOT NULL,
  `TIC_ETAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_ticket`
--

INSERT INTO `t_ticket` (`TIC_ID`, `TIC_DATE`, `TIC_TITRE`, `TIC_CONTENU`, `TIC_ETAT`) VALUES
(1, '2020-03-20 16:26:48', 'Maintenance', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 1),
(3, '2020-12-16 15:07:56', 'Mise en place de FIX !', 'Mise en place de FIX !', 2),
(25, '2020-12-16 15:07:50', 'Le popover ne bouge pas !!', 'Le popover ne bouge pas !!!', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`COM_ID`);

--
-- Index pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  ADD PRIMARY KEY (`TIC_ID`),
  ADD KEY `TIC_ETAT` (`TIC_ETAT`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  MODIFY `TIC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
