/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 10.1.32-MariaDB : Database - ptctouri_heyrehber
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ptctouri_heyrehber` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ptctouri_heyrehber`;

/*Table structure for table `agencies` */

DROP TABLE IF EXISTS `agencies`;

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `sirname` varchar(64) DEFAULT NULL,
  `username` varchar(64) NOT NULL,
  `address` varchar(64) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL,
  `agency_name` varchar(64) NOT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `certificate_number` varchar(64) DEFAULT NULL,
  `company_address` varchar(128) DEFAULT NULL,
  `company_phone` varchar(64) DEFAULT NULL,
  `company_web` varchar(64) DEFAULT NULL,
  `company_district` varchar(64) DEFAULT NULL,
  `company_city` varchar(64) DEFAULT NULL,
  `company_email` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `city` varchar(64) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `group` varchar(64) DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `certificate` varchar(128) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `confirm_key` varchar(64) NOT NULL,
  `facebook` varchar(64) DEFAULT NULL,
  `instagram` varchar(64) DEFAULT NULL,
  `twitter` varchar(64) DEFAULT NULL,
  `linkedin` varchar(64) DEFAULT NULL,
  `google` varchar(64) DEFAULT NULL,
  `youtube` varchar(64) DEFAULT NULL,
  `pinterest` varchar(64) DEFAULT NULL,
  `tumblr` varchar(64) DEFAULT NULL,
  `flickr` varchar(64) DEFAULT NULL,
  `snapchat` varchar(64) DEFAULT NULL,
  `whatsapp` varchar(64) DEFAULT NULL,
  `viber` varchar(64) DEFAULT NULL,
  `skype` varchar(64) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `agencies` */

