-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Mar 27, 2017 alle 06:49
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
  `speciale_ragazzi` tinyint(1) NOT NULL DEFAULT '0',
  `desc_ita` text COLLATE utf8_roman_ci NOT NULL,
  `desc_eng` text COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `Evento`
--

INSERT INTO `Evento` (`id`, `nome`, `durata`, `tipologia`, `eta_min`, `eta_max`, `ticket`, `speciale_ragazzi`, `desc_ita`, `desc_eng`) VALUES
(1, 'Rumore di Acque', 60, 'Spettacolo', 13, 150, 0, 0, '', ''),
(2, 'Il Fuoco nel Silenzio', 70, 'Spettacolo', 6, 150, 0, 0, '', ''),
(3, 'MYLOEMAYA', 50, 'Spettacolo', 1, 3, 1, 0, 'Un lungo tavolo bianco e due curiosi personaggi che inventano un nuovo modo di  apparecchiare dove tutto diventa musica, canto, gioco. Ogni stoviglia è un suono per uno spettacolo di teatro musicale ed esperienza tattile che permette di avvicinare i più piccoli al mondo  dell’opera lirica. Da ascoltare insieme,  \r\nda cantare insieme.', 'A table set becomes a sound art installation to be explored and listened to.'),
(4, 'Il Giardino di Gaia', 45, 'Spettacolo', 1, 5, 1, 0, '', ''),
(5, 'Buio', 45, 'Spettacolo', 2, 5, 1, 0, '', ''),
(6, 'Semino', 45, 'Spettacolo', 2, 6, 1, 0, '', ''),
(7, 'Lupus in Fabula', 45, 'Spettacolo', 3, 5, 1, 0, '', ''),
(8, 'Let''s play Kawara', 60, 'Laboratorio', 3, 5, 1, 0, '', ''),
(9, 'A Passeggio con i Pennelli', 45, 'Laboratorio', 3, 7, 0, 0, '', ''),
(10, 'Le Città Incantate - suoni e visioni dal Giappone', 45, 'Spettacolo', 3, 10, 1, 0, '', ''),
(11, 'L''ultimo Lupo', 120, 'Film', 6, 150, 1, 0, '', ''),
(12, 'Playcity', 120, 'Formazione', 0, 0, 0, 0, '', ''),
(13, 'Little Bang', 60, 'Spettacolo', 4, 10, 1, 0, '', ''),
(14, 'Tripula', 55, 'Spettacolo', 5, 10, 1, 0, 'Torna a grande richiesta lo spettacolo emozionante sull’avventura dei fratelli Montgolfier che diventa metafora del volo e del potere d’immaginazione dell’uomo che rende possibili importanti progressi. Come in un vero e proprio  viaggio in mongolfiera gli spettatori vengono fatti accomodare in un enorme pallone aerostatico, ne diventano l’equipaggio, e sono attivamente coinvolti in alcune azioni necessarie alla navigazione. Divertimento assicurato che fa della didattica un gioco da ragazzi.', 'An exciting show about Mongolfier brothers’ adventure that becomes a metaphor of flight and human imagination.'),
(15, 'In Viaggio per l''Europa', 120, 'Formazione', 14, 18, 0, 1, 'Uno spazio di confronto dedicato agli studenti degli Istituti Superiori per  scoprire strumenti e possibilità che l’Europa offre alle nuove generazioni nell’esplorazioni di settori professionali legati alla cultura e al teatro. Un appuntamento che offre nuove ispirazioni e contenuti per  immaginare  il  proprio futuro grazie allo SVE, Erasmus +, Europa Creativa e dove familiarizzare meglio con obiettivi e contenuti possibili dell’alternanza scuola – lavoro.', 'A space to discuss about the instruments and the opportunities that are offered by  Europe to new generations exploring the professional sectors that are linked to culture and theatre.');

-- --------------------------------------------------------

--
-- Struttura della tabella `Luogo`
--

