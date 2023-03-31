-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Creato il: Mar 31, 2023 alle 17:04
-- Versione del server: 8.0.32
-- Versione PHP: 8.1.15

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
('davidemento02@gmail.com', 'Davide', 'Mento', 'Studente', 527917, NULL, NULL, '$2y$10$m4hMGRQkiUJv8TmEViQcQui.LRe9iZO2UasGSdUVDPZlmcOKCkHhC', 1),
('emanuelerusso02@gmail.com', 'Emanuele', 'Russo', 'Studente', 539827, NULL, NULL, '$2y$10$PesSa9fGbdwzMxor2mmID.TE8Egf1.Z.iJUGLdE9rtgbCIqVjAUiq', 2);

--
-- Indici per le tabelle scaricate
--

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
