

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `bnb_id` int NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=pending, 1=checked in, 2=checked out',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (9, 1, 1, '2019-03-04 00:00:00', '2019-03-05 00:00:00', 0);
INSERT INTO `orders` VALUES (10, 3, 1, '2019-03-04 00:00:00', '2019-03-05 00:00:00', 0);

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms`  (
  `bnb_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `bnb_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bnb_desc` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bnb_guests` int NOT NULL,
  `bnb_img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '0=pending, 1=checked in, 2=checked out',
  `price` int NOT NULL,
  PRIMARY KEY (`bnb_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES (1, 'It park condominium Cebu city', 'It park condominium \r\nCebu city\r\nIt park condominium \r\nCebu city\r\nIt park condominium Cebu city', 3, 'img/park_condominium.png ', 1, 600);
INSERT INTO `rooms` VALUES (2, 'rose_condominium', 'Sabian rose condominium Alabang', 2, 'img/rose_condominium.png', 1, 1200);
INSERT INTO `rooms` VALUES (3, '4BR_Townhome', 'New Batmans 4BR Townhome Cebu city', 2, 'img/4BR_Townhome.png', 1, 6498);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phonenumber` int NULL DEFAULT NULL,
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '0=blocked, 1=normal, 2=pending',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin', 'admin@dot.com', 2147483647, '12345', 1);

SET FOREIGN_KEY_CHECKS = 1;
