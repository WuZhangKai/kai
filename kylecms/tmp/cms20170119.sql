-- MySQL dump 10.14  Distrib 5.5.52-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: singcms
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB

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
-- Table structure for table `cms_admin`
--

DROP TABLE IF EXISTS `cms_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_admin` (
  `admin_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) unsigned DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_admin`
--

LOCK TABLES `cms_admin` WRITE;
/*!40000 ALTER TABLE `cms_admin` DISABLE KEYS */;
INSERT INTO `cms_admin` VALUES (1,'admin','d099d126030d3207ba102efa8e60630a','0',0,'','1',1);
/*!40000 ALTER TABLE `cms_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_content`
--

DROP TABLE IF EXISTS `cms_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` mediumint(8) unsigned NOT NULL,
  `content` mediumtext NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_content`
--

LOCK TABLES `cms_content` WRITE;
/*!40000 ALTER TABLE `cms_content` DISABLE KEYS */;
INSERT INTO `cms_content` VALUES (1,2,'这是内容部分。',1482309427,0),(2,3,'大家好，这里是内容部分。1',1482378910,0),(3,4,'央视新闻',1483767286,0),(4,5,'这是内容部分',1483963580,0),(5,6,'sfsf&amp;nbsp;',1484127245,0),(6,7,'23424',1484127357,0),(7,8,'问世间情为何物，直教人生死相许',1484303530,0),(8,9,'内容',1484304083,0),(9,10,'js定时器实时获取当前时间',1484536339,0);
/*!40000 ALTER TABLE `cms_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_menu`
--

DROP TABLE IF EXISTS `cms_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `m` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) NOT NULL DEFAULT '',
  `f` varchar(20) NOT NULL DEFAULT '',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(6) NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`),
  KEY `listorder` (`listorder`),
  KEY `parentid` (`parentid`),
  KEY `module` (`m`,`c`,`f`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_menu`
--

LOCK TABLES `cms_menu` WRITE;
/*!40000 ALTER TABLE `cms_menu` DISABLE KEYS */;
INSERT INTO `cms_menu` VALUES (1,'菜单管理',0,'admin','menu','index',1,1,1),(2,'推荐位管理',0,'admin','position','index',3,1,1),(3,'推荐位内容管理',0,'admin','positioncontent','index',9,1,1),(4,'文章管理',0,'admin','content','index',2,1,1),(5,'菜单5',0,'menu','index','index',0,-1,0),(6,'体育',0,'home','index','index',0,1,0),(7,'科技',0,'home','index','index',0,1,0),(8,'基本管理',0,'admin','basic','index',0,1,1),(9,'时事',0,'admin','menu','index',0,1,0);
/*!40000 ALTER TABLE `cms_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_news`
--

DROP TABLE IF EXISTS `cms_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_news` (
  `news_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '标题颜色',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '文章描述',
  `listorder` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '来源',
  `username` char(20) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  KEY `listorder` (`listorder`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_news`
--

LOCK TABLES `cms_news` WRITE;
/*!40000 ALTER TABLE `cms_news` DISABLE KEYS */;
INSERT INTO `cms_news` VALUES (1,7,'title','show title','#5674ed','/thinkphp/upload/2016/12/21/585a3d1e1e060.jpg','keywords','description',1,1,'1','admin',1482308913,0,17),(2,7,'title2','short title2','#ed568b','','keywords','description',0,-1,'3','admin',1482309427,0,0),(4,6,'标题','短标题','#5674ed','/thinkphp/upload/2017/01/09/58737cf49dcfa.jpg','关键词','描述',0,1,'2','admin',1483767286,0,3),(3,7,'你好','你好，这是短标题','#5674ed','','关键字。12','描述1233',0,-1,'0','admin',1482378910,0,0),(5,6,'标题','断标题','#5674ed','/thinkphp/upload/2017/01/09/58737ca82f80a.jpg','关键词','描述',0,1,'2','admin',1483963580,0,2),(6,6,'sfsf ','32424','#5674ed','/thinkphp/upload/2017/01/11/5875fbfb585ec.png','2424','324',0,1,'1','admin',1484127245,0,2),(7,6,'342342','32424','#5674ed','/thinkphp/upload/2017/01/11/5875fc73137af.jpg','23424','3gertg',0,1,'2','admin',1484127357,0,1),(8,6,'问世间情为何物','直教人生死相许','#5674ed','/thinkphp/upload/2017/01/13/5878ac914b303.jpg','关键词','描述',0,1,'0','admin',1484303530,0,16),(9,6,'广告1','广告','#5674ed','/thinkphp/upload/2017/01/13/5878aeb88b624.jpg','关键词','描述',0,1,'3','admin',1484304083,0,7),(10,9,'js定时器实时获取当前时间','js定时器实时获取当前时间','#5674ed','/kylecms/upload/2017/01/16/587c3a0c04556.jpg','js定时器实时获取当前时间','js定时器实时获取当前时间',0,1,'0','admin',1484536339,0,7);
/*!40000 ALTER TABLE `cms_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_position`
--

DROP TABLE IF EXISTS `cms_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_position`
--

LOCK TABLES `cms_position` WRITE;
/*!40000 ALTER TABLE `cms_position` DISABLE KEYS */;
INSERT INTO `cms_position` VALUES (1,'首页1',0,'描述1',1483669445,0),(2,'次页',-1,'次页',1483686589,0),(3,'非首页',-1,'描述',1483696990,0),(4,'首页大图',1,'首页大图',1483699189,0),(5,'小图推荐',1,'小图推荐',1483767179,0),(6,'singcms站点',1,'这是一个神奇的网站',1483945052,0),(7,'sf',1,'',1483945244,0),(8,'singcms站点标题',1,'这是一个神奇的网站',1483945334,0),(9,'右侧广告位',1,'右侧广告位',1484303960,0);
/*!40000 ALTER TABLE `cms_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_position_content`
--

DROP TABLE IF EXISTS `cms_position_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_position_content` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(5) unsigned NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `news_id` mediumint(8) unsigned NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_position_content`
--

LOCK TABLES `cms_position_content` WRITE;
/*!40000 ALTER TABLE `cms_position_content` DISABLE KEYS */;
INSERT INTO `cms_position_content` VALUES (3,4,'title','/thinkphp/upload/2016/12/21/585a3d1e1e060.jpg',NULL,1,0,1,1482308913,0),(4,5,'标题','/thinkphp/upload/2017/01/09/58737d16a0417.jpg','',4,0,1,1483767286,0),(5,4,'asfsf','/thinkphp/upload/2017/01/09/5873017c17088.jpg','http://www.baidu.com',0,0,1,0,0),(6,4,'文章2','/thinkphp/upload/2016/12/21/585a3d1e1e060.jpg','',1,0,1,0,0),(7,4,'文章1','/thinkphp/upload/2016/12/21/585a3d1e1e060.jpg','',1,0,1,0,0),(8,5,'标题','/thinkphp/upload/2017/01/09/58737cf49dcfa.jpg',NULL,4,0,1,1483767286,0),(9,5,'标题','/thinkphp/upload/2017/01/09/58737ca82f80a.jpg',NULL,5,0,1,1483963580,0),(10,9,'广告1','/thinkphp/upload/2017/01/13/5878aeb88b624.jpg',NULL,9,0,1,1484304083,0);
/*!40000 ALTER TABLE `cms_position_content` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-19  0:57:47
