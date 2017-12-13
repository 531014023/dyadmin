/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : dyadmin

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-12-01 23:34:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wy_admin
-- ----------------------------
DROP TABLE IF EXISTS `wy_admin`;
CREATE TABLE `wy_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '密码',
  `ip` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '登录IP',
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '登录时间',
  `login_count` int(8) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `root` int(2) NOT NULL DEFAULT '0' COMMENT 'root权限',
  `auth` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='admin';

INSERT INTO wy_admin(username,password,root) VALUES ('admin','$2y$10$LhHBkBbJMPC.1VVb7NOzOeHYps6tZMzVCTiwA90aGxheTMFWsWjJa',1);
-- ----------------------------
-- Table structure for wy_menu
-- ----------------------------
DROP TABLE IF EXISTS `wy_menu`;
CREATE TABLE `wy_menu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '名称',
  `icon` varchar(32) NOT NULL DEFAULT '' COMMENT '图标',
  `href` varchar(64) NOT NULL DEFAULT '' COMMENT '链接',
  `action` varchar(16) NOT NULL DEFAULT '',
  `pid` int(4) NOT NULL DEFAULT '0' COMMENT '上级id',
  `sort` int(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `use_status` int(2) NOT NULL DEFAULT '1' COMMENT '启用状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='后台菜单';

-- ----------------------------
-- Table structure for wy_log
-- ----------------------------
DROP TABLE IF EXISTS `wy_log`;
CREATE TABLE `wy_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `model` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '模块',
  `controller` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '控制器',
  `action` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '方法',
  `log` text NOT NULL COMMENT '日志内容',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '操作时间',
  `action_type` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '操作终端类型(安卓,IOS)',
  PRIMARY KEY (`id`),
  KEY `ct` (`create_time`),
  KEY `uid` (`uid`),
  KEY `m` (`model`),
  KEY `a` (`action`),
  KEY `c` (`controller`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COMMENT='日志表';
