-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 06:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `igrac`
--

CREATE TABLE `igrac` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godine` int(11) NOT NULL,
  `visina` double NOT NULL,
  `broj_pogodaka` int(11) NOT NULL,
  `broj_asistencija` int(11) DEFAULT NULL,
  `broj_pobjeda` int(11) DEFAULT NULL,
  `broj_poraza` int(11) DEFAULT NULL,
  `broj_remija` int(11) DEFAULT NULL,
  `broj_odigranih_utakmica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `igrac`
--

INSERT INTO `igrac` (`id`, `ime`, `prezime`, `godine`, `visina`, `broj_pogodaka`, `broj_asistencija`, `broj_pobjeda`, `broj_poraza`, `broj_remija`, `broj_odigranih_utakmica`) VALUES
(24, 'ImeT1F1', 'PrezimeT1F1', 21, 180, 0, 0, 0, 2, 0, 2),
(25, 'ImeT1F2', 'PrezimeT1F2', 20, 170, 0, 0, 0, 2, 0, 2),
(26, 'ImeT1F3', 'PrezimeT1F3', 20, 180, 0, 0, 0, 2, 0, 2),
(27, 'ImeT1F4', 'PrezimeT1F4', 20, 180, 0, 0, 0, 2, 0, 2),
(28, 'ImeT1F5', 'PrezimeT1F5', 20, 180, 0, 0, 0, 2, 0, 2),
(29, 'ImeT1F6', 'PrezimeT1F6', 20, 180, 0, 0, 0, 2, 0, 2),
(30, 'ImeT1F7', 'PrezimeT1F7', 20, 180, 0, 0, 0, 2, 0, 2),
(31, 'ImeT2F1', 'PrezimeT2F1', 20, 175, 1, 0, 1, 0, 1, 2),
(32, 'ImeT2F2', 'PrezimeT2F2', 20, 175, 0, 0, 1, 0, 1, 2),
(33, 'ImeT2F3', 'PrezimeT2F3', 20, 175, 0, 0, 1, 0, 1, 2),
(34, 'ImeT2F4', 'PrezimeT2F4', 20, 175, 0, 0, 1, 0, 1, 2),
(35, 'ImeT2F5', 'PrezimeT2F5', 20, 175, 0, 0, 1, 0, 1, 2),
(36, 'ImeT2F6', 'PrezimeT2F6', 20, 175, 0, 0, 1, 0, 1, 2),
(37, 'ImeT3F1', 'PrezimeT3F1', 23, 180, 1, 0, 1, 0, 1, 2),
(38, 'ImeT3F2', 'PrezimeT3F2', 23, 180, 0, 0, 1, 0, 1, 2),
(39, 'ImeT3F3', 'PrezimeT3F3', 23, 180, 0, 0, 1, 0, 1, 2),
(40, 'ImeT3F4', 'PrezimeT3F4', 23, 180, 0, 0, 1, 0, 1, 2),
(41, 'ImeT3F5', 'PrezimeT3F5', 23, 180, 0, 0, 1, 0, 1, 2),
(42, 'ImeT3F6', 'PrezimeT3F5', 23, 180, 0, 0, 1, 0, 1, 2),
(43, 'ImeTenis1', 'PrezimeTenis1', 20, 180, 1, 0, 0, 1, 0, 1),
(44, 'ImeTenis2', 'PrezimeTenis2', 20, 180, 3, 0, 1, 0, 0, 1),
(45, 'ImeTenis3', 'PrezimeTenis3', 20, 180, 0, 0, 0, 0, 0, 0),
(46, 'ImeTenis4', 'PrezimeTenis1', 23, 175, 0, 0, 0, 0, 0, 0),
(47, 'ImeT2F1', 'PrezimeT2F1', 20, 180, 0, 0, 0, 0, 1, 1),
(48, 'ImeTenis1', 'PrezimeTenis1', 20, 180, 0, 0, 0, 0, 0, 0),
(49, 'Ime1', 'Prezime1', 20, 180, 0, 0, 0, 0, 0, 0),
(50, 'Ime1', 'Prezime1', 20, 180, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `igrac_liga`
--

CREATE TABLE `igrac_liga` (
  `igrac_id` int(11) NOT NULL,
  `liga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `igrac_liga`
--

INSERT INTO `igrac_liga` (`igrac_id`, `liga_id`) VALUES
(43, 13),
(44, 13),
(45, 13),
(46, 13),
(48, 13);

-- --------------------------------------------------------

--
-- Table structure for table `igrac_tim`
--

CREATE TABLE `igrac_tim` (
  `igrac_id` int(11) NOT NULL,
  `tim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `igrac_tim`
--

INSERT INTO `igrac_tim` (`igrac_id`, `tim_id`) VALUES
(24, 46),
(25, 46),
(26, 46),
(27, 46),
(28, 46),
(29, 46),
(30, 46),
(31, 47),
(32, 47),
(33, 47),
(34, 47),
(35, 47),
(36, 47),
(37, 48),
(38, 48),
(39, 48),
(40, 48),
(41, 48),
(42, 48),
(47, 48);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `email`, `roles`, `password`) VALUES
(3, 'Semsudin', 'Beso', 'Semso', 'semso@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$MmlkWE9nNEVPVWtnOGF5dw$d6qJ7x+syY/ogA+8zlDBQ5EPlKd/496WcYTZA5nglMg'),
(6, 'admin', 'admin', 'admin', 'admin@admin.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$eW9ablRiUUFmYkJpTkkxNA$qyVpqWd2Cqex6vaRAeQU/tx0BdOoC70S4JeKdxUnqVk'),
(7, 'Korisnik', 'Korisnik', 'Korisnik', 'korisnik@gmail.com', '[\"ROLE_EDITOR\"]', '$argon2id$v=19$m=65536,t=4,p=1$aFFYVnVVaklaTERCRWV3Zg$b9gI1AewgRABORdjbBoLHXzEfrdj6mp0Jk+Drg1/ank'),
(8, 'editor', 'editor', 'editor', 'editor@gmail.com', '[\"ROLE_EDITOR\"]', '$argon2id$v=19$m=65536,t=4,p=1$Sk9LQnJ1Wk9pVExFdldrSw$MMZD6BuUwSZnvKySVgTurGCfs97mZ1lQvjr/gw2suwM'),
(9, 'delegat', 'delegat', 'delegat', 'delegat@gmail.com', '[\"ROLE_DELEGAT\"]', '$argon2id$v=19$m=65536,t=4,p=1$MTlVVjkwQTE1OXNoeHpidA$a9ySUwdqf5zCsYAOWQR2/xlCrmo6eIlx2yro0RogaT4');

-- --------------------------------------------------------

--
-- Table structure for table `liga`
--

CREATE TABLE `liga` (
  `id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liga`
--

INSERT INTO `liga` (`id`, `sport_id`, `naziv`) VALUES
(11, 8, 'LigaF1'),
(12, 9, 'LigaK1'),
(13, 10, 'LigaT1'),
(20, 12, 'Liga1');

-- --------------------------------------------------------

--
-- Table structure for table `pocetna_statistika`
--

CREATE TABLE `pocetna_statistika` (
  `id` int(11) NOT NULL,
  `delegat_id` int(11) NOT NULL,
  `igrac_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `utakmica_id` int(11) NOT NULL,
  `domaci_id` int(11) DEFAULT NULL,
  `gosti_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broj_igraca` int(11) NOT NULL,
  `tip` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `naziv`, `broj_igraca`, `tip`) VALUES
(8, 'Fudbal', 6, 1),
(9, 'Košarka', 5, 1),
(10, 'Tenis', 2, 0),
(12, 'Rukomet', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statistika_utakmice`
--

CREATE TABLE `statistika_utakmice` (
  `id` int(11) NOT NULL,
  `delegat_id` int(11) NOT NULL,
  `broj_golova_domaci` int(11) NOT NULL,
  `broj_golova_gosti` int(11) NOT NULL,
  `utakmica_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistika_utakmice`
--

INSERT INTO `statistika_utakmice` (`id`, `delegat_id`, `broj_golova_domaci`, `broj_golova_gosti`, `utakmica_id`) VALUES
(25, 9, 3, 1, 106),
(26, 9, 1, 0, 100),
(27, 9, 2, 1, 102),
(28, 9, 1, 1, 103);

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bodovi` int(11) NOT NULL,
  `odigraneutakmice` int(11) NOT NULL,
  `broj_pobjeda` int(11) NOT NULL,
  `broj_poraza` int(11) NOT NULL,
  `naziv_mjesta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broj_remija` int(11) NOT NULL,
  `broj_pogodaka` int(11) DEFAULT NULL,
  `broj_primljenih` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `naziv`, `bodovi`, `odigraneutakmice`, `broj_pobjeda`, `broj_poraza`, `naziv_mjesta`, `broj_remija`, `broj_pogodaka`, `broj_primljenih`) VALUES
(46, 'TimF 1', 0, 2, 0, 2, 'Zenica', 0, 1, 3),
(47, 'TimF 2', 4, 2, 1, 0, 'Nemila', 1, 2, 1),
(48, 'TimF 3', 4, 2, 1, 0, 'Zenica', 1, 3, 2),
(49, 'TimF 4', 0, 0, 0, 0, 'Zenica', 0, 0, 0),
(50, 'TimK1', 0, 0, 0, 0, 'Zenica', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tim_liga`
--

CREATE TABLE `tim_liga` (
  `tim_id` int(11) NOT NULL,
  `liga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tim_liga`
--

INSERT INTO `tim_liga` (`tim_id`, `liga_id`) VALUES
(46, 11),
(47, 11),
(48, 11),
(49, 11),
(50, 12);

-- --------------------------------------------------------

--
-- Table structure for table `utakmica`
--

CREATE TABLE `utakmica` (
  `id` int(11) NOT NULL,
  `domaci_id` int(11) DEFAULT NULL,
  `gosti_id` int(11) DEFAULT NULL,
  `igrac_d_id` int(11) DEFAULT NULL,
  `igrac_g_id` int(11) DEFAULT NULL,
  `mjesto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `liga_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utakmica`
--

INSERT INTO `utakmica` (`id`, `domaci_id`, `gosti_id`, `igrac_d_id`, `igrac_g_id`, `mjesto`, `datum`, `liga_id`) VALUES
(100, 47, 46, NULL, NULL, 'Zenica', '2020-06-03', 11),
(101, 46, 47, NULL, NULL, 'Zenica', '2020-06-04', 11),
(102, 48, 46, NULL, NULL, 'Zenica', '2020-06-07', 11),
(103, 48, 47, NULL, NULL, 'Zenica', '2020-06-07', 11),
(104, 46, 48, NULL, NULL, NULL, NULL, 11),
(105, 47, 48, NULL, NULL, NULL, NULL, 11),
(106, NULL, NULL, 44, 43, 'Zenica', '2020-06-04', 13),
(107, NULL, NULL, 43, 44, NULL, NULL, 13),
(108, NULL, NULL, 45, 43, NULL, NULL, 13),
(109, NULL, NULL, 45, 44, NULL, NULL, 13),
(110, NULL, NULL, 43, 45, NULL, NULL, 13),
(111, NULL, NULL, 44, 45, NULL, NULL, 13),
(112, NULL, NULL, 46, 43, NULL, NULL, 13),
(113, NULL, NULL, 46, 44, NULL, NULL, 13),
(114, NULL, NULL, 46, 45, NULL, NULL, 13),
(115, NULL, NULL, 43, 46, NULL, NULL, 13),
(116, NULL, NULL, 44, 46, NULL, NULL, 13),
(117, NULL, NULL, 45, 46, NULL, NULL, 13),
(118, NULL, NULL, 48, 43, NULL, NULL, 13),
(119, NULL, NULL, 48, 44, NULL, NULL, 13),
(120, NULL, NULL, 48, 45, NULL, NULL, 13),
(121, NULL, NULL, 48, 46, NULL, NULL, 13),
(122, NULL, NULL, 43, 48, NULL, NULL, 13),
(123, NULL, NULL, 44, 48, NULL, NULL, 13),
(124, NULL, NULL, 45, 48, NULL, NULL, 13),
(125, NULL, NULL, 46, 48, NULL, NULL, 13),
(126, 49, 46, NULL, NULL, NULL, NULL, 11),
(127, 49, 47, NULL, NULL, NULL, NULL, 11),
(128, 49, 48, NULL, NULL, NULL, NULL, 11),
(129, 46, 49, NULL, NULL, NULL, NULL, 11),
(130, 47, 49, NULL, NULL, NULL, NULL, 11),
(131, 48, 49, NULL, NULL, NULL, NULL, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igrac`
--
ALTER TABLE `igrac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `igrac_liga`
--
ALTER TABLE `igrac_liga`
  ADD PRIMARY KEY (`igrac_id`,`liga_id`),
  ADD KEY `IDX_27124B49B6BCA06A` (`igrac_id`),
  ADD KEY `IDX_27124B49CF098064` (`liga_id`);

--
-- Indexes for table `igrac_tim`
--
ALTER TABLE `igrac_tim`
  ADD PRIMARY KEY (`igrac_id`,`tim_id`),
  ADD KEY `IDX_ED8088E0B6BCA06A` (`igrac_id`),
  ADD KEY `IDX_ED8088E0E51FC8B4` (`tim_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_12096718F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_12096718E7927C74` (`email`);

--
-- Indexes for table `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7BBCBA637854736` (`naziv`),
  ADD KEY `IDX_7BBCBA6AC78BCF8` (`sport_id`);

--
-- Indexes for table `pocetna_statistika`
--
ALTER TABLE `pocetna_statistika`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1F7A06E2BF4694D7` (`delegat_id`),
  ADD KEY `IDX_1F7A06E2B6BCA06A` (`igrac_id`),
  ADD KEY `IDX_1F7A06E2AC78BCF8` (`sport_id`),
  ADD KEY `IDX_1F7A06E2DC5BB1DB` (`utakmica_id`),
  ADD KEY `IDX_1F7A06E2C6382EFD` (`domaci_id`),
  ADD KEY `IDX_1F7A06E29C38D70C` (`gosti_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1A85EFD237854736` (`naziv`);

--
-- Indexes for table `statistika_utakmice`
--
ALTER TABLE `statistika_utakmice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9D1439CCBF4694D7` (`delegat_id`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2B85D49537854736` (`naziv`);

--
-- Indexes for table `tim_liga`
--
ALTER TABLE `tim_liga`
  ADD PRIMARY KEY (`tim_id`,`liga_id`),
  ADD KEY `IDX_7BC01911E51FC8B4` (`tim_id`),
  ADD KEY `IDX_7BC01911CF098064` (`liga_id`);

--
-- Indexes for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4ED098DDC6382EFD` (`domaci_id`),
  ADD KEY `IDX_4ED098DD9C38D70C` (`gosti_id`),
  ADD KEY `IDX_4ED098DD2CA92385` (`igrac_d_id`),
  ADD KEY `IDX_4ED098DD3E1C8C6B` (`igrac_g_id`),
  ADD KEY `IDX_4ED098DDCF098064` (`liga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igrac`
--
ALTER TABLE `igrac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `liga`
--
ALTER TABLE `liga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pocetna_statistika`
--
ALTER TABLE `pocetna_statistika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `statistika_utakmice`
--
ALTER TABLE `statistika_utakmice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `utakmica`
--
ALTER TABLE `utakmica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igrac_liga`
--
ALTER TABLE `igrac_liga`
  ADD CONSTRAINT `FK_27124B49B6BCA06A` FOREIGN KEY (`igrac_id`) REFERENCES `igrac` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_27124B49CF098064` FOREIGN KEY (`liga_id`) REFERENCES `liga` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `igrac_tim`
--
ALTER TABLE `igrac_tim`
  ADD CONSTRAINT `FK_ED8088E0B6BCA06A` FOREIGN KEY (`igrac_id`) REFERENCES `igrac` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ED8088E0E51FC8B4` FOREIGN KEY (`tim_id`) REFERENCES `tim` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `liga`
--
ALTER TABLE `liga`
  ADD CONSTRAINT `FK_7BBCBA6AC78BCF8` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`);

--
-- Constraints for table `pocetna_statistika`
--
ALTER TABLE `pocetna_statistika`
  ADD CONSTRAINT `FK_1F7A06E29C38D70C` FOREIGN KEY (`gosti_id`) REFERENCES `tim` (`id`),
  ADD CONSTRAINT `FK_1F7A06E2AC78BCF8` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `FK_1F7A06E2B6BCA06A` FOREIGN KEY (`igrac_id`) REFERENCES `igrac` (`id`),
  ADD CONSTRAINT `FK_1F7A06E2BF4694D7` FOREIGN KEY (`delegat_id`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `FK_1F7A06E2C6382EFD` FOREIGN KEY (`domaci_id`) REFERENCES `tim` (`id`),
  ADD CONSTRAINT `FK_1F7A06E2DC5BB1DB` FOREIGN KEY (`utakmica_id`) REFERENCES `utakmica` (`id`);

--
-- Constraints for table `statistika_utakmice`
--
ALTER TABLE `statistika_utakmice`
  ADD CONSTRAINT `FK_9D1439CCBF4694D7` FOREIGN KEY (`delegat_id`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `tim_liga`
--
ALTER TABLE `tim_liga`
  ADD CONSTRAINT `FK_7BC01911CF098064` FOREIGN KEY (`liga_id`) REFERENCES `liga` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7BC01911E51FC8B4` FOREIGN KEY (`tim_id`) REFERENCES `tim` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD CONSTRAINT `FK_4ED098DD2CA92385` FOREIGN KEY (`igrac_d_id`) REFERENCES `igrac` (`id`),
  ADD CONSTRAINT `FK_4ED098DD3E1C8C6B` FOREIGN KEY (`igrac_g_id`) REFERENCES `igrac` (`id`),
  ADD CONSTRAINT `FK_4ED098DD9C38D70C` FOREIGN KEY (`gosti_id`) REFERENCES `tim` (`id`),
  ADD CONSTRAINT `FK_4ED098DDC6382EFD` FOREIGN KEY (`domaci_id`) REFERENCES `tim` (`id`),
  ADD CONSTRAINT `FK_4ED098DDCF098064` FOREIGN KEY (`liga_id`) REFERENCES `liga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
