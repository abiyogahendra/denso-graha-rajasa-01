/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.20-MariaDB : Database - denso_graha_rajasa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`denso_graha_rajasa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `denso_graha_rajasa`;

/*Table structure for table `car` */

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `carID` int(11) NOT NULL AUTO_INCREMENT,
  `license` varchar(10) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`carID`),
  KEY `CONST_CAR_CATEGORY_ID` (`categoryID`),
  KEY `CONST_CAR_BRAND` (`brandID`),
  KEY `CONST_CAR_USER_CREATE` (`created_by`),
  CONSTRAINT `CONST_CAR_BRAND` FOREIGN KEY (`brandID`) REFERENCES `car_brand` (`brandID`),
  CONSTRAINT `CONST_CAR_CATEGORY_ID` FOREIGN KEY (`categoryID`) REFERENCES `car_category` (`categoryID`),
  CONSTRAINT `CONST_CAR_USER_CREATE` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `car` */

/*Table structure for table `car_brand` */

DROP TABLE IF EXISTS `car_brand`;

CREATE TABLE `car_brand` (
  `brandID` int(11) NOT NULL AUTO_INCREMENT,
  `brndName` varchar(10) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`brandID`),
  KEY `CONST_BRAND_USER_CREATED` (`created_by`),
  CONSTRAINT `CONST_BRAND_USER_CREATED` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `car_brand` */

insert  into `car_brand`(`brandID`,`brndName`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'MITSUBISHI','2023-02-16','13022023','2023-02-16','13022023'),
(2,'HONDA','2023-02-20','13022023','2023-02-20','13022023'),
(3,'TOYOTA','2023-02-20','13022023','2023-02-20','13022023');

/*Table structure for table `car_category` */

DROP TABLE IF EXISTS `car_category`;

CREATE TABLE `car_category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `ctgName` varchar(20) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoryID`),
  KEY `CONST_CATEGORY_USER_CREATED` (`created_by`),
  CONSTRAINT `CONST_CATEGORY_USER_CREATED` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `car_category` */

insert  into `car_category`(`categoryID`,`ctgName`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'TRUCK','2023-02-16','13022023','2023-02-16','13022023'),
(2,'CEDAN','2023-02-17','13022023','2023-02-17','13022023'),
(3,'Jeep','2023-02-20','13022023','2023-02-20','13022023'),
(4,'BUS','2023-02-20','13022023','2023-02-20','13022023'),
(5,'Container','2023-02-20','13022023','2023-02-20','13022023'),
(8,'Big Container','2023-02-20','13022023','2023-02-20','13022023'),
(9,'Mainan','2023-02-25','13022023','2023-02-25','13022023');

/*Table structure for table `car_maintain_brand_category` */

DROP TABLE IF EXISTS `car_maintain_brand_category`;

CREATE TABLE `car_maintain_brand_category` (
  `carMaintainID` int(11) NOT NULL AUTO_INCREMENT,
  `carName` varchar(30) NOT NULL,
  `brandID` int(11) NOT NULL,
  `ctgryID` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`carMaintainID`),
  KEY `CONST_MAINTAINCAR_BRANDCAR` (`brandID`),
  KEY `CONST_MAINTAINCAR_CATEGORY` (`ctgryID`),
  KEY `CONST_MAINTAINCAR_USERID` (`created_by`),
  CONSTRAINT `CONST_MAINTAINCAR_BRANDCAR` FOREIGN KEY (`brandID`) REFERENCES `car_brand` (`brandID`),
  CONSTRAINT `CONST_MAINTAINCAR_CATEGORY` FOREIGN KEY (`ctgryID`) REFERENCES `car_category` (`categoryID`),
  CONSTRAINT `CONST_MAINTAINCAR_USERID` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `car_maintain_brand_category` */

insert  into `car_maintain_brand_category`(`carMaintainID`,`carName`,`brandID`,`ctgryID`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Fusa',1,1,'2023-02-17','13022023','2023-02-20','13022023'),
(2,'Lencer',1,2,'2023-02-17','13022023','2023-02-20','13022023'),
(4,'Fuso',1,1,'2023-02-20','13022023','2023-02-20','13022023'),
(10,'a',1,1,'2023-02-20','13022023','2023-02-20','13022023'),
(11,'asda',2,2,'2023-02-21','13022023','2023-02-21','13022023'),
(12,'adawdasd',3,1,'2023-02-21','13022023','2023-02-21','13022023'),
(13,'asdadsdad',3,4,'2023-02-21','13022023','2023-02-21','13022023'),
(14,'asdsdasdad',2,8,'2023-02-21','13022023','2023-02-21','13022023'),
(15,'adawdad',2,8,'2023-02-21','13022023','2023-02-21','13022023'),
(16,'asxasxxa',1,4,'2023-02-21','13022023','2023-02-21','13022023'),
(17,'xsaaxasx',2,5,'2023-02-21','13022023','2023-02-21','13022023'),
(18,'asssssssss',1,2,'2023-02-21','13022023','2023-02-21','13022023');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `custName` varchar(20) NOT NULL,
  `custAddress` varchar(50) NOT NULL,
  `custEmail` varchar(30) DEFAULT '-',
  `custNumber` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`customerID`),
  UNIQUE KEY `CONST_CUSTOMER_EMAIL_UNIQUE` (`custEmail`),
  KEY `CONST_CUSTOMER_USER_CREATED` (`created_by`),
  CONSTRAINT `CONST_CUSTOMER_USER_CREATED` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`customerID`,`custName`,`custAddress`,`custEmail`,`custNumber`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'abiyoga','kepuh','abiyoga@gmail.com','082154926473','2023-02-17','14022023','2023-02-17','14022023'),
(2,'hendra','pohruboh','hendra@gmail.com','088232123182','2023-02-17','13022023','2023-02-17','13022023'),
(7,'Wijaya','Jakarta','wijyaa@gmail.com','082154926473','2023-02-18','13022023','2023-02-18','13022023'),
(14,'Rozak','Depok','Rozak@gmail.com','09892879832','2023-02-19','13022023','2023-02-19','13022023'),
(15,'asdadadasda','sdasdsadasdadada','asdaw@dawd.com','082153827384/98762364723984','2023-02-25','13022023','2023-02-25','13022023'),
(16,'joko','widodo','asda@gmail.com','0821547392893 / 92837498729387','2023-03-07','13022023','2023-03-07','13022023'),
(18,'joko','widodo','asdass@gmail.com','0821547392893 / 92837498729387','2023-03-07','13022023','2023-03-07','13022023'),
(22,'asdasda','asdasdasdasd','asdasdasdasdsadasdada','adasdasdasdasd','2023-03-07','13022023','2023-03-07','13022023'),
(23,'asdsadsadas','asdasdada','asddwada!@adadaw','wdawdadada','2023-06-20','13022023','2023-06-20','13022023'),
(24,'abigoya','jakarta','asnda!@asdan.com','0192379728312','2023-06-25','25052023','2023-06-25','25052023'),
(25,'abiyoga','asd','asda!@gmail.com','08213213123','2023-07-31','13022023','2023-07-31','13022023');

/*Table structure for table `dtl_cmpln_txn` */

DROP TABLE IF EXISTS `dtl_cmpln_txn`;

CREATE TABLE `dtl_cmpln_txn` (
  `cmplntID` int(11) NOT NULL,
  `hdrTxnID` varchar(30) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `measure` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cmplntID`,`hdrTxnID`),
  KEY `CONST_DTLCMPLN_HDRTXN` (`hdrTxnID`),
  KEY `CONST_DTLCMPLN_USER_CREATE` (`created_by`),
  CONSTRAINT `CONST_DTLCMPLN_HDRTXN` FOREIGN KEY (`hdrTxnID`) REFERENCES `hdr_transaction` (`hdrTransactionID`),
  CONSTRAINT `CONST_DTLCMPLN_USER_CREATE` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dtl_cmpln_txn` */

insert  into `dtl_cmpln_txn`(`cmplntID`,`hdrTxnID`,`complaint`,`measure`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(0,'CST-23-dasdasdas-200623-10:46','adsadasd','dsdasdasda','2023-06-20','13022023','2023-06-20','13022023'),
(0,'CST-24-asdasdad-250623-22:39','asdsada','sadsdas','2023-06-25','25052023','2023-06-25','25052023'),
(0,'CST-25-aaaa-310723-20:59','a','a','2023-07-31','13022023','2023-07-31','13022023');

/*Table structure for table `dtl_cost_txn` */

DROP TABLE IF EXISTS `dtl_cost_txn`;

CREATE TABLE `dtl_cost_txn` (
  `costID` int(11) NOT NULL,
  `hdrTxnID` varchar(30) NOT NULL,
  `partName` varchar(50) NOT NULL,
  `partNumber` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `totalCost` bigint(20) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`costID`,`hdrTxnID`),
  KEY `CONST_DTLCOSTTXN_HDRTXN` (`hdrTxnID`),
  KEY `CONST_DTLCOSTTXN_USER_CREATE` (`created_by`),
  CONSTRAINT `CONST_DTLCOSTTXN_HDRTXN` FOREIGN KEY (`hdrTxnID`) REFERENCES `hdr_transaction` (`hdrTransactionID`),
  CONSTRAINT `CONST_DTLCOSTTXN_USER_CREATE` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dtl_cost_txn` */

