-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 jan. 2020 à 17:57
-- Version du serveur :  5.7.24
-- Version de PHP :  7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `toolboxdofus`
--

-- --------------------------------------------------------

--
-- Structure de la table `serveurs`
--

DROP TABLE IF EXISTS `serveurs`;
CREATE TABLE IF NOT EXISTS `serveurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_serv` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `serveurs`
--

INSERT INTO `serveurs` (`id`, `nom_serv`) VALUES
(1, 'Aermyne'),
(2, 'Agride'),
(3, 'Aguabrial'),
(4, 'Allister'),
(5, 'Alma'),
(6, 'Amayiro'),
(7, 'Bolgrot'),
(8, 'Bowisse'),
(9, 'Brumaire'),
(10, 'Buhorado'),
(11, 'Crocoburio'),
(12, 'Danathor'),
(13, 'Dark Vlad'),
(14, 'Djaul'),
(15, 'Domen'),
(16, 'Ereziah'),
(17, 'Farle'),
(18, 'Goultard'),
(19, 'Hecate'),
(20, 'Hel Munster'),
(21, 'Helioboros'),
(22, 'Helsephine'),
(23, 'Hyrkul'),
(24, 'Jiva'),
(25, 'Kuri'),
(26, 'Li Crounch'),
(27, 'Lily'),
(28, 'Maimane'),
(29, 'Many'),
(30, 'Menalt'),
(31, 'Mylaise'),
(32, 'Nehra'),
(33, 'Nomekop'),
(34, 'Oto Mustam'),
(35, 'Otomaï'),
(36, 'Pouchecot'),
(37, 'Raval'),
(38, 'Rosal'),
(39, 'Rushu'),
(40, 'Rykke Errel'),
(41, 'Shika'),
(42, 'Silouate'),
(43, 'Silvosse'),
(44, 'Solar'),
(45, 'Spiritia'),
(46, 'Sumens'),
(47, 'Test'),
(48, 'Ténèbres'),
(49, 'Ulette'),
(50, 'Vil Smisse'),
(51, 'Zatoïshwan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
