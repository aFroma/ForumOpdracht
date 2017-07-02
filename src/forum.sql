-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 jul 2017 om 23:37
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `forum_main`
--

CREATE TABLE `forum_main` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `lastpost` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'n/a'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `forum_main`
--

INSERT INTO `forum_main` (`id`, `name`, `description`, `lastpost`) VALUES
(1, 'Algemeen Forum', 'voor onderwerpen die niet in de onderstaande categorien thuishoren.', 'Dylan Hermanni '),
(2, 'Mx Pro', 'Hier alles over de GP''s, BMB, ONK,.. ', ''),
(3, 'Mx Freestyle', 'hier alles over fmx, redbull x fighters,.. ', 'n/a');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(10) NOT NULL,
  `fullname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `secretpin` int(10) NOT NULL,
  `avatar` varchar(2083) NOT NULL,
  `postcount` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `fullname`, `username`, `password`, `secretpin`, `avatar`, `postcount`) VALUES
(1, 'Dylan Hermanni', 'Arjen', 'test', 1234, 'https://scontent-ams3-1.xx.fbcdn.net/v/t1.0-9/15220229_709344632562706_3951775140002475903_n.jpg?oh=28a26bfc0056024957d18abad6080ed1&oe=59D82A84', 0),
(4, 'voornaam achternaam', 'test', 'test', 1234, 'https://pbs.twimg.com/card_img/877852458357227520/tLd-A62w?format=jpg&name=144x144_2', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `forum` int(11) NOT NULL,
  `created` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `replies`
--

INSERT INTO `replies` (`id`, `topicid`, `username`, `message`, `forum`, `created`) VALUES
(28, 15, 'Dylan Hermanni ', 'Dit is zeker weten een hele mooie motor!', 1, '2017-06-29 14:41:11'),
(27, 15, 'Dylan Hermanni ', 'Dit is zeker weten een hele mooie motor!', 1, '2017-06-29 14:40:15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `starter` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `lastpost` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `forum` int(11) NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `created` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sticky` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `topics`
--

INSERT INTO `topics` (`id`, `title`, `starter`, `lastpost`, `forum`, `message`, `created`, `sticky`) VALUES
(15, 'Film: zuki RM-Z450 model 2018', 'Dylan Hermanni ', 'Dylan Hermanni ', 1, 'Ricky Carmichael was onlangs in Japan om de nieuwe Suzuki RM-Z450 model 2018 te testen. Carmichael weet waar hij over praat want in zijn carriere wist hij maar liefst 15 AMA titels te pakken.<br><img src="http://www.motocrossplanet.nl/articleimages/81898.jpg"/>\r\n<br><p>In het onderstaande filmpje vertelt Carmichael over de vernieuwingen aan het Suzuki RM-Z450 2018 model. </p><iframe width="540" height="300" src="https://www.youtube.com/embed/TJoKLAtLiw8" frameborder="0" allowfullscreen></iframe>\r\n', '2017-06-29 13:59:00', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `forum_main`
--
ALTER TABLE `forum_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `forum_main`
--
ALTER TABLE `forum_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT voor een tabel `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
