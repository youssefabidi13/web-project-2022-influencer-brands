-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 03, 2022 at 04:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'admin', '$2y$10$yvsxTIZ5U5nNjHC/LtD6iuGEiHC53B1ZsZd6QWFD2bOG9zNS.wBP6');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CA` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `username`, `email`, `CA`, `password`, `created_at`, `photo`) VALUES
(1, 'nike', 'nike@gmail.com', 1678413, '$2y$10$o8wrmO1ty5nabmO0qdHnKOUmyKqOEWw8zImM7KCXxF0E0D7ROfMIi', '2022-06-02 23:47:00', 'nike.jpg'),
(2, 'adidas', 'adidas@gmail.com', 3546130, '$2y$10$eclEsTkRFHMZifRjQpVf.eGcq.qCq7vrAJK/.ezcDHGWp75YCcvRe', '2022-06-02 23:49:56', 'WhatsApp Image 2022-06-02 at 23.54.37.jpeg'),
(3, 'apple', 'apple@gmail.com', 3156876, '$2y$10$lpvjr6NR3/LfkllnXu4cRuz/M0bjB/JmmuleDFV4RKSjWXLxVQJve', '2022-06-02 23:50:52', 'apple.png'),
(5, 'rolex', 'rolex@gmail.com', 1234569, '$2y$10$pNN9zJk6fHckjrVeFPbZ2.XMsgON.HVEmat33GUaD.D28UVgmQvsy', '2022-06-02 23:53:42', 'rolex.jpg'),
(6, 'swatch', 'swatch@gmail.com', 97456231, '$2y$10$8b/xbXhSwvV5EXiReiD7IerPf1sIuY206tN/3I3YAKdFHHvDiTUfm', '2022-06-02 23:55:23', 'swatch.jpeg'),
(7, 'mcdo', 'mcdo@gmail.com', 2314698, '$2y$10$rk8oXxABrS.dw9LYGQM5suDNgnfgmJ0F3zI.x0l3Wki3UcEy1gzdW', '2022-06-03 00:11:43', 'WhatsApp Image 2022-06-02 at 23.54.37 (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `demende`
--

CREATE TABLE `demende` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `infoubrand` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not done',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demende`
--

