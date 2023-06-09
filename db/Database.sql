-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Creato il: Giu 09, 2023 alle 16:03
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
  `password_hash` varchar(255) NOT NULL,
  `Flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Account`
--

INSERT INTO `Account` (`ID`, `Email`, `Nome`, `Cognome`, `Ruolo`, `password_hash`, `Flag`) VALUES
(60, 'admin@gmail.com', 'Admin', 'Admin', 'Amministratore', '$2y$10$zyI0xzJUx8KQN7j/hmjrpO.CjNmDVR7y6QKZC4ZrfX0IIKp27GRfa', 0),
(62, 'mod@gmail.com', 'Mod', 'Mod', 'Moderatore', '$2y$10$.QAQF5XGmKRzmjFZubY8ZeWfFr/Vm6TzP2ff43vqwXT91FuHDXq/q', 0),
(75, 'davidemento02@gmail.com', 'Davide', 'Mento', 'Studente', '$2y$10$NPFGgT1YWz/m.VokRKhfe.fOCnPrpXNT2ddW.V17mX3nf98AV79pi', 0),
(76, 'emanuelerusso@gmail.com', 'Emanuele', 'Russo', 'Studente', '$2y$10$cpQjBniE6mqbTifleqo92OQwkZ34GEBv.fJHEpvhYiPsCWmgDwYiK', 0),
(77, 'massimovillari@gmail.com', 'Massimo', 'Villari', 'Referente', '$2y$10$aoadY0dEJvtvE6m7kAyb.OtvD2nDj3xTzD62zcwQu9lmA9wTFjyLu', 0),
(79, 'pietrosciotto@gmail.com', 'Pietro', 'Sciotto', 'Esercente', '$2y$10$9vqqvLMiunTpDzWhdmGzMukKFtGeemogJuK90GNkMhTE5dqsHttDy', 0),
(80, 'alessandrobarbero@gmail.com', 'Alessandro', 'Barbero', 'Referente', '$2y$10$Y/Rq8HdBp33KKj4ESWqx3esm0wKMxN.KI8k0QiwFpQj8sdwD1LJda', 0),
(81, 'mariorossi@gmail.com', 'Mario', 'Rossi', 'Studente', '$2y$10$I2Fn9b0Kwt9lhvTtVYBrpOdfqvQAOqD7ptbHKfr9Juhn9FZsUi6La', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `Aggiornamenti_sito`
--

CREATE TABLE `Aggiornamenti_sito` (
  `ID_Aggiornamento` int NOT NULL,
  `Modifica` varchar(256) NOT NULL,
  `Operatore_modifica` varchar(128) NOT NULL,
  `Data_modifica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Aggiornamenti_sito`
--

INSERT INTO `Aggiornamenti_sito` (`ID_Aggiornamento`, `Modifica`, `Operatore_modifica`, `Data_modifica`) VALUES
(1, 'Sospeso account con ID = 61', 'Amministratore', '2023-05-31'),
(3, 'Ripristinato account con ID = 61', 'Amministratore', '2023-05-31'),
(4, 'Eliminata domanda con ID = 23', 'Moderatore', '2023-05-31'),
(5, 'Eliminato contratto con ID = 18', 'Moderatore', '2023-06-01'),
(6, 'Eliminato contratto con ID = 13', 'Moderatore', '2023-06-02'),
(7, 'Eliminata domanda con ID = 28', 'Moderatore', '2023-06-02');

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
(9, 'Sciotto Automobili', 'sciottoautomobili@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `Contratto`
--

CREATE TABLE `Contratto` (
  `ID_Contratto` int NOT NULL,
  `ID_Esercente` int NOT NULL,
  `ID_Domanda` int NOT NULL,
  `Matricola` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Data_Inizio` date DEFAULT NULL,
  `Periodo` varchar(128) NOT NULL,
  `Ore` int NOT NULL,
  `Stipendio` int NOT NULL,
  `Posizione` varchar(128) NOT NULL,
  `Stato` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Contratto`
--

INSERT INTO `Contratto` (`ID_Contratto`, `ID_Esercente`, `ID_Domanda`, `Matricola`, `Nome`, `Cognome`, `Data_Inizio`, `Periodo`, `Ore`, `Stipendio`, `Posizione`, `Stato`) VALUES
(25, 79, 34, 527917, 'Davide', 'Mento', '2023-06-09', '6 mesi', 30, 1300, 'Segretario', 'Accettato dallo studente'),
(26, 79, 35, 312312, 'Mario', 'Rossi', '2023-06-09', '6 mesi', 30, 1300, 'Segretario', 'Accettato dallo studente'),
(27, 79, 36, 312312, 'Mario', 'Rossi', '2023-06-09', '3 mesi', 30, 800, 'Addetto Alle Pulizie', 'Accettato dallo studente');

-- --------------------------------------------------------

--
-- Struttura della tabella `Dipartimento`
--

CREATE TABLE `Dipartimento` (
  `Account_ID` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Ruolo` varchar(128) NOT NULL,
  `Matricola` int DEFAULT NULL
) ;

--
-- Dump dei dati per la tabella `Dipartimento`
--

INSERT INTO `Dipartimento` (`Account_ID`, `Nome`, `Ruolo`, `Matricola`) VALUES
(75, 'MIFT', 'Studente', 527917),
(76, 'MIFT', 'Studente', 526889),
(77, 'MIFT', 'Referente', NULL),
(79, 'MIFT', 'Esercente', NULL),
(80, 'DICAM', 'Referente', NULL),
(81, 'DICAM', 'Studente', 312312);

-- --------------------------------------------------------

--
-- Struttura della tabella `Domande`
--

CREATE TABLE `Domande` (
  `ID_Domanda` int NOT NULL,
  `ID_Offerta` int NOT NULL,
  `ID_Esercente` int NOT NULL,
  `Stato` varchar(128) NOT NULL,
  `Matricola` int NOT NULL,
  `Commento` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Domande`
--

INSERT INTO `Domande` (`ID_Domanda`, `ID_Offerta`, `ID_Esercente`, `Stato`, `Matricola`, `Commento`) VALUES
(34, 33, 79, 'Accettato da esercente', 527917, 'Un ragazzo molto abile'),
(35, 33, 79, 'Accettato da esercente', 312312, 'Bravo'),
(36, 34, 79, 'Accettato da esercente', 312312, '');

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
(79, 'Pietro', 'Sciotto', 'Sciotto Automobili', 'sciottoautomobili@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `Offerte_di_lavoro`
--

CREATE TABLE `Offerte_di_lavoro` (
  `ID_Offerta` int NOT NULL,
  `ID_Esercente` int NOT NULL,
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

INSERT INTO `Offerte_di_lavoro` (`ID_Offerta`, `ID_Esercente`, `Nome_azienda`, `Ore`, `Indirizzo`, `Periodo`, `Stipendio`, `Posti_disponibili`, `Posizione`) VALUES
(33, 79, 'Sciotto Automobili', '30 Settimanali', 'Via Messina 20', '6 mesi', 1300, 0, 'Segretario'),
(34, 79, 'Sciotto Automobili', '30 Settimanali', 'Via Messina 20', '3 mesi', 800, 1, 'Addetto Alle Pulizie');

-- --------------------------------------------------------

--
-- Struttura della tabella `Operatori`
--

CREATE TABLE `Operatori` (
  `Account_ID` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Ruolo_operatore` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Operatori`
--

INSERT INTO `Operatori` (`Account_ID`, `Nome`, `Cognome`, `Ruolo_operatore`) VALUES
(60, 'Admin', 'Admin', 'Amministratore'),
(62, 'Mod', 'Mod', 'Moderatore');

-- --------------------------------------------------------

--
-- Struttura della tabella `Referente`
--

CREATE TABLE `Referente` (
  `Account_ID` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Referente`
--

INSERT INTO `Referente` (`Account_ID`, `Nome`, `Cognome`) VALUES
(77, 'Massimo', 'Villari'),
(80, 'Alessandro', 'Barbero');

-- --------------------------------------------------------

--
-- Struttura della tabella `Studente`
--

CREATE TABLE `Studente` (
  `Matricola` int NOT NULL,
  `Account_ID` int NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL,
  `Luogo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Studente`
--

INSERT INTO `Studente` (`Matricola`, `Account_ID`, `Nome`, `Cognome`, `Luogo`) VALUES
(312312, 81, 'Mario', 'Rossi', 'Catania'),
(526889, 76, 'Emanuele', 'Russo', 'Messina'),
(527917, 75, 'Davide', 'Mento', 'Messina');

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
-- Indici per le tabelle `Aggiornamenti_sito`
--
ALTER TABLE `Aggiornamenti_sito`
  ADD PRIMARY KEY (`ID_Aggiornamento`);

--
-- Indici per le tabelle `Azienda`
--
ALTER TABLE `Azienda`
  ADD PRIMARY KEY (`ID_Azienda`);

--
-- Indici per le tabelle `Contratto`
--
ALTER TABLE `Contratto`
  ADD PRIMARY KEY (`ID_Contratto`),
  ADD UNIQUE KEY `ID_Domanda` (`ID_Domanda`),
  ADD KEY `FK_Contratto_Esercente` (`ID_Esercente`);

--
-- Indici per le tabelle `Dipartimento`
--
ALTER TABLE `Dipartimento`
  ADD PRIMARY KEY (`Account_ID`),
  ADD UNIQUE KEY `unique_nome_referente` (`Nome`,`end`(Referente));

--
-- Indici per le tabelle `Domande`
--
ALTER TABLE `Domande`
  ADD PRIMARY KEY (`ID_Domanda`),
  ADD KEY `FK_ID_Domanda_Offerta` (`ID_Offerta`),
  ADD KEY `FK_ID_Domanda_Esercente` (`ID_Esercente`),
  ADD KEY `FK_ID_Domanda_Matricola` (`Matricola`);

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
-- Indici per le tabelle `Operatori`
--
ALTER TABLE `Operatori`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indici per le tabelle `Referente`
--
ALTER TABLE `Referente`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indici per le tabelle `Studente`
--
ALTER TABLE `Studente`
  ADD PRIMARY KEY (`Matricola`,`Account_ID`),
  ADD KEY `FK_Studente_ID` (`Account_ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Account`
--
ALTER TABLE `Account`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT per la tabella `Aggiornamenti_sito`
--
ALTER TABLE `Aggiornamenti_sito`
  MODIFY `ID_Aggiornamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `Azienda`
--
ALTER TABLE `Azienda`
  MODIFY `ID_Azienda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `Contratto`
--
ALTER TABLE `Contratto`
  MODIFY `ID_Contratto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `Domande`
--
ALTER TABLE `Domande`
  MODIFY `ID_Domanda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la tabella `Offerte_di_lavoro`
--
ALTER TABLE `Offerte_di_lavoro`
  MODIFY `ID_Offerta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Contratto`
--
ALTER TABLE `Contratto`
  ADD CONSTRAINT `FK_Contratto_Domanda` FOREIGN KEY (`ID_Domanda`) REFERENCES `Domande` (`ID_Domanda`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Contratto_Esercente` FOREIGN KEY (`ID_Esercente`) REFERENCES `Esercente` (`Account_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `Domande`
--
ALTER TABLE `Domande`
  ADD CONSTRAINT `FK_ID_Domanda_Esercente` FOREIGN KEY (`ID_Esercente`) REFERENCES `Esercente` (`Account_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_ID_Domanda_Matricola` FOREIGN KEY (`Matricola`) REFERENCES `Studente` (`Matricola`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_ID_Domanda_Offerta` FOREIGN KEY (`ID_Offerta`) REFERENCES `Offerte_di_lavoro` (`ID_Offerta`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `Esercente`
--
ALTER TABLE `Esercente`
  ADD CONSTRAINT `FK_Esercente_ID` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `Operatori`
--
ALTER TABLE `Operatori`
  ADD CONSTRAINT `FK_Operatore_Account` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `Referente`
--
ALTER TABLE `Referente`
  ADD CONSTRAINT `FK_Referente_ID` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limiti per la tabella `Studente`
--
ALTER TABLE `Studente`
  ADD CONSTRAINT `FK_Studente_ID` FOREIGN KEY (`Account_ID`) REFERENCES `Account` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
