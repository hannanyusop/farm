-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 01:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `collectmilk`
--

CREATE TABLE `collectmilk` (
  `id` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `stallno` varchar(255) DEFAULT NULL,
  `animalid` varchar(255) DEFAULT NULL,
  `litre` varchar(255) DEFAULT NULL,
  `collectedby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectmilk`
--

INSERT INTO `collectmilk` (`id`, `date`, `stallno`, `animalid`, `litre`, `collectedby`) VALUES
(3, '2020-05-15', '1542', '55409', '15', 'Kuhan');

-- --------------------------------------------------------

--
-- Table structure for table `cowfeed`
--

CREATE TABLE `cowfeed` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `stallno` int(255) DEFAULT NULL,
  `animalid` int(255) DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cowfeed`
--

INSERT INTO `cowfeed` (`id`, `date`, `stallno`, `animalid`, `notes`) VALUES
(1, '2020-05-05', 1543, 55409, 'iruke....iniki iruke'),
(2, '2020-05-15', 6654, 55409, 'iruke....iniki iruke'),
(3, '2020-05-13', 1543, 912, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `purpose` text,
  `details` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `purpose`, `details`, `total`) VALUES
(2, '2020-05-06', 'Nothing', 'enna illeh', 'RM. 3000.00'),
(3, '2020-05-08', 'Nothing', 'nothing', 'RM. 3000.00'),
(4, '2020-05-22', 'Nothing', 'illeh', 'RM. 3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `milkreport`
--

CREATE TABLE `milkreport` (
  `id` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `total` decimal(65,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milkreport`
--

INSERT INTO `milkreport` (`id`, `month`, `amount`, `total`) VALUES
(9, '2020-01', 15, '3000'),
(10, '2020-02', 80, '8000'),
(11, '2020-03', 90, '9000'),
(12, '2020-04', 40, '5008'),
(13, '2020-09', 15, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `milksales`
--

CREATE TABLE `milksales` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `accno` varchar(255) DEFAULT NULL,
  `name` text,
  `contact` int(255) DEFAULT NULL,
  `email` text,
  `litre` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `paymentstatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milksales`
--

INSERT INTO `milksales` (`id`, `date`, `accno`, `name`, `contact`, `email`, `litre`, `price`, `paymentstatus`) VALUES
(2, '2020-05-05', '158664100416', 'Selva Ganapathy', 1111293055, 'gselva160@gmail.com', '20', 'RM 2000.00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `multi_user`
--

CREATE TABLE `multi_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `email` text NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `icnum` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `salary` int(255) NOT NULL,
  `joiningdate` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi_user`
--

INSERT INTO `multi_user` (`id`, `username`, `fullname`, `usertype`, `email`, `phoneno`, `icnum`, `address`, `salary`, `joiningdate`, `password`) VALUES
(3, 'selva', 'Selva Ganapathy', 'admin', 'gselva160@gmail.com', '01111263055', '971105385173', '1, Persiaran Lagun Sunway,', 1500, '2019-12-12', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Yoga', 'yoga', 'admin', 'yoga@gmail.com', '01111263055', '971105385173', '1, Persiaran Lagun Sunway,', 3000, '2020-05-27', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Kuhan', 'Kuhaneswaran', 'user', 'kuhan@gmail.com', '01111263055', '123456789012', '1, Persiaran Lagun Sunway,', 2000, '2019-12-12', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `stallno` int(255) DEFAULT NULL,
  `animalid` int(255) DEFAULT NULL,
  `vaccine` text,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `date`, `stallno`, `animalid`, `vaccine`, `notes`) VALUES
(1, '2020-05-12', 1543, 912, 'yes', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collectmilk`
--
ALTER TABLE `collectmilk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cowfeed`
--
ALTER TABLE `cowfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milkreport`
--
ALTER TABLE `milkreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milksales`
--
ALTER TABLE `milksales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_user`
--
ALTER TABLE `multi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collectmilk`
--
ALTER TABLE `collectmilk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cowfeed`
--
ALTER TABLE `cowfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `milkreport`
--
ALTER TABLE `milkreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `milksales`
--
ALTER TABLE `milksales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `multi_user`
--
ALTER TABLE `multi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
