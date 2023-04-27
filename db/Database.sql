-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Creato il: Apr 27, 2023 alle 10:35
-- Versione del server: 8.0.32
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
-- Struttura della tabella `Azienda`
--

CREATE TABLE `Azienda` (
  `ID_Azienda` int NOT NULL,
  `Nome_Azienda` varchar(128) NOT NULL,
  `Indirizzo` varchar(128) NOT NULL,
  `Tipologia` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `Offerte`
--

CREATE TABLE `Offerte` (
  `ID_azienda` int NOT NULL,
  `Nome_azienda` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Posizione` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Periodo` varchar(128) NOT NULL,
  `Stipendio` varchar(128) NOT NULL,
  `Indirizzo` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ore` int NOT NULL,
  `Posti_disponibili` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Offerte`
--

INSERT INTO `Offerte` (`ID_azienda`, `Nome_azienda`, `Posizione`, `Periodo`, `Stipendio`, `Indirizzo`, `Ore`, `Posti_disponibili`) VALUES
(111111, 'Number One', 'Buttafuori', '6 mesi', '1.200,00-mese', 'Via Basalari 200, Brescia', 10, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `Email` varchar(255) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Ruolo` varchar(128) NOT NULL,
  `Matricola` int DEFAULT NULL,
  `id_azienda` int DEFAULT NULL,
  `id_universita` int DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`Email`, `Nome`, `Cognome`, `Ruolo`, `Matricola`, `id_azienda`, `id_universita`, `password_hash`, `ID`) VALUES
('cicciomontecucco@gmail.com', 'Ciccio', 'Montecucco', 'Studente', 123456, NULL, NULL, '$2y$10$evvBUf.iKMGjjxDPAV0UhOOPe0CtL.ze.xHlDxFYAsNfdJePajnr2', 4),
('cicciorusso@gmail.com', 'Ciccio', 'Russo', 'Studente', 444444, NULL, NULL, '$2y$10$MahDjXnfH24HOdkLbUPr1.7QnfCbne8.Yr4Ec7lNfG9wUeWyGjWGG', 3),
('davidemento02@gmail.com', 'Davide', 'Mento', 'Studente', 527917, NULL, NULL, '$2y$10$m4hMGRQkiUJv8TmEViQcQui.LRe9iZO2UasGSdUVDPZlmcOKCkHhC', 1),
('emanuelerusso02@gmail.com', 'Emanuele', 'Russo', 'Studente', 539827, NULL, NULL, '$2y$10$PesSa9fGbdwzMxor2mmID.TE8Egf1.Z.iJUGLdE9rtgbCIqVjAUiq', 2),
('mvillari@gmai.com', 'Mimmo', 'Villari', 'Studente', 323232, NULL, NULL, '$2y$10$/HlQEWMxVRj2YMVjtdsNj.K5573Jvq5tmrodtVZkPT.ZhVKHX8t5i', 6),
('sbasalari@gmail.com', 'Steven', 'Basalari', 'Esercente', NULL, 111111, NULL, '$2y$10$eySTuSk1Qr3uzUKRd4Ua6uTU0CTm.kXDgVE0O2DQxRd2kRRf7hrZq', 5);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Azienda`
--
ALTER TABLE `Azienda`
  ADD PRIMARY KEY (`ID_Azienda`);

--
-- Indici per le tabelle `Offerte`
--
ALTER TABLE `Offerte`
  ADD PRIMARY KEY (`ID_azienda`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Utente`
--
ALTER TABLE `Utente`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
