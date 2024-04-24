-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 11:54 AM
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
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `mid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `accept` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`mid`, `tid`, `gid`, `date`, `subject`, `description`, `accept`, `status`) VALUES
(4, 7, 5, '2024-04-09', 'Come to my Home', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula massa vitae nulla fermentum, eget venenatis justo ullamcorper. Integer sed ipsum eu lacus vestibulum facilisis. Nam interdum massa id quam mattis, at convallis ex finibus. Pellentesque in sem eget risus rhoncus pretium. Proin at nibh vel purus interdum convallis. Sed fringilla condimentum purus, at congue ipsum consectetur a', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `exprience` varchar(50) NOT NULL,
  `avalaiblity` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `Service` varchar(5000) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `uid`, `exprience`, `avalaiblity`, `location`, `Service`, `phone`) VALUES
(2, 4, '3 years', 1, 'Taxila wahcant pakistan', 'As a caregiver, I offer personalized care plans tailored to meet the specific needs and preferences of each client', '03489979762');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `img`, `pass`, `role`, `date`) VALUES
(4, 'Asad Saddiqui', 'asadsaddiqui101@gmail.com', '1713941803Caregiver.png', '81deb4e725674e4a67896f9704c1564f3cb62fe2', 'Caregiver', '2024-04-23 23:56:43'),
(5, 'Ali', 'ali@gmail.com', '1713941999Caregiver.jpg', '81deb4e725674e4a67896f9704c1564f3cb62fe2', 'Caregiver', '2024-04-23 23:59:59'),
(6, 'Hamza', 'hamza@gmail.com', '1713942057Caregiver.JPG', '81deb4e725674e4a67896f9704c1564f3cb62fe2', 'Caregiver', '2024-04-24 00:00:57'),
(7, 'Afaq', 'afaq@gmail.com', '1713942098Caretaker.JPG', '81deb4e725674e4a67896f9704c1564f3cb62fe2', 'Caretaker', '2024-04-24 00:01:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
