/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : braintumor

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-06-04 09:06:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for case_base
-- ----------------------------
DROP TABLE IF EXISTS `case_base`;
CREATE TABLE `case_base` (
  `caseId` int(8) NOT NULL AUTO_INCREMENT,
  `caseKode` varchar(255) DEFAULT NULL,
  `caseNama` varchar(255) DEFAULT NULL,
  `caseUmur` int(3) DEFAULT NULL,
  `caseSex` varchar(255) DEFAULT NULL,
  `casLamaKeluhan` int(3) DEFAULT NULL,
  `caseOrgan` varchar(255) DEFAULT NULL,
  `caseGejala` varchar(255) DEFAULT NULL,
  `caseTumorId` varchar(255) DEFAULT NULL,
  `caseSolution` text,
  `caseDes` varchar(255) DEFAULT NULL,
  `dateVisit` date DEFAULT NULL,
  `caseStatus` enum('') DEFAULT NULL,
  `caseCreate` datetime DEFAULT NULL,
  PRIMARY KEY (`caseId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of case_base
-- ----------------------------
INSERT INTO `case_base` VALUES ('1', 'A', 'A', '12', 'L', '2', 'Brain', '1', '1', null, null, null, null, null);
INSERT INTO `case_base` VALUES ('2', 'B', null, '60', 'L', '3', null, '2', '2', null, null, null, null, null);
INSERT INTO `case_base` VALUES ('3', 'C', null, '50', 'P', '4', null, '3', '1', null, null, null, null, null);
INSERT INTO `case_base` VALUES ('4', 'D', null, '60', 'P', '2', null, null, '1', null, null, null, null, null);
INSERT INTO `case_base` VALUES ('5', 'E', null, '1', 'L', '1', null, null, '8', null, null, null, null, null);
INSERT INTO `case_base` VALUES ('6', 'F', null, '50', 'P', '3', null, null, '8', null, null, null, null, null);
INSERT INTO `case_base` VALUES ('7', 'G', null, '9', 'L', '4', null, null, '1', null, null, null, null, null);
INSERT INTO `case_base` VALUES ('8', 'H', null, '23', 'P', '7', null, null, '9', null, null, null, null, null);

-- ----------------------------
-- Table structure for case_base_tmp
-- ----------------------------
DROP TABLE IF EXISTS `case_base_tmp`;
CREATE TABLE `case_base_tmp` (
  `caseId` int(8) NOT NULL AUTO_INCREMENT,
  `casKode` varchar(255) DEFAULT NULL,
  `caseNama` varchar(255) DEFAULT NULL,
  `caseUmur` int(3) DEFAULT NULL,
  `caseSex` varchar(255) DEFAULT NULL,
  `casLamaKeluhan` int(3) DEFAULT NULL,
  `caseOrgan` varchar(255) DEFAULT NULL,
  `caseTumorId` varchar(255) DEFAULT NULL,
  `caseSolution` text,
  `caseDes` varchar(255) DEFAULT NULL,
  `dateVisit` date DEFAULT NULL,
  `caseStatus` enum('') DEFAULT NULL,
  PRIMARY KEY (`caseId`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of case_base_tmp
-- ----------------------------
INSERT INTO `case_base_tmp` VALUES ('54', null, 'aku', '0', '1,5,9,13,17', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('55', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('56', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('57', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('58', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('59', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('60', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('61', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('62', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('63', null, 'ff', '0', '1,2,5,9', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('64', null, 'aku', '0', '1,5,9,13,17', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('65', null, '', '0', '', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('66', null, '', '0', '', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('67', null, 'aku', '0', '1,2,6,10,14,19', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('68', null, 'aku', '0', '1,2,6,10,14,19,20', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('69', null, 'aku', '0', '1,2', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('70', null, 'aku', '0', '1,2', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('71', null, 'aku', '0', '', null, null, null, null, null, null, null);
INSERT INTO `case_base_tmp` VALUES ('72', null, 'aku', '0', '1,2,5,9,13,17,18,19', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for case_base_tumor
-- ----------------------------
DROP TABLE IF EXISTS `case_base_tumor`;
CREATE TABLE `case_base_tumor` (
  `caseBaseCaseId` int(8) DEFAULT NULL,
  `caseBaseGejala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of case_base_tumor
-- ----------------------------
INSERT INTO `case_base_tumor` VALUES ('1', '1');
INSERT INTO `case_base_tumor` VALUES ('1', '17');
INSERT INTO `case_base_tumor` VALUES ('1', '18');
INSERT INTO `case_base_tumor` VALUES ('2', '1');
INSERT INTO `case_base_tumor` VALUES ('2', '16');
INSERT INTO `case_base_tumor` VALUES ('2', '19');
INSERT INTO `case_base_tumor` VALUES ('2', '2');
INSERT INTO `case_base_tumor` VALUES ('2', '9');

-- ----------------------------
-- Table structure for case_base_tumor_tmp
-- ----------------------------
DROP TABLE IF EXISTS `case_base_tumor_tmp`;
CREATE TABLE `case_base_tumor_tmp` (
  `caseBaseCaseId` int(8) DEFAULT NULL,
  `caseBaseGejala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of case_base_tumor_tmp
-- ----------------------------

-- ----------------------------
-- Table structure for case_gejala
-- ----------------------------
DROP TABLE IF EXISTS `case_gejala`;
CREATE TABLE `case_gejala` (
  `tmrGejalaId` int(8) NOT NULL AUTO_INCREMENT,
  `tmrGejalaKode` varchar(255) DEFAULT NULL,
  `tmrGejalaNama` varchar(255) DEFAULT NULL,
  `tmrGejalaDeskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tmrGejalaId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of case_gejala
-- ----------------------------
INSERT INTO `case_gejala` VALUES ('1', 'G1', 'Sakit kepala Berat', 'Sakit kepala yang berkepanjangan dan datang berulang-ulang bisa menjadi gejala kanker otak.');
INSERT INTO `case_gejala` VALUES ('2', 'G2', 'Sakit kepala , Nyeri Kepala,biasanya menyerang di Malam Hari', 'Sakit kepala yang berkepanjangan dan datang berulang-ulang bisa menjadi gejala kanker otak');
INSERT INTO `case_gejala` VALUES ('3', 'G3', 'Mual dan Muntah', 'Sering mual juga bisa menjadi gejala kanker otak.');
INSERT INTO `case_gejala` VALUES ('4', 'G4', 'Tubuh lemas dan Tidak Bertenaga', 'Penderita kanker otak biasanya mengalami tubuh lemas. Untuk itu, jika tubuh mudah lemas meski tidak mengerjakan pekerjaan berat, hal ini perlu diwaspadai.');
INSERT INTO `case_gejala` VALUES ('5', 'G5', 'Perubahan kepribadian', null);
INSERT INTO `case_gejala` VALUES ('6', 'G6', 'Kesulitan berjalan', 'Pengidap kanker otak juga akan mengalami kondisi sulit berjalan. Tiap akan berjalan rasanya sempoyongan. Gejala kanker otak ini disebabkan karena pengontrol aktivitas tubuh dalam otak terganggu oleh kehadiran sel-sel kanker.');
INSERT INTO `case_gejala` VALUES ('7', 'G7', 'Kelumpuhan atau kelemahan pada satu sisi tubuh', null);
INSERT INTO `case_gejala` VALUES ('8', 'G8', 'Kehilangan keseimbangan atau koordinasi', null);
INSERT INTO `case_gejala` VALUES ('9', 'G9', 'Kesulitan berbicara', null);
INSERT INTO `case_gejala` VALUES ('10', 'G10', 'Kesulitan berpikir, konsentrasi atau mengingat', null);
INSERT INTO `case_gejala` VALUES ('11', 'G11', 'Menurunnya daya penciuman ', null);
INSERT INTO `case_gejala` VALUES ('12', 'G12', 'Kantuk yang Berkepanjangan', null);
INSERT INTO `case_gejala` VALUES ('13', 'G13', 'Mati rasa di kaki dan tangan ', null);
INSERT INTO `case_gejala` VALUES ('14', 'G14', 'Penurunan kesadaran tiba-tiba', null);
INSERT INTO `case_gejala` VALUES ('15', 'G15', 'Halusinasi', null);
INSERT INTO `case_gejala` VALUES ('16', 'G16', 'Nyeri kepala khas didaerah belakang kepala yang menjalar keleher ', null);
INSERT INTO `case_gejala` VALUES ('17', 'G17', 'Kejang', null);
INSERT INTO `case_gejala` VALUES ('18', 'G18', 'Penglihatan Kabur', null);
INSERT INTO `case_gejala` VALUES ('19', 'G19', 'Imsomnia resah susah tidur', null);
INSERT INTO `case_gejala` VALUES ('20', 'G20', 'Kesulitan Mendengar', null);

-- ----------------------------
-- Table structure for group_jns_tumor
-- ----------------------------
DROP TABLE IF EXISTS `group_jns_tumor`;
CREATE TABLE `group_jns_tumor` (
  `grpJnsTmrId` int(8) NOT NULL DEFAULT '0',
  `grpJnsTmrKode` varchar(255) DEFAULT NULL,
  `grpJnsTmrNama` varchar(255) DEFAULT NULL,
  `grJnsTmrArea` varchar(255) DEFAULT NULL,
  `grpJnsTmrNote` text,
  `grpJnsTmrGambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`grpJnsTmrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of group_jns_tumor
-- ----------------------------
INSERT INTO `group_jns_tumor` VALUES ('1', 'GLI', 'Glioma', null, 'Tumor yang tersusun dari neuroglia dalam setiap tahap perkembangannya; kadang- kadang diperluas mencakup semua neoplasma otak dan medula spinalis intrinsik, seperti astrositoma, ependimomas, dan lain- lain.', null);
INSERT INTO `group_jns_tumor` VALUES ('2', 'MEO', 'Meningioma', null, 'Tumor pada selaput pelindung otak (meninges) jinak yang tumbuh lambat, biasanya terletak bersebelahan dengan dura mater (lapisan yang paling luar, paling kuat dari tiga selaput otak (meninges) dan sumsum tulang belakang), yang dapat menginvasi tulang tengkorak atau menyebabkan hiperostosis (pertumbuhan jaringan bertulang yang berlebihan), dan sering menyebabkan peningkatan tekanan intrakranial anatomi ; lebih banyak menyerang wanita daripada pria, terutama usia 50-60 tahun. Wanita lebih sering menderita meningioma karena reseptor hormon progesteron yang mempunyai GP1 dan GP2 (GP (glikoprotein) : memberi sifat pengenal pada molekul yang terlibatdalam lalulintas di dalam sel (Salisbury dan Ross, 1995)) menyebabkan timbulnya meningioma', null);
INSERT INTO `group_jns_tumor` VALUES ('3', 'MEB', 'Medulloblastoma', null, 'Tumor; ganas embrional invasif otak kecil yang lebih sering terjadi pada anak- anak; sel yang tidak terdeferensiasi pada tabung neural yang bisa berkembang baik menjadi neuroblast maupun spongioblas', null);
INSERT INTO `group_jns_tumor` VALUES ('4', 'GAG', 'Gangliogliomas', null, 'Ganglioneuroma (neoplasma jinak yang tersusun atas serabut saraf dan sel ganglion masak) pada sistem saraf pusat', null);
INSERT INTO `group_jns_tumor` VALUES ('5', 'SCH', 'Schwannomas', null, 'Neoplasma yang berasal dari sel schwann (selubung mielin) neuron; meliputi neurofibroma (tumor saraf tepi akibat proliferasi (reproduksi atau multiplikasi bentuk serupa, khususnya sel) sel schwann yang abnormal) dan neurilemomas (tumor selubung saraf perifer (neurilema), jenis tumor neurogenik yang paling umum, biasanya jinak)', null);

-- ----------------------------
-- Table structure for kelompok_jenis_tumor
-- ----------------------------
DROP TABLE IF EXISTS `kelompok_jenis_tumor`;
CREATE TABLE `kelompok_jenis_tumor` (
  `kelJnsTmrJnsId` int(8) NOT NULL AUTO_INCREMENT,
  `kelJnsTmrNama` varchar(255) DEFAULT NULL,
  `kelJnsTmr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kelJnsTmrJnsId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelompok_jenis_tumor
-- ----------------------------
INSERT INTO `kelompok_jenis_tumor` VALUES ('1', 'A', 'B');

-- ----------------------------
-- Table structure for penyakit_tumor
-- ----------------------------
DROP TABLE IF EXISTS `penyakit_tumor`;
CREATE TABLE `penyakit_tumor` (
  `tmrId` int(8) NOT NULL AUTO_INCREMENT,
  `tmrKode` varchar(5) DEFAULT NULL,
  `tmrNama` varchar(255) DEFAULT NULL,
  `tmrGrpId` varchar(11) DEFAULT NULL,
  `tmrKelId` varchar(11) DEFAULT NULL,
  `tmrTpyId` varchar(11) DEFAULT NULL,
  `tmrNote` varchar(255) DEFAULT NULL,
  `tmrTerapi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tmrId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyakit_tumor
-- ----------------------------
INSERT INTO `penyakit_tumor` VALUES ('1', 'P1', 'Glioblastoma', '1', null, null, ' setiap astrositoma yang ganas; biasanyaterdapat pada otak tetapi tidak terdapat pada batang otak atau medula spinalis', null);
INSERT INTO `penyakit_tumor` VALUES ('2', 'P2', 'Astrocytomas', '1', 't', 't', 't', 't');
INSERT INTO `penyakit_tumor` VALUES ('3', 'P3', 'Oligodendrogliomas', '1', null, null, null, null);
INSERT INTO `penyakit_tumor` VALUES ('4', 'P4', 'Ependymomas/neoplas', '1', null, null, null, null);
INSERT INTO `penyakit_tumor` VALUES ('5', 'P5', 'Angioblastic meningioma', '2', null, null, null, null);
INSERT INTO `penyakit_tumor` VALUES ('6', 'P6', 'Convexity meningioma', '2', null, null, null, null);
INSERT INTO `penyakit_tumor` VALUES ('7', 'P7', 'Psammomatous meningioma', '2', null, null, null, null);
INSERT INTO `penyakit_tumor` VALUES ('8', 'P8', 'Meduloblastoma', '3', null, null, null, null);
INSERT INTO `penyakit_tumor` VALUES ('9', 'P9', 'Gangliogliomas', '4', null, null, null, null);
INSERT INTO `penyakit_tumor` VALUES ('10', 'P10', 'Schwannomas', '4', null, null, null, null);

-- ----------------------------
-- Table structure for tipe_tumor
-- ----------------------------
DROP TABLE IF EXISTS `tipe_tumor`;
CREATE TABLE `tipe_tumor` (
  `tpyTumorId` int(8) NOT NULL AUTO_INCREMENT,
  `tipTumorNama` varchar(255) DEFAULT NULL,
  `tpyTumorDeskripsi` varchar(255) DEFAULT NULL,
  `tpyTumorDeteksi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tpyTumorId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipe_tumor
-- ----------------------------
INSERT INTO `tipe_tumor` VALUES ('1', 'Tumor Jinak', 'Tumor jinak (benign); tumbuh secara lambat, setempat (lokal), tidak menyebar kebagian tubuh lainnya; jarang mengganggu kesehatan; tidak rekuren;  dan dapat sembuh', null);
INSERT INTO `tipe_tumor` VALUES ('2', 'Tumor Ganas', null, '');
