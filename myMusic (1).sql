-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2024 at 06:31 PM
-- Server version: 8.0.39-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myMusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_`
--

CREATE TABLE `admin_` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'userdefut.png',
  `admin` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin_`
--

INSERT INTO `admin_` (`id`, `name`, `email`, `password`, `image`, `admin`) VALUES
(1, 'mintesnot', 'mintesnotyess@gmail.com', '$2y$10$WSkK/hl9aGIIfa8lgNu6e.94flHnUcehCNBR9IduWY1Md7bufjci.', 'userdefut.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int NOT NULL,
  `follower` int NOT NULL,
  `following` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `like_song`
--

CREATE TABLE `like_song` (
  `id` int NOT NULL COMMENT 'Primary Key',
  `user_id` int NOT NULL,
  `music_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_song`
--

INSERT INTO `like_song` (`id`, `user_id`, `music_id`) VALUES
(1, 37, 21),
(2, 37, 22),
(3, 37, 23),
(4, 37, 24),
(13, 34, 32),
(14, 32, 25),
(15, 34, 22),
(20, 39, 29),
(97, 32, 26),
(98, 32, 32),
(99, 32, 27),
(100, 32, 21),
(101, 41, 42);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int NOT NULL,
  `artist` varchar(200) NOT NULL DEFAULT 'unknown',
  `title` varchar(200) NOT NULL,
  `music` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(11) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `artist`, `title`, `music`, `image`, `description`, `date`, `user_id`) VALUES
(21, 'Ariana Grande', ' Position', 'Ariana Grande - positions.mp3', 'photo_2024-07-15_22-25-06.jpg', '', '24-07-15', 32),
(22, 'Ariana Grande feat the weekend', ' save your tears', '01 Save Your Tears (with Ariana Grande) (Remix).mp3', 'photo_2021-04-23_08-22-33.jpg', '', '24-07-15', 32),
(23, 'Ariana grande feat social house', ' boy friende', '01 boyfriend.mp3', 'photo_2024-07-15_22-17-39.jpg', '', '24-07-15', 32),
(24, 'Selena Gomeze', ' love you like love song', 'Selena-Gomez-Love-You-Like-A-Love-Song-128.mp3', 'R (1).jpeg', '', '24-07-15', 33),
(25, 'Rophnan', ' Qal', '2 - Rophnan - Qal.mp3', 'OIP (1).jpeg', '', '24-07-15', 34),
(26, 'Rophnan', ' Behon', '6 - Rophnan - Essey.mp3', 'OIP (1).jpeg', '', '24-07-15', 34),
(27, 'Zara larsson', ' Right here', 'Zara_Larsson_Right_Here.mp3', 'R (2).jpeg', '', '24-07-15', 35),
(28, 'Imagine Dragons feat J.I.D', ' Enemy', 'Imagine_Dragons_x_J.I.D_-_Enemy_(from_the_series_Arcane_League_of_Legends)(360p)_00.mp3', 'OIP (2).jpeg', '', '24-07-15', 36),
(29, 'Imagine Dragons', ' Believer', 'Imagine_Dragons_-_Believer_(Lyrics)(128kbps).mp3', 'OIP (3).jpeg', '', '24-07-15', 36),
(31, 'Rophnan', ' hamet', '5 - Rophnan - Hamet.mp3', 'photo_2024-07-04_02-04-47.jpg', '', '24-07-16', 34),
(32, 'Rophnan', ' Behon', '7 - Rophnan - Bihon.mp3', 'photo_2024-06-29_19-03-31.jpg', '', '24-07-18', 34),
(40, 'Yonas', ' Hotline Bling', 'JVKE_-_this_is_what_falling_in_love_feels_like_(Official_Video)(256kbps)-1.mp3', '8bbe82c2e11524faf9e7ad5a072e1e36.png', '', '24-07-23', 34);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int NOT NULL,
  `playlist_id` int NOT NULL,
  `music_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_name`
--

CREATE TABLE `playlist_name` (
  `id` int NOT NULL,
  `playlist_name` varchar(200) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `recently_played`
--

CREATE TABLE `recently_played` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `music_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'userdefut.png',
  `description` text NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='user table';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `description`, `active`, `date`) VALUES
(32, 'Ariana Grande', 'arianagrande@gmail.com', '$2y$10$EuoYwks6OSvoyZEJD7Bv4OPGbZMxqNvdhACuPWIdrxNqgcyL2S5Pm', 'afbf4e6c-1df8-4151-8384-4e01333f2605-eternal_sunshine_standard_cover.avif', '', 1, '2024-07-15'),
(33, 'Selena Gomeze', 'selenagomeze@gmail.com', '$2y$10$9hoixtJYNf8xBJTlTi.vUOqLrDaF0ZmB4AGYQJ7pdkfSHpEsfPrbS', 'R.jpeg', '', 1, '2024-07-15'),
(34, 'Rophnan', 'rophnan@gmail.com', '$2y$10$T33j/x6YWzlZ/Phq4s8mNufdXxk0Bybv6eq/DN4i6gIa35sBk88Ma', 'rophnan.jpg', '', 1, '2024-07-15'),
(35, 'Zara larsson', 'zaralarsson@gmail.com', '$2y$10$KkiS2pyoWOPZQUhcMMhyROTULxaLfsKaqnob599TgzT80jtxSFdhG', 'maxresdefault.jpg', '', 1, '2024-07-15'),
(36, 'Imagine Dragons', 'Imaginedragons@gmail.com', '$2y$10$Kp7v.VFFE/HuSvNUsj.5dOgSCHG7uH7P/OKvsqrNxJH5IK276T52.', 'R (3).jpeg', '', 1, '2024-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_`
--
ALTER TABLE `admin_`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower` (`follower`),
  ADD KEY `following` (`following`);

--
-- Indexes for table `like_song`
--
ALTER TABLE `like_song`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_id` (`playlist_id`,`music_id`),
  ADD KEY `music_id` (`music_id`);

--
-- Indexes for table `playlist_name`
--
ALTER TABLE `playlist_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recently_played`
--
ALTER TABLE `recently_played`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`music_id`),
  ADD KEY `music_id` (`music_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_`
--
ALTER TABLE `admin_`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `like_song`
--
ALTER TABLE `like_song`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist_name`
--
ALTER TABLE `playlist_name`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `recently_played`
--
ALTER TABLE `recently_played`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`following`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`id`),
  ADD CONSTRAINT `playlist_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlist_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playlist_name`
--
ALTER TABLE `playlist_name`
  ADD CONSTRAINT `playlist_name_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recently_played`
--
ALTER TABLE `recently_played`
  ADD CONSTRAINT `recently_played_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recently_played_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
