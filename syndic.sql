-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 01 avr. 2022 à 14:38
-- Version du serveur :  10.3.32-MariaDB
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `syndic`
--

-- --------------------------------------------------------

--
-- Structure de la table `coproprietaire`
--

CREATE TABLE `coproprietaire` (
  `idcoproprietaire` int(2) NOT NULL,
  `civilite` tinyint(1) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coproprietaire`
--

INSERT INTO `coproprietaire` (`idcoproprietaire`, `civilite`, `nom`, `prenom`, `rue`, `cp`, `ville`, `tel`) VALUES
(1, 0, 'MULLER', 'Jean-Marie', '18,av des Pins', '44000', 'Nantes', '0952561926'),
(2, 0, 'VIVIAN', 'Christian', '18,av des Pins', '44000', 'Nantes', '0952324920'),
(3, 0, 'SAIDJ', 'Simon', '49,rue des chataux', '49000', 'Angers', '0952375642'),
(4, 1, 'BEIRUT', 'Virginie', '18,av des Pins', '44000', 'Nantes', '0952528960'),
(5, 0, 'HAFID', 'Karim', '18,av des Pins', '44000', 'Nantes', '0952554645');

-- --------------------------------------------------------

--
-- Structure de la table `copropriete`
--

CREATE TABLE `copropriete` (
  `idcopropriete` int(2) NOT NULL,
  `nomimmeuble` varchar(30) DEFAULT NULL,
  `rue` varchar(32) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `copropriete`
--

INSERT INTO `copropriete` (`idcopropriete`, `nomimmeuble`, `rue`, `cp`, `ville`) VALUES
(1, 'résidence des Pins', '18,av de la Pins', '44000', 'Nantes'),
(2, 'Résidence des Balsamiers', '5,P1 de la résidence', '44000', 'Nantes');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `iddevis` int(2) NOT NULL,
  `idprestataire` int(2) NOT NULL,
  `idcopropriete` int(2) NOT NULL,
  `idtravaux` int(2) NOT NULL,
  `datedev` date DEFAULT NULL,
  `montantttc` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`iddevis`, `idprestataire`, `idcopropriete`, `idtravaux`, `datedev`, `montantttc`) VALUES
(1479, 2, 1, 10, '2021-05-30', '14500.00'),
(1480, 3, 1, 10, '2021-05-15', '15000.00'),
(1481, 1, 1, 10, '2021-05-31', '17000.00'),
(1482, 4, 2, 20, '2021-06-15', '246000.00'),
(1483, 5, 2, 20, '2021-06-30', '271000.00'),
(1484, 1, 2, 20, '2021-06-10', '223000.00'),
(1485, 6, 1, 30, '2021-10-12', '25000.00'),
(1486, 3, 1, 30, '2020-12-15', '2700.00'),
(1487, 1, 1, 30, '2021-10-28', '22000.00');

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE `lot` (
  `idlot` int(2) NOT NULL,
  `idcopropriete` int(2) NOT NULL,
  `idcoproprietaire` int(2) NOT NULL,
  `localisation` varchar(32) DEFAULT NULL,
  `tantieme` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lot`
--

INSERT INTO `lot` (`idlot`, `idcopropriete`, `idcoproprietaire`, `localisation`, `tantieme`) VALUES
(1101, 1, 1, 'RDC coté AV des', 2097),
(1102, 1, 2, 'REZ DE JARDIN', 1422),
(1103, 2, 3, 'ETAGE AV DE LA', 1659),
(1104, 1, 4, 'REZ DE JARDIN', 2222),
(1105, 1, 2, 'COMBLE', 1400),
(1106, 1, 5, 'REZ DE JARDIN', 1200);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `idprestataire` int(2) NOT NULL,
  `raisonsociale` varchar(20) DEFAULT NULL,
  `rue` varchar(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`idprestataire`, `raisonsociale`, `rue`, `cp`, `ville`, `tel`, `mail`) VALUES
(1, 'ARDEN BTP', NULL, NULL, NULL, NULL, NULL),
(2, 'Perthuis', NULL, NULL, NULL, NULL, NULL),
(3, 'SMBTP', NULL, NULL, NULL, NULL, NULL),
(4, 'Heis SARL', NULL, NULL, NULL, NULL, NULL),
(5, 'MURANO SA', NULL, NULL, NULL, NULL, NULL),
(6, 'Renov Façade', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `idtravaux` int(2) NOT NULL,
  `libelletravaux` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `travaux`
--

INSERT INTO `travaux` (`idtravaux`, `libelletravaux`) VALUES
(10, 'Rénovation parking'),
(20, 'Réfection toiture'),
(30, 'Ravalement façade');

-- --------------------------------------------------------

--
-- Structure de la table `travaux_votes`
--

CREATE TABLE `travaux_votes` (
  `idvotestravaux` int(2) NOT NULL,
  `iddevis` int(2) NOT NULL,
  `datevote` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `travaux_votes`
--

INSERT INTO `travaux_votes` (`idvotestravaux`, `iddevis`, `datevote`) VALUES
(12, 1479, '2021-06-17'),
(13, 1482, '2021-07-11'),
(14, 1485, '2021-10-31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coproprietaire`
--
ALTER TABLE `coproprietaire`
  ADD PRIMARY KEY (`idcoproprietaire`);

--
-- Index pour la table `copropriete`
--
ALTER TABLE `copropriete`
  ADD PRIMARY KEY (`idcopropriete`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`iddevis`),
  ADD KEY `fk_devis_prestataire` (`idprestataire`),
  ADD KEY `fk_devis_copropriete` (`idcopropriete`),
  ADD KEY `fk_devis_travaux` (`idtravaux`);

--
-- Index pour la table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`idlot`),
  ADD KEY `fk_lot_copropriete` (`idcopropriete`),
  ADD KEY `fk_lot_coproprietaire` (`idcoproprietaire`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`idprestataire`);

--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`idtravaux`);

--
-- Index pour la table `travaux_votes`
--
ALTER TABLE `travaux_votes`
  ADD PRIMARY KEY (`idvotestravaux`),
  ADD KEY `fk_travaux_votes_devis` (`iddevis`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coproprietaire`
--
ALTER TABLE `coproprietaire`
  MODIFY `idcoproprietaire` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `copropriete`
--
ALTER TABLE `copropriete`
  MODIFY `idcopropriete` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `iddevis` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1488;

--
-- AUTO_INCREMENT pour la table `lot`
--
ALTER TABLE `lot`
  MODIFY `idlot` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1107;

--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `idprestataire` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `idtravaux` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `travaux_votes`
--
ALTER TABLE `travaux_votes`
  MODIFY `idvotestravaux` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `fk_devis_copropriete` FOREIGN KEY (`idcopropriete`) REFERENCES `copropriete` (`idcopropriete`),
  ADD CONSTRAINT `fk_devis_prestataire` FOREIGN KEY (`idprestataire`) REFERENCES `prestataire` (`idprestataire`),
  ADD CONSTRAINT `fk_devis_travaux` FOREIGN KEY (`idtravaux`) REFERENCES `travaux` (`idtravaux`);

--
-- Contraintes pour la table `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `fk_lot_coproprietaire` FOREIGN KEY (`idcoproprietaire`) REFERENCES `coproprietaire` (`idcoproprietaire`),
  ADD CONSTRAINT `fk_lot_copropriete` FOREIGN KEY (`idcopropriete`) REFERENCES `copropriete` (`idcopropriete`);

--
-- Contraintes pour la table `travaux_votes`
--
ALTER TABLE `travaux_votes`
  ADD CONSTRAINT `fk_travaux_votes_devis` FOREIGN KEY (`iddevis`) REFERENCES `devis` (`iddevis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
