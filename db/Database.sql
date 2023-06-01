-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Creato il: Giu 01, 2023 alle 16:04
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
(35, 'silvioberlu@gmail.com', 'Silvio', 'Berlusconi', 'Esercente', '$2y$10$hVtswzvSmal6icZH/iVt5eFZnnKbyruUMNKew7zNRZI.DzIIo8Qva', 0),
(36, 'stevenbasalari@gmail.com', 'Steven ', 'Basalari', 'Esercente', '$2y$10$qLcwta2am4GU8l1eAyDjHe90q4jnYxQuAgFs8GxEyxKkTRcwhuURO', 0),
(45, 'massimovillari@gmail.com', 'Massimo', 'Villari', 'Referente', '$2y$10$CXyVDd7yjwimUvsWlahwSeY1m1K/CdwcdQznVSm54CCRSiyYOWtkq', 0),
(46, 'enzoferrari@gmail.com', 'Enzo', 'Ferrari', 'Esercente', '$2y$10$NFyBjZrYvBMouI2PQzuxmeELLU2pZHi9Vy8GYB18pa3eqMJ3LpPX.', 0),
(49, 'davidemento02@gmail.com', 'Davide', 'Mento', 'Studente', '$2y$10$yS3zXwV0/UHguymP/AsvG.8P8KbeadlUL/L5mDPpYhu6e/cdl64vS', 0),
(51, 'mariorossi@gmail.com', 'Mario ', 'Rossi', 'Studente', '$2y$10$a.lDIiABMpzM2Sr5cj15zODrEknp7dRmXGJB7USh45Bzh.eeK.Y9K', 0),
(52, 'emanuelerusso@gmail.com', 'Emanuele', 'Russo', 'Studente', '$2y$10$PM065d6o9K2V./83EVcnXOcEMt.YOoIo2VqDrwl/k5bcBUwvFKSnW', 0),
(55, 'francescobruni@gmail.com', 'Francesco', 'Bruni', 'Studente', '$2y$10$BbVznSlu0aVUbv0QrteGBOkuAv65lMuUqeuqQRu0RrcM/LugwY6aS', 0),
(56, 'jeffbezos@gmail.com', 'Jeff', 'Bezos', 'Esercente', '$2y$10$HmscdA0riFOJ4.SjPGRBXOabXLwY1K7ne06fr6GxrhQ1xIaL5gyG.', 0),
(57, 'giovannifranco@gmail.com', 'Giovanni', 'Franco', 'Referente', '$2y$10$CptTv6Ux8BZi62JQiZ.xWuB4e5NqZXTQwHf85hRh9lopjjclKwlbm', 0),
(58, 'billgates@gmail.com', 'Bill', 'Gates', 'Esercente', '$2y$10$kO9tPXAMnT6/BBNE6WPcQeJhWZpP4rhOxnAl8odOxovJKpR8qO2qq', 0),
(59, 'cicciopasticcio@gmail.com', 'Ciccio', 'Pasticcio', 'Studente', '$2y$10$EpHpHLp48UVwVcCVZI1UTeCYJgFZetLLUiKwGcp2IW4zpvuBRu7Yi', 0),
(60, 'admin@gmail.com', 'Admin', 'Admin', 'Amministratore', '$2y$10$zyI0xzJUx8KQN7j/hmjrpO.CjNmDVR7y6QKZC4ZrfX0IIKp27GRfa', 0),
(61, 'brunobruni@gmail.com', 'Bruno', 'Bruni', 'Studente', '$2y$10$pKJdX2DuvfYrYjliLJrmYuJ5HWI7Ykm9COsxyZRN4XHf.Y.bjdSLy', 0),
(62, 'mod@gmail.com', 'Mod', 'Mod', 'Moderatore', '$2y$10$.QAQF5XGmKRzmjFZubY8ZeWfFr/Vm6TzP2ff43vqwXT91FuHDXq/q', 0),
(63, 'antoniociliberto@gmail.com', 'Antonio', 'Ciliberto', 'Studente', '$2y$10$9GPjdxX9O9OmU1xQJxwHHevbhQo3yveAFkuNfMJ9.CCbDGXI.AFOm', 0),
(64, 'elonmusk@gmail.com', 'Elon', 'Musk', 'Esercente', '$2y$10$t4TRM5cfmNfMT8t4Zvw9JOh3tKc/2iuS55INaHhFcngU6gDxPpZ0C', 0),
(66, 'giovanniscelto@gmail.com', 'Giovanni', 'Scelto', 'Studente', '$2y$10$g9VRimsaFdMn7BBHmLisTeKjZjHVRQXMQLJKLKdGkKz0i6ltckqpq', 0),
(67, 'timcook@gmail.com', 'Tim', 'Cook', 'Esercente', '$2y$10$fbj.S.jAotOJjUhySAtEhe/33Hjmo/OiVv5i04KjoVtlv1DqZ8QZq', 0);

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
(5, 'Eliminato contratto con ID = 18', 'Moderatore', '2023-06-01');

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
(5, 'Amazon', 'amazon@gmail.com'),
(6, 'Microsoft', 'microsoft@gmail.com'),
(7, 'Tesla', 'tesla@gmail.com'),
(8, 'Apple', 'apple@gmail.com');

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
  `Periodo` varchar(128) NOT NULL,
  `Ore` int NOT NULL,
  `Stipendio` int NOT NULL,
  `Posizione` varchar(128) NOT NULL,
  `Stato` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Contratto`
--

INSERT INTO `Contratto` (`ID_Contratto`, `ID_Esercente`, `ID_Domanda`, `Matricola`, `Nome`, `Cognome`, `Periodo`, `Ore`, `Stipendio`, `Posizione`, `Stato`) VALUES
(12, 46, 18, 527917, 'Davide', 'Mento', '12 mesi', 50, 2300, 'Macchinista', 'Accettato dallo studente'),
(13, 36, 19, 527917, 'Davide', 'Mento', '3 mesi', 30, 800, 'Parcheggiatore', 'In attesa dello studente'),
(16, 35, 21, 526889, 'Emanuele', 'Russo', '3 mesi', 30, 1200, 'Barista', 'Accettato dallo studente'),
(19, 64, 25, 678123, 'Antonio', 'Ciliberto', '6 mesi', 45, 1600, 'Programmatore', 'Accettato dallo studente'),
(20, 58, 29, 526889, 'Emanuele', 'Russo', '9 mesi', 40, 1800, 'Programmatore', 'In attesa dello studente'),
(21, 56, 31, 657132, 'Ciccio', 'Pasticcio', '12 mesi', 50, 1300, 'Magazziniere', 'Accettato dallo studente'),
(22, 67, 32, 647812, 'Giovanni', 'Scelto', '9 mesi', 50, 2300, 'Marketing', 'Accettato dallo studente');

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
(18, 28, 46, 'Accettato da esercente', 527917, 'Che sei bello'),
(19, 26, 36, 'Accettato da esercente', 527917, 'Ottimo parcheggiatore\r\n'),
(20, 25, 56, 'Accettato da esercente', 526889, 'ma wow'),
(21, 8, 35, 'Accettato da esercente', 526889, 'wow oh mio dio'),
(22, 29, 58, 'Accettato da esercente', 657132, 'Wow questo ragazzo è forte'),
(24, 30, 58, 'Accettato da esercente', 657132, 'Portato per essere un analista'),
(25, 31, 64, 'Accettato da esercente', 678123, 'Ottime abilità'),
(26, 16, 36, 'Accettato dal referente', 527917, 'Mi piace'),
(27, 28, 46, 'Accettato dal referente', 526889, 'Intelligente'),
(28, 24, 46, 'In attesa', 526889, ''),
(29, 29, 58, 'Accettato da esercente', 526889, 'Ottime capacità logiche'),
(31, 25, 56, 'Accettato da esercente', 657132, 'Schiena forte'),
(32, 32, 67, 'Accettato da esercente', 647812, 'Che bravo wow');

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
(46, 'Enzo', 'Ferrari', 'Ferrari', 'ferrari@gmail.com'),
(56, 'Jeff', 'Bezos', 'Amazon', 'amazon@gmail.com'),
(58, 'Bill', 'Gates', 'Microsoft', 'microsoft@gmail.com'),
(64, 'Elon', 'Musk', 'Tesla', 'tesla@gmail.com'),
(67, 'Tim', 'Cook', 'Apple', 'apple@gmail.com');

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
(5, 35, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1300, 0, 'Assistente cameraman'),
(7, 35, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1000, 0, 'Spazzino'),
(8, 35, 'Mediaset', '30 / settimana', 'Via Milano 20', '3 mesi', 1200, 0, 'Barista'),
(16, 36, 'NumberOne', '10 / settimana', 'Via Brescia 20', '6 mesi', 1400, 4, 'Buttafuori'),
(18, 36, 'NumberOne', '30 / settimana', 'Via Brescia 20', '3 mesi', 1200, 5, 'Barista'),
(23, 36, 'NumberOne', '30 Settimanali', 'Via Brescia 20', '3 mesi', 1800, 3, 'DJ'),
(24, 46, 'Ferrari', '40 Settimanali', 'Via Maranello 20', '6 mesi', 1600, 2, 'Meccanico'),
(25, 56, 'Amazon', '50 Settimanali', 'Via Nuova 20', '9 mesi', 1100, 2, 'Magazziniere'),
(26, 36, 'NumberOne', '30 Settimanali', 'Via Brescia 20', '3 mesi', 800, 2, 'Parcheggiatore'),
(27, 46, 'Ferrari', '30 Settimanali', 'Via Monza 20', '6 mesi', 1400, 2, 'Accounting'),
(28, 46, 'Ferrari', '50 Settimanali', 'Via Maranello 20', '12 mesi', 2300, 1, 'Macchinista'),
(29, 58, 'Microsoft', '40 Settimanali', 'Via Bill 20', '9 mesi', 1800, 1, 'Programmatore'),
(30, 58, 'Microsoft', '40 Settimanali', 'Via Ciccio 20', '9 mesi', 2100, 3, 'Analista'),
(31, 64, 'Tesla', '40 Settimanali', 'Via Stella 20', '6 mesi', 1500, 0, 'Programmatore'),
(32, 67, 'Apple', '50 Settimanali', 'Via California 20', '9 mesi', 2300, 2, 'Marketing');

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
  `Dipartimento` varchar(128) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `Cognome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `Referente`
