-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `edu` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `edu`;

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `course` varchar(100) NOT NULL COMMENT '课程',
  `grade` int(4) NOT NULL COMMENT '成绩',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `student` (`id`, `name`, `email`, `course`, `grade`, `create_time`, `update_time`) VALUES
(1,	'郭靖',	'guojing@php.cn',	'php',	80,	1505054471,	1505054471),
(2,	'黄蓉',	'huanrong@php.cn',	'mysql',	88,	1505054471,	1505054471),
(3,	'杨康',	'yangkang@php.cn',	'mysql',	67,	1505054471,	1505054471),
(4,	'洪七',	'hongqi@php.cn',	'php',	35,	1505054471,	1505054471),
(5,	'老顽童',	'lanwantong@php.cn',	'html',	78,	1505054471,	1505054471),
(6,	'欧阳峰',	'ouyangfeng@php.cn',	'mysql',	56,	1505054471,	1505054471),
(7,	'杨过',	'yangguo@php.cn',	'php',	89,	1505054471,	1505054471),
(8,	'小龙女',	'xiaolongnv@php.cn',	'html',	800,	1505054471,	1505054471),
(9,	'张无忌',	'zhangwuji@php.cn',	'mysql',	63,	1505054471,	1505054471),
(10,	'赵敏',	'zhaomin@php.cn',	'php',	80,	1505054471,	1505722385);



INSERT INTO `test2` (`id`, `name`, `course`, `grade`,`update_time`) VALUES
(1, 'Roy', 'php','100',150504466),
(2,'Richard','java','100',150504477);

//CREATE TABLE `Register`(
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `username` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `create_time` int(10) NOT NULL,
  `ip` varchar(20) NOT null,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

