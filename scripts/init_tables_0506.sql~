-- author: dinsy
-- create at 2013-04-26 16:17

SET NAMES 'utf8';

-- 所用数据库为train_service,请事先建立数据库
CREATE DATABASE IF NOT EXISTS `ci_train_service`;

USE `ci_train_service`;

DROP TABLE IF EXISTS `train_cities`;
DROP TABLE IF EXISTS `combo_goods`;
DROP TABLE IF EXISTS `order_goods`;
DROP TABLE IF EXISTS `order_combos`;
DROP TABLE IF EXISTS `notice_users`;
DROP TABLE IF EXISTS `notice_groups`;
DROP TABLE IF EXISTS `users_groups`;
DROP TABLE IF EXISTS `user_operations`;
DROP TABLE IF EXISTS `group_operations`;

DROP TABLE IF EXISTS `notices`;
DROP TABLE IF EXISTS `cities`;
DROP TABLE IF EXISTS `carriages`;
DROP TABLE IF EXISTS `trains`;
DROP TABLE IF EXISTS `combos`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `goods`;
DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `messages`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `operations`;
DROP TABLE IF EXISTS `articles`;
DROP TABLE IF EXISTS `current_status`;
DROP TABLE IF EXISTS ci_sessions;

DROP TABLE IF EXISTS `menu`;

