/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : laravelapp

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-08-17 19:08:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', 'Title 0', 'Body 0', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('2', 'Title 1', 'Body 1', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('3', 'Title 2', 'Body 2', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('4', 'Title 3', 'Body 3', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('5', 'Title 4', 'Body 4', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('6', 'Title 5', 'Body 5', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('7', 'Title 6', 'Body 6', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('8', 'Title 7', 'Body 7', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('9', 'Title 8', 'Body 8', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('10', 'Title 9', 'Body 9', '1', '2017-08-17 09:35:24', '2017-08-17 09:35:24');
INSERT INTO `articles` VALUES ('11', '测试', '测试内容1231232132133', '1', '2017-08-17 10:59:35', '2017-08-17 10:59:35');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_08_17_091311_create_article_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Young', '1031181797@qq.com', '$2y$10$ntuuHLH6EYw7PPR2VuPl7OkG4VXJiHvkZMBSagf7xczcd8iZ0BZ3q', '3hC18Sz7r4SxaiwdCQeK4WxsMTmKzKUgwMnKOdpHcbggPboZxFgFIdmh87yc', '2017-08-17 09:30:28', '2017-08-17 09:30:28');
