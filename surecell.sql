-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 09:49 AM
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
-- Database: `surecell`
--

-- --------------------------------------------------------

--
-- Table structure for table `aadhaar_rec`
--

CREATE TABLE `aadhaar_rec` (
  `a_id` int(10) NOT NULL,
  `aadhaar_num` varchar(20) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `otp_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aadhaar_rec`
--

INSERT INTO `aadhaar_rec` (`a_id`, `aadhaar_num`, `a_name`, `mobile`, `otp`, `otp_status`) VALUES
(1, '1001', 'aravindan', '', '', '0');

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
('101', 'Mobiles'),
('102', 'Electronics and'),
('103', 'Automobiles'),
('104', 'Furniture'),
('105', 'Books'),
('106', 'Real estate');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` varchar(10) NOT NULL,
  `user1` varchar(20) NOT NULL,
  `user2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `user1`, `user2`) VALUES
('chat1', 'aravind', 'tharshini'),
('chat2', 'aravind', 'faaiza');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `ex_id` varchar(30) NOT NULL,
  `ex_name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `ex_email` varchar(30) NOT NULL,
  `spec` varchar(20) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`ex_id`, `ex_name`, `location`, `mobile`, `ex_email`, `spec`, `lang`, `qualification`, `img`) VALUES
('101', 'Umapathy', 'Pondicherry', '6381721177', 'umapathy34@gmail.com', 'Electronics and Appl', 'English Tamil', 'B.tech ECE', 'ex1'),
('102', 'Ajay ', 'Pondicherry', '6381046930', 'ajay.a@gmail.com', 'Automobiles', 'English, Tamil', 'B.Tech Mech', 'ex2'),
('103', 'Athithyaa Ramesh', 'Pondicherry', '8870171995', 'athithyaaramesh@gmail.com', 'Real Estate', 'English, Tamil', 'MBA ', 'ex3'),
('104', 'Manikandan', 'Pondicherry', '9677788720', 'manikandan@gmail.com', 'Furniture and Textil', 'English, Tamil', 'MBA ', 'ex4'),
('105', 'Bhuvana Ilango', 'Pondicherry', '9345576605', 'bhuvanai@gmail.com', 'Mobiles and Electron', 'English, Tamil', 'B.Tech ECE', 'ex5'),
('106', 'Harini', 'Pondicherry', '9876543563', '', 'Electronics', 'English', 'B.Tech', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `email`, `password`, `role`) VALUES
('101', 'umapathy@gmail.com', '12345', 'expert'),
('102', 'ajay@gmail.com', '12345', 'expert'),
('103', 'athithyaa@gmail.com', '12345', 'expert'),
('104', 'manikandan@gmail.com', '12345', 'expert'),
('105', 'bhuvana@gmail.com', '12345', 'expert'),
('106', 'harini@gmail.com', '12345', 'expert'),
('aravind', 'aravind@gmail.com', '12345', 'user'),
('bharath', 'bharath@gmail.com', '12345', 'admin'),
('chandhine', 'chandhine@gmail.com', '12345', 'user'),
('faaiza', 'faaiza@gmail.com', '12345', 'user'),
('nivetha', 'nivetha@gmail.com', '12345', 'admin'),
('tharshini', 'tharshini@gmail.com', '12345', 'user'),
('viji', 'viji@gmail.com', '12345', 'user'),
('vishaali', 'vishaali@gmail.com', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `img_path` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `seller_id`, `description`, `price`, `category`, `date`, `img_path`) VALUES
(1, 'Nikon DSLR', 'tharshini', 'Nikon DSLR, colour - black Len', '40000', '102', '2023-03-08', '10'),
(2, 'Rich Dad Poor Dad', 'faaiza', 'Rich dad poor dad book by Robert T Kiyoski. Very good book. Good life lessons.\r\nPages look brand new', '150', '105', '0000-00-00', '20'),
(3, 'Iphone 13', 'aravind', 'Iphone 13, colour:Blue, Very good in condition. Brand new. ', '30000', '101', '2023-04-10', '30'),
(4, 'Toyoto Supra mk4', 'aravind', 'Toyoyo Supra mk4, manufactured', '20 lakhs', '103', '2023-03-03', '40'),
(5, 'Samsung S23', 'vishaali', 'Samsung S23 colour : Baby pink', '25000', '101', '2023-04-05', '50'),
(6, 'Housing Plot', 'chandhine', 'Real estate area. SRA Nile nagar, ', '60 lakhs', '106', '2023-04-05', '60'),
(7, 'Coolki Gear Cycle', 'viji', 'Coolki SS026 Gear cycle, Flat Tyre Cycle, 21 speed gears, colour:Black.', '12000', '103', '2023-04-10', '70'),
(8, 'Single sofa chair', 'vishaali', 'Velvet Accent single sofa chair, Color:Blue. Very soft texture. Very comfortable to sit and relax. e', '5000', '104', '2023-03-08', '80');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `aadhaar_num` varchar(20) NOT NULL,
  `user_img` varchar(20) NOT NULL,
  `created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `mobile`, `location`, `aadhaar_num`, `user_img`, `created`) VALUES
('aravind', 'Aravindan', 'M', 'aravind@gmail.com', '8838967951', 'Chennai', '', 'user4', '29/03/2023'),
('chandhine', 'Chandhine', 'Vijayaram', 'chandhine@gmail.com', '8072990988', 'Pondicherry', '', 'user5', '29/03/2023'),
('faaiza', 'Faaiza', 'Rahmaan', 'faaiza@gmail.com', '8270800793', 'Pondicherry', '1003', 'user2', '29/03/2023'),
('tharshini', 'Tharshini ', '', 'tharshini@gmail.com', '9894123203', 'Pondicherry', '1001', 'user1', '29/03/2023'),
('viji', 'Vijayalakshmi', '', 'viji@gmail.com', '9080141608', 'Pondicherry', '', 'user6', '29/03/2023'),
('vishaali', 'Vishaali', 'Ganesh', 'vishaali@gmail.com', '7806834697', 'Pondicherry', '1002', 'user3', '29/03/2023');

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
(101, 1, '101', 'good', '2023-04-09', '2023-04-10', 'verified', ''),
(102, 2, '102', '', '2023-04-09', '2023-04-18', 'verified', ''),
(104, 7, '105', '', '2023-04-17', '2023-04-17', 'waiting', ''),
(105, 3, '105', '', '2023-04-17', '2023-04-17', 'waiting', ''),
(106, 4, '102', '', '2023-04-17', '2023-04-17', 'rejected', ''),
(108, 6, '103', '', '2023-04-17', '2023-04-17', 'waiting', ''),
(109, 5, '', '', '2023-04-11', '2023-04-13', 'nv', ''),
(110, 8, '', '', '2023-04-04', '2023-04-05', 'nv', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aadhaar_rec`
--
ALTER TABLE `aadhaar_rec`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `aadhaar_rec`
--
ALTER TABLE `aadhaar_rec`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
