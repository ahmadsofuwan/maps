/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.1.38-MariaDB : Database - stock
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`stock` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `stock`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`pkey`,`username`,`name`,`password`,`role`,`img`) values 
(1,'admin','yayan','0192023a7bbd73250516f069df18b500',1,''),
(5,'yayan1','Guru','0192023a7bbd73250516f069df18b500',2,''),
(8,'adminn2','test','d41d8cd98f00b204e9800998ecf8427e',2,'');

/*Table structure for table `close` */

DROP TABLE IF EXISTS `close`;

CREATE TABLE `close` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `itemkey` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `laststock` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `close` */

insert  into `close`(`pkey`,`itemkey`,`time`,`laststock`) values 
(9,9,'1657026320','2207'),
(10,10,'1657026320','200'),
(11,11,'1657026320','0'),
(12,12,'1657026320','0'),
(13,9,'1657094315','2207'),
(14,10,'1657094315','200'),
(15,11,'1657094315','0'),
(16,12,'1657094315','0'),
(17,9,'1658768400','2198'),
(18,10,'1658768400','198'),
(19,11,'1658768400','132'),
(20,12,'1658768400','0'),
(21,9,'1658768400','2218'),
(22,10,'1658768400','198'),
(23,11,'1658768400','132'),
(24,12,'1658768400','0');

/*Table structure for table `detail_itemout` */

DROP TABLE IF EXISTS `detail_itemout`;

CREATE TABLE `detail_itemout` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `itemkey` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `use` int(11) DEFAULT '0',
  `countreturn` int(11) DEFAULT '0',
  `note` text,
  `timedate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_itemout` */

insert  into `detail_itemout`(`pkey`,`refkey`,`itemkey`,`count`,`use`,`countreturn`,`note`,`timedate`) values 
(1,23,10,1,0,0,NULL,'1658854800'),
(2,23,10,1,0,0,NULL,'1658854800'),
(4,25,9,1,1,0,'','1658854800'),
(5,26,9,22,0,0,NULL,'1658854800');

/*Table structure for table `detail_itemoutworker` */

DROP TABLE IF EXISTS `detail_itemoutworker`;