--

INSERT INTO `Referente` (`Account_ID`, `Dipartimento`, `Nome`, `Cognome`) VALUES
(45, 'MIFT', 'Massimo', 'Villari'),
(51, 'DICAM', 'Mario ', 'Rossi'),
(57, 'Medicina', 'Giovanni', 'Franco');

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
(123123, 61, 'Bruno', 'Bruni', 'Palermo', 'MIFT'),
(312321, 51, 'Mario ', 'Rossi', 'Catania', 'DICAM'),
(526889, 52, 'Emanuele', 'Russo', 'Messina', 'MIFT'),
(527917, 49, 'Davide', 'Mento', 'Messina', 'MIFT'),
(531252, 55, 'Francesco', 'Bruni', 'Messina', 'Medicina'),
(647812, 66, 'Giovanni', 'Scelto', 'Messina', 'MIFT'),
(657132, 59, 'Ciccio', 'Pasticcio', 'Catania', 'MIFT'),
(678123, 63, 'Antonio', 'Ciliberto', 'Messina', 'MIFT');

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
-- Indici per le tabelle `Domande`
--
ALTER TABLE `Domande`
  ADD PRIMARY KEY (`ID_Domanda`),
  ADD KEY `FK_ID_Domanda_Offerta` (`ID_Offerta`),
  ADD KEY `FK_ID_Domanda_Esercente` (`ID_Esercente`);

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT per la tabella `Aggiornamenti_sito`
--
ALTER TABLE `Aggiornamenti_sito`
  MODIFY `ID_Aggiornamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `Azienda`
--
ALTER TABLE `Azienda`
  MODIFY `ID_Azienda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `Contratto`
--
ALTER TABLE `Contratto`
  MODIFY `ID_Contratto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `Domande`
--
ALTER TABLE `Domande`
  MODIFY `ID_Domanda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT per la tabella `Offerte_di_lavoro`
--
ALTER TABLE `Offerte_di_lavoro`
  MODIFY `ID_Offerta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
