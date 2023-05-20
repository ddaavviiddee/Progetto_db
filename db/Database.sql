-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Creato il: Mag 20, 2023 alle 16:31
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
CREATE DATABASE IF NOT EXISTS `php_docker` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `php_docker`;

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
(1, 'davidemento02@gmail.com', 'Davide', 'Mento', 'Studente', '$2y$10$/23NgRLR5.C4vCYzRO7E1eULNuQJp4sMc2m2wj7yFI5tXPw/oZkzu'),
(2, 'stevenbasalari@gmail.com', 'Steven', 'Basalari', 'Esercente', '$2y$10$FWz9LFnzBssz0mskuZN4EudMDUYoi5Y4UT5HNnyGwmviNwBln.NfK'),
(3, 'massimovillari0@gmail.com', 'Massimo', 'Villari', 'Referente', '$2y$10$pF6SdpHdNf47V6HTLMH/ZOqPa1Q7k9GSHYJ9aED13ZIjJDMb5ONP.');

-- --------------------------------------------------------

--
-- Struttura della tabella `Esercente`
--

CREATE TABLE `Esercente` (
  `Email_aziendale` varchar(128) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Nome_azienda` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Esercente`
--

INSERT INTO `Esercente` (`Email_aziendale`, `Nome`, `Cognome`, `Nome_azienda`) VALUES
('numberone@gmail.com', 'Steven', 'Basalari', 'NumberOne');

-- --------------------------------------------------------

--
-- Struttura della tabella `Referente`
--

CREATE TABLE `Referente` (
  `Dipartimento` varchar(128) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Referente`
--

INSERT INTO `Referente` (`Dipartimento`, `Nome`, `Cognome`) VALUES
('MIFT', 'Massimo', 'Villari');

-- --------------------------------------------------------

--
-- Struttura della tabella `Studente`
--

CREATE TABLE `Studente` (
  `Matricola` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Luogo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Studente`
--

INSERT INTO `Studente` (`Matricola`, `Nome`, `Cognome`, `Luogo`) VALUES
(312321, 'Davide', 'Mento', 'Messina');

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
-- Indici per le tabelle `Esercente`
--
ALTER TABLE `Esercente`
  ADD PRIMARY KEY (`Email_aziendale`);

--
-- Indici per le tabelle `Referente`
--
ALTER TABLE `Referente`
  ADD PRIMARY KEY (`Dipartimento`);

--
-- Indici per le tabelle `Studente`
--
ALTER TABLE `Studente`
  ADD PRIMARY KEY (`Matricola`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Account`
--
ALTER TABLE `Account`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