CREATE TABLE `detail_itemoutworker` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `refkey` int(11) DEFAULT NULL,
  `workerkey` int(11) DEFAULT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_itemoutworker` */

insert  into `detail_itemoutworker`(`pkey`,`refkey`,`workerkey`) values 
(1,23,22),
(2,23,22),
(4,25,22),
(5,26,23);

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `unitname` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `typekey` int(11) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`pkey`,`name`,`unitname`,`stock`,`typekey`,`createon`,`time`,`status`) values 
(9,'kable','M',2218,7,1,'1656758206',0),
(10,'kable','M',198,8,1,'1656758214',0),
(11,'odp','pcs',132,7,1,'1657002388',0),
(12,'sandal','pcs',0,9,1,'1657014555',0);

/*Table structure for table `itemin` */

DROP TABLE IF EXISTS `itemin`;

CREATE TABLE `itemin` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `itemkey` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `note` text,
  `status` varchar(255) DEFAULT '0',
  `workerkey` int(11) DEFAULT NULL,
  `teamkey` int(11) DEFAULT NULL,
  `timedate` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `itemin` */

insert  into `itemin`(`pkey`,`itemkey`,`count`,`createon`,`time`,`note`,`status`,`workerkey`,`teamkey`,`timedate`) values 
(13,'9',2000,1,'1656758241',NULL,'1',NULL,NULL,NULL),
(14,'10',200,1,'1656758317',NULL,'1',NULL,NULL,NULL),
(15,'9',200,1,'1657002548',NULL,'1',NULL,NULL,NULL),
(16,'9',7,1,'1657022292',NULL,'1',NULL,NULL,NULL),
(17,'9',2,1,'1657022766',NULL,'1',NULL,NULL,NULL),
(20,'9',12,1,'1657179884','ascasc','1',22,22,NULL),
(21,'9',4,1,'1657612536','fggndfnsdfsffsdsds','1',22,22,NULL),
(22,'11',132,1,'1658860656','asc','1',22,22,'1658854800'),
(23,'9',21,1,'1658861152','asca','1',22,22,'1658854800');

/*Table structure for table `itemout` */

DROP TABLE IF EXISTS `itemout`;

CREATE TABLE `itemout` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `note` text,
  `status` int(11) DEFAULT '0',
  `teamkey` int(11) DEFAULT NULL,
  `returncreaton` int(11) DEFAULT NULL,
  `timedate` varchar(255) DEFAULT NULL,
  `return` int(11) DEFAULT '0',
  `returntime` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `itemout` */

insert  into `itemout`(`pkey`,`createon`,`time`,`note`,`status`,`teamkey`,`returncreaton`,`timedate`,`return`,`returntime`) values 
(25,1,'1658860170','ascas',1,22,1,'1658854800',1,'1658861089'),
(26,1,'1658860180','',1,23,NULL,'1658854800',0,NULL);

/*Table structure for table `itemtype` */

DROP TABLE IF EXISTS `itemtype`;

CREATE TABLE `itemtype` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `itemtype` */

insert  into `itemtype`(`pkey`,`name`,`createon`,`time`,`status`) values 
(7,'Baru',1,'1656758031',1),
(8,'bekas',1,'1656758038',1);

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `log` text,
  `time` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `logs` */

insert  into `logs`(`pkey`,`name`,`log`,`time`) values 
(11,'barang masuk','yayan melakukan perubahan barang masuk tanggal 02/07/2022 17:36 kable_Baru Id_Transaksi :17','1657022766'),
(12,'barang masuk','yayan melakukan input barang masuk kable_Baru sebanyak :2 M','1657094670'),
(13,'barang masuk','yayan melakukan perubahan barang masuk tanggal 02/07/2022 17:36 kable_Baru Id_Transaksi :18','1657094714'),
(14,'barang masuk','yayan melakukan penghapusan barang masuk dengan data : kable_Baru jumlah_barang : 1 Catatan :testing Tanggal : 06/07/2022 15:05','1657094744'),
(15,'barang keluar','yayan melakukan pengeluaran barang kable_Baru sebanyak :1','1657094782'),
(16,'barang keluar','yayan melakukan pengeluaran barang kable_Baru sebanyak :2','1657094879'),
(17,'Teknisi','yayan Menambah teknisi yayan','1657178272'),
(18,'Teknisi','yayan Menambah teknisi ascasc','1657178545'),
(19,'Team','yayan Menambah team malam','1657178798'),
(20,'Team','yayan Menambah team ascasc','1657178824'),
(21,'barang masuk','yayan melakukan input barang masuk kable_Baru sebanyak :12 M','1657179725'),
(22,'barang masuk','yayan melakukan penghapusan barang masuk dengan data : kable_Baru jumlah_barang : 12 Catatan :ASCA Tanggal : 07/07/2022 14:42','1657179871'),
(23,'barang masuk','yayan melakukan input barang masuk kable_Baru sebanyak :12 M','1657179884'),
(24,'Team','yayan mengubah Team pagi menjadi pagi','1657182457'),
(25,'Teknisi','yayan Menambah teknisi grwrh','1657612426'),
(26,'barang masuk','yayan melakukan input barang masuk kable_Baru sebanyak :4 M','1657612536'),
(27,'barang keluar','yayan menambah data barang keluar dengan id : 23','1658859610'),
(28,'barang keluar','yayan menambah data barang keluar dengan id : 24','1658859917'),
(29,'barang keluar','yayan menghapus data  \\r\\nteam :malam  \\r\\nnote :asac  \\r\\nBarang : \\r\\nkable_Baru: 1 M \\r\\nTeknisi : \\r\\nyayan \\r\\n','1658860144'),
(30,'barang keluar','yayan menambah data barang keluar dengan id : 25','1658860170'),
(31,'barang keluar','yayan menambah data barang keluar dengan id : 26','1658860180'),
(32,'barang masuk','yayan melakukan input barang masuk odp_Baru sebanyak :132 pcs','1658860656'),
(33,'barang masuk','yayan melakukan input barang masuk kable_Baru sebanyak :21 M','1658861152');

/*Table structure for table `profile_company` */

DROP TABLE IF EXISTS `profile_company`;

CREATE TABLE `profile_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `titlelogin` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profile_company` */

insert  into `profile_company`(`id`,`name`,`alamat`,`telepon`,`phone`,`titlelogin`,`logo`,`title`) values 
(1,'Stock BBN','testing','2345423','234532','Stock BBN','logo.png','Stock');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`pkey`,`name`) values 
(1,'Super Admin'),
(2,'Admin');

/*Table structure for table `team` */

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `team` */

insert  into `team`(`pkey`,`name`,`createon`,`time`) values 
(22,'malam',1,'1657178798'),
(23,'pagi',1,'1657182457');

/*Table structure for table `worker` */

DROP TABLE IF EXISTS `worker`;

CREATE TABLE `worker` (
  `pkey` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createon` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  KEY `pkey` (`pkey`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `worker` */

insert  into `worker`(`pkey`,`name`,`createon`,`time`) values 
(22,'yayan',1,'1657178272'),
(23,'ascasc',1,'1657178545'),
(24,'grwrh',1,'1657612426');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
