-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 11:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_music_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `anm` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `anm`, `pwd`, `email`) VALUES
(1, 'dhruvi', '321', 'dhruvi@gmail.com'),
(2, 'anjali', '321', 'anjali@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `aid` int(11) NOT NULL,
  `anm` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `pic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`aid`, `anm`, `gender`, `type`, `pic`) VALUES
(1, 'Arijit Singh', 'Male', 'Composer', 'arijitsingh.jpg'),
(2, 'Badshah', 'Male', 'Singer', 'badshah.jpg'),
(3, 'Jeetu Bhowmik', 'Male', 'Writer', 'JeetuBhowmik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mess` varchar(150) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `Name`, `date`, `mess`, `email`) VALUES
(1, 'dhruv', '2023-09-15 00:51:54', 'hello...', 'dhruv@gmail.com'),
(2, 'nency', '2023-09-15 00:52:12', 'welcome...', 'nency@gmail.com'),
(3, 'dixita', '2023-09-16 13:33:23', 'asdef...', 'dixita@gmail.com'),
(4, 'riya', '2023-09-15 00:52:44', 'scsdc...', 'riya@gmail.com'),
(5, 'kavya', '2023-09-16 13:33:50', 'asdf....', 'kavya@gmail.com'),
(6, 'kavya', '2023-09-15 01:40:45', 'asdf.....', 'kavya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `email`, `comment`, `date`) VALUES
(1, 'dhruvi@gmail.com', 'abcd....', '2023-09-02 09:01:27'),
(2, 'dhruvivavadiya2004@gmail.com', 'zsersx', '2023-09-02 09:03:12'),
(3, 'nency@gmail.com', 'wdxwsd....', '2023-09-02 09:42:11'),
(4, 'dhruvivavadiya2004@gmail.com', 'ufvuvjh......', '2023-09-02 09:43:06'),
(5, 'dhruvivavadiya2004@gmail.com', 'rsgfd...', '2023-09-02 09:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `pid` int(11) NOT NULL,
  `pnm` varchar(30) NOT NULL,
  `uid` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`pid`, `pnm`, `uid`, `year`) VALUES
(1, 'mood', 1, '2023'),
(2, 'good1', 2, '2015'),
(3, 'good', 2, '2016'),
(5, 'khu', 4, '2023'),
(7, 'abc', 1, '2020'),
(14, 'khush', 4, '2020'),
(15, 'good2', 2, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_details`
--

CREATE TABLE `playlist_details` (
  `pdid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist_details`
--

INSERT INTO `playlist_details` (`pdid`, `pid`, `sid`) VALUES
(1, 3, 1),
(3, 3, 1),
(14, 5, 2),
(15, 2, 2),
(16, 3, 2),
(18, 5, 2),
(19, 3, 2),
(21, 3, 3),
(23, 3, 5),
(24, 5, 3),
(25, 5, 3),
(26, 15, 2),
(27, 3, 5),
(28, 14, 2),
(29, 15, 4),
(30, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `sid` int(11) NOT NULL,
  `snm` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `lang` varchar(50) NOT NULL,
  `aid` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `song_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`sid`, `snm`, `type`, `lang`, `aid`, `file`, `create_date`, `song_pic`) VALUES
(1, 'Raataan Lambiyan', 'Rock music', 'Hindi', 1, 'music/Raataan Lambiyan.mp3', '2023-09-12 09:18:02', 'shershah.jpg'),
(2, 'LoveNwantiti', 'Hollywood', 'English', 2, 'music/Love_Nvantiti(128k).mp3', '2023-09-12 09:17:56', 'LoveNwantiti.jpg'),
(3, 'Mere Yaaraa', 'Pop', 'Hindi', 1, 'music/Mere Yaaraa.mp3', '2023-09-12 09:17:49', 'MereYaaraa.jpg'),
(4, 'Krishna Flute', 'Bollywood', 'English', 3, 'music/Krishna Flute.mp3', '2023-09-12 09:17:39', 'RadheKrishna.jpg'),
(5, 'Raataan', 'Pop', 'Hindi', 2, 'music/Do_Ghoot.mp3', '2023-09-11 16:20:39', 'Do_Ghoot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `unm` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `mno` varchar(12) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `doj` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `unm`, `email`, `pwd`, `mno`, `gender`, `doj`) VALUES
(1, 'abc', 'abc@gmail.com', 'abc', '7046153202', 'Male', '2023-09-04 03:15:17'),
(2, 'dhruvi', 'dhruvivavadiya@gmail.com', '321', '7046153201', 'Female', '2023-09-23 12:31:47'),
(3, 'abc', 'dhruvivavadiya2004@gmail.com', 'dhruv', '5416345156', 'Male', '2023-09-12 13:35:09'),
(4, 'khushi', 'khushi@gmail.com', '123', '2548785485', 'Female', '2023-09-22 07:52:39'),
(5, 'fced', 'dhruvadiya21@gmil.com', '123', '25465454563', 'Male', '2023-08-31 06:42:57'),
(6, 'cedcd', 'dhruvadiya21@gmil.com', '123', '25465454563', 'Male', '2023-08-31 06:43:04'),
(7, 'dvedr', 'dhruvadiya21@gmil.com', '852', '5416345156', 'Female', '2023-08-31 06:43:11'),
(8, 'javacokie', 'dhruvi@gmail.com', '589', '5463564', 'Male', '2023-08-31 06:38:42'),
(9, 'dhruvivavdiya', 'dhruvivavadiya2004@gmail.com', '123', '7046153202', 'Female', '2023-09-01 06:24:52'),
(10, 'dhruv', 'dhruv201@gmail.com', '987', '546356455', 'Male', '2023-09-01 06:30:24'),
(11, 'dhruv', 'dh@gmail.com', '951', '2546545455', 'Male', '2023-09-22 07:56:14'),
(12, 'javacokie', 'dhruvivavadiya2004@gmail.com', '654', '5416345156', 'Female', '2023-09-01 06:35:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid_fk` (`uid`);

--
-- Indexes for table `playlist_details`
--
ALTER TABLE `playlist_details`
  ADD PRIMARY KEY (`pdid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `playlist_details`
--
ALTER TABLE `playlist_details`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `playlist_details`
--
ALTER TABLE `playlist_details`
  ADD CONSTRAINT `playlist_details_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `song` (`sid`),
  ADD CONSTRAINT `playlist_details_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `playlist` (`pid`);

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `artist` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
