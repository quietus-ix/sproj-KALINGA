-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2023 at 01:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kalinga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `inv_id` int(11) NOT NULL,
  `inv_product` varchar(255) NOT NULL,
  `inv_prtype` varchar(5) DEFAULT NULL,
  `inv_note` text DEFAULT NULL,
  `inv_qty` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`inv_id`, `inv_product`, `inv_prtype`, `inv_note`, `inv_qty`) VALUES
(18, 'FLAKES', 'PT767', 'wao', 3),
(19, 'BUGAS', 'PT683', 'this is a note', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `ntf_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_notification`
--

INSERT INTO `tb_notification` (`ntf_content`) VALUES
('a'),
('aa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_packages`
--

CREATE TABLE `tb_packages` (
  `pck_id` varchar(11) NOT NULL,
  `pck_name` varchar(120) NOT NULL,
  `pck_items` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prtype`
--

CREATE TABLE `tb_prtype` (
  `ipt_id` varchar(5) NOT NULL,
  `ipt_type` varchar(255) NOT NULL,
  `ipt_metric` varchar(60) DEFAULT NULL,
  `ipt_metricAbbv` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_prtype`
--

INSERT INTO `tb_prtype` (`ipt_id`, `ipt_type`, `ipt_metric`, `ipt_metricAbbv`) VALUES
('null', 'unset', NULL, NULL),
('PT683', 'rice', 'kilogram', 'kg'),
('PT767', 'canned good', 'pieces', 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `tb_residents`
--

CREATE TABLE `tb_residents` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(128) NOT NULL,
  `res_address` text NOT NULL,
  `res_contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `usr_id` int(11) NOT NULL,
  `usr_username` varchar(128) NOT NULL,
  `usr_password` varchar(128) NOT NULL,
  `usr_fname` varchar(255) NOT NULL,
  `usr_lname` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_contactNum` varchar(20) NOT NULL,
  `usr_dateCreated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`usr_id`, `usr_username`, `usr_password`, `usr_fname`, `usr_lname`, `usr_email`, `usr_contactNum`, `usr_dateCreated`) VALUES
(17, 'user2', '$2y$10$yEGoqqNpLkT/oy5eWEgZae47qc0wvpLTAwpnLVjC.4sSabm7xfLIO', 'aa', 'aa', 'a@gmail.com', '', '2023-11-06 02:54:02'),
(18, 'user3', '$2y$10$rHc4/V1b0PBkWUlI0aNHcO1LAsci5wsw4bcHNxmGV5hjKH4edM8ka', 'user', 'three', 'user3@a.com', '', '2023-11-06 04:12:55'),
(19, 'user4', '$2y$10$nU/AYytQrZ88Co32xqO/V.LqC.RP98zr7hWR.S7r80FawoYCf0UXq', 'user', 'four', 'a@a.com', '', '2023-11-06 06:19:25'),
(20, 'usermarie', '$2y$10$SuSqYx3dSzLVpObdFluzduCXn.XSBwMOPNB0etobsMa.x95F1edDi', 'Marie', 'Juana', 'user@user.com', '', '2023-11-09 07:12:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `FK_product_type` (`inv_prtype`);

--
-- Indexes for table `tb_packages`
--
ALTER TABLE `tb_packages`
  ADD PRIMARY KEY (`pck_id`);

--
-- Indexes for table `tb_prtype`
--
ALTER TABLE `tb_prtype`
  ADD PRIMARY KEY (`ipt_id`);

--
-- Indexes for table `tb_residents`
--
ALTER TABLE `tb_residents`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_residents`
--
ALTER TABLE `tb_residents`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD CONSTRAINT `FK_product_type` FOREIGN KEY (`inv_prtype`) REFERENCES `tb_prtype` (`ipt_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
