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
-- Table structure for bjy_article
-- ----------------------------
create table if not EXISTS dy_user(
  dy_id int PRIMARY KEY AUTO_INCREMENT COMMIT '主键',
  username VARCHAR(32) not null COMMIT '用户名',
  password VARCHAR(32) NOT  NULL  COMMIT '密码'
) COMMIT '用户表';
