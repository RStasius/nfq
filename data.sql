-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2018 at 08:22 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfq`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `leather` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `surname`, `email`, `adress`, `color`, `leather`, `amount`, `price`) VALUES
(213, 'Adomas', 'Jocys', 'Ajoc@gmail.com', 'Petro 21-25, Kaunas', 'Raudona', 'Dirbtine', 1, 120),
(214, 'Adom', 'Petrutis', 'pastas2@pakeistas.com', 'Pikilniu 51, Kaunas', 'Raudona', 'Split-grain', 5, 500),
(215, 'Vilius', 'Pruckus', 'Pruckus3@gmail.com', 'pruckus 21, Kaunas', 'Balta', 'Top-grain', 4, 600),
(216, 'Vilius', 'Tarasovas', 'Tarasovas4@gmail.com', 'Kiaulpieniu 51, Vilnius', 'Balta', 'Split-grain', 6, 600),
(217, 'Vilius', 'Petrutis', 'PetrutisV@gmail.com', 'kazkadeles 51, Kaunas', 'Melyna', 'Sudetine', 8, 920),
(218, 'Adomas', 'Seskavicius', 'seskavicius@gmail.com', 'pieniu 51, Klaipeda', 'Ruda', 'Bikastine', 9, 810),
(219, 'Kelmas', 'Kelmutis', 'Kelmutis@gmail.com', 'vergu 51, Jonava', 'Balta', 'Full-grain', 5, 525),
(220, 'Tomas', 'Antonas', 'antontom@gmail.com', 'tomu 51, Gargzdai', 'Raudona', 'Full-grain', 3, 315),
(221, 'Maksimas', 'Vladim', 'vladim@gmail.com', 'Ateities 51, Vilnius', 'Melyna', 'Split-grain', 10, 1000),
(222, 'Vilius', 'Pilius', 'Pilius@gmail.com', 'kernaves 51, kernave', 'Ruda', 'Dirbtine', 5, 600),
(223, 'Vilius', 'Tomas', 'tomas123@gmail.com', 'tomo 11, Klaipeda', 'Raudona', 'Dirbtine', 5, 600),
(224, 'Petras', 'Petrovicius', 'petrovicius@gmail.com', 'petrutis 51, Kaunas', 'Ruda', 'Bikastine', 4, 360),
(225, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(226, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(227, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(228, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(229, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(230, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(231, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(232, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(233, 'Kestutis', 'Ponas', 'ponaskest@gmail.com', 'vytauto 51, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(234, 'Petras', 'Tomutis', 'tomutispert@gmail.com', 'petrovis 51, Kaunas', 'Juoda', 'Top-grain', 10, 1500),
(235, 'Paulius', 'Jocikas', 'JocikPaul@gmail.com', 'geliu 11, Klaipeda', 'Melyna', 'Full-grain', 4, 420),
(236, 'Tadas', 'Blinda', 'blindatadas@gmail.com', 'blindos 51, Vilnius', 'Raudona', 'Dirbtine', 1, 120),
(237, 'Man', 'Tas Pats', 'mantas@gmail.com', 'geliu 13, Vilnius', 'Juoda', 'Top-grain', 3, 450),
(238, 'Lukas', 'Lukovic', 'lukovic@gmail.com', 'lukasiu 51, Kaunas', 'Juoda', 'Top-grain', 7, 1050),
(239, 'Lukas', 'Lukovic', 'lukovic@gmail.com', 'lukasiu 51, Kaunas', 'Juoda', 'Top-grain', 7, 1050),
(240, 'Lukas', 'Lukovic', 'lukovic@gmail.com', 'lukasiu 51, Kaunas', 'Juoda', 'Top-grain', 7, 1050),
(241, 'Lukas', 'Lukovic', 'lukovic@gmail.com', 'lukasiu 51, Kaunas', 'Juoda', 'Top-grain', 7, 1050),
(242, 'Lukas', 'Lukovic', 'lukovic@gmail.com', 'lukasiu 51, Kaunas', 'Juoda', 'Top-grain', 7, 1050),
(243, 'Putune', 'Alidzej', 'aldiz@gmail.com', 'geliu 15, Vilnius', 'Balta', 'Sudetine', 3, 345),
(244, 'Putune', 'Alidzej', 'aldiz@gmail.com', 'geliu 15, Vilnius', 'Balta', 'Sudetine', 3, 345),
(245, 'Paulius', 'Garinavim', 'garea@gmail.com', 'vytauto 11 , Vilnius', 'Melyna', 'Dirbtine', 4, 480),
(246, 'Deividas', 'Lukovicius', 'deiv@gmail.com', 'palangos 51, Klaipeda', 'Melyna', 'Full-grain', 8, 840),
(247, 'Kestutis', 'Svelnutis', 'svel@gmail.com', 'pelkiu 21, Kaunas', 'Raudona', 'Top-grain', 3, 450),
(248, 'Vladim', 'Vladimir', 'vladimir@gmail.com', 'puskin 21, Vilnius', 'Balta', 'Full-grain', 3, 315),
(249, 'Vladim', 'Vladimir', 'vladimir@gmail.com', 'puskin 21, Vilnius', 'Balta', 'Full-grain', 3, 315),
(250, 'Keistas', 'Keistutis', 'keistu@gmail.com', 'akmens 11, Kaunas', 'Balta', 'Bikastine', 9, 810),
(251, 'Toma', 'Anomas', 'Anom@gmail.com', 'marcinkeviciaus 11, Vilnius', 'Raudona', 'Dirbtine', 1, 120),
(252, 'Aliukas', 'Mino', 'alfedas@gmail.com', 'naslaiciu 21, Kaunas', 'Raudona', 'Top-grain', 5, 750),
(253, 'Ona', 'Petrute', 'ona@gmail.com', 'klaipedos 11, Gargzdai', 'Ruda', 'Full-grain', 3, 315),
(254, 'Alyza', 'Swain', 'alyz@gmail.com', 'pelkiu 11, Vilnius', 'Juoda', 'Split-grain', 6, 600),
(255, 'Alyza', 'Swain', 'alyz@gmail.com', 'pelkiu 11, Vilnius', 'Juoda', 'Split-grain', 6, 600),
(256, 'Lukas', 'Trutas', 'trutas@gmail.com', 'ateities 11, Vilnius', 'Balta', 'Top-grain', 7, 1050),
(257, 'Anatolijus', 'Bladzigovas', 'bladzigovas@gmail.com', 'vietiniu 11, Klaipeda', 'Balta', 'Split-grain', 3, 300),
(258, 'Anatolijus', 'Bladzigovas', 'bladzigovas@gmail.com', 'vietiniu 11, Klaipeda', 'Balta', 'Split-grain', 3, 300),
(259, 'Deividas', 'Petrosius', 'petrosius@gmail.com', 'petrasiunu 11, Kaunas', 'Melyna', 'Full-grain', 3, 315),
(260, 'Mineda', 'Alijeva', 'minjed@gmail.com', 'algoriu 11, Vilnius', 'Balta', 'Full-grain', 2, 210),
(261, 'Dziugas', 'Anomas', 'anoomas@gmail.com', 'anoliju 11, Klaipeda', 'Raudona', 'Bikastine', 2, 180),
(262, 'Marius', 'Latinskas', 'latinkas@gmail.com', 'sveciu 13, Kaunas', 'Juoda', 'Top-grain', 9, 1350);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
