<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
 *Trains_model Class
 *
 *@category models
 *@author dinsy
 */
class Notice_model extends CI_Model {
	 public $notice_table = 'notices';
	 
	 function __construct()
	 {
		 // Call the Model constructor
		 parent::__construct();
		 $this->load->database();
	}

	/**
	 *添加通知条目
	 *
	 *@param array $notice_info 定义如下
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
	 *@return 执行状态
	 */
	function insert_notice($notice_info )
	{
		$notice_info['created_at'] = current_datetime();
		//返回值为1表示执行正确
		return $this->db->insert($this->notice_table, $notice_info);
	}

	//更新通知信息,参数如insert_notice
	function update_notice($notice_info)
	{
		$this->db->where('notice_id', $notice_info['notice_id']);
		return $this->db->update($this->notice_table, $notice_info);
	}

	//删除通知消息
	function delete_notice($notice_id)
	{
		$this->db->delete($this->notice_table, array('notice_id' => $notice_id));
	}
}
			