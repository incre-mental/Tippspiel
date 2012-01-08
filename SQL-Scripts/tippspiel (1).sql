-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 07. Januar 2012 um 12:59
-- Server Version: 5.1.44
-- PHP-Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `tippspiel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Begegnung`
--

CREATE TABLE IF NOT EXISTS `Begegnung` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Mannschafts_ID_1` int(4) NOT NULL,
  `Mannschafts_ID_2` int(11) NOT NULL,
  `Timestamp` int(11) NOT NULL,
  `Tore_Mannschaft_1` int(11) NOT NULL,
  `Tore_Mannschaft_2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `Begegnung`
--

INSERT INTO `Begegnung` (`ID`, `Mannschafts_ID_1`, `Mannschafts_ID_2`, `Timestamp`, `Tore_Mannschaft_1`, `Tore_Mannschaft_2`) VALUES
(1, 1, 2, 1000000, 3, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mannschaften`
--

CREATE TABLE IF NOT EXISTS `mannschaften` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `team` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `mannschaften`
--

INSERT INTO `mannschaften` (`ID`, `team`) VALUES
(1, 'Deutschland'),
(2, 'Polen');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `tipp`
--

INSERT INTO `tipp` (`ID`, `Begegnung_ID`, `User_ID`, `TippM1`, `TippM2`, `Punkte`) VALUES
(1, 1, 1, 3, 0, 0),
(2, 1, 2, 5, 2, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `Username`, `Passwort`, `Session`, `Vorname`, `Nachname`, `EMail`) VALUES
(1, 'testuser', '098f6bcd4621d373cade4e832627b4f6', '3f0de526ed0828a8db27e590efab0528-d9cb6d00b8c6aa86204a57610e7153f2', '', '', 'test@test.de'),
(2, 'testuser2', 'ad0234829205b9033196ba818f7a872b', '2fb9560dede4fff5e5870217aa6ad6ed-8bf7c36d9a3700b7898bf20faf7dbb66', '', '', 'test2@test.de');
