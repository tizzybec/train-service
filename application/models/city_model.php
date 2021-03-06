<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
 *Trains_model Class
 *
 *@category models
 *@author dinsy
 */
 class City_model extends CI_Model {
	 public $city_table = 'cities';
	 
	 function __construct()
	 {
		 // Call the Model constructor
		 parent::__construct();
		 $this->load->database();
	}

	/**
	 *新建城市条目
	 *
	 *@param $city_info 城市信息,定义如下
	 CREATE TABLE IF NOT EXISTS `cities` (
		`city_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
		`name` VARCHAR(20)  NOT NULL,
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
	 *@return bool 更新状态
	 */
	function insert_city($city_info )
	{
		$city_info['created_at'] = current_datetime();
		
		//返回值为1表示执行正确
		$this->db->insert($this->city_table, $city_info);
		
		return $this->db->insert_id();
	}

	//更新城市信息,参数如上个函数
	function update_city($city_info)
	{
		 if ( ! isset($city_info['city_id']) ) {
				log_message('eror', 'city_id not is not suplied');
				return;
		}
		$this->db->where('city_id', $city_info['city_id']);
		return $this->db->update($this->city_table, $city_info);
	}

	/**
	 *获取特定id的城市信息
	 *
	 *@param int $city_id_or_name 城市id或者名字
	 *@param array 订单信息数组
	 */
	function get_city($city_id_or_name)
	{
		switch (gettype($city_id_or_name)) {
			case 'interger':
				$this->db->where('city_id', $city_id_or_name);
				break;
			case 'string':
				$this->db->where('name', $city_id_or_name);
				break;
			default:
				return;
		}
		$query = $this->db->get($this->city_table, 1, 0);
		return $query ->row_array();
	}
	
	/**
	 *返回城市集
	 *
	 *@param int $limit 需要获取的订单数量
	 *@param int $offset 在数据表中的偏移
	 *@return 城市信息集
	 */
	function get_cities($limit = 10, $offset = 0)
	{
		$query = $this->db->get($this->city_table, $limit, $offset);
		return $query->result_array();
	}

	/**
	 *删除城市条目
	 *
	 *@param int $city_id 城市id
	 *@return bool 删除状态
	 */
	function delete_city($city_id_or_name)
	{
		switch (gettype($city_id_or_name)) {
			case 'interger':
				$this->db->where('city_id', $city_id_or_name);
				break;
			case 'string':
				$this->db->where('name', $city_id_or_name);
				break;
			default:
				return;
		}
		$this->db->delete($this->city_table);
	}

	function empty_cities()
	{
		$this->db->empty_table($this->city_table);
	}
}
?>