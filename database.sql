-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2023 at 04:57 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `season_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_fingerprint` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `uid` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_fingerprint`, `user_agent`, `uid`) VALUES
(9, '10z8Q.HGHXiR.', 'Android', '504'),
(8, '15KDW5SO/gSpQ', 'Android', '500'),
(7, '22zv5ABe2d92Y', 'Android', '504'),
(6, '94Pi6vgolBSRE', 'Android', '504'),
(10, '5f5c12db8b7fe74fe74818c9d0cc09d5', 'Android', '504'),
(11, 'b28595a5fc6a6df8551c56e5c196ee33', 'Android', '508'),
(12, '1553ac75329003ee80f2e3af6b3afbf4', 'Android', '511'),
(13, '3882011d3713799b6ae9c0910dbf0a13', 'Android', '525');

-- --------------------------------------------------------

--
-- Table structure for table `user_credintial`
--

CREATE TABLE `user_credintial` (
  `uniq_id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `class` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(63) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `verify_code` varchar(6) NOT NULL,
  `login_block` varchar(10) NOT NULL,
  `reset_block` varchar(10) NOT NULL,
  `point` varchar(10) NOT NULL,
  `device_fingerprint` varchar(100) NOT NULL,
  `login_block_time` varchar(200) NOT NULL,
  `reset_block_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_credintial`
--

INSERT INTO `user_credintial` (`uniq_id`, `fullname`, `photo`, `class`, `email`, `phone`, `password`, `cookie`, `verify_code`, `login_block`, `reset_block`, `point`, `device_fingerprint`, `login_block_time`, `reset_block_time`) VALUES
(527, 'VGVzcg==', '0', '0', '01768015072', '0', 'b71128711b0fa7047b40a23eb1f0bd4c', '62f6ade698b4b5f653893f67e307f6f0', '475914', '0', '1', '0', '', '0', 'N'),
(519, 'U2tka2RrZGs=', '0', '0', '01612386450', '0', 'b5d4a64fdc16efe7394412f09ad33feb', '9c8ccae5ce74221ab393800fccf91e02', '783440', '0', '5', '0', '', '0', '0'),
(526, 'UmFmaWQgQnJv', '0', '0', '01670761398', '0', 'b71128711b0fa7047b40a23eb1f0bd4c', '8092f2dc9decf7963e05ed8492981fce', '145181', '0', '2', '0', '', '0', '2023-03-13 21:02:56'),
(525, 'U2lqZHh1', '0', '0', '01611473920', '0', '96e79218965eb72c92a549dd5a330112', '8e2ec531758627e93e98df1ace4d62f7', 'V', '0', '0', '0', '3882011d3713799b6ae9c0910dbf0a13', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_credintial`
--
ALTER TABLE `user_credintial`
  ADD PRIMARY KEY (`uniq_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_credintial`
--
ALTER TABLE `user_credintial`
  MODIFY `uniq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
