-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Mar 21, 2017 alle 17:22
-- Versione del server: 5.6.31
-- Versione PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `segni`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Evento`
--

CREATE TABLE IF NOT EXISTS `Evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `durata` int(11) NOT NULL,
  `tipologia` enum('Spettacolo','Laboratorio','Formazione','Film') COLLATE utf8_roman_ci NOT NULL DEFAULT 'Spettacolo',
  `eta_min` int(2) NOT NULL DEFAULT '1',
  `eta_max` int(3) NOT NULL DEFAULT '150',
  `ticket` tinyint(1) NOT NULL,
  `desc_ita` text COLLATE utf8_roman_ci NOT NULL,
  `desc_eng` text COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `Evento`
--

INSERT INTO `Evento` (`id`, `nome`, `durata`, `tipologia`, `eta_min`, `eta_max`, `ticket`, `desc_ita`, `desc_eng`) VALUES
(1, 'Rumore di Acque', 60, 'Spettacolo', 13, 150, 0, '', ''),
(2, 'Il Fuoco nel Silenzio', 70, 'Spettacolo', 6, 150, 0, '', ''),
(3, 'MYLOEMAYA', 50, 'Spettacolo', 1, 3, 1, '', ''),
(4, 'Il Giardino di Gaia', 45, 'Spettacolo', 1, 5, 1, '', ''),
(5, 'Buio', 45, 'Spettacolo', 2, 5, 1, '', ''),
(6, 'Semino', 45, 'Spettacolo', 2, 6, 1, '', ''),
(7, 'Lupus in Fabula', 45, 'Spettacolo', 3, 5, 1, '', ''),
(8, 'Let''s play Kawara', 60, 'Laboratorio', 3, 5, 1, '', ''),
(9, 'A Passeggio con i Pennelli', 45, 'Laboratorio', 3, 7, 0, '', ''),
(10, 'Le Città Incantate - suoni e visioni dal Giappone', 45, 'Spettacolo', 3, 10, 1, '', ''),
(11, 'L''ultimo Lupo', 120, 'Film', 6, 150, 1, '', ''),
(12, 'Playcity', 120, 'Formazione', 0, 0, 0, '', ''),
(13, 'Little Bang', 60, 'Spettacolo', 4, 10, 1, '', ''),
(14, 'Tripula', 55, 'Spettacolo', 5, 10, 1, 'Torna a grande richiesta lo spettacolo emozionante sull’avventura dei fratelli Montgolfier che diventa metafora del volo e del potere d’immaginazione dell’uomo che rende possibili importanti progressi. Come in un vero e proprio  viaggio in mongolfiera gli spettatori vengono fatti accomodare in un enorme pallone aerostatico, ne diventano l’equipaggio, e sono attivamente coinvolti in alcune azioni necessarie alla navigazione. Divertimento assicurato che fa della didattica un gioco da ragazzi.', 'An exciting show about Mongolfier brothers’ adventure that becomes a metaphor of flight and human imagination.');

-- --------------------------------------------------------

--
-- Struttura della tabella `eventoLuogoData`
--

