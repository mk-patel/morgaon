-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 02:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morgaon_5443`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(250) NOT NULL,
  `comment` mediumtext NOT NULL,
  `post_id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `date1` varchar(50) NOT NULL,
  `date2` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `village` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(250) NOT NULL,
  `userid` int(250) NOT NULL,
  `postid` int(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `post_id` int(250) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `type` varchar(250) NOT NULL,
  `user_seen` int(250) NOT NULL,
  `date1` varchar(50) NOT NULL,
  `date2` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(10) NOT NULL,
  `post_title` mediumtext NOT NULL,
  `post_data` mediumtext NOT NULL,
  `post_image` varchar(250) NOT NULL,
  `post_village` varchar(250) NOT NULL,
  `post_time` varchar(12) NOT NULL,
  `post_date` varchar(20) NOT NULL,
  `post_views` int(20) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(250) NOT NULL,
  `village` varchar(250) NOT NULL,
  `servtype` varchar(250) NOT NULL,
  `servname` varchar(2500) NOT NULL,
  `ontime` varchar(100) NOT NULL,
  `offtime` varchar(100) NOT NULL,
  `category` varchar(250) NOT NULL,
  `pata` varchar(2000) NOT NULL,
  `facilities` mediumtext NOT NULL,
  `notes` mediumtext NOT NULL,
  `dt2` varchar(100) NOT NULL,
  `user_id` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(10) NOT NULL,
  `shopkipper` varchar(250) NOT NULL,
  `shop_name` mediumtext NOT NULL,
  `shop_category` varchar(250) NOT NULL,
  `shop_details` mediumtext NOT NULL,
  `shop_address` varchar(2000) NOT NULL,
  `shop_village` varchar(250) NOT NULL,
  `shop_mobile` varchar(240) NOT NULL,
  `shop_status` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `shop_image` varchar(250) NOT NULL,
  `shop_views` int(100) NOT NULL,
  `user_id` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_village` varchar(250) NOT NULL,
  `user_about` varchar(200) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_dob` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `vcode` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `profile_views` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `villagedetails`
--

CREATE TABLE `villagedetails` (
  `id` int(250) NOT NULL,
  `sarpanch` varchar(250) NOT NULL,
  `upsarpanch` varchar(100) NOT NULL,
  `sarpanchmob` varchar(250) NOT NULL,
  `ward` varchar(250) NOT NULL,
  `houses` varchar(250) NOT NULL,
  `population` varchar(250) NOT NULL,
  `populationF` varchar(250) NOT NULL,
  `populationM` varchar(250) NOT NULL,
  `waterlevel` varchar(250) NOT NULL,
  `ponds` varchar(250) NOT NULL,
  `samasya` mediumtext NOT NULL,
  `school` varchar(100) NOT NULL,
  `shop` varchar(100) NOT NULL,
  `health` varchar(100) NOT NULL,
  `weather` varchar(100) NOT NULL,
  `jila` varchar(100) NOT NULL,
  `tehsil` varchar(100) NOT NULL,
  `pincode` int(20) NOT NULL,
  `polish` varchar(100) NOT NULL,
  `block` varchar(100) NOT NULL,
  `loksabha` varchar(100) NOT NULL,
  `vidhansabha` varchar(100) NOT NULL,
  `vidhayak` varchar(100) NOT NULL,
  `sansad` varchar(100) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `village` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `villagedetails`
--
ALTER TABLE `villagedetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `villagedetails`
--
ALTER TABLE `villagedetails`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
