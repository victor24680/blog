/*
MySQL Data Transfer
Source Host: localhost
Source Database: laravelblog
Target Host: localhost
Target Database: laravelblog
Date: 2018/4/25 ������ ���� 12:35:45
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
  `art_title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `art_tag` varchar(255) DEFAULT NULL COMMENT '文章关键字',
  `art_description` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `art_thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `art_content` text COMMENT '内容',
  `art_time` int(11) DEFAULT '0' COMMENT '发布时间',
  `art_editor` varchar(50) DEFAULT NULL COMMENT '作者',
  `art_view` int(11) DEFAULT '0' COMMENT '查看次数',
  `art_order` int(11) DEFAULT '0' COMMENT '章文排序',
  `cate_pid` int(11) DEFAULT '0' COMMENT '文章分类ID',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文章';

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
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

-- ----------------------------
-- Table structure for blog_config
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for blog_links
-- ----------------------------
CREATE TABLE `blog_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '链接地址',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
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
  `nav_name` varchar(50) NOT NULL COMMENT '导航名称',
  `nav_alias` varchar(50) NOT NULL COMMENT '别称',
  `nav_url` varchar(100) NOT NULL COMMENT '导航地址',
  `nav_order` int(11) NOT NULL DEFAULT '0' COMMENT '导航排序',
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
INSERT INTO `blog_article` VALUES ('3', '分手', '分手,大学', '进一好友空间，再一次看到她置顶的那一篇《他和她的故事》爱情在他俩的生活中经历了不少分分合合，但最后俩人还是走在了一起。当今天再一次阅读的时候，我没有第一次那么感性，我注重他们俩曲折的过程，其中出现过第三者...', '/uploads/20180424163425730.JPG', '<ul class=\"infos list-paddingleft-2\" style=\"list-style-type: none;\"><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">进一好友空间，再一次看到她置顶的那一篇《他和她的故事》爱情在他俩的生活中经历了不少分分合合，但最后俩人还是走在了一起。当今天再一次阅读的时候，我没有第一次那么感性，我注重他们俩曲折的过程，其中出现过第三者...</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">如果我是她，对于他当初的脚踏两只船、尽管仍然说爱但亦然离开而选择别人，我很肯定我是无法原谅他的，也许你会说是因为我不是真正爱他吧，我也不知道，这是不是因为爱得不够深，不能包容他的过错...我是很小气的人，就像很多人说的那样，一年365天，你364天对她好，只要有一天对她不好，她也会在n天也许n年后提出来，你哪天对我不好。</p></ul><p><br/></p>', '1524403268', 'victor', '0', '10', '4');
INSERT INTO `blog_article` VALUES ('4', '大学', '代码,f分手', '大学时跟我分分合合的男朋友，却是这么一个爱犯错的人。跟他交往，会有意无意的伤到我自尊，至今我也那么认为那伤害了我的自尊。在我骨子里有一种骄傲和很强的自尊，而他却偏偏伤了一次又一次。他的朋友都说我小气，我至今也觉得如果我不小气，那就是我傻！', '/img/123.jpg', '<ul class=\"infos list-paddingleft-2\" style=\"list-style-type: none;\"><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">大学时跟我分分合合的男朋友，却是这么一个爱犯错的人。跟他交往，会有意无意的伤到我自尊，至今我也那么认为那伤害了我的自尊。在我骨子里有一种骄傲和很强的自尊，而他却偏偏伤了一次又一次。他的朋友都说我小气，我至今也觉得如果我不小气，那就是我傻！</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">我认为大学时的恋爱，是毕业前进入社会的一次恋爱实习。参杂了很多的疑问和抉择。就像工作，从销售到文员到编辑到技术员，最后才知道什么工作适合自己。找一个人陪你恋爱实习，也许很简单，也许很难。</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">这么多年过去了，当初分手都会舍不得那段4年的感情，后来也是时间煮了这段记忆。现在我们各自有了各自的生活，他也找到了他心仪的女孩，我能感觉出他们俩很相爱，当初最后一次分手的过渡时间，无论有多么的不舍与难熬，现在看看都是正确的</p></ul><pre class=\"brush:php;toolbar:false\">$a=1;var_dump($a);</pre><p><br/></p>', '1524403387', 'victor', '0', '0', '4');
INSERT INTO `blog_article` VALUES ('5', '分手第三篇', '分手,大学', '为何我会毅然放弃，因为在我心里，那些过去的伤，那些不好的记忆永远都抹不去，我无法面对，哪怕是当初妥协了，我想最后我也一定会再一次选择放弃....', '/img/123.jpg', '<ul class=\"infos list-paddingleft-2\" style=\"list-style-type: none;\"><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">为何我会毅然放弃，因为在我心里，那些过去的伤，那些不好的记忆永远都抹不去，我无法面对，哪怕是当初妥协了，我想最后我也一定会再一次选择放弃....</p><p style=\"margin-top: 0px; margin-bottom: 20px; padding: 0px;\">我觉得爱情也可以重新来过，只是换换主角罢了...</p></ul><p><br/></p>', '1524403476', 'victor', '0', '0', '3');
INSERT INTO `blog_category` VALUES ('1', '新闻', '收集国内外最知名的资讯', null, null, '0', '11', '0');
INSERT INTO `blog_category` VALUES ('2', '体育', '发展体育事业，增强国民体质', null, null, '0', '50', '0');
INSERT INTO `blog_category` VALUES ('3', '娱乐', '人人都有自己的娱乐圈', null, null, '0', '0', '0');
INSERT INTO `blog_category` VALUES ('4', '热点新闻', '最新新闻事件_热点信息', null, null, '0', '10', '1');
INSERT INTO `blog_category` VALUES ('5', '军事新闻', '最新新闻事件_热点新闻', null, null, '0', '12', '1');
INSERT INTO `blog_category` VALUES ('6', '体育彩票', '体育彩票管理中心', null, null, '0', '0', '2');
INSERT INTO `blog_category` VALUES ('7', '乐视体育', '乐视体育—-最专业的体育新闻', null, null, '0', '0', '2');
INSERT INTO `blog_category` VALUES ('8', '腾讯体育', '腾讯体育--人气最旺的体育', null, null, '0', '0', '2');
INSERT INTO `blog_config` VALUES ('1', '网站标题', 'web_title', '后盾网Blog统计-统计代码', '1', '网站大众化标题', 'input', '');
INSERT INTO `blog_config` VALUES ('2', '代码统计', 'web_count', 'http://www.houduwang.com', '3', '网站访问情况', 'textarea', '');
INSERT INTO `blog_config` VALUES ('3', '网站状态', 'web_status', '0', '2', '网站开启状态', 'radio', '1|开启,0|关闭');
INSERT INTO `blog_links` VALUES ('2', '锦绣钱程', '钱程无限11', 'http://www.jinxqc.com', '0');
INSERT INTO `blog_links` VALUES ('3', '锦绣钱程', '锦绣钱程', 'http://www.jinxqc.com', '0');
INSERT INTO `blog_links` VALUES ('4', '百度收藏', '百度收藏页', 'http://www.baidu.com', '0');
INSERT INTO `blog_migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `blog_migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `blog_migrations` VALUES ('2018_01_07_053232_create_links_table', '2');
INSERT INTO `blog_navs` VALUES ('1', '慢生活', 'Life', '/', '2');
INSERT INTO `blog_navs` VALUES ('2', '关于我', 'About', '/', '3');
INSERT INTO `blog_navs` VALUES ('3', '首页', 'protal', '/', '5');
INSERT INTO `blog_navs` VALUES ('4', '碎言碎语', 'Doing', '/', '1');
INSERT INTO `blog_navs` VALUES ('5', '模板分享', 'Share', '/', '0');
INSERT INTO `blog_navs` VALUES ('6', '学无止境', 'Learm', '/', '0');
INSERT INTO `blog_navs` VALUES ('7', '留言板', 'Gustbook', '/', '0');
INSERT INTO `blog_users` VALUES ('1', '唐清', '490319@qq.com', '$2y$10$pZEu2wOS9WBJwvR.6rb4.u4BLhfy7ui8k05vIi2h.8.XZobddTmKG', 'X6GTQqvUOauLzWyyuRIcVi8T5aM9vXAsXBTHkM7lMFlpNcI07q7o946CpdRG', '2017-07-03 14:00:34', '2017-07-05 14:27:20', '0');
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2015_12_30_141033_create_msgs_table', '1');
INSERT INTO `migrations` VALUES ('2015_12_30_141210_create_ref_members_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_20_134043_create_articles_table', '2');
