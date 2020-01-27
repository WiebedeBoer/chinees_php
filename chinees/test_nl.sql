-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 27 jan 2020 om 11:58
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
-- Tabelstructuur voor tabel `Actieformule`
--

CREATE TABLE `Actieformule` (
  `ID` int(11) NOT NULL,
  `Syndroom` int(11) NOT NULL,
  `Patentformule` int(11) NOT NULL,
  `Kruidenformule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `Actieformule`
--

INSERT INTO `Actieformule` (`ID`, `Syndroom`, `Patentformule`, `Kruidenformule`) VALUES
(0, 1, 1, 1);

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

--
-- Gegevens worden geëxporteerd voor tabel `Actiesaantekeningen`
--

INSERT INTO `Actiesaantekeningen` (`ID`, `Actie`, `Aantekening`, `User`) VALUES
(5, 1, 'test', 1);

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

--
-- Gegevens worden geëxporteerd voor tabel `ChineseKruiden`
--

INSERT INTO `ChineseKruiden` (`ID`, `Engels`, `Latijn`, `Pinjin`, `Klasse`, `Thermodynamisch`, `Meridiaan`, `Qi`, `Werking`, `Indicaties`, `Dosering`) VALUES
(1, 'test', 't', 't', 't', 't', 't', 't', 't', 't', 't');

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

--
-- Gegevens worden geëxporteerd voor tabel `Formulesaantekeningen`
--

INSERT INTO `Formulesaantekeningen` (`ID`, `Kruid`, `Aantekening`, `User`) VALUES
(1, 2, 'aantekening kruid', 1);

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

--
-- Gegevens worden geëxporteerd voor tabel `FormulesEnKruiden`
--

INSERT INTO `FormulesEnKruiden` (`ID`, `Kruidenformule`, `Kruiden`, `Verhouding`) VALUES
(3, 1, 0, 2);

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

--
-- Gegevens worden geëxporteerd voor tabel `Kruiden`
--

INSERT INTO `Kruiden` (`ID`, `Nederlands`, `Latijn`, `Familie`, `Inhoudsstof`, `Toepassingen`, `Eigenschappen`, `Actie`, `Gebruik`, `Contraindicaties`, `Smaak`, `Dosering`, `Thermodynamisch`, `GebruikteDelen`, `Orgaan`) VALUES
(1, 'lavendel', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'dose', 'test', 'test', 'test'),
(2, 'rozemarijn', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'n'),
(3, 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't', 't'),
(4, 'Munt', 'Mentha piperium', 'Lipbloemenfamilie', 'ethrische olie', 'zenuwstelsel', 'aard is drogen', 'klaart wind koude', 'inwendig', 'voorzichtig zijn bij overmatig zweten', 'scherp', 'dose', 'eerst warm later koel', 'delen', 'long, milt, lever'),
(5, 'Agrimonie', 'Agrimonia eupatoria', 'Rozenfamilie', 'Looistoffen, bitterstoffen, amara aroma', 'constitutie opbouwende en genezende', 'temperatuur is neutraal', 'Verwijdert long slijm', 'moedertinctuur', 'contra', 'zuur', 'zie gebruik', 'neutraal', 'delen', 'Long, dikke darm'),
(6, 'Venkel', 'Foeniculum vulgare', 'Schermbloemige familie', 'Etherische olie, anathol, cineol, vette olie', 'spijsvertering, ontkrampend, stimulerend', 'aard is stimulerend', 'versterkt en harmoniserend', 'de oertinctuur', 'contra', 'beetje zuur en zoet', 'dose', 'warm', 'delen', 'Nier, blaas, milt'),
(7, 'Duizendblad', 'Achilea Milefolium', 'Composietenfamilie', 'Bitterstoffen, looistoffen, organische zuren', 'Spijsvertering', 'temperatuur is variabel', 'tonifieert de milt', 'inwendig', 'Niet gebruiken tijdens zwangerschap (stimuleert de weeen en de uitdrijving)', 'bitter zoet scherp', 'dose', 'variabel', 'delen', 'Lever, nier, blaas, milt, hart, Chong mai en ren mai');

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

--
-- Gegevens worden geëxporteerd voor tabel `Kruidenaantekeningen`
--

INSERT INTO `Kruidenaantekeningen` (`ID`, `Kruid`, `Aantekening`, `User`) VALUES
(1, 1, 'test aan', 1),
(2, 1, 'testing', 1);

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

--
-- Gegevens worden geëxporteerd voor tabel `Kruidenformules`
--

INSERT INTO `Kruidenformules` (`ID`, `Naam`, `Indicaties`, `Werking`, `Klasse`, `Smaak`, `Meridiaan`, `Qi`, `Contraindicaties`) VALUES
(1, 'test', 'f', 'f', 'f', 'f', 'f', 'f', 'f'),
(2, 'Li i Moving PM', 'Stagnatie van lever Qi', 'Tonifieert milt', 'klasse', 'smaak', 'meridiaan', 'qi', 'contra'),
(3, 'Milt Qi digest thee', 'Milt Qi leegte. Opgeblazen gevoel.', 'Tonifieert Milt Qi, Milt Yang, helpt bij lever Qi stagnatie.', 'klasse', 'smaak', 'meridiaan', 'qi', 'contra');

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

--
-- Gegevens worden geëxporteerd voor tabel `Patentformules`
--

INSERT INTO `Patentformules` (`ID`, `Nederlands`, `Engels`, `Pinjin`, `Werking`, `Tong`, `Pols`, `Contraindicaties`, `Indicaties`) VALUES
(1, 'test', 'g', 'g', 'g', 'g', 'g', 'g', 'g'),
(2, 'Decoctie van Cinnamonium', 'Decoction of Cinnamonium', 'Ruo Fu Bao Yuan', 'yang tonifieren', 'tong', 'pols', 'contra', 'indicatie'),
(3, 'Decoctie van Astragalus om het centrum te versterken', 'Decoction of Astragalus', 'Huang Qi Jian Zhong Tang', 'Maag Qi tonifieren en verwarmen, milt Qi tonifieren en verwarmen', 'tong', 'pols', 'contra', 'indicatie');

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

--
-- Gegevens worden geëxporteerd voor tabel `Syndromen`
--

INSERT INTO `Syndromen` (`ID`, `Syndroom`, `Symptoom`, `Hoofdsymptoom`, `Tong`, `Pols`, `Etiologie`, `Pathologie`, `Voorlopers`, `Ontwikkelingen`) VALUES
(1, 'test', 't', 't', 't', 'y', 'y', 'y', 'y', 'y'),
(2, 'Hart Qi Leegte', 'symptoom', 'Palpitaties, vermoeidheid, lege pols', 'bleke of normale kleur', 'leeg', 'etiologie', 'pathologie', 'pathologie', 'pathologie'),
(3, 'Hart Qi Leegte', 'symptoom', 'palpitaties, vermoeidheid,lege pols', 'bleke of normale tong', 'leeg', 'etiologie', 'pathologie', 'pathologie', 'pathologie');

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

--
-- Gegevens worden geëxporteerd voor tabel `Syndromenacties`
--

INSERT INTO `Syndromenacties` (`ID`, `Syndroom`, `Actie`, `Acupunctuurpunten`, `Opmerkingen`) VALUES
(1, 1, 'test', 't', 'to');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Synoniemen`
--

CREATE TABLE `Synoniemen` (
  `ID` int(11) NOT NULL,
  `Naam` text NOT NULL,
  `Synoniem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `Synoniemen`
--

INSERT INTO `Synoniemen` (`ID`, `Naam`, `Synoniem`) VALUES
(1, 'palpitatie', 'hartklopping');

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
(1, 'test', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin', 'jb5e6AmKgBLF'),
(2, 'jscholte', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin', '4GCz04jsejcc');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Actieformule`
--
ALTER TABLE `Actieformule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Syndroom` (`Syndroom`),
  ADD KEY `Patentformule` (`Patentformule`),
  ADD KEY `Kruidenformule` (`Kruidenformule`);

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
-- Indexen voor tabel `Synoniemen`
--
ALTER TABLE `Synoniemen`
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
-- AUTO_INCREMENT voor een tabel `Actiesaantekeningen`
--
ALTER TABLE `Actiesaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `Chineesaantekeningen`
--
ALTER TABLE `Chineesaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `ChineseKruiden`
--
ALTER TABLE `ChineseKruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Formulesaantekeningen`
--
ALTER TABLE `Formulesaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `FormulesEnKruiden`
--
ALTER TABLE `FormulesEnKruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `Kruiden`
--
ALTER TABLE `Kruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `Kruidenaantekeningen`
--
ALTER TABLE `Kruidenaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Kruidenformules`
--
ALTER TABLE `Kruidenformules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `Patentaantekeningen`
--
ALTER TABLE `Patentaantekeningen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `PatentEnKruiden`
--
ALTER TABLE `PatentEnKruiden`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Patentformules`
--
ALTER TABLE `Patentformules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `Syndromen`
--
ALTER TABLE `Syndromen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `Syndromenacties`
--
ALTER TABLE `Syndromenacties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Synoniemen`
--
ALTER TABLE `Synoniemen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Actieformule`
--
ALTER TABLE `Actieformule`
  ADD CONSTRAINT `Actieformule_ibfk_3` FOREIGN KEY (`Kruidenformule`) REFERENCES `Kruidenformules` (`ID`),
  ADD CONSTRAINT `Actieformule_ibfk_1` FOREIGN KEY (`Syndroom`) REFERENCES `Syndromen` (`ID`),
  ADD CONSTRAINT `Actieformule_ibfk_2` FOREIGN KEY (`Patentformule`) REFERENCES `Patentformules` (`ID`);

--
-- Beperkingen voor tabel `Actiesaantekeningen`
--
ALTER TABLE `Actiesaantekeningen`
  ADD CONSTRAINT `Actiesaantekeningen_ibfk_1` FOREIGN KEY (`Actie`) REFERENCES `Actieformule` (`ID`);

--
-- Beperkingen voor tabel `FormulesEnKruiden`
--
ALTER TABLE `FormulesEnKruiden`
  ADD CONSTRAINT `FormulesEnKruiden_ibfk_2` FOREIGN KEY (`Kruidenformule`) REFERENCES `Kruidenformules` (`ID`),
  ADD CONSTRAINT `FormulesEnKruiden_ibfk_1` FOREIGN KEY (`Kruiden`) REFERENCES `Kruiden` (`ID`);

--
-- Beperkingen voor tabel `PatentEnKruiden`
--
ALTER TABLE `PatentEnKruiden`
  ADD CONSTRAINT `PatentEnKruiden_ibfk_2` FOREIGN KEY (`Patentformule`) REFERENCES `Patentformules` (`ID`),
  ADD CONSTRAINT `PatentEnKruiden_ibfk_1` FOREIGN KEY (`Chinesekruiden`) REFERENCES `ChineseKruiden` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
