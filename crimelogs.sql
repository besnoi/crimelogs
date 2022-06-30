-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 05:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimelogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `criminalid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `bankacc` varchar(128) NOT NULL,
  `mobbank` varchar(12) NOT NULL,
  `mobno` varchar(12) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `panno` varchar(128) NOT NULL,
  `adhaar` varchar(128) NOT NULL,
  `crime_number` int(11) NOT NULL,
  `crime_year` int(11) NOT NULL,
  `registration_date` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`criminalid`, `name`, `surname`, `bankacc`, `mobbank`, `mobno`, `email`, `address`, `panno`, `adhaar`, `crime_number`, `crime_year`, `registration_date`) VALUES
(1, 'Raj', 'Teotia', '091000019', '9364552421', '9364552421', 'rajteotia123@gmail.com', '687 Budhwar Peth, Pune, 411002', 'ALWPG5809L', '2094705195541', 188, 2021, '06/29/2021'),
(2, 'Lawrence', 'Bishnoi', '071000019', '8324552421', '8842124242', 'lawrence@bishnoi.com', '18 MEREDITH DELHI NY 13753-1035', 'HLTPG5809L', '2094705195541', 188, 2019, '05/19/2019'),
(3, 'Tilu', 'Tajparia', '069000019', '7724552421', '6764552421', 'tillugang@vsnl.nic.in', 'Sector 2, Shanti Nagar, Mira Road', 'XTTPG5809L', '8092705195541', 12, 2020, '01/05/2020'),
(4, 'Niraj', 'Bhawana', '559000019', '8824552421', '7764552421', 'bhawana.niraj@vsnl.nic.in', 'Digi Park, Sector 7, Dwarka, New Delhi 411002', 'LLTPG5809L', '9992705195541', 33, 2018, '01/05/2018'),
(5, 'Mahmud', 'Ayyub', '079000019', '9724552465', '9764552422', 'ayyub@islamweb.co.in', 'Miapur, Hyderabad', 'JLTPG5809L', '4592705195541', 330, 2016, '01/05/2016'),
(6, 'Sunil', 'Rathi', '12300019', '6724552465', '6764552422', 'rathi@blasiteweb.co.in', 'Street 3A, Gandhi Road, Lucknow 311055', 'ILTPG5809L', '3592705195541', 120, 2017, '01/05/2017'),
(7, 'Abu', 'Salem', '02300019', '7724552465', '7764552422', 'abusalem@islamweb.co.in', '35C Galaxy Apartments, Mumbai 711055', 'ILTPG5809L', '3592705195541', 1, 2014, '01/05/2014'),
(8, 'Nawab', 'Maliq', '03300019', '7744552465', '7264552422', 'nawabmaliq@islamweb.co.in', 'Kathiawadi Street 4C, Mira Road, Andheri West 611055', 'PKTPG5809L', '3592705195541', 35, 2022, '01/05/2022'),
(9, 'Anil', 'Deshmukh', '04300019', '8744552465', '8264552422', 'anil@deshmukh.com', '18 Sardar Patel Road, New Delhi 441105', 'IKTPG5809L', '3592705195541', 43, 2022, '01/05/2022'),
(10, 'Aryan', 'Khan', '02300019', '6744552465', '6264552422', 'khan@aryan.com', '18 Khan Road, Mannat, Mumbai 241105', 'FKTPG5809L', '2292705195541', 331, 2021, '07/06/2022'),
(11, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(12, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(13, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(14, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(15, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(16, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(17, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(18, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(19, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(20, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(21, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(22, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(23, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(24, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(25, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012'),
(26, 'Ajmal', 'Kasab', 'Nil', 'Nil', 'Nil', 'kasabisdead@pakistan.com', 'Nil', 'Nil', 'Nil', 254, 2012, '11/26/2012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`criminalid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `criminalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
