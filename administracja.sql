-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Paź 2022, 08:42
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `administracja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gallery`
--

INSERT INTO `gallery` (`ID`, `user`, `link`) VALUES
(12, 8, 'g/Ev7oY6fbAT9oydd6kuxO.jpg'),
(13, 8, 'g/709BE9XO5qWw7twYQ4nY.png'),
(14, 1, 'g/fyrkeykUdDyvOvYgOl5j.png'),
(15, 1, 'g/gIJve35sCEb4B7Wl6KwT.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `log`
--

CREATE TABLE `log` (
  `ID` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT 'undefined',
  `action` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `log`
--

INSERT INTO `log` (`ID`, `user`, `action`) VALUES
(1, 'undefined', 'test'),
(2, '8', 'WylogowaÅ‚ sie'),
(3, '8', 'ZalogowaÅ‚ sie'),
(4, '8', 'Wylogował sie'),
(5, '8', 'Zalogował sie'),
(6, '8', 'Wylogował sie'),
(7, '1', 'Zalogował sie'),
(8, '1', 'Utworzyl usera testowy'),
(9, '1', 'Usunał usera o ID 11'),
(10, '', 'Dodał nowe zdjęcie do galerii fyrkeykUdDyvOvYgOl5j.png'),
(11, '1', 'Dodał nowe zdjęcie do galerii gIJve35sCEb4B7Wl6KwT.png'),
(12, '1', 'Załadował swoją Galerie'),
(13, '1', 'Załadował swoją Galerie'),
(14, '1', 'Załadował swoją Galerie'),
(15, '1', 'Załadował swoją Galerie'),
(16, '1', 'Załadował swoją Galerie'),
(17, '1', 'Załadował swoją Galerie'),
(18, '1', 'Załadował swoją Galerie'),
(19, '1', 'Załadował swoją Galerie'),
(20, '1', 'Załadował swoją Galerie'),
(21, '1', 'Załadował swoją Galerie'),
(22, '1', 'Załadował swoją Galerie'),
(23, '1', 'Załadował swoją Galerie'),
(24, '1', 'Załadował swoją Galerie'),
(25, '1', 'Załadował swoją Galerie'),
(26, '1', 'Załadował swoją Galerie'),
(27, '1', 'Załadował swoją Galerie'),
(28, '1', 'Załadował swoją Galerie'),
(29, '1', 'Załadował swoją Galerie'),
(30, '1', 'Załadował swoją Galerie'),
(31, '1', 'Załadował swoją Galerie'),
(32, '1', 'Załadował swoją Galerie'),
(33, '1', 'Załadował swoją Galerie'),
(34, '1', 'Załadował swoją Galerie'),
(35, '1', 'Załadował swoją Galerie'),
(36, '1', 'Załadował swoją Galerie'),
(37, '1', 'Załadował swoją Galerie'),
(38, '1', 'zaktualizował dane usera 1 na \r\n            name jaca surname = jaca , email = email.com start_date = 2022-09-01 pesel = 12212121 '),
(39, '1', 'zaktualizował dane usera 1 na \r\n            name jaca surname = jacaawdawd , email = email.com start_date = 2022-09-01 pesel = 12212121 '),
(40, '1', 'zaktualizował dane usera 9 na name dgdrgd surname = gdrgdrg , email = drgdrgdrg start_date = 2022-10-18 pesel = drgdr '),
(41, '1', 'zaktualizował dane usera 9 na name dgdrgd surname = gdrgdrgs , email = drgdrgdrg start_date = 2022-10-18 pesel = drgdr '),
(42, '1', 'zaktualizował dane usera 9 na name dgdrgd surname = gdrgdrgsdawda , email = drgdrgdrg start_date = 2022-10-18 pesel = drgdr '),
(43, '1', 'zaktualizował dane usera 9 na name dgdrgd surname = gdrgdrgsdawdadawdawd , email = drgdrgdrg start_date = 2022-10-18 pesel = drgdr '),
(44, '1', 'Wylogował sie'),
(45, '8', 'Zalogował sie'),
(46, '8', 'Usunał swoje konto'),
(47, '8', 'Załadował swoją Galerie'),
(48, '8', 'Usunał swoje konto'),
(49, '8', 'Usunał swoje konto'),
(50, '8', 'Usunał swoje konto'),
(51, '8', 'Usunał swoje konto'),
(52, '8', 'Załadował swoją Galerie'),
(53, '8', 'Usunał swoje konto');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `login`, `passwd`, `admin`) VALUES
(1, 'admin', 'adminpass', 1),
(9, 'ada', 'ada', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_data`
--

CREATE TABLE `users_data` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `pesel` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `start_date` date NOT NULL,
  `path` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT 'u/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users_data`
--

INSERT INTO `users_data` (`ID`, `name`, `surname`, `email`, `pesel`, `start_date`, `path`) VALUES
(1, 'jaca', 'jacaawdawd', 'email.com', '12212121', '2022-09-01', 'u/1.jpg'),
(9, 'dgdrgd', 'gdrgdrgsdawdadawdawd', 'drgdrgdrg', 'drgdr', '2022-10-18', 'u/9.jpg'),
(10, 'aiuwd', 'nadaw', 'nadaw@email', '567892812', '2022-10-20', 'u/10.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `log`
--
ALTER TABLE `log`
  ADD KEY `ID` (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
