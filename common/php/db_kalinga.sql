-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2023 at 04:24 PM
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

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`inv_id`, `inv_product`, `inv_prtype`, `inv_note`, `inv_denom`, `inv_deduc`, `inv_qty`, `inv_dateAdded`, `inv_dateModified`) VALUES
(29, 'ALCOHOL', 'PT529', '', 5, -1, 4, '2023-12-11', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `ntf_id` int(11) NOT NULL,
  `ntf_content` text NOT NULL COMMENT 'content text of this notification',
  `ntf_refID` int(11) NOT NULL COMMENT 'the content ID which the notification will refer',
  `ntf_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'time when the notification is generated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('PT529', 'hygiene', 'pieces', 'pcs');

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
  `user_type` int(11) NOT NULL COMMENT 'superadmin = 0\r\nadmin = 1',
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

INSERT INTO `tb_user` (`usr_id`, `user_type`, `usr_username`, `usr_password`, `usr_fname`, `usr_lname`, `usr_email`, `usr_contactNum`, `usr_dateCreated`) VALUES
(17, 0, 'user2', '$2y$10$yEGoqqNpLkT/oy5eWEgZae47qc0wvpLTAwpnLVjC.4sSabm7xfLIO', 'aa', 'aa', 'a@gmail.com', '', '2023-11-06 02:54:02');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD PRIMARY KEY (`ntf_id`);

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
-- AUTO_INCREMENT for table `tb_contributors`
--
ALTER TABLE `tb_contributors`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_notification`
--
ALTER TABLE `tb_notification`
  MODIFY `ntf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
