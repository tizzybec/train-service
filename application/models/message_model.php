 
 
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
 *Trains_model Class
 *
 *@category models
 *@author dinsy
 */
class Message_model extends CI_Model {
	 public $message_table = 'messages';
	 public $comment_table = 'comments';
	 
	 function __construct()
	 {
		 // Call the Model constructor
		 parent::__construct();
		 $this->load->database();
		 }

	/**
	 *新建留言条目
	 *
	 *@param array $message_info 留言信息,定义如下
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
	 *@return bool 执行状态
	 */
	 function insert_message($message_info )
	 {
		 $message_info['created_at'] = current_datetime();
		$this->db->insert($this->message_table, $message_info);
		return $this->db->insert_id();
	 }

	 /**
	 *获取特定id的留言信息
	 *
	 *@param int $message_id 留言id
	 *@param array 留言信息数组
	 */
	function get_message($message_id)
		$query = $this->db->get_where($this->message_table, array('message_id' => $message_id), 1, 0);
		return $query ->row_array();
	}

	/**
	 *返回留言信息集
	 *
	 *@param int $limit 需要获取的留言数量
	 *@param int $offset 在数据表中的偏移
	 *@return 留言信息集
	 */
	function get_messages($limit = 10, $offset = 0)
	{
		$query = $this->db->get($this->message_table, $limit, $offset);
		return $query ->result_array();
	}

	//更新留言信息,参数如上
	function update_message($message_info)
	 {
		if ( ! isset$comment_info['message_id']) {
			log_message('eror', 'message_id not is not suplied');
			return;
		}
	
		$this->db->where('message_id', $message_info['message_id']);
		return $this->db->update($this->message_table, $message_info);
	}

	//删除留言
	 function delete_message($message_id)
	 {
		return $this->db->delete($this->message_table, array('message_id' => $message_id));
	}

	/**
	 *为特定留言添加评论
	 *
	 *@param $comment_info 评论信息,定义如下
	 CREATE TABLE IF NOT EXISTS `comments` (
		`comment_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
		`message_id` INT(5) UNSIGNED NOT NULL,
		-- 作者名字
		`name` VARCHAR(20) NOT NULL UNIQUE,
		-- 作者id
		`author_id` INT(5) DEFAULT NULL,
		-- 需要 @ 的人, 都好分割,like (列车长, 乘务员)
		`refer_to` VARCHAR(20) NOT NULL,
		-- 回复内容
		`content` VARCHAR(100) NOT NULL,
		-- 创建时间
		`created_at` DATETIME NOT NULL,
		-- 更新时间
		`modified_at` TIMESTAMP NOT NULL,
		PRIMARY KEY (`comment_id`)
		-- FOREIGN KEY (`comment_id`) REFERENCES message_comments(`comment_id`)
		--	ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
	 *@param int $message_id 要增加评论的留言id
	 *@return bool 执行状态
	 */
	function add_comment($comment_info)
	{
		if ( ! isset$comment_info['comment_id']) {
			log_message('eror', 'comment_id not is not suplied.at'.__FILE__.' '__LINE__);
			return;
		}

		$comment_info['created_at'] = current_datetime();
		return $this->db->insert($this->comment_table, $comment_info);
	}

	/**
	 *获取特定id的评论信息
	 *
	 *@param int $comment_id 评论id
	 *@param array 评论信息数组
	 */
	function get_comment($comment_id)
		$query = $this->db->get_where($this->comment_table, array('comment_id' => $comment_id), 1, 0);
		return $query ->row_array();
	}

	/**
	 *返回评论信息集
	 *
	 *@param int $message_id 留言id 
	 *@param int $limit 需要获取的评论数量
	 *@param int $offset 在数据表中的偏移
	 *@return 评论信息集
	 */
	function get_comments($message_id, $limit = 10, $offset = 0)
	{
		$this->db->where('message_id', $message_id);
		$query = $this->db->get($this->comment_table, $limit, $offset);
		return $query ->result_array();
	}
	
	//更新评论信息,参数参照上述comments数据表的定义
	function update_comment($comment_info)
	 {
		 if ( ! isset$comment_info['comment_id']) {
			log_message('eror', 'comment_id not is not suplied');
			return FALSE;
		}
		 $this->db->where('comment_id', $comment_info['comment_id']);
		 return $this->db->update($this->comment_table, $comment_info);
	 }

	//删除评论
	function delete_comment($comment_id)
	{
		return $this->db->delete($this->comment_table, array('comment_id' => $comment_id));
	}
}
			 