-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 mai 2021 à 13:05
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
(1, 'Ouvert');

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
(56, '2021-05-24 15:52:58', 'ergerg', 'ergergerger', 78),
(57, '2021-05-24 15:53:01', 'erger', 'gergergergerg', 78),
(58, '2021-05-24 15:53:03', 'ergergerg', 'erg', 78),
(59, '2021-05-24 15:59:43', 'ezfezfefefefef', 'zefzefzefzefzefzefzeffezzefzefzefezfezfezfezfezfefzzefzefzefzefzefzeffzezfzefzefzefefz', 83),
(60, '2021-05-24 15:59:46', 'zefzef', 'zefzef', 83),
(61, '2021-05-24 15:59:49', 'zefzefz', 'efzefz', 83),
(62, '2021-05-24 15:59:51', 'zfzef', 'zefzef', 83),
(63, '2021-05-24 15:59:54', 'zefze', 'fzefzef', 83);

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
(196, '2021-05-26 13:03:30', 'Laboris sit porro a', 'Lucas', 'Dignissimos cupidita', 2);

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
  ADD PRIMARY KEY (`COM_ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `t_ticket`
--
ALTER TABLE `t_ticket`
  MODIFY `TIC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

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
