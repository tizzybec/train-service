 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
--
-- 表结构 `messages` 留言
--
CREATE TABLE `messages` (
	`message_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 留言主题
	`theme` VARCHAR(50) DEFAULT NULL,
	`user_id` INT(5)  UNSIGNED DEFAULT NULL,
	-- 留言内容
	`content` VARCHAR(100) NOT NULL,
	-- 留言人
	`name` VARCHAR(20) DEFAULT NULL,
	-- 是否处理 0-未处理 1-已处理
	`is_dealt` INT(1) DEFAULT '0',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

CREATE TABLE `comments` (
	`comment_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 留言id
	`message_id` INT(5) UNSIGNED NOT NULL,
	-- 作者名字
	`name` VARCHAR(20) NOT NULL UNIQUE,
	-- 是否用户 0-非注册用户 1-注册用户
	`user_id` INT(5)  UNSIGNED DEFAULT NULL,
	-- 需要 @ 的人, 都好分割,like (列车长, 乘务员)
	`refer_to` VARCHAR(20) NOT NULL,
	-- 回复内容
	`content` VARCHAR(100) NOT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

*/
$messages = [
	[
		'name' => '陈升',
		'content' => '最近火车站的热水供应有点不及时,请列车长处理'
	],
	[
		'name' => '奶茶',
		'content' => '站点播报声音太小,导致我差点睡着做过站点.同时感谢上次客车上的一位旅客的拾金不眛'
	],
];

$comments= [
	[
		'name' => '杰伦',
		'content' => '说的很对,支持!'
	],
	[
		'name' => '依琳',
		'content' => '路过,Mark.'
	]
];
?>