insert  into `dtl_cost_txn`(`costID`,`hdrTxnID`,`partName`,`partNumber`,`qty`,`totalCost`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(0,'CST-23-dasdasdas-200623-10:46','asdsadasd','asdasdawd',123123,12,'2023-06-20','13022023','2023-06-20','13022023'),
(0,'CST-24-asdasdad-250623-22:39','asdasda','sdasdasda',123123,1231,'2023-06-25','25052023','2023-06-25','25052023'),
(0,'CST-25-aaaa-310723-20:59','a','a',1,11,'2023-07-31','13022023','2023-07-31','13022023');

/*Table structure for table `dtl_mchnc_txn` */

DROP TABLE IF EXISTS `dtl_mchnc_txn`;

CREATE TABLE `dtl_mchnc_txn` (
  `mechID` int(11) NOT NULL,
  `hdrTxnID` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT '-',
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mechID`,`hdrTxnID`),
  KEY `CONST_DTLMCHNCTXN_HDRTXN` (`hdrTxnID`),
  KEY `CONST_DTLMCHNCTXN_USER` (`created_by`),
  CONSTRAINT `CONST_DTLMCHNCTXN_HDRTXN` FOREIGN KEY (`hdrTxnID`) REFERENCES `hdr_transaction` (`hdrTransactionID`),
  CONSTRAINT `CONST_DTLMCHNCTXN_MCHNC` FOREIGN KEY (`mechID`) REFERENCES `mechanic` (`mechanicID`),
  CONSTRAINT `CONST_DTLMCHNCTXN_USER` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dtl_mchnc_txn` */

insert  into `dtl_mchnc_txn`(`mechID`,`hdrTxnID`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'CST-25-aaaa-310723-20:59','-','2023-07-31','13022023','2023-07-31','13022023'),
(3,'CST-23-dasdasdas-200623-10:46','-','2023-06-20','13022023','2023-06-20','13022023'),
(3,'CST-24-asdasdad-250623-22:39','-','2023-06-25','25052023','2023-06-25','25052023');

/*Table structure for table `dtl_srvc_cost_txn` */

DROP TABLE IF EXISTS `dtl_srvc_cost_txn`;

CREATE TABLE `dtl_srvc_cost_txn` (
  `srvcID` int(11) NOT NULL,
  `hdrTxnID` varchar(30) NOT NULL,
  `srvcName` varchar(255) NOT NULL,
  `srvcCost` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`srvcID`,`hdrTxnID`),
  KEY `CONST_SRVCCSTTXN_HDRTXN` (`hdrTxnID`),
  KEY `CONST_SRVCCSTTXN_USERID` (`created_by`),
  CONSTRAINT `CONST_SRVCCSTTXN_HDRTXN` FOREIGN KEY (`hdrTxnID`) REFERENCES `hdr_transaction` (`hdrTransactionID`),
  CONSTRAINT `CONST_SRVCCSTTXN_USERID` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dtl_srvc_cost_txn` */

insert  into `dtl_srvc_cost_txn`(`srvcID`,`hdrTxnID`,`srvcName`,`srvcCost`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(0,'CST-23-dasdasdas-200623-10:46','zcczddawd',121312123,'2023-06-20','13022023','2023-06-20','13022023'),
(0,'CST-24-asdasdad-250623-22:39','asdadsasad',2131232131,'2023-06-25','25052023','2023-06-25','25052023'),
(0,'CST-25-aaaa-310723-20:59','aa',111,'2023-07-31','13022023','2023-07-31','13022023');

/*Table structure for table `hdr_transaction` */

DROP TABLE IF EXISTS `hdr_transaction`;

CREATE TABLE `hdr_transaction` (
  `hdrTransactionID` varchar(30) NOT NULL,
  `txnDate` date NOT NULL,
  `estimationDate` date NOT NULL,
  `custID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `carEngnNumber` varchar(20) NOT NULL DEFAULT '-',
  `carfrmNumber` varchar(20) NOT NULL DEFAULT '-',
  `miles` int(11) NOT NULL DEFAULT 0,
  `hourMeter` int(11) NOT NULL DEFAULT 0,
  `carYear` int(4) NOT NULL DEFAULT 0,
  `licensePlate` varchar(15) NOT NULL DEFAULT '-',
  `techLeadID` int(11) NOT NULL,
  `totalPayment` bigint(20) NOT NULL,
  `site` varchar(1) NOT NULL DEFAULT 'Z',
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`hdrTransactionID`),
  KEY `CONST_HDRTXN_CUST_CUSTID` (`custID`),
  KEY `CONST_HDRTXN_TECHLEAD` (`techLeadID`),
  KEY `CONST_HDRTXN_USER_CREATE` (`created_by`),
  KEY `CONST_HDRTXN_CAR` (`carID`),
  CONSTRAINT `CONST_HDRTXN_CAR` FOREIGN KEY (`carID`) REFERENCES `car_maintain_brand_category` (`carMaintainID`),
  CONSTRAINT `CONST_HDRTXN_CUST_CUSTID` FOREIGN KEY (`custID`) REFERENCES `customer` (`customerID`),
  CONSTRAINT `CONST_HDRTXN_TECHLEAD` FOREIGN KEY (`techLeadID`) REFERENCES `technical_lead` (`tchLeadID`),
  CONSTRAINT `CONST_HDRTXN_USER_CREATE` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `hdr_transaction` */

insert  into `hdr_transaction`(`hdrTransactionID`,`txnDate`,`estimationDate`,`custID`,`carID`,`carEngnNumber`,`carfrmNumber`,`miles`,`hourMeter`,`carYear`,`licensePlate`,`techLeadID`,`totalPayment`,`site`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
('CST-23-dasdasdas-200623-10:46','2023-02-25','2023-06-14',23,2,'dasdadsada','adadasda',2123123123,312123121,31231231,'dasdasdas',6,136296455,'G','2023-06-20','13022023','2023-06-20','13022023'),
('CST-24-asdasdad-250623-22:39','2023-06-03','2023-06-20',24,2,'dasdasdasd','sdasda',232131,213213,1231231,'asdasdad',6,2533904164,'C','2023-06-25','25052023','2023-06-25','25052023'),
('CST-25-aaaa-310723-20:59','2023-07-01','2023-07-26',25,17,'aaa','aaa',7,6,9,'aaaa',13,136,'G','2023-07-31','13022023','2023-07-31','13022023');

/*Table structure for table `maintain_user_role` */

DROP TABLE IF EXISTS `maintain_user_role`;

CREATE TABLE `maintain_user_role` (
  `usrrlID` int(11) NOT NULL AUTO_INCREMENT,
  `roleID` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'T',
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`usrrlID`),
  KEY `CONST_MAINTAINUSERROLE_USER_ID` (`userID`),
  KEY `CONST_MAINTAINUSERROLE_USER_CREATEDBY` (`created_by`),
  KEY `CONST_MAINTAINUSERROLE_ROLE_ID` (`roleID`),
  CONSTRAINT `CONST_MAINTAINUSERROLE_ROLE_ID` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`),
  CONSTRAINT `CONST_MAINTAINUSERROLE_USER_CREATEDBY` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`),
  CONSTRAINT `CONST_MAINTAINUSERROLE_USER_ID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `maintain_user_role` */

insert  into `maintain_user_role`(`usrrlID`,`roleID`,`userID`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'SP_ADM_160223_1','13022023','F','2023-02-16','13022023','2023-02-23','13022023'),
(2,'LW_ADM_160223_1','13022023','T','2023-02-21','13022023','2023-02-21','13022023'),
(3,'LW_ADM_160223_1','13022023','T','2023-02-21','13022023','2023-02-21','13022023'),
(4,'sd','12312213121','T','2023-02-22','asdasd','2023-02-23','13022023'),
(5,'awdasd','13022023','T','2023-02-22','asdasd','2023-02-22','asdasd'),
(6,'adwad','12312213121','T','2023-02-22','asdasd','2023-02-22','asdasd');

/*Table structure for table `mechanic` */

DROP TABLE IF EXISTS `mechanic`;

CREATE TABLE `mechanic` (
  `mechanicID` int(11) NOT NULL AUTO_INCREMENT,
  `mechanicName` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'T',
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mechanicID`),
  KEY `CONST_MCNC_USER_CREATE` (`created_by`),
  CONSTRAINT `CONST_MCNC_USER_CREATE` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mechanic` */

insert  into `mechanic`(`mechanicID`,`mechanicName`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'ABIYOGA','T','2023-02-17','13022023','2023-02-21','13022023'),
(2,'HENDRA','F','2023-02-17','13022023','2023-02-22','13022023'),
(3,'WIJAYA','F','2023-02-17','13022023','2023-03-04','13022023'),
(4,'Kusdi','F','2023-02-20','13022023','2023-03-04','13022023'),
(5,'Rano','F','2023-02-20','13022023','2023-03-04','13022023'),
(6,'dasdad','F','2023-02-21','13022023','2023-03-04','13022023'),
(7,'asdad','F','2023-02-21','13022023','2023-03-04','13022023'),
(8,'asdsdad','F','2023-02-21','13022023','2023-02-21','13022023'),
(9,'asd','F','2023-02-21','13022023','2023-02-21','13022023'),
(10,'asdasdad','F','2023-02-21','13022023','2023-02-21','13022023'),
(11,'asdadsadda','F','2023-02-21','13022023','2023-03-04','13022023'),
(12,'adawdawdadada','F','2023-02-21','13022023','2023-02-22','13022023');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `roleID` varchar(20) NOT NULL,
  `roleDescription` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`roleID`),
  KEY `CONST_ROLE_USER_UPDATED` (`updated_by`),
  KEY `CONST_ROLE_USER_CREATED` (`created_by`),
  CONSTRAINT `CONST_ROLE_USER_CREATED` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`),
  CONSTRAINT `CONST_ROLE_USER_UPDATED` FOREIGN KEY (`updated_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `role` */

insert  into `role`(`roleID`,`roleDescription`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
('adwad','dadwdasda','2023-02-22','13022023','2023-02-22','13022023'),
('asdawdsada','wdsadwdawd','2023-02-22','13022023','2023-02-22','13022023'),
('awdada','awdwdad','2023-02-22','13022023','2023-02-22','13022023'),
('awdadaa','asada','2023-02-22','13022023','2023-02-22','13022023'),
('awdasd','awdsadaw','2023-02-22','13022023','2023-02-22','13022023'),
('ds','adwdasd','2023-02-22','13022023','2023-02-22','13022023'),
('dwadwa','wdwad','2023-02-22','13022023','2023-02-22','13022023'),
('LW_ADM_160223_1','Low Admin','2023-02-16','13022023','2023-02-16','13022023'),
('sd','dw','2023-02-22','13022023','2023-02-22','13022023'),
('SP_ADM_160223_1','Super Admin 1','2023-02-16','13022023','2023-02-16','13022023');

/*Table structure for table `technical_lead` */

DROP TABLE IF EXISTS `technical_lead`;

CREATE TABLE `technical_lead` (
  `tchLeadID` int(11) NOT NULL AUTO_INCREMENT,
  `tchLeadName` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'T',
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tchLeadID`),
  KEY `CONST_TCHLD_USER_CREATE` (`created_by`),
  CONSTRAINT `CONST_TCHLD_USER_CREATE` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `technical_lead` */

