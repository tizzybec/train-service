<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
 *Trains_model Class
 *
 *@category models
 *@author dinsy
 */
class Article_model extends CI_Model {
	 public $article_table = 'articles';
	 
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
--
-- 表结构 `articles` 生活常识表
--
CREATE TABLE `articles` (
	`article_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
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

	 */
	 function insert_article($article_info )
	 {
		 $article_info['created_at'] = current_datetime();
		 $article_info['overview'] = utf8_substr($article_info['content'], 0, 50);
		$this->db->insert($this->article_table, $article_info);
		return $this->db->insert_id();
	 }

	 /**
	 *获取特定id的留言信息
	 *
	 *@param int $message_id 留言id
	 *@param array 留言信息数组
	 */
	function get_article($article_id, $fields='*')
	{
		$query = $this->db->select($fields)->get_where($this->article_table, array('article_id' => $article_id), 1, 0);
		return $query ->row_array();
	}

	/**
	 *返回留言信息集
	 *
	 *@param int $limit 需要获取的留言数量
	 *@param int $offset 在数据表中的偏移
	 *@return 留言信息集
	 */
	function get_articles($limit = NULL, $offset = 0, $fields='*')
	{
		if ($limit == NULL) {
			$query = $this->db->get($this->article_table);
		} else {
			$query = $this->db->get($this->article_table, $limit, $offset);
		}
		return $query ->result_array();
	}

	//更新留言信息,参数如上
	function update_articles($article_info)
	 {
		if ( ! isset($article_info['article_id'])) {
			log_message('eror', 'article_id not is not suplied');
			return;
		}
	
		$this->db->where('article_id', $article_info['article_id']);
		return $this->db->update($this->article_table, $article_info);
	}

	//删除留言
	 function delete_article($article_id)
	 {
		return $this->db->delete($this->article_table, array('article_id' => $article_id));
	}
}
?>