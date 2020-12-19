/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : foto_radnja

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 02/02/2020 18:23:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kontakt
-- ----------------------------
DROP TABLE IF EXISTS `kontakt`;
CREATE TABLE `kontakt`  (
  `kontakt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ime` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prezime` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `poruka` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`kontakt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ime` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prezime` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefon` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `tip_proslave` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `lokacija` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `datum` date NULL DEFAULT NULL,
  `vreme` time(0) NULL DEFAULT NULL,
  `zahtev` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `obrada` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Ana', 'Ilic', '', NULL, 'nightlife', 'Kaluđerica', '2020-02-22', NULL, NULL, NULL);
INSERT INTO `user` VALUES (2, 'Petar', 'Ilic', '', NULL, 'outdoor', 'Novi Beograd', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (3, 'Petar', 'Ilic', '', NULL, 'nightlife', 'Novi Beograd', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (4, 'Jelena', 'Lazic', '', NULL, 'outdoor', 'Vracar', '2020-02-13', NULL, NULL, NULL);
INSERT INTO `user` VALUES (5, 'Jelena', 'Lazic', '', NULL, 'nightlife', 'Novi Beograd', '2020-03-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (6, 'Marko', 'Marković', '', NULL, 'vencanje', 'Vracar', '2020-02-22', NULL, NULL, NULL);
INSERT INTO `user` VALUES (7, 'Petar', 'Marković', '', NULL, 'nightlife', 'Zemun', '2020-04-15', NULL, NULL, NULL);
INSERT INTO `user` VALUES (8, 'Marko', 'Đorđević', '', NULL, 'rodjendan', 'Vracar', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (9, 'Marko', 'Marković', '', NULL, 'nightlife', 'Vracar', '2020-02-10', NULL, NULL, NULL);
INSERT INTO `user` VALUES (10, 'Nikola', 'Petrović', '', NULL, 'nightlife', 'Novi Beograd', '2020-02-10', NULL, NULL, NULL);
INSERT INTO `user` VALUES (11, 'Marija', 'Jovanović', '', NULL, 'vencanje', 'Novi Beograd', '2020-04-15', NULL, NULL, NULL);
INSERT INTO `user` VALUES (12, 'Marija', 'Petrović', '', NULL, 'vencanje', 'Kaluđerica', '2020-02-27', NULL, NULL, NULL);
INSERT INTO `user` VALUES (13, 'Ana', 'Lazic', '', NULL, 'rodjendan', 'Novi Beograd', '2020-04-15', NULL, NULL, NULL);
INSERT INTO `user` VALUES (14, 'Jelena', 'Marković', '', NULL, 'vencanje', 'Zemun', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (15, 'Nikola', 'Jovanović', '', NULL, 'outdoor', 'Kaluđerica', '2020-03-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (16, 'Jelena', 'Ilic', '', NULL, 'rodjendan', 'Novi Beograd', '2020-03-21', NULL, NULL, NULL);
INSERT INTO `user` VALUES (17, 'Ana', 'Lazic', '', NULL, 'outdoor', 'Zemun', '2020-02-22', NULL, NULL, NULL);
INSERT INTO `user` VALUES (18, 'Jelena', 'Jovanović', '', NULL, 'nightlife', 'Kaluđerica', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (19, 'Ana', 'Lazic', '', NULL, 'outdoor', 'Kaluđerica', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (20, 'Marija', 'Đorđević', '', NULL, 'vencanje', 'Novi Beograd', '2020-03-21', NULL, NULL, NULL);
INSERT INTO `user` VALUES (21, 'Marko', 'Ilic', '', NULL, 'vencanje', 'Novi Beograd', '2020-02-17', NULL, NULL, NULL);
INSERT INTO `user` VALUES (22, 'Marko', 'Jovanović', '', NULL, 'nightlife', 'Vracar', '2020-03-14', NULL, NULL, NULL);
INSERT INTO `user` VALUES (23, 'Marija', 'Marković', '', NULL, 'nightlife', 'Novi Beograd', '2020-03-14', NULL, NULL, NULL);
INSERT INTO `user` VALUES (24, 'Nikola', 'Jovanović', '', NULL, 'outdoor', 'Zemun', '2020-02-05', NULL, NULL, NULL);
INSERT INTO `user` VALUES (25, 'Marko', 'Marković', '', NULL, 'rodjendan', 'Zemun', '2020-03-14', NULL, NULL, NULL);
INSERT INTO `user` VALUES (26, 'Ana', 'Lazic', '', NULL, 'vencanje', 'Zemun', '2020-02-07', NULL, NULL, NULL);
INSERT INTO `user` VALUES (27, 'Ana', 'Ilic', '', NULL, 'rodjendan', 'Zemun', '2020-02-05', NULL, NULL, NULL);
INSERT INTO `user` VALUES (28, 'Petar', 'Lazic', '', NULL, 'nightlife', 'Kaluđerica', '2020-03-30', NULL, NULL, NULL);
INSERT INTO `user` VALUES (29, 'Jelena', 'Lazic', '', NULL, 'nightlife', 'Vracar', '2020-02-05', NULL, NULL, NULL);
INSERT INTO `user` VALUES (30, 'Marija', 'Petrović', '', NULL, 'rodjendan', 'Zemun', '2020-04-15', NULL, NULL, NULL);
INSERT INTO `user` VALUES (31, 'Nikola', 'Petrović', '', NULL, 'vencanje', 'Kaluđerica', '2020-02-07', NULL, NULL, NULL);
INSERT INTO `user` VALUES (32, 'Petar', 'Lazic', '', NULL, 'vencanje', 'Vracar', '2020-02-13', NULL, NULL, NULL);
INSERT INTO `user` VALUES (33, 'Petar', 'Petrović', '', NULL, 'rodjendan', 'Novi Beograd', '2020-03-30', NULL, NULL, NULL);
INSERT INTO `user` VALUES (34, 'Jelena', 'Ilic', '', NULL, 'rodjendan', 'Kaluđerica', '2020-02-10', NULL, NULL, NULL);
INSERT INTO `user` VALUES (35, 'Marko', 'Petrović', '', NULL, 'nightlife', 'Zemun', '2020-02-27', NULL, NULL, NULL);
INSERT INTO `user` VALUES (36, 'Jelena', 'Ilic', '', NULL, 'vencanje', 'Zemun', '2020-04-15', NULL, NULL, NULL);
INSERT INTO `user` VALUES (37, 'Marija', 'Marković', '', NULL, 'rodjendan', 'Vracar', '2020-02-07', NULL, NULL, NULL);
INSERT INTO `user` VALUES (38, 'Nikola', 'Marković', '', NULL, 'rodjendan', 'Novi Beograd', '2020-02-07', NULL, NULL, NULL);
INSERT INTO `user` VALUES (39, 'Ana', 'Jovanović', '', NULL, 'outdoor', 'Zemun', '2020-03-30', NULL, NULL, NULL);
INSERT INTO `user` VALUES (40, 'Jelena', 'Marković', '', NULL, 'rodjendan', 'Kaluđerica', '2020-03-27', NULL, NULL, NULL);
INSERT INTO `user` VALUES (41, 'Nikola', 'Petrović', '', NULL, 'outdoor', 'Novi Beograd', '2020-02-27', NULL, NULL, NULL);
INSERT INTO `user` VALUES (42, 'Ana', 'Jovanović', '', NULL, 'rodjendan', 'Vracar', '2020-02-10', NULL, NULL, NULL);
INSERT INTO `user` VALUES (43, 'Marija', 'Petrović', '', NULL, 'outdoor', 'Novi Beograd', '2020-02-07', NULL, NULL, NULL);
INSERT INTO `user` VALUES (44, 'Marko', 'Petrović', '', NULL, 'nightlife', 'Kaluđerica', '2020-02-05', NULL, NULL, NULL);
INSERT INTO `user` VALUES (45, 'Petar', 'Petrović', '', NULL, 'vencanje', 'Novi Beograd', '2020-03-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (46, 'Marija', 'Ilic', '', NULL, 'rodjendan', 'Novi Beograd', '2020-02-10', NULL, NULL, NULL);
INSERT INTO `user` VALUES (47, 'Marko', 'Đorđević', '', NULL, 'rodjendan', 'Vracar', '2020-02-27', NULL, NULL, NULL);
INSERT INTO `user` VALUES (48, 'Petar', 'Lazic', '', NULL, 'nightlife', 'Novi Beograd', '2020-02-10', NULL, NULL, NULL);
INSERT INTO `user` VALUES (49, 'Marija', 'Jovanović', '', NULL, 'nightlife', 'Novi Beograd', '2020-02-13', NULL, NULL, NULL);
INSERT INTO `user` VALUES (50, 'Marija', 'Lazic', '', NULL, 'vencanje', 'Vracar', '2020-02-13', NULL, NULL, NULL);
INSERT INTO `user` VALUES (51, 'Ana', 'Đorđević', '', NULL, 'outdoor', 'Zemun', '2020-02-22', NULL, NULL, NULL);
INSERT INTO `user` VALUES (52, 'Nikola', 'Petrović', '', NULL, 'nightlife', 'Vracar', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (53, 'Jelena', 'Ilic', '', NULL, 'outdoor', 'Zemun', '2020-02-27', NULL, NULL, NULL);
INSERT INTO `user` VALUES (54, 'Ana', 'Lazic', '', NULL, 'vencanje', 'Zemun', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (55, 'Marko', 'Lazic', '', NULL, 'vencanje', 'Novi Beograd', '2020-03-27', NULL, NULL, NULL);
INSERT INTO `user` VALUES (56, 'Marko', 'Jovanović', '', NULL, 'vencanje', 'Vracar', '2020-03-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (57, 'Nikola', 'Ilic', '', NULL, 'nightlife', 'Zemun', '2020-02-07', NULL, NULL, NULL);
INSERT INTO `user` VALUES (58, 'Petar', 'Jovanović', '', NULL, 'vencanje', 'Novi Beograd', '2020-02-22', NULL, NULL, NULL);
INSERT INTO `user` VALUES (59, 'Marko', 'Jovanović', '', NULL, 'rodjendan', 'Novi Beograd', '2020-02-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (60, 'Ana', 'Jovanović', '', NULL, 'rodjendan', 'Novi Beograd', '2020-03-21', NULL, NULL, NULL);
INSERT INTO `user` VALUES (61, 'Ana', 'Ilic', '', NULL, 'nightlife', 'Novi Beograd', '2020-02-07', NULL, NULL, NULL);
INSERT INTO `user` VALUES (62, 'Jelena', 'Marković', '', NULL, 'rodjendan', 'Vracar', '2020-03-30', NULL, NULL, NULL);
INSERT INTO `user` VALUES (63, 'Petar', 'Marković', '', NULL, 'rodjendan', 'Zemun', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (64, 'Ana', 'Đorđević', '', NULL, 'vencanje', 'Zemun', '2020-02-17', NULL, NULL, NULL);
INSERT INTO `user` VALUES (65, 'Nikola', 'Jovanović', '', NULL, 'outdoor', 'Zemun', '2020-02-17', NULL, NULL, NULL);
INSERT INTO `user` VALUES (66, 'Ana', 'Ilic', '', NULL, 'rodjendan', 'Novi Beograd', '2020-02-05', NULL, NULL, NULL);
INSERT INTO `user` VALUES (67, 'Marija', 'Lazic', '', NULL, 'nightlife', 'Vracar', '2020-02-13', NULL, NULL, NULL);
INSERT INTO `user` VALUES (68, 'Ana', 'Marković', '', NULL, 'nightlife', 'Vracar', '2020-02-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (69, 'Ana', 'Marković', '', NULL, 'outdoor', 'Zemun', '2020-02-10', NULL, NULL, NULL);
INSERT INTO `user` VALUES (70, 'Petar', 'Đorđević', '', NULL, 'rodjendan', 'Vracar', '2020-02-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (71, 'Marija', 'Petrović', '', NULL, 'outdoor', 'Zemun', '2020-02-13', NULL, NULL, NULL);
INSERT INTO `user` VALUES (72, 'Marija', 'Jovanović', '', NULL, 'vencanje', 'Zemun', '2020-03-19', NULL, NULL, NULL);
INSERT INTO `user` VALUES (73, 'Nikola', 'Ilic', '', NULL, 'outdoor', 'Novi Beograd', '2020-03-18', NULL, NULL, NULL);
INSERT INTO `user` VALUES (74, 'Ana', 'Petrović', '', NULL, 'vencanje', 'Kaluđerica', '2020-02-17', NULL, NULL, NULL);
INSERT INTO `user` VALUES (75, 'Ana', 'Đorđević', '', NULL, 'rodjendan', 'Kaluđerica', '2020-03-14', NULL, NULL, NULL);
INSERT INTO `user` VALUES (76, 'Lazar', 'Velimirovic', '0652076805', NULL, 'rodjendan', 'Borca', '2020-02-20', '14:00:00', 'itd itd itd....', NULL);

SET FOREIGN_KEY_CHECKS = 1;
