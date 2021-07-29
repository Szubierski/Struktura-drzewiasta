-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lip 2021, 15:14
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `struktura drzewiasta`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `drzewo`
--

CREATE TABLE `drzewo` (
  `id` int(8) NOT NULL,
  `nazwa` varchar(100) NOT NULL DEFAULT '',
  `id_rodzica` int(8) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `drzewo`
--

INSERT INTO `drzewo` (`id`, `nazwa`, `id_rodzica`) VALUES
(1, 'Local Disk (C:)', 0),
(2, 'PerfLogs', 1),
(3, 'Program Files (x85)', 1),
(4, 'Program Files', 1),
(5, 'Users', 1),
(6, 'Windows', 1),
(7, 'Common Files', 3),
(8, 'Google', 3),
(9, 'Internet Explorer', 3),
(10, 'Micorsoft', 3),
(11, 'One Drive', 3),
(12, 'Origin', 3),
(13, 'Java', 4),
(14, 'NVIDIA Corporation', 4),
(15, 'Adam', 5),
(17, 'Boot', 6),
(18, 'Fonts', 6),
(19, 'Logs', 6),
(20, 'Security', 6),
(21, 'Services', 7),
(22, 'Steam', 7),
(23, 'System', 7),
(24, 'Games', 22),
(25, 'Drivers', 14),
(26, 'NVIDIA GeForce Expirience', 14),
(27, 'Update', 14),
(28, 'Desktop', 15),
(29, 'Downloads', 15),
(30, 'Favourites', 15),
(31, 'Videos', 15),
(36, 'My Games', 28),
(37, 'Photos', 28),
(38, 'CSGO', 36),
(39, 'League Of Legends', 36),
(40, 'The Witcher 3: Wild Hunt', 36),
(41, 'Videos from school', 31),
(42, 'My 18th birthday', 31),
(43, 'Arial', 18),
(44, 'Cousine', 18),
(45, 'Roboto', 18),
(46, 'Zen Loop', 18);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `drzewo`
--
ALTER TABLE `drzewo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `drzewo`
--
ALTER TABLE `drzewo`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
