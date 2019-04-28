-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 28 avr. 2019 à 10:22
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogocbd`
--
CREATE DATABASE IF NOT EXISTS `blogocbd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blogocbd`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime DEFAULT NULL,
  `createuser` int(11) NOT NULL,
  `updateuser` int(11) NOT NULL,
  `validuser` int(11) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `createdate`, `updatedate`, `createuser`, `updateuser`, `validuser`, `valid`, `postid`) VALUES
(19, '1er commentaire', '2019-04-27 19:30:11', '2019-04-27 19:30:11', 33, 33, NULL, 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` longblob NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime DEFAULT NULL,
  `publishdate` datetime DEFAULT NULL,
  `createuser` int(11) NOT NULL,
  `updateuser` varchar(100) NOT NULL,
  `publishuser` varchar(100) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapo`, `content`, `createdate`, `updatedate`, `publishdate`, `createuser`, `updateuser`, `publishuser`, `published`) VALUES
(13, 'CrÃ©ez votre premier blog en PHP', 'blog en PHP', 0xc3876120792065737420766f7573206176657a2073617574c3a9206c65207061732021204c65206d6f6e64652064752064c3a976656c6f7070656d656e74207765622061766563205048502065737420c3a020706f7274c3a965206465206d61696e20657420766f7573206176657a206265736f696e206465207669736962696c6974c3a920706f757220706f75766f697220636f6e7661696e63726520766f732066757475727320656d706c6f79657572732f636c69656e747320656e20756e207365756c207265676172642e20566f757320c3aa7465732064c3a976656c6f7070657572205048502c20696c2065737420646f6e632074656d7073206465206d6f6e7472657220766f732074616c656e747320617520747261766572732064e28099756e20626c6f6720c3a020766f7320636f756c657572732e, '2019-04-27 19:29:15', '2019-04-27 19:29:15', NULL, 32, '32', '', 1),
(14, 'RENNES, DES NERFS POUR LA GUERRE', 'COUPE DE FRANCE // FINALE // RENNES-PSG (2-2, 6-5 TAB)', 0x456e2073e28099696d706f73616e7420617520626f75742064752073757370656e736520666163652061752050534720656e2066696e616c65206465206c6120436f757065206465204672616e63652028322d322c20362d352c20746162292c206c652053746164652052656e6e616973206573742076656e75207061726163686576657220756e6520736169736f6e2064c3a96ac3a02072c3a9757373696520646520626f757420656e20626f75742e204574206ce28099696e6772c3a96469656e74206d797374c3a872652064652063652073756363c3a8732c2063e28099657374206c6120666f726365206d656e74616c6520646f6e74206c657320427265746f6e73206f6e7420737520666169726520706172742064616e73206c6573206d6f6d656e7473206c657320706c757320646966666963696c65732e, '2019-04-28 09:38:00', '2019-04-28 09:38:00', NULL, 32, '32', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `contact`, `usertype`, `passwd`, `createdate`, `updatedate`) VALUES
(32, 'admin', 'Kouadio Rodrigue', 'N\'Goran', 'drigos1er@yahoo.fr', '0022558099212', 'administrator', '$2y$10$fq/F7HSLQi8pXl5Dd1c6B.s4DwP3b8u1OoYFtc.mWg5LkiIiI0gy2', '2019-04-27 18:50:46', '2019-04-27 18:50:46'),
(33, 'victoire', 'Adou', 'Victoire', 'adou@yahoo.fr', '02010203', 'guest', '$2y$10$0.huK0MGAEJUcL84aDqCleqQNHmNOUJP4uXK2QASTpq94c2Me2i9i', '2019-04-27 19:21:47', '2019-04-27 19:21:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `createuser` (`createuser`),
  ADD KEY `updateuser` (`updateuser`),
  ADD KEY `validuser` (`validuser`),
  ADD KEY `postid` (`postid`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`createuser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`updateuser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`validuser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
