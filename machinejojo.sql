-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 jan. 2018 à 13:10
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `coffee_machine`
--

-- --------------------------------------------------------

--
-- Structure de la table `drinks`
--

DROP TABLE IF EXISTS `drinks`;
CREATE TABLE IF NOT EXISTS `drinks` (
  `code` char(3) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `drinks`
--

INSERT INTO `drinks` (`code`, `name`, `price`) VALUES
('cho', 'chocolate', 70),
('dbl', 'double expresso', 90),
('exp', 'expresso', 50),
('lat', 'latte', 100),
('tea', 'tea', 60);

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `quantity`) VALUES
(1, 'water', 32),
(2, 'coffee', 43),
(3, 'milk', 89),
(4, 'cocoa', 89),
(5, 'tea', 100),
(6, 'sugar', 64);

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `drinks_code` char(3) NOT NULL,
  `ingredients_id` int(11) NOT NULL,
  `recipeqty` int(11) DEFAULT NULL,
  PRIMARY KEY (`drinks_code`,`ingredients_id`),
  KEY `fk_drinks_has_ingredients_ingredients1_idx` (`ingredients_id`),
  KEY `fk_drinks_has_ingredients_drinks_idx` (`drinks_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`drinks_code`, `ingredients_id`, `recipeqty`) VALUES
('cho', 1, 1),
('cho', 3, 1),
('cho', 4, 1),
('dbl', 1, 2),
('dbl', 2, 2),
('exp', 1, 1),
('exp', 2, 1),
('tea', 1, 2),
('tea', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `drinks_code` char(3) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sugar` tinyint(5) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`,`drinks_code`),
  KEY `fk_drinks_has_ingredients_drinks1_idx` (`drinks_code`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sales`
--

INSERT INTO `sales` (`drinks_code`, `id`, `sugar`, `date`) VALUES
('cho', 121, 2, '2018-01-09 16:24:31'),
('cho', 122, 0, '2018-01-09 16:25:55'),
('cho', 123, 0, '2018-01-09 16:32:26'),
('cho', 124, 0, '2018-01-09 16:33:03'),
('exp', 125, 1, '2018-01-09 16:33:15'),
('exp', 126, 1, '2018-01-09 16:49:00'),
('exp', 127, 1, '2018-01-09 16:51:18'),
('exp', 128, 1, '2018-01-09 16:52:08'),
('exp', 129, 1, '2018-01-09 16:52:35'),
('exp', 130, 1, '2018-01-09 16:52:43'),
('cho', 131, 2, '2018-01-09 16:53:50'),
('cho', 132, 2, '2018-01-09 16:54:44'),
('cho', 133, 2, '2018-01-09 16:56:01'),
('lat', 134, 1, '2018-01-09 16:56:06'),
('lat', 135, 1, '2018-01-09 16:56:23'),
('exp', 136, 0, '2018-01-09 16:56:27'),
('exp', 137, 0, '2018-01-09 16:57:09'),
('dbl', 138, 3, '2018-01-09 16:57:16'),
('dbl', 139, 3, '2018-01-09 16:57:32'),
('exp', 140, 1, '2018-01-09 16:57:37'),
('exp', 141, 1, '2018-01-09 17:01:52'),
('exp', 142, 2, '2018-01-09 17:01:56'),
('dbl', 143, 1, '2018-01-09 17:02:07'),
('cho', 144, 1, '2018-01-09 17:06:14'),
('cho', 145, 1, '2018-01-09 17:26:25'),
('cho', 146, 2, '2018-01-09 17:26:30');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_drinks_has_ingredients_drinks` FOREIGN KEY (`drinks_code`) REFERENCES `drinks` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_drinks_has_ingredients_ingredients1` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_drinks_has_ingredients_drinks1` FOREIGN KEY (`drinks_code`) REFERENCES `drinks` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
