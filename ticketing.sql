-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 mai 2021 à 20:32
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom_etat`) VALUES
(3, 'En attente'),
(2, 'Fermer'),
(1, 'Ouvert'),
(48, 'SEASON PASS');

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
(79, '2021-05-26 17:36:36', 'azfdaz', 'fzafazf', 195),
(80, '2021-05-26 17:45:37', 'gre', 'ge', 196);

-- --------------------------------------------------------

--
-- Structure de la table `t_ticket`
--

CREATE TABLE `t_ticket` (
  `TIC_ID` int(11) NOT NULL,
  `TIC_DATE` datetime NOT NULL,
  `TIC_TITRE` varchar(255) NOT NULL,
  `TIC_AUTEUR` varchar(30) NOT NULL,
  `TIC_CONTENU` varchar(255) NOT NULL,
  `TIC_ETAT` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_ticket`
--

INSERT INTO `t_ticket` (`TIC_ID`, `TIC_DATE`, `TIC_TITRE`, `TIC_AUTEUR`, `TIC_CONTENU`, `TIC_ETAT`) VALUES
(194, '2021-05-26 13:04:13', 'Sed omnis officia ev', 'idris', 'Tempore qui et esse', 3),
(195, '2021-05-26 13:04:06', 'A ea in vel eu corpo', 'Lellouche', 'Corporis pariatur S', 1),
(196, '2021-05-26 13:03:30', 'Laboris sit porro a', 'Lucas', 'Dignissimos cupidita', 2),
(199, '2021-05-26 17:56:10', 'Nesciunt optio ame', 'Aut blanditiis liber', 'Fuga Illo sunt mini', 3),
(200, '2021-05-26 17:56:14', 'Dolorem et enim mini', 'Deserunt adipisicing', 'Harum maxime cillum ', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nomEtatUnique` (`nom_etat`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `tic_ID` (`tic_ID`);

--
-- Index pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  ADD PRIMARY KEY (`TIC_ID`),
  ADD KEY `TIC_ETAT` (`TIC_ETAT`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  MODIFY `TIC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `t_commentaire_ibfk_1` FOREIGN KEY (`tic_ID`) REFERENCES `t_ticket` (`TIC_ID`);

--
-- Contraintes pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  ADD CONSTRAINT `t_ticket_ibfk_1` FOREIGN KEY (`TIC_ETAT`) REFERENCES `etats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
