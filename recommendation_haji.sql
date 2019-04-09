/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.35-MariaDB : Database - db_recommendation_haji
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_recommendation_haji` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_recommendation_haji`;

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_login` */

insert  into `tb_login`(`id`,`username`,`password`,`level`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3',0),
(2,'adi','21232f297a57a5a743894a0e4a801fc3',1);

/*Table structure for table `tb_packet` */

DROP TABLE IF EXISTS `tb_packet`;

CREATE TABLE `tb_packet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_travel` int(11) NOT NULL,
  `packet` varchar(100) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `type` enum('umroh','haji') NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_packet` */

insert  into `tb_packet`(`id`,`id_travel`,`packet`,`date_start`,`date_end`,`type`,`price`,`description`) values 
(1,1,'haji','2019-03-01 14:50:04','2019-03-31 14:50:10','haji',5000,'');

/*Table structure for table `tb_travel` */

DROP TABLE IF EXISTS `tb_travel`;

CREATE TABLE `tb_travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_travel` */

insert  into `tb_travel`(`id`,`travel`,`address`,`telp`,`email`,`description`,`logo`) values 
(1,'haji travel','bali\r\n','123','haji@gmail.com','haji\r\n','http://192.168.100.5/github/recommendation_haji_service/thumbnail/dromedary.png');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`name`,`address`,`telp`,`email`,`image`) values 
(16,'adi','bali','123','adi@gmail.com','');

/*Table structure for table `tb_user_booking` */

DROP TABLE IF EXISTS `tb_user_booking`;

CREATE TABLE `tb_user_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_packet` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user_booking` */

insert  into `tb_user_booking`(`id`,`id_user_packet`,`name`,`address`,`telp`,`email`,`image`) values 
(47,0,'d','e','2','f','http://192.168.100.4/github/recommendation_haji_service/assets/images/img47.png'),
(48,0,'d','e','2','f','http://192.168.100.4/github/recommendation_haji_service/assets/images/img48.png'),
(49,0,'w','q','3','t','http://192.168.100.8/github/recommendation_haji_service/assets/images/img49.png'),
(50,0,'w','q','3','t','http://192.168.100.8/github/recommendation_haji_service/assets/images/img50.png'),
(51,0,'w','q','3','t','http://192.168.100.8/github/recommendation_haji_service/assets/images/img51.png'),
(52,0,'w','q','3','t','http://192.168.100.8/github/recommendation_haji_service/assets/images/img52.png'),
(53,0,'w','q','3','t','http://192.168.100.8/github/recommendation_haji_service/assets/images/img53.png'),
(54,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img54.png'),
(55,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img55.png'),
(56,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img56.png'),
(57,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img57.png'),
(58,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img58.png'),
(59,0,'','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img59.png'),
(60,0,'','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img60.png'),
(61,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img61.png'),
(62,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img62.png'),
(63,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img63.png'),
(64,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img64.png'),
(65,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img65.png'),
(66,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img66.png'),
(67,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img67.png'),
(68,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img68.png'),
(69,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img69.png'),
(70,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img70.png'),
(71,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img71.png'),
(72,0,'q','w','2','r','http://192.168.100.8/github/recommendation_haji_service/assets/images/img72.png');

/*Table structure for table `tb_user_packet` */

DROP TABLE IF EXISTS `tb_user_packet`;

CREATE TABLE `tb_user_packet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_packet` int(11) NOT NULL,
  `description` text NOT NULL,
  `status_book` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user_packet` */

insert  into `tb_user_packet`(`id`,`id_user`,`id_packet`,`description`,`status_book`) values 
(1,2,1,'',1),
(21,2,1,'',1),
(22,2,1,'',1),
(23,2,1,'',1),
(24,2,1,'',1),
(25,2,1,'',1),
(26,2,1,'',1),
(27,2,1,'',1),
(28,2,1,'',1),
(29,2,1,'',1),
(30,2,1,'',1),
(31,2,1,'',1),
(32,2,1,'',1),
(33,2,1,'',1),
(34,2,1,'',1),
(35,2,1,'',1),
(36,2,1,'',1),
(37,2,1,'',1),
(38,2,1,'',1),
(39,2,1,'',1),
(40,2,1,'',1),
(41,2,1,'',1),
(42,2,1,'',1),
(43,2,1,'',1),
(44,2,1,'',1),
(45,2,1,'',1),
(46,2,1,'',1),
(47,2,1,'',1),
(48,2,1,'',1),
(49,2,1,'',1),
(50,2,1,'',1),
(51,2,1,'',1),
(52,2,1,'',1),
(53,2,1,'',1),
(54,2,1,'',1),
(55,2,1,'',1),
(56,2,1,'',1),
(57,2,1,'',1),
(58,2,1,'',1),
(59,2,1,'',1),
(60,2,1,'',1),
(61,2,1,'',1),
(62,2,1,'',1),
(63,2,1,'',1),
(64,2,1,'',1),
(65,2,1,'',1),
(66,2,1,'',1),
(67,2,1,'',1),
(68,2,1,'',1),
(69,2,1,'',1),
(70,2,1,'',1),
(71,2,1,'',1),
(72,2,1,'',1),
(73,2,1,'',1),
(74,2,1,'',1),
(75,2,1,'',1),
(76,2,1,'',1),
(77,2,1,'',1),
(78,2,1,'',1),
(79,2,1,'',1),
(80,2,1,'',1),
(81,2,1,'',1),
(82,2,1,'',1),
(83,2,1,'',1),
(84,2,1,'',1),
(85,2,1,'',1),
(86,2,1,'',1),
(87,2,1,'',1),
(88,2,1,'',1),
(89,2,1,'',1),
(90,2,1,'',1),
(91,2,1,'',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
