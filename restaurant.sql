-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 mei 2022 om 02:32
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestellingenID` int(11) NOT NULL,
  `reserveringenID_ph` int(11) DEFAULT NULL,
  `menuitemsID_ph` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `geserveerd` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`bestellingenID`, `reserveringenID_ph`, `menuitemsID_ph`, `aantal`, `geserveerd`) VALUES
(1, NULL, 19, 1, NULL),
(2, NULL, 19, 1, NULL),
(3, NULL, 10, 2, 1),
(4, 4, 19, 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtscategorien`
--

CREATE TABLE `gerechtscategorien` (
  `gerechtscategorieID` int(11) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `naam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtscategorien`
--

INSERT INTO `gerechtscategorien` (`gerechtscategorieID`, `code`, `naam`) VALUES
(1, 'bar', 'Drankjes'),
(2, 'kok', 'Hapjes'),
(3, 'kok', 'Hoofdgerechten'),
(4, 'kok', 'Nagerechten'),
(5, 'kok', 'Voorgerechten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtsoorten`
--

CREATE TABLE `gerechtsoorten` (
  `gerechtsoortenID` int(11) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `naam` varchar(20) DEFAULT NULL,
  `gerechtscategorienID_ph` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtsoorten`
--

INSERT INTO `gerechtsoorten` (`gerechtsoortenID`, `code`, `naam`, `gerechtscategorienID_ph`) VALUES
(1, 'bar', 'Bieren', 1),
(2, 'bar', 'Frisdranken', 1),
(3, 'bar', 'Warme Dranken', 1),
(4, 'bar', 'Wijnen', 1),
(5, 'kok', 'Koude hapjes', 2),
(6, 'kok', 'Warme hapjes', 2),
(7, 'kok', 'Vegatarisch', 3),
(8, 'kok', 'Vis', 3),
(9, 'kok', 'Vlees', 3),
(10, 'kok', 'IJs', 4),
(11, 'kok', 'Mousse', 4),
(12, 'kok', 'Koud', 5),
(13, 'kok', 'Warm', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klantenID` int(11) NOT NULL,
  `naam` varchar(20) DEFAULT NULL,
  `telefoon` varchar(11) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantenID`, `naam`, `telefoon`, `email`) VALUES
(11, 'samee', '06123456789', 'sameerxv@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `medewerkerID` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`medewerkerID`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'admin', 'root');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitems`
--

CREATE TABLE `menuitems` (
  `menuitemsID` int(11) NOT NULL,
  `code` varchar(4) DEFAULT NULL,
  `naam` varchar(30) DEFAULT NULL,
  `gerechtsoortenID_ph` int(11) DEFAULT NULL,
  `prijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `menuitems`
--

INSERT INTO `menuitems` (`menuitemsID`, `code`, `naam`, `gerechtsoortenID_ph`, `prijs`) VALUES
(1, 'bar', 'Pilsner', 1, 0),
(2, 'bar', 'Kasteel donker', 1, 0),
(3, 'bar', 'Palm', 1, 0),
(4, 'bar', 'Chaudfontaine Rood', 2, 0),
(5, 'bar', 'Verse Jus', 2, 0),
(6, 'bar', 'Tonic', 2, 0),
(7, 'bar', 'Koffie', 3, 0),
(8, 'bar', 'Thee', 3, 0),
(9, 'bar', 'Espresso', 3, 0),
(10, 'bar', 'Per glas', 4, 0),
(11, 'bar', 'Rode port', 4, 0),
(12, 'kok', 'Portie kaas met mosterd', 5, 0),
(13, 'kok', 'Brood met kruidenboter', 5, 0),
(14, 'kok', 'Portie salami worst', 5, 0),
(15, 'kok', 'Bitterballetjes met mosterd', 6, 0),
(16, 'kok', 'Gebakken banana', 7, 0),
(17, 'kok', 'Bonengerecht met diverse groen', 7, 0),
(18, 'kok', 'Gebakken makreel', 8, 0),
(19, 'kok', 'Mosselen uit pan', 8, 0),
(20, 'kok', 'Wienerschnitzel', 9, 0),
(21, 'kok', 'Biefstuk in champignonsaus', 9, 0),
(22, 'kok', 'Vruchtenijs', 10, 0),
(23, 'kok', 'Dame Blanche', 10, 0),
(24, 'kok', 'Chocolademousse', 11, 0),
(25, 'kok', 'Vanillemousse', 11, 0),
(26, 'kok', 'Salade met geitenkaas', 12, 0),
(27, 'kok', 'Tonijnsalade', 12, 0),
(28, 'kok', 'Tomatensoep', 13, 0),
(29, 'kok', 'Aspergesoep', 13, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `reserveringenID` int(11) NOT NULL,
  `tafel` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `tijd` time DEFAULT NULL,
  `klantenID_ph` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `datum_toegevoegd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aantal_k` int(11) DEFAULT NULL,
  `allergieen` text DEFAULT NULL,
  `opmerkingen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`reserveringenID`, `tafel`, `datum`, `tijd`, `klantenID_ph`, `aantal`, `status`, `datum_toegevoegd`, `aantal_k`, `allergieen`, `opmerkingen`) VALUES
(4, 1, '2022-05-17', '04:29:00', 11, 3, 0, '2022-05-11 22:36:28', NULL, 'nut', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestellingenID`),
  ADD KEY `menuitemsID_ph` (`menuitemsID_ph`),
  ADD KEY `reserveringenID_ph` (`reserveringenID_ph`);

--
-- Indexen voor tabel `gerechtscategorien`
--
ALTER TABLE `gerechtscategorien`
  ADD PRIMARY KEY (`gerechtscategorieID`);

--
-- Indexen voor tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  ADD PRIMARY KEY (`gerechtsoortenID`),
  ADD KEY `gerechtscategorienID_ph` (`gerechtscategorienID_ph`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantenID`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`medewerkerID`);

--
-- Indexen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`menuitemsID`),
  ADD KEY `gerechtsoortenID_ph` (`gerechtsoortenID_ph`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`reserveringenID`),
  ADD KEY `klantenID_ph` (`klantenID_ph`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestellingenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `gerechtscategorien`
--
ALTER TABLE `gerechtscategorien`
  MODIFY `gerechtscategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  MODIFY `gerechtsoortenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `medewerkerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `menuitemsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `reserveringenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`menuitemsID_ph`) REFERENCES `menuitems` (`menuitemsID`),
  ADD CONSTRAINT `bestellingen_ibfk_2` FOREIGN KEY (`reserveringenID_ph`) REFERENCES `reserveringen` (`reserveringenID`);

--
-- Beperkingen voor tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  ADD CONSTRAINT `gerechtsoorten_ibfk_1` FOREIGN KEY (`gerechtscategorienID_ph`) REFERENCES `gerechtscategorien` (`gerechtscategorieID`);

--
-- Beperkingen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`gerechtsoortenID_ph`) REFERENCES `gerechtsoorten` (`gerechtsoortenID`);

--
-- Beperkingen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD CONSTRAINT `reserveringen_ibfk_1` FOREIGN KEY (`klantenID_ph`) REFERENCES `klanten` (`klantenID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
