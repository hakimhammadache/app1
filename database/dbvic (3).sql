-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 oct. 2020 à 16:11
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbvic`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien_immobile`
--

CREATE TABLE `bien_immobile` (
  `id` int(11) NOT NULL,
  `nom_bien` varchar(50) DEFAULT NULL,
  `id_etab` int(11) DEFAULT NULL,
  `id_type_bien_im` int(11) DEFAULT NULL,
  `id_etat_ph` int(11) DEFAULT NULL,
  `id_pci` int(11) DEFAULT NULL,
  `id_type_amm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bien_immobile`
--

INSERT INTO `bien_immobile` (`id`, `nom_bien`, `id_etab`, `id_type_bien_im`, `id_etat_ph`, `id_pci`, `id_type_amm`) VALUES
(1, 'chaise', 5, 3, 3, 2, 1),
(2, 'matlas', 6, 3, 3, 3, 2),
(3, 'sourie', 5, 2, 2, 2, 3),
(9, 'chaise', 2, 3, 4, 2, 1),
(10, 'pc', 2, 2, 4, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `bien_mobile`
--

CREATE TABLE `bien_mobile` (
  `id` int(11) NOT NULL,
  `nom_bien` varchar(50) DEFAULT NULL,
  `numero` varchar(50) NOT NULL,
  `id_etab` int(11) DEFAULT NULL,
  `id_type_mob` int(11) DEFAULT NULL,
  `id_etat_ph` int(11) DEFAULT NULL,
  `id_pci` int(11) DEFAULT NULL,
  `id_type_amm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bien_mobile`
--

INSERT INTO `bien_mobile` (`id`, `nom_bien`, `numero`, `id_etab`, `id_type_mob`, `id_etat_ph`, `id_pci`, `id_type_amm`) VALUES
(1, 'bienmobile225', '12545842', 2, 2, 5, 3, 3),
(2, 'logan', '132456', 5, 1, 3, 3, 3),
(3, 'Masters', '789456', 2, 2, 2, 2, 3),
(4, 'laguna', '123987', 2, 1, 7, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id` int(11) NOT NULL,
  `nom_commune` varchar(50) DEFAULT NULL,
  `code_postal` varchar(50) DEFAULT NULL,
  `id_daira` int(11) DEFAULT NULL,
  `id_destricte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id`, `nom_commune`, `code_postal`, `id_daira`, `id_destricte`) VALUES
(1, 'commune 1', '111', 2, 1),
(2, 'commune 2', '211', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `daira`
--

CREATE TABLE `daira` (
  `id` int(11) NOT NULL,
  `nom_daira` varchar(50) DEFAULT NULL,
  `id_wilaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `daira`
--

INSERT INTO `daira` (`id`, `nom_daira`, `id_wilaya`) VALUES
(1, 'daira 1', 2),
(2, 'daira 2', 2),
(4, 'daira 4', 2),
(5, 'daira 11', 3);

-- --------------------------------------------------------

--
-- Structure de la table `destricte`
--

CREATE TABLE `destricte` (
  `id` int(11) NOT NULL,
  `nom_destricte` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destricte`
--

INSERT INTO `destricte` (`id`, `nom_destricte`) VALUES
(1, 'Destricte 1'),
(2, 'Destricte 2'),
(3, 'Destricte 3');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `nom_doc` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `tmp_name` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `pathfile` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT curtime(),
  `id_type_doc` int(11) DEFAULT NULL,
  `id_etab` int(11) DEFAULT NULL,
  `id_bien_mob` int(11) DEFAULT NULL,
  `id_terrain` int(11) DEFAULT NULL,
  `id_bien_imob` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id`, `nom_doc`, `name`, `type`, `tmp_name`, `size`, `pathfile`, `created_at`, `id_type_doc`, `id_etab`, `id_bien_mob`, `id_terrain`, `id_bien_imob`) VALUES
(15, 'doc900000', 'corrige_1.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpB275.tmp', 163156, 'C:\\xampp\\htdocs\\SNTF\\files\\doc1.pdf', '2020-09-14 02:44:41', 1, 5, NULL, NULL, NULL),
(16, '12345doc', 'Exercices Solutions.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php4EA.tmp', 333134, 'C:\\xampp\\htdocs\\SNTF\\files\\rrrrrrr.pdf', '2020-09-14 02:45:32', 2, 6, NULL, NULL, NULL),
(18, 'carrte-144', '1.Rappel.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php69BD.tmp', 282110, 'C:\\xampp\\htdocs\\SNTF\\files\\carrte-144.pdf', '2020-09-15 23:37:28', 1, 1, NULL, NULL, NULL),
(20, 'carrte-1', '1.Rappel.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php655B.tmp', 282110, 'C:\\xampp\\htdocs\\SNTF\\files\\carrte-1.pdf', '2020-09-15 23:40:44', 1, 3, NULL, NULL, NULL),
(21, 'carrte-userrinventaire', '1.Rappel.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpBA04.tmp', 282110, 'C:\\xampp\\htdocs\\SNTF\\files\\carrte-userrinventaire.', '2020-09-16 00:06:13', 1, 3, NULL, NULL, NULL),
(22, 'carrte-userrinventaire12', '1.Rappel.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php9B45.tmp', 282110, 'C:\\xampp\\htdocs\\SNTF\\files\\carrte-userrinventaire1', '2020-09-16 00:12:38', 1, 1, NULL, NULL, NULL),
(23, 'rrrrrrr65632', '1.Rappel.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpAA9E.tmp', 282110, 'C:\\xampp\\htdocs\\SNTF\\files\\rrrrrrr65632.pdf', '2020-09-16 00:14:53', 1, 1, NULL, NULL, NULL),
(24, 'rrrrrrr99999999', '1.Rappel.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php2E03.tmp', 282110, 'C:\\xampp\\htdocs\\SNTF\\files\\rrrrrrr99999999.pdf', '2020-09-16 00:16:32', 1, 1, NULL, NULL, NULL),
(26, 'plan', 'MEMOIRE.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php587D.tmp', 5315848, 'C:\\xampp\\htdocs\\SNTF\\files\\plan.pdf', '2020-09-30 19:33:54', 3, NULL, NULL, NULL, NULL),
(27, 'plan etablissement', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpC44A.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\plan etablissement.pdf', '2020-09-30 19:40:53', 3, NULL, NULL, NULL, NULL),
(29, 'rapport banquaire', 'MEMOIRE.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php9544.tmp', 5315848, 'C:\\xampp\\htdocs\\SNTF\\files\\rapport banquaire.pdf', '2020-10-03 00:28:19', 3, NULL, NULL, NULL, NULL),
(31, 'doc5689', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php9117.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\doc3.pdf', '2020-10-03 00:33:42', 8, 1, NULL, NULL, NULL),
(33, 'assurance', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpAC1C.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\assurance.pdf', '2020-10-03 00:42:33', 5, NULL, NULL, NULL, NULL),
(34, 'plan etablissement55', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpC92E.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\plan etablissement55.pd', '2020-10-03 22:41:03', 8, 4, NULL, NULL, NULL),
(35, 'boumeredes', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpAA5F.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\boumeredes.pdf', '2020-10-04 00:02:50', 5, NULL, NULL, NULL, NULL),
(36, 'idir', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpDEF6.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\idir.pdf', '2020-10-04 00:11:47', 3, NULL, NULL, NULL, NULL),
(37, 'doc1', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php442F.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\doc1.pdf', '2020-10-04 02:41:40', 1, NULL, NULL, NULL, NULL),
(42, 'ouedai', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php1AF1.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\ouedaissi.pdf', '2020-10-04 12:59:42', 3, 2, 2, NULL, NULL),
(43, 'carte-grise5555', 'MEMOIRE.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php4EAC.tmp', 5315848, 'C:\\xampp\\htdocs\\SNTF\\files\\carte-grise5555.pdf', '2020-10-04 13:19:35', 2, 2, 1, NULL, NULL),
(44, 'tableau', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php7A0E.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\tableau.pdf', '2020-10-04 15:37:25', 8, 1, NULL, NULL, NULL),
(45, 'hakim', 'BDD_sntf.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php7BFE.tmp', 204562, 'C:\\xampp\\htdocs\\SNTF\\files\\hakim.pdf', '2020-10-04 15:38:30', 4, 1, NULL, NULL, NULL),
(46, 'hakimsss', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php7D9C.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\hakimsss.pdf', '2020-10-04 15:40:41', 8, 1, NULL, NULL, NULL),
(47, 'hakims', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpA1F5.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\hakims.pdf', '2020-10-04 15:46:18', 5, 1, NULL, NULL, NULL),
(48, 'victors', 'BDD_sntf.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php3E69.tmp', 204562, 'C:\\xampp\\htdocs\\SNTF\\files\\victor.pdf', '2020-10-04 15:56:48', 8, 2, NULL, NULL, NULL),
(49, 'plan etablissement viv', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpFD12.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\plan etablissement viv.', '2020-10-04 15:58:43', 5, 2, NULL, NULL, NULL),
(50, 'hakimsssssssssssssss', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php1EAB.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\hakimsssssssssssssss.pd', '2020-10-04 16:01:02', 5, 2, NULL, NULL, NULL),
(52, 'tahchat', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php3A25.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\tahchat.pdf', '2020-10-04 16:04:26', 4, 2, NULL, NULL, NULL),
(53, 'carte-grisee12', 'cas_utilisation_admin.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php4CEF.tmp', 289875, 'C:\\xampp\\htdocs\\SNTF\\files\\carte-grisee12.pdf', '2020-10-04 16:08:53', 5, 2, NULL, NULL, NULL),
(60, 'ghghghghghg', '13. Guide mise en place d\'un SIG.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpBD79.tmp', 6457681, 'C:\\xampp\\htdocs\\SNTF\\files\\ghghghghghg.pdf', '2020-10-04 18:17:09', 5, 2, NULL, NULL, NULL),
(61, 'hakims123', '2011LiJing.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpFE3E.tmp', 1280324, 'C:\\xampp\\htdocs\\SNTF\\files\\hakims123.pdf', '2020-10-04 18:20:42', 1, 2, NULL, NULL, NULL),
(62, 'hlkjgfd', '13. Guide mise en place d\'un SIG.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php3651.tmp', 6457681, 'C:\\xampp\\htdocs\\SNTF\\files\\hlkjgfd.pdf', '2020-10-04 18:22:02', 5, 2, 1, NULL, NULL),
(63, '845623', '2013_DELIZY.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php436D.tmp', 3219373, 'C:\\xampp\\htdocs\\SNTF\\files\\845623.pdf', '2020-10-04 18:23:11', 5, 2, 1, NULL, NULL),
(64, 'chifa', '2013_DELIZY.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php36EC.tmp', 3219373, 'C:\\xampp\\htdocs\\SNTF\\files\\chifa.pdf', '2020-10-04 18:26:24', 5, 2, 1, NULL, NULL),
(65, 'hakims2', 'oracle-mysql-comparison-13-638.jpg', 'image/jpeg', 'C:\\xampp\\tmp\\php8C5D.tmp', 40880, 'C:\\xampp\\htdocs\\SNTF\\files\\hakims2.pdf', '2020-10-04 19:32:19', 5, 1, 1, NULL, NULL),
(66, '333', '2013_DELIZY.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php8832.tmp', 3219373, 'C:\\xampp\\htdocs\\SNTF\\files\\333.pdf', '2020-10-04 19:33:23', 5, 1, 1, NULL, NULL),
(67, 'samir', '2011LiJing.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php9A40.tmp', 1280324, 'C:\\xampp\\htdocs\\SNTF\\files\\samir.pdf', '2020-10-04 19:34:33', 5, 2, 1, NULL, NULL),
(68, 'sa', '1_M6kMyvafXRzgmwT4xi4xSQ (1).png', 'image/png', 'C:\\xampp\\tmp\\php704.tmp', 26396, 'C:\\xampp\\htdocs\\SNTF\\files\\sa.pdf', '2020-10-04 19:35:01', 1, 2, 1, NULL, NULL),
(69, 'sousou', '2011LiJing.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php9726.tmp', 1280324, 'C:\\xampp\\htdocs\\SNTF\\files\\sousou.pdf', '2020-10-04 23:09:44', 5, 2, 1, NULL, NULL),
(70, 'facture', '2011LiJing.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php7707.tmp', 1280324, 'C:\\xampp\\htdocs\\SNTF\\files\\facture.pdf', '2020-10-05 00:30:24', 5, 1, NULL, NULL, 9),
(72, 'facture12', '2013_DELIZY.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php1EE4.tmp', 3219373, 'C:\\xampp\\htdocs\\SNTF\\files\\facture12.pdf', '2020-10-05 00:48:36', 5, 2, NULL, NULL, 9),
(73, 'facture14', '2013_DELIZY.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpF5B9.tmp', 3219373, 'C:\\xampp\\htdocs\\SNTF\\files\\facture14.pdf', '2020-10-05 00:53:53', 2, 2, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Structure de la table `etabissement`
--

CREATE TABLE `etabissement` (
  `id` int(11) NOT NULL,
  `nom_etab` varchar(50) DEFAULT NULL,
  `localisation_lng` varchar(50) DEFAULT NULL,
  `localisation_lat` varchar(50) DEFAULT NULL,
  `id_commune` int(11) DEFAULT NULL,
  `id_natur_etab` int(11) DEFAULT NULL,
  `id_etat_ph` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etabissement`
--

INSERT INTO `etabissement` (`id`, `nom_etab`, `localisation_lng`, `localisation_lat`, `id_commune`, `id_natur_etab`, `id_etat_ph`) VALUES
(1, ' A.M.F H-DAY ', '3.103105', '36.743345', 1, 2, 1),
(2, 'Boumerdes', '3.473491', '36.753367', 1, 1, 1),
(3, 'Direction Générale de la SNTF', '3.053432', '36.768830', 1, 3, 1),
(4, 'Thenia', '3.552949', '36.725251', 1, 1, 1),
(5, ' Agha', '3.0572', '36.7679', 1, 1, 1),
(6, ' Tizi Ouzou', '4.034271', '36.709629', 2, 2, 5),
(7, ' Isser', '3.664966', '36.730435', 2, 2, 5),
(16, 'kolea', '2.769928', '36.627652', 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etat_physique`
--

CREATE TABLE `etat_physique` (
  `id` int(11) NOT NULL,
  `libelle_eta_ph` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat_physique`
--

INSERT INTO `etat_physique` (`id`, `libelle_eta_ph`) VALUES
(4, 'Défectueux'),
(1, 'En marche'),
(2, 'En Panne'),
(7, 'En Reparation'),
(3, 'Endommagé '),
(5, 'Oublié '),
(8, 'Perdu'),
(6, 'Vendu');

-- --------------------------------------------------------

--
-- Structure de la table `etat_terrain`
--

CREATE TABLE `etat_terrain` (
  `id` int(11) NOT NULL,
  `ibelle_etat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat_terrain`
--

INSERT INTO `etat_terrain` (`id`, `ibelle_etat`) VALUES
(1, 'etat terrain 1'),
(2, 'etat terrain 2'),
(3, 'etat terrain 3');

-- --------------------------------------------------------

--
-- Structure de la table `fiche_signalisation`
--

CREATE TABLE `fiche_signalisation` (
  `id` int(11) NOT NULL,
  `localisation_lng_fiche` varchar(50) DEFAULT NULL,
  `localisation_lat_fiche` varchar(50) DEFAULT NULL,
  `caractériqtique` varchar(50) DEFAULT NULL,
  `id_etat_ph` int(11) DEFAULT NULL,
  `id_voie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fiche_signalisation`
--

INSERT INTO `fiche_signalisation` (`id`, `localisation_lng_fiche`, `localisation_lat_fiche`, `caractériqtique`, `id_etat_ph`, `id_voie`) VALUES
(1, '122121', '125168', 'caractéristique fiche 1', 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `nature_etablisement`
--

CREATE TABLE `nature_etablisement` (
  `id` int(11) NOT NULL,
  `libelle_nat_etab` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nature_etablisement`
--

INSERT INTO `nature_etablisement` (`id`, `libelle_nat_etab`) VALUES
(2, 'Atelier'),
(3, 'Batiment'),
(4, 'Dépôt'),
(1, 'Gare');

-- --------------------------------------------------------

--
-- Structure de la table `organisme_cadastrale`
--

CREATE TABLE `organisme_cadastrale` (
  `id` int(11) NOT NULL,
  `nom_org_cad` varchar(50) DEFAULT NULL,
  `id_commune` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pci`
--

CREATE TABLE `pci` (
  `id` int(11) NOT NULL,
  `libelle_pci` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pci`
--

INSERT INTO `pci` (`id`, `libelle_pci`) VALUES
(1, 'Corporel'),
(3, 'Financier '),
(2, 'Incorporel');

-- --------------------------------------------------------

--
-- Structure de la table `qualite_rail`
--

CREATE TABLE `qualite_rail` (
  `id` int(11) NOT NULL,
  `libelle_qualite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `qualite_rail`
--

INSERT INTO `qualite_rail` (`id`, `libelle_qualite`) VALUES
(1, 'qualité raille 1'),
(2, 'qualité raille 2'),
(4, 'qualité raille 3'),
(5, 'qualité raille 4'),
(6, 'qualité raille 6'),
(7, 'qualité raille 7');

-- --------------------------------------------------------

--
-- Structure de la table `tb_peta`
--

CREATE TABLE `tb_peta` (
  `Id` int(11) NOT NULL,
  `GeoJson` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE `terrain` (
  `id` int(11) NOT NULL,
  `GeoJson` text NOT NULL,
  `superficie` varchar(50) DEFAULT NULL,
  `id_etat` int(11) DEFAULT NULL,
  `id_commune` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id`, `GeoJson`, `superficie`, `id_etat`, `id_commune`) VALUES
(11, '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[2.949829,36.693698],[3.153076,36.711315],[3.155823,36.624294],[2.949829,36.608862],[2.949829,36.693698]]]}}]}', '175012791.82214382', 1, 1),
(12, '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[2.911377,36.618139],[2.916527,36.617588],[2.917728,36.617726],[2.917728,36.618828],[2.91893,36.618966],[2.919102,36.617863],[2.924423,36.619655],[2.924252,36.62117],[2.923222,36.622135],[2.923393,36.624201],[2.921505,36.624477],[2.919617,36.624477],[2.9179,36.62489],[2.917385,36.627094],[2.91687,36.62861],[2.91584,36.629712],[2.914467,36.629023],[2.915497,36.626268],[2.915154,36.624752],[2.91378,36.624477],[2.91275,36.628196],[2.911034,36.629161],[2.907429,36.629574],[2.905369,36.629849],[2.903996,36.630401],[2.901936,36.630263],[2.902279,36.628885],[2.903481,36.62861],[2.902966,36.627783],[2.904854,36.627232],[2.904854,36.625992],[2.906399,36.625992],[2.907171,36.625307],[2.909317,36.625238],[2.909918,36.6251],[2.910347,36.624962],[2.910347,36.623033],[2.910433,36.620416],[2.910519,36.618073],[2.911377,36.618139]]]}}]}', '1349528.6585706845', 3, 2),
(26, '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[2.727356,36.841112],[2.580414,36.782841],[2.956696,36.680483],[2.727356,36.841112]]]}}]}', '183456342.26295552', NULL, NULL),
(27, '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[2.562561,36.897143],[2.719116,36.830121],[2.441711,36.6959],[2.562561,36.897143]]]}}]}', '196468358.29966113', NULL, NULL),
(29, '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[2.910004,36.8543],[2.60788,36.81583],[2.811127,36.937767],[2.910004,36.8543]]]}}]}', '143818932.67869398', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_ammortisement`
--

CREATE TABLE `type_ammortisement` (
  `id` int(11) NOT NULL,
  `libelle_tp_amm` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_ammortisement`
--

INSERT INTO `type_ammortisement` (`id`, `libelle_tp_amm`) VALUES
(4, 'Accéléré'),
(2, 'Dégressif'),
(1, 'Linéaire'),
(3, 'Variable');

-- --------------------------------------------------------

--
-- Structure de la table `type_bien_immobile`
--

CREATE TABLE `type_bien_immobile` (
  `id` int(11) NOT NULL,
  `libelle_tp_im` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_bien_immobile`
--

INSERT INTO `type_bien_immobile` (`id`, `libelle_tp_im`) VALUES
(1, 'Bureautique'),
(3, 'Meuble'),
(2, 'Outil-Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `type_bien_mobile`
--

CREATE TABLE `type_bien_mobile` (
  `id` int(11) NOT NULL,
  `libelle_tp_mob` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_bien_mobile`
--

INSERT INTO `type_bien_mobile` (`id`, `libelle_tp_mob`) VALUES
(3, 'Engin'),
(2, 'Véhicule-Marchandise '),
(1, 'Véhicule-Service'),
(4, 'Wagon');

-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

CREATE TABLE `type_document` (
  `id` int(11) NOT NULL,
  `nom_doc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_document`
--

INSERT INTO `type_document` (`id`, `nom_doc`) VALUES
(5, 'Assurance Bien'),
(4, 'Carte Grise'),
(8, 'plan architecture'),
(1, 'Plan Architecture Etablissement'),
(2, 'Rapport d\'investissement'),
(3, 'Statistiques Achats');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(255) DEFAULT NULL,
  `etab_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `created_at`, `role`, `etab_id`) VALUES
(1, NULL, 'user admin 1', '$2y$10$X0rNkuRrQ36qj6QfrdD0wuq4uzFAKhuG88Ksiw5ICaUJC4Lv305ky', '2020-09-14 23:20:20', 'admin', 2),
(2, NULL, 'user update 1', '$2y$10$X0rNkuRrQ36qj6QfrdD0wuq4uzFAKhuG88Ksiw5ICaUJC4Lv305ky', '2020-09-14 23:20:22', 'user update', 2),
(3, NULL, 'user update 2', '$2y$10$zgIQ3FW38SBovte0KmLlQ.S6B3cdZ3a2BdbG22kOGlp.LHbLdFSPi', '2020-09-14 23:20:23', 'user update', 4),
(4, NULL, 'user inventaire 1', '$2y$10$X0rNkuRrQ36qj6QfrdD0wuq4uzFAKhuG88Ksiw5ICaUJC4Lv305ky', '2020-09-14 23:20:23', 'user inventaire', 2),
(5, NULL, 'user inventaire 2', '$2y$10$zgIQ3FW38SBovte0KmLlQ.S6B3cdZ3a2BdbG22kOGlp.LHbLdFSPi', '2020-09-14 23:20:24', 'user inventaire', 2),
(6, NULL, 'user admin 2', '$2y$10$zgIQ3FW38SBovte0KmLlQ.S6B3cdZ3a2BdbG22kOGlp.LHbLdFSPi', '2020-09-15 03:40:07', 'admin', 1),
(7, NULL, 'user inventaire 3', '$2y$10$X0rNkuRrQ36qj6QfrdD0wuq4uzFAKhuG88Ksiw5ICaUJC4Lv305ky', '2020-09-15 23:39:09', 'user inventaire', 3);

-- --------------------------------------------------------

--
-- Structure de la table `voie_ferroviaire`
--

CREATE TABLE `voie_ferroviaire` (
  `id` int(11) NOT NULL,
  `id_commune` int(11) DEFAULT NULL,
  `GeoJson` text NOT NULL,
  `longueur` text NOT NULL,
  `espace_gauche` varchar(50) DEFAULT NULL,
  `espace_droit` varchar(50) DEFAULT NULL,
  `id_etat_ph` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voie_ferroviaire`
--

INSERT INTO `voie_ferroviaire` (`id`, `id_commune`, `GeoJson`, `longueur`, `espace_gauche`, `espace_droit`, `id_etat_ph`) VALUES
(9, 1, '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[2.742119,36.669232],[2.747269,36.670058],[2.750702,36.672261],[2.753448,36.673913],[2.756195,36.67529],[2.758255,36.675841],[2.760658,36.676667],[2.763748,36.676667],[2.767525,36.677218],[2.770271,36.677218],[2.773705,36.678594]]}},{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[2.774048,36.678739],[2.775593,36.679289],[2.776623,36.679702],[2.777481,36.680253],[2.778683,36.680666],[2.780228,36.681492],[2.781429,36.681767],[2.782288,36.682043],[2.784691,36.683282],[2.786407,36.684245],[2.788296,36.684521],[2.791557,36.684934],[2.795334,36.685897],[2.797737,36.68631],[2.800312,36.686723],[2.801857,36.686998],[2.803745,36.687824],[2.804947,36.68865],[2.806149,36.689201]]}},{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[2.806492,36.689476],[2.807865,36.690164],[2.808895,36.690853],[2.810268,36.691816],[2.811127,36.692505],[2.812157,36.693468],[2.813187,36.694156],[2.814045,36.69512],[2.814903,36.69567],[2.815933,36.696359],[2.817135,36.697322],[2.818508,36.698148],[2.820053,36.698836],[2.821598,36.699387],[2.822971,36.699799],[2.82486,36.700075],[2.82795,36.700488],[2.830524,36.700763],[2.832241,36.701038],[2.834644,36.701726],[2.837048,36.702139],[2.839279,36.702277],[2.841339,36.70269],[2.843742,36.703103],[2.845287,36.704066],[2.847691,36.704617],[2.848892,36.705718],[2.849751,36.707507],[2.850094,36.708883],[2.850437,36.710259],[2.850437,36.711085],[2.850609,36.712323],[2.850952,36.713149],[2.851467,36.714525],[2.852497,36.715488],[2.853355,36.716864],[2.854385,36.717552],[2.855244,36.718791],[2.856445,36.719891],[2.857304,36.720442],[2.85799,36.720992]]}}]}', '6.29 km', '200m', '5m', 1),
(11, 2, '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[2.507629,36.574681],[2.522736,36.574681],[2.540588,36.575784],[2.559814,36.581298],[2.58316,36.584606],[2.605133,36.587914],[2.622986,36.591222],[2.636719,36.600042],[2.654572,36.606657],[2.669678,36.613271]]}}]}', '15.38 km', '30m', '30m', 1);

-- --------------------------------------------------------

--
-- Structure de la table `wilaya`
--

CREATE TABLE `wilaya` (
  `id` int(11) NOT NULL,
  `nom_wilaya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wilaya`
--

INSERT INTO `wilaya` (`id`, `nom_wilaya`) VALUES
(2, 'wilaya 2'),
(3, 'wilaya 3'),
(4, 'wilaya 4'),
(5, 'wilaya 5');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bien_immobile`
--
ALTER TABLE `bien_immobile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bien_immobile_etabissement` (`id_etab`),
  ADD KEY `FK_bien_immobile_etat_physique` (`id_etat_ph`),
  ADD KEY `FK_bien_immobile_pci` (`id_pci`),
  ADD KEY `FK_bien_immobile_type_ammortisement` (`id_type_amm`),
  ADD KEY `FK_bien_immobile_type_bien_immobile` (`id_type_bien_im`);

--
-- Index pour la table `bien_mobile`
--
ALTER TABLE `bien_mobile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `FK_bien_mobile_etat_physique` (`id_etat_ph`),
  ADD KEY `FK_bien_mobile_pci` (`id_pci`),
  ADD KEY `FK_bien_mobile_type_ammortisement` (`id_type_amm`),
  ADD KEY `FK_bien_mobile_etabissement` (`id_etab`),
  ADD KEY `FK_bien_mobile_type_bien_mobile` (`id_type_mob`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_commune` (`nom_commune`),
  ADD UNIQUE KEY `code_postal` (`code_postal`),
  ADD KEY `FK_commune_daira` (`id_daira`),
  ADD KEY `FK_commune_destricte` (`id_destricte`);

--
-- Index pour la table `daira`
--
ALTER TABLE `daira`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_daira` (`nom_daira`),
  ADD KEY `FK_daira_wilaya` (`id_wilaya`);

--
-- Index pour la table `destricte`
--
ALTER TABLE `destricte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_destricte` (`nom_destricte`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_doc` (`nom_doc`),
  ADD KEY `FK_document_type_document` (`id_type_doc`),
  ADD KEY `FK_document_etabissement` (`id_etab`),
  ADD KEY `FK_document_bien_mobile` (`id_bien_mob`),
  ADD KEY `FK_document_terrain` (`id_terrain`),
  ADD KEY `FK_document_bien_immobile` (`id_bien_imob`);

--
-- Index pour la table `etabissement`
--
ALTER TABLE `etabissement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_etab` (`nom_etab`),
  ADD KEY `FK_etabissement_commune` (`id_commune`),
  ADD KEY `FK_etabissement_nature_etablisement` (`id_natur_etab`),
  ADD KEY `FK_etabissement_etat_physique` (`id_etat_ph`);

--
-- Index pour la table `etat_physique`
--
ALTER TABLE `etat_physique`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle-eta_ph` (`libelle_eta_ph`);

--
-- Index pour la table `etat_terrain`
--
ALTER TABLE `etat_terrain`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ibelle_etat` (`ibelle_etat`);

--
-- Index pour la table `fiche_signalisation`
--
ALTER TABLE `fiche_signalisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_fiche_signalisation_etat_physique` (`id_etat_ph`),
  ADD KEY `FK_fiche_signalisation_voie_ferroviaire` (`id_voie`);

--
-- Index pour la table `nature_etablisement`
--
ALTER TABLE `nature_etablisement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_nat_etab` (`libelle_nat_etab`);

--
-- Index pour la table `organisme_cadastrale`
--
ALTER TABLE `organisme_cadastrale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_org_cad` (`nom_org_cad`),
  ADD KEY `FK_organisme_cadastrale_commune` (`id_commune`);

--
-- Index pour la table `pci`
--
ALTER TABLE `pci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_pci` (`libelle_pci`);

--
-- Index pour la table `qualite_rail`
--
ALTER TABLE `qualite_rail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_qualite` (`libelle_qualite`);

--
-- Index pour la table `tb_peta`
--
ALTER TABLE `tb_peta`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_terrain_commune` (`id_commune`),
  ADD KEY `FK_terrain_etat_terrain` (`id_etat`);

--
-- Index pour la table `type_ammortisement`
--
ALTER TABLE `type_ammortisement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_tp_amm` (`libelle_tp_amm`);

--
-- Index pour la table `type_bien_immobile`
--
ALTER TABLE `type_bien_immobile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_tp_im` (`libelle_tp_im`);

--
-- Index pour la table `type_bien_mobile`
--
ALTER TABLE `type_bien_mobile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_tp_mob` (`libelle_tp_mob`);

--
-- Index pour la table `type_document`
--
ALTER TABLE `type_document`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_doc` (`nom_doc`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_user_etabissement` (`etab_id`);

--
-- Index pour la table `voie_ferroviaire`
--
ALTER TABLE `voie_ferroviaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_voie_ferroviaire_etat_physique` (`id_etat_ph`),
  ADD KEY `FK_voie_ferroviaire_commune` (`id_commune`);

--
-- Index pour la table `wilaya`
--
ALTER TABLE `wilaya`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_wilaya` (`nom_wilaya`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bien_immobile`
--
ALTER TABLE `bien_immobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `bien_mobile`
--
ALTER TABLE `bien_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `daira`
--
ALTER TABLE `daira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `destricte`
--
ALTER TABLE `destricte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `etabissement`
--
ALTER TABLE `etabissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `etat_physique`
--
ALTER TABLE `etat_physique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etat_terrain`
--
ALTER TABLE `etat_terrain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `fiche_signalisation`
--
ALTER TABLE `fiche_signalisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `nature_etablisement`
--
ALTER TABLE `nature_etablisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `organisme_cadastrale`
--
ALTER TABLE `organisme_cadastrale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pci`
--
ALTER TABLE `pci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `qualite_rail`
--
ALTER TABLE `qualite_rail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tb_peta`
--
ALTER TABLE `tb_peta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `terrain`
--
ALTER TABLE `terrain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `type_ammortisement`
--
ALTER TABLE `type_ammortisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type_bien_immobile`
--
ALTER TABLE `type_bien_immobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_bien_mobile`
--
ALTER TABLE `type_bien_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_document`
--
ALTER TABLE `type_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `voie_ferroviaire`
--
ALTER TABLE `voie_ferroviaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `wilaya`
--
ALTER TABLE `wilaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bien_immobile`
--
ALTER TABLE `bien_immobile`
  ADD CONSTRAINT `FK_bien_immobile_etabissement` FOREIGN KEY (`id_etab`) REFERENCES `etabissement` (`id`),
  ADD CONSTRAINT `FK_bien_immobile_etat_physique` FOREIGN KEY (`id_etat_ph`) REFERENCES `etat_physique` (`id`),
  ADD CONSTRAINT `FK_bien_immobile_pci` FOREIGN KEY (`id_pci`) REFERENCES `pci` (`id`),
  ADD CONSTRAINT `FK_bien_immobile_type_ammortisement` FOREIGN KEY (`id_type_amm`) REFERENCES `type_ammortisement` (`id`),
  ADD CONSTRAINT `FK_bien_immobile_type_bien_immobile` FOREIGN KEY (`id_type_bien_im`) REFERENCES `type_bien_immobile` (`id`);

--
-- Contraintes pour la table `bien_mobile`
--
ALTER TABLE `bien_mobile`
  ADD CONSTRAINT `FK_bien_mobile_etabissement` FOREIGN KEY (`id_etab`) REFERENCES `etabissement` (`id`),
  ADD CONSTRAINT `FK_bien_mobile_etat_physique` FOREIGN KEY (`id_etat_ph`) REFERENCES `etat_physique` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_bien_mobile_pci` FOREIGN KEY (`id_pci`) REFERENCES `pci` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_bien_mobile_type_ammortisement` FOREIGN KEY (`id_type_amm`) REFERENCES `type_ammortisement` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_bien_mobile_type_bien_mobile` FOREIGN KEY (`id_type_mob`) REFERENCES `type_bien_mobile` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `FK_commune_daira` FOREIGN KEY (`id_daira`) REFERENCES `daira` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_commune_destricte` FOREIGN KEY (`id_destricte`) REFERENCES `destricte` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `daira`
--
ALTER TABLE `daira`
  ADD CONSTRAINT `FK_daira_wilaya` FOREIGN KEY (`id_wilaya`) REFERENCES `wilaya` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_document_bien_immobile` FOREIGN KEY (`id_bien_imob`) REFERENCES `bien_immobile` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_document_bien_mobile` FOREIGN KEY (`id_bien_mob`) REFERENCES `bien_mobile` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_document_etabissement` FOREIGN KEY (`id_etab`) REFERENCES `etabissement` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_document_terrain` FOREIGN KEY (`id_terrain`) REFERENCES `terrain` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_document_type_document` FOREIGN KEY (`id_type_doc`) REFERENCES `type_document` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `etabissement`
--
ALTER TABLE `etabissement`
  ADD CONSTRAINT `FK_etabissement_commune` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_etabissement_etat_physique` FOREIGN KEY (`id_etat_ph`) REFERENCES `etat_physique` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_etabissement_nature_etablisement` FOREIGN KEY (`id_natur_etab`) REFERENCES `nature_etablisement` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `fiche_signalisation`
--
ALTER TABLE `fiche_signalisation`
  ADD CONSTRAINT `FK_fiche_signalisation_etat_physique` FOREIGN KEY (`id_etat_ph`) REFERENCES `etat_physique` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_fiche_signalisation_voie_ferroviaire` FOREIGN KEY (`id_voie`) REFERENCES `voie_ferroviaire` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `organisme_cadastrale`
--
ALTER TABLE `organisme_cadastrale`
  ADD CONSTRAINT `FK_organisme_cadastrale_commune` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD CONSTRAINT `FK_terrain_commune` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_terrain_etat_terrain` FOREIGN KEY (`id_etat`) REFERENCES `etat_terrain` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_etabissement` FOREIGN KEY (`etab_id`) REFERENCES `etabissement` (`id`);

--
-- Contraintes pour la table `voie_ferroviaire`
--
ALTER TABLE `voie_ferroviaire`
  ADD CONSTRAINT `FK_voie_ferroviaire_commune` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id`),
  ADD CONSTRAINT `FK_voie_ferroviaire_etat_physique` FOREIGN KEY (`id_etat_ph`) REFERENCES `etat_physique` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
