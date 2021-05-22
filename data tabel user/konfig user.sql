/*
Navicat MySQL Data Transfer

Source Server         : konek
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_manajemen_dokumen

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-05-22 13:40:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_activation_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_activation_attempts
-- ----------------------------
INSERT INTO `auth_activation_attempts` VALUES ('1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '1b5939d4c92013673dddd576d11b9e90', '2021-05-21 09:59:54');
INSERT INTO `auth_activation_attempts` VALUES ('2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '1b5939d4c92013673dddd576d11b9e90', '2021-05-21 10:00:23');
INSERT INTO `auth_activation_attempts` VALUES ('3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '1b5939d4c92013673dddd576d11b9e90', '2021-05-21 10:01:49');
INSERT INTO `auth_activation_attempts` VALUES ('4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '1b5939d4c92013673dddd576d11b9e90', '2021-05-21 10:08:28');
INSERT INTO `auth_activation_attempts` VALUES ('5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:12:01');
INSERT INTO `auth_activation_attempts` VALUES ('6', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:13:20');
INSERT INTO `auth_activation_attempts` VALUES ('7', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:13:22');
INSERT INTO `auth_activation_attempts` VALUES ('8', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:13:24');
INSERT INTO `auth_activation_attempts` VALUES ('9', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:13:24');
INSERT INTO `auth_activation_attempts` VALUES ('10', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:13:40');
INSERT INTO `auth_activation_attempts` VALUES ('11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:15:35');
INSERT INTO `auth_activation_attempts` VALUES ('12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '81ec5287c698044f20ec2f2a40bd439f', '2021-05-21 10:15:57');
INSERT INTO `auth_activation_attempts` VALUES ('13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '49eb21a61e8ec7c4b8559d928e604849', '2021-05-21 23:03:10');

-- ----------------------------
-- Table structure for `auth_groups`
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_groups
-- ----------------------------
INSERT INTO `auth_groups` VALUES ('1', 'member', 'member site');
INSERT INTO `auth_groups` VALUES ('2', 'admin', 'admin site');
INSERT INTO `auth_groups` VALUES ('3', 'superadmin', 'superadmin site');

-- ----------------------------
-- Table structure for `auth_groups_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_groups_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `auth_groups_users`
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------
INSERT INTO `auth_groups_users` VALUES ('1', '4');
INSERT INTO `auth_groups_users` VALUES ('1', '16');
INSERT INTO `auth_groups_users` VALUES ('1', '18');
INSERT INTO `auth_groups_users` VALUES ('1', '19');
INSERT INTO `auth_groups_users` VALUES ('2', '2');
INSERT INTO `auth_groups_users` VALUES ('2', '3');
INSERT INTO `auth_groups_users` VALUES ('2', '17');
INSERT INTO `auth_groups_users` VALUES ('3', '1');

-- ----------------------------
-- Table structure for `auth_logins`
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
INSERT INTO `auth_logins` VALUES ('1', '::1', 'AFIF@student.uns.ac.id', '2', '2021-05-17 03:24:39', '1');
INSERT INTO `auth_logins` VALUES ('2', '::1', 'adjvenadam@gmail.com', '1', '2021-05-17 03:25:53', '1');
INSERT INTO `auth_logins` VALUES ('3', '::1', 'andres', null, '2021-05-17 03:32:10', '0');
INSERT INTO `auth_logins` VALUES ('4', '::1', 'CHAND@STUDENT.UNS.AC.ID', '3', '2021-05-17 03:32:34', '1');
INSERT INTO `auth_logins` VALUES ('5', '::1', 'CHAND@STUDENT.UNS.AC.ID', '3', '2021-05-17 03:38:28', '1');
INSERT INTO `auth_logins` VALUES ('6', '::1', 'CHAND@STUDENT.UNS.AC.ID', '3', '2021-05-17 03:39:24', '1');
INSERT INTO `auth_logins` VALUES ('7', '::1', 'CHAND@STUDENT.UNS.AC.ID', '3', '2021-05-17 03:40:00', '1');
INSERT INTO `auth_logins` VALUES ('8', '::1', 'stiv', null, '2021-05-17 03:40:45', '0');
INSERT INTO `auth_logins` VALUES ('9', '::1', 'CYNTHIA@STUDENT.UNS.AC.ID', '4', '2021-05-17 03:40:56', '1');
INSERT INTO `auth_logins` VALUES ('10', '::1', 'stiv', null, '2021-05-17 03:41:40', '0');
INSERT INTO `auth_logins` VALUES ('11', '::1', 'CYNTHIA@STUDENT.UNS.AC.ID', '4', '2021-05-17 03:41:51', '1');
INSERT INTO `auth_logins` VALUES ('12', '::1', 'advenadam@student.uns.ac.id', '5', '2021-05-17 03:42:48', '1');
INSERT INTO `auth_logins` VALUES ('13', '::1', 'adjvenadam@gmail.com', '1', '2021-05-17 03:45:49', '1');
INSERT INTO `auth_logins` VALUES ('14', '::1', 'advenadam@student.uns.ac.id', '6', '2021-05-17 03:47:10', '1');
INSERT INTO `auth_logins` VALUES ('15', '::1', 'adjvenadam@gmail.com', '1', '2021-05-17 03:48:07', '1');
INSERT INTO `auth_logins` VALUES ('16', '::1', 'adjvenadam@gmail.com', '1', '2021-05-17 03:48:20', '1');
INSERT INTO `auth_logins` VALUES ('17', '::1', 'aka', null, '2021-05-17 03:50:09', '0');
INSERT INTO `auth_logins` VALUES ('18', '::1', 'aka', null, '2021-05-17 03:50:19', '0');
INSERT INTO `auth_logins` VALUES ('19', '::1', 'adjvenadam@gmail.com', '1', '2021-05-17 03:50:27', '1');
INSERT INTO `auth_logins` VALUES ('20', '::1', 'adjvenadam@gmail.com', '1', '2021-05-17 03:51:54', '1');
INSERT INTO `auth_logins` VALUES ('21', '::1', 'andres', null, '2021-05-17 03:52:16', '0');
INSERT INTO `auth_logins` VALUES ('22', '::1', 'AFIF@student.uns.ac.id', '2', '2021-05-17 03:52:24', '1');
INSERT INTO `auth_logins` VALUES ('23', '::1', 'adjvenadam@gmail.com', '1', '2021-05-17 07:53:47', '1');
INSERT INTO `auth_logins` VALUES ('24', '::1', 'adjvenadam@gmail.com', '1', '2021-05-20 08:16:09', '1');
INSERT INTO `auth_logins` VALUES ('25', '::1', 'adjvenadam@gmail.com', '1', '2021-05-20 21:36:33', '1');
INSERT INTO `auth_logins` VALUES ('26', '::1', 'adjvenadam@gmail.com', '1', '2021-05-20 23:38:14', '1');
INSERT INTO `auth_logins` VALUES ('27', '::1', 'usoli', '8', '2021-05-21 04:24:48', '0');
INSERT INTO `auth_logins` VALUES ('28', '::1', 'zidanes', '15', '2021-05-21 04:57:53', '0');
INSERT INTO `auth_logins` VALUES ('29', '::1', 'zidanes', null, '2021-05-21 04:58:32', '0');
INSERT INTO `auth_logins` VALUES ('30', '::1', 'zidanes', '15', '2021-05-21 04:59:47', '0');
INSERT INTO `auth_logins` VALUES ('31', '::1', 'advenadam@student.uns.ac.id', '15', '2021-05-21 05:01:16', '0');
INSERT INTO `auth_logins` VALUES ('32', '::1', 'usolisio', '17', '2021-05-21 05:10:25', '0');
INSERT INTO `auth_logins` VALUES ('33', '::1', 'maman', '18', '2021-05-21 05:14:45', '0');
INSERT INTO `auth_logins` VALUES ('34', '::1', 'yakuza', '19', '2021-05-21 09:26:08', '0');
INSERT INTO `auth_logins` VALUES ('35', '::1', 'asdasd', null, '2021-05-21 09:31:51', '0');
INSERT INTO `auth_logins` VALUES ('36', '::1', 'yakuza', '19', '2021-05-21 09:33:14', '0');
INSERT INTO `auth_logins` VALUES ('37', '::1', 'yakuza', '19', '2021-05-21 09:35:39', '0');
INSERT INTO `auth_logins` VALUES ('38', '::1', 'yakuza', null, '2021-05-21 09:35:52', '0');
INSERT INTO `auth_logins` VALUES ('39', '::1', 'yakuza', '19', '2021-05-21 09:36:02', '0');
INSERT INTO `auth_logins` VALUES ('40', '::1', 'yakuza', '19', '2021-05-21 09:38:09', '0');
INSERT INTO `auth_logins` VALUES ('41', '::1', 'yakuza', '19', '2021-05-21 09:38:32', '0');
INSERT INTO `auth_logins` VALUES ('42', '::1', 'leviatan', '20', '2021-05-21 10:07:34', '0');
INSERT INTO `auth_logins` VALUES ('43', '::1', 'advenadam@student.uns.ac.id', '21', '2021-05-21 10:15:56', '1');
INSERT INTO `auth_logins` VALUES ('44', '::1', 'adjvenadam@gmail.com', '1', '2021-05-21 10:17:32', '1');
INSERT INTO `auth_logins` VALUES ('45', '::1', 'advenadam@student.uns.ac.id', '21', '2021-05-21 19:55:28', '1');
INSERT INTO `auth_logins` VALUES ('46', '::1', 'adjvenadam@gmail.com', '1', '2021-05-21 19:55:43', '1');
INSERT INTO `auth_logins` VALUES ('47', '::1', 'adjvenadam@gmail.com', '1', '2021-05-21 19:55:58', '1');
INSERT INTO `auth_logins` VALUES ('48', '::1', 'adjvenadam@gmail.com', '1', '2021-05-21 21:07:00', '1');
INSERT INTO `auth_logins` VALUES ('49', '::1', 'adjvenadam@gmail.com', '1', '2021-05-21 21:07:11', '1');
INSERT INTO `auth_logins` VALUES ('50', '::1', 'adjvenadam@gmail.com', '1', '2021-05-22 00:46:36', '1');
INSERT INTO `auth_logins` VALUES ('51', '::1', 'adjvenadam@gmail.com', '1', '2021-05-22 01:14:29', '1');
INSERT INTO `auth_logins` VALUES ('52', '::1', 'adjvenadam@gmail.com', '1', '2021-05-22 01:14:37', '1');

-- ----------------------------
-- Table structure for `auth_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_permissions
-- ----------------------------
INSERT INTO `auth_permissions` VALUES ('1', 'manage user', 'manage all user');
INSERT INTO `auth_permissions` VALUES ('2', 'manage profil', 'manage profill');

-- ----------------------------
-- Table structure for `auth_reset_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_reset_attempts
-- ----------------------------
INSERT INTO `auth_reset_attempts` VALUES ('1', 'advenadam@student.uns.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'c515f634e80d69e744a4816920b53d31', '2021-05-21 04:59:37');

-- ----------------------------
-- Table structure for `auth_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `auth_users_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_users_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'adjvenadam@gmail.com', 'aka', null, 'default.jpg', '$2y$10$LhOi7q/9T.olgZCaWZRnIO2gZt82MJctDqSxuR7dKAFdK0SUJQeny', null, null, null, null, null, null, '1', '0', '2021-05-17 03:23:35', '2021-05-17 03:23:35', null);
INSERT INTO `users` VALUES ('2', 'AFIF@student.uns.ac.id', 'afif', null, 'default.jpg', '$2y$10$07NgVmNJA.X.Js5AG6DCbef3pjEt5d48VxEgOgwb/bIe.KjmE0EZS', null, null, null, null, null, null, '1', '0', '2021-05-17 03:24:29', '2021-05-17 03:24:29', null);
INSERT INTO `users` VALUES ('3', 'CHAND@STUDENT.UNS.AC.ID', 'andres', null, 'default.jpg', '$2y$10$IwhztyqSkDkmMmC6zpFXTeKBIexUSt53iNaOIAUo.k.bqrPbxKfwe', null, null, null, null, null, null, '1', '0', '2021-05-17 03:31:50', '2021-05-17 03:31:50', null);
INSERT INTO `users` VALUES ('4', 'CYNTHIA@STUDENT.UNS.AC.ID', 'stiv', null, 'default.jpg', '$2y$10$nbBNtv6qN8eSMdwB2pmxkO8.vKWgGJ5rF8Zd3zhaifS.CKgtWdpwq', null, null, null, null, null, null, '1', '0', '2021-05-17 03:40:35', '2021-05-17 03:40:35', null);
INSERT INTO `users` VALUES ('16', 'Alu@mail.com', 'zionis', null, 'default.jpg', '$2y$10$unrS9YiLvEw6wLIuodFa9OTCR5UHWtDnlWLgfof2YDqfCUOASFWM.', null, null, null, null, null, null, '1', '0', '2021-05-21 05:04:01', '2021-05-21 05:04:01', null);
INSERT INTO `users` VALUES ('17', '214sad@asdsad.cas', 'usolisio', null, 'default.jpg', '$2y$10$nFpI9kOaFFV1ys2ZgEsW/.HodGtbUM9BbZNhavn5vdOVS2Q7Apz86', null, null, null, '58f3d8d8c83e8c8d2e090394a4c5f7e9', null, null, '0', '0', '2021-05-21 05:09:54', '2021-05-21 05:09:54', null);
INSERT INTO `users` VALUES ('18', 'asdas@mailc.com', 'maman', null, 'default.jpg', '$2y$10$MuRH2tBgOG61YPTZQqqU3OSkA//tGoSkTAfCe32WYewkDqsaKyDOC', null, null, null, null, null, null, '0', '0', '2021-05-21 05:14:11', '2021-05-21 05:14:11', null);
INSERT INTO `users` VALUES ('19', 'yuza@inkl.ude', 'yakuza', null, 'default.jpg', '$2y$10$CUOEktxaQUf.BjJQugOCYeu0FxcM1.2TQgcchSy39gurZMAAmRvW.', null, null, null, null, null, null, '0', '0', '2021-05-21 09:25:39', '2021-05-21 09:25:39', null);
INSERT INTO `users` VALUES ('21', 'advenadam@student.uns.ac.id', 'leviatan', null, 'default.jpg', '$2y$10$sKyLzAA0k5YI5g7DceOo.OY0j/if0plqdXE3SV/sHWZEHRfWWholW', null, null, null, null, null, null, '1', '0', '2021-05-21 10:11:38', '2021-05-21 10:15:35', null);
INSERT INTO `users` VALUES ('22', 'advenadam48@gmail.com', 'advenadam', null, 'default.jpg', '$2y$10$1he9QrxKLU9KkjI/j8WGE.2NE7KBUFL.1SizAfadi9LLLsJ9jMlZ.', null, null, null, null, null, null, '1', '0', '2021-05-21 22:59:32', '2021-05-21 23:03:10', null);
