-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 08:40 PM
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
-- Database: `supermarket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_ID` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_ID`, `email`, `password`) VALUES
(1, 'customer1@example.com', 'password123'),
(2, 'employee1@example.com', 'password456'),
(66, 'robert.builder@webbydev.com', '12345'),
(67, 'carmen.sandiego@webbydev.com', '12345'),
(68, 'bess.bessyton@webbydev.com', '12345'),
(69, 'pedro@gmail.com', '123'),
(70, 'pedro@yahoo.com', '123'),
(74, 'kcarmen.sanfrancisco@webbydev.com', '7654'),
(75, 'jbro@gmail.com', '12345'),
(98, 'manager@webbydev.vcom', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `zip_code` varchar(10) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`zip_code`, `street`, `city`, `state`) VALUES
('06606', 'Unknown', 'Unknown', 'Unknown'),
('09831', '54 StreetName Cir.', 'NorthTown', 'WA'),
('12345', '123 Main St', 'Anytown', 'CT'),
('35918', '21 PlaceName Ave.', 'WestTown', 'AZ'),
('43701', '55 Hotson Pl.', 'Northeast City', 'NH'),
('45123', 'BranchTwo Pl.', 'BranchTwoCity', 'NM'),
('54321', '456 Elm St', 'Othertown', 'CT'),
('56120', 'BranchThree Rd.', 'BranchThreeHamlet', 'LA'),
('65109', '35 Bobton Rd.', 'Eastcity', 'TX'),
('78912', 'BranchOne Pl.', 'BranchOneTown', 'CO'),
('98214', '67 RoadName Pl.', 'SouthTown', 'GA');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_ID` int(11) NOT NULL,
  `cust_fname` varchar(50) DEFAULT NULL,
  `cust_lname` varchar(50) DEFAULT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `account_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_ID`, `cust_fname`, `cust_lname`, `phone_num`, `zip_code`, `account_ID`) VALUES
(1, 'John', 'Doe', '123-456-7890', '12345', 1),
(2, 'Jane', 'Smith', '098-765-4321', '54321', 2),
(7, 'pedro', 'fernandes', '2034439662', '06606', 69),
(8, 'J', 'Bro', '', '12345', 75);

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

CREATE TABLE `customer_transaction` (
  `transaction_ID` int(11) NOT NULL,
  `cust_ID` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_transaction`
--

INSERT INTO `customer_transaction` (`transaction_ID`, `cust_ID`, `total_price`, `date`) VALUES
(1, 1, 10.00, '2024-06-19'),
(2, 2, 20.00, '2024-06-19'),
(3, 1, 15.00, '2024-06-20'),
(4, 1, 25.50, '2024-06-21'),
(5, 1, 30.75, '2024-06-22'),
(6, 2, 18.00, '2024-06-20'),
(7, 2, 20.50, '2024-06-21'),
(8, 2, 22.75, '2024-06-22'),
(9, 7, 10.00, '2024-06-20'),
(10, 7, 12.50, '2024-06-21'),
(11, 7, 15.75, '2024-06-22'),
(12, 1, 10.00, '2020-08-13'),
(13, 1, 20.00, '2021-12-01'),
(14, 1, 30.00, '2019-03-25'),
(15, 2, 15.00, '2024-01-05'),
(16, 2, 25.00, '2006-05-12'),
(17, 2, 35.00, '2017-09-21'),
(18, 7, 12.00, '2022-01-30'),
(19, 7, 22.00, '2018-12-11'),
(20, 7, 32.00, '2024-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_ID` int(11) NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_ID`, `dept_name`) VALUES
(1, 'Cold'),
(2, 'Electronics'),
(3, 'Produce'),
(4, 'Seafood'),
(5, 'Butcher');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(11) NOT NULL,
  `emp_fname` varchar(50) DEFAULT NULL,
  `emp_lname` varchar(50) DEFAULT NULL,
  `branch_ID` int(11) DEFAULT NULL,
  `account_ID` int(11) DEFAULT NULL,
  `job_role_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_ID`, `emp_fname`, `emp_lname`, `branch_ID`, `account_ID`, `job_role_ID`) VALUES
(3, 'Alice', 'Johnson', 1, 2, 1),
(4, 'Bob', 'Brown', 1, 2, 2),
(29, 'Robert', 'Builder', 2, 66, 2),
(30, 'Carmen', 'San Diego', 3, 67, 4),
(31, 'Bess', 'Bessyton', 3, 68, 1),
(32, 'Pedro', 'Fernandes', 1, 70, 1),
(36, 'Ckarmen', 'San Francisco', 4, 74, 1),
(37, 'Man', 'Ager', 5, 98, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_roster`
-- (See below for the actual view)
--
CREATE TABLE `employee_roster` (
`employee_ID` int(11)
,`emp_fname` varchar(50)
,`emp_lname` varchar(50)
,`branch_ID` int(11)
,`email` varchar(100)
,`job_role_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `branch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`branch_id`, `product_id`, `quantity`) VALUES
(1, 2, 200),
(1, 3, 0),
(1, 5, 100),
(1, 6, 67),
(1, 11, 900),
(1, 53, 600),
(1, 57, 1000),
(2, 3, 17),
(2, 4, 350),
(2, 5, 50),
(2, 6, 66),
(2, 11, 901),
(3, 3, 17),
(3, 4, 350),
(3, 5, 50),
(3, 6, 66),
(3, 11, 901),
(4, 3, 17),
(4, 4, 350),
(4, 5, 50),
(4, 6, 66),
(4, 11, 901),
(5, 3, 17),
(5, 4, 350),
(5, 5, 50),
(5, 6, 66),
(5, 11, 901),
(5, 53, 200);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_ID` int(11) NOT NULL,
  `supplier_ID` int(11) DEFAULT NULL,
  `branch_ID` int(11) DEFAULT NULL,
  `product_ID` int(11) DEFAULT NULL,
  `amount_billed` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_ID`, `supplier_ID`, `branch_ID`, `product_ID`, `amount_billed`) VALUES
