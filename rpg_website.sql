-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Mrz 2021 um 20:12
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
-- Tabellenstruktur für Tabelle `hobbys`
--

CREATE TABLE `hobbys` (
  `ID` int(11) NOT NULL,
  `PersoenlicheDaten_ID` int(11) NOT NULL,
  `Hobby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontaktmoeglichkeiten`
--

CREATE TABLE `kontaktmoeglichkeiten` (
  `ID` int(11) NOT NULL,
  `Kontaktmoeglichkeit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kontaktmoeglichkeiten`
--

INSERT INTO `kontaktmoeglichkeiten` (`ID`, `Kontaktmoeglichkeit`) VALUES
(1, 'Discord'),
(2, 'Skype'),
(3, 'Facebook'),
(4, 'Instagram'),
(5, 'Twitter'),
(6, 'Webseite'),
(7, 'GitHub');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichedaten_kontaktmoeglichkeiten`
--

CREATE TABLE `persoenlichedaten_kontaktmoeglichkeiten` (
  `Kontaktmoeglichkeiten_ID` int(11) NOT NULL,
  `PersoenlicheDaten_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenliche_daten`
--

CREATE TABLE `persoenliche_daten` (
  `ID` int(11) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `E-Mail` varchar(50) NOT NULL,
  `Passwort` varchar(200) NOT NULL,
  `Geburtstag` datetime NOT NULL,
  `Geschlecht_ID` int(11) NOT NULL,
  `Beziehungsstatus_ID` int(11) NOT NULL,
  `Hobbys_ID` int(11) NOT NULL,
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
-- Indizes für die Tabelle `hobbys`
--
ALTER TABLE `hobbys`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PersoenlicheDaten_ID` (`PersoenlicheDaten_ID`);

--
-- Indizes für die Tabelle `kontaktmoeglichkeiten`
--
ALTER TABLE `kontaktmoeglichkeiten`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `persoenlichedaten_kontaktmoeglichkeiten`
--
ALTER TABLE `persoenlichedaten_kontaktmoeglichkeiten`
  ADD KEY `PersoenlicheDaten_ID` (`PersoenlicheDaten_ID`),
  ADD KEY `Kontaktmoeglichkeiten_ID` (`Kontaktmoeglichkeiten_ID`);

--
-- Indizes für die Tabelle `persoenliche_daten`
--
ALTER TABLE `persoenliche_daten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Geschlecht_ID` (`Geschlecht_ID`),
  ADD KEY `Beziehungsstatus_ID` (`Beziehungsstatus_ID`),
  ADD KEY `Hobbys_ID` (`Hobbys_ID`),
  ADD KEY `Kontaktmöglichkeiten_ID` (`Kontaktmöglichkeiten_ID`);

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
-- AUTO_INCREMENT für Tabelle `hobbys`
--
ALTER TABLE `hobbys`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kontaktmoeglichkeiten`
--
ALTER TABLE `kontaktmoeglichkeiten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints der Tabelle `hobbys`
--
ALTER TABLE `hobbys`
  ADD CONSTRAINT `hobbys_ibfk_1` FOREIGN KEY (`PersoenlicheDaten_ID`) REFERENCES `persoenliche_daten` (`ID`);

--
-- Constraints der Tabelle `persoenlichedaten_kontaktmoeglichkeiten`
--
ALTER TABLE `persoenlichedaten_kontaktmoeglichkeiten`
  ADD CONSTRAINT `persoenlichedaten_kontaktmoeglichkeiten_ibfk_1` FOREIGN KEY (`PersoenlicheDaten_ID`) REFERENCES `persoenliche_daten` (`ID`),
  ADD CONSTRAINT `persoenlichedaten_kontaktmoeglichkeiten_ibfk_2` FOREIGN KEY (`Kontaktmoeglichkeiten_ID`) REFERENCES `kontaktmoeglichkeiten` (`ID`);

--
-- Constraints der Tabelle `persoenliche_daten`
--
ALTER TABLE `persoenliche_daten`
  ADD CONSTRAINT `persoenliche_daten_ibfk_1` FOREIGN KEY (`Geschlecht_ID`) REFERENCES `geschlecht` (`ID`),
  ADD CONSTRAINT `persoenliche_daten_ibfk_2` FOREIGN KEY (`Beziehungsstatus_ID`) REFERENCES `beziehungsstatus` (`ID`),
  ADD CONSTRAINT `persoenliche_daten_ibfk_3` FOREIGN KEY (`Hobbys_ID`) REFERENCES `hobbys` (`ID`),
  ADD CONSTRAINT `persoenliche_daten_ibfk_4` FOREIGN KEY (`Kontaktmöglichkeiten_ID`) REFERENCES `kontaktmoeglichkeiten` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
