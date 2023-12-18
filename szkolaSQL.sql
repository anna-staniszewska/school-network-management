-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 10:02 PM
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
-- Struktura tabeli dla tabeli `szkola`
--

CREATE TABLE `szkola` (
  `IdSzkoly` int(11) NOT NULL,
  `Nazwa` varchar(50) NOT NULL,
  `Miejscowosc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Ulica` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NrBudynku` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `szkola`
--

INSERT INTO `szkola` (`IdSzkoly`, `Nazwa`, `Miejscowosc`, `Ulica`, `NrBudynku`) VALUES
(1, '123 Szkoła Podstawowa im. Jana Matejki', 'Kraków', 'Wrocławska', '12'),
(2, '56 Szkoła Podstawowa im. Marii Skłodowskiej-Curie', 'Kraków', 'Olszynowa', '89'),
(3, '14 Szkoła Podstawowa im. Ludwiki Wawrzyńskiej', 'Kraków', 'Różana', '14'),
(4, '79 Szkoła Podstawowa im. Magdaleny Będzisławskiej ', 'Kraków', 'Karmelicka', '12'),
(5, '158 Szkoła Podstawowa im. Jacka Malczewskiego', 'Kraków', 'Agatowa', '19'),
(6, '135 Szkoła Podstawowa im. Wilhelminy Iwanowskiej', 'Kraków', 'Retoryka', '18'),
(7, '80 Szkoła Podstawowa im. Olgi Boznańskiej', 'Kraków', 'Wrocławska', '97'),
(8, '144 Szkoła Podstawowa im. Ignacego Paderewskiego', 'Kraków', 'Kopernika', '11'),
(9, '19 Szkoła Podstawowa im. Jana Czochralskiego', 'Kraków', 'Topolowa', '1'),
(10, '162 Szkoła Podstawowa im. Hanny Hirszfeldowej', 'Kraków', 'Estery', '17');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `szkola`
--
ALTER TABLE `szkola`
  ADD PRIMARY KEY (`IdSzkoly`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
