-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 07:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aung myanmar`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_name`) VALUES
(1, 'ငြမ်း', 'ငြမ်း');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `NRC` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `NRC`, `address`, `phone_number`) VALUES
(1, 'Kaung Si Thu', ' 0843EYUII', '62st ', 875433),
(2, ' Aung Myat Thu', ' 631GHJKL', '62st', 2345623);

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

CREATE TABLE `dep` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `ranking` tinyint(1) NOT NULL,
  `lent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`id`, `comment`, `ranking`, `lent_id`) VALUES
(9, 'hi`  ', 1, 14),
(10, '', 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `address`, `phone_number`) VALUES
(26, ' mgmg', '38st  ', '9887767 '),
(28, 'kst', '35st', '9887767 '),
(29, 'dfghjkl', 'qtrtyhuj', '09782648924');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `category_id`) VALUES
(1, '၁၀ပေငြမ်း', 1),
(2, 'qwer', 1),
(3, ' 10nyan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lent`
--

CREATE TABLE `lent` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `lent_date` date NOT NULL,
  `total_qty` int(11) NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lent`
--

INSERT INTO `lent` (`id`, `invoice_number`, `customer_id`, `lent_date`, `total_qty`, `deposit`) VALUES
(13, '1234567 ', 1, '2022-10-28', 10, 30000),
(14, '111111', 2, '2022-11-01', 10, 5656),
(15, '77777', 1, '2022-11-02', 10, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `lent_detail`
--

CREATE TABLE `lent_detail` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `item_name` int(11) NOT NULL,
  `lent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lent_detail`
--

INSERT INTO `lent_detail` (`id`, `emp_id`, `item_qty`, `unit_price`, `item_name`, `lent_id`) VALUES
(24, 28, 5, 700, 1, 15),
(25, 28, 5, 1000, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `return_tb`
--

CREATE TABLE `return_tb` (
  `id` int(11) NOT NULL,
  `LentDetail_id` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `income_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `actual_price` int(11) NOT NULL,
  `lent_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `item_id`, `income_date`, `qty`, `actual_price`, `lent_price`) VALUES
(1, 1, '2022-10-15', 10, 50000, 1000),
(2, 1, '2022-10-24', 13, 50000, 800);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(7, 'aung@gmail.com', '$2y$10$dEcGVCcF8m7WeOZJ6q7Qp.n68CEEqDkeignT3FlrWgSW/jJNo4ag.');

-- --------------------------------------------------------

--
-- Table structure for table `workaddress`
--

CREATE TABLE `workaddress` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `work_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workaddress`
--

INSERT INTO `workaddress` (`id`, `cus_id`, `work_address`) VALUES
(1, 1, '30st'),
(2, 2, '35st');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dep`
--
ALTER TABLE `dep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lent_id` (`lent_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `lent`
--
ALTER TABLE `lent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer _id` (`customer_id`);

--
-- Indexes for table `lent_detail`
--
ALTER TABLE `lent_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `lent_id` (`lent_id`),
  ADD KEY `item_name` (`item_name`);

--
-- Indexes for table `return_tb`
--
ALTER TABLE `return_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LentDetail_id` (`LentDetail_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workaddress`
--
ALTER TABLE `workaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dep`
--
ALTER TABLE `dep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lent`
--
ALTER TABLE `lent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lent_detail`
--
ALTER TABLE `lent_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `return_tb`
--
ALTER TABLE `return_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workaddress`
--
ALTER TABLE `workaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dep`
--
ALTER TABLE `dep`
  ADD CONSTRAINT `dep_ibfk_1` FOREIGN KEY (`lent_id`) REFERENCES `lent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lent`
--
ALTER TABLE `lent`
  ADD CONSTRAINT `lent_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lent_detail`
--
ALTER TABLE `lent_detail`
  ADD CONSTRAINT `lent_detail_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lent_detail_ibfk_3` FOREIGN KEY (`lent_id`) REFERENCES `lent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lent_detail_ibfk_4` FOREIGN KEY (`item_name`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `return_tb`
--
ALTER TABLE `return_tb`
  ADD CONSTRAINT `return_tb_ibfk_1` FOREIGN KEY (`LentDetail_id`) REFERENCES `lent_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workaddress`
--
ALTER TABLE `workaddress`
  ADD CONSTRAINT `workaddress_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;