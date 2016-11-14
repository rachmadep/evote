SET FOREIGN_KEY_CHECKS = 0;

-- 
-- Table structure for table `admin` 
-- 

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
`id_admin` int(11) NOT NULL auto_increment,
`username_admin` varchar(255) NOT NULL,
`password_admin` varchar(255) NOT NULL,
`level` enum('admin','superadmin') NOT NULL DEFAULT 'admin',
  PRIMARY KEY  (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5;

-- --------------------------------------------------------

-- 
-- Table structure for table `result` 
-- 

DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
`id_result` int(11) NOT NULL auto_increment,
`userID` int(11) NOT NULL,
`choice` int(11) NOT NULL,
  PRIMARY KEY  (`id_result`)
) ENGINE=InnoDB AUTO_INCREMENT=9;

-- --------------------------------------------------------

-- 
-- Table structure for table `users` 
-- 

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id_user` int(11) NOT NULL auto_increment,
`NIM` varchar(255) NOT NULL,
`name_user` varchar(255) NOT NULL,
`jurusan_user` varchar(255) NOT NULL,
`status` enum('0','1') NOT NULL,
`log_status` enum('0','1') NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

-- --------------------------------------------------------

-- 
-- Table structure for table `users_password` 
-- 

DROP TABLE IF EXISTS `users_password`;
CREATE TABLE `users_password` (
`id_password` int(11) NOT NULL auto_increment,
`user_id` int(11) NOT NULL,
`password_user` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_password`)
) ENGINE=InnoDB AUTO_INCREMENT=20;

-- --------------------------------------------------------

-- 
-- Dumping data for table `admin` 
-- 

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `level`) VALUES ('2','admin','*4ACFE3202A5FF5CF467898FC58AAB1D615029441','admin'),
 ('3','admin2','*0E6FD44C7B722784DAE6E67EF8C06FB1ACB3E0A6','admin'),
 ('4','superadmin','*240107317205B9F031FD583F032790289AE6F185','superadmin');

-- --------------------------------------------------------

-- 
-- Dumping data for table `result` 
-- 

INSERT INTO `result` (`id_result`, `userID`, `choice`) VALUES ('8','1','1');

-- --------------------------------------------------------

-- 
-- Dumping data for table `users` 
-- 

INSERT INTO `users` (`id_user`, `NIM`, `name_user`, `jurusan_user`, `status`, `log_status`) VALUES ('1','38240','felix','TI','1','0'),
 ('2','38244','saf','sipil','0','0');

-- --------------------------------------------------------

-- 
-- Dumping data for table `users_password` 
-- 

INSERT INTO `users_password` (`id_password`, `user_id`, `password_user`) VALUES ('19','1','*FBFDF3204CBAF084C3E475AB33710BA43C3BFD0B');

-- --------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 1;

-- ------------
-- FOREIGN KEYS
-- ------------
SET FOREIGN_KEY_CHECKS = 0;

SET FOREIGN_KEY_CHECKS = 1;

