-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 30, 2023 at 10:17 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `logowanie`
--

INSERT INTO `logowanie` (`username`, `password`) VALUES
('123', '123'),
('test', 'test'),
('Marcel1', 'qwe'),
('43', '43'),
('marcel.kalemba', '123456');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `username` varchar(254) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` text NOT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `room_type` varchar(60) NOT NULL,
  `guests` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `rezerwacja`
--

INSERT INTO `rezerwacja` (`username`, `name`, `email`, `phone`, `arrival`, `departure`, `room_type`, `guests`) VALUES
('123', '123', 'marcel123@wp.pl', '3213321321', '2023-05-18', '2023-05-31', 'single', 3),
('marcel.kalemba', 'Marcel Kalemba', 'marcel123@wp.pl', '666444333', '2023-05-16', '2023-05-31', 'suite', 3),
('Marcel1', 'Marcel Kalemba', 'deamonmailer1@gmail.com', '32432432', '2023-05-18', '2023-06-01', 'suite', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