(1, 1, 1, 1, 100.00),
(2, 2, 1, 2, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `job_role`
--

CREATE TABLE `job_role` (
  `job_role_ID` int(11) NOT NULL,
  `job_role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_role`
--

INSERT INTO `job_role` (`job_role_ID`, `job_role_name`) VALUES
(1, 'Manager'),
(2, 'Cashier'),
(3, 'Bagger'),
(4, 'Stocker');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phone_ID` int(11) NOT NULL,
  `phone_num` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phone_ID`, `phone_num`) VALUES
(1, '123-456-7890'),
(2, '098-765-4321');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product_ID` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_type_ID` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_ID`, `product_name`, `product_type_ID`, `product_price`) VALUES
(1, 'Grapes', 2, 3.00),
(2, 'Milk', 1, 6.00),
(3, 'Veal', 2, 5.00),
(4, 'Beef', 2, 18.00),
(5, 'Corn', 2, 5.00),
(6, 'Cucumber', 2, 2.00),
(10, 'Headphones', 2, 50.00),
(11, 'Swordfish', 2, 45.00),
(12, 'Lobster', 2, 23.00),
(53, 'Pork Belly', 2, 17.00),
(57, 'Apple Juice', 1, 7.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_ID` int(11) NOT NULL,
  `product_type_name` varchar(50) DEFAULT NULL,
  `dept_ID` int(11) DEFAULT NULL,
  `supplier_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_ID`, `product_type_name`, `dept_ID`, `supplier_ID`) VALUES
