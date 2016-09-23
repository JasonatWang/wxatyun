-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-23 13:46:45
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wxatyun`
--

-- --------------------------------------------------------

--
-- 表的结构 `wxatyun_fileinfo`
--

CREATE TABLE `wxatyun_fileinfo` (
  `fileID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `userDirname` varchar(255) NOT NULL,
  `savePath` varchar(255) NOT NULL,
  `saveName` varchar(255) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `fileSize` double NOT NULL,
  `fileSuffix` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `share` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `wxatyun_user`
--

CREATE TABLE `wxatyun_user` (
  `userID` int(10) NOT NULL,
  `cellphone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `totalRoom` double NOT NULL,
  `createTime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `wxatyun_user`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wxatyun_fileinfo`
--
ALTER TABLE `wxatyun_fileinfo`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `wxatyun_user`
--
ALTER TABLE `wxatyun_user`
  ADD PRIMARY KEY (`userID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `wxatyun_fileinfo`
--
ALTER TABLE `wxatyun_fileinfo`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- 使用表AUTO_INCREMENT `wxatyun_user`
--
ALTER TABLE `wxatyun_user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