--
-- 表结构 `notices` 通知消息
--
CREATE TABLE `notices` (
	`notice_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) DEFAULT NULL,
	-- 发送者id
	`sender_id` INT(5) UNSIGNED DEFAULT NULL,
	-- 消息正文
	`content` VARCHAR(255)  NOT NULL,
	-- 消息有效期
	`expires` DATETIME NOT NULL,
	-- 消息等级
	`level` INT(2) UNSIGNED DEFAULT '10',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`notice_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

CREATE TABLE `current_status` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`train_id` INT(5) UNSIGNED NOT NULL,
	-- 列车行驶方向 `0` -往 `1`-返
	`direction` INT(1) UNSIGNED DEFAULT '0',
	-- 列车状态 0-非工作状态 1-工作状态
	`status` INT(1) UNSIGNED DEFAULT '0',
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `trains` 列车
-- 
CREATE TABLE `trains` (
	`train_id` INT(5)  UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 列车编号
	`serial` VARCHAR(20)  NOT NULL UNIQUE ,
	-- 列车额外信息勇json格式进行编码,通常是这样{"meal_carriag": "012", "cariage_count": 20}
	`extra_info` VARCHAR(500) DEFAULT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`train_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `cities` 城市信息
--
CREATE TABLE `cities` (
	`city_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL UNIQUE,
	-- 城市图片
	`photo` VARCHAR(25) DEFAULT NULL,
	-- 城市介绍
	`description` TEXT  NOT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`city_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


--
-- 表结构 `train_cities`
--
CREATE TABLE `train_cities` (
	`id` INT(5)  UNSIGNED NOT NULL AUTO_INCREMENT,
	`train_id` INT(5) UNSIGNED NOT NULL,
	`city_id` INT(5) UNSIGNED NOT NULL,
	-- 前往时间
	`forth_arrive_time` TIME NOT NULL,
	`forth_leave_time` TIME NOT NULL,
	-- 返回时间
	`back_arrive_time` TIME NOT NULL,
	`back_leave_time` TIME NOT NULL,
	-- 在时刻表的次序号,从小往大排列
	`order` INT(3) NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 表结构 `notice_users`
--
CREATE TABLE `notice_users` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`notice_id` INT(5) UNSIGNED NOT NULL,
	`user_id` INT(5) UNSIGNED NOT NULL,
	-- 0-未处理 1-已处理 2-过期
	`status` INT(1) UNSIGNED DEFAULT '0' NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `notice_groups`
--
CREATE TABLE `notice_groups` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`notice_id` INT(5) UNSIGNED NOT NULL,
	`group_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `combos` 套餐表
--
CREATE TABLE `combos` (
	`combo_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	-- 套餐名称
	`name` VARCHAR(50) NOT NULL UNIQUE,
	-- 套餐价格
	`price` DECIMAL(5, 1) NOT NULL,
	-- 供应状态 1-正常供应 2-停止供应
	`status` INT(2) DEFAULT '1',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`combo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


--
-- 表结构 `combo_goods`
--
CREATE TABLE `combo_goods` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`combo_id` INT(5) UNSIGNED NOT NULL,
	`goods_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

	
--
-- 表结构 `goods` 商品表
--
CREATE TABLE `goods` (
	`goods_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 商品名
	`name` VARCHAR(50) NOT NULL UNIQUE,
	`category` VARCHAR(25) NOT NULL,
	`price` DECIMAL(5, 1)  NOT NULL,
	-- 供应状态 1-正常供应 2-停止供应
	`status` INT(1) DEFAULT '1',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


-- 
-- 表结构 `orders` 订单表
-- 
CREATE TABLE `orders` (
	`order_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	-- 订单客户
	`custom` VARCHAR(20) DEFAULT 'sir/madam',
	-- 送餐位置,格式为(车厢, 座位号)
	`address` VARCHAR(10) NOT NULL,
	-- 总价格
	`total_price` DECIMAL(5, 1)  NOT NULL,
	-- 状态 1-未送 2-在送 3-送达
	`status` INT(1) DEFAULT '1',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

CREATE TABLE `order_goods` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`order_id` INT(5) UNSIGNED NOT NULL,
	`goods_id` INT(5) UNSIGNED NOT NULL,
	`num` INT(5) UNSIGNED DEFAULT '0' NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`order_id`) REFERENCES orders(`order_id`)
		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`goods_id`) REFERENCES goods(`goods_id`)
		ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


CREATE TABLE `order_combos` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`order_id` INT(5) UNSIGNED NOT NULL,
	`combo_id` INT(5) UNSIGNED NOT NULL,
	`num` INT(5) UNSIGNED DEFAULT '0' NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `articles` 生活常识表
-- 
CREATE TABLE `articles` (
	`article_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	-- 是否置顶 0-不置顶 1-置顶
	`top` INT(1) DEFAULT ' 0',
	-- 内容概览
	`overview` VARCHAR(200) NOT NULL,
	-- 标题
	`title` VARCHAR(50) NOT NULL,
	-- 图片
	`photo` VARCHAR(50) DEFAULT NULL,
	-- 正文
	`content` TEXT NOT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `messages` 留言
-- 
CREATE TABLE `messages` (
	`message_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 留言主题
	`theme` VARCHAR(50) DEFAULT NULL,
	`user_id` INT(5)  UNSIGNED DEFAULT NULL,
	-- 留言内容
	`content` TEXT NOT NULL,
	-- 留言人
	`name` VARCHAR(50) DEFAULT NULL,
	`up_num`  INT(5)  UNSIGNED DEFAULT '0',
	-- 是否处理 0-未处理 1-已处理
	`is_dealt` INT(1) DEFAULT '0',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `comments` 回复表
--
CREATE TABLE `comments` (
	`comment_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 留言id
	`message_id` INT(5) UNSIGNED NOT NULL,
	-- 作者名字
	`name` VARCHAR(20) NOT NULL,
	-- 是否用户 0-非注册用户 1-注册用户
	`user_id` INT(5)  UNSIGNED DEFAULT NULL,
	-- 需要 @ 的人, 都好分割,like (列车长, 乘务员)
	`refer_to` VARCHAR(20) NOT NULL,
	-- 回复内容
	`content` TEXT NOT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `carriages` 车厢信息
-- 
CREATE TABLE `carriages` (
	`carriage_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`train_id` INT(5) UNSIGNED NOT NULL,
	-- 车厢编号
	`serial` VARCHAR(20) NOT NULL UNIQUE,
	-- 座位数量
	`seat_capacity` INT(5) NOT NULL,
	-- 车厢座位状态, json编码表示,{"idle": [], "occupied": [], "changing": []}
	`seat_status` VARCHAR(500) DEFAULT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`carriage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `users` 用户表
--
CREATE TABLE `users` (
	`user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL UNIQUE,
	`password` VARCHAR(100) NOT NULL,
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
	`name` VARCHAR(50) NOT NULL UNIQUE,
	-- 组权限
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
	`name` VARCHAR(50) NOT NULL UNIQUE,
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
-- 表结构 `user_privileges` 组表
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


--
-- 表结构 `menu` 组表,后台菜单表
--

CREATE TABLE `menu` (
	`id` INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- menu_id
	`name` CHAR(40)  NOT NULL,
	-- menu_name
	`parent_id` INT(6) UNSIGNED NOT NULL,
	-- 的父菜单,0为根菜单,以0为父的在主菜单栏里
	`m` CHAR(20) NOT NULL,
	-- 后台模块名称，这里表示文件夹
	`c` CHAR(20) NOT NULL,
	-- 后台模块控制器名称
	`a` CHAR(20)  NOT NULL,
	-- 后台模块控制器中函数名
	`data` CHAR(100)  NOT NULL,
	-- menu_id 附加字段
	-- m c a以及data用于生成url.
	`listorder` INT(6) UNSIGNED NOT NULL,
	-- 显示的排列顺序
	`display`   INT(1) UNSIGNED NOT NULL,
	-- 是否显示 '0'表示不显示 '1'表示显示.
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


-- for session use
CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	`session_id` varchar(40) DEFAULT '0' NOT NULL,
	`ip_address` varchar(45) DEFAULT '0' NOT NULL,
	`user_agent` varchar(120) NOT NULL,
	`last_activity` int(10) unsigned DEFAULT 0 NOT NULL,
	`user_data` text NOT NULL,
	PRIMARY KEY (`session_id`),
	KEY `last_activity_idx` (`last_activity`)
);

-- foreign key for time table train_cities
ALTER TABLE train_cities ADD FOREIGN KEY (`train_id`) REFERENCES trains(`train_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE train_cities ADD FOREIGN KEY (`city_id`) REFERENCES cities(`city_id`)
	ON DELETE RESTRICT;

-- foreign key for table user_operations
ALTER TABLE user_operations ADD FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE user_operations ADD FOREIGN KEY (`operation_id`) REFERENCES operations(`operation_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;

-- foreign key for table group_operations
ALTER TABLE group_operations ADD FOREIGN KEY (`group_id`) REFERENCES groups(`group_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE group_operations ADD FOREIGN KEY (`operation_id`) REFERENCES operations(`operation_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;

-- foreign key for table users_groups
ALTER TABLE users_groups ADD FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE users_groups ADD FOREIGN KEY (`group_id`) REFERENCES groups(`group_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;
		
-- foreign key for table comments
ALTER TABLE comments ADD FOREIGN KEY (`message_id`) REFERENCES messages(`message_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;

-- foreign key for table order_combos
ALTER TABLE order_combos ADD FOREIGN KEY (`order_id`) REFERENCES orders(`order_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE order_combos ADD FOREIGN KEY (`combo_id`) REFERENCES combos(`combo_id`)
	ON DELETE RESTRICT;

-- foreign key for table combo_goods
ALTER TABLE combo_goods ADD FOREIGN KEY (`combo_id`) REFERENCES combos(`combo_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE combo_goods ADD FOREIGN KEY (`goods_id`) REFERENCES goods(`goods_id`)
	ON DELETE RESTRICT;
	
-- foreign key for table carriages
ALTER TABLE carriages ADD FOREIGN KEY (`train_id`) REFERENCES trains(`train_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;

-- foreign key for table notice_users
ALTER TABLE notice_users ADD FOREIGN KEY (`notice_id`) REFERENCES notices(`notice_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;

-- foreign key for table notice_groups
ALTER TABLE notice_groups ADD FOREIGN KEY (`notice_id`) REFERENCES notices(`notice_id`)
	ON DELETE CASCADE ON UPDATE CASCADE;