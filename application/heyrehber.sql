/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - heyrehber
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`heyrehber` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `heyrehber`;

/*Table structure for table `agencies` */

DROP TABLE IF EXISTS `agencies`;

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `number` varchar(64) NOT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `company_address` varchar(128) DEFAULT NULL,
  `company_phone` varchar(64) DEFAULT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `contact_person_mobile` varchar(64) DEFAULT NULL,
  `certificate` varchar(128) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `agencies` */

insert  into `agencies`(`id`,`name`,`number`,`company_name`,`company_address`,`company_phone`,`contact_person`,`email`,`contact_person_mobile`,`certificate`,`password`,`created_date`) values 
(2,'qqqttt','123123','qqqttt','qqqttt','123123','qqqttt','qt@qt.com','123123','uploads/agency/Wendy1.png','e85823b4e7db1064f4301e1c74978199','2018-11-12 18:46:31'),
(3,'www','123123','www','www','123123','www','w@w.com','123123','uploads/agency/Wendy.jpg','4eae35f1b35977a00ebd8086c259d4c9','2018-11-08 16:09:05'),
(9,'rrr','123123','rrr','rrrrrrrr','123123','rrr','r@r.com','1231231231','uploads/agency/download (1).jpg','44f437ced647ec3f40fa0841041871cd','2018-11-09 12:31:12'),
(15,'etete','12352','etete','etetetetet','235231','etet','et@et.com','3252','uploads/agency/download.jpg','4de1b7a4dc53e4a84c25ffb7cdb580ee','2018-11-12 19:13:24'),
(16,'new agency','124123','New Agency','company address','3242342','contact person','agency1@gmail.com','2534234234r','uploads/agency/images (4).jpg','3bfb04fca479ac4a8d4ddd4b02868fd0','2018-11-22 05:46:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `agency_reviews` */

insert  into `agency_reviews`(`id`,`agency`,`guide`,`review`,`rating`,`status`,`submission_date`) values 
(1,'rrr','fff','rrrrrrrrrrrrrrrrrrxxxxxxxxxxxxxxxxxfffffff',2,'','2018-11-16 08:54:38'),
(3,'etete','fff','eteteteteteteteggggggggggggggggg',5,'active','2018-11-16 08:54:30'),
(4,'qqqttt','fff','zzzzzzzzzzzzzzzzzzwwwqqqqqqqqqttttttt',3,'active','2018-11-16 08:54:08'),
(5,'etete','zzz','etetetetetetetzzzzzzzzzzzzzzzzzzzzz',4,'active','2018-11-16 08:53:50');

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
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `calendar` */

insert  into `calendar`(`id`,`title`,`requester`,`tour_type`,`days`,`start_date`,`finish_date`,`event_date`,`start_time`,`finish_time`,`location`,`description`,`activity_color`,`created_date`) values 
(13,'event6','afaf','Night Tour','Several Days','2018-11-07','2018-11-14','2018-11-08','15:33:00','21:08:00','location6','description of event6','#27AE60','2018-11-24 00:00:00'),
(14,'event6','afaf','Night Tour','Several Days','2018-11-07','2018-11-14','2018-11-09','15:33:00','21:08:00','location6','description of event6','#27AE60','2018-11-24 00:00:00'),
(15,'event6','afaf','Night Tour','Several Days','2018-11-07','2018-11-14','2018-11-10','15:33:00','21:08:00','location6','description of event6','#27AE60','2018-11-24 00:00:00'),
(16,'event6','afaf','Night Tour','Several Days','2018-11-07','2018-11-14','2018-11-11','15:33:00','21:08:00','location6','description of event6','#27AE60','2018-11-24 00:00:00'),
(17,'event6','afaf','Night Tour','Several Days','2018-11-07','2018-11-14','2018-11-12','15:33:00','21:08:00','location6','description of event6','#27AE60','2018-11-24 00:00:00'),
(19,'event6','afaf','Night Tour','Several Days','2018-11-07','2018-11-14','2018-11-14','15:33:00','21:08:00','location6','description of event6','#27AE60','2018-11-24 00:00:00'),
(20,'event1','abcd','Regional Tour','One Day','2018-11-12','2018-11-12','2018-11-12','11:11:00','14:22:00','location1','description of event1','#3498DB','2018-11-24 00:00:00'),
(21,'event2','heyrehber','Regional Tour','One Day','2018-11-24','2018-11-24','2018-11-24','11:11:00','18:06:00','location2','description of event2','#3498DB','2018-11-24 00:00:00'),
(22,'event3','bbb','Night Tour','Several Days','2018-11-10','2018-12-12','2018-11-10','18:03:00','20:02:00','location3','description of event3','#F1C40F','2018-11-24 00:00:00'),
(23,'event3','bbb','Night Tour','Several Days','2018-11-10','2018-12-12','2018-11-11','18:03:00','20:02:00','location3','description of event3','#F1C40F','2018-11-24 00:00:00'),
(24,'event3','bbb','Night Tour','Several Days','2018-11-10','2018-12-12','2018-11-12','18:03:00','20:02:00','location3','description of event3','#F1C40F','2018-11-24 00:00:00'),
(25,'my event1','abcd','Daily Tour','Several Days','2018-11-07','2018-11-09','2018-11-07','09:22:00','17:33:00','my location1','description of my event1','#F39C12','2018-11-24 00:00:00'),
(27,'my event','abcd','Daily Tour','Several Days','2018-11-07','2018-11-09','2018-11-09','10:22:00','15:33:00','my location','description of my event','#C0392B','2018-11-24 00:00:00'),
(28,'my event2','abcd','Daily Tour','One Day','2018-11-25','2018-11-25','2018-11-25','00:00:00','12:00:00','my location2','description of event2','#27AE60','2018-11-24 00:00:00'),
(29,'event4','abcd','Regional Tour','One Day','2018-11-26','2018-11-26','2018-11-26','08:00:00','17:00:00','location5','this is edited description of event4','#C0392B','2018-11-25 05:20:50');

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
(25,'sdsdgsg','s','e'),
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `guide_requests` */

insert  into `guide_requests`(`id`,`title`,`requester`,`range`,`regions`,`route`,`tour_type`,`guest_nationality`,`requested_language`,`guide_number`,`guest_number`,`start_date`,`finish_date`,`start_location`,`finish_location`,`description`,`created_date`) values 
(4,'guide request','heyrehber','Domestic','[\"Aegean\",\"Black Sea\"]','route1-route2-route3','Transfer','Russian','Russian',4,7,'0111-11-11','2222-02-22','start location','finish location','this is description','2018-11-21 05:41:37'),
(5,'guide request1','etet','Overseas','','route1-route2-route3','Night Tour','Chinese','Chinese',4,7,'1111-11-11','2222-02-22','start location','finish location','this is description1','2018-11-22 05:38:37'),
(6,'guide request2','etet','Domestic','[\"Aegean\",\"Black Sea\"]','route1-route2-route3-route4-route5','Transfer','Japanese','Japanese',4,12,'1111-11-11','2222-02-22','start location1','finish location1','  this is description1','2018-11-22 10:09:37'),
(7,'new request3','www','Domestic','[\"Eastern Anatolia\",\"Aegean\",\"South-Eastern Anatolia\",\"Marmara\"]','route9-route11','Regional Tour','US','English',11,4,'0111-11-11','3331-02-17','start location4','finish location5','this is description3','2018-11-22 09:14:45'),
(8,'request1','xxx','Domestic','[\"Aegean\",\"Black Sea\"]','route9-route11','Daily Tour','Japanese','Japanese',4,6,'2018-03-04','2018-03-09','start location1','finish location5','this is description6','2018-11-22 01:20:10'),
(9,'request2','xxx','Overseas','','route9-route11-route3','Night Tour','US','English',5,2,'2012-03-31','2012-04-02','start location1','finish location1',' this is description7','2018-11-22 01:23:45'),
(10,'request3','xxx','Domestic','[\"Mediterrianean\",\"Aegean\",\"South-Eastern Anatolia\",\"Black Sea\",\"Marmara\"]','route1-route3-route3','Daily Tour','Russian','Russian',2,7,'0011-11-11','2222-02-22','start location4','finish location5','This is description8','2018-11-22 01:25:08'),
(11,'abcd request','abcd','Domestic','[\"Aegean\",\"Black Sea\",\"Marmara\"]','route9-route11-route3','Night Tour','Japanese','Japanese',4,22,'2018-11-06','2018-11-09','start location4','finish location5',' abcd description','2018-11-26 01:00:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `guide_reviews` */

insert  into `guide_reviews`(`id`,`guide`,`agency`,`review`,`rating`,`status`,`submission_date`) values 
(1,'aaa','rrr','asdfasdfasdf',4,'active','2018-11-16 08:46:55'),
(2,'fff','qqqttt','asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfa',5,'active','2018-11-15 09:52:25'),
(3,'ggg','rrr','bbbbbbbbbbbbbbb',5,'active','2018-11-15 06:25:15'),
(4,'aaa','etete','eettttttttttttttttttttttttttttttttttteeeeeeeeee',1,'','2018-11-16 08:47:03'),
(6,'aaa','qqqttt','gggggggggggggttttttttttttttttttaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',2,'active','2018-11-16 08:46:46'),
(7,'fff','etete','asdfasdfasdfasdfasdf',4,'active','2018-11-18 05:22:04'),
(8,'bbb','rrr','bbbbbbbbbbrrrrrrrrrrrrrrrrrr',1,'active','2018-11-18 05:22:41'),
(9,'aaa','www','aaaaaaaaaaaawwwwwwwwwwaaaaaaaaaa',4,'','2018-11-16 08:41:31');

/*Table structure for table `guides` */

DROP TABLE IF EXISTS `guides`;

CREATE TABLE `guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `sirname` varchar(64) DEFAULT NULL,
  `certificate_number` varchar(64) DEFAULT NULL,
  `region` varchar(128) DEFAULT NULL,
  `languages` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `phone_number` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `certificate_front_picture` varchar(128) DEFAULT NULL,
  `certificate_back_picture` varchar(128) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `guides` */

insert  into `guides`(`id`,`name`,`sirname`,`certificate_number`,`region`,`languages`,`address`,`phone_number`,`email`,`password`,`photo`,`certificate_front_picture`,`certificate_back_picture`,`created_date`) values 
(12,'aaa','aaa','123123','aaa','[\"English\",\"Turkish\",\"Chinese\"]','asdfasdfasdfasdf','123123','a@a.com','d41d8cd98f00b204e9800998ecf8427e','uploads/guide/photo/images (3).png','uploads/guide/certificate_front/download (3).jpg','uploads/guide/certificate_back/download (3).jpg','2018-11-15 17:59:12'),
(13,'bbb','bbb','222','bbb','[\"English\",\"Turkish\"]','bbb','123123','b@b.com','08f8e0260c64418510cefb2b06eee5cd','uploads/guide/photo/download (1).jpg','uploads/guide/certificate_front/download (2).jpg','uploads/guide/certificate_back/download (2).jpg','2018-11-08 14:20:22'),
(15,'fff','fff','123123123','fffffff','[\"English\",\"Japanese\",\"Turkish\"]','fffffffff','123123123','f@f.com','343d9040a671c45832ee5381860e2996','uploads/guide/photo/download.jpg','uploads/guide/certificate_front/download (3).png','uploads/guide/certificate_back/download (3).png','2018-11-09 11:34:18'),
(16,'ggg','ggg','','','[\"English\",\"Turkish\"]','','','g@g.com','ba248c985ace94863880921d8900c53f','uploads/guide/photo/download.jpg','uploads/guide/certificate_front/download (1).jpg','uploads/guide/certificate_back/download (1).jpg','2018-11-09 14:26:12'),
(17,'hhh','hhh','','','[\"Turkish\",\"Japanese\"]','','','h@h.com','a3aca2964e72000eea4c56cb341002a4','uploads/guide/photo/download.jpg','uploads/guide/certificate_front/download (2).jpg','uploads/guide/certificate_back/download (2).jpg','2018-11-09 14:34:11'),
(18,'zzz','zzz','','','[\"Turkish\",\"Japanese\"]','','','z@z.com','f3abb86bd34cf4d52698f14c0da1dc60','uploads/guide/photo/download (1).jpg','uploads/guide/certificate_front/download (4).png','uploads/guide/certificate_back/download (4).png','2018-11-09 14:43:26'),
(19,'xxx','xxx','','','[\"English\",\"Turkish\"]','','','x@x.com','f561aaf6ef0bf14d4208bb46a4ccb3ad','uploads/guide/photo/download (3).png','uploads/guide/certificate_front/download (4).png','uploads/guide/certificate_back/download (4).png','2018-11-09 14:49:27'),
(32,'abcd','abcd','123123','abcd','[\"English\",\"Turkish\",\"Chinese\"]','abcd','123123','abcd@abcd.com','d41d8cd98f00b204e9800998ecf8427e','uploads/guide/photo/download (2).jpg','uploads/guide/certificate_front/download (2).jpg','uploads/guide/certificate_back/download (2).jpg','2018-11-12 16:35:40'),
(33,'afaf','afaf','1231241','asdfafasf','[\"Turkish\",\"Japanese\"]','afasdfasdf','123123','af@af.com','35abef9cacf725f2eb638651f4c90b2e','uploads/guide/photo/download.jpg','uploads/guide/certificate_front/download (3).jpg','uploads/guide/certificate_back/download (3).png','2018-11-12 17:05:07');

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

/*Table structure for table `museums` */

DROP TABLE IF EXISTS `museums`;

CREATE TABLE `museums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `summer_start_time` time DEFAULT NULL,
  `summer_end_time` time DEFAULT NULL,
  `winter_start_time` time DEFAULT NULL,
  `winter_end_time` time DEFAULT NULL,
  `summer_open_days` varchar(128) DEFAULT NULL,
  `winter_open_days` varchar(128) DEFAULT NULL,
  `entrance_price` float DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `web` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `number` varchar(64) DEFAULT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `contact_number` varchar(64) DEFAULT NULL,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `museums` */

insert  into `museums`(`id`,`name`,`description`,`summer_start_time`,`summer_end_time`,`winter_start_time`,`winter_end_time`,`summer_open_days`,`winter_open_days`,`entrance_price`,`address`,`city`,`country`,`web`,`email`,`number`,`contact_person`,`contact_number`,`status`) values 
(3,'ms1','this is first museum','11:11:00','14:22:00','15:33:00','16:44:00','[\"Monday\",\"Wednesday\",\"Friday\"]','[\"Tuesday\",\"Friday\",\"Saturday\",\"Sunday\"]',235.2,'address','sdtwet','Ecuador','web','mm@mm.com','213523','person','23523','deactive'),
(4,'ms3','this is third museum','11:11:00','14:22:00','15:33:00','16:44:00','[\"Monday\",\"Thursday\",\"Friday\",\"Sunday\"]','[\"Monday\",\"Wednesday\",\"Friday\",\"Saturday\"]',35.23,'address','sdrs','Russia','web','mt@mt.com','235','person2','35234234','active');

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
  `city` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `number` varchar(64) DEFAULT NULL,
  `web` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `contact_number` varchar(64) DEFAULT NULL,
  `contact_email` varchar(64) DEFAULT NULL,
  `logo` varchar(64) DEFAULT NULL,
  `status` varchar(64) NOT NULL,
  `provider_email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `restaurants` */

insert  into `restaurants`(`id`,`name`,`category`,`description`,`rating`,`legal_name`,`address`,`city`,`country`,`number`,`web`,`email`,`contact_person`,`contact_number`,`contact_email`,`logo`,`status`,`provider_email`) values 
(1,'res1','[\"Noodle\",\"Hamburger\",\"Salad\"]','asdfasdfasdfasdfasdf',4,'res1','asdfasdf','sdfs','Spain','3523522','sadfasdf','res@res.com','asdfasdfasd','235236523','asd@asd.com','uploads/restaurant/images (5).png','active','admin@admin.com'),
(2,'ressuggestion2','[\"Fish\",\"Sandwich\",\"Tea\"]','asdfasdfasdfasdfasdf',4,'etw23sdfasdf','address','sdfs','Bulgaria','23235234','asdfasdfasdfasdf','ressugg1@gmail.com','asdf','23352','ressuggperson2@gmail.com','uploads/restaurant/5bb9d4a8a3278ava-600x600.jpg','active','et@et.com'),
(3,'ressuggestion1','[\"Meat\"]','asdfasdfasdfasdf',5,'werwer','agasdrq','ruyartua','United Arab Emirates','234234','asdfasdt','ressugg2@gmail.com','asdtasdf','2352341','ressuggperson2@gmail.com','uploads/restaurant/Leon-recortado.jpg','active','et@et.com'),
(4,'ressuggestion3','[\"Fish\"]','asdfasdfasdfasdfasdfasdf',5,'asdfasdfasdf','qwerqwea','sdtwet','Russian Federation','235324','werasdfasd','ressugg3@gmail.com','asdfasdf','235234','ressuggperson3@gmail.com','uploads/restaurant/lion-drawing-wallpaper-60.jpg','active','x@x.com');

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
  `city` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `number` varchar(64) DEFAULT NULL,
  `web` varchar(64) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `contact_number` varchar(64) DEFAULT NULL,
  `contact_email` varchar(64) DEFAULT NULL,
  `logo` varchar(64) DEFAULT NULL,
  `status` varchar(64) NOT NULL,
  `provider_email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `shops` */

insert  into `shops`(`id`,`name`,`category`,`description`,`rating`,`legal_name`,`address`,`city`,`country`,`number`,`web`,`email`,`contact_person`,`contact_number`,`contact_email`,`logo`,`status`,`provider_email`) values 
(9,'dddddd','[\"Clothes\"]','ddddddddddddd',3,'ddddddd','ddddddd','d','Brazil','2342342','ddddddddddd','dd@dd.com','ddddd','1235235','ddd@ddd.com','uploads/shop/download (3).png','active','admin@admin.com'),
(10,'aaaaaaaa','[\"Leather\"]','aaaaaaaaaaaaaaaaa',4,'aaaaa','aaaaaaaaaa','sdfs','Brazil','1111111','aaaaaa','aa@aa.com','aaaaaa','11111111','aaa@aaa.com','uploads/shop/download (3).jpg','deactive','admin@admin.com'),
(11,'sssssssssss','[\"Bags\",\"Clothes\",\"Sports\",\"Drinks\"]','ssssssssssss',5,'ssssssss','ssssssssbbbbbbb','sdtwet','Spain','444444','sssss','ss@ss.com','bbssssssssbbbbbbbbbb','11111111','sss@sss.com','uploads/shop/download (2).png','active','admin@admin.com'),
(12,'shop1','[\"Carpets\",\"Handcraft\"]','asdfasdfasdfasdf',3,'shop1','shop1 address','sdrs','Angola','235','shop1 web','shop1@gmail.com','person1','2362342','person1@gmail.com','uploads/shop/download (3).png','deactive','et@et.com'),
(14,'shopsugg1','[\"Bags\",\"Furnitures\",\"Clothes\"]','asdfasdfasdfasdfasdfasdf',2,'asdf','address','sdtwet','Angola','123123','asdfasdf','shopsugg1@gmail.com','asdfasdf','235234','shopsugg1person@gmail.com','uploads/shop/Legendary Peterpan.jpg','deactive','et@et.com'),
(15,'shopsugg3','','asdfqwefasdasdf',4,'asdfasdf','sdfasdfasdf','yuiohty','Chile','qwerqdfasd','asdfasdf','shopsugg3@gmail.com','asdfasdf','23423','shopsugg3person@gmail.com','uploads/shop/Dmitri Maxim.jpg','active','qt@qt.com'),
(16,'shopsugg4','[\"Drinks\",\"Dish\"]','asdfasdfasdfasdfasdf',2,'asdfasdfas','asdfasdfasdf','sdfs','Angola','235234','asdfadsf','shopsugg4@gmail.com','asdfasdf','232341531','shopsugg4person@gmail.com','uploads/shop/large_4764ad52b10d0bfa3f62e8ff933f9658.jpg','deactive','x@x.com');

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
(1,'aaaaaaaaaa','1231231','help@gmail.com','yes','English','Turkish','Turkish','Turkish',30,3636363,100,'English','admin@admin.com',10,'mysite@gmail.com');

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

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`role`,`created_date`) values 
(1,'heyrehber','admin@admin.com','21232f297a57a5a743894a0e4a801fc3',0,'2018-11-07 02:40:00'),
(22,'aaa','a@a.com','d41d8cd98f00b204e9800998ecf8427e',4,'2018-11-15 17:59:12'),
(23,'bbb','b@b.com','08f8e0260c64418510cefb2b06eee5cd',4,'2018-11-08 14:20:22'),
(25,'qqqttt','qt@qt.com','e85823b4e7db1064f4301e1c74978199',3,'2018-11-12 18:46:31'),
(26,'ddd','d@d.com','77963b7a931377ad4ab5ad6a9cd718aa',4,'2018-11-08 15:49:38'),
(27,'www','w@w.com','4eae35f1b35977a00ebd8086c259d4c9',3,'2018-11-08 16:09:05'),
(38,'fff','f@f.com','343d9040a671c45832ee5381860e2996',4,'2018-11-09 11:34:18'),
(44,'rrr','r@r.com','44f437ced647ec3f40fa0841041871cd',3,'2018-11-09 12:31:12'),
(45,'ggg','g@g.com','ba248c985ace94863880921d8900c53f',4,'2018-11-09 14:26:12'),
(46,'hhh','h@h.com','a3aca2964e72000eea4c56cb341002a4',4,'2018-11-09 14:34:11'),
(47,'zz','z@z.com','f3abb86bd34cf4d52698f14c0da1dc60',4,'2018-11-09 14:43:26'),
(48,'xxx','x@x.com','f561aaf6ef0bf14d4208bb46a4ccb3ad',4,'2018-11-09 14:49:27'),
(49,'vvv','v@v.com','4786f3282f04de5b5c7317c490c6d922',4,'2018-11-09 14:52:29'),
(61,'abcd','abcd@abcd.com','e2fc714c4727ee9395f324cd2e7f331f',4,'2018-11-12 16:35:40'),
(62,'afaf','af@af.com','35abef9cacf725f2eb638651f4c90b2e',4,'2018-11-12 17:05:07'),
(70,'etet','et@et.com','4de1b7a4dc53e4a84c25ffb7cdb580ee',3,'2018-11-12 19:13:24'),
(74,'','super3@gmail.com','85511dc944c3765338deb0b3ad38e907',1,'2018-11-17 06:30:46'),
(75,'','super4@gmail.com','d41d8cd98f00b204e9800998ecf8427e',1,'2018-11-17 06:58:25'),
(76,'','super5@gmail.com','f2d47c40507a9161af34a94afd6a3e5b',1,'2018-11-17 06:59:10'),
(77,'','super2@gmail.com','94efeff594eba1241014e55bd8c5c283',1,'2018-11-17 07:01:24'),
(78,'','editor1@gmail.com','c9330587565205a5b8345f60c620ecc6',1,'2018-11-17 10:49:25'),
(79,'','editor2@gmail.com','d41d8cd98f00b204e9800998ecf8427e',2,'2018-11-17 10:58:04'),
(80,'new agency','agency1@gmail.com','3bfb04fca479ac4a8d4ddd4b02868fd0',3,'2018-11-22 05:46:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
