/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : rland

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-07-16 11:07:40
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

#角色表
CREATE TABLE `vlson_role` (
	`role_id` SMALLINT(6) UNSIGNED NOT NULL auto_increment,
	`role_code` varchar(25) NOT NULL DEFAULT '' comment '角色代码',
	`role_name` varchar(25) NOT NULL DEFAULT '' comment '角色名称',
	`status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 comment '状态',
	`remark` varchar(125) DEFAULT '' COMMENT '备注',
	primary KEY (`role_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT '角色表';

#权限节点表
CREATE TABLE `vlson_node` (
	`node_id` SMALLINT(6) UNSIGNED NOT NULL auto_increment,
	`node_code` varchar(25) NOT NULL DEFAULT '' comment '节点名称',
	`node_title` varchar(25) NOT NULL DEFAULT '' comment '节点标题',
	`level` SMALLINT(3) UNSIGNED NOT NULL DEFAULT 1 comment '节点等级',
	`p_id` SMALLINT(6) UNSIGNED NOT NULL DEFAULT 1 comment '父级节点',
	`sort` TINYINT(2) UNSIGNED NOT NULL DEFAULT 1 comment '排序',
	`status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 comment '状态',
	`remark` varchar(125) DEFAULT '' COMMENT '备注',
	primary KEY (`node_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT '权限节点表';


#用户角色表
CREATE TABLE `vlson_role_user` (
	`id` SMALLINT(6) UNSIGNED NOT NULL auto_increment,
	`role_id` SMALLINT(6) NOT NULL DEFAULT 0 comment '角色id',
	`account_id` INT(11) NOT NULL DEFAULT 0 comment '通行证id',
	`status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 comment '状态',
	primary KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT '用户角色表';

#角色权限表
CREATE TABLE `vlson_access` (
	`id` SMALLINT(6) UNSIGNED NOT NULL auto_increment,
	`role_id` SMALLINT(6) NOT NULL DEFAULT 0 comment '角色id',
	`node_id` SMALLINT(11) NOT NULL DEFAULT 0 comment '节点id',
	`level` SMALLINT(3) UNSIGNED NOT NULL DEFAULT 1 comment '节点等级',
	`status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1 comment '状态',
	primary KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT '角色权限表';