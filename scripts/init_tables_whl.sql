-- author: dinsy
-- create at 2013-04-26 16:17

SET NAMES 'utf8';

-- 所用数据库为train_service,请事先建立数据库
USE train_service;
-- 

-- 
--   疑问：列车id 这里是用数字，那列车有Z K 开头这个你是卸载serial里了吗？然后用Json格式是出于主要应用于手机端来考虑的吧？还有呢，这个创建时间和更新时间是怎么回事？
--   疑问：这个serial这些信息需要规定好排列顺序不？
-- 表结构 `trains` 列车
-- 
CREATE TABLE IF NOT EXISTS `trains` (
  `train_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `serial` (5) UNSIGNED NOT NULL,
  -- 列车额外信息勇json格式进行编码,通常是这样{"meal_carriag": "012", "cariage_count": 20}
  `extra_info` VARCHAR(255) NOT NULL,
  -- 列车的时刻表使用json格式进行编码
  `time_table` VARCHAR(500)  NOT NULL,
  -- 创建时间
  `created_at` DATETIME NOT NULL,
  -- 更新时间
  `modified_at` TIMESTAMP NOT NULL,
  
  PRIMARY KEY (`train_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `notices` 通知消息
-- 
--疑问，消息正文这个可以直接用text吧，varchar 会不会太短？
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
-- 疑问？ 跟列车时刻就不用外键了吧？跟时刻表怎么对应？
-- 表结构 `cities` 城市信息
-- 
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
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
 -- 表结构 `goods` 商品表
 -- 
 CREATE TABLE IF NOT EXISTS `goods` (
  `goods_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
  -- 商品名
  `name` VARCHAR(25) NOT NULL,
  `category` VARCHAR(25) NOT NULL,
  `price` INT(5) NOT NULL,
  -- 供应状态 1-正常供应 2-停止供应
  `status` INT(2) DEFAULT '1',
  -- 创建时间
  `created_at` DATETIME NOT NULL,
  -- 更新时间
  `modified_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `combos` 套餐表
-- 
 CREATE TABLE IF NOT EXISTS `combos` (
  `combo_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
  -- 供应状态 1-正常供应 2-停止供应
  `status` INT(2) DEFAULT '1',
  -- 包含的商品,用json进行编码,{"combo": [], "goods": []}
  `inclusion` VARCHAR(50) NOT NULL,
  -- 创建时间
  `created_at` DATETIME NOT NULL,
  -- 更新时间
  `modified_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`combo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 疑问 这里custom信息直接用两个分开呗，车厢号，和座位号，这样比较清晰。这里要不要加送货员信息？
-- 表结构 `orders` 订单表 
-- 
 CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
  -- 订单客户
  `custom` VARCHAR(20) DEFAULT 'sir/madam',
  -- 送餐位置,格式为(车厢, 座位号)
  `address` VARCHAR(10) NOT NULL,
  -- 商品列表,JSON编码
  `goods` VARCHAR(50) NOT NULL,
  -- 总价格
  `total_price` INT(5) NOT NULL,
  -- 状态 1-未送 2-在送 3-送达
  `status` INT(1) DEFAULT '1',
  -- 创建时间
  `created_at` DATETIME NOT NULL,
  -- 更新时间
  `modified_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

-- 
-- 表结构 `tips` 生活常识表
-- 要不要加创建者？
-- 
 CREATE TABLE IF NOT EXISTS `tips` (
	`tip_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	-- 是否置顶 1-不置顶 2-置顶
	`top` INT(1) DEFAULT '1',
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
-- 疑问 需要需要头像，特别是站长的图片？
-- 
 CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  -- 留言主题
  `theme` VARCHAR(50) DEFAULT NULL,
  -- 留言内容
  `content` VARCHAR(100) NOT NULL,
  -- 留言人
  `author` VARCHAR(20) DEFAULT NULL,
  -- 回复列表,like (2, 3, 23, 24)
  `comments` VARCHAR(20) DEFAULT NULL,
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
-- 疑问 哪一个留言的回复，这个标记要加吧？
--
 CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
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

-- 疑问 这里用 id用自增不好吧，有些卧铺不是直接从1开始的，而且万一有些 卧铺是 什么‘加1’ 就是临时加的一节车厢，这个需要考虑到
-- 是不是需要再做一张 列车车厢信息表，用json记录有卧铺的车厢号？以及整体还有几个卧铺？哪些正在办理，哪些办理完了等等。
-- 表结构 `carriages` 车厢信息
-- 
 CREATE TABLE IF NOT EXISTS `carriages` (
  `carriage_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  -- 车厢编号
  `serial` VARCHAR(20) NOT NULL,
  -- 车厢座位状态, json编码表示,{"idle": [], "occupied": [], "changing": []}
  `seat_status` VARCHAR(100) NOT NULL,
  -- 创建时间
  `created_at` DATETIME NOT NULL,
  -- 更新时间
  `modified_at` TIMESTAMP NOT NULL,
  PRIMARY KEY (`carriage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

  
	