-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Paź 2023, 20:27
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `footballdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `coaches`
--

CREATE TABLE `coaches` (
  `CoachID` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `Nationality` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `coaches`
--

INSERT INTO `coaches` (`CoachID`, `Name`, `Surname`, `Nationality`) VALUES
(1, 'John', 'van der Brom', 'Holandia'),
(2, 'Marek', 'Papszun', 'Polska'),
(3, 'Jens', 'Gustaffson', 'Szwecja'),
(4, 'Marcin', 'Kaczmarek', 'Polska'),
(5, 'Aleksandar', 'Vuković', 'Serbia'),
(6, 'Pavol', 'Stano', 'Słowacja'),
(7, 'Mariusz', 'Lewandowski', 'Polska'),
(8, 'Bartosch', 'Gaul', 'Niemcy'),
(9, 'Jacek', 'Zieliński', 'Polska'),
(10, 'Kosta', 'Runjaić', 'Niemcy'),
(11, 'Dawid', 'Szulczek', 'Polska'),
(12, 'Maciej', 'Stolarczyk', 'Polska'),
(13, 'Piotr', 'Stokowiec', 'Polska'),
(14, 'Adam', 'Majewski', 'Polska'),
(15, 'Ivan', 'Djurdjević', 'Serbia'),
(16, 'Wojciech', 'Łobodziński', 'Polska'),
(17, 'Janusz', 'Niedźwiedź', 'Polska'),
(18, 'Kamil', 'Kuzera', 'Polska'),
(38, 'Trener', 'Trener', 'Polska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `MatchID` int(11) NOT NULL,
  `UserName` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `Content` varchar(256) COLLATE utf8mb4_polish_ci NOT NULL,
  `CommentDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`CommentID`, `MatchID`, `UserName`, `Content`, `CommentDate`) VALUES
(68, 3, 'user', 'komentarz', '2023-01-24 23:51:05'),
(69, 5, 'user', 'kometarz 2', '2023-01-24 23:51:18'),
(70, 5, 'user', 'aaaaa', '2023-01-24 23:51:23'),
(71, 3, 'user', 'yyyyyyy', '2023-01-24 23:51:34'),
(72, 7, 'admin', 'komentarz', '2023-01-26 10:02:44'),
(73, 9, 'admin', 'aaaaaaa', '2023-01-26 10:07:42'),
(74, 17, 'admin', 'qqqqq', '2023-01-26 10:20:44'),
(75, 1, 'admin', 'dsads', '2023-01-26 12:20:10'),
(80, 7, 'admin11', 'gergreg', '2023-09-03 20:42:59'),
(81, 7, 'admin11', 'fsdfds', '2023-09-03 20:43:36'),
(82, 7, 'admin11', 'fdsfds', '2023-09-03 20:43:40');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `favouriteteams`
--

