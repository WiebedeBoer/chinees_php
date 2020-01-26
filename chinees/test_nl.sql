-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 06 jan 2020 om 19:35
-- Serverversie: 5.5.64-MariaDB
-- PHP-versie: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_nl`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Actieformules`
--

CREATE TABLE `Actieformules` (
  `ID` int(11) NOT NULL,
  `Syndroom` int(11) NOT NULL,
  `Patentformule` int(11) DEFAULT NULL,
  `Kruidenformule` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Actiesaantekeningen`
--

CREATE TABLE `Actiesaantekeningen` (
  `ID` int(11) NOT NULL,
  `Actie` int(11) NOT NULL,
  `Aantekening` text NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Chineesaantekeningen`
--

CREATE TABLE `Chineesaantekeningen` (
  `ID` int(11) NOT NULL,
  `Kruid` int(11) NOT NULL,
  `Aantekening` text,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ChineseKruiden`
--

CREATE TABLE `ChineseKruiden` (
  `ID` int(11) NOT NULL,
  `Engels` text,
  `Latijn` text,
  `Pinjin` text,
  `Klasse` text,
  `Thermodynamisch` text,
  `Meridiaan` text,
  `Qi` text,
  `Werking` text,
  `Indicaties` text,
  `Dosering` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Formulesaantekeningen`
--

CREATE TABLE `Formulesaantekeningen` (
  `ID` int(11) NOT NULL,
  `Kruid` int(11) NOT NULL,
  `Aantekening` text NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `FormulesEnKruiden`
--

CREATE TABLE `FormulesEnKruiden` (
  `ID` int(11) NOT NULL,
  `Kruidenformule` int(11) NOT NULL,
  `Kruiden` int(11) NOT NULL,
  `Verhouding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Kruiden`
--

CREATE TABLE `Kruiden` (
  `ID` int(11) NOT NULL,
  `Nederlands` text,
  `Latijn` text,
  `Familie` text,
  `Inhoudsstof` text,
  `Toepassingen` text,
  `Eigenschappen` text,
  `Actie` text,
  `Gebruik` text,
  `Contraindicaties` text,
  `Smaak` text,
  `Dosering` text,
  `Thermodynamisch` text,
  `GebruikteDelen` text,
  `Orgaan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Kruidenaantekeningen`
--

CREATE TABLE `Kruidenaantekeningen` (
  `ID` int(11) NOT NULL,
  `Kruid` int(11) NOT NULL,
  `Aantekening` text NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Kruidenformules`
--

CREATE TABLE `Kruidenformules` (
  `ID` int(11) NOT NULL,
  `Naam` text,
  `Indicaties` text,
  `Werking` text,
  `Klasse` text,
  `Smaak` text,
  `Meridiaan` text,
  `Qi` text,
  `Contraindicaties` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Patentaantekeningen`
--

CREATE TABLE `Patentaantekeningen` (
  `ID` int(11) NOT NULL,
  `Patent` int(11) NOT NULL,
  `Aantekening` text,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `PatentEnKruiden`
--

CREATE TABLE `PatentEnKruiden` (
  `ID` int(11) NOT NULL,
  `Patentformule` int(11) NOT NULL,
  `Chinesekruiden` int(11) NOT NULL,
  `Verhouding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Patentformules`
--

CREATE TABLE `Patentformules` (
  `ID` int(11) NOT NULL,
  `Nederlands` text,
  `Engels` text,
  `Pinjin` text,
  `Werking` text,
  `Tong` text,
  `Pols` text,
  `Contraindicaties` text,
  `Indicaties` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Syndromen`
--

CREATE TABLE `Syndromen` (
  `ID` int(11) NOT NULL,
  `Syndroom` text,
  `Symptoom` text,
  `Hoofdsymptoom` text,
  `Tong` text,
  `Pols` text,
  `Etiologie` text,
  `Pathologie` text,
  `Voorlopers` text,
  `Ontwikkelingen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Syndromenacties`
--

CREATE TABLE `Syndromenacties` (
  `ID` int(11) NOT NULL,
  `Syndroom` int(11) NOT NULL,
  `Actie` text,
  `Acupunctuurpunten` text,
  `Opmerkingen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(80) NOT NULL,
  `Password` varchar(240) NOT NULL,
  `Type` varchar(80) NOT NULL DEFAULT 'user',
  `Cokey` varchar(12) NOT NULL DEFAULT '1234567890ab'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`ID`, `Username`, `Password`, `Type`, `Cokey`) VALUES
(1, 'test', 'fe01ce2a7fbac8fafaed7c982a04e229', 'user', 'nDKSjVfejgeM');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Actieformules`
--
ALTER TABLE `Actieformules`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Actiesaantekeningen`
--
ALTER TABLE `Actiesaantekeningen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Chineesaantekeningen`
--
ALTER TABLE `Chineesaantekeningen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `ChineseKruiden`
--
ALTER TABLE `ChineseKruiden`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Formulesaantekeningen`
--
ALTER TABLE `Formulesaantekeningen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `FormulesEnKruiden`
--
ALTER TABLE `FormulesEnKruiden`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Kruiden`
--
ALTER TABLE `Kruiden`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Kruidenaantekeningen`
--
ALTER TABLE `Kruidenaantekeningen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Kruidenformules`
--
ALTER TABLE `Kruidenformules`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Patentaantekeningen`
--
ALTER TABLE `Patentaantekeningen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `PatentEnKruiden`
--
ALTER TABLE `PatentEnKruiden`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Patentformules`
--
ALTER TABLE `Patentformules`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Syndromen`
--
ALTER TABLE `Syndromen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Syndromenacties`
--
ALTER TABLE `Syndromenacties`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Actieformules`
--
ALTER TABLE `Actieformules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Actiesaantekeningen`
--
ALTER TABLE `Actiesaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Chineesaantekeningen`
--
ALTER TABLE `Chineesaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `ChineseKruiden`
--
ALTER TABLE `ChineseKruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Formulesaantekeningen`
--
ALTER TABLE `Formulesaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `FormulesEnKruiden`
--
ALTER TABLE `FormulesEnKruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Kruiden`
--
ALTER TABLE `Kruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Kruidenaantekeningen`
--
ALTER TABLE `Kruidenaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Kruidenformules`
--
ALTER TABLE `Kruidenformules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Patentaantekeningen`
--
ALTER TABLE `Patentaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `PatentEnKruiden`
--
ALTER TABLE `PatentEnKruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Patentformules`
--
ALTER TABLE `Patentformules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Syndromen`
--
ALTER TABLE `Syndromen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Syndromenacties`
--
ALTER TABLE `Syndromenacties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
