<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
 *Trains_model Class
 *
 *@category models
 *@author dinsy
 */
class Notice_model extends CI_Model {
	 public $notice_table = 'notices';
	 private $notice_users_table = 'notice_users';
	 private $notice_groups_table = 'notice_groups';
	 
	 function __construct()
	 {
		 // Call the Model constructor
		 parent::__construct();
		 $this->load->database();
		 $this->load->model('rbac_model', 'rbac');
	}

	/**
	 *添加通知条目
	 *
	 *@param array $notice_info 定义如下
--
-- 表结构 `notices` 通知消息
--
CREATE TABLE `notices` (
	`notice_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) DEFAULT NULL,
	-- 发送者id
	`sender_id` INT(5) UNSIGNED DEFAULT NULL,
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
	function send_notice($notice_info, $user_ids=array(), $group_ids=array())
	{
		$notice_info['created_at'] = current_datetime();
		
		$this->db->start_trans();
		$this->db->insert($this->notice_table, $notice_info);
		$notice_id = $this->db->insert_id();
		
		for ($user_ids as $u) {
			$this->db->insert($this->notice_users_table, array(
				'user_id' => $u,
				'notice_id' => $notice_id,
				'created_at' => current_datetime()
			));
		}

		for ($group_ids as $g) {
			$this->db->insert($this->notice_users_table, array(
				'group_id' => $g,
				'notice_id' => $notice_id,
				'created_at' => current_datetime()
			));
		}
		
		$this->db->trans_complete();

		//handle error,log error and return FALSE
		if ($this->db->trans_status() == FALSE) {
			log_message('error', "send notice failed. at ".__FILE__.__LINE__);
			return FALSE;
		}

		return TRUE;
	}

	function get_notices($user_id=NULL, fields='notices.*')
	{
		if ($user_id == NULL) {
			$group_id = $this->rbac->get_group('everybody')['group_id'];
			$query = $this->db->where('group_id', $group_id)->get();
			return $query->result_array();
		}
		$user_groups = array_value_recursive($this->rbac->get_user_groups($user_id, "group.group_id"));
		this->db->select(fields)->from('notices')->join('notice_users', 'notices.notice_id=notice_users.notice_id')->where('notice_users.user_id', $user_id)
			->join('notice_groups', 'notices.notice_id=notice_groups.notice_id')->where_in('notice_groups.group_id', $user_groups);
		$query = $this->db->distinct()->get();
		return $query->result_array();
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
			