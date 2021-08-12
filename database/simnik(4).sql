/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.24 : Database - simnik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`simnik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `simnik`;

/*Table structure for table `tb_hak` */

DROP TABLE IF EXISTS `tb_hak`;

CREATE TABLE `tb_hak` (
  `id_hak` int(3) NOT NULL AUTO_INCREMENT,
  `nm_hak` varchar(30) NOT NULL,
  PRIMARY KEY (`id_hak`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_hak` */

insert  into `tb_hak`(`id_hak`,`nm_hak`) values 
(1,'Admin');

/*Table structure for table `tb_kandungan` */

DROP TABLE IF EXISTS `tb_kandungan`;

CREATE TABLE `tb_kandungan` (
  `id_kandungan` varchar(6) NOT NULL,
  `desc_kandungan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kandungan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_kandungan` */

/*Table structure for table `tb_lab` */

DROP TABLE IF EXISTS `tb_lab`;

CREATE TABLE `tb_lab` (
  `id_lab` varchar(3) NOT NULL,
  `nm_lab` varchar(30) NOT NULL,
  `trf_lab` int(11) NOT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_lab` */

/*Table structure for table `tb_obt` */

DROP TABLE IF EXISTS `tb_obt`;

CREATE TABLE `tb_obt` (
  `id_obt` varchar(6) NOT NULL,
  `nm_obt` varchar(30) NOT NULL,
  `hrg_obt` int(11) NOT NULL,
  `stok_obt` int(11) NOT NULL,
  PRIMARY KEY (`id_obt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_obt` */



/*Table structure for table `tb_pnykt` */

DROP TABLE IF EXISTS `tb_pnykt`;

CREATE TABLE `tb_pnykt` (
  `id_pnykt` varchar(6) NOT NULL,
  `nm_pnykt` varchar(30) NOT NULL,
  `kd_pnykt` varchar(6) NOT NULL,
  `jenis_pnykt` int(11) NOT NULL,
  PRIMARY KEY (`id_pnykt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pnykt` */

/*Table structure for table `tb_tindakan` */

DROP TABLE IF EXISTS `tb_tindakan`;

CREATE TABLE `tb_tindakan` (
  `id_tindakan` varchar(3) NOT NULL,
  `nm_tindakan` varchar(30) NOT NULL,
  `kd_tindakan` varchar(5) NOT NULL,
  `tarifdlm_tindakan` int(11) NOT NULL,
  `tarifluar_tindakan` int(11) NOT NULL,
  PRIMARY KEY (`id_tindakan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_tindakan` */

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` varchar(3) NOT NULL,
  `id_hak` int(1) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `j_kel` enum('Laki-Laki','Perempuan') NOT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_hak` (`id_hak`),
  CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_hak`) REFERENCES `tb_hak` (`id_hak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`id_hak`,`nm_user`,`pass_user`,`j_kel`,`phone`) values 
('001',1,'Admin','21232f297a57a5a743894a0e4a801fc3','Laki-Laki','081333366924');



/*Table structure for table `total_resep` */

DROP TABLE IF EXISTS `total_resep`;

CREATE TABLE `total_resep` (
  `id_periksa` varchar(6) NOT NULL,
  `id_pembayaran_resep` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `total_resep` */

/*Table structure for table `tb_alergi` */

DROP TABLE IF EXISTS `tb_alergi`;

CREATE TABLE `tb_alergi` (
  `id_alergi` varchar(6) NOT NULL,
  `id_obt` varchar(6) NOT NULL,
  `kode_alergi` varchar(10) NOT NULL,
  PRIMARY KEY (`id_alergi`),
  KEY `id_obt` (`id_obt`),
  CONSTRAINT `tb_alergi_ibfk_1` FOREIGN KEY (`id_obt`) REFERENCES `tb_obt` (`id_obt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_alergi` */



/*Table structure for table `detil_kandungan` */

DROP TABLE IF EXISTS `detil_kandungan`;

CREATE TABLE `detil_kandungan` (
  `id_detkan` varchar(6) NOT NULL,
  `id_kandungan` varchar(6) NOT NULL,
  `id_obt` varchar(6) NOT NULL,
  PRIMARY KEY (`id_detkan`),
  KEY `id_kandungan` (`id_kandungan`),
  KEY `id_obt` (`id_obt`),
  CONSTRAINT `detil_kandungan_ibfk_1` FOREIGN KEY (`id_kandungan`) REFERENCES `tb_kandungan` (`id_kandungan`),
  CONSTRAINT `detil_kandungan_ibfk_2` FOREIGN KEY (`id_obt`) REFERENCES `tb_obt` (`id_obt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detil_kandungan` */

/*Table structure for table `tb_pasien` */

DROP TABLE IF EXISTS `tb_pasien`;

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(6) NOT NULL,
  `id_user` varchar(3) NOT NULL,
  `no_rm` varchar(10) NOT NULL,
  `nm_pasien` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lhr_pasien` date NOT NULL,
  `kk_pasien` varchar(30) NOT NULL,
  `j_kel_pasien` enum('Perempuan','Laki-Laki') NOT NULL,
  `almt_pasien` varchar(255) NOT NULL,
  `kota_pasien` varchar(20) NOT NULL,
  `kec_pasien` varchar(20) NOT NULL,
  `desa_pasien` varchar(20) NOT NULL,
  `pkjr_pasien` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pasien`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pasien` */

/*Table structure for table `tb_dftr` */

DROP TABLE IF EXISTS `tb_dftr`;

CREATE TABLE `tb_dftr` (
  `id_dftr` varchar(6) NOT NULL,
  `id_pasien` varchar(6) NOT NULL,
  `no_antrian` varchar(50) NOT NULL,
  `tgl_dftr` datetime NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_pasien` varchar(30) NOT NULL,
  `poli_tujuan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_dftr`),
  KEY `pasien` (`id_pasien`),
  CONSTRAINT `pasien` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_dftr` */



/*Table structure for table `tb_periksa` */

DROP TABLE IF EXISTS `tb_periksa`;

CREATE TABLE `tb_periksa` (
  `id_periksa` varchar(6) NOT NULL,
  `id_pasien` varchar(6) NOT NULL,
  `id_dftr` varchar(6) NOT NULL,
  `id_pnykt` varchar(6) NOT NULL,
  `id_tindakan` varchar(6) NOT NULL,
  `id_lab` varchar(6) NOT NULL,
  `id_alergi` varchar(6) NOT NULL,
  `id_obt` varchar(6) NOT NULL,
  `anamnesa` text NOT NULL,
  `status_periksa` int(11) NOT NULL,
  `catatan_periksa` text NOT NULL,
  `tot_biaya_periksa` int(11) NOT NULL,
  `tot_biaya_resep` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  PRIMARY KEY (`id_periksa`),
  KEY `id_pasien` (`id_pasien`),
  KEY `id_dftr` (`id_dftr`),
  KEY `id_pnykt` (`id_pnykt`),
  KEY `id_tindakan` (`id_tindakan`),
  KEY `id_lab` (`id_lab`),
  KEY `id_obt` (`id_obt`),
  KEY `id_alergi` (`id_alergi`),
  CONSTRAINT `tb_periksa_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  CONSTRAINT `tb_periksa_ibfk_2` FOREIGN KEY (`id_dftr`) REFERENCES `tb_dftr` (`id_dftr`),
  CONSTRAINT `tb_periksa_ibfk_3` FOREIGN KEY (`id_pnykt`) REFERENCES `tb_pnykt` (`id_pnykt`),
  CONSTRAINT `tb_periksa_ibfk_4` FOREIGN KEY (`id_tindakan`) REFERENCES `tb_tindakan` (`id_tindakan`),
  CONSTRAINT `tb_periksa_ibfk_5` FOREIGN KEY (`id_lab`) REFERENCES `tb_lab` (`id_lab`),
  CONSTRAINT `tb_periksa_ibfk_6` FOREIGN KEY (`id_obt`) REFERENCES `tb_obt` (`id_obt`),
  CONSTRAINT `tb_periksa_ibfk_7` FOREIGN KEY (`id_alergi`) REFERENCES `tb_alergi` (`id_alergi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_periksa` */

/*Table structure for table `tb_pembayaran` */

DROP TABLE IF EXISTS `tb_pembayaran`;

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(6) NOT NULL,
  `id_periksa` varchar(6) NOT NULL,
  `tot_id_pembayaran` varchar(6) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_periksa` (`id_periksa`),
  CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_periksa`) REFERENCES `tb_periksa` (`id_periksa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pembayaran` */

/*Table structure for table `tb_pembayaran_resep` */

DROP TABLE IF EXISTS `tb_pembayaran_resep`;

CREATE TABLE `tb_pembayaran_resep` (
  `id_pembayaran_resep` varchar(6) NOT NULL,
  `id_periksa` varchar(6) NOT NULL,
  `tot_id_pembayaran_resep` varchar(6) NOT NULL,
  `total_pembayaran_resep` int(11) NOT NULL,
  `tgl_pembayaran_resep` datetime NOT NULL,
  `status_pembayaran_resep` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran_resep`),
  KEY `id_periksa` (`id_periksa`),
  CONSTRAINT `tb_pembayaran_resep_ibfk_1` FOREIGN KEY (`id_periksa`) REFERENCES `tb_periksa` (`id_periksa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pembayaran_resep` */

/*Table structure for table `total_periksa` */

DROP TABLE IF EXISTS `total_periksa`;

CREATE TABLE `total_periksa` (
  `id_periksa` varchar(6) NOT NULL,
  `id_pembayaran` varchar(6) NOT NULL,
  KEY `id_pembayaran` (`id_pembayaran`),
  KEY `id_periksa` (`id_periksa`),
  CONSTRAINT `total_periksa_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`),
  CONSTRAINT `total_periksa_ibfk_2` FOREIGN KEY (`id_periksa`) REFERENCES `tb_periksa` (`id_periksa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `total_periksa` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
