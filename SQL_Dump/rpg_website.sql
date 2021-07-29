-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jul 2021 um 00:20
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
-- Tabellenstruktur für Tabelle `game_entries`
--

CREATE TABLE `game_entries` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` enum('maennlich','weiblich') DEFAULT NULL,
  `age` tinyint(4) NOT NULL,
  `imagepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `age`, `imagepath`) VALUES
(1, 'Hans', 'hans@hotmail.de', '$argon2id$v=19$m=65536,t=4,p=1$MktVaWxVMGt4dUJwSmFKbg$Rn/3DyRuLmK0/RaruOe6mLqDXx9aNERGdoU2yiHjC7U', 'maennlich', 30, 'Images/Profile_Images/Hans.jpg'),
(2, 'Maria', 'maria@hotmail.de', '$argon2id$v=19$m=65536,t=4,p=1$WWlRWHM1aXZKS3VyRnFZNA$0boRN8Js2BS8VgLk+g6GUOd0b/XU/PIjQSpszQVPPzg', 'weiblich', 25, 'Images/Profile_Images/Maria.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `website_navigation`
--

CREATE TABLE `website_navigation` (
  `id` int(11) NOT NULL,
  `menuname` varchar(50) DEFAULT NULL,
  `logged_in` tinyint(1) DEFAULT NULL COMMENT '1 = TRUE |\r\n0 = FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `website_navigation`
--

INSERT INTO `website_navigation` (`id`, `menuname`, `logged_in`) VALUES
(1, 'Spielkonzept', 0),
(2, 'Regelwerk', 0),
(3, 'Mitspieler', 1),
(4, 'Spiel', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `game_entries`
--
ALTER TABLE `game_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_users` (`userid`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `website_navigation`
--
ALTER TABLE `website_navigation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `game_entries`
--
ALTER TABLE `game_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `website_navigation`
--
ALTER TABLE `website_navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `game_entries`
--
ALTER TABLE `game_entries`
  ADD CONSTRAINT `fk_id_users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
