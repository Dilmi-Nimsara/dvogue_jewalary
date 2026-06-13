-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2025 at 04:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `businessregistration`
--

CREATE TABLE `businessregistration` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `Bname` varchar(30) NOT NULL,
  `Bemail` varchar(30) NOT NULL,
  `Bdate` date NOT NULL,
  `Bregid` varchar(15) NOT NULL,
  `Bfile` varchar(255) NOT NULL,
  `Blogo` varchar(255) NOT NULL,
  `approve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businessregistration`
--

INSERT INTO `businessregistration` (`id`, `userid`, `Bname`, `Bemail`, `Bdate`, `Bregid`, `Bfile`, `Blogo`, `approve`) VALUES
(5, 'S2017', 'Zarah', 'zarah@gmail.com', '2025-09-02', 'B5890', 'tvec.pdf', 'twiter.png', 1),
(3, 'S3502', 'Sadew', 'sadew@gmail.com', '2025-09-02', 'B5567', 'example.pdf', 'logo.png', 1),
(6, 'S9130', 'Asha', 'asha@gmail.com', '2025-09-01', 'B2347', 'Doc1.pdf', 'Disability (1).png', 1),
(1, 'S9433', 'Sehen', 'sehen@gmail.com', '2025-09-01', 'B2345', 'cv.pdf', 'CS (2).png', 1),
(4, 'S9900', 'Nimsara', 'nimsara@gmail.com', '2025-08-31', 'B8767', 'StoryBoard.pdf', 'face.png', 1),
(2, 'S9972', 'Amali', 'amali@gmail.com', '2025-09-01', 'B3334', 'Doc1.pdf', 'download (1).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `totalprice` float(20,2) NOT NULL,
  `orderdetail` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`id`, `userid`, `totalprice`, `orderdetail`, `date`) VALUES
(1, 'C7289', 50000.00, 'Gold Bracelet x1', '2025-09-19 21:23:23'),
(9, 'C7289', 45000.00, 'Star Pendant x1', '2025-09-20 16:21:50'),
(10, 'C7289', 45000.00, 'Star Pendant x1', '2025-09-20 16:22:04'),
(11, 'S3502', 45000.00, 'Star Pendant x1', '2025-09-20 17:09:50'),
(12, 'C7289', 500.00, 'Diamond Ring x1', '2025-09-20 18:22:29'),
(13, 'C7289', 45000.00, 'Star Pendant x1', '2025-09-20 18:36:15'),
(14, 'S9972', 80000.00, 'Gold Earring x1', '2025-09-20 19:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `id` int(11) NOT NULL,
  `Orderid` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `PID` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`id`, `Orderid`, `userid`, `PID`, `qty`, `OrderDate`) VALUES
(40, 'O73151', 'C7289', 'P36457', 1, '2025-09-21 14:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `PID` varchar(20) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `Pdesc` varchar(255) NOT NULL,
  `type` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `Unitprice` float(12,2) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `PID`, `userid`, `Pname`, `Pdesc`, `type`, `qty`, `Unitprice`, `date`, `image`) VALUES
(4, 'P10958', 'S9972', 'Diamond Ring', 'This ring is very famous and beautifull.', 'Rings', 47, 500.00, '2025-09-15', 'c3.jpg'),
(8, 'P36457', 'S9900', 'Star Pendant', 'This pendant is very famous and beautifull.', 'Pendant', 44, 45000.00, '2025-09-15', 'c1.jpg'),
(9, 'P52753', 'S3502', 'Gold Bracelet', 'This bracelet is very famous and beautifull.', 'Bracelets', 49, 50000.00, '2025-09-14', 'u1.jpg'),
(12, 'P59536', 'S9972', 'Diamond Necklace', 'This necklace is very famous and beautifull.', 'Necklace', 50, 120000.00, '2025-09-15', 'c4.jpg'),
(6, 'P94877', 'S2017', 'Gold Earring', 'This earring is very famous and beautifull.', 'Earrings', 49, 80000.00, '2025-09-16', 'c2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `approve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `image`, `type`, `approve`) VALUES
(8, 'A8306', 'Ayili', 'ayili@gmail.com', '202cb962ac59075b964b07152d234b70', 'images (3).jpg', 'Admin', 0),
(9, 'A8491', 'Piyumi', 'piyumi@gmail.com', '202cb962ac59075b964b07152d234b70', 'images (1).jpg', 'Admin', 0),
(5, 'C7289', 'Dilmi', 'dilmi@gmail.com', '202cb962ac59075b964b07152d234b70', 'girl.jpg', 'Client', 0),
(6, 'C9123', 'Dilsara', 'dilsara@gmail.com', '202cb962ac59075b964b07152d234b70', 'ai-generated-professional-man-in-suit-standing-confidently-in-office-generative-ai-free-photo.jpg', 'Client', 0),
(10, 'S2017', 'Zarah', 'zarah@gmail.com', '202cb962ac59075b964b07152d234b70', 'images (1).jpg', 'Supplyer', 1),
(13, 'S3502', 'Sadew', 'sadew@gmail.com', '202cb962ac59075b964b07152d234b70', 'images (4).jpg', 'Supplyer', 1),
(14, 'S9130', 'Asha', 'asha@gmail.com', '202cb962ac59075b964b07152d234b70', 'p2.jpg', 'Supplyer', 1),
(7, 'S9433', 'Sehen', 'sehen@gmail.com', '202cb962ac59075b964b07152d234b70', 'ai-generated-a-happy-smiling-professional-man-light-blurry-office-background-closeup-view-photo.jpg', 'Supplyer', 1),
(12, 'S9900', 'Nimsara', 'nimsara@gmail.com', '202cb962ac59075b964b07152d234b70', 'ai-generative-happy-businessman-standing-with-arms-crossed-isolated-on-white-background-free-photo.jpg', 'Supplyer', 1),
(11, 'S9972', 'Amali', 'amali@gmail.com', '202cb962ac59075b964b07152d234b70', 'w.jpg', 'Supplyer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businessregistration`
--
ALTER TABLE `businessregistration`
  ADD PRIMARY KEY (`userid`,`Bregid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`Orderid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`PID`,`userid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businessregistration`
--
ALTER TABLE `businessregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `businessregistration`
--
ALTER TABLE `businessregistration`
  ADD CONSTRAINT `businessregistration_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `orderhistory_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `ordertable_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `production_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
