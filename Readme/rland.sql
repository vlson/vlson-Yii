/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : rland

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-07-13 15:44:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for vlson_account
-- ----------------------------
DROP TABLE IF EXISTS `vlson_account`;
CREATE TABLE `vlson_account` (
  `account_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_name` varchar(15) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(88) NOT NULL COMMENT '通行证密码',
  `email` varchar(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机',
  `status` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '账号状态',
  `create_at` datetime NOT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '更新时间',
  `avatar` varchar(255) DEFAULT '' COMMENT '头像',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for vlson_account_cat
-- ----------------------------
DROP TABLE IF EXISTS `vlson_account_cat`;
CREATE TABLE `vlson_account_cat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) unsigned NOT NULL COMMENT '通行证id',
  `cat_id` int(11) unsigned NOT NULL COMMENT '分类id',
  `create_at` datetime NOT NULL COMMENT '创建时间',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vlson_account_role
-- ----------------------------
DROP TABLE IF EXISTS `vlson_account_role`;
CREATE TABLE `vlson_account_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) unsigned NOT NULL COMMENT '通行证ID',
  `role_id` int(11) unsigned NOT NULL COMMENT '角色id',
  `create_at` datetime NOT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vlson_cats
-- ----------------------------
DROP TABLE IF EXISTS `vlson_cats`;
CREATE TABLE `vlson_cats` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL COMMENT '分类名称',
  `create_at` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vlson_posts
-- ----------------------------
DROP TABLE IF EXISTS `vlson_posts`;
CREATE TABLE `vlson_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL COMMENT '博客标题',
  `post_summary` varchar(255) DEFAULT NULL COMMENT '博客梗概',
  `post_content` text NOT NULL COMMENT '博客内容',
  `label_img` varchar(255) NOT NULL COMMENT '标签图',
  `account_id` int(11) NOT NULL COMMENT '通行证id',
  `account_name` varchar(255) DEFAULT NULL COMMENT '通行证昵称',
  `tag_id` varchar(255) NOT NULL COMMENT '标签id',
  `status` tinyint(6) NOT NULL DEFAULT '0' COMMENT '文章状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`post_id`),
  KEY `idx_cat_valid` (`status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='鏂囩珷涓昏〃';

-- ----------------------------
-- Table structure for vlson_post_cat
-- ----------------------------
DROP TABLE IF EXISTS `vlson_post_cat`;
CREATE TABLE `vlson_post_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '鑷??ID',
  `post_id` int(11) DEFAULT NULL COMMENT '文章id',
  `cat_id` int(11) DEFAULT NULL COMMENT '分类id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`,`cat_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='鏂囩珷鍜屾爣绛惧叧绯昏〃';

-- ----------------------------
-- Table structure for vlson_role
-- ----------------------------
DROP TABLE IF EXISTS `vlson_role`;
CREATE TABLE `vlson_role` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(16) NOT NULL DEFAULT '' COMMENT '角色名称',
  `status` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '角色状态',
  `create_at` datetime NOT NULL COMMENT '创建时间',
  `update_at` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for vlson_tags
-- ----------------------------
DROP TABLE IF EXISTS `vlson_tags`;
CREATE TABLE `vlson_tags` (
  `tag_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) NOT NULL DEFAULT '' COMMENT '标签名称',
  `create_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