INSERT INTO `demende` (`id`, `username`, `infoubrand`, `status`, `date`) VALUES
(1, 'user3', 'inf', 'not done', '2022-06-03 00:40:34'),
(2, 'user1', 'inf', 'done', '2022-06-03 00:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `msg`, `date`) VALUES
(1, 'mcdo', 'zakaria', 'hello Zakaria', '2022-06-03 00:12:56'),
(2, 'mcdo', 'zakaria', 'Would you like to have a partnership with us', '2022-06-03 00:14:08'),
(3, 'mcdo', 'zakaria', 'you do some marketing for us and depending on the number of views you get payed', '2022-06-03 00:14:56'),
(4, 'mcdo', 'amine', 'Bonjour Mr AMINE ', '2022-06-03 00:16:11'),
(5, 'mcdo', 'amine', 'Je Suis responsable marketing du Macdonalds company', '2022-06-03 00:17:04'),
(6, 'mcdo', 'amine', 'on sera très honoré si vous accepte de devenir notre partenaire', '2022-06-03 00:18:02'),
(7, 'mcdo', 'youssef', 'hola amigo ', '2022-06-03 00:18:48'),
(8, 'mcdo', 'youssef', 'que passa', '2022-06-03 00:18:59'),
(9, 'mcdo', 'youssef', 'como estas', '2022-06-03 00:19:14'),
(10, 'rolex', 'zakaria', 'Hello Zakaria', '2022-06-03 00:22:31'),
(11, 'rolex', 'zakaria', 'how have you been', '2022-06-03 00:22:42'),
(12, 'rolex', 'zakaria', 'we would like to offer you the latest rolex watch ', '2022-06-03 00:23:11'),
(13, 'rolex', 'zakaria', 'as a gift and in return you do some marketing for us', '2022-06-03 00:23:38'),
(14, 'swatch', 'amine', 'Bonjour Mr AMINE ', '2022-06-03 00:24:49'),
(15, 'swatch', 'amine', 'Je Suis responsable marketing du  Swatch company', '2022-06-03 00:25:13'),
(16, 'swatch', 'amine', 'Je serai tres reconnaissant si vous accepte de devenir notre partenaire', '2022-06-03 00:25:43'),
(17, 'nike', 'youssef', 'dear mr.youssef', '2022-06-03 00:27:11'),
(18, 'nike', 'youssef', 'we are sending this message to ask you if you are interested to be our representative in social media we will send you our products and you will have wear them in your daily activities', '2022-06-03 00:29:13'),
(19, 'zakaria', 'rolex', 'Hello there', '2022-06-03 00:31:56'),
(20, 'zakaria', 'rolex', 'It will be my pleasure to be part of this offer', '2022-06-03 00:32:26'),
(21, 'zakaria', 'rolex', 'hope our partnership be a successful one inshaalah', '2022-06-03 00:32:52'),
(22, 'amine', 'mcdo', 'Bonjour!', '2022-06-03 00:34:05'),
(23, 'amine', 'mcdo', 'c\'est vraiment un grand plaisir de travailler avec vous', '2022-06-03 00:34:35'),
(24, 'amine', 'mcdo', 'espérons que notre partenariat sera bien accorde ', '2022-06-03 00:35:10'),
(25, 'youssef', 'nike', 'yeeh but i don\'t agree with term policies ', '2022-06-03 00:36:24'),
(26, 'youssef', 'nike', 'i would like to see your ceo to update term and more négociation  ', '2022-06-03 00:37:41'),
(27, 'youssef', 'nike', 'so can you reply soon because i have many offers', '2022-06-03 00:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `partenariat`
--

CREATE TABLE `partenariat` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `contratname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `montant` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partenariat`
--

INSERT INTO `partenariat` (`id`, `sender`, `receiver`, `contratname`, `status`, `from_date`, `to_date`, `montant`, `created_at`) VALUES
(1, 'mcdo', 'zakaria', 'mcdo-zakaria', 'non', '2022-05-30', '2024-06-30', 231456, '2022-06-03'),
(2, 'mcdo', 'amine', 'mcdo-amine', 'non', '2022-05-30', '2022-07-10', 23145698, '2022-06-03'),
(3, 'mcdo', 'youssef', 'mcdo-youssef', 'non', '2022-06-18', '2023-01-28', 456, '2022-06-03'),
(4, 'rolex', 'zakaria', 'rolex-zakaria', 'non', '2022-06-25', '2022-10-08', 23145698, '2022-06-03'),
(5, 'swatch', 'amine', 'swatch-Amine', 'oui', '2022-05-30', '2022-07-10', 456231, '2022-06-03'),
(6, 'nike', 'youssef', 'nike-youssef', 'oui', '2022-06-02', '2026-06-21', 1555555, '2022-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `instagram` mediumtext NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `youtube` varchar(5456) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `age`, `email`, `instagram`, `facebook`, `youtube`, `username`, `password`, `created_at`, `photo`) VALUES
(1, 'aitali', 'zakaria', 20, 'zakaria@gmail.com', 'zak.aitali', 'zakaria aitali', 'zakaria aitali', 'zakaria', '$2y$10$2UZG.OqqESlglJw/MFSgzOGnkWqbR6paWIJICWIQjHy1zbwtfpBBa', '2022-06-02 23:37:26', 'zakaria.jpeg'),
(2, 'abkadri', 'amine', 20, 'amine@gmail.com', 'amine abkadri', 'amine abkadri', 'amine abkadri', 'amine', '$2y$10$P94S.t4KdHBcaKMep5g4Zurvo7ylz5z/3WRMDs8JZwNUTd0mzaggW', '2022-06-02 23:40:19', 'WhatsApp Image 2022-06-02 at 23.38.32.jpeg'),
(3, 'abidi', 'youssef', 20, 'youssef@gmail.com', 'youssef abidi', 'youssef abidi', 'youssef abidi', 'youssef', '$2y$10$VcFff995C6/QV.RE/kczpe4vXl2CW3SOvv1wkMOw7Ise6A5VS2MQq', '2022-06-02 23:41:56', 'WhatsApp Image 2022-06-02 at 23.39.21.jpeg'),
(4, 'user1', 'user1', 19, 'user1@gmail.com', 'none', 'none', 'none', 'user1', '$2y$10$7F6m/0luW3wnN.irkLLI1OJ.c7N.94ebMMgZj42.iHA7CrY8P1mBe', '2022-06-02 23:57:27', 'user1.jpg'),
(5, 'user2', 'user2', 19, 'user2@gmail.com', 'none', 'none', 'none', 'user2', '$2y$10$uxC3AwqHAskPaqwKBTRxn.xJ3cKoYknrTajhDYV8CnJiZHABC.KEq', '2022-06-02 23:59:06', 'user2.jpg'),
(6, 'user3', 'user3', 18, 'user3@gmail.com', 'none', 'none', 'none', 'user3', '$2y$10$vFjqIeUaFgx6wDNxdBEZP.ZmI9aARUjnBG9XTHIO94DvjcStZ8UC2', '2022-06-03 00:01:29', 'user3.jpg'),
(7, 'brad', 'pitt', 40, 'brad@gmail.com', 'none', 'none', 'none', 'brad', '$2y$10$Ib5b4P9BKQPzIc8ruT5M/.qFyRfpU0JocUa7p2qqwSD90t8P7vDTu', '2022-06-03 00:03:41', 'brad-pitt.jpg'),
(8, 'johnney', 'depp', 44, 'johnney@gmail.com', 'none', 'none', 'none', 'johnney', '$2y$10$AnUkWlsXYJjuaVuqrgEY5uD/1DxBhhotO03BPFzLG2NXN6ReP/kW.', '2022-06-03 00:05:20', 'johnny-depp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demende`
--
ALTER TABLE `demende`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partenariat`
--
ALTER TABLE `partenariat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `demende`
--
ALTER TABLE `demende`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `partenariat`
--
ALTER TABLE `partenariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
