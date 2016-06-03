-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juin 2016 à 12:04
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(20) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

CREATE TABLE `bateau` (
  `idbateau` int(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `longueurBat` float NOT NULL,
  `largeurBat` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bateau`
--

INSERT INTO `bateau` (`idbateau`, `nom`, `longueurBat`, `largeurBat`) VALUES
(1, 'Kor''Ant', 10, 5),
(2, 'Ar Solen', 20, 10),
(3, 'Al''xi', 10, 5),
(4, 'Luce isle', 37.2, 8.6),
(5, 'Maëllys', 23, 11.5),
(6, 'Pippo', 12.5, 6.125),
(40, '20', 20, 20),
(95, 'TestFinal', 20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `bfret`
--

CREATE TABLE `bfret` (
  `idbateau` int(20) NOT NULL,
  `poidsMaxBatFret` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bfret`
--

INSERT INTO `bfret` (`idbateau`, `poidsMaxBatFret`) VALUES
(6, 600);

-- --------------------------------------------------------

--
-- Structure de la table `bvoyageur`
--

CREATE TABLE `bvoyageur` (
  `idbateau` int(20) NOT NULL,
  `imageBatVoyageur` varchar(50) NOT NULL,
  `vitesseBatVoy` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bvoyageur`
--

INSERT INTO `bvoyageur` (`idbateau`, `imageBatVoyageur`, `vitesseBatVoy`) VALUES
(1, 'Kor_Ant.jpg', 13),
(2, 'Ar_Solen.jpg', 130),
(3, 'Al_xi.jpg', 29),
(4, 'Luce_isle.jpeg', 26),
(5, 'Maellys.jpg', 2),
(40, '20.jpg', 20),
(95, 'TestFinal.jpg', 20);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `lettre` varchar(1) NOT NULL,
  `libelle` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`lettre`, `libelle`) VALUES
('A', 'Passager'),
('B', 'Veh.inf.2m'),
('C', 'Veh.sup.2m');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `capaciteMax` int(11) DEFAULT NULL,
  `idBat` varchar(5) DEFAULT NULL,
  `lettreC` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`capaciteMax`, `idBat`, `lettreC`) VALUES
(200, '1', 'B'),
(1000, '1', 'A'),
(100, '1', 'C'),
(500, '2', 'A'),
(200, '2', 'B'),
(250, '2', 'C'),
(300, '3', 'A'),
(300, '3', 'B'),
(300, '3', 'C'),
(250, '4', 'A'),
(250, '4', 'B'),
(250, '4', 'C'),
(620, '5', 'A'),
(510, '5', 'B'),
(450, '5', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

CREATE TABLE `enregistrer` (
  `quantite` int(11) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `numR` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enregistrer`
--

INSERT INTO `enregistrer` (`quantite`, `type`, `numR`) VALUES
(2, 'A1', 16),
(3, 'A2', 16),
(8, 'A3', 16),
(2, 'A1', 17),
(3, 'A2', 17),
(8, 'A3', 17),
(2, 'A1', 18),
(3, 'A2', 18),
(8, 'A3', 18),
(2, 'A1', 19),
(5, 'C2', 19),
(2, 'A1', 20),
(5, 'C2', 20),
(2, 'A1', 21),
(5, 'C2', 21),
(2, 'A1', 22),
(5, 'C2', 22),
(2, 'A1', 23),
(4, 'A2', 23),
(2, 'B1', 23),
(5, 'C2', 23),
(2, 'A1', 24),
(4, 'A2', 24),
(2, 'B1', 24),
(5, 'C2', 24),
(1, 'A1', 25),
(2, 'C1', 25),
(1, 'A1', 26),
(2, 'C1', 26),
(1, 'A1', 27),
(2, 'C1', 27),
(1, 'A1', 28),
(2, 'C1', 28);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `idequip` int(20) NOT NULL,
  `libequip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipement`
--

INSERT INTO `equipement` (`idequip`, `libequip`) VALUES
(1, 'Accès Handicapé'),
(2, 'Bar'),
(3, 'Pont Promenade'),
(4, 'Salon Vidéo'),
(5, 'Piscine'),
(6, 'Salle de spéctacle');

-- --------------------------------------------------------

--
-- Structure de la table `equiper`
--

CREATE TABLE `equiper` (
  `idbateau` int(20) NOT NULL,
  `idequip` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equiper`
--

INSERT INTO `equiper` (`idbateau`, `idequip`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 6),
(3, 4),
(3, 5),
(4, 1),
(4, 5),
(5, 2),
(22, 1),
(22, 1),
(26, 7),
(0, 1),
(0, 2),
(0, 4),
(0, 5),
(100, 1),
(100, 2),
(100, 4),
(100, 5),
(95, 1),
(95, 2),
(95, 5);

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

CREATE TABLE `liaison` (
  `code` int(11) NOT NULL,
  `distance` decimal(4,1) DEFAULT NULL,
  `idSec` int(11) DEFAULT NULL,
  `idDep` int(11) DEFAULT NULL,
  `idArr` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liaison`
--

INSERT INTO `liaison` (`code`, `distance`, `idSec`, `idDep`, `idArr`) VALUES
(11, '25.1', 3, 2, 4),
(15, '8.3', 3, 1, 2),
(16, '8.0', 3, 1, 3),
(17, '7.9', 3, 3, 1),
(19, '23.7', 3, 4, 2),
(21, '7.7', 6, 6, 7),
(22, '7.4', 6, 7, 6),
(24, '9.0', 3, 2, 1),
(25, '8.8', 5, 1, 5),
(30, '8.8', 5, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `periode`
--

INSERT INTO `periode` (`dateDebut`, `dateFin`) VALUES
('2015-09-01', '2016-06-15'),
('2016-06-16', '2016-09-15'),
('2016-09-16', '2017-05-31');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `port`
--

INSERT INTO `port` (`id`, `nom`) VALUES
(1, 'Quiberon'),
(2, 'Le Palais'),
(3, 'Sauzon'),
(4, 'Vannes'),
(5, 'Port St Gildas'),
(6, 'Lorient'),
(7, 'Port-Tudy');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `num` int(10) UNSIGNED NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `numT` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`num`, `nom`, `adresse`, `cp`, `ville`, `numT`) VALUES
(1, 'TEst', 'test', 'test', 'test', 4),
(2, 'Momo', 'Rue Louise', '59800', 'Lille', 2),
(9, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 2),
(10, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 2),
(8, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 2),
(11, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 2),
(12, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 2),
(13, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 2),
(14, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(15, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(16, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(17, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(18, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(19, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(20, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(21, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(22, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(23, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(24, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 4),
(25, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 1),
(26, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 1),
(27, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 1),
(28, 'Mohammed LAREDJ', '25 Rue Louise Bourgeois', '59000', 'Lille', 1);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE `secteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `secteur`
--

INSERT INTO `secteur` (`id`, `nom`) VALUES
(1, 'Aix'),
(2, 'Batz'),
(3, 'Belle-Ile-en-Mer'),
(4, 'Brehat'),
(5, 'Houat'),
(6, 'Ile de Groix'),
(7, 'Molène'),
(8, 'Ouessant'),
(9, 'Sein'),
(10, 'Yeu');

-- --------------------------------------------------------

--
-- Structure de la table `tarifier`
--

CREATE TABLE `tarifier` (
  `tarif` decimal(5,2) DEFAULT NULL,
  `codeT` varchar(2) DEFAULT NULL,
  `codeL` int(11) DEFAULT NULL,
  `dateDebutP` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarifier`
--

INSERT INTO `tarifier` (`tarif`, `codeT`, `codeL`, `dateDebutP`) VALUES
('5.60', 'A3', 15, '2015-09-01'),
('6.40', 'A3', 15, '2016-09-16'),
('7.00', 'A3', 15, '2016-06-16'),
('9.80', 'A3', 19, '2015-09-01'),
('11.10', 'A2', 15, '2015-09-01'),
('12.10', 'A2', 15, '2016-09-16'),
('13.10', 'A2', 15, '2016-06-16'),
('17.30', 'A2', 19, '2015-09-01'),
('18.00', 'A1', 15, '2015-09-01'),
('19.00', 'A1', 15, '2016-09-16'),
('20.00', 'A1', 15, '2016-06-16'),
('27.20', 'A1', 19, '2015-09-01'),
('86.00', 'B1', 15, '2015-09-01'),
('91.00', 'B1', 15, '2016-09-16'),
('95.00', 'B1', 15, '2016-06-16'),
('129.00', 'B2', 15, '2015-09-01'),
('136.00', 'B2', 15, '2016-09-16'),
('142.00', 'B2', 15, '2016-06-16'),
('189.00', 'C1', 15, '2015-09-01'),
('199.00', 'C1', 15, '2016-09-16'),
('205.00', 'C2', 15, '2015-09-01'),
('208.00', 'C1', 15, '2016-06-16'),
('226.00', 'C2', 15, '2016-06-16'),
('236.00', 'C2', 15, '2016-09-16'),
('268.00', 'C3', 15, '2015-09-01'),
('282.00', 'C3', 15, '2016-09-16'),
('295.00', 'C3', 15, '2016-06-16'),
('129.00', 'B1', 19, '2015-09-01'),
('194.00', 'B2', 19, '2015-09-01'),
('284.00', 'C1', 19, '2015-09-01'),
('308.00', 'C2', 19, '2015-09-01'),
('402.00', 'C3', 19, '2015-09-01'),
('29.30', 'A1', 19, '2016-06-16'),
('18.60', 'A2', 19, '2016-06-16'),
('10.60', 'A3', 19, '2016-06-16'),
('139.00', 'B1', 19, '2016-06-16'),
('209.00', 'B2', 19, '2016-06-16'),
('306.00', 'C1', 19, '2016-06-16'),
('332.00', 'C2', 19, '2016-06-16'),
('434.00', 'C3', 19, '2016-06-16'),
('28.50', 'A1', 19, '2016-09-16'),
('18.10', 'A2', 19, '2016-09-16'),
('10.20', 'A3', 19, '2016-09-16'),
('135.00', 'B1', 19, '2016-09-16'),
('203.00', 'B2', 19, '2016-09-16'),
('298.00', 'C1', 19, '2016-09-16'),
('323.00', 'C2', 19, '2016-09-16'),
('422.00', 'C3', 19, '2016-09-16'),
('18.10', 'A2', 19, '2016-09-16'),
('10.20', 'A3', 19, '2016-09-16'),
('135.00', 'B1', 19, '2016-09-16'),
('203.00', 'B2', 19, '2016-09-16'),
('298.00', 'C1', 19, '2016-09-16'),
('323.00', 'C2', 19, '2016-09-16'),
('422.00', 'C3', 19, '2016-09-16');

-- --------------------------------------------------------

--
-- Structure de la table `traversee`
--

CREATE TABLE `traversee` (
  `num` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `idBat` varchar(5) DEFAULT NULL,
  `codeL` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `traversee`
--

INSERT INTO `traversee` (`num`, `date`, `heure`, `idBat`, `codeL`) VALUES
(1, '2015-11-06', '08:10:00', '1', 15),
(2, '2015-11-06', '08:12:00', '3', 11),
(3, '2015-11-06', '09:30:00', '4', 11),
(4, '2015-11-06', '09:45:00', '1', 11),
(123, '2015-11-06', '09:45:00', '5', 11);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `code` varchar(2) NOT NULL,
  `libelle` varchar(19) DEFAULT NULL,
  `lettreC` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`code`, `libelle`, `lettreC`) VALUES
('A1', 'Adulte', 'A'),
('A2', 'Junior de 8 a 18 an', 'A'),
('A3', 'Enfant 0 a 7 ans', 'A'),
('B1', 'Voiture long.inf.4m', 'B'),
('B2', 'Voiture long.inf.5m', 'B'),
('C1', 'Fourgon', 'C'),
('C2', 'Camping Car', 'C'),
('C3', 'Camion', 'C');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD PRIMARY KEY (`idbateau`),
  ADD UNIQUE KEY `idbateau` (`idbateau`);

--
-- Index pour la table `bfret`
--
ALTER TABLE `bfret`
  ADD PRIMARY KEY (`idbateau`),
  ADD KEY `batHeritageFret` (`idbateau`);

--
-- Index pour la table `bvoyageur`
--
ALTER TABLE `bvoyageur`
  ADD PRIMARY KEY (`idbateau`),
  ADD KEY `batHeritageVoy` (`idbateau`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`lettre`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD KEY `cleEtrang1` (`idBat`),
  ADD KEY `cleEtrang2` (`lettreC`);

--
-- Index pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD KEY `cleEtrangere1` (`type`),
  ADD KEY `cleEtrangere2` (`numR`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`idequip`);

--
-- Index pour la table `equiper`
--
ALTER TABLE `equiper`
  ADD KEY `equipBateau` (`idbateau`),
  ADD KEY `equipEquip` (`idequip`);

--
-- Index pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD PRIMARY KEY (`code`),
  ADD KEY `cleE1` (`idSec`),
  ADD KEY `cleE2` (`idDep`),
  ADD KEY `cleE3` (`idArr`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`dateDebut`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`num`),
  ADD KEY `cleEtranger1` (`numT`);

--
-- Index pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tarifier`
--
ALTER TABLE `tarifier`
  ADD KEY `cleEtran1` (`codeT`),
  ADD KEY `cleEtran2` (`dateDebutP`),
  ADD KEY `cleEtran3` (`codeL`);

--
-- Index pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD PRIMARY KEY (`num`),
  ADD KEY `cleEtrange1` (`idBat`),
  ADD KEY `cleEtrange2` (`codeL`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`code`,`lettreC`),
  ADD KEY `cleEtra1` (`lettreC`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bateau`
--
ALTER TABLE `bateau`
  MODIFY `idbateau` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `idequip` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `num` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `traversee`
--
ALTER TABLE `traversee`
  MODIFY `num` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
