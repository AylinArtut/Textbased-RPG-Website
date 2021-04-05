-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Apr 2021 um 16:36
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `rpg_website`
CREATE DATABASE rpg_website;
use rpg_website;
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `altersklasse`
--

CREATE TABLE `altersklasse` (
  `ID` int(11) NOT NULL,
  `Altersklasse` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `altersklasse`
--

INSERT INTO `altersklasse` (`ID`, `Altersklasse`) VALUES
(1, 'Erwachsener'),
(2, 'Teenager'),
(3, 'Kind');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beziehungsstatus`
--

CREATE TABLE `beziehungsstatus` (
  `ID` int(11) NOT NULL,
  `Beziehungsstatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `beziehungsstatus`
--

INSERT INTO `beziehungsstatus` (`ID`, `Beziehungsstatus`) VALUES
(1, 'single'),
(2, 'vergeben'),
(3, 'verlobt'),
(4, 'verheiratet'),
(5, 'geschieden');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `charakter_daten`
--

CREATE TABLE `charakter_daten` (
  `ID` int(11) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Spitzname` varchar(30) NOT NULL,
  `Altersklasse_ID` int(11) NOT NULL,
  `Genaues_Alter` int(11) NOT NULL,
  `Geschlecht_ID` int(11) NOT NULL,
  `Rasse_ID` int(11) NOT NULL,
  `Persoenlichkeit` varchar(700) NOT NULL,
  `Lebensgeschichte` varchar(1000) NOT NULL,
  `Aussehen` varchar(700) NOT NULL,
  `Besondere_Merkmale` varchar(700) NOT NULL,
  `Kleidung` varchar(700) NOT NULL,
  `Bildpfad` varchar(100) NOT NULL,
  `Lebensmotto` varchar(200) NOT NULL,
  `Sonstiges` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geschlecht`
--

CREATE TABLE `geschlecht` (
  `ID` int(11) NOT NULL,
  `Geschlecht` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `geschlecht`
--

INSERT INTO `geschlecht` (`ID`, `Geschlecht`) VALUES
(1, 'maennlich'),
(2, 'weiblich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenliche_daten`
--

CREATE TABLE `persoenliche_daten` (
  `ID` int(11) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Passwort` varchar(200) NOT NULL,
  `Geburtstag` datetime NOT NULL,
  `Geschlecht_ID` int(11) NOT NULL,
  `Beziehungsstatus_ID` int(11) NOT NULL,
  `Hobbys` varchar(200) NOT NULL,
  `Kontaktmöglichkeiten_ID` int(11) NOT NULL,
  `Sonstiges` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rasse`
--

CREATE TABLE `rasse` (
  `ID` int(11) NOT NULL,
  `Rasse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rasse`
--

INSERT INTO `rasse` (`ID`, `Rasse`) VALUES
(1, 'mensch');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `altersklasse`
--
ALTER TABLE `altersklasse`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `beziehungsstatus`
--
ALTER TABLE `beziehungsstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `charakter_daten`
--
ALTER TABLE `charakter_daten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Altersklasse_ID` (`Altersklasse_ID`),
  ADD KEY `Geschlecht_ID` (`Geschlecht_ID`),
  ADD KEY `Rasse_ID` (`Rasse_ID`);

--
-- Indizes für die Tabelle `geschlecht`
--
ALTER TABLE `geschlecht`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `persoenliche_daten`
--
ALTER TABLE `persoenliche_daten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Geschlecht_ID` (`Geschlecht_ID`),
  ADD KEY `Beziehungsstatus_ID` (`Beziehungsstatus_ID`);

--
-- Indizes für die Tabelle `rasse`
--
ALTER TABLE `rasse`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `altersklasse`
--
ALTER TABLE `altersklasse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `beziehungsstatus`
--
ALTER TABLE `beziehungsstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT für Tabelle `charakter_daten`
--
ALTER TABLE `charakter_daten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `geschlecht`
--
ALTER TABLE `geschlecht`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `persoenliche_daten`
--
ALTER TABLE `persoenliche_daten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `rasse`
--
ALTER TABLE `rasse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `charakter_daten`
--
ALTER TABLE `charakter_daten`
  ADD CONSTRAINT `charakter_daten_ibfk_1` FOREIGN KEY (`Altersklasse_ID`) REFERENCES `altersklasse` (`ID`),
  ADD CONSTRAINT `charakter_daten_ibfk_2` FOREIGN KEY (`Geschlecht_ID`) REFERENCES `geschlecht` (`ID`),
  ADD CONSTRAINT `charakter_daten_ibfk_3` FOREIGN KEY (`Rasse_ID`) REFERENCES `rasse` (`ID`);

--
-- Constraints der Tabelle `persoenliche_daten`
--
ALTER TABLE `persoenliche_daten`
  ADD CONSTRAINT `persoenliche_daten_ibfk_1` FOREIGN KEY (`Geschlecht_ID`) REFERENCES `geschlecht` (`ID`),
  ADD CONSTRAINT `persoenliche_daten_ibfk_2` FOREIGN KEY (`Beziehungsstatus_ID`) REFERENCES `beziehungsstatus` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
