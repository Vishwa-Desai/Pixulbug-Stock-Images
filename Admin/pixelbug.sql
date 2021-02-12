-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 04:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixelbug`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Adm_id` varchar(40) NOT NULL,
  `Adm_pwd` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table pixelbug.admin: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `pixelbug`.`admin`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_id` int(5) NOT NULL,
  `User_id` varchar(40) NOT NULL,
  `Msg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `I_id` int(5) NOT NULL,
  `O_id` int(5) NOT NULL,
  `Total_amt` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_1`
--

CREATE TABLE `order_1` (
  `O_id` int(5) NOT NULL,
  `User_id` varchar(40) NOT NULL,
  `Date_created` date NOT NULL,
  `Date_Delivered` date NOT NULL,
  `Total_amt` int(6) NOT NULL,
  `O_Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table pixelbug.order_1: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `pixelbug`.`order_1`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `OD_id` int(5) NOT NULL,
  `O_id` int(5) NOT NULL,
  `Price` int(5) NOT NULL,
  `P_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `P_id` int(5) NOT NULL,
  `P_name` varchar(60) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `Price` int(5) NOT NULL,
  `User_id` varchar(40) NOT NULL,
  `Size` int(7) NOT NULL,
  `P_id_wmkd` int(5) NOT NULL,
  `Size_wmkd` int(7) NOT NULL,
  `Upld_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `PF_id` int(5) NOT NULL,
  `User_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_photo`
--

CREATE TABLE `portfolio_photo` (
  `PFP_id` int(5) NOT NULL,
  `PF_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `R_id` int(5) NOT NULL,
  `R_frm` varchar(40) NOT NULL,
  `R_to` varchar(40) NOT NULL,
  `R_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` varchar(40) NOT NULL,
  `U_name` char(30) NOT NULL,
  `U_PWD` varchar(8) NOT NULL,
  `Reported` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `U_name`, `U_PWD`, `Reported`) VALUES
('kajol.asnani88@gmail.com', 'Kajol Asnani', 'asdfghjk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `W_id` int(5) NOT NULL,
  `User_id` varchar(40) NOT NULL,
  `Qty` int(3) NOT NULL,
  `P_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Adm_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`I_id`),
  ADD KEY `O_id` (`O_id`);

--
-- Indexes for table `order_1`
--
ALTER TABLE `order_1`
  ADD PRIMARY KEY (`O_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`OD_id`),
  ADD KEY `O_id` (`O_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`PF_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `portfolio_photo`
--
ALTER TABLE `portfolio_photo`
  ADD PRIMARY KEY (`PFP_id`),
  ADD KEY `PF_id` (`PF_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`R_id`),
  ADD KEY `R_frm` (`R_frm`),
  ADD KEY `R_to` (`R_to`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`W_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`O_id`) REFERENCES `order_1` (`O_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`O_id`) REFERENCES `order_1` (`O_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`P_id`) REFERENCES `photo` (`P_id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `portfolio_photo`
--
ALTER TABLE `portfolio_photo`
  ADD CONSTRAINT `portfolio_photo_ibfk_1` FOREIGN KEY (`PF_id`) REFERENCES `portfolio` (`PF_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`R_frm`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`R_to`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`P_id`) REFERENCES `photo` (`P_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
