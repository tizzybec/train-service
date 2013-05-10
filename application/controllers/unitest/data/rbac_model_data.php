 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
--
-- 表结构 `users` 用户表
--
CREATE TABLE `users` (
	`user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL UNIQUE,
	`password` VARCHAR(20) NOT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `groups` 组表
--
-- 注意:预定义组别为:所有人(everybody), 超级管理员(superadmin), 管理员(admin), 卖家(vendor)
CREATE TABLE `groups` (
	`group_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL UNIQUE,
	-- 组权限
	`group_operations` INT(5) DEFAULT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `operations` 组表
--
CREATE TABLE `operations` (
	`operation_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL UNIQUE,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`operation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `users_groups` 组表
--
CREATE TABLE `users_groups` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT(5) UNSIGNED NOT NULL,
	`group_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `user_operations` 组表
--
CREATE TABLE `user_operations` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT(5) UNSIGNED NOT NULL,
	`operation_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `group_operations` 组表
--
CREATE TABLE `group_operations` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`group_id` INT(5) UNSIGNED NOT NULL,
	`operation_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
*/

$groups = array(
	0 => array(
		'name' => 'everybody'
	),
	1 => array(
		'name' => 'superadmin'
	),
	2 => array(
		'name' => 'admin'
	),
	3 => array(
		'name' => 'vendor'
	)
);