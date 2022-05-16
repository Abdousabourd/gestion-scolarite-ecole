-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 mai 2022 à 12:02
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_de_scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `coefficient`
--

DROP TABLE IF EXISTS `coefficient`;
CREATE TABLE IF NOT EXISTS `coefficient` (
  `cod_fil` int(11) NOT NULL AUTO_INCREMENT,
  `cod_mat` int(11) NOT NULL,
  `coef` int(11) NOT NULL,
  PRIMARY KEY (`cod_fil`),
  KEY `cod_mat` (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `composition`
--

DROP TABLE IF EXISTS `composition`;
CREATE TABLE IF NOT EXISTS `composition` (
  `date_comp` int(11) NOT NULL AUTO_INCREMENT,
  `num_ins` int(11) NOT NULL,
  `cod_mat` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`date_comp`),
  KEY `num_ins` (`num_ins`),
  KEY `cod_mat` (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `echeance`
--

DROP TABLE IF EXISTS `echeance`;
CREATE TABLE IF NOT EXISTS `echeance` (
  `num_ech` int(11) NOT NULL AUTO_INCREMENT,
  `num_ins` int(11) NOT NULL,
  `Date_ech` int(11) NOT NULL,
  `mont_ech` int(11) NOT NULL,
  PRIMARY KEY (`num_ech`),
  KEY `num_ins` (`num_ins`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `matricule` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `filliere`
--

DROP TABLE IF EXISTS `filliere`;
CREATE TABLE IF NOT EXISTS `filliere` (
  `code_fil` int(11) NOT NULL AUTO_INCREMENT,
  `lib_fil` varchar(255) NOT NULL,
  `cout` int(11) NOT NULL,
  PRIMARY KEY (`code_fil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `num_ins` int(11) NOT NULL AUTO_INCREMENT,
  `date_ins` date NOT NULL,
  `annee` year(4) NOT NULL,
  `code_fil` int(11) NOT NULL,
  `matricule` int(11) NOT NULL,
  PRIMARY KEY (`num_ins`),
  KEY `code_fil` (`code_fil`),
  KEY `matricule` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `cod_mat` int(255) NOT NULL AUTO_INCREMENT,
  `lib_mat` int(11) NOT NULL,
  PRIMARY KEY (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

DROP TABLE IF EXISTS `reglement`;
CREATE TABLE IF NOT EXISTS `reglement` (
  `Dat_reg` int(11) NOT NULL AUTO_INCREMENT,
  `num_ins` int(11) NOT NULL,
  `num_ech` int(11) NOT NULL,
  `mont_ech` int(11) NOT NULL,
  PRIMARY KEY (`Dat_reg`),
  KEY `num_ins` (`num_ins`),
  KEY `num_ech` (`num_ech`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `coefficient`
--
ALTER TABLE `coefficient`
  ADD CONSTRAINT `coefficient_filiere_cod_fil` FOREIGN KEY (`cod_fil`) REFERENCES `filliere` (`code_fil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coefficient_matiere_cod_mat` FOREIGN KEY (`cod_mat`) REFERENCES `matiere` (`cod_mat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `composition`
--
ALTER TABLE `composition`
  ADD CONSTRAINT `composition_inscription_num_ins` FOREIGN KEY (`num_ins`) REFERENCES `inscription` (`num_ins`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composition_matiere_cod_mat` FOREIGN KEY (`cod_mat`) REFERENCES `matiere` (`cod_mat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `echeance`
--
ALTER TABLE `echeance`
  ADD CONSTRAINT `echeance_inscription_num_ins` FOREIGN KEY (`num_ins`) REFERENCES `inscription` (`num_ins`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_etudiant_matricule` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscription_filiere_code_fil` FOREIGN KEY (`code_fil`) REFERENCES `filliere` (`code_fil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD CONSTRAINT `reglement_echeance_num_ech` FOREIGN KEY (`num_ech`) REFERENCES `echeance` (`num_ech`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reglement_inscription_num_ins` FOREIGN KEY (`num_ins`) REFERENCES `inscription` (`num_ins`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
