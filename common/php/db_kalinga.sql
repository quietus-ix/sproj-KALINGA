-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 10:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `tb_actionhistory`
--

CREATE TABLE `tb_actionhistory` (
  `ah_id` int(11) NOT NULL,
  `ah_content` text NOT NULL COMMENT 'content text of this notification',
  `ah_refID` int(11) NOT NULL COMMENT 'the content ID which the notification will refer',
  `ah_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'time when the notification is generated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bundleitems`
--

CREATE TABLE `tb_bundleitems` (
  `bundle_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bundles`
--

CREATE TABLE `tb_bundles` (
  `bnd_id` int(11) NOT NULL,
  `bnd_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_contributors`
--

CREATE TABLE `tb_contributors` (
  `con_id` int(11) NOT NULL,
  `con_fullname` varchar(128) NOT NULL,
  `con_donDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `inv_id` int(11) NOT NULL,
  `inv_product` varchar(255) NOT NULL,
  `inv_prtype` varchar(5) DEFAULT NULL,
  `inv_note` text DEFAULT NULL,
  `inv_denom` int(6) NOT NULL,
  `inv_deduc` int(6) NOT NULL,
  `inv_qty` int(6) NOT NULL,
  `inv_dateAdded` date NOT NULL,
  `inv_dateModified` date NOT NULL
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
('null', 'unset', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_reports`
--

CREATE TABLE `tb_reports` (
  `rep_id` int(11) NOT NULL,
  `rep_file` text NOT NULL,
  `rep_genDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `usr_type` int(11) NOT NULL COMMENT 'admin = 0\r\nuser = 1',
  `usr_username` varchar(128) NOT NULL,
  `usr_password` varchar(128) NOT NULL,
  `usr_fname` varchar(255) NOT NULL,
  `usr_lname` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_contactNum` varchar(20) NOT NULL,
  `usr_dateCreated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_actionhistory`
--
ALTER TABLE `tb_actionhistory`
  ADD PRIMARY KEY (`ah_id`);

--
-- Indexes for table `tb_bundles`
--
ALTER TABLE `tb_bundles`
  ADD PRIMARY KEY (`bnd_id`) USING BTREE;

--
-- Indexes for table `tb_contributors`
--
ALTER TABLE `tb_contributors`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `FK_product_type` (`inv_prtype`);

--
-- Indexes for table `tb_prtype`
--
ALTER TABLE `tb_prtype`
  ADD PRIMARY KEY (`ipt_id`);

--
-- Indexes for table `tb_reports`
--
ALTER TABLE `tb_reports`
  ADD PRIMARY KEY (`rep_id`);

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
-- AUTO_INCREMENT for table `tb_actionhistory`
--
ALTER TABLE `tb_actionhistory`
  MODIFY `ah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bundles`
--
ALTER TABLE `tb_bundles`
  MODIFY `bnd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_contributors`
--
ALTER TABLE `tb_contributors`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_reports`
--
ALTER TABLE `tb_reports`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_residents`
--
ALTER TABLE `tb_residents`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
