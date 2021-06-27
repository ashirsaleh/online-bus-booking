-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2021 at 05:33 PM
-- Server version: 10.3.29-MariaDB-0+deb10u1
-- PHP Version: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obs`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `busId` bigint(13) NOT NULL,
  `name` varchar(255) NOT NULL,
  `startFrom` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `busType` varchar(30) NOT NULL,
  `noSeats` int(11) NOT NULL,
  `plateNo` varchar(13) NOT NULL,
  `busPhone` int(11) NOT NULL,
  `farePrice` int(11) NOT NULL,
  `busPhoto` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`busId`, `name`, `startFrom`, `destination`, `busType`, `noSeats`, `plateNo`, `busPhone`, `farePrice`, `busPhoto`, `status`) VALUES
(1, 'JMC EXPRESS', 'Dar', 'Mwanza', 'High Class', 60, '456', 716959410, 45000, 'assets/uploads/bike.jpg', 1),
(2, 'DAR LUX', 'Mwanza', 'Dar', 'High Class', 60, '234', 742095730, 25000, 'assets/uploads/bike.jpg', 1),
(3, 'SHABIBY ', 'Dodoma', 'Dar', 'High Class', 60, '220', 755054590, 20000, 'assets/uploads/bike.jpg', 1),
(4, 'ABC', 'Dar', 'Dodoma', 'High Class', 60, '780', 655054590, 45000, 'assets/uploads/bike.jpg', 1),
(5, 'EXTRA LUXURY', 'Dar', 'Arusha', 'High Class', 60, '600', 655552222, 25000, 'assets/uploads/bike.jpg', 1),
(6, 'HAPPY NATION', 'Arusha', 'Dar', 'Luxury', 60, '400', 657829097, 20000, 'assets/uploads/bike.jpg', 1),
(7, 'ESTHER LUXURY', 'Kilimanjaro', 'Dar', 'High Class', 60, '900', 759304010, 45000, 'assets/uploads/bike.jpg', 1),
(8, 'TILISHO SAFARI', 'Dar', 'Kilimanjaro', 'High Class', 60, '800', 623897860, 20000, 'assets/uploads/bike.jpg', 1),
(9, 'NEW FORCE', 'Dar', 'Morogoro', 'High Class', 60, '100', 769569023, 30000, 'assets/uploads/bike.jpg', 1),
(10, 'UPENDO COARCH', 'Iringa', 'Dar', 'Ordinary Class', 60, '350', 716959410, 25000, 'assets/uploads/bike.jpg', 1),
(11, 'SUTCO', 'Dar', 'Iringa', 'High Class', 60, '365', 716456810, 30000, 'assets/uploads/bike.jpg', 1),
(12, 'MTEI EXPRESS', 'Singida', 'Dar', 'High Class', 60, '434', 743906543, 20000, 'assets/uploads/bike.jpg', 1),
(13, 'MBEYA EXPRESS', 'Dar', 'Mbeya', 'High Class', 60, '569', 732651234, 45000, 'assets/uploads/bike.jpg', 1),
(14, 'NJOMBE EXPRESS', 'Dar', 'Njombe', 'High Class', 60, '345', 765908765, 20000, 'assets/uploads/bike.jpg', 1),
(15, 'SIMBA MTOTO', 'Dar', 'Tanga', 'High Class', 60, '456', 655435677, 25000, 'assets/uploads/bike.jpg', 1),
(16, 'TASHRIF', 'Tanga', 'Dar', 'High Class', 60, '123', 716959823, 45000, 'assets/uploads/bike.jpg', 1),
(17, 'AL SADY', 'Morogoro', 'Dar', 'High Class', 60, '345', 625659410, 25000, 'assets/uploads/bike.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketId` int(11) NOT NULL,
  `userId` bigint(13) NOT NULL,
  `busId` bigint(13) NOT NULL,
  `startFrom` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `seatNo` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `bookingDate` datetime NOT NULL DEFAULT current_timestamp(),
  `travelDate` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketId`, `userId`, `busId`, `startFrom`, `destination`, `seatNo`, `Price`, `bookingDate`, `travelDate`, `status`) VALUES
(1, 2, 4, 'Dar', 'Tanga', 1, 20000, '2021-06-27 15:20:25', '2021-06-28 15:18:45', '0'),
(2, 3, 17, 'Iringa', 'Moshi', 1, 45000, '2021-06-27 15:20:25', '2021-06-30 15:18:45', '0'),
(3, 8, 15, 'Dar', 'Mbeya', 2, 35000, '2021-06-27 18:28:21', '2021-06-30 18:27:00', '1'),
(4, 8, 10, 'Tanga', 'Songea', 2, 100000, '2021-06-27 18:28:21', '2021-07-08 18:27:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` bigint(13) NOT NULL,
  `phoneEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `phoneEmail`, `password`, `firstName`, `lastName`, `phoneNumber`, `role`, `status`) VALUES
(1, 'aquinnata@gmail.com', '$2y$10$u6AaFJtdYJkFoHVAuG34XeSnfkykrpL818bhQUUD5mRw7QhE.i446', 'aquinnata', 'charles', '+255700112233', 'user', 1),
(2, 'chikondo@gmail.com', '$2y$10$0RiD82x3DYpRw6JS2PQEAOnqSF4Ovyeh2ZnTWBa.13PcIa15Bq62m', 'Shaukhan', 'Suleiman', '+255620011111', 'admin', 1),
(3, 'cuvaba@mailinator.com', '$2y$10$ygc8v.6c2zzeondc6tvqFedaM2.EYoUzD7Gffxfe9WfAhor/iqmVC', 'Sierra', 'Huber', '+255871919500', 'user', 1),
(4, 'dyrogyny@mailinator.com', '$2y$10$hQ5CzeFmXDeIODU0KrIxkeRA9cSCnt1qoztEBnUfYhmxnINR2fUjy', 'Timon', 'Britt', '+1 (567) 312-1851', 'user', 1),
(5, 'rahma@gmail.com', '$2y$10$fum9c6vaLAEfUfMueHh8JOOIRAXsfz7X4iJfsGtlwd/1Nbr70QhbG', 'Rahma', 'Swai', '+255760001122', 'user', 1),
(6, 'genes@gmail.com', '$2y$10$dLTLulPKTMNWS2o5dsTQe.R/8stULyqcbwcVljmgs9v4c8rCP.0/G', 'Lara', 'Short', '1234567890', 'user', 1),
(7, 'Fpc@1998', '$2y$10$eS2edYnbPbrwLXeawEX0Pe4rZLZvYmFwdEd0Jzt.ItmKeP65IABB6', 'fau', 'chiko', '0623400173', 'user', 1),
(8, 'faustin', '$2y$10$SfCecmdU3sFkhGD/gWjH0e4Yr8lfZrQiN9NvyjcmMmtfND5pveL.q', 'faustin', 'faustin', '0623400173', 'user', 1),
(9, 'somename', '$2y$10$uIzZYCCAjhwUc2jq.fOlvupzW759gOEOSAzCWg7x6j4hjasmHvLYK', 'somename', 'somename', '0623565656', 'user', 1),
(10, 'shaukani', '$2y$10$KT0c4Gbp2QQouiqRXQHSOORmPoe3nSHjLEf6GQY3QUsGMYiB/akGO', 'shau', 'mrisho', '0622160627', 'user', 1),
(11, 'shaukanimrisho@gmail.com', '$2y$10$iNZYjAOngEBpWG48gKRwduXT89kWolqPASkmtsW8Pw/bQe2JDzrdS', 'fazili', 'mbawala', '0622160627', 'user', 1),
(14, '0743456168', '$2y$10$IvQsApwajsuAjmZoMDOGPePRthprR/eOEtjE8fDwE7vRCW7GRJEg2', 'junior', 'frolian', '0743456168', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`busId`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `busId` (`busId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_username_unique` (`phoneEmail`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `busId` bigint(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` bigint(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `busId` FOREIGN KEY (`busId`) REFERENCES `buses` (`busId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
