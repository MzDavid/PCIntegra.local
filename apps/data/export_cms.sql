-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: cd_inscription
-- ------------------------------------------------------
-- Server version	5.7.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `allnotes`
--

DROP TABLE IF EXISTS `allnotes`;
/*!50001 DROP VIEW IF EXISTS `allnotes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `allnotes` AS SELECT
 1 AS `pid`,
 1 AS `title`,
 1 AS `date_creation`,
 1 AS `status`,
 1 AS `visits`,
 1 AS `username`,
 1 AS `name_category`,
 1 AS `color`,
 1 AS `subcategoryname`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cd_advertising`
--

DROP TABLE IF EXISTS `cd_advertising`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_advertising` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `name_image` varchar(100) NOT NULL,
  `order_adv` tinyint(4) NOT NULL,
  `ubication` enum('HOME','SECTIONS','ALL') NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_category`
--

DROP TABLE IF EXISTS `cd_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_category` (
  `cgid` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(45) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `clase` varchar(45) DEFAULT NULL,
  `data_creation` datetime DEFAULT NULL,
  PRIMARY KEY (`cgid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_curriculum`
--

DROP TABLE IF EXISTS `cd_curriculum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_curriculum` (
  `coid` int(11) NOT NULL AUTO_INCREMENT,
  `resumen` text NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`coid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_gallery_images`
--

DROP TABLE IF EXISTS `cd_gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_gallery_images` (
  `pid` int(11) NOT NULL,
  `imgid` int(11) NOT NULL,
  PRIMARY KEY (`pid`,`imgid`),
  KEY `fk_cd_post_has_cd_images_cd_images1_idx` (`imgid`),
  KEY `fk_cd_post_has_cd_images_cd_post1_idx` (`pid`),
  CONSTRAINT `fk_cd_post_has_cd_images_cd_images1` FOREIGN KEY (`imgid`) REFERENCES `cd_images` (`imgid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_post_has_cd_images_cd_post1` FOREIGN KEY (`pid`) REFERENCES `cd_post` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_gallery_tags`
--

DROP TABLE IF EXISTS `cd_gallery_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_gallery_tags` (
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`pid`,`tid`),
  KEY `fk_cd_post_has_cd_tags_cd_tags1_idx` (`tid`),
  KEY `fk_cd_post_has_cd_tags_cd_post1_idx` (`pid`),
  CONSTRAINT `fk_cd_post_has_cd_tags_cd_post1` FOREIGN KEY (`pid`) REFERENCES `cd_post` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_post_has_cd_tags_cd_tags1` FOREIGN KEY (`tid`) REFERENCES `cd_tags` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_images`
--

DROP TABLE IF EXISTS `cd_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_images` (
  `imgid` int(11) NOT NULL AUTO_INCREMENT,
  `original_name` varchar(75) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` varchar(75) NOT NULL,
  `type` varchar(75) NOT NULL,
  `url` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_magazine`
--

DROP TABLE IF EXISTS `cd_magazine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_magazine` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `name_image` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `fk_cd_magazine_cd_user1_idx` (`uid`),
  CONSTRAINT `fk_cd_magazine_cd_user1` FOREIGN KEY (`uid`) REFERENCES `cd_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_magazine_gallery`
--

DROP TABLE IF EXISTS `cd_magazine_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_magazine_gallery` (
  `mid` int(11) NOT NULL,
  `imgid` int(11) NOT NULL,
  PRIMARY KEY (`mid`,`imgid`),
  KEY `fk_cd_magazine_has_cd_images_cd_images1_idx` (`imgid`),
  KEY `fk_cd_magazine_has_cd_images_cd_magazine1_idx` (`mid`),
  CONSTRAINT `fk_cd_magazine_has_cd_images_cd_magazine1` FOREIGN KEY (`mid`) REFERENCES `cd_magazine` (`mid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_memes`
--

DROP TABLE IF EXISTS `cd_memes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_memes` (
  `meid` int(11) NOT NULL,
  `name_meme` varchar(45) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`meid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_memes_image`
--

DROP TABLE IF EXISTS `cd_memes_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_memes_image` (
  `imgid` int(11) NOT NULL,
  `meid` int(11) NOT NULL,
  PRIMARY KEY (`imgid`,`meid`),
  KEY `fk_cd_images_has_cd_memes_cd_memes1_idx` (`meid`),
  KEY `fk_cd_memes_image_cd_images1_idx` (`imgid`),
  CONSTRAINT `fk_cd_images_has_cd_memes_cd_memes1` FOREIGN KEY (`meid`) REFERENCES `cd_memes` (`meid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_memes_image_cd_images1` FOREIGN KEY (`imgid`) REFERENCES `cd_images` (`imgid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_photo_note`
--

DROP TABLE IF EXISTS `cd_photo_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_photo_note` (
  `pnid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `content` text,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `status` enum('ERASER','PUBLIC','DELETE') NOT NULL,
  `visits` tinyint(4) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`pnid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_post`
--

DROP TABLE IF EXISTS `cd_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_post` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `description_image` varchar(150) DEFAULT NULL,
  `summary` varchar(500) NOT NULL,
  `content` text,
  `status` enum('ERASER','PUBLIC','DELETE') NOT NULL,
  `visits` int(11) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_public` datetime DEFAULT NULL,
  `ur_video` varchar(100) DEFAULT NULL,
  `is_gallery` char(1) NOT NULL,
  `type` enum('OWN','DRAFTING','AGENCY') NOT NULL DEFAULT 'OWN',
  `breaking_new_time_start` datetime DEFAULT NULL,
  `breacking_new_time_end` datetime DEFAULT NULL,
  `p_facebook` tinyint(4) DEFAULT NULL,
  `p_twitter` tinyint(4) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `fk_cd_post_cd_user2_idx` (`uid`),
  KEY `fk_cd_post_cd_subcategory2_idx` (`scid`),
  CONSTRAINT `fk_cd_post_cd_subcategory2` FOREIGN KEY (`scid`) REFERENCES `cd_subcategory` (`scid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_post_cd_user2` FOREIGN KEY (`uid`) REFERENCES `cd_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_post_principal`
--

DROP TABLE IF EXISTS `cd_post_principal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_post_principal` (
  `ppid` int(11) NOT NULL AUTO_INCREMENT,
  `oder` tinyint(4) NOT NULL,
  `date_creation` datetime NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`ppid`),
  KEY `fk_cd_post_principal_cd_post2_idx` (`pid`),
  CONSTRAINT `fk_cd_post_principal_cd_post2` FOREIGN KEY (`pid`) REFERENCES `cd_post` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_referencia`
--

DROP TABLE IF EXISTS `cd_referencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_referencia` (
  `reid` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `periodo` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  PRIMARY KEY (`reid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_referencia_curriculum`
--

DROP TABLE IF EXISTS `cd_referencia_curriculum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_referencia_curriculum` (
  `reid` int(11) NOT NULL,
  `coid` int(11) NOT NULL,
  PRIMARY KEY (`reid`,`coid`),
  KEY `fk_cd_referencia_has_cd_curriculum_cd_curriculum1_idx` (`coid`),
  KEY `fk_cd_referencia_has_cd_curriculum_cd_referencia1_idx` (`reid`),
  CONSTRAINT `fk_cd_referencia_has_cd_curriculum_cd_curriculum1` FOREIGN KEY (`coid`) REFERENCES `cd_curriculum` (`coid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_referencia_has_cd_curriculum_cd_referencia1` FOREIGN KEY (`reid`) REFERENCES `cd_referencia` (`reid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_settings_post`
--

DROP TABLE IF EXISTS `cd_settings_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_settings_post` (
  `spid` int(11) NOT NULL AUTO_INCREMENT,
  `important` tinyint(4) DEFAULT '0',
  `gallery` tinyint(4) DEFAULT '0',
  `order_post` int(11) DEFAULT '0',
  `header` tinyint(4) DEFAULT '0',
  `home` tinyint(4) DEFAULT '0',
  `pid` int(11) NOT NULL,
  `cgid` int(11) NOT NULL,
  PRIMARY KEY (`spid`),
  KEY `fk_cd_settings_post_cd_post1_idx` (`pid`),
  KEY `fk_cd_settings_post_cd_category1_idx` (`cgid`),
  CONSTRAINT `fk_cd_settings_post_cd_category1` FOREIGN KEY (`cgid`) REFERENCES `cd_category` (`cgid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_settings_post_cd_post1` FOREIGN KEY (`pid`) REFERENCES `cd_post` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_social_media`
--

DROP TABLE IF EXISTS `cd_social_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_social_media` (
  `smid` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(75) DEFAULT NULL,
  `twitter` varchar(75) DEFAULT NULL,
  `google_plus` varchar(75) DEFAULT NULL,
  `pinterest` varchar(75) DEFAULT NULL,
  `instagram` varchar(75) DEFAULT NULL,
  `youtube` varchar(45) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`smid`),
  KEY `fk_cd_social_media_cd_user1_idx` (`uid`),
  CONSTRAINT `fk_cd_social_media_cd_user1` FOREIGN KEY (`uid`) REFERENCES `cd_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_subcategory`
--

DROP TABLE IF EXISTS `cd_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_subcategory` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `subcategoryname` varchar(45) NOT NULL,
  `cgid` int(11) NOT NULL,
  PRIMARY KEY (`scid`),
  KEY `fk_cd_subcategory_cd_category1_idx` (`cgid`),
  CONSTRAINT `fk_cd_subcategory_cd_category1` FOREIGN KEY (`cgid`) REFERENCES `cd_category` (`cgid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_tags`
--

DROP TABLE IF EXISTS `cd_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_tags` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `name_tag` varchar(75) NOT NULL,
  `date_creation` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `fk_cd_tags_cd_user1_idx` (`uid`),
  CONSTRAINT `fk_cd_tags_cd_user1` FOREIGN KEY (`uid`) REFERENCES `cd_user` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cd_user`
--


--
-- Temporary view structure for view `galleryphotonote`
--

DROP TABLE IF EXISTS `galleryphotonote`;
/*!50001 DROP VIEW IF EXISTS `galleryphotonote`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `galleryphotonote` AS SELECT
 1 AS `pnid`,
 1 AS `imgid`,
 1 AS `order_image`,
 1 AS `name`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `images_has_photo_note`
--

DROP TABLE IF EXISTS `images_has_photo_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_has_photo_note` (
  `ipnid` int(11) NOT NULL AUTO_INCREMENT,
  `imgid` int(11) NOT NULL,
  `pnid` int(11) NOT NULL,
  `order_image` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ipnid`),
  KEY `fk_cd_images_has_cd_photo_note_cd_photo_note1_idx` (`pnid`),
  KEY `fk_cd_images_has_cd_photo_note_cd_images1_idx` (`imgid`),
  CONSTRAINT `fk_cd_images_has_cd_photo_note_cd_images1` FOREIGN KEY (`imgid`) REFERENCES `cd_images` (`imgid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_images_has_cd_photo_note_cd_photo_note1` FOREIGN KEY (`pnid`) REFERENCES `cd_photo_note` (`pnid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `vgetnotesweek`
--

DROP TABLE IF EXISTS `vgetnotesweek`;
/*!50001 DROP VIEW IF EXISTS `vgetnotesweek`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vgetnotesweek` AS SELECT
 1 AS `pid`,
 1 AS `title`,
 1 AS `image`,
 1 AS `permalink`,
 1 AS `summary`,
 1 AS `visits`,
 1 AS `status`,
 1 AS `date_public`,
 1 AS `subcategoryname`,
 1 AS `cgid`,
 1 AS `name_category`,
 1 AS `color`,
 1 AS `clase`,
 1 AS `important`,
 1 AS `gallery`,
 1 AS `order_slider`,
 1 AS `home`,
 1 AS `header`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vnote`
--

DROP TABLE IF EXISTS `vnote`;
/*!50001 DROP VIEW IF EXISTS `vnote`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vnote` AS SELECT
 1 AS `pid`,
 1 AS `title`,
 1 AS `image`,
 1 AS `permalink`,
 1 AS `summary`,
 1 AS `description_image`,
 1 AS `content`,
 1 AS `status`,
 1 AS `visits`,
 1 AS `type`,
 1 AS `date_public`,
 1 AS `name`,
 1 AS `last_name`,
 1 AS `email`,
 1 AS `photo`,
 1 AS `cargo`,
 1 AS `second_name`,
 1 AS `subcategoryname`,
 1 AS `cgid`,
 1 AS `name_category`,
 1 AS `color`,
 1 AS `clase`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vsectionnotes`
--

DROP TABLE IF EXISTS `vsectionnotes`;
/*!50001 DROP VIEW IF EXISTS `vsectionnotes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vsectionnotes` AS SELECT
 1 AS `pid`,
 1 AS `title`,
 1 AS `image`,
 1 AS `permalink`,
 1 AS `summary`,
 1 AS `visits`,
 1 AS `status`,
 1 AS `date_public`,
 1 AS `type`,
 1 AS `subcategoryname`,
 1 AS `cgid`,
 1 AS `name_category`,
 1 AS `color`,
 1 AS `clase`,
 1 AS `important`,
 1 AS `gallery`,
 1 AS `order_slider`,
 1 AS `home`,
 1 AS `header`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vslider`
--

DROP TABLE IF EXISTS `vslider`;
/*!50001 DROP VIEW IF EXISTS `vslider`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vslider` AS SELECT
 1 AS `pid`,
 1 AS `title`,
 1 AS `image`,
 1 AS `permalink`,
 1 AS `summary`,
 1 AS `status`,
 1 AS `visits`,
 1 AS `date_public`,
 1 AS `subcategoryname`,
 1 AS `cgid`,
 1 AS `name_category`,
 1 AS `color`,
 1 AS `clase`,
 1 AS `important`,
 1 AS `gallery`,
 1 AS `order`,
 1 AS `header`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vusers`
--

DROP TABLE IF EXISTS `vusers`;
/*!50001 DROP VIEW IF EXISTS `vusers`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vusers` AS SELECT
 1 AS `uid`,
 1 AS `name`,
 1 AS `last_name`,
 1 AS `second_name`,
 1 AS `sex`,
 1 AS `phone`,
 1 AS `username`,
 1 AS `email`,
 1 AS `rol`,
 1 AS `photo`,
 1 AS `status`,
 1 AS `cargo`,
 1 AS `facebook`,
 1 AS `twitter`,
 1 AS `google_plus`,
 1 AS `pinterest`,
 1 AS `instagram`,
 1 AS `youtube`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `allnotes`
--

/*!50001 DROP VIEW IF EXISTS `allnotes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `allnotes` AS select `p`.`pid` AS `pid`,`p`.`title` AS `title`,`p`.`date_creation` AS `date_creation`,`p`.`status` AS `status`,`p`.`visits` AS `visits`,`u`.`username` AS `username`,`c`.`name_category` AS `name_category`,`c`.`color` AS `color`,`sc`.`subcategoryname` AS `subcategoryname` from (((`cd_post` `p` join `cd_user` `u` on((`p`.`uid` = `u`.`uid`))) join `cd_subcategory` `sc` on((`p`.`scid` = `sc`.`scid`))) join `cd_category` `c` on((`sc`.`cgid` = `c`.`cgid`))) order by `p`.`date_creation` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `galleryphotonote`
--

/*!50001 DROP VIEW IF EXISTS `galleryphotonote`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `galleryphotonote` AS select `ipn`.`pnid` AS `pnid`,`ipn`.`imgid` AS `imgid`,`ipn`.`order_image` AS `order_image`,`i`.`name` AS `name`,`i`.`description` AS `description` from (`images_has_photo_note` `ipn` join `cd_images` `i` on((`ipn`.`imgid` = `i`.`imgid`))) order by `ipn`.`order_image` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vgetnotesweek`
--

/*!50001 DROP VIEW IF EXISTS `vgetnotesweek`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vgetnotesweek` AS select `vsectionnotes`.`pid` AS `pid`,`vsectionnotes`.`title` AS `title`,`vsectionnotes`.`image` AS `image`,`vsectionnotes`.`permalink` AS `permalink`,`vsectionnotes`.`summary` AS `summary`,`vsectionnotes`.`visits` AS `visits`,`vsectionnotes`.`status` AS `status`,`vsectionnotes`.`date_public` AS `date_public`,`vsectionnotes`.`subcategoryname` AS `subcategoryname`,`vsectionnotes`.`cgid` AS `cgid`,`vsectionnotes`.`name_category` AS `name_category`,`vsectionnotes`.`color` AS `color`,`vsectionnotes`.`clase` AS `clase`,`vsectionnotes`.`important` AS `important`,`vsectionnotes`.`gallery` AS `gallery`,`vsectionnotes`.`order_slider` AS `order_slider`,`vsectionnotes`.`home` AS `home`,`vsectionnotes`.`header` AS `header` from `vsectionnotes` where ((`vsectionnotes`.`name_category` <> 'noticias') and (month(`vsectionnotes`.`date_public`) = month(curdate())) and (`vsectionnotes`.`date_public` between (curdate() + interval -(15) day) and curdate()) and ((`vsectionnotes`.`gallery` <> 1) or isnull(`vsectionnotes`.`gallery`))) order by `vsectionnotes`.`visits` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vnote`
--

/*!50001 DROP VIEW IF EXISTS `vnote`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vnote` AS select `p`.`pid` AS `pid`,`p`.`title` AS `title`,`p`.`image` AS `image`,`p`.`permalink` AS `permalink`,`p`.`summary` AS `summary`,`p`.`description_image` AS `description_image`,`p`.`content` AS `content`,`p`.`status` AS `status`,`p`.`visits` AS `visits`,`p`.`type` AS `type`,`p`.`date_public` AS `date_public`,`u`.`name` AS `name`,`u`.`last_name` AS `last_name`,`u`.`email` AS `email`,`u`.`photo` AS `photo`,`u`.`cargo` AS `cargo`,`u`.`second_name` AS `second_name`,`sc`.`subcategoryname` AS `subcategoryname`,`c`.`cgid` AS `cgid`,`c`.`name_category` AS `name_category`,`c`.`color` AS `color`,`c`.`clase` AS `clase` from (((`cd_post` `p` join `cd_user` `u` on((`u`.`uid` = `p`.`uid`))) join `cd_subcategory` `sc` on((`p`.`scid` = `sc`.`scid`))) join `cd_category` `c` on((`c`.`cgid` = `sc`.`cgid`))) where (`p`.`status` = 'PUBLIC') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vsectionnotes`
--

/*!50001 DROP VIEW IF EXISTS `vsectionnotes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vsectionnotes` AS select `p`.`pid` AS `pid`,`p`.`title` AS `title`,`p`.`image` AS `image`,`p`.`permalink` AS `permalink`,`p`.`summary` AS `summary`,`p`.`visits` AS `visits`,`p`.`status` AS `status`,`p`.`date_public` AS `date_public`,`p`.`type` AS `type`,`sc`.`subcategoryname` AS `subcategoryname`,`c`.`cgid` AS `cgid`,`c`.`name_category` AS `name_category`,`c`.`color` AS `color`,`c`.`clase` AS `clase`,`sp`.`important` AS `important`,`sp`.`gallery` AS `gallery`,`sp`.`order_post` AS `order_slider`,`sp`.`home` AS `home`,`sp`.`header` AS `header` from (((`cd_post` `p` left join `cd_settings_post` `sp` on((`p`.`pid` = `sp`.`pid`))) left join `cd_subcategory` `sc` on((`p`.`scid` = `sc`.`scid`))) left join `cd_category` `c` on((`c`.`cgid` = `sc`.`cgid`))) where (`p`.`status` <> 'ERASER') order by `p`.`date_public` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vslider`
--

/*!50001 DROP VIEW IF EXISTS `vslider`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vslider` AS select `p`.`pid` AS `pid`,`p`.`title` AS `title`,`p`.`image` AS `image`,`p`.`permalink` AS `permalink`,`p`.`summary` AS `summary`,`p`.`status` AS `status`,`p`.`visits` AS `visits`,`p`.`date_public` AS `date_public`,`sc`.`subcategoryname` AS `subcategoryname`,`c`.`cgid` AS `cgid`,`c`.`name_category` AS `name_category`,`c`.`color` AS `color`,`c`.`clase` AS `clase`,`sp`.`important` AS `important`,`sp`.`gallery` AS `gallery`,`sp`.`order_post` AS `order`,`sp`.`header` AS `header` from (((`cd_post` `p` join `cd_settings_post` `sp` on((`p`.`pid` = `sp`.`pid`))) join `cd_subcategory` `sc` on((`p`.`scid` = `sc`.`scid`))) join `cd_category` `c` on((`c`.`cgid` = `sc`.`cgid`))) where (`p`.`status` <> 'ERASER') order by `p`.`date_public` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vusers`
--

/*!50001 DROP VIEW IF EXISTS `vusers`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vusers` AS select `u`.`uid` AS `uid`,`u`.`name` AS `name`,`u`.`last_name` AS `last_name`,`u`.`second_name` AS `second_name`,`u`.`sex` AS `sex`,`u`.`phone` AS `phone`,`u`.`username` AS `username`,`u`.`email` AS `email`,`u`.`rol` AS `rol`,`u`.`photo` AS `photo`,`u`.`status` AS `status`,`u`.`cargo` AS `cargo`,`sm`.`facebook` AS `facebook`,`sm`.`twitter` AS `twitter`,`sm`.`google_plus` AS `google_plus`,`sm`.`pinterest` AS `pinterest`,`sm`.`instagram` AS `instagram`,`sm`.`youtube` AS `youtube` from (`cd_user` `u` left join `cd_social_media` `sm` on((`u`.`uid` = `sm`.`uid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-06 17:16:48
