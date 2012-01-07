-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 07. Januar 2012 um 12:46
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
-- Tabellenstruktur für Tabelle `users`
--

DROP TABLE IF EXISTS `users`;
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
