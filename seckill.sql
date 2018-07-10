/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : seckill

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-10 18:56:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商品名称',
  `shop_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商铺id',
  `goods_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商品编号',
  `goods_type` int(11) NOT NULL DEFAULT '0' COMMENT '商品类型',
  `goods_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品数量',
  `goods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为上架，0为下架',
  `record_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录时间',
  `update_time` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `goods_no_i` (`goods_no`),
  KEY `goods_name_i` (`goods_name`),
  KEY `shop_id_i` (`shop_id`),
  KEY `goods_type_i` (`goods_type`),
  KEY `record_time` (`record_time`),
  KEY `update_time` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for `goods_info`
-- ----------------------------
DROP TABLE IF EXISTS `goods_info`;
CREATE TABLE `goods_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `goods_info` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品 信息',
  `record_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后记录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `goods_id_i` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of goods_info
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2018_07_10_105145_create_goods_info_table', '1');
INSERT INTO `migrations` VALUES ('2', '2018_07_10_105145_create_goods_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_07_10_105145_create_order_info_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_07_10_105145_create_order_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_07_10_105145_create_shop_table', '1');
INSERT INTO `migrations` VALUES ('6', '2018_07_10_105145_create_user_table', '1');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '订单号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `goods_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商品名称',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '购买数量',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `all_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购买总价格',
  `is_pay` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未付款，1付款，2退款',
  `send_goods` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未发货，1已发货，2已收货，3已退货',
  `is_finished` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0订单未完成，1订单已完成(或失效）',
  `record_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单记录时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id_i` (`order_id`),
  KEY `user_id_i` (`user_id`),
  KEY `goods_id_i` (`goods_id`),
  KEY `goods_name_i` (`goods_name`),
  KEY `record_time_i` (`record_time`),
  KEY `update_time_i` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for `order_info`
-- ----------------------------
DROP TABLE IF EXISTS `order_info`;
CREATE TABLE `order_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '订单id',
  `order_info` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '订单信息',
  `record_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录时间',
  `update_time` int(11) DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id_i` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of order_info
-- ----------------------------

-- ----------------------------
-- Table structure for `shop`
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  KEY `name_i` (`name`),
  KEY `record_time_i` (`record_time`),
  KEY `update_time_` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shop
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1普通用户,2商户',
  `record_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_i` (`email`),
  KEY `name_i` (`name`),
  KEY `record_time_i` (`record_time`),
  KEY `update_time_i` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
