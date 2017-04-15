-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 15 Avril 2017 à 12:31
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetbde`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `idActivity` int(11) NOT NULL,
  `dateActivity` date DEFAULT NULL,
  `price` float DEFAULT NULL,
  `recurrence` varchar(100) NOT NULL DEFAULT 'Only once',
  `description` varchar(200) DEFAULT NULL,
  `album` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`idActivity`, `dateActivity`, `price`, `recurrence`, `description`, `album`) VALUES
(1, '2016-11-15', 25, 'once', 'paintball with cesi team', NULL),
(2, '2017-04-21', 8, 'Only once', 'BDE Party', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `idAlbum` int(11) NOT NULL,
  `title` varchar(25) DEFAULT 'All Pictures'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`idAlbum`, `title`) VALUES
(1, '2016-11-15 Paintball');

-- --------------------------------------------------------

--
-- Structure de la table `comactivity`
--

CREATE TABLE `comactivity` (
  `idCom` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `dateCom` datetime DEFAULT CURRENT_TIMESTAMP,
  `commentary` varchar(100) NOT NULL,
  `idActivity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `comactivity`
--

INSERT INTO `comactivity` (`idCom`, `idMember`, `dateCom`, `commentary`, `idActivity`) VALUES
(1, 1, '2016-11-18 15:26:13', 'Was a very fun activity ! We should do it again', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compicture`
--

CREATE TABLE `compicture` (
  `idCom` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `dateCom` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commentary` varchar(100) NOT NULL,
  `idPicture` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `compicture`
--

INSERT INTO `compicture` (`idCom`, `idMember`, `dateCom`, `commentary`, `idPicture`) VALUES
(1, 1, '2017-04-14 16:24:00', 'Hi, this the first com test', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `display`
--

CREATE TABLE `display` (
  `idActivity` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `display`
--

INSERT INTO `display` (`idActivity`, `idAlbum`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `idea`
--

CREATE TABLE `idea` (
  `idIdea` int(11) NOT NULL,
  `title` varchar(25) NOT NULL DEFAULT 'Proposition',
  `description` varchar(150) DEFAULT NULL,
  `votes` int(11) DEFAULT '0',
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `idea`
--

INSERT INTO `idea` (`idIdea`, `title`, `description`, `votes`, `idMembre`) VALUES
(1, 'BDE Party', 'A party in a bar with anyone who want to hang out', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `idMember` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `surname` varchar(15) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `permissionLevel` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`idMember`, `name`, `surname`, `avatar`, `email`, `role`, `password`, `permissionLevel`) VALUES
(1, 'Etienne', 'Duverney', 'C:\\Users\\Adalon\\Pictures\\Random\\sphere.png', 'etienne.duverney@viacesi.fr', 'bde', 'viacesi', 3),
(2, 'Test', 'TEST', NULL, 'test.test@viacesi.fr', 'bde', 'viacesi', 3),
(3, 'test2', 'TEST2', NULL, 'test2.test2@viacesi.fr', 'staff', 'viacesi', 2);

--
-- Déclencheurs `members`
--
DELIMITER $$
CREATE TRIGGER `after_insert_member` AFTER INSERT ON `members` FOR EACH ROW INSERT INTO has_permission (idMember, idPermission) VALUES (LAST_INSERT_ID(),'1')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `idPicture` int(11) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `idAlbum` int(11) DEFAULT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `pictures`
--

INSERT INTO `pictures` (`idPicture`, `url`, `idAlbum`, `idMembre`) VALUES
(1, 'C:\\Users\\Adalon\\Desktop\\Prosit\\PROJET\\Projet Web\\Projet-Web\\albums\\2016-11-15 Paintball\\picture1.jpg', 1, 1),
(2, 'C:\\Users\\Adalon\\Desktop\\Prosit\\PROJET\\Projet Web\\Projet-Web\\albums\\2016-11-15 Paintball\\picture2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

CREATE TABLE `shop` (
  `idProduit` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `shop`
--

INSERT INTO `shop` (`idProduit`, `name`, `picture`, `price`, `quantity`) VALUES
(1, 'Sweat', '', 35, 22);

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

CREATE TABLE `subscribe` (
  `idMembre` int(11) NOT NULL,
  `idActivity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `subscribe`
--

INSERT INTO `subscribe` (`idMembre`, `idActivity`) VALUES
(1, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idActivity`);

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Index pour la table `comactivity`
--
ALTER TABLE `comactivity`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `FK_comActivity_idActivity` (`idActivity`);

--
-- Index pour la table `compicture`
--
ALTER TABLE `compicture`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `FK_comPicture_idPicture` (`idPicture`);

--
-- Index pour la table `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`idActivity`,`idAlbum`),
  ADD KEY `FK_display_idAlbum` (`idAlbum`);

--
-- Index pour la table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`idIdea`),
  ADD KEY `FK_idea_idMembre` (`idMembre`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idMember`),
  ADD UNIQUE KEY `idMembre` (`idMember`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`idPicture`),
  ADD KEY `FK_Pictures_idAlbum` (`idAlbum`),
  ADD KEY `FK_Pictures_idMembre` (`idMembre`);

--
-- Index pour la table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`idMembre`,`idActivity`),
  ADD KEY `FK_subscribe_idActivity` (`idActivity`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `comactivity`
--
ALTER TABLE `comactivity`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `compicture`
--
ALTER TABLE `compicture`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `idea`
--
ALTER TABLE `idea`
  MODIFY `idIdea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `idMember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `idPicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `shop`
--
ALTER TABLE `shop`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comactivity`
--
ALTER TABLE `comactivity`
  ADD CONSTRAINT `FK_comActivity_idActivity` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`idActivity`);

--
-- Contraintes pour la table `compicture`
--
ALTER TABLE `compicture`
  ADD CONSTRAINT `FK_comPicture_idPicture` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`idPicture`);

--
-- Contraintes pour la table `display`
--
ALTER TABLE `display`
  ADD CONSTRAINT `FK_display_idActivity` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`idActivity`),
  ADD CONSTRAINT `FK_display_idAlbum` FOREIGN KEY (`idAlbum`) REFERENCES `album` (`idAlbum`);

--
-- Contraintes pour la table `idea`
--
ALTER TABLE `idea`
  ADD CONSTRAINT `FK_idea_idMembre` FOREIGN KEY (`idMembre`) REFERENCES `members` (`idMember`);

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `FK_Pictures_idAlbum` FOREIGN KEY (`idAlbum`) REFERENCES `album` (`idAlbum`),
  ADD CONSTRAINT `FK_Pictures_idMembre` FOREIGN KEY (`idMembre`) REFERENCES `members` (`idMember`);

--
-- Contraintes pour la table `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `FK_subscribe_idActivity` FOREIGN KEY (`idActivity`) REFERENCES `activity` (`idActivity`),
  ADD CONSTRAINT `FK_subscribe_idMembre` FOREIGN KEY (`idMembre`) REFERENCES `members` (`idMember`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