CREATE TABLE `favouriteteams` (
  `UserID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `matches`
--

CREATE TABLE `matches` (
  `MatchID` int(11) NOT NULL,
  `HomeTeamID` int(11) NOT NULL,
  `AwayTeamID` int(11) NOT NULL,
  `HomeTeamGoals` varchar(2) COLLATE utf8mb4_polish_ci NOT NULL DEFAULT '-',
  `AwayTeamGoals` varchar(2) COLLATE utf8mb4_polish_ci NOT NULL DEFAULT '-',
  `Week` int(11) NOT NULL,
  `MatchDate` date NOT NULL,
  `MatchTime` time NOT NULL,
  `Played` tinyint(1) NOT NULL DEFAULT 0,
  `RefereeID` int(11) NOT NULL DEFAULT 93,
  `StadiumID` int(11) DEFAULT 31
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `matches`
--

INSERT INTO `matches` (`MatchID`, `HomeTeamID`, `AwayTeamID`, `HomeTeamGoals`, `AwayTeamGoals`, `Week`, `MatchDate`, `MatchTime`, `Played`, `RefereeID`, `StadiumID`) VALUES
(1, 2, 11, '1', '0', 1, '2022-07-15', '18:00:00', 1, 1, 2),
(2, 13, 15, '0', '0', 1, '2022-07-15', '20:30:00', 1, 2, 13),
(3, 1, 14, '0', '2', 1, '2022-07-16', '15:00:00', 1, 3, 1),
(4, 12, 5, '2', '0', 1, '2022-07-16', '17:30:00', 1, 4, 12),
(5, 18, 10, '1', '1', 1, '2022-07-16', '20:00:00', 1, 5, 18),
(6, 7, 16, '1', '1', 1, '2022-07-17', '12:30:00', 1, 6, 7),
(7, 6, 4, '3', '0', 1, '2022-07-17', '15:00:00', 1, 7, 6),
(8, 3, 17, '2', '1', 1, '2022-07-17', '17:30:00', 1, 8, 3),
(9, 8, 9, '0', '2', 1, '2022-07-18', '19:00:00', 1, 9, 8),
(10, 11, 6, '0', '4', 2, '2022-07-22', '18:00:00', 1, 10, 11),
(11, 12, 17, '0', '2', 2, '2022-07-22', '20:30:00', 1, 11, 12),
(12, 9, 18, '2', '0', 2, '2022-07-23', '17:30:00', 1, 8, 9),
(13, 10, 13, '2', '0', 2, '2022-07-23', '20:00:00', 1, 7, 10),
(14, 15, 3, '2', '1', 2, '2022-07-24', '17:30:00', 1, 5, 15),
(15, 14, 7, '1', '1', 2, '2022-07-25', '19:00:00', 1, 12, 14),
(16, 5, 2, '0', '1', 2, '2022-10-06', '20:45:00', 1, 6, 5),
(17, 4, 8, '2', '1', 2, '2022-11-18', '20:30:00', 1, 2, 4),
(18, 1, 16, '1', '1', 2, '2022-07-25', '17:00:00', 1, 12, 1),
(85, 5, 13, '0', '1', 3, '2022-07-29', '18:00:00', 1, 6, 5),
(86, 7, 8, '0', '3', 3, '2022-07-30', '17:30:00', 1, 9, 7),
(87, 16, 11, '1', '2', 3, '2022-07-30', '20:00:00', 1, 3, 16),
(88, 3, 12, '1', '0', 3, '2022-07-31', '15:00:00', 1, 7, 3),
(89, 2, 14, '3', '2', 3, '2022-07-31', '17:30:00', 1, 4, 2),
(90, 1, 6, '1', '3', 3, '2022-07-31', '17:30:00', 1, 2, 1),
(91, 17, 4, '2', '3', 3, '2022-07-31', '20:00:00', 1, 12, 17),
(139, 18, 15, '3', '1', 3, '2022-08-01', '19:00:00', 1, 10, 18),
(140, 9, 10, '3', '0', 3, '2022-07-29', '20:30:00', 1, 3, 9),
(157, 14, 9, '-', '-', 4, '2022-08-05', '18:00:00', 0, 93, 31),
(158, 10, 5, '-', '-', 4, '2022-08-05', '20:30:00', 0, 93, 31),
(159, 4, 18, '-', '-', 4, '2022-08-06', '15:00:00', 0, 93, 31),
(160, 12, 7, '-', '-', 4, '2022-08-06', '17:30:00', 0, 93, 31),
(161, 15, 17, '-', '-', 4, '2022-08-06', '20:00:00', 0, 93, 31),
(162, 11, 3, '-', '-', 4, '2022-08-07', '15:00:00', 0, 93, 31),
(163, 13, 1, '-', '-', 4, '2022-08-07', '17:30:00', 0, 93, 31),
(164, 8, 2, '-', '-', 4, '2022-08-07', '20:00:00', 0, 93, 31),
(165, 6, 16, '-', '-', 4, '2022-08-08', '19:00:00', 0, 93, 31);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `matchevents`
--

CREATE TABLE `matchevents` (
  `MatchID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `PlayerID` int(11) NOT NULL,
  `Minute` int(11) NOT NULL,
  `Half` int(11) NOT NULL,
  `EventType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `matchevents`
--

INSERT INTO `matchevents` (`MatchID`, `TeamID`, `PlayerID`, `Minute`, `Half`, `EventType`) VALUES
(1, 2, 45, 64, 2, 3),
(1, 11, 311, 76, 2, 3),
(1, 2, 59, 79, 2, 1),
(2, 15, 435, 45, 1, 3),
(2, 15, 433, 49, 2, 3),
(2, 13, 378, 75, 2, 3),
(2, 15, 436, 75, 2, 3),
(3, 14, 406, 14, 1, 1),
(3, 14, 406, 40, 1, 3),
(3, 1, 11, 47, 1, 3),
(3, 14, 398, 64, 2, 1),
(4, 5, 127, 18, 1, 3),
(4, 12, 350, 29, 1, 1),
(4, 5, 121, 58, 2, 3),
(4, 12, 350, 70, 2, 3),
(4, 12, 344, 74, 2, 3),
(4, 12, 349, 75, 2, 3),
(4, 5, 126, 84, 2, 3),
(4, 12, 339, 94, 2, 1),
(5, 18, 504, 29, 1, 3),
(5, 10, 267, 48, 1, 3),
(5, 10, 284, 50, 1, 3),
(5, 10, 267, 61, 2, 4),
(5, 10, 287, 72, 2, 1),
(5, 18, 516, 82, 2, 1),
(5, 18, 524, 90, 2, 3),
(5, 10, 264, 92, 2, 3),
(6, 16, 457, 20, 1, 3),
(6, 16, 452, 42, 1, 3),
(6, 16, 464, 53, 2, 1),
(6, 7, 188, 63, 2, 3),
(6, 7, 175, 81, 2, 1),
(6, 16, 450, 90, 2, 3),
(6, 16, 463, 93, 2, 3),
(8, 17, 494, 19, 1, 2),
(8, 17, 484, 30, 1, 3),
(8, 3, 89, 45, 1, 1),
(8, 3, 68, 57, 2, 3),
(8, 3, 74, 71, 2, 1),
(8, 17, 479, 79, 2, 5),
(7, 4, 96, 28, 1, 3),
(7, 6, 170, 43, 1, 1),
(7, 4, 106, 67, 2, 3),
(7, 6, 170, 77, 2, 1),
(7, 6, 161, 78, 2, 3),
(7, 6, 167, 91, 2, 1),
(9, 8, 206, 13, 1, 3),
(9, 9, 247, 24, 1, 1),
(9, 8, 213, 36, 1, 3),
(9, 9, 252, 41, 1, 1),
(9, 8, 222, 46, 2, 3),
(9, 8, 224, 75, 2, 5),
(17, 8, 204, 46, 1, 1),
(17, 8, 207, 57, 2, 3),
(17, 8, 222, 66, 2, 3),
(17, 4, 91, 73, 2, 3),
(17, 8, 208, 79, 2, 3),
(17, 4, 95, 84, 2, 1),
(17, 8, 206, 88, 2, 3),
(17, 8, 213, 94, 2, 3),
(17, 4, 116, 96, 2, 1),
(16, 2, 51, 54, 2, 3),
(16, 2, 41, 57, 2, 3),
(16, 2, 41, 94, 2, 4),
(16, 5, 130, 97, 2, 3),
(16, 2, 45, 100, 2, 1),
(16, 5, 128, 111, 2, 3),
(10, 6, 152, 14, 1, 1),
(10, 6, 165, 31, 1, 1),
(10, 6, 152, 36, 1, 3),
(10, 6, 166, 45, 1, 1),
(10, 6, 166, 47, 1, 1),
(10, 11, 309, 64, 2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nationalities`
--

CREATE TABLE `nationalities` (
  `CountryID` int(11) NOT NULL,
  `Country` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `FlagPath` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `nationalities`
--

INSERT INTO `nationalities` (`CountryID`, `Country`, `FlagPath`) VALUES
(1, 'Polska', '..\\flags\\polska.png'),
(2, 'Szwecja', '..\\flags\\szwecja.png'),
(3, 'Portugalia', '..\\flags\\portugalia.png'),
(4, 'Gruzja', '..\\flags\\gruzja.png'),
(5, 'Szkocja', '..\\flags\\szkocja.png'),
(6, 'Słowacja', '..\\flags\\slowacja.png'),
(7, 'Chorwacja', '..\\flags\\chorwacja.png'),
(8, 'Ukraina', '..\\flags\\ukraina.png'),
(9, 'Norwegia', '..\\flags\\norwegia.png'),
(10, 'Wybrzeże Kości Słoniowej', '..\\flags\\wks.png'),
(11, 'Czechy', '..\\flags\\czechy.png'),
(12, 'Bośnia i Hercegowina', '..\\flags\\bosnia.png'),
(13, 'Rumunia', '..\\flags\\rumunia.png'),
(14, 'Serbia', '..\\flags\\serbia.png'),
(15, 'Grecja', '..\\flags\\grecja.png'),
(16, 'Hiszpania', '..\\flags\\hiszpania.png'),
(17, 'Łotwa', '..\\flags\\lotwa.png'),
(18, 'Brazylia', '..\\flags\\brazylia.png'),
(19, 'Austria', '..\\flags\\austria.png'),
(20, 'Armenia', '..\\flags\\armenia.png'),
(21, 'Iran', '..\\flags\\iran.png'),
(22, 'Słowenia', '..\\flags\\slowenia.png'),
(23, 'Izrael', '..\\flags\\izrael.png'),
(24, 'Niemcy', '..\\flags\\niemcy.png'),
(25, 'Holandia', '..\\flags\\holandia.png'),
(26, 'Mali', '..\\flags\\mali.png'),
(27, 'Turcja', '..\\flags\\turcja.png'),
(28, 'Anglia', '..\\flags\\anglia.png'),
(29, 'Estonia', '..\\flags\\estonia.png'),
(30, 'Francja', '..\\flags\\francja.png'),
(31, 'Azerbejdżan', '..\\flags\\azerbejdzan.png'),
(32, 'Republika Południowej Afryki', '..\\flags\\rpa.png'),
(33, 'Wyspy Zielonego Przylądka', '..\\flags\\wzp.png'),
(34, 'Finlandia', '..\\flags\\finlandia.png'),
(35, 'Kamerun', '..\\flags\\kamerun.png'),
(36, 'Szwajcaria', '..\\flags\\szwajcaria.png'),
(37, 'Japonia', '..\\flags\\japonia.png'),
(38, 'Kosowo', '..\\flags\\kosowo.png'),
(39, 'Dania', '..\\flags\\dania.png'),
(40, 'Mauritius', '..\\flags\\mauritius.png'),
(41, 'Albania', '..\\flags\\albania.png'),
(47, 'Kanada', '..\\flags\\kanada.png'),
(48, 'Białoruś', '..\\flags\\bialorus.png'),
(49, 'Litwa', '..\\flags\\litwa.png'),
(50, 'Czarnogóra', '..\\flags\\czarnogora.png'),
(51, 'Senegal', '..\\flags\\senegal.png'),
(52, 'Curacao', '..\\flags\\curacao.png'),
(53, 'Chile', '..\\flags\\chile.png'),
(54, 'Islandia', '..\\flags\\islandia.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `players`
--

CREATE TABLE `players` (
  `PlayerID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `Position` varchar(15) COLLATE utf8mb4_polish_ci NOT NULL,
  `Nationality` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `Goals` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `players`
--

INSERT INTO `players` (`PlayerID`, `TeamID`, `Name`, `Surname`, `Position`, `Nationality`, `Goals`) VALUES
(1, 14, 'Krzysztof', 'Bakowski', 'Pomocnik', 'Portugalia', 11),
(2, 1, 'Filip', 'Bednarek', 'Bramkarz', 'Polska', 0),
(3, 1, 'Karol', 'Drażdżewski', 'Bramkarz', 'Polska', 0),
(4, 1, 'Artur', 'Rudko', 'Bramkarz', 'Ukraina', 0),
(5, 1, 'Filip', 'Dagerstal', 'Obrońca', 'Szwecja', 0),
(6, 1, 'Barry', 'Douglas', 'Obrońca', 'Szkocja', 0),
(7, 1, 'Igor', 'Kornobis', 'Obrońca', 'Polska', 0),
(8, 1, 'Adrian', 'Laskowski', 'Obrońca', 'Polska', 0),
(9, 1, 'Antonio', 'Milić', 'Obrońca', 'Chorwacja', 0),
(10, 1, 'Joel', 'Pereira', 'Obrońca', 'Portugalia', 0),
(11, 1, 'Maksymilian', 'Pingot', 'Obrońca', 'Polska', 0),
(12, 1, 'Pedro', 'Rebocho', 'Obrońca', 'Portugalia', 0),
(13, 1, 'Lubomir', 'Satka', 'Obrońca', 'Słowacja', 0),
(14, 1, 'Mateusz', 'Żukowski', 'Obrońca', 'Polska', 0),
(15, 1, 'Jakub', 'Antczak', 'Pomocnik', 'Polska', 0),
(16, 1, 'Maksym', 'Czekała', 'Pomocnik', 'Polska', 0),
(17, 1, 'Alan', 'Czerwiński', 'Pomocnik', 'Polska', 0),
(18, 1, 'Jesper', 'Karlstrom', 'Pomocnik', 'Szwecja', 0),
(19, 1, 'Antoni', 'Kozubal', 'Pomocnik', 'Polska', 0),
(20, 1, 'Nika', 'Kvekveskiri', 'Pomocnik', 'Gruzja', 0),
(21, 1, 'Filip', 'Marchwiński', 'Pomocnik', 'Polska', 0),
(22, 1, 'Radosław', 'Murawski', 'Pomocnik', 'Polska', 0),
(23, 1, 'Patryk', 'Olejnik', 'Pomocnik', 'Polska', 0),
(24, 1, 'Afonso', 'Sousa', 'Pomocnik', 'Portugalia', 0),
(25, 1, 'Georgiy', 'Tsitaishvili', 'Pomocnik', 'Gruzja', 0),
(26, 1, 'Joao', 'Amaral', 'Napastnik', 'Portugalia', 0),
(27, 1, 'Adriel', 'Ba Loua', 'Napastnik', 'Wybrzeże Kości Słoniowej', 0),
(28, 1, 'Mikael', 'Ishak', 'Bramkarz', 'Szwecja', 4),
(29, 1, 'Norbert', 'Pacławski', 'Napastnik', 'Polska', 0),
(30, 1, 'Michał', 'Skóraś', 'Napastnik', 'Polska', 0),
(31, 1, 'Artur', 'Sobiech', 'Napastnik', 'Polska', 0),
(32, 1, 'Filip', 'Szymczak', 'Napastnik', 'Polska', 0),
(33, 1, 'Kristoffer', 'Velde', 'Napastnik', 'Norwegia', 0),
(34, 2, 'Xavier', 'Dziekoński', 'Bramkarz', 'Polska', 0),
(35, 2, 'Vladan', 'Kovacevic', 'Bramkarz', 'Bośnia i Hercegowina', 0),
(36, 2, 'Jakub', 'Rajczykowski', 'Bramkarz', 'Polska', 0),
(37, 2, 'Kacper', 'Trelowski', 'Bramkarz', 'Polska', 0),
(38, 2, 'Zoran', 'Arsenić', 'Obrońca', 'Chorwacja', 0),
(39, 2, 'Łukasz', 'Furtak', 'Obrońca', 'Polska', 0),
(40, 2, 'Andrzej', 'Niewulis', 'Obrońca', 'Polska', 0),
(41, 2, 'Tomas', 'Petrasek', 'Obrońca', 'Czechy', 0),
(42, 2, 'Bogdan', 'Racovitan', 'Obrońca', 'Rumunia', 0),
(43, 2, 'Milan', 'Rundić', 'Obrońca', 'Serbia', 0),
(44, 2, 'Stratos', 'Svarnas', 'Obrońca', 'Grecja', 0),
(45, 2, 'Fran', 'Tudor', 'Obrońca', 'Chorwacja', 2),
(46, 2, 'Gustav', 'Berggren', 'Pomocnik', 'Szwecja', 0),
(47, 2, 'Marcin', 'Cebula', 'Pomocnik', 'Polska', 0),
(48, 2, 'Szymon', 'Czyż', 'Pomocnik', 'Polska', 0),
(49, 2, 'Wiktor', 'Długosz', 'Pomocnik', 'Polska', 0),
(50, 2, 'Walerian', 'Gwilia', 'Pomocnik', 'Gruzja', 0),
(51, 2, 'Vladyslav', 'Kochergin', 'Pomocnik', 'Ukraina', 0),
(52, 2, 'Patryk', 'Kun', 'Pomocnik', 'Polska', 0),
(53, 2, 'Ben', 'Lederman', 'Pomocnik', 'Polska', 0),
(54, 2, 'Ivi', 'López', 'Pomocnik', 'Hiszpania', 0),
(55, 2, 'Bartosz', 'Nowak', 'Pomocnik', 'Polska', 0),
(56, 2, 'Giannis', 'Papanikolaou', 'Pomocnik', 'Grecja', 0),
(57, 2, 'Deian', 'Sorescu', 'Pomocnik', 'Rumunia', 0),
(58, 2, 'Mateusz', 'Wdowiak', 'Pomocnik', 'Polska', 0),
(59, 2, 'Vladislavs', 'Gutkovskis', 'Napastnik', 'Łotwa', 0),
(60, 2, 'Sebastian', 'Musiolik', 'Napastnik', 'Polska', 0),
(61, 2, 'Fabian', 'Piasecki', 'Napastnik', 'Polska', 0),
(62, 2, 'Daniel', 'Szelągowski', 'Napastnik', 'Polska', 0),
(63, 3, 'Bartosz', 'Klebaniuk', 'Bramkarz', 'Polska', 0),
(64, 3, 'Dante', 'Stipica', 'Bramkarz', 'Chorwacja', 0),
(65, 3, 'Jakub', 'Bartkowski', 'Obrońca', 'Polska', 0),
(66, 3, 'Leo', 'Borges', 'Obrońca', 'Brazylia', 0),
(67, 3, 'Luis', 'Mata', 'Obrońca', 'Portugalia', 0),
(68, 3, 'Mariusz', 'Malec', 'Obrońca', 'Polska', 0),
(69, 3, 'Bartłomiej', 'Mruk', 'Obrońca', 'Polska', 0),
(70, 3, 'Paweł', 'Stolarski', 'Obrońca', 'Polska', 0),
(71, 3, 'Konstantinos', 'Triantafyllopoulos', 'Obrońca', 'Grecja', 0),
(72, 3, 'Benedikt', 'Zech', 'Obrońca', 'Austria', 0),
(73, 3, 'Pontus', 'Almqvist', 'Pomocnik', 'Szwecja', 0),
(74, 3, 'Vahan', 'Bichakhchyan', 'Pomocnik', 'Armenia', 1),
(75, 3, 'Kamil', 'Drygas', 'Pomocnik', 'Polska', 0),
(76, 3, 'Damian', 'Dąbrowski', 'Pomocnik', 'Polska', 0),
(77, 3, 'Mariusz', 'Fornalczyk', 'Pomocnik', 'Polska', 0),
(78, 3, 'Kamil', 'Grosicki', 'Pomocnik', 'Polska', 0),
(79, 3, 'Sebastian', 'Kowalczyk', 'Pomocnik', 'Polska', 0),
(80, 3, 'Mateusz', 'Łęgowski', 'Pomocnik', 'Polska', 0),
(81, 3, 'Kacper', 'Smoliński', 'Pomocnik', 'Polska', 0),
(82, 3, 'Stanisław', 'Wawrzynowicz', 'Pomocnik', 'Polska', 0),
(83, 3, 'Amin', 'Doustali', 'Napastnik', 'Iran', 3),
(84, 3, 'Carlos', 'Jean', 'Napastnik', 'Brazylia', 0),
(85, 3, 'Kacper', 'Kostorz', 'Napastnik', 'Polska', 0),
(86, 3, 'Michał', 'Kucharczyk', 'Napastnik', 'Polska', 0),
(87, 3, 'Rafał', 'Kurzawa', 'Napastnik', 'Polska', 0),
(88, 3, 'Marcel', 'Wędrychowski', 'Napastnik', 'Polska', 0),
(89, 3, 'Luka', 'Zahović', 'Napastnik', 'Słowenia', 1),
(90, 4, 'Michał', 'Buchalik', 'Bramkarz', 'Polska', 0),
(91, 4, 'Dusan', 'Kuciak', 'Bramkarz', 'Słowacja', 0),
(92, 4, 'Antoni', 'Mikułko', 'Bramkarz', 'Polska', 0),
(93, 4, 'Bartosz', 'Brzęk', 'Obrońca', 'Polska', 0),
(94, 4, 'Conrado', 'Buchanelli Holz', 'Obrońca', 'Brazylia', 0),
(95, 4, 'Mario', 'Maloca', 'Obrońca', 'Chorwacja', 0),
(96, 4, 'Michał', 'Nalepa', 'Obrońca', 'Polska', 0),
(97, 4, 'Rafał', 'Pietrzak', 'Obrońca', 'Polska', 0),
(98, 4, 'David', 'Stec', 'Obrońca', 'Austria', 0),
(99, 4, 'Kristers', 'Tobers', 'Obrońca', 'Łotwa', 0),
(100, 4, 'Joel', 'Abu Hanna', 'Pomocnik', 'Izrael', 0),
(101, 4, 'Henrik', 'Castergen', 'Pomocnik', 'Szwecja', 0),
(102, 4, 'Christian', 'Clemens', 'Pomocnik', 'Niemcy', 0),
(103, 4, 'Maciej', 'Gajos', 'Pomocnik', 'Polska', 0),
(104, 4, 'Jakub', 'Kałuziński', 'Pomocnik', 'Polska', 0),
(105, 4, 'Filip', 'Koperski', 'Pomocnik', 'Polska', 0),
(106, 4, 'Jarosław', 'Kubicki', 'Pomocnik', 'Polska', 0),
(107, 4, 'Dominik', 'Piła', 'Pomocnik', 'Polska', 0),
(108, 4, 'Marco', 'Terazzino', 'Pomocnik', 'Niemcy', 0),
(109, 4, 'Filip', 'Tonder', 'Pomocnik', 'Polska', 0),
(110, 4, 'Joeri', 'de Kamps', 'Pomocnik', 'Holandia', 0),
(111, 1, 'Basseoku', 'Diabate', 'Bramkarz', 'Mali', 2),
(112, 4, 'Ilkay', 'Durmus', 'Napastnik', 'Turcja', 0),
(113, 4, 'Krystian', 'Okoniewski', 'Napastnik', 'Polska', 0),
(114, 4, 'Flavio', 'Paixao', 'Napastnik', 'Portugalia', 0),
(115, 4, 'Kacper', 'Sezonienko', 'Napastnik', 'Polska', 0),
(116, 4, 'Łukasz', 'Zwoliński', 'Napastnik', 'Polska', 0),
(117, 5, 'Bartłomiej', 'Jelonek', 'Bramkarz', 'Polska', 0),
(118, 5, 'Frantisek', 'Plach', 'Bramkarz', 'Słowacja', 0),
(119, 5, 'Karol', 'Szymański', 'Bramkarz', 'Polska', 0),
(120, 5, 'Jakub', 'Czerwiński', 'Obrońca', 'Polska', 0),
(121, 5, 'Tomas', 'Huk', 'Obrońca', 'Słowacja', 0),
(122, 5, 'Alexandros', 'Katranis', 'Obrońca', 'Grecja', 0),
(123, 5, 'Miguel', 'Munez', 'Obrońca', 'Hiszpania', 0),
(124, 5, 'Tomasz', 'Moskwa', 'Obrońca', 'Polska', 0),
(125, 5, 'Ariel', 'Mosor', 'Obrońca', 'Polska', 0),
(126, 5, 'Michael', 'Ameyaw', 'Pomocnik', 'Polska', 0),
(127, 5, 'Michał', 'Chrapek', 'Pomocnik', 'Polska', 0),
(128, 5, 'Patryk', 'Dziczek', 'Pomocnik', 'Polska', 0),
(129, 5, 'Jorge', 'Felix', 'Pomocnik', 'Hiszpania', 0),
(130, 5, 'Tom', 'Hateley', 'Pomocnik', 'Anglia', 0),
(131, 5, 'Michał', 'Kaput', 'Pomocnik', 'Polska', 0),
(132, 5, 'Oskar', 'Leśniak', 'Pomocnik', 'Polska', 0),
(133, 5, 'Jakub', 'Niedbała', 'Pomocnik', 'Polska', 0),
(134, 5, 'Arkadiusz', 'Pyrka', 'Pomocnik', 'Polska', 0),
(135, 5, 'Constantin', 'Reiner', 'Pomocnik', 'Austria', 0),
(136, 5, 'Grzegorz', 'Tomasiewicz', 'Pomocnik', 'Polska', 0),
(137, 5, 'Bartosz', 'Łuczak', 'Pomocnik', 'Polska', 0),
(138, 5, 'Jakub', 'Holubek', 'Napastnik', 'Słowacja', 0),
(139, 1, 'Damian', 'Kądzior', 'Bramkarz', 'Polska', 3),
(140, 5, 'Rauno', 'Sappinen', 'Napastnik', 'Estonia', 0),
(141, 5, 'Alberto', 'Toril Domingo', 'Napastnik', 'Hiszpania', 0),
(142, 5, 'Kamil', 'Wilczek', 'Napastnik', 'Polska', 0),
(143, 6, 'Bartłomiej', 'Gradecki', 'Bramkarz', 'Polska', 0),
(144, 6, 'Krzysztof', 'Kamiński', 'Bramkarz', 'Polska', 0),
(145, 6, 'Oskar', 'Lodziński', 'Bramkarz', 'Polska', 0),
(146, 6, 'Adam', 'Chrzanowski', 'Obrońca', 'Polska', 0),
(147, 6, 'Igor', 'Drapiński', 'Obrońca', 'Polska', 0),
(148, 6, 'Steve', 'Kapuadi', 'Obrońca', 'Francja', 0),
(149, 6, 'Anton', 'Kryvotsyuk', 'Obrońca', 'Azerbejdżan', 0),
(150, 6, 'Jakub', 'Rzeźniczak', 'Obrońca', 'Polska', 0),
(151, 6, 'Martin', 'Sulek', 'Obrońca', 'Słowacja', 0),
(152, 6, 'Piotr', 'Tomasik', 'Obrońca', 'Polska', 0),
(153, 6, 'Kristian', 'Vallo', 'Obrońca', 'Słowacja', 0),
(154, 6, 'Radosław', 'Cielemecki', 'Pomocnik', 'Polska', 0),
(155, 6, 'Dominik', 'Furman', 'Pomocnik', 'Polska', 0),
(156, 6, 'Miroslav', 'Gono', 'Pomocnik', 'Słowacja', 0),
(157, 6, 'Dawid', 'Krzyżański', 'Pomocnik', 'Polska', 0),
(158, 6, 'Milan', 'Kvocera', 'Pomocnik', 'Słowacja', 0),
(159, 6, 'Filip', 'Lesniak', 'Pomocnik', 'Słowacja', 0),
(160, 6, 'Michał', 'Mokrzycki', 'Pomocnik', 'Polska', 0),
(161, 6, 'Aleksander', 'Pawlak', 'Pomocnik', 'Polska', 0),
(162, 6, 'Damian', 'Rasak', 'Pomocnik', 'Polska', 0),
(163, 6, 'Mateusz', 'Szwoch', 'Pomocnik', 'Polska', 0),
(164, 6, 'Damian', 'Warchoł', 'Pomocnik', 'Polska', 0),
(165, 6, 'Rafał', 'Wolski', 'Pomocnik', 'Polska', 0),
(166, 6, 'David', 'Alvarez', 'Napastnik', 'Hiszpania', 2),
(167, 6, 'Dawid', 'Kocyła', 'Napastnik', 'Polska', 1),
(168, 6, 'Marko', 'Kolar', 'Napastnik', 'Chorwacja', 0),
(169, 6, 'Mateusz', 'Lewandowski', 'Napastnik', 'Polska', 0),
(170, 6, 'Łukasz', 'Sekulski', 'Napastnik', 'Polska', 4),
(171, 6, 'Adrian', 'Szczutkowski', 'Napastnik', 'Polska', 0),
(172, 6, 'Tomasz', 'Walczak', 'Napastnik', 'Polska', 0),
(173, 7, 'Gabriel', 'Kobylak', 'Bramkarz', 'Polska', 0),
(174, 7, 'Jakub', 'Ojrzyński', 'Bramkarz', 'Polska', 0),
(175, 7, 'Dawid', 'Abramowicz', 'Obrońca', 'Polska', 1),
(176, 7, 'Mateusz', 'Cichocki', 'Obrońca', 'Polska', 0),
(177, 7, 'Aleksander', 'Gajgier', 'Obrońca', 'Polska', 0),
(178, 7, 'Mateusz', 'Grzybek', 'Obrońca', 'Polska', 0),
(179, 7, 'Damian', 'Jakubik', 'Obrońca', 'Polska', 0),
(180, 7, 'Tiago', 'Matos', 'Obrońca', 'Portugalia', 0),
(181, 7, 'Dariusz', 'Pawłowski', 'Obrońca', 'Polska', 0),
(182, 7, 'Pedro', 'Justiniano', 'Obrońca', 'Portugalia', 0),
(183, 7, 'Raphael', 'Rossi', 'Obrońca', 'Brazylia', 0),
(184, 7, 'Roberto', 'Alves', 'Pomocnik', 'Szwajcaria', 0),
(185, 7, 'Thabo', 'Cele', 'Pomocnik', 'Republika Południowej Afryki', 0),
(186, 7, 'Józef', 'Kolasa', 'Pomocnik', 'Polska', 0),
(187, 7, 'Nikolas', 'Korzeniecki', 'Pomocnik', 'Polska', 0),
(188, 7, 'Luiz Gustavo', 'Novaes Palhares', 'Pomocnik', 'Brazylia', 0),
(189, 7, 'Filipe', 'Nascimento', 'Pomocnik', 'Portugalia', 0),
(190, 7, 'Jakub', 'Nowakowski', 'Pomocnik', 'Polska', 0),
(191, 7, 'Lisandro', 'Semedo', 'Pomocnik', 'Wyspy Zielonego Przylądka', 0),
(192, 7, 'Jakub', 'Snopczyński', 'Pomocnik', 'Polska', 0),
(193, 7, 'Daniel', 'Łukasik', 'Pomocnik', 'Polska', 0),
(194, 7, 'Miłosz', 'Żurawski', 'Pomocnik', 'Polska', 0),
(195, 7, 'Michał', 'Feliks', 'Napastnik', 'Polska', 0),
(196, 7, 'Leandro', 'Rossi', 'Napastnik', 'Brazylia', 0),
(197, 7, 'Luis', 'Machado', 'Napastnik', 'Portugalia', 0),
(198, 7, 'Daniel', 'Pik', 'Napastnik', 'Polska', 0),
(199, 7, 'Maurides', 'Roque Junior', 'Napastnik', 'Brazylia', 0),
(200, 7, 'Dominik', 'Sokół', 'Napastnik', 'Polska', 3),
(201, 8, 'Daniel', 'Bielica', 'Bramkarz', 'Polska', 0),
(202, 8, 'Kevin', 'Broll', 'Bramkarz', 'Niemcy', 0),
(203, 8, 'Paweł', 'Sokół', 'Bramkarz', 'Polska', 0),
(204, 8, 'Emil', 'Bergstrom', 'Obrońca', 'Szwecja', 0),
(205, 8, 'Rafał', 'Janicki', 'Obrońca', 'Polska', 0),
(206, 8, 'Erik', 'Janza', 'Obrońca', 'Słowenia', 0),
(207, 8, 'Richard', 'Jensen', 'Obrońca', 'Finlandia', 0),
(208, 8, 'Jean', 'Jules', 'Obrońca', 'Kamerun', 0),
(209, 8, 'Paweł', 'Olkowski', 'Obrońca', 'Polska', 0),
(210, 8, 'Aleksander', 'Paluszek', 'Obrońca', 'Polska', 0),
(211, 8, 'Kamil', 'Surowiec', 'Obrońca', 'Polska', 0),
(212, 8, 'Kryspin', 'Szcześniak', 'Obrońca', 'Polska', 0),
(213, 8, 'Robert', 'Dadok', 'Pomocnik', 'Polska', 0),
(214, 8, 'Robin', 'Kamber', 'Pomocnik', 'Szwajcaria', 0),
(215, 8, 'Krzysztof', 'Kolanko', 'Pomocnik', 'Polska', 0),
(216, 8, 'Jonatan', 'Kotzke', 'Pomocnik', 'Niemcy', 0),
(217, 8, 'Jakub', 'Szymański', 'Pomocnik', 'Polska', 0),
(218, 8, 'Blaz', 'Vrhovec', 'Pomocnik', 'Słowenia', 0),
(219, 8, 'Norbert', 'Wojtuszek', 'Pomocnik', 'Polska', 0),
(220, 8, 'Mateusz', 'Cholewiak', 'Napastnik', 'Polska', 0),
(221, 8, 'Jan', 'Ciucka', 'Napastnik', 'Polska', 0),
(222, 8, 'Piotr', 'Krawczyk', 'Napastnik', 'Polska', 0),
(223, 8, 'Amadej', 'Marosa', 'Napastnik', 'Słowenia', 0),
(224, 8, 'Kanji', 'Okunuki', 'Napastnik', 'Japonia', 0),
(225, 8, 'Dani', 'Pacheco', 'Napastnik', 'Hiszpania', 0),
(226, 8, 'Lukas', 'Podolski', 'Napastnik', 'Niemcy', 0),
(227, 8, 'Szymon', 'Włodarczyk', 'Napastnik', 'Polska', 0),
(228, 9, 'Lukas', 'Hrosso', 'Bramkarz', 'Słowacja', 0),
(229, 9, 'Sebastian', 'Madejski', 'Bramkarz', 'Polska', 0),
(230, 9, 'Karol', 'Niemczycki', 'Bramkarz', 'Polska', 0),
(231, 9, 'Adam', 'Wilk', 'Bramkarz', 'Polska', 0),
(232, 9, 'Krystian', 'Bracik', 'Obrońca', 'Polska', 0),
(233, 9, 'Virgil', 'Ghita', 'Obrońca', 'Rumunia', 0),
(234, 9, 'David', 'Jablonsky', 'Obrońca', 'Czechy', 0),
(235, 9, 'Paweł', 'Jaroszyński', 'Obrońca', 'Polska', 0),
(236, 9, 'Jakub', 'Jugas', 'Obrońca', 'Czechy', 0),
(237, 9, 'Kamil', 'Pestka', 'Obrońca', 'Polska', 0),
(238, 9, 'Cornel', 'Rapa', 'Obrońca', 'Rumunia', 0),
(239, 9, 'Matej', 'Rodin', 'Obrońca', 'Chorwacja', 0),
(240, 9, 'Michal', 'Siplak', 'Obrońca', 'Słowacja', 0),
(241, 9, 'Michał', 'Stachera', 'Obrońca', 'Polska', 0),
(242, 9, 'Marcin', 'Budziński', 'Pomocnik', 'Polska', 0),
(243, 9, 'Kacper', 'Jodłowski', 'Pomocnik', 'Polska', 0),
(244, 9, 'Otar', 'Kakabadze', 'Pomocnik', 'Gruzja', 0),
(245, 9, 'Karol', 'Knap', 'Pomocnik', 'Polska', 0),
(246, 9, 'Evgen', 'Konoplyanka', 'Pomocnik', 'Ukraina', 0),
(247, 9, 'Florian', 'Loshaj', 'Pomocnik', 'Kosowo', 1),
(248, 9, 'Jakub', 'Myszor', 'Pomocnik', 'Polska', 0),
(249, 9, 'Kamil', 'Ogorzały', 'Pomocnik', 'Polska', 0),
(250, 9, 'Takuto', 'Oshima', 'Pomocnik', 'Japonia', 0),
(251, 9, 'Robert', 'Ożóg', 'Pomocnik', 'Polska', 0),
(252, 9, 'Michał', 'Rakoczy', 'Pomocnik', 'Polska', 1),
(253, 9, 'Mathias', 'Rasmussen', 'Pomocnik', 'Dania', 0),
(254, 9, 'Thiago', 'Rodriguez de Souza', 'Pomocnik', 'Brazylia', 0),
(255, 9, 'Filip', 'Balaj', 'Napastnik', 'Słowacja', 0),
(256, 9, 'Benjamin', 'Kallman', 'Napastnik', 'Finlandia', 0),
(257, 9, 'Przemysław', 'Kapek', 'Napastnik', 'Polska', 3),
(258, 9, 'Patryk', 'Makuch', 'Napastnik', 'Polska', 0),
(259, 9, 'Sebastian', 'Strózik', 'Napastnik', 'Polska', 0),
(260, 10, 'Dominik', 'Hładun', 'Bramkarz', 'Polska', 0),
(261, 10, 'Cezary', 'Miszta', 'Bramkarz', 'Polska', 0),
(262, 10, 'Kacper', 'Tobiasz', 'Bramkarz', 'Polska', 0),
(263, 10, 'Mattias', 'Johansson', 'Obrońca', 'Szwecja', 0),
(264, 10, 'Artur', 'Jędrzejczyk', 'Obrońca', 'Polska', 0),
(265, 10, 'Jakub', 'Kisiel', 'Obrońca', 'Polska', 0),
(266, 10, 'Filip', 'Mladenović', 'Obrońca', 'Serbia', 0),
(267, 10, 'Maik', 'Nawrocki', 'Obrońca', 'Polska', 0),
(268, 10, 'Nikodem', 'Niski', 'Obrońca', 'Polska', 0),
(269, 10, 'Yuri', 'Ribeiro', 'Obrońca', 'Portugalia', 0),
(270, 10, 'Lindsay', 'Rose', 'Obrońca', 'Mauritius', 0),
(271, 10, 'Julien', 'Tadrowski', 'Obrońca', 'Polska', 0),
(272, 10, 'Rafał', 'Augustyniak', 'Pomocnik', 'Polska', 0),
(273, 10, 'Jurgen', 'Celhaka', 'Pomocnik', 'Albania', 0),
(274, 10, 'Josue', 'Pesqueira', 'Pomocnik', 'Portugalia', 0),
(275, 10, 'Bartosz', 'Kapustka', 'Pomocnik', 'Polska', 0),
(276, 10, 'Igor', 'Kharatin', 'Pomocnik', 'Ukraina', 0),
(277, 10, 'Igor', 'Korczakowski', 'Pomocnik', 'Polska', 0),
(278, 10, 'Maciej', 'Rosołek', 'Pomocnik', 'Polska', 0),
(279, 10, 'Bartosz', 'Slisz', 'Pomocnik', 'Polska', 0),
(280, 10, 'Patryk', 'Sokołowski', 'Pomocnik', 'Polska', 0),
(281, 10, 'Igor', 'Strzałek', 'Pomocnik', 'Polska', 0),
(282, 10, 'Paweł', 'Wszołek', 'Pomocnik', 'Polska', 1),
(283, 10, 'Makana', 'Baku', 'Napastnik', 'Niemcy', 0),
(284, 10, 'Carlos Daniel', 'López Huesca', 'Napastnik', 'Hiszpania', 0),
(285, 10, 'Wiktor', 'Kamiński', 'Napastnik', 'Polska', 0),
(286, 10, 'Blaz', 'Kramer', 'Napastnik', 'Słowenia', 0),
(287, 10, 'Ernest', 'Muci', 'Napastnik', 'Albania', 1),
(288, 10, 'Robert', 'Pich', 'Napastnik', 'Słowacja', 0),
(289, 10, 'Kacper', 'Skibicki', 'Napastnik', 'Polska', 0),
(301, 11, 'Jędrzej', 'Grobelny', 'Bramkarz', 'Polska', 0),
(302, 11, 'Mateusz', 'Kustosz', 'Bramkarz', 'Polska', 0),
(303, 11, 'Adrian', 'Lis', 'Bramkarz', 'Polska', 0),
(304, 11, 'Jan', 'Grzesik', 'Obrońca', 'Polska', 0),
(305, 11, 'Robert', 'Ivanov', 'Obrońca', 'Finlandia', 0),
(306, 11, 'Bartosz', 'Kileliba', 'Obrońca', 'Polska', 0),
(307, 11, 'Kamil', 'Kościelny', 'Obrońca', 'Polska', 0),
(308, 11, 'Konrad', 'Matuszewski', 'Obrońca', 'Polska', 0),
(309, 11, 'Wiktor', 'Pleśnierowicz', 'Obrońca', 'Polska', 0),
(310, 11, 'Dimitros', 'Stavropoulos', 'Obrońca', 'Grecja', 0),
(311, 11, 'Jakub', 'Kiełb', 'Pomocnik', 'Polska', 0),
(312, 11, 'Michał', 'Kopczyński', 'Pomocnik', 'Polska', 0),
(313, 11, 'Mateusz', 'Kupczak', 'Pomocnik', 'Polska', 0),
(314, 11, 'Luis', 'Miguel Mariz', 'Pomocnik', 'Portugalia', 0),
(315, 11, 'Niilo', 'Maenpaa', 'Pomocnik', 'Finlandia', 0),
(316, 11, 'Miłosz', 'Szczepański', 'Pomocnik', 'Polska', 0),
(317, 11, 'Kajetan', 'Szmyt', 'Pomocnik', 'Polska', 0),
(318, 11, 'Dawid', 'Szymonowicz', 'Pomocnik', 'Polska', 0),
(319, 11, 'Maciej', 'Żurawski', 'Pomocnik', 'Polska', 0),
(320, 11, 'Destan', 'Enis', 'Napastnik', 'Turcja', 0),
(321, 11, 'Michał', 'Jakóbowski', 'Napastnik', 'Polska', 0),
(322, 1, 'Szymon', 'Sarbinowski', 'Bramkarz', 'Polska', 1),
(323, 11, 'Adam', 'Zrelak', 'Napastnik', 'Słowacja', 0),
(324, 12, 'Sławomir', 'Abramowicz', 'Bramkarz', 'Polska', 0),
(325, 12, 'Bartłomiej', 'Zynel', 'Bramkarz', 'Polska', 0),
(326, 12, 'Zlatan', 'Alomerovic', 'Bramkarz', 'Niemcy', 0),
(327, 12, 'Jakub', 'Lewicki', 'Obrońca', 'Polska', 0),
(328, 12, 'Bojan', 'Nastic', 'Obrońca', 'Bośnia i Hercegowina', 0),
(329, 12, 'Bojan', 'Paweł', 'Olszewski', 'Polska', 0),
(330, 12, 'Paweł', 'Olszewski', 'Obrońca', 'Polska', 0),
(331, 12, 'Michał', 'Ozga', 'Obrońca', 'Polska', 0),
(332, 12, 'Michał', 'Pazdan', 'Obrońca', 'Polska', 0),
(333, 12, 'Israel', 'Puerto', 'Obrońca', 'Hiszpania', 0),
(334, 12, 'Mateusz', 'Skrzypczak', 'Obrońca', 'Polska', 0),
(335, 12, 'Bartłomiej', 'Wdowik', 'Obrońca', 'Polska', 0),
(336, 12, 'Bartosz', 'Bernatowicz', 'Pomocnik', 'Polska', 0),
(337, 12, 'Maciej', 'Bortniczuk', 'Pomocnik', 'Polska', 0),
(338, 12, 'Juan', 'Camara', 'Pomocnik', 'Hiszpania', 0),
(339, 12, 'Mateusz', 'Kowalewski', 'Pomocnik', 'Polska', 1),
(340, 12, 'Hikaru', 'Matsui', 'Pomocnik', 'Japonia', 0),
(341, 12, 'Miłosz', 'Matysik', 'Pomocnik', 'Polska', 0),
(342, 12, 'Rui Filippe', 'Correia', 'Pomocnik', 'Portugalia', 0),
(343, 12, 'Aurelien', 'Nguiamba', 'Pomocnik', 'Francja', 0),
(344, 12, 'Martin', 'Pospisil', 'Pomocnik', 'Czechy', 0),
(345, 12, 'Taras', 'Romanczuk', 'Pomocnik', 'Polska', 0),
(346, 12, 'Oliwier', 'Wojciehowski', 'Pomocnik', 'Polska', 0),
(347, 12, 'Damian', 'Wojdakowski', 'Pomocnik', 'Polska', 0),
(348, 12, 'Bartosz', 'Bida', 'Napastnik', 'Polska', 2),
(349, 12, 'Marc', 'Gual', 'Napastnik', 'Hiszpania', 0),
(350, 12, 'Jesus', 'Imaz', 'Napastnik', 'Hiszpania', 1),
(351, 12, 'Tomasz', 'Kupisz', 'Napastnik', 'Polska', 0),
(352, 12, 'Wojciech', 'Laski', 'Napastnik', 'Polska', 0),
(353, 12, 'Tomas', 'Prikryl', 'Napastnik', 'Czechy', 0),
(354, 12, 'Michał', 'Samborski', 'Napastnik', 'Polska', 0),
(355, 12, 'Andrzej', 'Trubeha', 'Napastnik', 'Polska', 3),
(356, 12, 'Maciej', 'Twarowski', 'Napastnik', 'Polska', 0),
(357, 13, 'Kacper', 'Bieszczad', 'Bramkarz', 'Polska', 0),
(358, 13, 'Jasmin', 'Burić', 'Bramkarz', 'Bośnia i Hercegowina', 0),
(359, 13, 'Szymon', 'Weirauch', 'Bramkarz', 'Polska', 0),
(360, 13, 'Guram', 'Giorbelidze', 'Obrońca', 'Gruzja', 0),
(361, 13, 'Mateusz', 'Grzybek', 'Obrońca', 'Polska', 0),
(362, 13, 'Jarosław', 'Jach', 'Obrońca', 'Polska', 0),
(363, 13, 'Jakub', 'Kolan', 'Obrońca', 'Polska', 0),
(364, 13, 'Bartosz', 'Kopacz', 'Obrońca', 'Polska', 0),
(365, 13, 'Bartłomiej', 'Kłudka', 'Obrońca', 'Polska', 0),
(366, 13, 'Kacper', 'Lepczyński', 'Obrońca', 'Polska', 0),
(367, 13, 'Aleks', 'Ławniczak', 'Obrońca', 'Polska', 0),
(368, 13, 'Mateusz', 'Bartolewski', 'Pomocnik', 'Polska', 0),
(369, 13, 'Damjan', 'Bohar', 'Pomocnik', 'Słowenia', 0),
(370, 13, 'Kacper', 'Chodyna', 'Pomocnik', 'Polska', 0),
(371, 13, 'Koki', 'Hinokio', 'Pomocnik', 'Japonia', 0),
(372, 13, 'Szymon', 'Kobusiński', 'Pomocnik', 'Polska', 0),
(373, 13, 'Filip', 'Kocaba', 'Pomocnik', 'Polska', 0),
(374, 13, 'Tomasz', 'Makowski', 'Pomocnik', 'Polska', 0),
(375, 13, 'Kacper', 'Masiak', 'Pomocnik', 'Polska', 0),
(376, 13, 'Marko', 'Poletanovic', 'Pomocnik', 'Serbia', 0),
(377, 13, 'Adam', 'Ratajczyk', 'Pomocnik', 'Polska', 0),
(378, 13, 'Filip', 'Starzyński', 'Pomocnik', 'Polska', 0),
(379, 13, 'Arkadiusz', 'Woźniak', 'Pomocnik', 'Polska', 0),
(380, 13, 'Łukasz', 'Łakomy', 'Pomocnik', 'Polska', 0),
(381, 13, 'Jakub', 'Żubrowski', 'Pomocnik', 'Polska', 0),
(382, 13, 'Rafał', 'Adamski', 'Napastnik', 'Polska', 0),
(383, 13, 'Cheikhou', 'Dieng', 'Napastnik', 'Senegal', 0),
(384, 13, 'Martin', 'Dolezal', 'Napastnik', 'Czechy', 0),
(385, 13, 'Tornike', 'Gaprindachvili', 'Napastnik', 'Gruzja', 0),
(386, 13, 'Dawid', 'Kurminowski', 'Napastnik', 'Polska', 0),
(387, 13, 'Tomasz', 'Pienko', 'Napastnik', 'Polska', 3),
(388, 13, 'Aleksandar', 'Zivec Sasa', 'Napastnik', 'Słowenia', 0),
(389, 14, 'Mateusz', 'Dudek', 'Bramkarz', 'Polska', 0),
(390, 14, 'Mateusz', 'Kochalski', 'Bramkarz', 'Polska', 0),
(391, 14, 'Bartosz', 'Mrozek', 'Bramkarz', 'Polska', 0),
(392, 14, 'Dominykas', 'Barauskas', 'Obrońca', 'Litwa', 0),
(393, 14, 'Marcin', 'Flis', 'Obrońca', 'Polska', 0),
(394, 14, 'Arkadiusz', 'Kasperkiewicz', 'Obrońca', 'Polska', 0),
(395, 14, 'Kamil', 'Kruk', 'Obrońca', 'Polska', 0),
(396, 14, 'Leandro', 'Messias dos Santos', 'Obrońca', 'Brazylia', 0),
(397, 14, 'Bartłomiej', 'Ciepiela', 'Pomocnik', 'Polska', 0),
(398, 14, 'Maciej', 'Domański', 'Pomocnik', 'Polska', 1),
(399, 14, 'Fryderyk', 'Gerbowski', 'Pomocnik', 'Polska', 0),
(400, 14, 'Krystian', 'Getinger', 'Pomocnik', 'Polska', 0),
(401, 14, 'Fabian', 'Hiszpański', 'Pomocnik', 'Polska', 0),
(402, 14, 'Krystian', 'Kardys', 'Pomocnik', 'Polska', 0),
(403, 14, 'Mateusz', 'Mak', 'Pomocnik', 'Polska', 0),
(404, 14, 'Mateusz', 'Matras', 'Pomocnik', 'Polska', 0),
(405, 14, 'Adrian', 'Sobon', 'Pomocnik', 'Polska', 0),
(406, 14, 'Piotr', 'Wlazło', 'Pomocnik', 'Polska', 1),
(407, 14, 'Maciej', 'Wolski', 'Pomocnik', 'Polska', 0),
(408, 14, 'Michael', 'Wyparło', 'Pomocnik', 'Polska', 0),
(409, 14, 'Said', 'Hamulic', 'Napastnik', 'Holandia', 0),
(410, 14, 'Mikołaj', 'Lebedyński', 'Napastnik', 'Polska', 0),
(411, 14, 'Paweł', 'Żyra', 'Napastnik', 'Polska', 0),
(412, 15, 'Józef', 'Burta', 'Bramkarz', 'Polska', 0),
(413, 15, 'Rafał', 'Leszczyński', 'Bramkarz', 'Polska', 0),
(414, 15, 'Oskar', 'Mielcarz', 'Bramkarz', 'Polska', 0),
(415, 15, 'Michał', 'Szromnik', 'Bramkarz', 'Polska', 0),
(416, 15, 'Łukasz', 'Bejger', 'Obrońca', 'Polska', 0),
(417, 15, 'Daniel Leo', 'Gretarsson', 'Obrońca', 'Islandia', 0),
(418, 15, 'Patryk', 'Janasik', 'Obrońca', 'Polska', 0),
(419, 15, 'Martin', 'Konczkowski', 'Obrońca', 'Polska', 0),
(420, 15, 'Konrad', 'Poprawa', 'Obrońca', 'Polska', 0),
(421, 15, 'Mateusz', 'Stawny', 'Obrońca', 'Polska', 0),
(422, 15, 'Diogo', 'Verdasca', 'Obrońca', 'Portugalia', 0),
(423, 15, 'Olivier', 'Wypart', 'Obrońca', 'Polska', 0),
(424, 15, 'Karol', 'Borys', 'Pomocnik', 'Polska', 0),
(425, 15, 'Adrian', 'Bukowski', 'Pomocnik', 'Polska', 0),
(426, 15, 'Javier', 'Hyjek', 'Pomocnik', 'Polska', 0),
(427, 15, 'Patrick', 'Olsen', 'Pomocnik', 'Dania', 3),
(428, 15, 'Michał', 'Rzuchowski', 'Pomocnik', 'Polska', 0),
(429, 15, 'Petr', 'Schwarz', 'Pomocnik', 'Czechy', 0),
(430, 15, 'John', 'Yeboah', 'Pomocnik', 'Niemcy', 0),
(431, 15, 'Adrian', 'Łyszczak', 'Pomocnik', 'Polska', 0),
(432, 15, 'Sebastian', 'Bergier', 'Napastnik', 'Polska', 0),
(433, 15, 'Dennis', 'Jastrzembski', 'Napastnik', 'Polska', 0),
(434, 15, 'Jakub', 'Lutostański', 'Napastnik', 'Polska', 0),
(435, 15, 'Piotr', 'Samiec-Talar', 'Napastnik', 'Polska', 0),
(436, 1, 'Erik', 'Exposito', 'Bramkarz', 'Hiszpania', 1),
(437, 15, 'Victor', 'Garcia', 'Napastnik', 'Hiszpania', 0),
(438, 15, 'Nahuel', 'Leiva', 'Napastnik', 'Hiszpania', 0),
(439, 15, 'Cayetano', 'Quintana', 'Napastnik', 'Hiszpania', 0),
(440, 16, 'Mateusz', 'Abramowicz', 'Bramkarz', 'Polska', 0),
(441, 16, 'Paweł', 'Lenarcik', 'Bramkarz', 'Polska', 0),
(442, 16, 'Alan', 'Madaliński', 'Bramkarz', 'Polska', 0),
(443, 16, 'Jurich', 'Carolina', 'Obrońca', 'Curacao', 0),
(444, 16, 'Jon', 'Aurtentxe', 'Obrońca', 'Hiszpania', 0),
(445, 16, 'Levent', 'Gulen', 'Obrońca', 'Szwajcaria', 0),
(446, 16, 'Kacper', 'Józefiak', 'Obrońca', 'Polska', 0),
(447, 16, 'Michael', 'Kostka', 'Obrońca', 'Niemcy', 0),
(448, 16, 'Julio', 'Martinez Rivas Carlos', 'Obrońca', 'Dominikana', 0),
(449, 16, 'Giannis', 'Masouras', 'Obrońca', 'Grecja', 0),
(450, 16, 'Hubert', 'Matynia', 'Obrońca', 'Polska', 0),
(451, 16, 'Hamza', 'Bahaid', 'Pomocnik', 'Belgia', 0),
(452, 16, 'Victor', 'Moya Martinez', 'Pomocnik', 'Hiszpania', 0),
(453, 16, 'Maxime', 'Dominguez', 'Pomocnik', 'Szwajcaria', 0),
(454, 16, 'Dawid', 'Drachal', 'Pomocnik', 'Polska', 0),
(455, 16, 'Igor', 'Lewandowski', 'Pomocnik', 'Polska', 0),
(456, 16, 'Szymon', 'Matuszek', 'Pomocnik', 'Polska', 0),
(457, 16, 'Nemanja', 'Mijuskovic', 'Pomocnik', 'Czarnogóra', 0),
(458, 16, 'Santiago', 'Naveda', 'Pomocnik', 'Meksyk', 0),
(459, 16, 'Błażej', 'Szczepanek', 'Pomocnik', 'Polska', 0),
(460, 16, 'Angelo', 'Henriquez', 'Napastnik', 'Chile', 0),
(461, 16, 'Olaf', 'Kobacki', 'Napastnik', 'Polska', 0),
(462, 16, 'Luciano', 'Narsingh', 'Napastnik', 'Holandia', 0),
(463, 16, 'Koldo', 'Obieta', 'Napastnik', 'Hiszpania', 0),
(464, 16, 'Maciej', 'Śliwa', 'Napastnik', 'Polska', 1),
(465, 16, 'Kamil', 'Zapolnik', 'Napastnik', 'Polska', 3),
(466, 17, 'Jan', 'Krzywański', 'Bramkarz', 'Polska', 0),
(467, 17, 'Vasyl', 'Lytvynenko', 'Bramkarz', 'Ukraina', 0),
(468, 17, 'Henrich', 'Ravas', 'Bramkarz', 'Słowacja', 0),
(469, 17, 'Jakub', 'Wrąbel', 'Bramkarz', 'Polska', 0),
(470, 17, 'Bozhidar', 'Chorbadzhiyski', 'Obrońca', 'Bułgaria', 0),
(471, 17, 'Andrejs', 'Cigankis', 'Obrońca', 'Łotwa', 0),
(472, 17, 'Martin', 'Kreuzriegler', 'Obrońca', 'Austria', 0),
(473, 17, 'Hubert', 'Lenart', 'Obrońca', 'Polska', 0),
(474, 17, 'Milos', 'Mato', 'Obrońca', 'Chorwacja', 0),
(475, 17, 'Patryk', 'Stępiński', 'Obrońca', 'Polska', 0),
(476, 17, 'Serafin', 'Szota', 'Obrońca', 'Polska', 0),
(477, 17, 'Krystian', 'Szymocha', 'Obrońca', 'Polska', 0),
(478, 17, 'Paweł', 'Zieliński', 'Obrońca', 'Polska', 0),
(479, 17, 'Mateusz', 'Żyro', 'Obrońca', 'Polska', 0),
(480, 17, 'Ignacy', 'Dawid', 'Pomocnik', 'Polska', 0),
(481, 17, 'Adam', 'Dębiński', 'Pomocnik', 'Polska', 0),
(482, 17, 'Marek', 'Hanousek', 'Pomocnik', 'Czechy', 0),
(483, 17, 'Kristoffer', 'Hansen', 'Pomocnik', 'Norwegia', 0),
(484, 17, 'Dominik', 'Kun', 'Pomocnik', 'Polska', 0),
(485, 17, 'Juliusz', 'Letniowski', 'Pomocnik', 'Polska', 0),
(486, 17, 'Patryk', 'Lipski', 'Pomocnik', 'Polska', 0),
(487, 17, 'Juljan', 'Shehu', 'Pomocnik', 'Albania', 0),
(488, 17, 'Jakub', 'Sypek', 'Pomocnik', 'Polska', 0),
(489, 17, 'Ernest', 'Terpilowski', 'Pomocnik', 'Polska', 0),
(490, 17, 'Filip', 'Zawadzki', 'Pomocnik', 'Polska', 0),
(491, 17, 'Mateusz', 'Kempski', 'Bramkarz', 'Polska', 4),
(492, 17, 'Fabio', 'Nunes', 'Napastnik', 'Portugalia', 0),
(493, 17, 'Jordi', 'Sanchez Ribas', 'Napastnik', 'Hiszpania', 0),
(494, 17, 'Bartłomiej', 'Pawłowski', 'Napastnik', 'Polska', 1),
(495, 17, 'Łukasz', 'Zjawiński', 'Napastnik', 'Polska', 4),
(496, 18, 'Konrad', 'Forenc', 'Bramkarz', 'Polska', 0),
(497, 18, 'Adrian', 'Sandach', 'Bramkarz', 'Polska', 0),
(498, 18, 'Marcel', 'Zapytowski', 'Bramkarz', 'Polska', 0),
(499, 18, 'Sasa', 'Balic', 'Obrońca', 'Czarnogóra', 0),
(500, 18, 'Roberto', 'Corral Garcia', 'Obrońca', 'Hiszpania', 0),
(501, 18, 'Marcus', 'Godinho', 'Obrońca', 'Kanada', 0),
(502, 18, 'Dominick', 'Zator', 'Obrońca', 'Kanada', 0),
(503, 18, 'Piotr', 'Malarczyk', 'Obrońca', 'Polska', 0),
(504, 18, 'Jacek', 'Podgórski', 'Obrońca', 'Polska', 0),
(505, 18, 'Radosław', 'Sewerys', 'Obrońca', 'Polska', 0),
(506, 18, 'Miłosz', 'Trojak', 'Obrońca', 'Polska', 0),
(507, 18, 'Dawid', 'Więckowski', 'Obrońca', 'Polska', 0),
(508, 18, 'Dawid', 'Blanik', 'Pomocnik', 'Polska', 0),
(509, 18, 'Ronaldo', 'Deaconu', 'Pomocnik', 'Rumunia', 0),
(510, 18, 'Adam', 'Deja', 'Pomocnik', 'Polska', 0),
(511, 18, 'Bartosz', 'Kwiecień', 'Pomocnik', 'Polska', 0),
(512, 18, 'David', 'Gonzalez Plata', 'Pomocnik', 'Hiszpania', 1),
(513, 18, 'Kyrylo', 'Petrov', 'Pomocnik', 'Ukraina', 0),
(514, 18, 'Oskar', 'Sewerzyński', 'Pomocnik', 'Polska', 0),
(515, 18, 'Marcin', 'Szpakowski', 'Pomocnik', 'Polska', 0),
(516, 18, 'Jakub', 'Łukowski', 'Pomocnik', 'Polska', 1),
(517, 18, 'Dalibor', 'Takac', 'Pomocnik', 'Słowacja', 0),
(518, 18, 'Adrian', 'Danek', 'Napastnik', 'Polska', 0),
(519, 18, 'Adam', 'Frączczak', 'Napastnik', 'Polska', 0),
(520, 18, 'Jacek', 'Kiełb', 'Napastnik', 'Polska', 0),
(521, 18, 'Dawid', 'Lisowski', 'Napastnik', 'Polska', 0),
(522, 18, 'Michał', 'Pokora', 'Napastnik', 'Polska', 0),
(523, 18, 'Hubert', 'Szulc', 'Napastnik', 'Polska', 0),
(524, 18, 'Bartosz', 'Śpiączka', 'Napastnik', 'Polska', 0),
(525, 18, 'Yevgeniy', 'Shikavka', 'Napastnik', 'Białoruś', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `referees`
--

CREATE TABLE `referees` (
  `RefereeID` int(11) NOT NULL,
  `Name` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `referees`
--

INSERT INTO `referees` (`RefereeID`, `Name`, `Surname`) VALUES
(1, 'Jarosław', 'Przybył'),
(2, 'Paweł', 'Raczkowski'),
(3, 'Damian', 'Kos'),
(4, 'Daniel', 'Stefański'),
(5, 'Tomasz', 'Musiał'),
(6, 'Krzysztof', 'Jakubik'),
(7, 'Piotr', 'Lasyk'),
(8, 'Damian', 'Sylwestrzak'),
(9, 'Łukasz', 'Kuźma'),
(10, 'Paweł', 'Malec'),
(11, 'Piotr', 'Urban'),
(12, 'Szymon', 'Marciniak'),
(93, 'Jeszcze', 'nie wybrany');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stadiums`
--

CREATE TABLE `stadiums` (
  `StadiumID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `stadiums`
--

INSERT INTO `stadiums` (`StadiumID`, `Name`, `City`) VALUES
(1, 'Stadion Miejski', 'Poznań'),
(2, 'Miejski Stadion Piłkarski Raków', 'Częstochowa'),
(3, 'Stadion Miejski w Szczecinie', 'Szczecin'),
(4, 'Polsat Plus Arena', 'Gdańsk'),
(5, 'Stadion Miejski w Gliwicach', 'Gliwice'),
(6, 'Stadion Kazimierza Górskiego', 'Płock'),
(7, 'Stadion MOSiR', 'Radom'),
(8, 'Stadion im. Ernesta Pohla', 'Zabrze'),
(9, 'Stadion MKS Cracovia', 'Kraków'),
(10, 'Stadion Wojska Polskiego', 'Warszawa'),
(11, 'Stadion Dyskobolii', 'Grodzisk Wielkopolski'),
(12, 'Stadion Miejski', 'Białystok'),
(13, 'Stadion Zagłębia Lubin', 'Lubin'),
(14, 'Stadion MOSiR', 'Mielec'),
(15, 'Tarczyński Arena', 'Wrocław'),
(16, 'Stadion im. Orła Białego', 'Legnica'),
(17, 'Stadion Widzewa Łódź', 'Łódź'),
(18, 'Suzuki Arena', 'Kielce'),
(31, 'Brak', 'Brak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `substitutions`
--

CREATE TABLE `substitutions` (
  `MatchID` int(11) NOT NULL,
  `Minute` int(11) NOT NULL,
  `PlayerInID` int(11) NOT NULL,
  `PlayerOutID` int(11) NOT NULL,
  `Half` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teams`
--

CREATE TABLE `teams` (
  `TeamID` int(11) NOT NULL,
  `TeamName` varchar(25) COLLATE utf8mb4_polish_ci NOT NULL,
  `CoachID` int(11) NOT NULL,
  `Points` int(11) DEFAULT 0,
  `GamesPlayed` int(11) NOT NULL DEFAULT 0,
  `GoalsScored` int(11) NOT NULL DEFAULT 0,
  `GoalsConceded` int(11) NOT NULL DEFAULT 0,
  `TeamLogoPath` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `teams`
--

INSERT INTO `teams` (`TeamID`, `TeamName`, `CoachID`, `Points`, `GamesPlayed`, `GoalsScored`, `GoalsConceded`, `TeamLogoPath`) VALUES
(1, 'Lech Poznań', 1, 1, 3, 1, 5, '..\\team-logos\\lech.png'),
(2, 'Raków Częstochowa', 2, 9, 3, 5, 2, '..\\team-logos\\rakow.png'),
(3, 'Pogoń Szczecin', 3, 6, 3, 4, 3, '..\\team-logos\\pogon.png'),
(4, 'Lechia Gdańsk', 4, 6, 3, 5, 6, '..\\team-logos\\lechia.png'),
(5, 'Piast Gliwice', 5, 0, 3, 0, 4, '..\\team-logos\\piast.png'),
(6, 'Wisła Płock', 6, 9, 3, 10, 1, '..\\team-logos\\wisla.png'),
(7, 'Radomiak Radom', 7, 2, 3, 2, 5, '..\\team-logos\\radomiak.png'),
(8, 'Górnik Zabrze', 8, 3, 3, 4, 4, '..\\team-logos\\gornik.png'),
(9, 'Cracovia', 9, 9, 3, 7, 0, '..\\team-logos\\cracovia.png'),
(10, 'Legia Warszawa', 10, 4, 3, 3, 4, '..\\team-logos\\legia.png'),
(11, 'Warta Poznań', 11, 3, 3, 2, 6, '..\\team-logos\\warta.png'),
(12, 'Jagiellonia Białystok', 12, 3, 3, 2, 3, '..\\team-logos\\jagiellonia.png'),
(13, 'Zagłębie Lubin', 13, 4, 3, 1, 2, '..\\team-logos\\zaglebie.png'),
(14, 'Stal Mielec', 14, 4, 3, 5, 4, '..\\team-logos\\stal.png'),
(15, 'Śląsk Wrocław', 15, 4, 3, 3, 4, '..\\team-logos\\slask.png'),
(16, 'Miedź Legnica', 16, 2, 3, 2, 3, '..\\team-logos\\miedz.png'),
(17, 'Widzew Łódź', 17, 3, 3, 5, 5, '..\\team-logos\\widzew.png'),
(18, 'Korona Kielce', 18, 4, 3, 4, 4, '..\\team-logos\\korona.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `E-mail` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `IsAdmin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `E-mail`, `IsAdmin`) VALUES
(20, 'user1', '$2y$10$tK57CE4NQGZYD64iIW7dv.Z3o5lQcGl8KrJ9ZaDcrV9bs1PJbmR/W', 'email@gmail.com', 0),
(21, 'uzytkownik', '$2y$10$/NPjNBvd2gzjETV6eRwz6uWK3ZoQBVMFNU9KSvDx/xwFakM6aYptO', 'uzytkownik@gmail.com', 0),
(22, 'user11', '$2y$10$Jb.sI/zgcs5UG4yIEovyHebQLNg3.qINLWP43dZDczME7UHgG.4xO', 'user11@gmail.com', 0),
(23, 'ADMIN', '$2y$10$/PemNzW69ccZ9YJ1eBI0WOolIXUdyldzN.wrD5CRyYP59be4bwnza', 'dsadsaadsdsa@gmail.com', 1),
(24, 'aadmin', '$2y$10$jSvgNM6b48aslnfkfYl09OJsWKO1j.ViUTCYZ3re5/CeQ8JD7rK0y', 'qwerty@gmail.com', 1),
(25, 'admin12', '$2y$10$h94Xhoprwvf2sSePv/nC2O3fCNLdo138iEuTH/cCDklx35OVxILha', 'adminadmin@gmail.com', 1),
(26, 'user22', '$2y$10$bL5d.sRRv1RWrRIoqZa0v.ulqoKVBbdlpC/Ff73Vx53vVtz/xTu3m', 'user22@gmail.com', 0),
(27, 'user23', '$2y$10$ruIw1S9gF.UZfmWmeob1ye54AZ/mYTjXjUdKuQ5EyR4cBycUosyou', 'user23@gmail.com', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`CoachID`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Indeksy dla tabeli `favouriteteams`
--
ALTER TABLE `favouriteteams`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indeksy dla tabeli `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`MatchID`),
  ADD KEY `StadiumID` (`StadiumID`),
  ADD KEY `matches_ibfk_1` (`RefereeID`);

--
-- Indeksy dla tabeli `matchevents`
--
ALTER TABLE `matchevents`
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `MatchID` (`MatchID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indeksy dla tabeli `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`CountryID`);

--
-- Indeksy dla tabeli `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`PlayerID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indeksy dla tabeli `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`RefereeID`);

--
-- Indeksy dla tabeli `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`StadiumID`);

--
-- Indeksy dla tabeli `substitutions`
--
ALTER TABLE `substitutions`
  ADD KEY `MatchID` (`MatchID`),
  ADD KEY `PlayerInID` (`PlayerInID`),
  ADD KEY `PlayerOutID` (`PlayerOutID`);

--
-- Indeksy dla tabeli `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `CoachID` (`CoachID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `coaches`
--
ALTER TABLE `coaches`
  MODIFY `CoachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT dla tabeli `matches`
--
ALTER TABLE `matches`
  MODIFY `MatchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT dla tabeli `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT dla tabeli `players`
--
ALTER TABLE `players`
  MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT dla tabeli `referees`
--
ALTER TABLE `referees`
  MODIFY `RefereeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT dla tabeli `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `StadiumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`MatchID`) REFERENCES `matches` (`MatchID`);

--
-- Ograniczenia dla tabeli `favouriteteams`
--
ALTER TABLE `favouriteteams`
  ADD CONSTRAINT `favouriteteams_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `favouriteteams_ibfk_2` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`TeamID`);

--
-- Ograniczenia dla tabeli `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`RefereeID`) REFERENCES `referees` (`RefereeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`StadiumID`) REFERENCES `stadiums` (`StadiumID`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `matchevents`
--
ALTER TABLE `matchevents`
  ADD CONSTRAINT `matchevents_ibfk_1` FOREIGN KEY (`MatchID`) REFERENCES `matches` (`MatchID`),
  ADD CONSTRAINT `matchevents_ibfk_2` FOREIGN KEY (`PlayerID`) REFERENCES `players` (`PlayerID`),
  ADD CONSTRAINT `matchevents_ibfk_3` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`TeamID`);

--
-- Ograniczenia dla tabeli `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`TeamID`);

--
-- Ograniczenia dla tabeli `substitutions`
--
ALTER TABLE `substitutions`
  ADD CONSTRAINT `substitutions_ibfk_1` FOREIGN KEY (`MatchID`) REFERENCES `matches` (`MatchID`),
  ADD CONSTRAINT `substitutions_ibfk_2` FOREIGN KEY (`PlayerInID`) REFERENCES `players` (`PlayerID`),
  ADD CONSTRAINT `substitutions_ibfk_3` FOREIGN KEY (`PlayerOutID`) REFERENCES `players` (`PlayerID`);

--
-- Ograniczenia dla tabeli `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`CoachID`) REFERENCES `coaches` (`CoachID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
