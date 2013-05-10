-- author: dinsy
-- create at 2013-04-26 16:17

SET NAMES 'utf8';

-- 所用数据库为train_service,请事先建立数据库
drop database IF EXISTS train_service;
create database IF NOT EXISTS train_service;
use train_service;

--
-- 表结构 `notices` 通知消息
--
CREATE TABLE IF NOT EXISTS `notices` (
	`notice_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 发送者id
	`sender_id` INT(5) UNSIGNED DEFAULT NULL,
	-- 接收者id, like (1, 23, 34, 56)
	`receiver_id` VARCHAR(50) DEFAULT NULL,
	-- 接受组id
	`group_id` VARCHAR(50)  DEFAULT NULL,
	-- 消息正文
	`content` VARCHAR(255)  NOT NULL,
	-- 消息有效期
	`expire` DATETIME NOT NULL,
	-- 消息等级
	`level` INT(2) UNSIGNED DEFAULT '10',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`notice_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `trains` 列车
-- 
CREATE TABLE IF NOT EXISTS `trains` (
	`train_id` INT(5)  UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 列车编号
	`serial` VARCHAR(20)  NOT NULL UNIQUE ,
	-- 列车额外信息勇json格式进行编码,通常是这样{"meal_carriag": "012", "cariage_count": 20}
	`extra_info` VARCHAR(255) DEFAULT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`train_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `cities` 城市信息
--
CREATE TABLE IF NOT EXISTS `cities` (
	`city_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	`name` VARCHAR(20)  NOT NULL UNIQUE,
	-- 城市图片
	`photo` VARCHAR(25) DEFAULT NULL,
	-- 城市介绍
	`description` VARCHAR(250)  NOT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`city_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


--
-- 表结构 `train_cities`
--
CREATE TABLE IF NOT EXISTS `train_cities` (
	`id` INT(5)  UNSIGNED NOT NULL AUTO_INCREMENT,
	`train_id` INT(5) UNSIGNED NOT NULL,
	`city_id` INT(5) UNSIGNED NOT NULL,
	`arrive_time` TIME NOT NULL,
	`leave_time` TIME NOT NULL,
	-- 在时刻表的次序号,从小往大排列
	`order` INT(3) NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
	/*
	FOREIGN KEY (`train_id`) REFERENCES trains(`train_id`)
		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`city_id`) REFERENCES cities(`city_id`)
		ON DELETE RESTRICT
	*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `combos` 套餐表
--
CREATE TABLE IF NOT EXISTS `combos` (
	`combo_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	-- 套餐名称
	`name` VARCHAR(20) NOT NULL UNIQUE,
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
CREATE TABLE IF NOT EXISTS `combo_goods` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`combo_id` INT(5) UNSIGNED NOT NULL,
	`goods_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
	/*
	FOREIGN KEY (`combo_id`) REFERENCES combos(`combo_id`)
		ON DELETE CASCADE ON UPDATE CASCADE
	*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

	
--
-- 表结构 `goods` 商品表
--
CREATE TABLE IF NOT EXISTS `goods` (
	`goods_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 商品名
	`name` VARCHAR(25) NOT NULL UNIQUE,
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
CREATE TABLE IF NOT EXISTS `orders` (
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

CREATE TABLE IF NOT EXISTS `order_goods` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`order_id` INT(5) UNSIGNED NOT NULL,
	`goods_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`order_id`) REFERENCES orders(`order_id`)
		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`goods_id`) REFERENCES goods(`goods_id`)
		ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `order_combos` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`order_id` INT(5) UNSIGNED NOT NULL,
	`combo_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
	/*
	FOREIGN KEY (`order_id`) REFERENCES orders(`order_id`)
		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`combo_id`) REFERENCES combos(`combo_id`)
		ON DELETE RESTRICT
	*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `tips` 生活常识表
-- 
CREATE TABLE IF NOT EXISTS `tips` (
	`tip_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	-- 是否置顶 0-不置顶 1-置顶
	`top` INT(1) DEFAULT ' 0',
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
	PRIMARY KEY (`tip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `messages` 留言
-- 
CREATE TABLE IF NOT EXISTS `messages` (
	`message_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 留言主题
	`theme` VARCHAR(50) DEFAULT NULL,
	-- 留言内容
	`content` VARCHAR(100) NOT NULL,
	-- 留言人
	`user_name` VARCHAR(20) DEFAULT NULL,
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
CREATE TABLE IF NOT EXISTS `comments` (
	`comment_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 留言id
	`message_id` INT(5) UNSIGNED NOT NULL,
	-- 作者名字
	`name` VARCHAR(20) NOT NULL UNIQUE,
	-- 是否用户 0-非注册用户 1-注册用户
	`is_user` INT(1) DEFAULT '0',
	-- 需要 @ 的人, 都好分割,like (列车长, 乘务员)
	`refer_to` VARCHAR(20) NOT NULL,
	-- 回复内容
	`content` VARCHAR(100) NOT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`comment_id`)
	/*
	FOREIGN KEY (`message_id`) REFERENCES messages(`message_id`)
		ON DELETE CASCADE ON UPDATE CASCADE
	*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `carriages` 车厢信息
-- 
CREATE TABLE IF NOT EXISTS `carriages` (
	`carriage_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 车厢编号
	`serial` VARCHAR(20) NOT NULL UNIQUE,
	-- 座位数量
	`seat_capacity` INT(5) NOT NULL,
	-- 车厢座位状态, json编码表示,{"idle": [], "occupied": [], "changing": []}
	`seat_status` VARCHAR(100) DEFAULT NULL,
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`carriage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `users` 用户表
--
CREATE TABLE IF NOT EXISTS `users` (
	`user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL UNIQUE,
	`password` VARCHAR(20) NOT NULL,
	-- 是否为管理员 0-不是 1-是
	`is_admin` INT(1) DEFAULT '0',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `groups` 组表
--
CREATE TABLE IF NOT EXISTS `groups` (
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
CREATE TABLE IF NOT EXISTS `operations` (
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
CREATE TABLE IF NOT EXISTS `users_groups` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT(5) UNSIGNED NOT NULL,
	`group_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
	/*
	FOREIGN KEY (user_id) REFERENCES users(user_id)
		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (group_id) REFERENCES groups(group_id)
		ON DELETE CASCADE ON UPDATE CASCADE
	*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `user_privileges` 组表
--
CREATE TABLE IF NOT EXISTS `user_operations` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT(5) UNSIGNED NOT NULL,
	`operation_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
	/*
	FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`operation_id`) REFERENCES operations(`operation_id`)
		ON DELETE CASCADE ON UPDATE CASCADE
	*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

--
-- 表结构 `group_operations` 组表
--
CREATE TABLE IF NOT EXISTS `group_operations` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`group_id` INT(5) UNSIGNED NOT NULL,
	`operation_id` INT(5) UNSIGNED NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
	/*
	FOREIGN KEY (`group_id`) REFERENCES groups(`group_id`)
		ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`operation_id`) REFERENCES operations(`operation_id`)
		ON DELETE CASCADE ON UPDATE CASCADE
	*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;


--
-- 表结构 `message_comments` 留言评论关系表
--
/*
CREATE TABLE IF NOT EXISTS `message_comments` (
	`id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,

	`comment_id` INT(5) UNSIGNED  NOT NULL,
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`message_id`) REFERENCES messages(`message_id`)
		ON DELETE CASCADE ON UPDATE CASCADE
	-- FOREIGN KEY (`comment_id`) REFERENCES comments(`comment_id`)
	--	ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
*/

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