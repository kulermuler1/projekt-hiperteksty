-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Cze 11, 2024 at 09:47 AM
-- Wersja serwera: 8.0.30
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s168793`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb3_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Jedzenie'),
(2, 'Sport'),
(3, 'Muzyka'),
(4, 'Przyroda'),
(5, 'Motoryzacja'),
(6, 'IT');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb3_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_polish_ci NOT NULL,
  `message` text COLLATE utf8mb3_polish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Kubek', 'jakubpb17@gmail.com', 'super strona polecam', '2024-06-11 09:25:47'),
(4, 'Labada', 'qrqer@gmail.com', 'ererer', '2024-06-11 09:31:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history`
--

CREATE TABLE `history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL,
  `score` int NOT NULL,
  `total_questions` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `answer_id` int NOT NULL,
  `question_id` int DEFAULT NULL,
  `answer` text COLLATE utf8mb3_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Dumping data for table `quiz_answers`
--

INSERT INTO `quiz_answers` (`answer_id`, `question_id`, `answer`) VALUES
(1, 1, 'Sushi'),
(2, 1, 'Kimchi'),
(3, 1, 'Paella'),
(4, 2, 'Ser, szynka, oliwki'),
(5, 2, 'Ser, pomidor, oliwki'),
(6, 2, 'Ser, pomidor, bazylia'),
(7, 3, 'Wołowina'),
(8, 3, 'Kurczak'),
(9, 3, 'Jagnięcina'),
(10, 4, 'Mąka, mleko, jajka'),
(11, 4, 'Mąka, woda, sól'),
(12, 4, 'Mąka, masło, cukier'),
(13, 5, 'Awokado'),
(14, 5, 'Mango'),
(15, 5, 'Banan'),
(16, 6, 'Ciecierzyca'),
(17, 6, 'Fasola'),
(18, 6, 'Soczewica'),
(19, 7, 'Paella'),
(20, 7, 'Ratatouille'),
(21, 7, 'Risotto'),
(22, 8, 'Michael Phelps'),
(23, 8, 'Usain Bolt'),
(24, 8, 'Carl Lewis'),
(25, 9, '11'),
(26, 9, '9'),
(27, 9, '10'),
(28, 10, 'Roger Federer'),
(29, 10, 'Rafael Nadal'),
(30, 10, 'Novak Djokovic'),
(31, 11, '1896'),
(32, 11, '1900'),
(33, 11, '1912'),
(34, 12, 'Tenis'),
(35, 12, 'Badminton'),
(36, 12, 'Squash'),
(37, 13, 'Michael Jordan'),
(38, 13, 'LeBron James'),
(39, 13, 'Kobe Bryant'),
(40, 14, 'Szermierka'),
(41, 14, 'Judo'),
(42, 14, 'Karate'),
(43, 15, 'Michael Jackson'),
(44, 15, 'Elvis Presley'),
(45, 15, 'Prince'),
(46, 16, 'The Beatles'),
(47, 16, 'The Rolling Stones'),
(48, 16, 'Pink Floyd'),
(49, 17, 'John Lennon'),
(50, 17, 'Paul McCartney'),
(51, 17, 'George Harrison'),
(52, 18, 'Adele'),
(53, 18, 'Beyoncé'),
(54, 18, 'Taylor Swift'),
(55, 19, 'Ludwig van Beethoven'),
(56, 19, 'Johann Sebastian Bach'),
(57, 19, 'Wolfgang Amadeus Mozart'),
(58, 20, 'Dudy'),
(59, 20, 'Harfy'),
(60, 20, 'Fletu'),
(61, 21, 'Beyoncé'),
(62, 21, 'Taylor Swift'),
(63, 21, 'Adele'),
(64, 22, 'Australia'),
(65, 22, 'Afryka'),
(66, 22, 'Ameryka Południowa'),
(67, 23, 'Lew'),
(68, 23, 'Tygrys'),
(69, 23, 'Niedźwiedź'),
(70, 24, 'Dwa'),
(71, 24, 'Trzy'),
(72, 24, 'Cztery'),
(73, 25, 'Spokojny'),
(74, 25, 'Atlantycki'),
(75, 25, 'Indyjski'),
(76, 26, 'Wenus'),
(77, 26, 'Storczyk'),
(78, 26, 'Drosera'),
(79, 27, 'Pyton tygrysi'),
(80, 27, 'Kobra królewska'),
(81, 27, 'Anaconda'),
(82, 28, 'Rekin wielorybi'),
(83, 28, 'Sum długi'),
(84, 28, 'Ryba słoniowa'),
(85, 29, 'Karl Benz'),
(86, 29, 'Henry Ford'),
(87, 29, 'Gottlieb Daimler'),
(88, 30, 'Toyota'),
(89, 30, 'Volkswagen'),
(90, 30, 'Mercedes-Benz'),
(91, 31, 'Trójramienna gwiazda'),
(92, 31, 'Królewski kieł'),
(93, 31, 'Strzała samochodowa'),
(94, 32, 'Benzyna'),
(95, 32, 'Diesel'),
(96, 32, 'Elektryczność'),
(97, 33, 'Czarny'),
(98, 33, 'Biały'),
(99, 33, 'Srebrny'),
(100, 34, 'Enzo Ferrari'),
(101, 34, 'Ferdinand Porsche'),
(102, 34, 'Gianni Agnelli'),
(103, 35, 'Autostrada Panamerykańska'),
(104, 35, 'Autostrada Transkanadyjska'),
(105, 35, 'Autostrada Transsyberyjska'),
(106, 36, 'Hyper Text Markup Language'),
(107, 36, 'Hyper Training Machine Language'),
(108, 36, 'Home Tool Management Library'),
(109, 37, 'Python'),
(110, 37, 'Java'),
(111, 37, 'JavaScript'),
(112, 38, 'MacOS'),
(113, 38, 'Linux'),
(114, 38, 'Windows'),
(115, 39, 'Yahoo'),
(116, 39, 'Bing'),
(117, 39, 'Google'),
(118, 40, 'Uniform Resource Locator'),
(119, 40, 'Universal Reference Link'),
(120, 40, 'United Research Language'),
(121, 41, 'Zasilacz'),
(122, 41, 'Klawiatura'),
(123, 41, 'Monitor'),
(124, 42, 'Windows'),
(125, 42, 'Linux'),
(126, 42, 'MacOS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `question_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `question` text COLLATE utf8mb3_polish_ci,
  `correct_answer_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`question_id`, `category_id`, `question`, `correct_answer_id`) VALUES
(1, 1, 'Jakie jest narodowe danie Japonii?', 1),
(2, 1, 'Jakie jest główne składniki włoskiej pizzy Margherita?', 4),
(3, 1, 'Jakie mięso jest używane do przygotowania tradycyjnej irlandzkiej potrawy stew?', 7),
(4, 1, 'Z czego zrobione są francuskie crepes?', 10),
(5, 1, 'Który owoc jest głównym składnikiem guacamole?', 13),
(6, 1, 'Jakie jest główne składniki hummusu?', 16),
(7, 1, 'Jakie danie jest narodowe w Hiszpanii?', 19),
(8, 2, 'Kto zdobył najwięcej złotych medali olimpijskich?', 22),
(9, 2, 'Ile graczy jest w drużynie piłki nożnej?', 25),
(10, 2, 'Kto wygrał najwięcej turniejów Wielkiego Szlema w tenisie?', 28),
(11, 2, 'W którym roku odbyły się pierwsze nowożytne igrzyska olimpijskie?', 31),
(12, 2, 'W jakim sporcie używa się terminów love, deuce i ace?', 34),
(13, 2, 'Kto jest uznawany za najlepszego koszykarza wszechczasów?', 37),
(14, 2, 'W jakim sporcie zawodnicy walczą na planszy?', 40),
(15, 3, 'Kto jest znany jako Król Popu?', 43),
(16, 3, 'Która grupa nagrała album \"Abbey Road\"?', 46),
(17, 3, 'Kto jest autorem piosenki \"Imagine\"?', 49),
(18, 3, 'Która piosenkarka jest znana z hitu \"Rolling in the Deep\"?', 52),
(19, 3, 'Który kompozytor skomponował \"Symfonię nr 9\"?', 55),
(20, 3, 'Jaki jest instrument narodowy Szkocji?', 58),
(21, 3, 'Kto wygrał najwięcej nagród Grammy?', 61),
(22, 4, 'Gdzie żyją kangury?', 64),
(23, 4, 'Jak nazywa się największy lądowy drapieżnik?', 67),
(24, 4, 'Ile oczu ma pająk?', 70),
(25, 4, 'Jak nazywa się największy ocean?', 73),
(26, 4, 'Która z tych roślin jest mięsożerna?', 76),
(27, 4, 'Jaki jest największy gatunek węża?', 79),
(28, 4, 'Która z tych ryb jest największa?', 82),
(29, 5, 'Kto wynalazł pierwsze samochody?', 85),
(30, 5, 'Jaka jest największa marka samochodowa na świecie?', 88),
(31, 5, 'Jak nazywa się symbol firmy Mercedes-Benz?', 91),
(32, 5, 'Jakie paliwo napędza większość samochodów?', 94),
(33, 5, 'Jaki jest najczęściej używany kolor samochodów?', 97),
(34, 5, 'Kto jest założycielem firmy Ferrari?', 100),
(35, 5, 'Jak nazywa się najdłuższa autostrada na świecie?', 103),
(36, 6, 'Co oznacza skrót \"HTML\"?', 106),
(37, 6, 'Który z tych języków programowania jest najczęściej używany do tworzenia stron internetowych?', 109),
(38, 6, 'Który z tych systemów operacyjnych został opracowany przez firmę Microsoft?', 112),
(39, 6, 'Jak nazywa się największa wyszukiwarka internetowa na świecie?', 115),
(40, 6, 'Co oznacza skrót \"URL\"?', 118),
(41, 6, 'Który z tych elementów jest częścią komputera przenośnego?', 121),
(42, 6, 'Który z tych systemów operacyjnych jest rozwijany przez społeczność Open Source?', 124);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Pawan', 'pawan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Kuba', 'jakubpb17@gmail.com', '65ded5353c5ee48d0b7d48c591b8f430'),
(3, 'Kuba', 'jakub@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indeksy dla tabeli `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `quiz_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`question_id`);

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