CREATE TABLE IF NOT EXISTS `Luogo` (
  `id` int(11) NOT NULL,
  `id_lettera` varchar(1) CHARACTER SET latin1 NOT NULL COMMENT 'id del volantino evento',
  `colore` enum('orange','green','blue','red') COLLATE utf8_roman_ci NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `latitudine` float NOT NULL,
  `longitudine` float NOT NULL,
  `citta` varchar(25) CHARACTER SET latin1 NOT NULL,
  `tipoVia` enum('Via','Piazza','Viale','Corso') CHARACTER SET latin1 NOT NULL DEFAULT 'Via',
  `via` varchar(75) CHARACTER SET latin1 NOT NULL,
  `numero_civico` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `Luogo`
--

INSERT INTO `Luogo` (`id`, `id_lettera`, `colore`, `nome`, `latitudine`, `longitudine`, `citta`, `tipoVia`, `via`, `numero_civico`) VALUES
(1, 'A', 'orange', 'Biblioteca Baratta', 45.1484, 10.7959, 'Mantova', 'Via', 'Giuseppe Garibaldi', 88),
(2, 'B', 'orange', 'Centro Culturale Contardo Ferrini', 45.1521, 10.7919, 'Mantova', 'Via', 'Giulio Romano', 15),
(3, 'C', 'orange', 'FOR.MA', 45.1517, 10.795, 'Mantova', 'Via', 'Lorenzo Gandolfo', 13),
(4, 'D', 'orange', 'Hub Socio Educativo', 45.146, 10.7986, 'Mantova', 'Via', 'Leopoldo Camillo Volta', 9),
(5, 'E', 'orange', 'Palazzo Ducale, Aula Didattica', 0, 0, 'Mantova', 'Piazza', 'Sordello', 0),
(6, 'F', 'orange', 'Palazzo Ducale, Atrio degli Arcieri', 0, 0, 'Mantova', 'Piazza', 'Pallone', 0),
(7, 'G', 'orange', 'Palazzo Ducale, Rustica', 0, 0, 'Mantova', 'Piazza', 'Santa Barbara', 0),
(8, 'H', 'orange', 'Palazzo Te, Fruttiere', 0, 0, 'Mantova', 'Viale', 'Te', 0),
(9, 'I', 'green', 'Piazza Broletto', 0, 0, 'Mantova', 'Piazza', 'Broletto', 0),
(10, 'J', 'green', 'Piazza Concordia', 0, 0, 'Mantova', 'Piazza', 'Concordia', 0),
(11, 'K', 'green', 'Piazza Erbe', 0, 0, 'Mantova', 'Piazza', 'Erbe', 0),
(12, 'L', 'green', 'Piazza Marconi', 0, 0, 'Mantova', 'Piazza', 'Marconi', 0),
(13, 'N', 'green', 'Piazza Sordello', 0, 0, 'Mantova', 'Piazza', 'Sordello', 0),
(14, 'O', 'orange', 'Sala Oberdan', 0, 0, 'Mantova', 'Via', 'Oberdan', 11),
(15, 'P', 'orange', 'Salone Mantegnesco, Fondazione Università di Mantova', 0, 0, 'Mantova', 'Via', 'Scarsellini', 2),
(22, 'V', 'orange', 'Teatro Bibiena', 45.158, 10.7982, 'Mantova', 'Via', 'Accademia', 47),
(27, '1', 'blue', 'Gazebo Informativo', 0, 0, 'Mantova', 'Piazza', 'Sordello', 0),
(32, '6', 'red', 'Punto Zero/Biglietteria', 0, 0, 'Mantova', 'Piazza', 'Broletto', 5),
(33, '7', 'blue', 'Stazione FS', 0, 0, 'Mantova', 'Piazza', 'Don Leoni', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `Persona`
--

CREATE TABLE IF NOT EXISTS `Persona` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_roman_ci DEFAULT NULL,
  `cognome` varchar(255) COLLATE utf8_roman_ci DEFAULT NULL,
  `alt_name` varchar(255) COLLATE utf8_roman_ci DEFAULT NULL COMMENT 'per compagnie o nomi d''arte',
  `tipologia` enum('persona','compagnia','produzione','altro','sponsor') COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `Persona`
--

INSERT INTO `Persona` (`id`, `nome`, `cognome`, `alt_name`, `tipologia`) VALUES
(1, 'Marcelo', 'Maravilla', 'En?gma', 'persona'),
(2, NULL, NULL, 'Pixar', 'produzione'),
(3, 'Lorenzo', 'Cherubini', 'Jovanotti', 'persona'),
(4, NULL, NULL, 'Microsoft', 'produzione'),
(5, NULL, NULL, 'Apple', 'produzione'),
(6, 'Paolino', 'Paperino', NULL, 'persona'),
(7, 'Zlatan', 'Ibrahimovic', NULL, 'persona'),
(8, 'Francesco', 'Facchinetti', 'Capitano uncino con pistola', 'persona'),
(9, NULL, NULL, 'Machete Crew', 'compagnia'),
(10, NULL, NULL, 'Comune di Narnia', 'produzione'),
(11, NULL, NULL, 'Compagnia delle Ombre', 'compagnia'),
(12, NULL, NULL, 'Luci Basse', 'compagnia'),
(13, NULL, NULL, 'Silvano Belfiore Band', 'compagnia'),
(14, NULL, NULL, 'Club Dogo', 'compagnia'),
(15, NULL, NULL, 'Universal', 'produzione'),
(16, NULL, NULL, 'Warner', 'produzione'),
(17, 'Vittorio', 'Sgarbi', 'Capra', 'altro'),
(18, 'Son', 'Goku', 'Kakarot', 'altro'),
(19, NULL, NULL, 'Bustaffa', 'sponsor'),
(20, NULL, NULL, 'Levoni', 'sponsor'),
(21, 'Matteo', 'Terzi', 'Soltanto', 'persona'),
(22, NULL, NULL, 'In search of Europe', 'compagnia'),
(23, NULL, NULL, 'Meeting Modern Visionaries', 'compagnia'),
(24, 'Lucas', 'De Man', '', 'persona'),
(25, 'Bruno', 'Marasà', 'Direttore presso bla bla', 'persona'),
(26, 'Barbara', 'Forni', 'Opportunità formative nel blabla', 'persona'),
(27, 'Giacomo', 'D''Arrigo', 'Direttore generale bla bla', 'persona'),
(28, NULL, NULL, 'Ufficio d’ informazione a Milano del Parlamento europeo e Agenzia Nazionale per i Giovani', 'altro'),
(29, NULL, NULL, 'AsLiCo', 'produzione'),
(30, NULL, NULL, 'Scarlattineteatro_Campsirago Residenza', 'produzione'),
(31, NULL, NULL, 'Opera Baby', 'altro'),
(32, 'Serena', 'Crocco', NULL, 'persona'),
(33, 'Sara', 'Milani', NULL, 'persona'),
(34, 'Anna', 'Fascendini', NULL, 'persona');

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
  `speciale` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `eventoLuogoData`
--

INSERT INTO `eventoLuogoData` (`id_istanza`, `id_evento`, `id_luogo`, `data`, `orario`, `orario_esteso`, `speciale`) VALUES
(1, 3, 7, '2016-10-26', '09:30:00', '', 0),
(2, 3, 7, '2016-10-26', '17:00:00', '', 0),
(3, 3, 7, '2016-10-27', '09:30:00', '', 0),
(4, 3, 7, '2016-10-27', '11:00:00', '', 0),
(5, 3, 7, '2016-10-27', '17:00:00', '', 0),
(6, 3, 7, '2016-10-28', '09:30:00', '', 0),
(7, 13, 6, '2016-10-26', '10:00:00', '', 0),
(8, 13, 6, '2016-10-26', '17:00:00', '', 0),
(9, 13, 6, '2016-10-27', '09:30:00', '', 0),
(10, 13, 6, '2016-10-27', '17:00:00', '', 0),
(11, 13, 6, '2016-10-28', '09:30:00', '', 0),
(12, 13, 6, '2016-10-28', '17:00:00', '', 0),
(13, 13, 6, '2016-10-29', '10:30:00', '', 0),
(14, 13, 6, '2016-10-29', '16:00:00', '', 0),
(15, 14, 2, '2016-10-31', '20:30:00', '', 1),
(16, 14, 2, '2016-11-01', '11:00:00', '', 1),
(17, 14, 2, '2016-11-01', '18:00:00', '', 1),
(18, 14, 2, '2016-11-02', '09:00:00', '', 0),
(19, 14, 2, '2016-11-02', '11:00:00', '', 0),
(20, 15, 22, '2016-10-28', '14:30:00', '', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `eventoPersona`
--

CREATE TABLE IF NOT EXISTS `eventoPersona` (
  `id_istanza` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `tipologia` enum('produzione','coproduzione','scritto da','in collaborazione con','progetto di','regia','compagnia','a cura di','musica','altro-interviene','video','progetto','con') COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Dump dei dati per la tabella `eventoPersona`
--

INSERT INTO `eventoPersona` (`id_istanza`, `id_evento`, `id_persona`, `tipologia`) VALUES
(1, 15, 28, 'in collaborazione con'),
(2, 15, 26, 'altro-interviene'),
(3, 15, 27, 'altro-interviene'),
(4, 15, 25, 'altro-interviene'),
(5, 15, 22, 'video'),
(6, 15, 23, 'video'),
(7, 15, 24, 'video'),
(8, 15, 21, 'musica'),
(9, 3, 29, 'coproduzione'),
(11, 3, 31, 'progetto'),
(12, 3, 32, 'con'),
(13, 3, 33, 'con'),
(14, 3, 34, 'regia'),
(15, 3, 30, 'coproduzione');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`id`);

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
-- Indici per le tabelle `eventoLuogoData`
--
ALTER TABLE `eventoLuogoData`
  ADD PRIMARY KEY (`id_istanza`),
  ADD KEY `eventoluogodata_ibfk_1` (`id_evento`),
  ADD KEY `eventoluogodata_ibfk_2` (`id_luogo`);

--
-- Indici per le tabelle `eventoPersona`
--
ALTER TABLE `eventoPersona`
  ADD PRIMARY KEY (`id_istanza`),
  ADD KEY `eventopersona_ibfk_1` (`id_evento`),
  ADD KEY `eventopersona_ibfk_2` (`id_persona`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Evento`
--
ALTER TABLE `Evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT per la tabella `Luogo`
--
ALTER TABLE `Luogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT per la tabella `Persona`
--
ALTER TABLE `Persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT per la tabella `eventoLuogoData`
--
ALTER TABLE `eventoLuogoData`
  MODIFY `id_istanza` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT per la tabella `eventoPersona`
--
ALTER TABLE `eventoPersona`
  MODIFY `id_istanza` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `eventoLuogoData`
--
ALTER TABLE `eventoLuogoData`
  ADD CONSTRAINT `eventoluogodata_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventoluogodata_ibfk_2` FOREIGN KEY (`id_luogo`) REFERENCES `Luogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `eventoPersona`
--
ALTER TABLE `eventoPersona`
  ADD CONSTRAINT `eventopersona_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `Evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventopersona_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `Persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
