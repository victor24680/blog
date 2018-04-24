/*
MySQL Data Transfer
Source Host: localhost
Source Database: laravelblog
Target Host: localhost
Target Database: laravelblog
Date: 2018/4/25 ÐÇÆÚÈý ÉÏÎç 12:35:45
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for articles
-- ----------------------------
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `articles_email_index` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
CREATE TABLE `blog_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(255) DEFAULT NULL COMMENT 'æç« æ é¢',
  `art_tag` varchar(255) DEFAULT NULL COMMENT 'æç« å³é®å­',
  `art_description` varchar(255) DEFAULT NULL COMMENT 'æç« æè¿°',
  `art_thumb` varchar(255) DEFAULT NULL COMMENT 'ç¼©ç¥å¾',
  `art_content` text COMMENT 'åå®¹',
  `art_time` int(11) DEFAULT '0' COMMENT 'åå¸æ¶é´',
  `art_editor` varchar(50) DEFAULT NULL COMMENT 'ä½è',
  `art_view` int(11) DEFAULT '0' COMMENT 'æ¥çæ¬¡æ°',
  `art_order` int(11) DEFAULT '0' COMMENT 'ç« ææåº',
  `cate_pid` int(11) DEFAULT '0' COMMENT 'æç« åç±»ID',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='æç« ';

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
CREATE TABLE `blog_category` (
  `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ä¸»é®',
  `cate_name` varchar(50) DEFAULT NULL COMMENT '//åç±»åç§°',
  `cate_title` varchar(255) DEFAULT NULL COMMENT '//åç±»è¯´æ',
  `cate_keywords` varchar(255) DEFAULT NULL COMMENT '//å³é®å­æè¿°',
  `cate_description` varchar(255) DEFAULT NULL COMMENT '//æè¿°',
  `cate_view` int(10) DEFAULT '0' COMMENT '//æ¥çæ¬¡æ°',
  `cate_order` tinyint(4) DEFAULT '0' COMMENT '//æåº',
  `cate_pid` int(11) NOT NULL DEFAULT '0' COMMENT '//ç¶çº§ID',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='æç« åç±»è¡¨';

-- ----------------------------
-- Table structure for blog_config
-- ----------------------------
CREATE TABLE `blog_config` (
  `conf_id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT NULL COMMENT 'æ é¢',
  `conf_name` varchar(50) DEFAULT NULL COMMENT 'åç§°',
  `conf_content` text COMMENT 'åå®¹',
  `conf_order` int(10) DEFAULT NULL COMMENT 'æåº',
  `conf_tips` varchar(255) DEFAULT NULL COMMENT 'æè¿°',
  `field_type` varchar(50) DEFAULT NULL COMMENT 'ç±»å',
  `field_value` varchar(255) DEFAULT NULL COMMENT 'å¼',
  PRIMARY KEY (`conf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for blog_links
-- ----------------------------
CREATE TABLE `blog_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'åç§°',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'æ é¢',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'é¾æ¥å°å',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT 'æåº',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for blog_migrations
-- ----------------------------
CREATE TABLE `blog_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for blog_navs
-- ----------------------------
CREATE TABLE `blog_navs` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(50) NOT NULL COMMENT 'å¯¼èªåç§°',
  `nav_alias` varchar(50) NOT NULL COMMENT 'å«ç§°',
  `nav_url` varchar(100) NOT NULL COMMENT 'å¯¼èªå°å',
  `nav_order` int(11) NOT NULL DEFAULT '0' COMMENT 'å¯¼èªæåº',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for blog_password_resets
-- ----------------------------
CREATE TABLE `blog_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for blog_users
-- ----------------------------
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

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '', '', '', '0000-00-00 00:00:00');
INSERT INTO `blog_admin` VALUES ('1', 'admin', 'eyJpdiI6IjVaQTlIMG1QcFdtMm5hVjdsbDdSTmc9PSIsInZhbHVlIjoiR0l6U0ExOFcrRmFFYXFvT2lGMzltUT09IiwibWFjIjoiYTJhNDdkMjJmZjMwMzZiZTU2MGNkNTY4YmQzMWVlYzg3Mzg2Y2RmOGJmOGYzNTE1ZjE3OWVmYTYwNmI3MTYwYyJ9');
INSERT INTO `blog_article` VALUES ('3', 'åæ', 'åæ,å¤§å­¦', 'è¿ä¸å¥½åç©ºé´ï¼åä¸æ¬¡çå°å¥¹ç½®é¡¶çé£ä¸ç¯ãä»åå¥¹çæäºãç±æå¨ä»ä¿©ççæ´»ä¸­ç»åäºä¸å°ååååï¼ä½æåä¿©äººè¿æ¯èµ°å¨äºä¸èµ·ãå½ä»å¤©åä¸æ¬¡éè¯»çæ¶åï¼ææ²¡æç¬¬ä¸æ¬¡é£ä¹ææ§ï¼ææ³¨éä»ä»¬ä¿©æ²æçè¿ç¨ï¼å¶ä¸­åºç°è¿ç¬¬ä¸è...', '/uploads/20180424163425730.JPG', '<ul class=\"infos list-paddingleft-2\" style=\"list-style-type: none;\"><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">è¿ä¸å¥½åç©ºé´ï¼åä¸æ¬¡çå°å¥¹ç½®é¡¶çé£ä¸ç¯ãä»åå¥¹çæäºãç±æå¨ä»ä¿©ççæ´»ä¸­ç»åäºä¸å°ååååï¼ä½æåä¿©äººè¿æ¯èµ°å¨äºä¸èµ·ãå½ä»å¤©åä¸æ¬¡éè¯»çæ¶åï¼ææ²¡æç¬¬ä¸æ¬¡é£ä¹ææ§ï¼ææ³¨éä»ä»¬ä¿©æ²æçè¿ç¨ï¼å¶ä¸­åºç°è¿ç¬¬ä¸è...</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">å¦æææ¯å¥¹ï¼å¯¹äºä»å½åçèè¸ä¸¤åªè¹ãå°½ç®¡ä»ç¶è¯´ç±ä½äº¦ç¶ç¦»å¼èéæ©å«äººï¼æå¾è¯å®ææ¯æ æ³åè°ä»çï¼ä¹è®¸ä½ ä¼è¯´æ¯å ä¸ºæä¸æ¯çæ­£ç±ä»å§ï¼æä¹ä¸ç¥éï¼è¿æ¯ä¸æ¯å ä¸ºç±å¾ä¸å¤æ·±ï¼ä¸è½åå®¹ä»çè¿é...ææ¯å¾å°æ°çäººï¼å°±åå¾å¤äººè¯´çé£æ ·ï¼ä¸å¹´365å¤©ï¼ä½ 364å¤©å¯¹å¥¹å¥½ï¼åªè¦æä¸å¤©å¯¹å¥¹ä¸å¥½ï¼å¥¹ä¹ä¼å¨nå¤©ä¹è®¸nå¹´åæåºæ¥ï¼ä½ åªå¤©å¯¹æä¸å¥½ã</p></ul><p><br/></p>', '1524403268', 'victor', '0', '10', '4');
INSERT INTO `blog_article` VALUES ('4', 'å¤§å­¦', 'ä»£ç ,fåæ', 'å¤§å­¦æ¶è·æååååçç·æåï¼å´æ¯è¿ä¹ä¸ä¸ªç±ç¯éçäººãè·ä»äº¤å¾ï¼ä¼æææ æçä¼¤å°æèªå°ï¼è³ä»æä¹é£ä¹è®¤ä¸ºé£ä¼¤å®³äºæçèªå°ãå¨æéª¨å­éæä¸ç§éªå²åå¾å¼ºçèªå°ï¼èä»å´ååä¼¤äºä¸æ¬¡åä¸æ¬¡ãä»çæåé½è¯´æå°æ°ï¼æè³ä»ä¹è§å¾å¦ææä¸å°æ°ï¼é£å°±æ¯æå»ï¼', '/img/123.jpg', '<ul class=\"infos list-paddingleft-2\" style=\"list-style-type: none;\"><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">å¤§å­¦æ¶è·æååååçç·æåï¼å´æ¯è¿ä¹ä¸ä¸ªç±ç¯éçäººãè·ä»äº¤å¾ï¼ä¼æææ æçä¼¤å°æèªå°ï¼è³ä»æä¹é£ä¹è®¤ä¸ºé£ä¼¤å®³äºæçèªå°ãå¨æéª¨å­éæä¸ç§éªå²åå¾å¼ºçèªå°ï¼èä»å´ååä¼¤äºä¸æ¬¡åä¸æ¬¡ãä»çæåé½è¯´æå°æ°ï¼æè³ä»ä¹è§å¾å¦ææä¸å°æ°ï¼é£å°±æ¯æå»ï¼</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">æè®¤ä¸ºå¤§å­¦æ¶çæç±ï¼æ¯æ¯ä¸åè¿å¥ç¤¾ä¼çä¸æ¬¡æç±å®ä¹ ãåæäºå¾å¤ççé®åææ©ãå°±åå·¥ä½ï¼ä»éå®å°æåå°ç¼è¾å°ææ¯åï¼æåæç¥éä»ä¹å·¥ä½éåèªå·±ãæ¾ä¸ä¸ªäººéªä½ æç±å®ä¹ ï¼ä¹è®¸å¾ç®åï¼ä¹è®¸å¾é¾ã</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">è¿ä¹å¤å¹´è¿å»äºï¼å½ååæé½ä¼èä¸å¾é£æ®µ4å¹´çææï¼åæ¥ä¹æ¯æ¶é´ç®äºè¿æ®µè®°å¿ãç°å¨æä»¬åèªæäºåèªççæ´»ï¼ä»ä¹æ¾å°äºä»å¿ä»ªçå¥³å­©ï¼æè½æè§åºä»ä»¬ä¿©å¾ç¸ç±ï¼å½åæåä¸æ¬¡åæçè¿æ¸¡æ¶é´ï¼æ è®ºæå¤ä¹çä¸èä¸é¾ç¬ï¼ç°å¨ççé½æ¯æ­£ç¡®ç</p></ul><pre class=\"brush:php;toolbar:false\">$a=1;var_dump($a);</pre><p><br/></p>', '1524403387', 'victor', '0', '0', '4');
INSERT INTO `blog_article` VALUES ('5', 'åæç¬¬ä¸ç¯', 'åæ,å¤§å­¦', 'ä¸ºä½æä¼æ¯ç¶æ¾å¼ï¼å ä¸ºå¨æå¿éï¼é£äºè¿å»çä¼¤ï¼é£äºä¸å¥½çè®°å¿æ°¸è¿é½æ¹ä¸å»ï¼ææ æ³é¢å¯¹ï¼åªææ¯å½åå¦¥åäºï¼ææ³æåæä¹ä¸å®ä¼åä¸æ¬¡éæ©æ¾å¼....', '/img/123.jpg', '<ul class=\"infos list-paddingleft-2\" style=\"list-style-type: none;\"><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">ä¸ºä½æä¼æ¯ç¶æ¾å¼ï¼å ä¸ºå¨æå¿éï¼é£äºè¿å»çä¼¤ï¼é£äºä¸å¥½çè®°å¿æ°¸è¿é½æ¹ä¸å»ï¼ææ æ³é¢å¯¹ï¼åªææ¯å½åå¦¥åäºï¼ææ³æåæä¹ä¸å®ä¼åä¸æ¬¡éæ©æ¾å¼....</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">æè§å¾ç±æä¹å¯ä»¥éæ°æ¥è¿ï¼åªæ¯æ¢æ¢ä¸»è§ç½¢äº...</p></ul><p><br/></p>', '1524403476', 'victor', '0', '0', '3');
INSERT INTO `blog_category` VALUES ('1', 'æ°é»', 'æ¶éå½åå¤æç¥åçèµè®¯', null, null, '0', '11', '0');
INSERT INTO `blog_category` VALUES ('2', 'ä½è²', 'åå±ä½è²äºä¸ï¼å¢å¼ºå½æ°ä½è´¨', null, null, '0', '50', '0');
INSERT INTO `blog_category` VALUES ('3', 'å¨±ä¹', 'äººäººé½æèªå·±çå¨±ä¹å', null, null, '0', '0', '0');
INSERT INTO `blog_category` VALUES ('4', 'ç­ç¹æ°é»', 'ææ°æ°é»äºä»¶_ç­ç¹ä¿¡æ¯', null, null, '0', '10', '1');
INSERT INTO `blog_category` VALUES ('5', 'åäºæ°é»', 'ææ°æ°é»äºä»¶_ç­ç¹æ°é»', null, null, '0', '12', '1');
INSERT INTO `blog_category` VALUES ('6', 'ä½è²å½©ç¥¨', 'ä½è²å½©ç¥¨ç®¡çä¸­å¿', null, null, '0', '0', '2');
INSERT INTO `blog_category` VALUES ('7', 'ä¹è§ä½è²', 'ä¹è§ä½è²â-æä¸ä¸çä½è²æ°é»', null, null, '0', '0', '2');
INSERT INTO `blog_category` VALUES ('8', 'è¾è®¯ä½è²', 'è¾è®¯ä½è²--äººæ°ææºçä½è²', null, null, '0', '0', '2');
INSERT INTO `blog_config` VALUES ('1', 'ç½ç«æ é¢', 'web_title', 'åç¾ç½Blogç»è®¡-ç»è®¡ä»£ç ', '1', 'ç½ç«å¤§ä¼åæ é¢', 'input', '');
INSERT INTO `blog_config` VALUES ('2', 'ä»£ç ç»è®¡', 'web_count', 'http://www.houduwang.com', '3', 'ç½ç«è®¿é®æåµ', 'textarea', '');
INSERT INTO `blog_config` VALUES ('3', 'ç½ç«ç¶æ', 'web_status', '0', '2', 'ç½ç«å¼å¯ç¶æ', 'radio', '1|å¼å¯,0|å³é­');
INSERT INTO `blog_links` VALUES ('2', 'é¦ç»£é±ç¨', 'é±ç¨æ é11', 'http://www.jinxqc.com', '0');
INSERT INTO `blog_links` VALUES ('3', 'é¦ç»£é±ç¨', 'é¦ç»£é±ç¨', 'http://www.jinxqc.com', '0');
INSERT INTO `blog_links` VALUES ('4', 'ç¾åº¦æ¶è', 'ç¾åº¦æ¶èé¡µ', 'http://www.baidu.com', '0');
INSERT INTO `blog_migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `blog_migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `blog_migrations` VALUES ('2018_01_07_053232_create_links_table', '2');
INSERT INTO `blog_navs` VALUES ('1', 'æ¢çæ´»', 'Life', '/', '2');
INSERT INTO `blog_navs` VALUES ('2', 'å³äºæ', 'About', '/', '3');
INSERT INTO `blog_navs` VALUES ('3', 'é¦é¡µ', 'protal', '/', '5');
INSERT INTO `blog_navs` VALUES ('4', 'ç¢è¨ç¢è¯­', 'Doing', '/', '1');
INSERT INTO `blog_navs` VALUES ('5', 'æ¨¡æ¿åäº«', 'Share', '/', '0');
INSERT INTO `blog_navs` VALUES ('6', 'å­¦æ æ­¢å¢', 'Learm', '/', '0');
INSERT INTO `blog_navs` VALUES ('7', 'çè¨æ¿', 'Gustbook', '/', '0');
INSERT INTO `blog_users` VALUES ('1', 'åæ¸', '490319@qq.com', '$2y$10$pZEu2wOS9WBJwvR.6rb4.u4BLhfy7ui8k05vIi2h.8.XZobddTmKG', 'X6GTQqvUOauLzWyyuRIcVi8T5aM9vXAsXBTHkM7lMFlpNcI07q7o946CpdRG', '2017-07-03 14:00:34', '2017-07-05 14:27:20', '0');
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_12_30_141033_create_msgs_table', '1');
INSERT INTO `migrations` VALUES ('2015_12_30_141210_create_ref_members_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_20_134043_create_articles_table', '2');
