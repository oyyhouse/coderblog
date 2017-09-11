/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : laravelapp

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-03 23:04:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(4) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `resource` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '状态',
  `view` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('26', '哈哈哈哈哈114', null, '<p>阿萨德撒的撒大苏打Young</p>', '阿斯达多撒大所1', '0', '1', '2017-09-03 06:56:52', '2017-09-03 07:15:39', '20', 'Young', '1', '0');
INSERT INTO `articles` VALUES ('27', '这些自行车自行车行政村', null, '<p>大多数多多撒奥<br/></p>', '撒大大所大', '0', '1', '2017-09-03 07:19:05', '2017-09-03 07:19:05', '1', '0', '1', '0');
INSERT INTO `articles` VALUES ('28', '韦尔奇二二', null, '<p>阿斯达大大打算<br/></p>', '撒大大所大', '0', '1', '2017-09-03 07:19:40', '2017-09-03 07:19:40', '19', '0', '1', '0');
INSERT INTO `articles` VALUES ('29', 'woejidueu xc cs s', null, '<p>sadsdadsdsdsdssdas<br/></p>', 'wemnenc', '0', '1', '2017-09-03 07:22:37', '2017-09-03 07:22:37', '2', '0', '1', '0');
INSERT INTO `articles` VALUES ('30', 'wqewewq', null, '<p>qweewqweqweq<br/></p>', 'qweqweqew', '0', '1', '2017-09-03 07:23:20', '2017-09-03 07:23:20', '1', '0', '1', '0');
INSERT INTO `articles` VALUES ('31', 'wojsiusueedh', null, '<p>saddadadadsads<br/></p>', 'asdddsd', '0', '1', '2017-09-03 07:25:22', '2017-09-03 07:25:22', '25', '0', '1', '0');
INSERT INTO `articles` VALUES ('32', 'sdaddadsd', null, '<p>asdsdsadsdsads</p>', 'adsdsdads', '0', '1', '2017-09-03 07:27:25', '2017-09-03 07:41:17', '22', '0', '1', '0');
INSERT INTO `articles` VALUES ('33', '哈哈哈哈哈114', '', '<p>阿萨德撒的撒大苏打Young</p>', '阿斯达多撒大所1', '0', '1', '2017-09-03 06:56:52', '2017-09-03 07:15:39', '20', 'Young', '1', '0');
INSERT INTO `articles` VALUES ('34', '这些自行车自行车行政村', '', '<p>大多数多多撒奥<br/></p>', '撒大大所大', '0', '1', '2017-09-03 07:19:05', '2017-09-03 07:19:05', '1', '0', '1', '0');
INSERT INTO `articles` VALUES ('35', '韦尔奇二二', '', '<p>阿斯达大大打算<br/></p>', '撒大大所大', '0', '1', '2017-09-03 07:19:40', '2017-09-03 07:19:40', '19', '0', '1', '0');
INSERT INTO `articles` VALUES ('36', 'woejidueu xc cs s', '', '<p>sadsdadsdsdsdssdas<br/></p>', 'wemnenc', '0', '1', '2017-09-03 07:22:37', '2017-09-03 07:22:37', '2', '0', '1', '0');
INSERT INTO `articles` VALUES ('37', 'wqewewq', '', '<p>qweewqweqweq<br/></p>', 'qweqweqew', '0', '1', '2017-09-03 07:23:20', '2017-09-03 07:23:20', '1', '0', '1', '0');
INSERT INTO `articles` VALUES ('38', 'wojsiusueedh', '', '<p>saddadadadsads<br/></p>', 'asdddsd', '0', '1', '2017-09-03 07:25:22', '2017-09-03 07:25:22', '25', '0', '1', '0');
INSERT INTO `articles` VALUES ('39', 'sdaddadsd', '', '<p>asdsdsadsdsads</p>', 'adsdsdads', '0', '1', '2017-09-03 07:27:25', '2017-09-03 07:41:17', '22', '0', '1', '0');
INSERT INTO `articles` VALUES ('40', '请问额企鹅全文', null, '<p>3213213132</p>', '请问二群二群翁无', '0', '1', '2017-09-03 08:14:44', '2017-09-03 09:16:25', '1', '0', '1', '0');

-- ----------------------------
-- Table structure for article_categorys
-- ----------------------------
DROP TABLE IF EXISTS `article_categorys`;
CREATE TABLE `article_categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章分类编号',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '文章分类父编号',
  `cate_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类名称',
  `order` int(11) DEFAULT NULL COMMENT '排序',
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '链接地址',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `description` text COLLATE utf8_unicode_ci COMMENT 'SEO描述',
  `seotitle` text COLLATE utf8_unicode_ci COMMENT 'SEO标题',
  `keyword` text COLLATE utf8_unicode_ci COMMENT 'SEO关键词',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article_categorys
