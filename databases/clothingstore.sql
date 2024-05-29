-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 11:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(250) NOT NULL,
  `adminEmail` varchar(250) NOT NULL,
  `adminPassword` varchar(250) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `adminUsername` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminID`, `adminName`, `adminEmail`, `adminPassword`, `phoneNumber`, `adminUsername`) VALUES
(2, 'Aaliyah Allie', 'Aaliyahallie6@gmail.com', '$2y$10$H2eThdMnxfKEZmyDvLTnhOdZT.OcftzySFw3tFN0NMawCAjcaBMTu', 685816456, 0),
(3, 'Nicol', 'Nic@gmail.com', '$2y$10$cjVqOwj91fDMJVHjATKznerSIQyD5WrnxBir7BRjuM46s6I9H.yU.', 89764743, 0),
(6, 'Example', 'e@gmail.com', '$2y$10$U9cFJdvMLzd0gc3uVN8rGuD7BauJw0JzN8UzrBGRvaqFwO7FVOjcC', 123456789, 0),
(7, 'LOGIN', 'a@gmail.com', '$2y$10$nQmTJRbM3GIMrBWQHr.VtuC85c3R5BsIaFzbMslBUwkhBe9UuVfo6', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblclothes`
--

CREATE TABLE `tblclothes` (
  `id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemDescription` text NOT NULL,
  `itemSize` varchar(50) NOT NULL,
  `itemPrice` decimal(10,2) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclothes`
--

INSERT INTO `tblclothes` (`id`, `itemName`, `itemDescription`, `itemSize`, `itemPrice`, `Image`) VALUES
(1, 'Graphic T-shirt', 'Mens Graphic Tee', 'M', 150.00, '20220330_174706.jpg'),
(2, 'Womens Dress', 'Beautiful blue long dress', 'S', 300.00, 'blue.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomers`
--

CREATE TABLE `tblcustomers` (
  `customerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `billingAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `shippingAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `email`, `password`) VALUES
(1, 'John Doe', 'j.doe@abc.co.za', '29ef52e7563626a96cea7f4b4085c124'),
(2, 'Jane Smith', 'j.smith@example.com', '5ebe2294ecd0e0f08eab7690d2a6ee69'),
(3, 'Alice Johnson', 'a.johnson@test.com', '1a79a4d60de6718e8e5b326e338ae533'),
(4, 'Bob Brown', 'b.brown@example.org', '6c8349cc7260ae62e3b1396831a8398f'),
(5, 'Eve Wilson', 'e.wilson@example.net', '1bbd732b398881dee3a715d91a7b92a6'),
(6, 'Aaliyah ', 'Aaliyahallie6@gmail.com', '$2y$10$AjOpGAmx/SYOjOYlCyb5R.CdeNeIrSj1BPetvo3wvME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tblclothes`
--
ALTER TABLE `tblclothes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblclothes`
--
ALTER TABLE `tblclothes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcustomers`
--
ALTER TABLE `tblcustomers`
  ADD CONSTRAINT `tblcustomers_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tblusers` (`userId`);

--
-- Constraints for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD CONSTRAINT `tblorders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `tblcustomers` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
