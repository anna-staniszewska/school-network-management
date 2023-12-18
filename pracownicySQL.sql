-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 10:01 PM
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
(6, 1, 'ksiegowa', 'Paweł', 'Miecz', '1977-10-13', '77894573908', '788012675', 'p.miecz@siecszkol.pl', 'pMiecz', '$2y$10$k.MzISZ66m2x9M4wADKXYubwnQSAc2WXKaAXKVsttjUEaowxxaE2q', 'Kraków', 'Podlaska', '67', '8'),
(7, 2, 'dyrektor', 'Hanna', 'Jemioła', '1979-05-20', '79653789201', '700989346', 'h.jemiola@siecszkol.pl', 'hJemiola', '$2y$10$G40sZM158njHkNaglIG33.Xc07Yf9ZOfGeVIlvGtu5UHQdT7ApIfm', 'Miechów', 'Jana', '3', NULL),
(8, 2, 'pracownikSekretariatu', 'Jan', 'Kaszka', '1969-08-14', '69873398271', '789300543', 'j.kaszka@siecszkol.pl', 'jKaszka', '$2y$10$TPSY4Obzuki/7TOZYUD3GOFy8ktwCtE22USBb1zruSdlyvSJzzFmO', 'Kraków', 'Średniej', '14', '9'),
(9, 3, 'pracownikDzialuZakupow', 'Jędrzej', 'Cieslawski', '1975-12-20', '75364892673', '801190076', 'j.cieslawski@siecszkol.pl', 'jCieslawski', '$2y$10$NwdOzu6IZb63/4Pp9RWI0.ow9I5Ls5PMPPT1MgIHow2vO5v6IhFi2', 'Wieliczka', 'Solna', '2', NULL),
(10, 3, 'pracownikSekretariatu', 'Piotr', 'Tuliński', '1958-12-03', '58876773679', '690876690', 'p.tulinski@siecszkol.pl', 'pTulinski', '$2y$10$VuogvRRJWtVLvzlwYePdjunQcaUDDsiCNYj2d1xenxMc5/SoxKwxu', 'Kraków', 'Wtorkowa', '14', '8'),
(11, 4, 'pracownik', 'Julia', 'Mieszko', '1958-02-11', '58789937844', '800900456', 'j.mieszko@siecszkol.pl', 'jMieszko', '$2y$10$RB3OouZ3SZ9UqUMrssuFPesSH8unXRDb.f.LBU/fiw4aII9tnqKGC', 'Wieliczka', 'Długa', '23', '1'),
(12, 4, 'specjalistaDsDostaw', 'Maria', 'Gaber', '1979-11-30', '67898659877', '700988676', 'm.gaber@siecszkol.pl', 'mGaber', '$2y$10$GLmpRt7Zu1nibyOcB9E7VuLBeMt0U.RFcYHQI9nP.h03nmDckvXSq', 'Skotniki', 'Miła', '12', NULL),
(13, 5, 'dyrektor', 'Marek', 'Kocioł', '1955-09-02', '67896768933', '980799333', 'm.kociol@siecszkol.pl', 'mKociol', '$2y$10$Fa4xmz0ynsN8AGoo48GmA.Xtpf.8Ra7ur9WFbCO1X1c5AmEUs7HOG', 'Kraków', 'Wielicka', '73', '5'),
(14, 5, 'pracownik', 'Zofia', 'Lewandowska', '1989-12-05', '67898664899', '600900876', 'z.Lewandowska@siecszkol.pl', 'zLewandowska', '$2y$10$YIOXLCuzii194qGqvgyQVetup0/.jvhWlCfhZQ2EKIpBzHhxQeVv2', 'Kraków', 'Jodłowa', '34', NULL),
(15, 6, 'ksiegowa', 'Paulina', 'Kowalska', '1999-08-22', '67854367689', '788900566', 'p.kowalska@siecszkol.pl', 'pKowalska', '$2y$10$pWwpfSU.weRqlORcZWH1pumJ9I5/zQcAYW4Cjgv/5vs6oFFD9Sy4O', 'Ojców', 'Kasztanowa', '29', NULL),
(16, 7, 'ksiegowa', 'Kacper', 'Konieczny', '1992-03-30', '67897709897', '789002345', 'k.konieczny@siecszkol.pl', 'kKonieczny', '$2y$10$1h7bk0eDuD0XCvVUGs6QNeBZxvUkvhA2WlqJMbRZcFZKVcb94FtXe', 'Skotniki', 'Jabłonowa', '67', NULL),
(17, 8, 'pracownikDzialuZakupow', 'Tadeusz', 'Mrożek', '1977-07-01', '67545589967', '981129676', 't.mrozek@siecszkol.pl', 'tMrozek', '$2y$10$X8MKTmHvotP82B4qbFeAZuKxBTFC3RD7J8ufc7eAXngla0cYLY/Yi', 'Kraków', 'Czwartkowa', '20', '1'),
(18, 9, 'pracownik', 'Janina', 'Kołłątaj', '1973-09-14', '67899876589', '678778933', 'j.kollataj@siecszkol.pl', 'jKollataj', '$2y$10$awfx9e3IHWG10lOoIHGRKund2Xha6uNDRYm2MMwpR3mbjUc5PqUsi', 'Kraków', 'Kolanko', '6', '55'),
(19, 10, 'specjalistaDsDostaw', 'Marcin', 'Mazowiecki', '1999-01-26', '67865445677', '677899123', 'm.mazowiecki@siecszkol.pl', 'mMazowiecki', '$2y$10$7RKgaUcok6x6SYWN8YQQi.Mxs.PzAFDo1dhE0dv9a1ear.QQfHERC', 'Wieliczka', 'Mieszczańska', '8', '2');

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
