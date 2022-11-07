-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Lis 2022, 20:36
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `disabled` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `name`, `disabled`) VALUES
(6, 'Serwis', 0),
(7, 'Naprawa', 0),
(8, 'Modyfikacje', 0),
(9, 'Hardware', 0),
(10, 'Software', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `comment_date` date NOT NULL,
  `content` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `id_reservation`, `comment_date`, `content`, `id_user`) VALUES
(7, 19, '2022-11-01', 'Super Firma pozdrawiam', 13),
(8, 20, '2022-11-02', 'Ekstra działa', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rangetime`
--

CREATE TABLE `rangetime` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rangetime`
--

INSERT INTO `rangetime` (`id`, `name`) VALUES
(1, '8:00 - 9:00'),
(2, '9:00 - 10:00'),
(3, '10:00 - 11:00'),
(4, '11:00 - 12:00'),
(5, '12:00 - 13:00'),
(6, '13:00 - 14:00'),
(7, '14:00 - 15:00'),
(8, '15:00 - 16:00'),
(9, '16:00 - 17:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `phone` text NOT NULL,
  `rangetime` int(11) NOT NULL,
  `model` text NOT NULL,
  `serial` text NOT NULL,
  `content` text NOT NULL,
  `category` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `accept` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_date`, `phone`, `rangetime`, `model`, `serial`, `content`, `category`, `client`, `end`, `accept`) VALUES
(22, '2022-12-12', '666333444', 1, 'lenovo', 'As-2023fdg-ooop-22', '   nie działa', 7, 19, 0, 1),
(21, '2022-12-12', '666333444', 5, 'lenovo', '45345345345', '   ;lpkpkp', 6, 0, 0, 1),
(19, '2022-12-12', '666333444', 1, 'lenovo', '45345345345', '   zalany', 7, 0, 0, 1),
(20, '2022-12-11', '666131527', 2, 'Asus', 'As-2023fdg-ooop-22', '   Zamulony', 9, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `hours` float NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `phone` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `type`, `phone`) VALUES
(1, 'Jan Kowalski', 'jkowalski', 'c2d9e5b06fcd726922e81b230144cc7390c7898d', 1, 1, '533555333'),
(2, 'Paweł Nowak', 'pnowak', '86c16a459ecf39fd76a8e750f9d5074c4722f22b', 1, 0, '533444222'),
(19, 'klient', 'klient', 'd959686e9c1083810157220cfdec153220129f3c', 1, 0, '515-123-111'),
(13, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, '1477'),
(23, 'robert kubika', 'robert', 'robert123', 1, 0, '322342234324'),
(20, 'Adam miałczyński', 'adam', '8bb8435a9f02f133548ce213e689442e969cbb79', 1, 0, '7728-234-222'),
(24, 'Patryk Nowy', 'Patryk', '1qazZAQ!', 1, 0, 'patrykCX@o2.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rangetime`
--
ALTER TABLE `rangetime`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `rangetime`
--
ALTER TABLE `rangetime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
