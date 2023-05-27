-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Creato il: Mag 27, 2023 alle 13:36
-- Versione del server: 8.0.33
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_docker`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Account`
--

CREATE TABLE `Account` (
  `ID` int NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Ruolo` varchar(128) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Account`
--

INSERT INTO `Account` (`ID`, `Email`, `Nome`, `Cognome`, `Ruolo`, `password_hash`) VALUES
(35, 'silvioberlu@gmail.com', 'Silvio', 'Berlusconi', 'Esercente', '$2y$10$hVtswzvSmal6icZH/iVt5eFZnnKbyruUMNKew7zNRZI.DzIIo8Qva'),
(36, 'stevenbasalari@gmail.com', 'Steven ', 'Basalari', 'Esercente', '$2y$10$qLcwta2am4GU8l1eAyDjHe90q4jnYxQuAgFs8GxEyxKkTRcwhuURO'),
(45, 'massimovillari@gmail.com', 'Massimo', 'Villari', 'Referente', '$2y$10$CXyVDd7yjwimUvsWlahwSeY1m1K/CdwcdQznVSm54CCRSiyYOWtkq'),
(46, 'enzoferrari@gmail.com', 'Enzo', 'Ferrari', 'Esercente', '$2y$10$NFyBjZrYvBMouI2PQzuxmeELLU2pZHi9Vy8GYB18pa3eqMJ3LpPX.'),
(49, 'davidemento02@gmail.com', 'Davide', 'Mento', 'Studente', '$2y$10$yS3zXwV0/UHguymP/AsvG.8P8KbeadlUL/L5mDPpYhu6e/cdl64vS'),
(50, 'mariafazio@gmail.com', 'Maria', 'Fazio', 'Referente', '$2y$10$as1TggNcYWe9UYpKsHjPT.0hDPyGzf.EuIAUPcvIK//LNqH0jotpq'),
(51, 'mariorossi@gmail.com', 'Mario ', 'Rossi', 'Studente', '$2y$10$a.lDIiABMpzM2Sr5cj15zODrEknp7dRmXGJB7USh45Bzh.eeK.Y9K'),
(52, 'emanuelerusso@gmail.com', 'Emanuele', 'Russo', 'Studente', '$2y$10$PM065d6o9K2V./83EVcnXOcEMt.YOoIo2VqDrwl/k5bcBUwvFKSnW'),
(53, 'rosettastone@gmail.com', 'Rosetta', 'Stone', 'Referente', '$2y$10$JPX0dN1sZ56pZiulGyRpIO0fkAxthPCggEI6V6XCeGJnys6RMFZn.');

-- --------------------------------------------------------

--
-- Struttura della tabella `Azienda`
--

CREATE TABLE `Azienda` (
  `ID_Azienda` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Email_aziendale` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Azienda`
--

INSERT INTO `Azienda` (`ID_Azienda`, `Nome`, `Email_aziendale`) VALUES
(1, 'Mediaset', 'mediaset@gmail.com'),
(2, 'NumberOne', 'numberone@gmail.com'),
(3, 'Ferrari', 'ferrari@gmail.com'),
(4, 'Ferrari', 'ferrari@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `Domande`
--

CREATE TABLE `Domande` (
  `ID_Domanda` int NOT NULL,
  `Nome_azienda` varchar(128) NOT NULL,
  `Ore` varchar(128) NOT NULL,
  `Indirizzo` varchar(128) NOT NULL,
  `Periodo` varchar(128) NOT NULL,
  `Stipendio` int NOT NULL,
  `Posizione` varchar(128) NOT NULL,
  `Stato` varchar(128) NOT NULL,
  `Matricola` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Domande`
--

INSERT INTO `Domande` (`ID_Domanda`, `Nome_azienda`, `Ore`, `Indirizzo`, `Periodo`, `Stipendio`, `Posizione`, `Stato`, `Matricola`) VALUES
(1, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1300, 'Assistente cameraman', 'Accettato dal referente', 527917),
(2, 'NumberOne', '10 / settimana', 'Via Brescia 20', '3 mesi', 1200, 'Buttafuori', 'Accettato da esercente', 527917),
(3, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1000, 'Spazzino', 'Accettato dal referente', 527917),
(6, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1200, 'Barista', 'In attesa', 312321),
(7, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1000, 'Spazzino', 'Accettato dal referente', 526889),
(8, 'NumberOne', '30 / settimana', 'Via Brescia 20', '3 mesi', 1200, 'Barista', 'Accettato da esercente', 527917),
(9, 'NumberOne', '30 Settimanali', 'Via Brescia 20', '3 mesi', 1800, 'DJ', 'In attesa', 527917);

-- --------------------------------------------------------

--
-- Struttura della tabella `Esercente`
--

CREATE TABLE `Esercente` (
  `Account_ID` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Nome_azienda` varchar(128) NOT NULL,
  `Email_aziendale` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Esercente`
--

INSERT INTO `Esercente` (`Account_ID`, `Nome`, `Cognome`, `Nome_azienda`, `Email_aziendale`) VALUES
(35, 'Silvio', 'Berlusconi', 'Mediaset', 'mediaset@gmail.com'),
(36, 'Steven ', 'Basalari', 'NumberOne', 'numberone@gmail.com'),
(46, 'Enzo', 'Ferrari', 'Ferrari', 'ferrari@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `Offerte_di_lavoro`
--

CREATE TABLE `Offerte_di_lavoro` (
  `ID_Offerta` int NOT NULL,
  `Nome_azienda` varchar(128) NOT NULL,
  `Ore` varchar(128) NOT NULL,
  `Indirizzo` varchar(128) NOT NULL,
  `Periodo` varchar(128) NOT NULL,
  `Stipendio` int NOT NULL,
  `Posti_disponibili` int NOT NULL,
  `Posizione` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Offerte_di_lavoro`
--

INSERT INTO `Offerte_di_lavoro` (`ID_Offerta`, `Nome_azienda`, `Ore`, `Indirizzo`, `Periodo`, `Stipendio`, `Posti_disponibili`, `Posizione`) VALUES
(5, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1300, 0, 'Assistente cameraman'),
(7, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1000, 0, 'Spazzino'),
(8, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1200, 1, 'Barista'),
(16, 'NumberOne', '10 / settimana', 'Via Brescia 20', '6 mesi', 1400, 4, 'Buttafuori'),
(18, 'NumberOne', '30 / settimana', 'Via Brescia 20', '3 mesi', 1200, 5, 'Barista'),
(23, 'NumberOne', '30 Settimanali', 'Via Brescia 20', '3 mesi', 1800, 4, 'DJ');

-- --------------------------------------------------------

--
-- Struttura della tabella `Referente`
--

CREATE TABLE `Referente` (
  `Account_ID` int NOT NULL,
  `Dipartimento` varchar(128) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Referente`
--

INSERT INTO `Referente` (`Account_ID`, `Dipartimento`, `Nome`, `Cognome`) VALUES
(45, 'MIFT', 'Massimo', 'Villari'),
(49, 'MIFT', 'Davide', 'Cognome'),
(50, 'MIFT', 'Maria', 'Fazio'),
(51, 'DICAM', 'Mario ', 'Rossi'),
(52, 'MIFT', 'Emanuele', 'Russo'),
(53, 'DICAM', 'Rosetta', 'Stone');

-- --------------------------------------------------------

--
-- Struttura della tabella `Studente`
--

CREATE TABLE `Studente` (
  `Matricola` int NOT NULL,
  `Account_ID` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Luogo` varchar(128) NOT NULL,
  `Dipartimento` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Studente`
--

INSERT INTO `Studente` (`Matricola`, `Account_ID`, `Nome`, `Cognome`, `Luogo`, `Dipartimento`) VALUES
(312321, 51, 'Mario ', 'Rossi', 'Catania', 'DICAM'),
(526889, 52, 'Emanuele', 'Russo', 'Messina', 'MIFT'),
(527917, 49, 'Davide', 'Mento', 'Messina', 'MIFT');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indici per le tabelle `Azienda`
--
ALTER TABLE `Azienda`
  ADD PRIMARY KEY (`ID_Azienda`);

--
-- Indici per le tabelle `Domande`
--
ALTER TABLE `Domande`
  ADD PRIMARY KEY (`ID_Domanda`);

--
-- Indici per le tabelle `Esercente`
--
ALTER TABLE `Esercente`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indici per le tabelle `Offerte_di_lavoro`
--
ALTER TABLE `Offerte_di_lavoro`
  ADD PRIMARY KEY (`ID_Offerta`);

--
-- Indici per le tabelle `Referente`
--
ALTER TABLE `Referente`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indici per le tabelle `Studente`
--
ALTER TABLE `Studente`
  ADD PRIMARY KEY (`Matricola`,`Account_ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Account`
--
ALTER TABLE `Account`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT per la tabella `Azienda`
--
ALTER TABLE `Azienda`
  MODIFY `ID_Azienda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `Domande`
--
ALTER TABLE `Domande`
  MODIFY `ID_Domanda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `Offerte_di_lavoro`
--
ALTER TABLE `Offerte_di_lavoro`
  MODIFY `ID_Offerta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
