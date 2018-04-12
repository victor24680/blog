/*
SQLyog Ultimate v10.42 
MySQL - 5.5.53 : Database - laravelblog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravelblog` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `laravelblog`;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `articles_email_index` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `articles` */

insert  into `articles`(`id`,`email`,`author`,`body`,`create_time`) values (1,'','','','0000-00-00 00:00:00');

/*Table structure for table `blog_admin` */

DROP TABLE IF EXISTS `blog_admin`;

CREATE TABLE `blog_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `blog_admin` */

insert  into `blog_admin`(`id`,`username`,`password`) values (1,'admin','eyJpdiI6IjVaQTlIMG1QcFdtMm5hVjdsbDdSTmc9PSIsInZhbHVlIjoiR0l6U0ExOFcrRmFFYXFvT2lGMzltUT09IiwibWFjIjoiYTJhNDdkMjJmZjMwMzZiZTU2MGNkNTY4YmQzMWVlYzg3Mzg2Y2RmOGJmOGYzNTE1ZjE3OWVmYTYwNmI3MTYwYyJ9');

/*Table structure for table `blog_article` */

DROP TABLE IF EXISTS `blog_article`;

CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `art_tag` varchar(255) DEFAULT NULL COMMENT '文章关键字',
  `art_description` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `art_thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `art_content` text COMMENT '内容',
  `art_time` int(11) DEFAULT '0' COMMENT '发布时间',
  `art_editor` varchar(50) DEFAULT NULL COMMENT '作者',
  `art_view` int(11) DEFAULT '0' COMMENT '查看次数',
  `cate_pid` int(11) DEFAULT '0' COMMENT '文章分类ID',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章';

/*Data for the table `blog_article` */

/*Table structure for table `blog_category` */

DROP TABLE IF EXISTS `blog_category`;

CREATE TABLE `blog_category` (
  `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cate_name` varchar(50) DEFAULT NULL COMMENT '//分类名称',
  `cate_title` varchar(255) DEFAULT NULL COMMENT '//分类说明',
  `cate_keywords` varchar(255) DEFAULT NULL COMMENT '//关键字描述',
  `cate_description` varchar(255) DEFAULT NULL COMMENT '//描述',
  `cate_view` int(10) DEFAULT '0' COMMENT '//查看次数',
  `cate_order` tinyint(4) DEFAULT '0' COMMENT '//排序',
  `cate_pid` int(11) NOT NULL DEFAULT '0' COMMENT '//父级ID',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

/*Data for the table `blog_category` */

insert  into `blog_category`(`cate_id`,`cate_name`,`cate_title`,`cate_keywords`,`cate_description`,`cate_view`,`cate_order`,`cate_pid`) values (1,'新闻','收集国内外最知名的资讯',NULL,NULL,0,11,0),(2,'体育','发展体育事业，增强国民体质',NULL,NULL,0,50,0),(3,'娱乐','人人都有自己的娱乐圈',NULL,NULL,0,0,0),(4,'热点新闻','最新新闻事件_热点信息',NULL,NULL,0,10,1),(5,'军事新闻','最新新闻事件_热点新闻',NULL,NULL,0,12,1),(6,'体育彩票','体育彩票管理中心',NULL,NULL,0,0,2),(7,'乐视体育','乐视体育—-最专业的体育新闻',NULL,NULL,0,0,2),(8,'腾讯体育','腾讯体育--人气最旺的体育',NULL,NULL,0,0,2);

/*Table structure for table `blog_config` */

DROP TABLE IF EXISTS `blog_config`;

CREATE TABLE `blog_config` (
  `conf_id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT NULL COMMENT '标题',
  `conf_name` varchar(50) DEFAULT NULL COMMENT '名称',
  `conf_content` text COMMENT '内容',
  `conf_order` int(10) DEFAULT NULL COMMENT '排序',
  `conf_tips` varchar(255) DEFAULT NULL COMMENT '描述',
  `field_type` varchar(50) DEFAULT NULL COMMENT '类型',
  `field_value` varchar(255) DEFAULT NULL COMMENT '值',
  PRIMARY KEY (`conf_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `blog_config` */

/*Table structure for table `blog_links` */

DROP TABLE IF EXISTS `blog_links`;

CREATE TABLE `blog_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_links` */

insert  into `blog_links`(`link_id`,`link_name`,`link_title`,`link_url`,`link_order`) values (2,'锦绣钱程','钱程无限11','www.jinxqc.com',0),(3,'锦绣钱程','锦绣钱程','http://www.jinxqc.com',0),(4,'百度收藏','百度收藏页','http://www.baidu.com',0);

/*Table structure for table `blog_migrations` */

DROP TABLE IF EXISTS `blog_migrations`;

CREATE TABLE `blog_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_migrations` */

insert  into `blog_migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2018_01_07_053232_create_links_table',2);

/*Table structure for table `blog_navs` */

DROP TABLE IF EXISTS `blog_navs`;

CREATE TABLE `blog_navs` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(50) NOT NULL COMMENT '导航名称',
  `nav_alias` varchar(50) NOT NULL COMMENT '别称',
  `nav_url` varchar(100) NOT NULL COMMENT '导航地址',
  `nav_order` int(11) NOT NULL DEFAULT '0' COMMENT '导航排序',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `blog_navs` */

insert  into `blog_navs`(`nav_id`,`nav_name`,`nav_alias`,`nav_url`,`nav_order`) values (1,'新闻','news','www.baidu.com',2),(2,'论坛','lunlan','www.bbs.com',1),(3,'锦绣钱程','jinxqc','www.jinxqc.com',5);

/*Table structure for table `blog_password_resets` */

DROP TABLE IF EXISTS `blog_password_resets`;

CREATE TABLE `blog_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_password_resets` */

/*Table structure for table `blog_users` */

DROP TABLE IF EXISTS `blog_users`;

CREATE TABLE `blog_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `blog_users` */

insert  into `blog_users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`username`) values (1,'唐清','490319@qq.com','$2y$10$pZEu2wOS9WBJwvR.6rb4.u4BLhfy7ui8k05vIi2h.8.XZobddTmKG','X6GTQqvUOauLzWyyuRIcVi8T5aM9vXAsXBTHkM7lMFlpNcI07q7o946CpdRG','2017-07-03 14:00:34','2017-07-05 14:27:20','0');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_12_30_141033_create_msgs_table',1),('2015_12_30_141210_create_ref_members_table',1),('2017_06_20_134043_create_articles_table',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