insert  into `agencies`(`id`,`name`,`sirname`,`username`,`address`,`mobile`,`agency_name`,`company_name`,`certificate_number`,`company_address`,`company_phone`,`company_web`,`company_district`,`company_city`,`company_email`,`email`,`city`,`district`,`group`,`photo`,`certificate`,`password`,`confirm_key`,`facebook`,`instagram`,`twitter`,`linkedin`,`google`,`youtube`,`pinterest`,`tumblr`,`flickr`,`snapchat`,`whatsapp`,`viber`,`skype`,`status`,`created_date`) values 
(2,'qqq','ttt','qqqttt','','','qtqtqt','qqqttt','123123123','qqqttt','123123','','2','26','qt@qt.com','qt@qt.com','25','1','A','uploads/agency/photo/Wendy1.png','uploads/agency/certificate/httpd-vhosts.conf','3a7f03944c6592d32bb81223fe8dea89','','','','','','','','','','','','','','','active','2018-11-30 14:38:27'),
(3,'www','www','www',NULL,NULL,'www','www','234234234','www','123123',NULL,'2','26','w@w.com','w@w.com','26','2','B',NULL,'uploads/agency/certificate/Wendy.jpg','d41d8cd98f00b204e9800998ecf8427e','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2018-11-30 14:38:43'),
(9,'rrr','rrr','rrr',NULL,NULL,'rrr','rrr','345345345','rrrrrrrr','123123',NULL,'4','21','r@r.com','r@r.com','21','4','B',NULL,'uploads/agency/certificate/download (1).jpg','d41d8cd98f00b204e9800998ecf8427e','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2018-11-30 14:38:56'),
(15,'ETETET','ETETET','etetet','et\'s address','237623723','etetet','etetet','456456456','etetetetet','235231238985','et\'s web','5','24','et@et.com','etet@etet.com','22','5','B','uploads/agency/photo/2256381-white-lion-wallpaper.jpg','uploads/agency/certificate/images.jpg','7adc5a360adabf8b043f13ebde886fdc','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2018-11-30 14:39:07'),
(16,'new','agency','new agency','','','new agency','New Agency','567567567','company address','3242342','','1','22','agencynew@gmail.com','agencynew@gmail.com','24','1','C','uploads/agency/photolion-mane-big-cat-look-wallpaper.jpg','uploads/agency/certificateimages (1).png','d41d8cd98f00b204e9800998ecf8427e','','','','','','','','','','','','','','','active','2018-11-30 14:39:20'),
(17,'agency','1','agency1',NULL,NULL,'agency1','agency1','1414252536245','agency address1','124525123',NULL,'4','23','agency1@gmail.com','agency1@gmail.com','23','4','A',NULL,'uploads/agency/certificate/images (2).png','d41d8cd98f00b204e9800998ecf8427e','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'deactive','2018-11-30 13:16:33'),
(18,'agency','2','agency2',NULL,NULL,'agency2','agency2 name','23512432635','agency2 address','123523534625',NULL,'3','22','agency2@gmail.com','agency2@gmail.com','22','3','B',NULL,'uploads/agency/certificate/images (17).jpg','d41d8cd98f00b204e9800998ecf8427e','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'deactive','2018-11-30 14:40:14'),
(19,'agency','3','agency3','address','3473456345','agency3','agency3 name','87485456346','agency3 address','213502342235','company web','5','22','agency3@gmail.com','agency3@gmail.com','22','5','C','uploads/agency/photo/Tink & Peter.jpg','uploads/agency/certificate/images (12).jpg','499daf87885cad3bf4b4aa5b9995988c','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2018-12-07 07:39:16'),
(32,'yuri','yezhov','yuri','addresssssssssssssssssssssss','111111111111111111111','yuri\'s company','YURI','87485456346','yuri\'s company address','19024109205838','yuri\'s web','4','18','yuri@agency.com','peterpan120@yandex.com','30','3','C','uploads/agency/photo/5bb9d4a8a3278ava-600x600.jpg','uploads/agency/certificate/Beautiful_White_Tiger_Wallpaper.jpg','9491876179d7a80bb5c86f15dbe31422','6877d61ccea3f0bc96e4cdd2ce093fe3','','','','','','','','','','','','','live:peterpan120_3','active','2018-12-09 07:49:09'),
(33,'mihail','mihailovic','misha','address','1234567890','misha\'s agency','MISHA','1234567890','misha\'s company address','1234567890','misha\'s company web','2','18','misha@agency.com','mihail120@yandex.com','18','2','A','uploads/agency/photo/lion_mane_predator_125068_300x168.jpg','uploads/agency/certificate/sleeping-lion-background_wallcg.jpg','383d802a4c84af5ac3719276218bb918','e16f4d7f595bfae766b165cd56d7a28b','','','','','','','','','','','','','live:peterpan120_3','deactive','2018-12-12 17:59:22');

/*Table structure for table `agency_favourite_guides` */

DROP TABLE IF EXISTS `agency_favourite_guides`;

CREATE TABLE `agency_favourite_guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency` int(11) NOT NULL,
  `favourite_guide` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `agency_favourite_guides` */

insert  into `agency_favourite_guides`(`id`,`agency`,`favourite_guide`) values 
(1,32,43),
(2,32,42);

/*Table structure for table `agency_non_favourite_guides` */

DROP TABLE IF EXISTS `agency_non_favourite_guides`;

CREATE TABLE `agency_non_favourite_guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency` int(11) NOT NULL,
  `non_favourite_guide` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `agency_non_favourite_guides` */

insert  into `agency_non_favourite_guides`(`id`,`agency`,`non_favourite_guide`) values 
(1,33,17),
(2,32,46),
(3,32,45),
(4,32,12),
(5,32,13);

/*Table structure for table `agency_reviews` */

DROP TABLE IF EXISTS `agency_reviews`;

CREATE TABLE `agency_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency` varchar(64) NOT NULL,
  `guide` varchar(64) NOT NULL,
  `review` varbinary(512) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `submission_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `agency_reviews` */

insert  into `agency_reviews`(`id`,`agency`,`guide`,`review`,`rating`,`status`,`submission_date`) values 
(1,'32','17','rrrrrrrrrrrrrrrrrrxxxxxxxxxxxxxxxxxfffffff',4,'deactive','2018-12-09 04:57:01'),
(3,'3','42','eteteteteteteteggggggggggggggggg',5,'deactive','2018-11-16 08:54:30'),
(4,'2','42','zzzzzzzzzzzzzzzzzzwwwqqqqqqqqqttttttt',3,'active','2018-12-09 05:04:44'),
(5,'32','42','etetetetetetetzzzzzzzzzzzzzzzzzzzzz',4,'active','2018-12-09 05:04:35'),
(6,'15','42','etetetetetetetyuriyuriyuriryuriryuri',5,'active','2018-12-09 05:08:35');

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `announcements` */

insert  into `announcements`(`id`,`category`,`subject`,`description`) values 
(1,'[\"subject1\",\"subject6\",\"subject3\"]','subject2','<h1 style=\"text-align: center;\"><em><span style=\"text-decoration: underline;\"><span style=\"text-decoration: line-through;\">This is subject2</span></span></em></h1>'),
(2,'[\"subject4\",\"subject5\"]','subject1','<p style=\"text-align: right;\"><span style=\"text-decoration: underline;\"><em>This is description of subject1</em></span></p>');

/*Table structure for table `attachments` */

DROP TABLE IF EXISTS `attachments`;

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(64) NOT NULL,
  `from` varchar(64) NOT NULL,
  `role` int(11) NOT NULL,
  `file` varchar(128) NOT NULL,
  `submission_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `attachments` */

insert  into `attachments`(`id`,`ticket_id`,`from`,`role`,`file`,`submission_date`) values 
(42,'9310a5b85129f88ab913698d49a0d56b','107',4,'uploads/attachments/A - HEY  PROJES?.docx','2018-12-18 09:35:53'),
(43,'9310a5b85129f88ab913698d49a0d56b','107',4,'uploads/attachments/ajax table design.txt','2018-12-18 09:35:54'),
(44,'9310a5b85129f88ab913698d49a0d56b','107',4,'uploads/attachments/ANG_home_page.jpg','2018-12-18 09:35:54'),
(48,'03930c997ae57e945bdb6ebc583ae268','107',4,'uploads/attachments/Demo - 1 (1).jpg','2018-12-18 09:37:27'),
(49,'03930c997ae57e945bdb6ebc583ae268','107',4,'uploads/attachments/Capture.PNG','2018-12-18 09:37:27'),
(50,'03930c997ae57e945bdb6ebc583ae268','107',4,'uploads/attachments/HEYREHBER REV4.docx','2018-12-18 09:37:27'),
(51,'1abbaf700c5fe08a24b2d8fac9d8340c','107',4,'uploads/attachments/Landingpage-wireframe.png','2018-12-18 09:37:55'),
(52,'1abbaf700c5fe08a24b2d8fac9d8340c','107',4,'uploads/attachments/SGIM Produktkonfigurtor V1.pdf','2018-12-18 09:37:55'),
(53,'58ffb8ebf1687850069e6059d25314f9','106',3,'uploads/attachments/images (2).jpg','2018-12-18 09:38:50'),
(54,'8cee0fa45d17aa94a550661022a6fa70','106',3,'uploads/attachments/Default.rdp','2018-12-18 09:39:11'),
(55,'77791a643f3d490b56af9ca7c8aec749','106',3,'uploads/attachments/images (1).jpg','2018-12-18 11:42:41'),
(56,'77791a643f3d490b56af9ca7c8aec749','106',3,'uploads/attachments/images (2).png','2018-12-18 11:42:41'),
(57,'6a28e382b069372de05227d230ab1109','61',4,'uploads/attachments/ajax table design.txt','2018-12-18 02:41:58');

/*Table structure for table `calendar` */

DROP TABLE IF EXISTS `calendar`;

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `requester` varchar(64) NOT NULL,
  `tour_type` varchar(64) DEFAULT NULL,
  `days` varchar(64) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `finish_time` time DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `activity_color` varchar(64) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

/*Data for the table `calendar` */

insert  into `calendar`(`id`,`title`,`requester`,`tour_type`,`days`,`start_date`,`finish_date`,`event_date`,`start_time`,`finish_time`,`location`,`description`,`activity_color`,`status`,`created_date`) values 
(13,'event6','33','4','Several Days','2018-11-07','2018-11-14','2018-11-08','15:33:00','21:08:00','location6','description of event6','#27AE60',NULL,'2018-11-24 00:00:00'),
(14,'event6','33','4','Several Days','2018-11-07','2018-11-14','2018-11-09','15:33:00','21:08:00','location6','description of event6','#27AE60',NULL,'2018-11-24 00:00:00'),
(15,'event6','33','4','Several Days','2018-11-07','2018-11-14','2018-11-10','15:33:00','21:08:00','location6','description of event6','#27AE60',NULL,'2018-11-24 00:00:00'),
(16,'event6','33','4','Several Days','2018-11-07','2018-11-14','2018-11-11','15:33:00','21:08:00','location6','description of event6','#27AE60',NULL,'2018-11-24 00:00:00'),
(17,'event6','33','4','Several Days','2018-11-07','2018-11-14','2018-11-12','15:33:00','21:08:00','location6','description of event6','#27AE60',NULL,'2018-11-24 00:00:00'),
(19,'event6','33','4','Several Days','2018-11-07','2018-11-14','2018-11-14','15:33:00','21:08:00','location6','description of event6','#27AE60',NULL,'2018-11-24 00:00:00'),
(20,'event1','32','1','One Day','2018-11-12','2018-11-12','2018-11-12','11:11:00','14:22:00','location1','description of event1','#3498DB',NULL,'2018-11-24 00:00:00'),
(21,'event2','32','1','One Day','2018-11-24','2018-11-24','2018-11-24','11:11:00','18:06:00','location2','description of event2','#3498DB',NULL,'2018-11-24 00:00:00'),
(22,'event3','13','4','Several Days','2018-11-10','2018-12-12','2018-11-10','18:03:00','20:02:00','location3','description of event3','#F1C40F',NULL,'2018-11-24 00:00:00'),
(23,'event3','13','4','Several Days','2018-11-11','2018-12-12','2018-11-11','18:03:00','20:02:00','location3','description of event3','#F1C40F',NULL,'2018-11-24 00:00:00'),
(24,'event3','13','4','Several Days','2018-11-12','2018-12-12','2018-11-12','18:03:00','20:02:00','location3','description of event3','#F1C40F',NULL,'2018-11-24 00:00:00'),
(25,'my event1','32','2','Several Days','2018-11-07','2018-11-09','2018-11-07','09:22:00','17:33:00','my location1','description of my event1','#F39C12',NULL,'2018-11-24 00:00:00'),
(27,'my event','32','2','Several Days','2018-11-07','2018-11-09','2018-11-09','10:22:00','15:33:00','my location','description of my event','#C0392B',NULL,'2018-11-24 00:00:00'),
(28,'my event2','32','2','One Day','2018-11-25','2018-11-25','2018-11-25','00:00:00','12:00:00','my location2','description of event2','#27AE60',NULL,'2018-11-24 00:00:00'),
(29,'event4','32','1','One Day','2018-11-26','2018-11-26','2018-11-26','08:00:00','17:00:00','location5','this is edited description of event4','#C0392B',NULL,'2018-11-25 05:20:50'),
(30,'event8','32','2','Several Days','2018-11-27','2018-12-01','2018-11-27','09:00:00','14:00:00','location5','description of event8','#95A5A6',NULL,'2018-11-26 10:17:35'),
(31,'event8','32','2','Several Days','2018-11-27','2018-12-01','2018-11-28','09:00:00','14:00:00','location5','description of event8','#95A5A6',NULL,'2018-11-26 10:17:35'),
(32,'event8','32','1','Several Days','2018-11-27','2018-12-01','2018-11-29','11:30:00','14:00:00','location4','description of event8','#2980B9',NULL,'2018-11-26 10:19:43'),
(33,'event8','32','2','Several Days','2018-11-27','2018-12-01','2018-11-30','09:00:00','14:00:00','location5','description of event8','#95A5A6',NULL,'2018-11-26 10:17:35'),
(34,'event8','32','2','Several Days','2018-11-27','2018-12-01','2018-12-01','09:00:00','14:00:00','location5','description of event8','#95A5A6',NULL,'2018-11-26 10:17:35'),
(42,'event7','19','2','One Day','2018-11-30','2018-11-30','2018-11-30','11:11:00','15:33:00','location1','description of event7','#8E44AD',NULL,'2018-11-27 01:09:16'),
(45,'event5','13','4','Several Days','2018-11-29','2018-12-02','2018-11-29','11:11:00','16:44:00','location5','description of event5','#C0392B',NULL,'2018-11-28 02:03:07'),
(46,'event5','13','4','Several Days','2018-11-29','2018-12-02','2018-11-30','11:11:00','16:44:00','location5','description of event5','#C0392B',NULL,'2018-11-28 02:03:07'),
(47,'event5','13','4','Several Days','2018-11-29','2018-12-02','2018-12-01','11:11:00','16:44:00','location5','description of event5','#C0392B',NULL,'2018-11-28 02:03:07'),
(48,'event5','13','4','Several Days','2018-11-29','2018-12-02','2018-12-02','11:11:00','16:44:00','location5','description of event5','#C0392B',NULL,'2018-11-28 02:03:07'),
(49,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-21','11:11:00','16:55:00','location4','this is peterpan\'s event','#F39C12',NULL,'2018-12-13 12:55:40'),
(50,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-22','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(51,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-23','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(52,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-24','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(53,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-25','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(54,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-26','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(55,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-27','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(56,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-28','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(57,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-29','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(58,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-30','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(59,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2018-12-31','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(60,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-01','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(61,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-02','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(62,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-03','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(63,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-04','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(64,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-05','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(65,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-06','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(66,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-07','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(67,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-08','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(68,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-09','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(69,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-10','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(70,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-11','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(71,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-12','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(72,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-13','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(73,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-14','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(74,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-15','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(75,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-16','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(76,'peterpan\'s event','42','2','Several Days','2018-12-21','2019-01-17','2019-01-17','11:11:00','16:55:00','location4','this is peterpan\'s event','#8E44AD',NULL,'2018-12-13 12:55:40'),
(78,'deneme','42','1','Several Days','2018-12-14','2018-12-20','2018-12-14','09:00:00','17:00:00','istanbul','denemeneeeee','#34495E',NULL,'2018-12-13 02:37:05'),
(79,'deneme','42','1','Several Days','2018-12-14','2018-12-20','2018-12-15','09:00:00','17:00:00','istanbul','denemeneeeee','#27AE60',NULL,'2018-12-13 02:37:05'),
(80,'deneme','42','1','Several Days','2018-12-14','2018-12-20','2018-12-16','09:00:00','17:00:00','istanbul','denemeneeeee','#27AE60',NULL,'2018-12-13 02:37:05'),
(81,'deneme','42','1','Several Days','2018-12-14','2018-12-20','2018-12-17','09:00:00','17:00:00','istanbul','denemeneeeee','#27AE60',NULL,'2018-12-13 02:37:05'),
(82,'deneme','42','1','Several Days','2018-12-14','2018-12-20','2018-12-18','09:00:00','17:00:00','istanbul','denemeneeeee','#27AE60',NULL,'2018-12-13 02:37:05'),
(83,'deneme','42','1','Several Days','2018-12-14','2018-12-20','2018-12-19','09:00:00','17:00:00','istanbul','denemeneeeee','#27AE60',NULL,'2018-12-13 02:37:05'),
(84,'deneme','42','1','Several Days','2018-12-14','2018-12-20','2018-12-20','09:00:00','17:00:00','istanbul','denemeneeeee','#27AE60',NULL,'2018-12-13 02:37:05'),
(85,'urgent','42','1','One Day','2018-12-14','2018-12-14','2018-12-14','11:11:00','16:44:00','istanbul','this is urgent event','#F1C40F',NULL,'2018-12-13 03:32:15');

/*Table structure for table `calendar_settings` */

DROP TABLE IF EXISTS `calendar_settings`;

CREATE TABLE `calendar_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guide` int(11) NOT NULL,
  `which_agency` varchar(64) DEFAULT NULL,
  `which_guide` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `calendar_settings` */

insert  into `calendar_settings`(`id`,`guide`,`which_agency`,`which_guide`) values 
(1,42,'All Agencies','Do not show');

/*Table structure for table `chambers` */

DROP TABLE IF EXISTS `chambers`;

CREATE TABLE `chambers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chamber` varchar(64) CHARACTER SET latin1 NOT NULL,
  `chamber_short` varchar(64) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `chambers` */

insert  into `chambers`(`id`,`chamber`,`chamber_short`) values 
(4,'Adana Bölgesel Turist Rehberleri Odas?','ADRO'),
(5,'Adana Bölgesel Turist Rehberleri Odas?','ADRO'),
(6,'Adana Bölgesel Turist Rehberleri Odas?','ADRO'),
(7,'Adana Bölgesel Turist Rehberleri Odas?','ADRO'),
(8,'Adana Bölgesel Turist Rehberleri Odas?','ADRO'),
(9,'Ankara Turist Rehberleri Odas?','ANRO');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(64) NOT NULL,
  `city_code` varchar(64) DEFAULT NULL,
  `country` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `cities` */

insert  into `cities`(`id`,`city`,`city_code`,`country`) values 
(18,'Beijing','BJ','China'),
(19,'asdfasdf','a','q'),
(20,'sdrs','b','e'),
(21,'d','c','q'),
(22,'sdfs','v','w'),
(23,'sdtwet','b','r'),
(24,'sdsq','h','w'),
(25,'sssssssssssss','s','Singapore'),
(26,'s','d','w'),
(27,'sedtweyw','a','w'),
(28,'sdyfh','v','r'),
(29,'sdfty','d','e'),
(30,'fhhery','a','e'),
(31,'tyityu','v','r'),
(32,'yuiyuir','a','d'),
(33,'ruyartua','g','s'),
(35,'astwet','a','i'),
(36,'wettywe','b','j'),
(37,'dfhrtru','c','k'),
(38,'weruyfw','d','l'),
(39,'wertwrrtjtj','e','m'),
(40,'weryuyjhfv','f','b'),
(41,'dfhrtur','g','o'),
(42,'uyiouyiry','t','p'),
(43,'yuiohty','u','q');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

/*Data for the table `countries` */

insert  into `countries`(`id`,`country`) values 
(1,'Russia'),
(2,'Singapore'),
(15,'Spain'),
(16,'Brazil'),
(17,'Ecuador'),
(18,'Angola'),
(19,'Bulgaria'),
(20,'Argentina'),
(21,'Belgium'),
(22,'Chile'),
(24,'Iran, Islamic Republic Of'),
(25,'United Arab Emirates'),
(26,'Japan'),
(27,'Viet Nam'),
(28,'Russian Federation'),
(29,'Thailand'),
(30,'Bangladesh'),
(31,'United State'),
(32,'New Zealand'),
(33,'Venezuela'),
(34,'Senegal');

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `departments` */

insert  into `departments`(`id`,`department`) values 
(1,'department1'),
(2,'department2'),
(3,'department3'),
(4,'department4'),
(5,'department6');

/*Table structure for table `districts` */

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `districts` */

insert  into `districts`(`id`,`district`) values 
(1,'district1'),
(2,'district2'),
(3,'district3'),
(4,'district4'),
(5,'district5');

/*Table structure for table `editors` */

DROP TABLE IF EXISTS `editors`;

CREATE TABLE `editors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `sirname` varchar(64) NOT NULL,
  `supervisor` varchar(64) DEFAULT NULL,
  `department` varchar(512) DEFAULT NULL,
  `number` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `certificate` varchar(64) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `editors` */

insert  into `editors`(`id`,`name`,`sirname`,`supervisor`,`department`,`number`,`email`,`certificate`,`password`,`created_date`) values 
(1,'editor','user1','super visor3','[\"department2\"]','262342342','editor1@gmail.com','uploads/editor/images (11).jpg','c9330587565205a5b8345f60c620ecc6','2018-11-17 10:49:25'),
(2,'editor','user2','super visor4','[\"department2\",\"department4\"]','235','editor2@gmail.com','uploads/editor/little Peterpan.jpg','d41d8cd98f00b204e9800998ecf8427e','2018-11-17 10:58:04');

/*Table structure for table `guide_calendar_availabilities` */

DROP TABLE IF EXISTS `guide_calendar_availabilities`;

CREATE TABLE `guide_calendar_availabilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guide` int(11) NOT NULL,
  `days` varchar(64) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `guide_calendar_availabilities` */

insert  into `guide_calendar_availabilities`(`id`,`guide`,`days`,`from`,`to`) values 
(1,42,'Several Days','2018-12-15','2018-12-19'),
(2,42,'Several Days','2018-12-31','2019-01-03');

/*Table structure for table `guide_calendar_unavailabilities` */

DROP TABLE IF EXISTS `guide_calendar_unavailabilities`;

CREATE TABLE `guide_calendar_unavailabilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guide` int(11) NOT NULL,
  `days` varchar(64) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `guide_calendar_unavailabilities` */

insert  into `guide_calendar_unavailabilities`(`id`,`guide`,`days`,`from`,`to`) values 
(1,42,'Several Days','2018-12-20','2018-12-28'),
(2,42,'One Day','2018-12-31','2018-12-31');

/*Table structure for table `guide_favourite_agencies` */

DROP TABLE IF EXISTS `guide_favourite_agencies`;

CREATE TABLE `guide_favourite_agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guide` int(11) NOT NULL,
  `favourite_agency` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `guide_favourite_agencies` */

insert  into `guide_favourite_agencies`(`id`,`guide`,`favourite_agency`) values 
(1,42,17),
(3,42,32),
(5,42,33);

/*Table structure for table `guide_non_favourite_agencies` */

DROP TABLE IF EXISTS `guide_non_favourite_agencies`;

CREATE TABLE `guide_non_favourite_agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guide` int(11) NOT NULL,
  `non_favourite_agency` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `guide_non_favourite_agencies` */

insert  into `guide_non_favourite_agencies`(`id`,`guide`,`non_favourite_agency`) values 
(2,42,18);

/*Table structure for table `guide_requests` */

DROP TABLE IF EXISTS `guide_requests`;

CREATE TABLE `guide_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `requester` varchar(64) NOT NULL,
  `range` varchar(64) NOT NULL,
  `regions` varchar(512) DEFAULT NULL,
  `route` varchar(64) DEFAULT NULL,
  `tour_type` varchar(64) DEFAULT NULL,
  `guest_nationality` varchar(64) DEFAULT NULL,
  `requested_language` varchar(64) DEFAULT NULL,
  `guide_number` int(11) DEFAULT NULL,
  `guest_number` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `start_location` varchar(64) DEFAULT NULL,
  `finish_location` varchar(64) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `guide_requests` */

insert  into `guide_requests`(`id`,`title`,`requester`,`range`,`regions`,`route`,`tour_type`,`guest_nationality`,`requested_language`,`guide_number`,`guest_number`,`start_date`,`finish_date`,`start_location`,`finish_location`,`description`,`created_date`) values 
(4,'guide request','1','Domestic','[\"Aegean\",\"Black Sea\"]','route1-route2-route3','3','Russian','Russian',4,7,'0111-11-11','2222-02-22','start location','finish location','this is description','2018-11-21 05:41:37'),
(5,'guide request1','70','Overseas','[\"Black Sea\",\"Mediterrianean\"]','route1-route2-route3','4','Chinese','Chinese',4,7,'1111-11-11','2222-02-22','start location','finish location','this is description1','2018-11-22 05:38:37'),
(6,'guide request2','70','Domestic','[\"Aegean\",\"Marmara\"]','route1-route2-route3-route4-route5','3','Japanese','Japanese',4,12,'1111-11-11','2222-02-22','start location1','finish location1','  this is description1','2018-11-22 10:09:37'),
(7,'new request3','27','Domestic','[\"Black Sea\",\"Mediterrianean\",\"Marmara\",\"Eastern Anatolia\"]','route9-route11','1','US','English',11,4,'0111-11-11','3331-02-17','start location4','finish location5','this is description3','2018-11-22 09:14:45'),
(8,'request1','48','Domestic','[\"Aegean\",\"Marmara\"]','route9-route11','2','Japanese','Japanese',4,6,'2018-11-26','2018-11-28','start location1','finish location5',' this is description6','2018-11-27 12:53:27'),
(9,'request2','48','Overseas','[\"Aegean\",\"Eastern Anatolia\",\"Mediterrianean\",\"Black Sea\"]','route9-route11-route3','4','US','English',5,2,'2012-03-31','2012-04-02','start location1','finish location1',' this is description7','2018-11-22 01:23:45'),
(10,'request3','48','Domestic','[\"Aegean\",\"Marmara\",\"South-Eastern Anatolia\",\"Mediterrianean\",\"Marmara\"]','route1-route3-route3','2','Russian','Russian',2,7,'0011-11-11','2222-02-22','start location4','finish location5','This is description8','2018-11-22 01:25:08'),
(11,'abcd request','61','Domestic','[\"Black Sea\",\"Aegean\",\"Central Anatolia\"]','route9-route11-route3','4','Japanese','Japanese',4,22,'2018-11-06','2018-11-09','start location4','finish location5',' abcd description','2018-11-26 01:00:19'),
(12,'reqest5','61','Domestic','[\"Aegean\",\"Mediterrianean\",\"Eastern Anatolia\",\"Marmara\"]','route1-route2-route5','3','Russian','Russian',2,14,'2018-11-29','2018-11-29','start location','finish location','description of request5','2018-11-28 12:48:01'),
(14,'et request','70','Domestic','[\"Black Sea\",\"Marmara\"]','route9-route11','4','Japanese','Japanese',2,7,'2018-12-19','2018-12-27','start location1','finish location5','asdfasdfasdf','2018-12-10 03:08:44'),
(15,'request4','107','Domestic','[\"Aegean\",\"Eastern Anatolia\",\"Mediterrianean\",\"Black Sea\"]','route1-route4-route7','2','Italy','Italian',2,20,'2019-01-16','2019-01-19','loc1','loc8','this is description of request4','2019-01-02 06:33:42');

/*Table structure for table `guide_reviews` */

DROP TABLE IF EXISTS `guide_reviews`;

CREATE TABLE `guide_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guide` varchar(64) NOT NULL,
  `agency` varchar(64) NOT NULL,
  `review` varchar(256) NOT NULL,
  `rating` float NOT NULL,
  `status` varchar(64) DEFAULT NULL,
  `submission_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `guide_reviews` */

insert  into `guide_reviews`(`id`,`guide`,`agency`,`review`,`rating`,`status`,`submission_date`) values 
(1,'12','15','asdfasdfasdf',4,'deactive','2018-11-16 08:46:55'),
(2,'13','3','asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfa',5,'deactive','2018-11-15 09:52:25'),
(3,'15','32','bbbbbbbbbbbbbbb',5,'deactive','2018-11-15 06:25:15'),
(4,'16','32','eettttttttttttttttttttttttttttttttttteeeeeeeeee',4,'active','2018-12-09 06:42:17'),
(6,'42','2','gggggggggggggttttttttttttttttttaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',2,'active','2018-11-16 08:46:46'),
(7,'18','9','asdfasdfasdfasdfasdf',4,'active','2018-11-18 05:22:04'),
(8,'36','19','bbbbbbbbbbrrrrrrrrrrrrrrrrrr',1,'active','2018-11-18 05:22:41'),
(9,'42','16','aaaaaaaaaaaawwwwwwwwwwaaaaaaaaaa',4,'deactive','2018-11-16 08:41:31'),
(14,'42','32','yuri is good.',5,'active','2018-12-11 02:16:11'),
(17,'42','15','peterpanetetetetetetete',4,'active','2018-12-12 04:52:29');

/*Table structure for table `guides` */

DROP TABLE IF EXISTS `guides`;

CREATE TABLE `guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `sirname` varchar(64) DEFAULT NULL,
  `username` varchar(64) NOT NULL,
  `certificate_number` varchar(64) DEFAULT NULL,
  `chamber` varchar(64) DEFAULT NULL,
  `work_range` varchar(64) DEFAULT NULL,
  `regions` varchar(128) DEFAULT NULL,
  `languages` varchar(128) DEFAULT NULL,
  `specialisties` varchar(512) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `phone_number` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `facebook` varchar(64) DEFAULT NULL,
  `instagram` varchar(64) DEFAULT NULL,
  `twitter` varchar(64) DEFAULT NULL,
  `linkedin` varchar(64) DEFAULT NULL,
  `google` varchar(64) DEFAULT NULL,
  `youtube` varchar(64) DEFAULT NULL,
  `pinterest` varchar(64) DEFAULT NULL,
  `tumblr` varchar(64) DEFAULT NULL,
  `flickr` varchar(64) DEFAULT NULL,
  `snapchat` varchar(64) DEFAULT NULL,
  `whatsapp` varchar(64) DEFAULT NULL,
  `viber` varchar(64) DEFAULT NULL,
  `skype` varchar(64) DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `certificate` varchar(128) DEFAULT NULL,
  `certificate_front_picture` varchar(128) DEFAULT NULL,
  `certificate_back_picture` varchar(128) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `status` varchar(64) NOT NULL,
  `confirm_key` varchar(64) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Data for the table `guides` */

insert  into `guides`(`id`,`name`,`sirname`,`username`,`certificate_number`,`chamber`,`work_range`,`regions`,`languages`,`specialisties`,`address`,`district`,`city`,`phone_number`,`email`,`password`,`facebook`,`instagram`,`twitter`,`linkedin`,`google`,`youtube`,`pinterest`,`tumblr`,`flickr`,`snapchat`,`whatsapp`,`viber`,`skype`,`photo`,`certificate`,`certificate_front_picture`,`certificate_back_picture`,`points`,`status`,`confirm_key`,`created_date`) values 
(12,'aaa','aaa','aaa','123123','4','All Turkey','','[\"English\",\"Turkish\",\"Chinese\"]','2','asdfasdfasdfasdf','3','19','123123','a@a.com','d41d8cd98f00b204e9800998ecf8427e','','','','','','','','','','','','','','uploads/guide/photo/images (3).png','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (3).jpg','uploads/guide/id_back/download (3).jpg',100,'active',NULL,'2019-01-03 07:22:02'),
(13,'bbb','bbb','bbb','222','9','All Turkey','','[\"English\",\"Turkish\"]',NULL,'bbb','','','123123','b@b.com','08f8e0260c64418510cefb2b06eee5cd','','','','','','','','','','','','','','uploads/guide/photo/download (3).png','uploads/guide/certificate/angry-lion-wallpaper.jpg','uploads/guide/id_front/download (2).jpg','uploads/guide/id_back/download (2).jpg',100,'active',NULL,'2019-01-03 07:12:06'),
(15,'fff','fff','fff','123123123',NULL,'All Turkey','','[\"English\",\"Turkish\",\"Chinese\"]',NULL,'fffffffff','5','23','123123123','f@f.com','343d9040a671c45832ee5381860e2996',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/guide/photo/download.jpg','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (3).png','uploads/guide/id_back/download (3).png',100,'deactive',NULL,'2018-11-09 11:34:18'),
(16,'ggg','ggg','ggg','',NULL,'All Turkey','','[\"English\",\"Turkish\"]',NULL,'','1','25','','g@g.com','ba248c985ace94863880921d8900c53f',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/guide/photo/download.jpg','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (1).jpg','uploads/guide/id_back/download (1).jpg',100,'active',NULL,'2018-11-09 14:26:12'),
(17,'hhh','hhh','hhh','',NULL,'All Turkey','','[\"English\",\"Turkish\"]',NULL,'','4','27','','h@h.com','a3aca2964e72000eea4c56cb341002a4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/guide/photo/download.jpg','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (2).jpg','uploads/guide/id_back/download (2).jpg',100,'deactive',NULL,'2018-11-09 14:34:11'),
(18,'zzz','zzz','zzz','','','All Turkey','','[\"English\",\"Turkish\"]','7','','3','29','','z@z.com','f3abb86bd34cf4d52698f14c0da1dc60','','','','','','','','','','','','','','uploads/guide/photo/download (1).jpg','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (4).png','uploads/guide/id_back/download (4).png',100,'active',NULL,'2019-01-03 07:22:15'),
(19,'XXX','XXX','xxx','974456346','xxx\'s chamber','Some Regions','[\"Mediterrianean\",\"South-Eastern Anatolia\",\"Black Sea\"]','[\"English\",\"Turkish\",\"Chinese\"]',NULL,'xxx address','2','18','23745235','xxx@xxx.com','f561aaf6ef0bf14d4208bb46a4ccb3ad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/guide/photo/download (3).png','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (4).png','uploads/guide/id_back/download (4).png',100,'active',NULL,'2018-11-09 14:49:27'),
(32,'abcd','abcd','abcd','123123',NULL,'All Turkey','','[\"English\",\"Turkish\",\"Chinese\"]',NULL,'abcd','4','20','123123','abcd@abcd.com','d41d8cd98f00b204e9800998ecf8427e',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/guide/photo/download (2).jpg','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (2).jpg','uploads/guide/id_back/download (2).jpg',100,'active',NULL,'2018-11-12 16:35:40'),
(33,'afaf','afaf','afaf','1231241',NULL,'All Turkey','','[\"English\",\"Turkish\"]',NULL,'afasdfasdf','4','22','123123','af@af.com','35abef9cacf725f2eb638651f4c90b2e',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/guide/photo/download.jpg','uploads/guide/certificate/download.jpg','uploads/guide/id_front/download (3).jpg','uploads/guide/id_back/download (3).png',100,'deactive',NULL,'2018-11-12 17:05:07'),
(34,'new','guide1','newguide1','23523623','','All Turkey','','[\"English\",\"Turkish\",\"Chinese\"]','6','guide1 address','2','24','3476231235','guide1@gmail.com','f510e23d073d307697b845e84f4398f1','','','','','','','','','','','','','','uploads/guide/photo/images (13).jpg','uploads/guide/certificate/download.jpg','uploads/guide/id_front/Nana.jpg','uploads/guide/id_back/smi.png',100,'deactive',NULL,'2019-01-03 07:22:27'),
(36,'guide2','person','guide2person','347235236','','All Turkey','','[\"English\",\"Turkish\",\"Chinese\"]',NULL,'guide2 address','1','26','12098029384','guide2@gmail.com','f6ea0da319e7c2192998a8b48edc5024',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'uploads/guide/certificate/download.jpg',NULL,NULL,100,'active',NULL,'2018-12-02 18:27:54'),
(42,'pavel123','yezhov123','peterpan','23764287234732423','9','Some Regions','[\"Mediterrianean\",\"South-Eastern Anatolia\",\"Black Sea\"]','[\"English\",\"Turkish\"]','4','pavel\'s addressssssssssssssssssss','2','18','111111111111111111','peterpan5712448@gmail.com','ef1652b79c940145b600de7a2fe0288e','','','','','','','','','','','','','live:peterpan120_3','uploads/guide/photo/9329d0432af08368a94dc689f628660a--cool-live-wallpapers-lion.jpg','uploads/guide/certificate/images (1).jpg','uploads/guide/id_front/images (2).png','uploads/guide/id_back/Beautiful_White_Tiger_Wallpaper.jpg',100,'active','1b0ee90b1ca09da8d75d51e92cffd445','2019-01-16 10:34:09'),
(43,'dmitri','Vasilievic','Dmitri','123123123123','','Some Regions','[\"Mediterrianean\",\"Black Sea\"]','[\"English\",\"Turkish\"]','','dmitri\'s address','4','19','12345678980','dmitri0120@yandex.com','247e97e7fcbb64aa271f76a1739a8090','','','','','','','','','','','','','','uploads/guide/photo/images (2).jpg','uploads/guide/certificate/images (1).jpg','uploads/guide/id_front/6021278-wallpaper-high-resolution.jpg','uploads/guide/id_back/Dandelion-Painting-Macro-Wallpaper-HD-1200x480.jpg',100,'deactive','ad6ad5d8704115c63e4ff44bf3431e90','2019-01-16 10:39:45'),
(45,'K','guid','kguide','12112566235','6','Some Regions','[\"Black Sea\",\"Marmara\"]','[\"French\",\"Spanish\"]','2','kguide address','2','22','1231201902358','kguide@new.com','b61bf2981f972cb59dda6283c49e954b','','','','','','','','','','','','','','uploads/guide/photo/images (2).png','uploads/guide/certificate/ab587074fc7cae9028209a9b9ce317c4.jpg','uploads/guide/id_front/images.png','uploads/guide/id_back/images (5).jpg',100,'deactive','91b772c8011e392788a681b11e43ccc4','2019-01-16 10:40:03'),
(46,'G','guide','gguide','213764724','9','All Turkey',NULL,'[\"Chinese\",\"French\"]','7','gguide address','4','20','1298462350','gguide@new.com','b60f2d33a37043bceabc274d30f867af','','','','','','','','','','','','','','uploads/guide/photo/3.jpg','uploads/guide/certificate/1.jpg','uploads/guide/id_front/angry-lion-wallpaper.jpg','uploads/guide/id_back/c0d625a7ef5bc800380b76186f4f1e06.jpg',100,'deactive','4e0ad1d882e5464dd7d6c9bd85f3053a','2019-01-16 10:41:23');

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(64) NOT NULL,
  `language_code` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `languages` */

insert  into `languages`(`id`,`language`,`language_code`) values 
(1,'English','en'),
(2,'Turkish','tr'),
(4,'Japanese','jp'),
(5,'Chinese','ch'),
(8,'French','fr'),
(9,'Spanish','sp');

/*Table structure for table `museum_categories` */

DROP TABLE IF EXISTS `museum_categories`;

CREATE TABLE `museum_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `museum_categories` */

insert  into `museum_categories`(`id`,`category`) values 
(1,'History'),
(2,'Arts'),
(3,'Archeology'),
(4,'Science'),
(5,'Technology'),
(6,'Natural History');

/*Table structure for table `museums` */

DROP TABLE IF EXISTS `museums`;

CREATE TABLE `museums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `category` varchar(512) DEFAULT NULL,
  `summer_start_time` time DEFAULT NULL,
  `summer_end_time` time DEFAULT NULL,
  `winter_start_time` time DEFAULT NULL,
  `winter_end_time` time DEFAULT NULL,
  `summer_rest_days` varchar(128) DEFAULT NULL,
  `winter_rest_days` varchar(128) DEFAULT NULL,
  `entrance_price` float DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `web` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `number` varchar(64) DEFAULT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `contact_number` varchar(64) DEFAULT NULL,
  `status` varchar(64) NOT NULL,
  `provider_email` varchar(64) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `museums` */

insert  into `museums`(`id`,`name`,`description`,`category`,`summer_start_time`,`summer_end_time`,`winter_start_time`,`winter_end_time`,`summer_rest_days`,`winter_rest_days`,`entrance_price`,`address`,`district`,`city`,`country`,`lat`,`lng`,`web`,`email`,`number`,`contact_person`,`contact_number`,`status`,`provider_email`,`created_date`) values 
(3,'ms1','this is first museum','[\"Science\",\"Technology\"]','11:11:00','14:22:00','15:33:00','16:44:00','[\"Wednesday\"]','[\"Tuesday\",\"Sunday\"]',235.2,'address','2','18','15',0,0,'web','mm@mm.com','213523','person','23523','deactive','etet@etet.com',NULL),
(4,'ms3','this is third museum','[\"Science\",\"Technology\"]','11:11:00','14:22:00','15:33:00','16:44:00','[\"Thursday\"]','[\"Friday\"]',35.23,'address','5','20','18',0,0,'web','mt@mt.com','235','person2','35234234','active','x@x.com',NULL),
(5,'my museum','this is my museum','[\"History\",\"Arts\"]','11:11:00','17:44:00','08:08:00','14:22:00','[\"Sunday\"]','[\"Saturday\",\"Sunday\"]',35.23,'my address','1','22','22',41.00139886325936,28.97552680304534,'my web','my@museum.com','123123123123','my person','123123123','active','admin@admin.com',NULL),
(6,'ms4','this is museum4','[\"Science\"]','08:00:00','16:00:00','08:30:00','15:00:00','[\"Sunday\"]','[\"Monday\",\"Sunday\"]',300,'museum4 address','3','25','25',0,0,'web4','museum4@gmail.com','12312312313123','museum4 person','234234123123','deactive','etet@etet.com',NULL),
(7,'ms5','this is museum5','[\"Technology\"]','09:00:00','16:00:00','07:00:00','17:00:00','[\"Sunday\"]','[\"Saturday\",\"Sunday\"]',320,'museum5 address','4','26','27',0,0,'museum5 web','museum5@gmail.com','23415213','museum5 person','','deactive','abcd@abcd.com',NULL),
(10,'museum6','this is museum6','[\"Natural History\"]','08:00:00','16:00:00','08:00:00','16:00:00','[\"Sunday\"]','[\"Saturday\",\"Sunday\"]',326,'ms6 address','2','29','31',0,0,'ms6 web','museum6@gmail.com','26342314','ms6 contact person','262134123','active','x@x.com',NULL),
(11,'ms2','this is museum2','[\"History\",\"Arts\",\"Archeology\"]','08:00:00','20:00:00','08:00:00','17:00:00','[\"Monday\",\"Sunday\"]','[\"Saturday\",\"Sunday\"]',420,'ms2 address','5','31','17',0,0,'museum2 web','museum2@gmail.com','23612341','museum contact person2','758356345','deactive','x@x.com',NULL),
(12,'museum1','this is museum1','[\"Arts\"]','11:11:00','16:44:00','11:11:00','17:55:00','[\"Monday\"]','[\"Saturday\",\"Sunday\"]',236,'museum1 address','3','33','20',0,0,'museum1 web','museum1@gmail.com','2356923942','museum1 contact person','2303249123','active','admin@admin.com',NULL),
(13,'museum2','this is museum2','[\"Archeology\"]','08:00:00','20:00:00','08:00:00','20:00:00','[\"Monday\"]','[\"Sunday\"]',236,'museum2 address','4','36','33',0,0,'museum2 web','newmuseum2@gmail.com','19823918273','museum2 contact person','21023945812','active','x@x.com','2018-12-01 02:40:50'),
(14,'petermuseum','this is peter\'s museum','[\"History\",\"Archeology\",\"Science\"]','11:11:00','15:33:00','11:11:00','16:44:00','[\"Monday\",\"Sunday\"]','[\"Saturday\",\"Sunday\"]',123,'petermuseum address','3','18','2',41.02005997091856,28.97317886352539,'petermuseum web','petermuseum@museum.com','123123123','peter','123123123123','deactive','peterpan5712448@gmail.com','2018-12-25 16:03:33'),
(15,'yurimuseum','this is yuri\'s museum','[\"History\",\"Archeology\",\"Technology\"]','11:11:00','15:33:00','11:11:00','16:44:00','[\"Sunday\"]','[\"Saturday\",\"Sunday\"]',1414,'yurimuseum address','3','20','17',41.00395790260195,28.989734181155427,'yurimuseum web','yurimuseum@museum.com','123123123123123','yuri','12312312313','deactive','peterpan120@yandex.com',NULL),
(18,'test','test','[\"Science\",\"Technology\"]','11:11:00','16:44:00','11:11:00','19:07:00','[\"Saturday\",\"Sunday\"]','[\"Monday\",\"Sunday\"]',123,'test','5','19','2',41.02328946996402,28.974930011539527,'test','test@museum.com','123123','test','123123123123','active','support@heyrehber.com','2018-12-26 13:18:02');

/*Table structure for table `page_categories` */

DROP TABLE IF EXISTS `page_categories`;

CREATE TABLE `page_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `page_categories` */

insert  into `page_categories`(`id`,`category`) values 
(1,'page category1'),
(2,'page category2'),
(3,'page category3'),
(4,'page category4');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `content` text,
  `category` varchar(128) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pages` */

insert  into `pages`(`id`,`title`,`content`,`category`,`created_date`) values 
(2,'page1','<h1 style=\"text-align: center;\"><span style=\"text-decoration: line-through;\">this is content for page1</span></h1>','1','2018-12-30 00:47:26');

/*Table structure for table `regions` */

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `regions` */

insert  into `regions`(`id`,`region`) values 
(1,'Mediterrianean'),
(2,'Eastern Anatolia'),
(3,'Aegean'),
(4,'South-Eastern Anatolia'),
(5,'Central Anatolia'),
(6,'Black Sea'),
(7,'Marmara');

/*Table structure for table `restaurant_categories` */

DROP TABLE IF EXISTS `restaurant_categories`;

CREATE TABLE `restaurant_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `restaurant_categories` */

insert  into `restaurant_categories`(`id`,`category`) values 
(1,'Noodle'),
(2,'Meat'),
(3,'Fish'),
(4,'Hamburger'),
(5,'Salad'),
(6,'Sandwich'),
(7,'Tea'),
(8,'Coffee'),
(9,'Italian foods'),
(10,'Cafe'),
(11,'Vegetables'),
(12,'Hotdog');

/*Table structure for table `restaurants` */

DROP TABLE IF EXISTS `restaurants`;

CREATE TABLE `restaurants` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `category` varchar(64) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `legal_name` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `number` varchar(64) DEFAULT NULL,
  `web` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `contact_number` varchar(64) DEFAULT NULL,
  `contact_email` varchar(64) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `status` varchar(64) NOT NULL,
  `provider_email` varchar(64) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `restaurants` */

insert  into `restaurants`(`id`,`name`,`category`,`description`,`rating`,`legal_name`,`address`,`district`,`city`,`country`,`lat`,`lng`,`number`,`web`,`email`,`contact_person`,`contact_number`,`contact_email`,`points`,`status`,`provider_email`,`created_date`) values 
(1,'res1','[\"Noodle\",\"Hamburger\",\"Salad\"]','asdfasdfasdfasdfasdf',4,'res1','asdfasdf','4','18','15',NULL,NULL,'3523522','sadfasdf','res@res.com','asdfasdfasd','235236523','asd@asd.com',NULL,'active','admin@admin.com','0000-00-00 00:00:00'),
(2,'ressuggestion2','[\"Fish\",\"Sandwich\",\"Tea\"]','asdfasdfasdfasdfasdf',4,'etw23sdfasdf','address','1','20','24',41.01073422734324,28.968029022216797,'23235234','asdfasdfasdfasdf','ressugg1@gmail.com','asdf','23352','ressuggperson2@gmail.com',100,'active','etet@etet.com','0000-00-00 00:00:00'),
(3,'ressuggestion1','[\"Meat\"]','asdfasdfasdfasdf',5,'werwer','agasdrq','3','30','25',NULL,NULL,'234234','asdfasdt','ressugg2@gmail.com','asdtasdf','2352341','ressuggperson2@gmail.com',NULL,'active','etet@etet.com','0000-00-00 00:00:00'),
(4,'ressuggestion3','[\"Fish\"]','asdfasdfasdfasdfasdfasdf',5,'asdfasdfasdf','qwerqwea','2','24','27',NULL,NULL,'235324','werasdfasd','ressugg3@gmail.com','asdfasdf','235234','ressuggperson3@gmail.com',NULL,'active','x@x.com','0000-00-00 00:00:00'),
(5,'restaurant1','[\"Salad\",\"Sandwich\"]','this is restaurant1',4,'Restaurant1','restaurant1 address','3','27','22',NULL,NULL,'3246235253','restaurant1 web','restaurant1@gmail.com','restaurant1 contact person','2362341263124','res1contact@person.com',NULL,'active','admin@admin.com','0000-00-00 00:00:00'),
(6,'res2','[\"Hamburger\",\"Salad\"]','this is restaurant2',5,'Restaurant2','res2 address','3','23','15',NULL,NULL,'23623414','res2 web','res2@gmail.com','res2 contact person','1230288324','res2contact@person.com',NULL,'deactive','x@x.com','0000-00-00 00:00:00'),
(7,'RRestaurant','[\"Hamburger\",\"Salad\"]','this is rrestaurant',4,'RRESTAURANT','rrestaurant address','2','21','1',41.00542314454012,28.982620239257812,'123123123','rrestaurant web','rrestaurant@restaurant.com','rrestaurant contact person','123123123123','rrestaurant@contact.com',NULL,'active','support@heyrehber.com','2018-12-25 09:22:44'),
(8,'PeterRestaurant','[\"Hamburger\",\"Sandwich\"]','this is peter\'s restaurant',5,'Peter\'s Restaurant','peterrestaurant address','2','23','16',41.01073422734324,28.968029022216797,'123123123123','peterrestaurant web','peterrestaurant@restaurant.com','peter','123123123123','peterrestaurant@contact.com',NULL,'deactive','peterpan5712448@gmail.com','2018-12-25 15:34:08'),
(9,'yurirestaurant','[\"Fish\",\"Sandwich\"]','this is yuri\'s restaurant',5,'Yuri\'s Restaurant','yurirestaurant address','4','24','15',41.01817367773236,28.97226523688323,'12312312313','yurirestaurant web','yurrestaurant@restaurant.com','yuri','1231231231','yurirestaurant@contact.com',NULL,'deactive','peterpan120@yandex.com','0000-00-00 00:00:00'),
(16,'test','[\"Meat\",\"Sandwich\"]','test',4,'test','test','4','23','18',41.023354224280936,28.9745826654721,'123123','test','test@restaurant.com','test','123123123123','test@contact.com',NULL,'active','support@heyrehber.com','2018-12-26 12:48:31');

/*Table structure for table `shop_categories` */

DROP TABLE IF EXISTS `shop_categories`;

CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `shop_categories` */

insert  into `shop_categories`(`id`,`category`) values 
(1,'Leather'),
(3,'Bags'),
(4,'Carpets'),
(5,'Furnitures'),
(6,'Handcraft'),
(7,'Clothes'),
(8,'Sports'),
(9,'Fruits'),
(10,'Vegetables'),
(11,'Toys'),
(12,'Drinks'),
(13,'Dish');

/*Table structure for table `shops` */

DROP TABLE IF EXISTS `shops`;

CREATE TABLE `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `category` varchar(64) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `legal_name` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `number` varchar(64) DEFAULT NULL,
  `web` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `contact_number` varchar(64) DEFAULT NULL,
  `contact_email` varchar(64) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `status` varchar(64) NOT NULL,
  `provider_email` varchar(64) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `shops` */

insert  into `shops`(`id`,`name`,`category`,`description`,`rating`,`legal_name`,`address`,`district`,`city`,`country`,`lat`,`lng`,`number`,`web`,`email`,`contact_person`,`contact_number`,`contact_email`,`points`,`status`,`provider_email`,`created_date`) values 
(9,'dddddd','[\"Clothes\"]','ddddddddddddd',3,'ddddddd','ddddddd','1','18','15',41.01738947746387,28.986028992443153,'2342342','ddddddddddd','dd@dd.com','ddddd','1235235','ddd@ddd.com',100,'active','admin@admin.com',NULL),
(10,'aaaaaaaa','[\"Leather\"]','aaaaaaaaaaaaaaaaa',4,'aaaaa','aaaaaaaaaa','2','19','16',41.01007825800265,28.97956084540374,'1111111','aaaaaa','aa@aa.com','aaaaaa','11111111','aaa@aaa.com',NULL,'deactive','admin@admin.com',NULL),
(11,'sssssssssss','[\"Bags\",\"Clothes\",\"Sports\",\"Drinks\"]','ssssssssssss',5,'ssssssss','ssssssssbbbbbbb','1','20','17',41.01007825800265,28.97956084540374,'444444','sssss','ss@ss.com','bbssssssssbbbbbbbbbb','11111111','sss@sss.com',NULL,'active','admin@admin.com',NULL),
(12,'shop1','[\"Carpets\",\"Handcraft\"]','asdfasdfasdfasdf',3,'shop1','shop1 address','4','21','18',41.01007825800265,28.97956084540374,'235','shop1 web','shop1@gmail.com','person1','2362342','person1@gmail.com',NULL,'deactive','etet@etet.com',NULL),
(14,'shopsugg1','[\"Bags\",\"Furnitures\",\"Clothes\"]','asdfasdfasdfasdfasdfasdf',2,'asdf','address','5','22','19',41.01007825800265,28.97956084540374,'123123','asdfasdf','shopsugg1@gmail.com','asdfasdf','235234','shopsugg1person@gmail.com',NULL,'deactive','etet@etet.com',NULL),
(15,'shopsugg3','','asdfqwefasdasdf',4,'asdfasdf','sdfasdfasdf','4','23','20',41.01007825800265,28.97956084540374,'qwerqdfasd','asdfasdf','shopsugg3@gmail.com','asdfasdf','23423','shopsugg3person@gmail.com',NULL,'active','qt@qt.com',NULL),
(16,'shopsugg4','[\"Drinks\",\"Dish\"]','asdfasdfasdfasdfasdf',2,'asdfasdfas','asdfasdfasdf','2','24','21',41.01007825800265,28.97956084540374,'235234','asdfadsf','shopsugg4@gmail.com','asdfasdf','232341531','shopsugg4person@gmail.com',NULL,'deactive','x@x.com',NULL),
(17,'shop1','[\"Leather\",\"Bags\",\"Carpets\"]','this is shop1',3,'SHOP1','shop1 address','3','25','22',41.01007825800265,28.97956084540374,'123123123123','shop1 web','newshop1@gmail.com','newshop1 contact person','2350234109','newshop1contact@person.com',NULL,'active','admin@admin.com','2018-12-01 01:37:21'),
(18,'shop2','[\"Bags\",\"Clothes\"]','This is shop2',4,'Shop2','shop2 address','3','26','26',41.01007825800265,28.97956084540374,'2623523623','shop2 web','shop2@gmail.com','shop2 contact person','23623423623','shop2contact@person.com',NULL,'active','x@x.com','2018-12-01 03:46:26'),
(19,'SShop','[\"Carpets\",\"Handcraft\"]','this is sshop',5,'SSHOP','sshop address','2','23','18',41.0033504107363,28.915586471557617,'123123123','sshop web','sshop@shop.com','sshop contact person','123123123','sshop@contact.com',NULL,'active','support@heyrehber.com','2018-12-25 08:51:36'),
(20,'petershop','[\"Bags\",\"Clothes\"]','this is peter\'s shop',5,'Peter\'s Shop','petershop address','5','24','21',41.01623916618358,28.964080810546875,'123123123','petershop web','peterpshop@shop.com','peter','12312312313','petershop@contact.com',NULL,'deactive','peterpan5712448@gmail.com','2018-12-25 11:06:41'),
(21,'yurishop','[\"Bags\",\"Clothes\"]','this is yuri\'s shop',3,'Yuri\'s Shop','yurishop address','1','24','19',41.020764001942034,28.98951720526702,'12312312313','yurishop web','yurishop@shop.com','yuri','123123123','yurishop@contact.com',NULL,'deactive','peterpan120@yandex.com',NULL),
(23,'test','[\"Furnitures\",\"Clothes\"]','test',4,'test','test','2','20','16',41.02367799491046,28.992092125921317,'123123','test','test@shop.com','test','123123123123','test@contact.com',NULL,'active','support@heyrehber.com','2018-12-26 10:28:33');

/*Table structure for table `specialisties` */

DROP TABLE IF EXISTS `specialisties`;

CREATE TABLE `specialisties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialisties` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `specialisties` */

insert  into `specialisties`(`id`,`specialisties`) values 
(1,'Archeology'),
(2,'History'),
(3,'Gastronomy'),
(4,'Hunting'),
(5,'Culture'),
(6,'Bird Watching'),
(7,'Trekking');

/*Table structure for table `subject_categories` */

DROP TABLE IF EXISTS `subject_categories`;

CREATE TABLE `subject_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `subject_categories` */

insert  into `subject_categories`(`id`,`category`) values 
(1,'subject1'),
(2,'subject6'),
(3,'subject3'),
(4,'subject4'),
(5,'subject5');

/*Table structure for table `supervisors` */

DROP TABLE IF EXISTS `supervisors`;

CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `sirname` varchar(64) NOT NULL,
  `department` varchar(512) DEFAULT NULL,
  `number` varchar(64) DEFAULT NULL,
  `certificate` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `supervisors` */

insert  into `supervisors`(`id`,`name`,`sirname`,`department`,`number`,`certificate`,`email`,`password`,`created_date`) values 
(3,'super','visor3','[\"department3\",\"department6\"]','235235','uploads/supervisor/images (3).jpg','super3@gmail.com','85511dc944c3765338deb0b3ad38e907','2018-11-17 06:30:46'),
(4,'super','visor4','[\"department6\"]','35231','uploads/supervisor/images (5).jpg','super4@gmail.com','d41d8cd98f00b204e9800998ecf8427e','2018-11-17 06:58:25'),
(5,'super','visor5','[\"department1\"]','62341','uploads/supervisor/images (13).jpg','super5@gmail.com','f2d47c40507a9161af34a94afd6a3e5b','2018-11-17 06:59:10'),
(6,'super','visor2','','62342','uploads/supervisor/images (12).jpg','super2@gmail.com','94efeff594eba1241014e55bd8c5c283','2018-11-17 07:01:24');

/*Table structure for table `system_settings` */

DROP TABLE IF EXISTS `system_settings`;

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_tagline` varchar(64) DEFAULT NULL,
  `site_phone_number` varchar(64) DEFAULT NULL,
  `site_help_email` varchar(64) DEFAULT NULL,
  `allow_multi_language` varchar(64) DEFAULT NULL,
  `default_admin_language` varchar(64) DEFAULT NULL,
  `default_agency_language` varchar(64) DEFAULT NULL,
  `default_guide_language` varchar(64) DEFAULT NULL,
  `default_frontend_language` varchar(64) DEFAULT NULL,
  `reset_token_lifetime` int(11) DEFAULT NULL,
  `max_login_restrict_time` int(11) DEFAULT NULL,
  `max_login_attempts` int(11) DEFAULT NULL,
  `email_active_language` varchar(64) DEFAULT NULL,
  `admin_email` varchar(64) DEFAULT NULL,
  `admin_per_page` int(11) DEFAULT NULL,
  `site_email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `system_settings` */

insert  into `system_settings`(`id`,`site_tagline`,`site_phone_number`,`site_help_email`,`allow_multi_language`,`default_admin_language`,`default_agency_language`,`default_guide_language`,`default_frontend_language`,`reset_token_lifetime`,`max_login_restrict_time`,`max_login_attempts`,`email_active_language`,`admin_email`,`admin_per_page`,`site_email`) values 
(1,'aaaaaaaaaa','1231231','help@gmail.com','yes','English','English','English','English',30,3636363,100,'English','admin@admin.com',10,'mysite@gmail.com');

/*Table structure for table `ticket_categories` */

DROP TABLE IF EXISTS `ticket_categories`;

CREATE TABLE `ticket_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ticket_categories` */

insert  into `ticket_categories`(`id`,`category`) values 
(1,'Suggestions'),
(2,'System Problems'),
(3,'Guide Issues'),
(4,'Agency Issues'),
(5,'Restaurant Issues'),
(6,'Shop Issues'),
(7,'Musuem Issues');

/*Table structure for table `ticket_histories` */

DROP TABLE IF EXISTS `ticket_histories`;

CREATE TABLE `ticket_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `from` varchar(64) CHARACTER SET latin1 NOT NULL,
  `role` int(11) NOT NULL,
  `message` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `reply_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ticket_histories` */

insert  into `ticket_histories`(`id`,`ticket_id`,`from`,`role`,`message`,`reply_date`) values 
(1,'9310a5b85129f88ab913698d49a0d56b','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 09:35:53'),
(3,'03930c997ae57e945bdb6ebc583ae268','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 09:37:27'),
(4,'1abbaf700c5fe08a24b2d8fac9d8340c','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 09:37:55'),
(5,'9310a5b85129f88ab913698d49a0d56b','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 10:37:20'),
(8,'9310a5b85129f88ab913698d49a0d56b','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 10:41:47'),
(9,'9310a5b85129f88ab913698d49a0d56b','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 11:22:21'),
(10,'03930c997ae57e945bdb6ebc583ae268','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 11:23:16'),
(11,'7e992cf7157ab50daf8117f9c3af6604','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 11:38:06'),
(12,'77791a643f3d490b56af9ca7c8aec749','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 11:42:41'),
(13,'77791a643f3d490b56af9ca7c8aec749','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 11:45:00'),
(14,'77791a643f3d490b56af9ca7c8aec749','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 11:49:13'),
(15,'03930c997ae57e945bdb6ebc583ae268','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 11:57:08'),
(16,'77791a643f3d490b56af9ca7c8aec749','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 12:00:20'),
(17,'77791a643f3d490b56af9ca7c8aec749','1',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 12:15:45'),
(18,'77791a643f3d490b56af9ca7c8aec749','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 12:16:44'),
(19,'77791a643f3d490b56af9ca7c8aec749','1',0,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 12:17:04'),
(20,'77791a643f3d490b56af9ca7c8aec749','1',0,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 12:19:39'),
(21,'9310a5b85129f88ab913698d49a0d56b','1',0,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 12:21:10'),
(22,'7e992cf7157ab50daf8117f9c3af6604','1',0,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 12:27:23'),
(23,'6a28e382b069372de05227d230ab1109','61',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 02:41:58'),
(24,'6a28e382b069372de05227d230ab1109','61',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 02:42:31'),
(25,'6a28e382b069372de05227d230ab1109','1',0,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 02:47:51'),
(26,'77791a643f3d490b56af9ca7c8aec749','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 02:50:59'),
(27,'77791a643f3d490b56af9ca7c8aec749','106',3,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 03:08:40'),
(29,'6a28e382b069372de05227d230ab1109','61',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-18 15:16:49'),
(36,'03930c997ae57e945bdb6ebc583ae268','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-19 06:05:19'),
(46,'1abbaf700c5fe08a24b2d8fac9d8340c','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-20 13:08:20'),
(47,'1abbaf700c5fe08a24b2d8fac9d8340c','107',4,'w4fEsWvEscWfLCDDtm3DvHIsIMSfw7xtxZ/DvMOn','2018-12-20 13:14:31'),
(48,'1abbaf700c5fe08a24b2d8fac9d8340c','107',4,'SGVsbG8sIHRoaXMgaXMgd3JpdHRlbiBpbiBFbmdsaXNo','2018-12-20 13:17:02');

/*Table structure for table `tickets` */

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `category` varchar(128) NOT NULL,
  `submission_date` datetime NOT NULL,
  `from` varchar(64) NOT NULL,
  `role` int(11) NOT NULL,
  `message` varchar(256) DEFAULT NULL,
  `priority` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tickets` */

insert  into `tickets`(`id`,`ticket_id`,`subject`,`category`,`submission_date`,`from`,`role`,`message`,`priority`,`status`,`last_updated`) values 
(16,'9310a5b85129f88ab913698d49a0d56b','subject1','[\"1\",\"4\"]','2018-12-18 09:35:53','107',4,'This is message1','medium','Replied By Admin','2018-12-18 12:21:10'),
(18,'03930c997ae57e945bdb6ebc583ae268','subject2','[\"2\",\"3\"]','2018-12-18 09:37:27','107',4,'this is message2','urgent','Replied By Guide','2018-12-19 06:14:38'),
(19,'1abbaf700c5fe08a24b2d8fac9d8340c','subject3','[\"5\"]','2018-12-18 09:37:55','107',4,'this is message3','low','Closed','2018-12-20 13:17:02'),
(20,'7e992cf7157ab50daf8117f9c3af6604','subject4','[\"3\"]','2018-12-18 09:38:32','106',3,'this is message4','low','Replied By Admin','2018-12-18 12:27:23'),
(21,'58ffb8ebf1687850069e6059d25314f9','subject5','[\"2\",\"3\"]','2018-12-18 09:38:50','106',3,'this is message5','medium','New','2018-12-18 09:38:50'),
(22,'8cee0fa45d17aa94a550661022a6fa70','subject6','[\"4\",\"6\"]','2018-12-18 09:39:11','106',3,'this is message6','urgent','New','2018-12-18 09:39:11'),
(23,'77791a643f3d490b56af9ca7c8aec749','subject7','[\"1\",\"3\",\"6\"]','2018-12-18 11:42:41','106',3,'this is subject7','urgent','Replied By Admin','2018-12-18 03:09:32'),
(24,'6a28e382b069372de05227d230ab1109','ticket8','[\"2\",\"5\"]','2018-12-18 02:41:58','61',4,'this is ticket8','urgent','Replied By Guide','2018-12-18 15:57:56');

/*Table structure for table `tour_types` */

DROP TABLE IF EXISTS `tour_types`;

CREATE TABLE `tour_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_type` varchar(64) NOT NULL,
  `days` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tour_types` */

insert  into `tour_types`(`id`,`tour_type`,`days`) values 
(1,'Regional Tour','One Day'),
(2,'Daily Tour','Several Days'),
(3,'Transfer','One Day'),
(4,'Night Tour','Several Days');

/*Table structure for table `upload_images` */

DROP TABLE IF EXISTS `upload_images`;

CREATE TABLE `upload_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building` varchar(64) NOT NULL,
  `building_id` int(11) NOT NULL,
  `path` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `upload_images` */

insert  into `upload_images`(`id`,`building`,`building_id`,`path`) values 
(4,'shop',23,'uploads/shop/834276346.jpg'),
(5,'shop',23,'uploads/shop/black-mountain-wallpapers-27777-7810667.jpg'),
(6,'shop',23,'uploads/shop/venus-project-5.jpg'),
(26,'restaurant',16,'uploads/restaurant/3.jpg'),
(27,'restaurant',16,'uploads/restaurant/1.jpg'),
(28,'restaurant',16,'uploads/restaurant/ab587074fc7cae9028209a9b9ce317c4.jpg'),
(65,'museum',11,'uploads/museum/fpCK3rt.jpg'),
(66,'museum',18,'uploads/museum/3.jpg'),
(67,'museum',18,'uploads/museum/angry-lion-wallpaper.jpg'),
(68,'museum',18,'uploads/museum/c0d625a7ef5bc800380b76186f4f1e06.jpg'),
(69,'shop',9,'uploads/shop/834276346.jpg'),
(70,'shop',9,'uploads/shop/6021108-wallpaper-high-resolution.jpg');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `confirm_key` varchar(64) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(64) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`confirm_key`,`role`,`status`,`created_date`) values 
(1,'heyrehber','support@heyrehber.com','21232f297a57a5a743894a0e4a801fc3',NULL,0,'','2018-11-07 02:40:00'),
(22,'aaa','a@a.com','d41d8cd98f00b204e9800998ecf8427e',NULL,4,'','2019-01-03 07:22:02'),
(23,'bbb','b@b.com','08f8e0260c64418510cefb2b06eee5cd',NULL,4,'','2019-01-03 07:12:06'),
(25,'qqqttt','qt@qt.com','3a7f03944c6592d32bb81223fe8dea89',NULL,3,'','2018-11-30 14:38:27'),
(26,'ddd','d@d.com','77963b7a931377ad4ab5ad6a9cd718aa',NULL,4,'','2018-11-08 15:49:38'),
(27,'www','w@w.com','d41d8cd98f00b204e9800998ecf8427e',NULL,3,'','2018-11-30 14:38:43'),
(38,'fff','f@f.com','343d9040a671c45832ee5381860e2996',NULL,4,'','2018-11-09 11:34:18'),
(44,'rrr','r@r.com','d41d8cd98f00b204e9800998ecf8427e',NULL,3,'','2018-11-30 14:38:56'),
(45,'ggg','g@g.com','ba248c985ace94863880921d8900c53f',NULL,4,'','2018-11-09 14:26:12'),
(46,'hhh','h@h.com','a3aca2964e72000eea4c56cb341002a4',NULL,4,'','2018-11-09 14:34:11'),
(47,'zzz','z@z.com','f3abb86bd34cf4d52698f14c0da1dc60',NULL,4,'','2019-01-03 07:22:15'),
(48,'xxx','xxx@xxx.com','f561aaf6ef0bf14d4208bb46a4ccb3ad',NULL,4,'','2018-11-09 14:49:27'),
(49,'vvv','v@v.com','4786f3282f04de5b5c7317c490c6d922',NULL,4,'','2018-11-09 14:52:29'),
(61,'abcd','abcd@abcd.com','e2fc714c4727ee9395f324cd2e7f331f',NULL,4,'','2018-11-12 16:35:40'),
(62,'afaf','af@af.com','35abef9cacf725f2eb638651f4c90b2e',NULL,4,'','2018-11-12 17:05:07'),
(70,'etetet','etet@etet.com','7adc5a360adabf8b043f13ebde886fdc',NULL,3,'','2018-11-30 14:39:07'),
(74,'','super3@gmail.com','85511dc944c3765338deb0b3ad38e907',NULL,1,'','2018-11-17 06:30:46'),
(75,'','super4@gmail.com','d41d8cd98f00b204e9800998ecf8427e',NULL,1,'','2018-11-17 06:58:25'),
(76,'','super5@gmail.com','f2d47c40507a9161af34a94afd6a3e5b',NULL,1,'','2018-11-17 06:59:10'),
(77,'','super2@gmail.com','94efeff594eba1241014e55bd8c5c283',NULL,1,'','2018-11-17 07:01:24'),
(78,'','editor1@gmail.com','c9330587565205a5b8345f60c620ecc6',NULL,1,'','2018-11-17 10:49:25'),
(79,'','editor2@gmail.com','d41d8cd98f00b204e9800998ecf8427e',NULL,2,'','2018-11-17 10:58:04'),
(80,'new agency','agencynew@gmail.com','d41d8cd98f00b204e9800998ecf8427e',NULL,3,'','2018-11-30 14:39:20'),
(81,'agency1','agency1@gmail.com','d41d8cd98f00b204e9800998ecf8427e',NULL,3,'','2018-11-30 13:16:33'),
(82,'agency2','agency2@gmail.com','d41d8cd98f00b204e9800998ecf8427e',NULL,3,'','2018-11-30 14:40:14'),
(83,'agency3','agency3@gmail.com','499daf87885cad3bf4b4aa5b9995988c',NULL,3,'','2018-12-07 07:39:16'),
(84,'newguide1','guide1@gmail.com','f510e23d073d307697b845e84f4398f1',NULL,4,'','2019-01-03 07:22:27'),
(86,'guide2','guide2@gmail.com','f6ea0da319e7c2192998a8b48edc5024',NULL,4,'','2018-12-02 18:27:54'),
(106,'yuri','peterpan120@yandex.com','9491876179d7a80bb5c86f15dbe31422','6877d61ccea3f0bc96e4cdd2ce093fe3',3,'active','2018-12-09 07:49:09'),
(107,'peterpan','peterpan5712448@gmail.com','ef1652b79c940145b600de7a2fe0288e','1b0ee90b1ca09da8d75d51e92cffd445',4,'active','2019-01-16 10:34:09'),
(108,'misha','mihail120@yandex.com','383d802a4c84af5ac3719276218bb918','e16f4d7f595bfae766b165cd56d7a28b',3,'','2018-12-12 17:59:22'),
(109,'Dmitri','dmitri0120@yandex.com','247e97e7fcbb64aa271f76a1739a8090','ad6ad5d8704115c63e4ff44bf3431e90',4,'deactive','2019-01-16 10:39:45'),
(110,'kguide','kguide@new.com','b61bf2981f972cb59dda6283c49e954b','91b772c8011e392788a681b11e43ccc4',4,'deactive','2019-01-16 10:40:03'),
(111,'gguide','gguide@new.com','b60f2d33a37043bceabc274d30f867af','4e0ad1d882e5464dd7d6c9bd85f3053a',4,'deactive','2019-01-16 10:41:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
