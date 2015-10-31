/*
Navicat MySQL Data Transfer

Source Server         : nick
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : sj

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-10-30 02:05:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2015_09_06_094829_create_table_users', '1');
INSERT INTO `migrations` VALUES ('2015_09_06_100641_create_table_groups', '1');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `NewsText` text,
  `shortText` varchar(500) DEFAULT NULL,
  `date` int(11) NOT NULL,
  `isTop` tinyint(4) NOT NULL DEFAULT '0',
  `isArchive` tinyint(4) NOT NULL DEFAULT '0',
  `editBy` int(11) NOT NULL,
  `isDef_photo` tinyint(4) NOT NULL DEFAULT '1',
  `imageExt` varchar(5) DEFAULT NULL,
  `default_photo` varchar(20) DEFAULT NULL,
  `seo_description` text,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for `news_categories`
-- ----------------------------
DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE `news_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ParentId` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `position` int(5) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_categories
-- ----------------------------

-- ----------------------------
-- Table structure for `news_tags`
-- ----------------------------
DROP TABLE IF EXISTS `news_tags`;
CREATE TABLE `news_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NewsId` int(11) NOT NULL,
  `TagsId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news_tags
-- ----------------------------

-- ----------------------------
-- Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `TagName` varchar(20) NOT NULL,
  `active` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------

-- ----------------------------
-- Table structure for `usergroups`
-- ----------------------------
DROP TABLE IF EXISTS `usergroups`;
CREATE TABLE `usergroups` (
  `ugroup` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Permissions` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ugroup`),
  UNIQUE KEY `usergroups_groupname_unique` (`GroupName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of usergroups
-- ----------------------------
INSERT INTO `usergroups` VALUES ('1', 'Admin', 'all');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ugroup` int(11) NOT NULL,
  `FirstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '1',
  `RegData` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `users_email_username_unique` (`email`,`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'Gunnar', 'Hansen', 'jKiehn', 'admin@mail.com', '$2y$10$/hFEd1HcRhyB5OE24.wM1.GoAUqbPQcLvItZZklNmuBGTQAccJR/2', '1', '1445896703', null, '2015-10-26 21:58:23', '2015-10-26 21:58:23');