(1, 'Fruit', 3, 1),
(2, 'Meat', 5, 2),
(3, 'Vegetable', 3, 6),
(4, 'Dairy', 1, 5),
(5, 'Electronic', 2, 3),
(6, 'Fish', 4, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock_list`
-- (See below for the actual view)
--
CREATE TABLE `stock_list` (
`branch_id` int(11)
,`product_name` varchar(100)
,`product_price` decimal(10,2)
,`quantity` int(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `supermarket_branch`
--

CREATE TABLE `supermarket_branch` (
  `branch_ID` int(11) NOT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `inventory_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supermarket_branch`
--

INSERT INTO `supermarket_branch` (`branch_ID`, `zip_code`, `phone_num`, `inventory_ID`) VALUES
(1, '12345', '123-456-7890', 1),
(2, '54321', '098-765-4321', 2),
(3, '78912', '654-098-7654', 3),
(4, '45123', '123-098-4512', 4),
(5, '56120', '541-234-0912', 5);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_ID` int(11) NOT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `product_type_ID` int(11) DEFAULT NULL,
  `phone_num` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_ID`, `supplier_name`, `zip_code`, `product_type_ID`, `phone_num`) VALUES
(1, 'Dole', '12345', 1, '123-456-7890'),
(2, 'Purdue', '54321', 2, '098-765-4321'),
(3, 'RadioShack', '98214', 5, '765-432-1098'),
(4, 'FishyFish Supplies, Inc', '35918', 6, '860-068-0860'),
(5, 'ItsCowTime, Inc', '43701', 4, '567-123-0987'),
(6, 'VeggieTales, Inc.', '65109', 3, '456-789-0123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`cust_id`, `product_id`, `quantity`) VALUES
(2, 3, 1),
(2, 5, 2),
(2, 11, 1),
(2, 53, 1),
(2, 57, 3),
(7, 2, 1),
(7, 3, 1),
(7, 4, 7),
(7, 5, 1),
(7, 6, 3),
(7, 57, 4);

-- --------------------------------------------------------

--
-- Structure for view `employee_roster`
--
DROP TABLE IF EXISTS `employee_roster`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_roster`  AS SELECT `employee`.`employee_ID` AS `employee_ID`, `employee`.`emp_fname` AS `emp_fname`, `employee`.`emp_lname` AS `emp_lname`, `employee`.`branch_ID` AS `branch_ID`, `account`.`email` AS `email`, `job_role`.`job_role_name` AS `job_role_name` FROM ((`employee` join `account`) join `job_role`) WHERE `employee`.`account_ID` = `account`.`account_ID` AND `employee`.`job_role_ID` = `job_role`.`job_role_ID` ;

-- --------------------------------------------------------

--
-- Structure for view `invoice_list`
--
DROP TABLE IF EXISTS `invoice_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice_list`  AS SELECT `i`.`invoice_ID` AS `invoice_ID`, `s`.`supplier_name` AS `supplier_name`, `b`.`branch_ID` AS `branch_ID`, `p`.`product_name` AS `product_name`, `i`.`amount_billed` AS `amount_billed` FROM (((`invoice` `i` join `supplier` `s` on(`i`.`supplier_ID` = `s`.`supplier_ID`)) join `supermarket_branch` `b` on(`i`.`branch_ID` = `b`.`branch_ID`)) join `product_info` `p` on(`i`.`product_ID` = `p`.`product_ID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `stock_list`
--
DROP TABLE IF EXISTS `stock_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock_list`  AS   (select `inventory`.`branch_id` AS `branch_id`,`product_info`.`product_name` AS `product_name`,`product_info`.`product_price` AS `product_price`,`inventory`.`quantity` AS `quantity` from (`inventory` join `product_info`) where `inventory`.`product_id` = `product_info`.`product_ID`)  ;

-- --------------------------------------------------------

--
-- Structure for view `supplier_list_view`
--
DROP TABLE IF EXISTS `supplier_list_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `supplier_list_view`  AS SELECT `s`.`supplier_name` AS `supplier_name`, `a`.`zip_code` AS `zip_code`, `a`.`street` AS `street`, `a`.`city` AS `city`, `a`.`state` AS `state`, `p`.`product_type_name` AS `product_type_name`, `s`.`phone_num` AS `phone_num` FROM ((`supplier` `s` join `address` `a` on(`s`.`zip_code` = `a`.`zip_code`)) join `product_type` `p` on(`s`.`product_type_ID` = `p`.`product_type_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_ID`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`zip_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_ID`),
  ADD KEY `zip_code` (`zip_code`),
  ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `cust_ID` (`cust_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`),
  ADD KEY `branch_ID` (`branch_ID`),
  ADD KEY `account_ID` (`account_ID`),
  ADD KEY `job_role_ID` (`job_role_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`branch_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_ID`),
  ADD KEY `supplier_ID` (`supplier_ID`),
  ADD KEY `branch_ID` (`branch_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `job_role`
--
ALTER TABLE `job_role`
  ADD PRIMARY KEY (`job_role_ID`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phone_ID`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `product_type_ID` (`product_type_ID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_ID`),
  ADD KEY `dept_ID` (`dept_ID`),
  ADD KEY `product_type_ibfk_2` (`supplier_ID`);

--
-- Indexes for table `supermarket_branch`
--
ALTER TABLE `supermarket_branch`
  ADD PRIMARY KEY (`branch_ID`),
  ADD KEY `zip_code` (`zip_code`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_ID`),
  ADD KEY `zip_code` (`zip_code`),
  ADD KEY `product_type_ID` (`product_type_ID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`cust_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_role`
--
ALTER TABLE `job_role`
  MODIFY `job_role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `phone_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supermarket_branch`
--
ALTER TABLE `supermarket_branch`
  MODIFY `branch_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`zip_code`) REFERENCES `address` (`zip_code`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`);

--
-- Constraints for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD CONSTRAINT `customer_transaction_ibfk_1` FOREIGN KEY (`cust_ID`) REFERENCES `customer` (`cust_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`branch_ID`) REFERENCES `supermarket_branch` (`branch_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`job_role_ID`) REFERENCES `job_role` (`job_role_ID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `supermarket_branch` (`branch_ID`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_info` (`product_ID`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
