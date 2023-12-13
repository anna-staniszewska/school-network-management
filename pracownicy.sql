-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 11:20 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siecszkol`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `IdPracownika` int(11) NOT NULL,
  `IdSzkoly` int(11) NOT NULL,
  `Stanowisko` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Imie` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Nazwisko` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DataUrodzenia` date NOT NULL,
  `Pesel` char(11) NOT NULL,
  `NrTelefonu` char(12) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `HasloHash` varchar(255) NOT NULL,
  `Miejscowosc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Ulica` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NrBudynku` varchar(5) DEFAULT NULL,
  `NrLokalu` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`IdPracownika`, `IdSzkoly`, `Stanowisko`, `Imie`, `Nazwisko`, `DataUrodzenia`, `Pesel`, `NrTelefonu`, `Email`, `Login`, `HasloHash`, `Miejscowosc`, `Ulica`, `NrBudynku`, `NrLokalu`) VALUES
(0, 1, 'wlasciciel', 'Katarzyna', 'Major', '1955-12-12', '55893309887', '700800900', 'k.major@siecszkol.pl', 'kMajor', '$2y$10$00j1LgXlk/eigJ2A8v8xOOWqovZLh5i0X47ensVqiYooWlqrHRqG.', 'Kraków', 'Krakowska', '45', '5'),
(1, 1, 'dyrektor', 'Joanna', 'Kozłowska', '1989-02-20', '89554327856', '607605900', 'j.kozlowska@siecszkol.pl', 'jKozlowska', '$2y$10$QzyHhhkLgSrayQlqf5DbMe7zx2W3L/66TMK7OiJKSq8WZoJMtCXSS', 'Ojców', 'Jarzębinowa', '24', NULL),
(2, 1, 'pracownik', 'Andrzej', 'Kołakawski', '1979-08-20', '79653389787', '600800987', 'a.kolakaski@siecszkol.pl', 'aKolakawski', '$2y$10$BoR8P3yIqeq6a9iEmGb82uRzB8QBk6W0NE7aIKKqV9m4gIz5Jyu0W', 'Miechów', 'Wrocławska', '34', '1'),
(3, 1, 'pracownikSekretariatu', 'Marek', 'Nowak', '1979-08-29', '79836645349', '500467800', 'm.nowak@siecszkol.pl', 'mNowak', '$2y$10$g0nAUMa9yqkebCFZI2mqgudaTasD/z01g2bY5pvKlHX3AWeBHLLVi', 'Wieliczka', 'Solna', '6', NULL),
(4, 1, 'pracownikDzialuZakupow', 'Marta', 'Jarzębinowska', '1979-11-30', '79453312198', '450456789', 'm.Jarzebinowska@siecszkol.pl', 'mJarzebinowska', '$2y$10$DzwpdLY.j1tXF0xFPD5Wt.gnTLGzPC1v7vfWtL9w/CWXYDvgBqJ4K', 'Kraków', 'Długa', '45', '5'),
(5, 1, 'specjalistaDsDostaw', 'Tadeusz', 'Moskiewski', '1999-03-20', '99874632367', '980799676', 't.moskiewski@siecszkol.pl', 'tMoskiewski', '$2y$10$fsraZAKZYiz1c2XNRIt7JOvTr0KcOSCoMRBu2DnbNCtIT8N64L5ui', 'Skotniki', 'Mała', '34', NULL),
(6, 1, 'ksiegowa', 'Paweł', 'Miecz', '1977-10-13', '77894573908', '788012675', 'p.miecz@siecszkol.pl', 'pMiecz', '$2y$10$k.MzISZ66m2x9M4wADKXYubwnQSAc2WXKaAXKVsttjUEaowxxaE2q', 'Kraków', 'Podlaska', '67', '8');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`IdPracownika`),
  ADD KEY `Szkola_Pracownicy` (`IdSzkoly`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `Szkola_Pracownicy` FOREIGN KEY (`IdSzkoly`) REFERENCES `szkola` (`IdSzkoly`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
