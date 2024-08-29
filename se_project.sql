-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 07:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` varchar(10) NOT NULL,
  `c_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
('101', 'mobile'),
('102', 'car'),
('103', 'bike');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `ex_id` int(10) NOT NULL,
  `ex_name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `spec` varchar(20) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`ex_id`, `ex_name`, `location`, `mobile`, `spec`, `lang`, `qualification`, `img`) VALUES
(101, 'jen', 'pondy', '987654321', 'electronics', 'english tamil', 'btech', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `email`, `password`, `role`) VALUES
(101, 'abi@gmail.com', 'abi', 'user'),
(102, 'may@gmail.com', 'may', 'admin'),
(103, 'jai@gmail.com', 'jai', 'expert');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `description` varchar(30) NOT NULL,
  `price` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `img_path` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `seller_id`, `description`, `price`, `category`, `date`, `img_path`) VALUES
(1, 'iphone 12', '101', 'brand new', '22000', '101', '2023-03-03', ''),
(2, 'swift', '101', 'new car', '40000', '102', '2023-03-08', ''),
(3, 'ninja', '102', 'super bike', '80000', '103', '0000-00-00', ''),
(6, 'phone1', '102', 'ghjk ', '2345', '101', '0000-00-00', ''),
(14, 'phone2', '102', ' ssa', '400', '101', '0000-00-00', ''),
(15, 'car', '103', 'fvds', '789', '102', '0000-00-00', ''),
(108, 'bibe', '101', 'dbf', '678', '101', '0000-00-00', ''),
(109, 'elec', '101', 'ww', '5000', '103', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `aadhaar_num` varchar(20) NOT NULL,
  `user_img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `mobile`, `location`, `aadhaar_num`, `user_img`) VALUES
('101', 'abi', '', '124567890', 'puducherry', '1001', ''),
('102', 'mayon', '', '87652345', 'pondy', '1002', ''),
('103', 'jai', '', '96543456', 'pondy', '1003', '');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `v_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ex_id` varchar(20) NOT NULL,
  `review` varchar(500) NOT NULL,
  `req_date` date NOT NULL,
  `review_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`v_id`, `p_id`, `ex_id`, `review`, `req_date`, `review_date`, `status`, `img`) VALUES
(101, 1, '101', 'good', '2023-04-09', '2023-04-10', 'nv', ''),
(102, 2, '102', '', '2023-04-09', '2023-04-18', 'nv', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
