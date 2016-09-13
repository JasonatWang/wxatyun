/*
MySQL Backup
Source Server Version: 5.7.11
Source Database: wxatyun
Date: 2016/8/31 10:23:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `wxatyun_fileinfo`
-- ----------------------------
DROP TABLE IF EXISTS `wxatyun_fileinfo`;
CREATE TABLE `wxatyun_fileinfo` (
  `fileID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `userDirname` varchar(255) NOT NULL,
  `savePath` varchar(255) NOT NULL,
  `saveName` varchar(255) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `fileSize` double NOT NULL,
  `fileSuffix` varchar(255) NOT NULL,
  PRIMARY KEY (`fileID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Table structure for `wxatyun_user`
-- ----------------------------
DROP TABLE IF EXISTS `wxatyun_user`;
CREATE TABLE `wxatyun_user` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `cellphone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `totalRoom` double NOT NULL,
  `createTime` datetime NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

