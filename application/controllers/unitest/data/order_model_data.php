 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
CREATE TABLE IF NOT EXISTS `combos` (
	`combo_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
	-- 套餐名称
	`name` VARCHAR(20) NOT NULL UNIQUE,
	`price` DECIMAL(5, 1) NOT NULL,
	-- 供应状态 1-正常供应 2-停止供应
	`status` INT(1) DEFAULT '1',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`combo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `goods` (
	`goods_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	-- 商品名
	`name` VARCHAR(25) NOT NULL UNIQUE,
	`category` VARCHAR(25) NOT NULL,
	`price` DECIMAL(5, 1) NOT NULL,
	-- 供应状态 1-正常供应 2-停止供应
	`status` INT(2) DEFAULT '1',
	-- 创建时间
	`created_at` DATETIME NOT NULL,
	-- 更新时间
	`modified_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

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
*/

$goods = array(
	0 => array(
		'name' => '方便面',
		'price' => '5',
		'category' => '速食'
	),
	1 => array(
		'name' => '矿泉水',
		'price' => '2',
		'category' => '速食'
	),
	2 => array(
		'name' => '苹果',
		'price' => '5',
		'category' => '水果'
	)
);

$combos = array(
	0 => array(
		'name' => '方便面水套餐',
		'price' => '10',
		 'items' => ['方便面', '矿泉水']
	),
	1 => array(
		'name' => '水果套餐',
		'price' => '15',
		'items' => ['苹果', '矿泉水']
	),
	2 => array(
		'name' => '炒面套餐',
		'price' => '20',
		'items' => ['方便面',  '矿泉水']
	)
);

$orders = array(
	0 => array(
		'custom' => '张先生',
		'address' => '10, 56',//10车厢,56座
		'`total_price`' => '100',
		'goods' => [['苹果', 1], ['矿泉水', 3]],
		'combos' => [['水果套餐', 1], ['炒面套餐', 2]]
	),
	1 => array(
		'custom' => '李小姐',
		'address' => '13, 26',//10车厢,56座
		'`total_price`' => '50',
		'goods' => [['方便面', 3], ['矿泉水', 4]],
		'combos' => [['水果套餐', 2]]
	)
);
?>