-- ----------------------------
INSERT INTO `article_categorys` VALUES ('1', '0', '文章主分类1', '1', null, '2017-09-01 15:49:53', '机撒旦撒多', '撒大大', '是打算大所多', '2017-09-01 15:50:08');
INSERT INTO `article_categorys` VALUES ('2', '0', '文章主分类2', '2', '', '2017-09-01 15:49:53', '机撒旦撒多', '撒大大多', '地方法规的法规的', '2017-09-01 15:50:08');
INSERT INTO `article_categorys` VALUES ('3', '0', '文章主分类3', '4', '', '2017-09-01 15:49:53', '机撒旦撒多', '撒大大', '是打算大所多', '2017-09-01 15:50:08');
INSERT INTO `article_categorys` VALUES ('4', '1', '文章次分类1', '1', null, '2017-09-01 15:51:20', null, null, '', '2017-09-01 15:51:23');
INSERT INTO `article_categorys` VALUES ('5', '2', '文章次分类2', '3', '', '2017-09-01 15:51:20', '', '', '', '2017-09-01 15:51:23');
INSERT INTO `article_categorys` VALUES ('6', '3', '文章次分类1', '2', '', '2017-09-01 15:51:20', '', '', '', '2017-09-01 15:51:23');
INSERT INTO `article_categorys` VALUES ('7', '1', '文章次分类11', '1', '', '2017-09-01 15:51:20', '', '', '', '2017-09-01 15:51:23');
INSERT INTO `article_categorys` VALUES ('8', '2', '文章次分类sa', '1', null, '2017-09-01 08:46:46', '次分类次分类次分类次分类sa', null, null, '2017-09-01 08:46:46');
INSERT INTO `article_categorys` VALUES ('12', '3', '文章阿迪', null, null, '2017-09-01 10:35:46', null, null, null, '2017-09-01 10:35:46');
INSERT INTO `article_categorys` VALUES ('13', '0', '3214333', null, null, '2017-09-01 10:39:27', null, null, null, '2017-09-01 10:39:27');
INSERT INTO `article_categorys` VALUES ('16', '0', '文章主分类11', '3', null, '2017-09-02 15:30:30', '撒打算当大哥', null, null, '2017-09-02 15:30:30');
INSERT INTO `article_categorys` VALUES ('17', '3', '其味无穷二无群', null, null, '2017-09-02 15:42:41', null, null, null, '2017-09-02 15:42:41');
INSERT INTO `article_categorys` VALUES ('18', '1', '文章次分类1333', '1', null, '2017-09-02 15:57:17', null, null, null, '2017-09-02 15:57:17');
INSERT INTO `article_categorys` VALUES ('19', '1', '文章次分类133', '1', null, '2017-09-02 16:04:02', null, null, null, '2017-09-02 16:04:02');
INSERT INTO `article_categorys` VALUES ('20', '1', '文章次分类133555999111', '1', null, '2017-09-02 16:04:45', null, null, null, '2017-09-03 03:35:05');
INSERT INTO `article_categorys` VALUES ('22', '1', '文章次分类133555777910', '1', null, '2017-09-03 03:16:43', null, null, null, '2017-09-03 03:34:48');
INSERT INTO `article_categorys` VALUES ('23', '1', '文章次分类13355', '1', null, '2017-09-03 03:20:38', 'ddgdgfggfdsfdffsdfsddfsfsdfbvnnv', null, null, '2017-09-03 03:24:16');
INSERT INTO `article_categorys` VALUES ('24', '0', '打打杀杀多', null, null, '2017-09-03 03:44:21', null, null, null, '2017-09-03 03:44:21');
INSERT INTO `article_categorys` VALUES ('25', '0', '撒大大所大叔大婶多', null, null, '2017-09-03 03:45:37', null, null, null, '2017-09-03 03:45:37');
INSERT INTO `article_categorys` VALUES ('26', '0', '二维若翁热', null, null, '2017-09-03 03:55:02', null, null, null, '2017-09-03 03:55:02');
INSERT INTO `article_categorys` VALUES ('27', '0', '的防辐射服', null, null, '2017-09-03 03:56:00', null, null, null, '2017-09-03 03:56:00');
INSERT INTO `article_categorys` VALUES ('28', '0', '奥术大师多撒大所多所', null, null, '2017-09-03 04:02:19', null, null, null, '2017-09-03 04:02:19');
INSERT INTO `article_categorys` VALUES ('29', '0', '是的是的范德萨111', null, null, '2017-09-03 04:04:42', null, null, null, '2017-09-03 06:43:14');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `article_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '兔小辉', '1031181797@qq.com', 'www.5save.cn', 'PHP 是世界上最好的编程语言 没有之一1111', '3', '2017-08-18 07:43:57', '2017-08-22 04:24:18');
INSERT INTO `comments` VALUES ('2', 'OYYHOUSE', 'allan@eecco.cn', 'www.oyyhouse.com', '@兔小辉   这我就不服了3', '3', '2017-08-18 07:46:30', '2017-08-22 04:24:55');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_08_17_091311_create_article_table', '1');
INSERT INTO `migrations` VALUES ('4', '2017_08_18_065137_create_comments_table', '2');

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
INSERT INTO `password_resets` VALUES ('1031181797@qq.com', '$2y$10$Spv9BGPueg./cUCjQ3plwec2hI9RjuALlXstD6u6.CzGOctoVejp6', '2017-08-28 08:37:57');

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
INSERT INTO `users` VALUES ('1', 'Young', '1031181797@qq.com', '$2y$10$ntuuHLH6EYw7PPR2VuPl7OkG4VXJiHvkZMBSagf7xczcd8iZ0BZ3q', 'NhzDlAYyEYTi8MmaSP23w5s5sl723C2PrONPaBF19TKFX6G414J2QAT2K5i2', '2017-08-17 09:30:28', '2017-08-17 09:30:28');