insert  into `technical_lead`(`tchLeadID`,`tchLeadName`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Mr. Abiyoga Hendra Wijaya','F','2023-02-17','13022023','2023-02-17','13022023'),
(2,'Prof. Abiyoga Hendra Wijaya','F','2023-02-17','13022023','2023-02-17','13022023'),
(3,'Mr. Abiyoga Hendra Wijaya','F','2023-02-20','13022023','2023-02-20','13022023'),
(4,'Prof. Abiyoga Hendra Wijaya','F','2023-02-20','13022023','2023-02-20','13022023'),
(5,'Mr. Abiyoga Hendra Wijaya','F','2023-02-20','13022023','2023-02-20','13022023'),
(6,'Prof. Abiyoga Hendra Wijaya','F','2023-02-20','13022023','2023-02-20','13022023'),
(13,'Ms. Siwi Indarto Spd','T','2023-07-05','13022023','2023-07-05','13022023');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userID` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `site` varchar(1) NOT NULL DEFAULT 'G',
  `status` varchar(1) NOT NULL DEFAULT 'T',
  `created_at` date NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `CONST_USER_CREATED` (`created_by`),
  KEY `CONST_USER_UPDATED` (`updated_by`),
  CONSTRAINT `CONST_USER_CREATED` FOREIGN KEY (`created_by`) REFERENCES `user` (`userID`),
  CONSTRAINT `CONST_USER_UPDATED` FOREIGN KEY (`updated_by`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`userID`,`username`,`password`,`site`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
('12312213121','aaaaaa','$2y$10$VlBj1npk96ftMXO3dAiYBuP9KvW7NWFxh1bNdzp9D/yMPm2RZfNkG','G','T','2023-02-22','13022023','2023-02-22','13022023'),
('13022023','Denso2022','$2y$10$scGi5.7KnkvxsyrETWluUuoylHayxJXhrwPD3QcUB4szXb0q5V8hm','G','T','2023-02-13','13022023','2023-02-22','13022023'),
('14022023','Graha2022','$2y$10$uO21cJdRnt70OQ3CsP3I5.BkKrSZr4xDKojwTvCehMz3UdOGNOsym','G','T','2023-02-14','13022023','2023-02-22','13022023'),
('15022023','Rajasa2022','$2y$10$5HD/gN5jQzYipp5LjOtv5u.ngqZKORTxxBfVGWtU2Y/PQOcdNnm4e','G','T','2023-02-14','13022023','2023-02-22','asdasd'),
('25052023','cokrominoto','$2y$10$KoxkdWI7otdCY4afePrS5.MoJOkN23Qj0gPV9TqMUIv/jhcn69ISO','C','T','2023-06-25','13022023',NULL,NULL),
('asdasd','asdadad','$2y$10$mGBne2IoQ3zV88kFou0oFOjJjuhqWBTbjcdCvZTHp0p5nTUYUChBG','G','T','2023-02-22','13022023','2023-02-22','asdasd'),
('sdada','dsadasd','$2y$10$7svos1.g86YssvHnUC/2ResAhe2wVnw99mnlV3WHPw95xBr/xYkAW','G','T','2023-02-22','13022023','2023-02-22','13022023'),
('USRGD1','Gudang2','$2y$10$z7F/cVcJDg9meyKtb3G7qO5jwT/NsHxjKG39J8UKGZeuWtdq5vcKq','G','T','2023-02-16','13022023','2023-02-22','13022023');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
