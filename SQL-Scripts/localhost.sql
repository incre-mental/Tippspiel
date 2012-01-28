-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 24. Jan 2012 um 12:03
-- Server Version: 5.5.16
-- PHP-Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `tippspiel`
--
DROP DATABASE `tippspiel`;
CREATE DATABASE `tippspiel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tippspiel`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `begegnung`
--

CREATE TABLE IF NOT EXISTS `begegnung` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Phasen_id` int(4) NOT NULL,
  `Mannschafts_ID_1` int(4) NOT NULL,
  `Mannschafts_ID_2` int(11) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  `Tore_Mannschaft_1` int(11) NOT NULL,
  `Tore_Mannschaft_2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Daten für Tabelle `begegnung`
--

INSERT INTO `begegnung` (`ID`, `Phasen_id`, `Mannschafts_ID_1`, `Mannschafts_ID_2`, `Timestamp`, `Tore_Mannschaft_1`, `Tore_Mannschaft_2`) VALUES
(2, 2, 4, 3, 1339181100, 0, 0),
(1, 2, 2, 1, 1339171200, 0, 0),
(3, 3, 7, 6, 1339257600, 0, 0),
(4, 3, 5, 8, 1339263900, 0, 0),
(5, 4, 12, 9, 1339344000, 0, 0),
(6, 4, 10, 11, 1339353900, 0, 0),
(7, 5, 13, 14, 1339430400, 0, 0),
(8, 5, 16, 15, 1339440300, 0, 0),
(9, 2, 1, 3, 1339516800, 0, 0),
(10, 2, 2, 4, 1339526700, 0, 0),
(11, 3, 6, 8, 1339603200, 0, 0),
(12, 3, 7, 5, 1339613100, 0, 0),
(13, 4, 9, 11, 1339689600, 0, 0),
(14, 4, 12, 10, 1339699500, 0, 0),
(15, 5, 15, 13, 1339776000, 0, 0),
(16, 5, 16, 14, 1339785900, 0, 0),
(17, 2, 1, 4, 1339872300, 0, 0),
(18, 2, 3, 2, 1339872300, 0, 0),
(19, 3, 8, 7, 1339958700, 0, 0),
(20, 3, 6, 5, 1339958700, 0, 0),
(21, 4, 11, 12, 1340045100, 0, 0),
(22, 4, 9, 10, 1340045100, 0, 0),
(23, 5, 15, 14, 1340131500, 0, 0),
(24, 5, 13, 16, 1340131500, 0, 0),
(25, 7, 21, 32, 1340304300, 0, 0),
(26, 7, 31, 22, 1340390700, 0, 0),
(27, 7, 41, 52, 1340477100, 0, 0),
(28, 7, 51, 42, 1340559900, 0, 0),
(29, 8, 61, 63, 1340822700, 0, 0),
(30, 8, 62, 64, 1340909100, 0, 0),
(31, 9, 71, 72, 1341168300, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mannschaften`
--

CREATE TABLE IF NOT EXISTS `mannschaften` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `team` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Daten für Tabelle `mannschaften`
--

INSERT INTO `mannschaften` (`ID`, `team`) VALUES
(1, 'Griechenland'),
(2, 'Polen'),
(3, 'Tschechien'),
(4, 'Russland'),
(5, 'Deutschland'),
(6, 'Dänemark'),
(7, 'Niederlande'),
(8, 'Portugal'),
(9, 'Italien'),
(10, 'Irland'),
(11, 'Kroatien'),
(12, 'Spanien'),
(13, 'England'),
(14, 'Frankreich'),
(15, 'Schweden'),
(16, 'Ukraine'),
(21, 'Sieger A'),
(31, 'Sieger B'),
(41, 'Sieger C'),
(51, 'Sieger D'),
(22, 'Zweiter A'),
(32, 'Zweiter B'),
(42, 'Zweiter C'),
(52, 'Zweiter D'),
(61, 'Sieger V1'),
(63, 'Sieger V3'),
(62, 'Sieger V2'),
(64, 'Sieger V4'),
(71, 'Sieger H1'),
(72, 'Sieger H2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `phasen`
--

CREATE TABLE IF NOT EXISTS `phasen` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Parent_id` int(4) DEFAULT NULL,
  `Name` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `phasen`
--

INSERT INTO `phasen` (`ID`, `Parent_id`, `Name`) VALUES
(1, NULL, 'Gruppenphase'),
(2, 1, 'Gruppe A'),
(3, 1, 'Gruppe B'),
(4, 1, 'Gruppe C'),
(5, 1, 'Gruppe D'),
(6, NULL, 'KO-Phase'),
(7, 6, 'Viertelfinale'),
(8, 6, 'Halbfinale'),
(9, 6, 'Finale');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tipp`
--

CREATE TABLE IF NOT EXISTS `tipp` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Begegnung_ID` int(4) NOT NULL,
  `User_ID` int(4) NOT NULL,
  `TippM1` int(2) NOT NULL,
  `TippM2` int(2) NOT NULL,
  `Punkte` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL DEFAULT '',
  `Passwort` varchar(32) NOT NULL DEFAULT '',
  `Session` varchar(65) DEFAULT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `EMail` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Username`),
  UNIQUE KEY `EMail` (`EMail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `Username`, `Passwort`, `Session`, `Vorname`, `Nachname`, `EMail`) VALUES
(1, 'testuser', '098f6bcd4621d373cade4e832627b4f6', NULL, '', '', 'test@test.de'),
(2, 'testuser2', 'ad0234829205b9033196ba818f7a872b', '2fb9560dede4fff5e5870217aa6ad6ed-8bf7c36d9a3700b7898bf20faf7dbb66', '', '', 'test2@test.de'),
(3, 'Gregor', 'cc03e747a6afbbcbf8be7668acfebee5', 'b10e18b39c4b6c0a5b5935c1180190b3-a8a2d6357540d64320b0f5eb162565da', 'Gregor', 'MÃ¼nster', 'gregor.muenster@arcor.de');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
