-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jul 2021 um 23:15
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

--
-- Daten für Tabelle `charakter_daten`
--

INSERT INTO `charakter_daten` (`ID`, `Vorname`, `Nachname`, `Spitzname`, `Altersklasse_ID`, `Genaues_Alter`, `Geschlecht_ID`, `Rasse_ID`, `Persoenlichkeit`, `Lebensgeschichte`, `Aussehen`, `Besondere_Merkmale`, `Kleidung`, `Bildpfad`, `Lebensmotto`, `Sonstiges`) VALUES
(1, 'Hans', 'Meier', 'Hansi', 1, 30, 1, 1, 'Schüchtern', 'War mal klein und wurde groß.', 'Sieht toll aus', 'Keine', 'Gut gekleidet', 'Images/Profile_Images/Hans.jpg', 'Immer glücklich sein.', 'Nichts.'),
(2, 'Maria', 'Schulze', 'Schulzi', 3, 22, 2, 1, 'faul', 'Keine', 'brilliant', 'keine', 'keine', 'Images/Profile_Images/Maria.jpg', 'rwrwrwrw', 'rwrwrwrwrw'),
(3, 'Peter', 'Meier', 'Pete', 1, 22, 1, 1, 'Hm ...', '...', '', '', '', 'Images/Profile_Images/Peter.jpg', '', '');

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
-- Tabellenstruktur für Tabelle `navigation`
--

CREATE TABLE `navigation` (
  `ID` int(11) NOT NULL,
  `Bezeichnung` varchar(50) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL COMMENT 'TRUE = eingeloggt = 1,\r\nFALSE = nichtEin. = 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `navigation`
--

INSERT INTO `navigation` (`ID`, `Bezeichnung`, `Status`) VALUES
(1, 'Home', 0),
(2, 'Bullshit', 0),
(3, 'AnotherOne', 0),
(4, 'Miau', 0),
(5, 'Profil', 1);

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

--
-- Daten für Tabelle `persoenliche_daten`
--

INSERT INTO `persoenliche_daten` (`ID`, `Vorname`, `Email`, `Passwort`, `Geburtstag`, `Geschlecht_ID`, `Beziehungsstatus_ID`, `Hobbys`, `Kontaktmöglichkeiten_ID`, `Sonstiges`) VALUES
(1, 'Hans', 'hans@hotmail.de', '$argon2id$v=19$m=65536,t=4,p=1$Ym5nMjBWU1VOL3lySlFSSg$yGzLfn3D+CfUOz83xPdTgkvaBI6VfPkQy5MTkcyCTeg', '0000-00-00 00:00:00', 1, 1, 'Lesen, schlafen', 0, 'Nichts besonderes.'),
(2, 'Maria', 'maria@mail.de', '$argon2id$v=19$m=65536,t=4,p=1$NHc4TkJ6STRMaHpQcm1qdg$S9QlnlnPmwF4tmEUxDShH2ZHJ1mvkyuN0nKju7XZtQs', '0000-00-00 00:00:00', 1, 2, 'schlafen, trinken', 0, 'Nichts ...'),
(3, 'Peter', 'peter@hotmail.de', '$argon2id$v=19$m=65536,t=4,p=1$VkVuZEVxeTkvOWV1LnV0Yw$yOKNbbSoyS0WZITXKxmKlxrH8M5pasU2u+SXGa34BjE', '0000-00-00 00:00:00', 1, 4, 'Singen', 0, 'Öh ...');

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
-- Indizes für die Tabelle `navigation`
--
ALTER TABLE `navigation`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `geschlecht`
--
ALTER TABLE `geschlecht`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `navigation`
--
ALTER TABLE `navigation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `persoenliche_daten`
--
ALTER TABLE `persoenliche_daten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
