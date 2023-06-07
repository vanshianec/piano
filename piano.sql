-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране:  6 фев 2023 в 11:21
-- Версия на сървъра: 10.4.27-MariaDB
-- Версия на PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `piano`
--

-- --------------------------------------------------------

--
-- Структура на таблица `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `chords` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `songs`
--

INSERT INTO `songs` (`song_id`, `name`, `chords`) VALUES
(1, 'Песен 1', 'ttyuri7595uti84y8r3i9i9u9wooiu9848utuoierutoiwpituiujgjiohreojfhiohoirhefoheoihrfrheohfiojdoewijoihogihweoighwe'),
(2, 'Песен 2', 'jkijfsoiehfwooijgoihousdhtoijoeirjfoiherouoijoifjreiofjoerihyoih987ht8954h9fj98j9f8h89ht895h489j98fhj8945h89fh5894hf'),
(3, 'Песен 3', 'jjifjdsf8ifojsiojfoijioghiotjiorhj98h3589hf8493hf43'),
(4, 'Песен 4', 'jfd9s80jf0943jfh43t8y09h4385u43098fjsiodjfoihourfoij908h5ijfiojiowjoijqisjofjoewfoiwkefok89043jhf89jsieojfioehosikfoiewjfoiwejfoiwhfoijweoifjewiokdoiewkoidkewoi'),
(5, 'Песен 5', '122');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`) VALUES
(1, 'ivan_customerhb3@abv.bg', 'b6b1946b95153d0df114a35593413fbbc8339ae3'),
(2, 'ivaniovov@abv.bg', '34aebfe2cd681070db1a2b712d5a913876c045c3'),
(3, 'ivaniovov2@abv.bg', '2ff9f0f1e95d59ae11ff63087c0677a06eac7662');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