CREATE TABLE IF NOT EXISTS `eventoLuogoData` (
  `id_istanza` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_luogo` int(11) NOT NULL,
  `data` date NOT NULL,
  `orario` time NOT NULL,
  `orario_esteso` varchar(255) COLLATE utf8_roman_ci NOT NULL COMMENT 'per modellare le fasce orarie (es. lupoteca)',
  `speciale` tinyint(1) NOT NULL DEFAULT '0',
  `speciale_ragazzi` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `eventoLuogoData`
--

INSERT INTO `eventoLuogoData` (`id_istanza`, `id_evento`, `id_luogo`, `data`, `orario`, `orario_esteso`, `speciale`, `speciale_ragazzi`) VALUES
(1, 3, 7, '2016-10-26', '09:30:00', '', 0, 0),
(2, 3, 7, '2016-10-26', '17:00:00', '', 0, 0),
(3, 3, 7, '2016-10-27', '09:30:00', '', 0, 0),
(4, 3, 7, '2016-10-27', '11:00:00', '', 0, 0),
(5, 3, 7, '2016-10-27', '17:00:00', '', 0, 0),
(6, 3, 7, '2016-10-28', '09:30:00', '', 0, 0),
(7, 13, 6, '2016-10-26', '10:00:00', '', 0, 0),
(8, 13, 6, '2016-10-26', '17:00:00', '', 0, 0),
(9, 13, 6, '2016-10-27', '09:30:00', '', 0, 0),
(10, 13, 6, '2016-10-27', '17:00:00', '', 0, 0),
(11, 13, 6, '2016-10-28', '09:30:00', '', 0, 0),
(12, 13, 6, '2016-10-28', '17:00:00', '', 0, 0),
(13, 13, 6, '2016-10-29', '10:30:00', '', 0, 0),
(14, 13, 6, '2016-10-29', '16:00:00', '', 0, 0),
(15, 14, 2, '2016-10-31', '20:30:00', '', 1, 0),
(16, 14, 2, '2016-11-01', '11:00:00', '', 1, 0),
(17, 14, 2, '2016-11-01', '18:00:00', '', 1, 0),
(18, 14, 2, '2016-11-02', '09:00:00', '', 0, 0),
(19, 14, 2, '2016-11-02', '11:00:00', '', 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `Luogo`
--

CREATE TABLE IF NOT EXISTS `Luogo` (
  `id` int(11) NOT NULL,
  `id_lettera` varchar(1) CHARACTER SET latin1 NOT NULL COMMENT 'id del volantino evento',
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `latitudine` float NOT NULL,
  `longitudine` float NOT NULL,
  `citta` varchar(25) CHARACTER SET latin1 NOT NULL,
  `tipoVia` enum('Via','Piazza','Viale','Corso') CHARACTER SET latin1 NOT NULL DEFAULT 'Via',
  `via` varchar(75) CHARACTER SET latin1 NOT NULL,
  `numero_civico` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `Luogo`
--

INSERT INTO `Luogo` (`id`, `id_lettera`, `nome`, `latitudine`, `longitudine`, `citta`, `tipoVia`, `via`, `numero_civico`) VALUES
(1, 'A', 'Biblioteca Baratta', 45.1484, 10.7959, 'Mantova', 'Via', 'Giuseppe Garibaldi', 88),
(2, 'B', 'Centro Culturale Contardo Ferrini', 45.1521, 10.7919, 'Mantova', 'Via', 'Giulio Romano', 15),
(3, 'C', 'FOR.MA', 45.1517, 10.795, 'Mantova', 'Via', 'Lorenzo Gandolfo', 13),
(4, 'D', 'Hub Socio Educativo', 45.146, 10.7986, 'Mantova', 'Via', 'Leopoldo Camillo Volta', 9),
(5, 'E', 'Palazzo Ducale, Aula Didattica', 0, 0, 'Mantova', 'Piazza', 'Sordello', 0),
(6, 'F', 'Palazzo Ducale, Atrio degli Arcieri', 0, 0, 'Mantova', 'Piazza', 'Pallone', 0),
(7, 'G', 'Palazzo Ducale, Rustica', 0, 0, 'Mantova', 'Piazza', 'Santa Barbara', 0),
(8, 'H', 'Palazzo Te, Fruttiere', 0, 0, 'Mantova', 'Viale', 'Te', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `Persona`
--

CREATE TABLE IF NOT EXISTS `Persona` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_roman_ci DEFAULT NULL,
  `cognome` varchar(255) COLLATE utf8_roman_ci DEFAULT NULL,
  `alt_name` varchar(255) COLLATE utf8_roman_ci NOT NULL COMMENT 'per compagnie o nomi d''arte',
  `tipologia` enum('persona','compagnia','produzione','altro') COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `eventoLuogoData`
--
ALTER TABLE `eventoLuogoData`
  ADD PRIMARY KEY (`id_istanza`),
  ADD KEY `eventoluogodata_ibfk_1` (`id_evento`),
  ADD KEY `eventoluogodata_ibfk_2` (`id_luogo`);

--
-- Indici per le tabelle `Luogo`
--
ALTER TABLE `Luogo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Evento`
--
ALTER TABLE `Evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT per la tabella `eventoLuogoData`
--
ALTER TABLE `eventoLuogoData`
  MODIFY `id_istanza` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT per la tabella `Luogo`
--
ALTER TABLE `Luogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `Persona`
--
ALTER TABLE `Persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `eventoLuogoData`
--
ALTER TABLE `eventoLuogoData`
  ADD CONSTRAINT `eventoluogodata_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventoluogodata_ibfk_2` FOREIGN KEY (`id_luogo`) REFERENCES `Luogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
