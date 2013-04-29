 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
 *Trains_model Class
 *
 *@category models
 *@author dinsy
 */
 
 class Train_model extends CI_Model {
	 public $train_table = "trains";
	 public $carriage_table = 'carriages';
	 public $time_table = 'train_cities';
	 
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		//load databse
		$this->load->database();
	}

	/**
	 *新建列车条目
	 *
	 *@param array $train_info 列车信息数组,参照如下sql定义
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
	 *@return bool insert execution status
	 */
	function insert_train($train_info )
	{
		$train_info['created_at'] = current_datetime();
		
		if (isset($train_info['extra_info']) && is_array($train_info['extra_info'])) {
			$train_info['extra_info'] = json_encode($train_info['extra_info']);
		}
		//返回值为1表示执行正确
		$this->db->insert($this->train_table, $train_info);
		return $this->db->insert_id();
	}

	/**
	 *获取特定id的列车信息
	 *
	 *@param int $train_id
	 *@param array 列车信息数组
	 */
	function get_train($train_id)
	{
		$query = $this->db->get_where($this->train_table, array('train_id' => $train_id), 1, 0);
		return $query ->row_array();
	}

	/**
	 *返回列车信息集
	 *
	 *@param int $limit 需要获取的列车数量
	 *@param int $offset 在数据表中的偏移
	 *@return 列车信息集
	 */
	function get_trains($limit = 10, $offset = 0)
	{
		$query = $this->db->get($this->train_table, $limit, $offset);
		return $query->result_array();
	}

	private function _time_table_order_cmp($former, $later)
	{
		if ($former['order']  === $later['order']) {
			return 0;
		}
		return ($former['order']  < $later['order']) ? -1 : 1;
	}
	
	function get_time_table($train_id)
	{
		$this->db->where('train_id', $train_id);
		$query = $this->db->get($this->time_table);
		$time_table = $query->result_array();
		uasort($time_table, array(__CLASS__, '_time_table_order_cmp'));
		return $time_table;
	}
	
	/**
	 *更新列车信息
	 *
	 *@param array 如上面的insert_train函数
	 *@return bool 执行状态
	 */
	function update_train($train_info)
	{
		 if ( ! isset($train_info['train_id'])) {
			log_message('eror', 'train_id not is not suplied');
			return;
		}
		
		$this->db->where('train_id', $train_info['train_id']);
		return $this->db->update($this->city_table, $train_info);
	}

	/**
	 *删除列车条目
	 *
	 *@param array $train_id 列车id
	 *@return bool 执行状态
	 */
	function delete_train($train_id)
	{
		return $this->db->delete($this->train_id, array('train_id' => $train_id));
	}

	/**
	 *新建车厢条目
	 *
	 *@param array 如下
	 CREATE TABLE IF NOT EXISTS `carriages` (
		`carriage_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
		-- 车厢编号
		`serial` VARCHAR(20) NOT NULL UNIQUE,
		-- 座位数量
		`seat_capacity` INT(5) NOT NULL,
		-- 车厢座位状态, json编码表示,{"idle": [], "occupied": [], "changing": []}
		`seat_status` VARCHAR(100) NOT NULL,
		-- 创建时间
		`created_at` DATETIME NOT NULL,
		-- 更新时间
		`modified_at` TIMESTAMP NOT NULL,
		PRIMARY KEY (`carriage_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
	 *@return bool 执行状态
	 */
	function insert_carriage($carriage_info )
	{
		$carriage_info['created_at'] = current_datetime();
		//返回新插入条目的id
		$this->db->insert($this->carriage_table, $carriage_info);
		return $this->db->insert_id();
	}

	/**
	 *获取特定id的车厢信息
	 *
	 *@param int $carriage_id 车厢id
	 *@param array 列车信息数组
	 */
	function get_carriage($carriage_id)
	{
		$query = $this->db->get_where($this->carriage_table, array('carriage_id' => $carriage_id), 1, 0);
		return $query ->row_array();
	}

	/**
	 *返回车厢信息集
	 *
	 *@param int $limit 需要获取的列车数量
	 *@param int $offset 在数据表中的偏移
	 *@return 列车信息集
	 */
	function get_carriages($limit = 10, $offset = 0)
	{
		$query = $this->db->get($this->carriage_table, $limit, $offset);
		return $query->result_array();
	}

	/**
	 *更新车厢信息
	 *
	 *@param array $carriage_info如上面的insert_carriage函数
	 *@return bool 执行状态
	 */
	function update_carriage($carriage_info)
	{
		if ( ! isset($carriage_info['carriage_id'])) {
			log_message('eror', 'carriage_id not is not suplied');
			return FALSE;
		}
		$this->db->where('carriage_id', $carriage_info['carriage_id']);
		return $this->db->update($this->carriage_table, $carriage_info);
	}

	/**
	 *删除车厢信息
	 *
	 *@param array $carriage_id 车厢id
	 *@return bool 执行状态
	 */
	function delete_carriage($carriage_id)
	{
		return $this->db->delete($this->carriage_table, array('carriage_id' => $carriage_id));
	}

	/**
	 *增加新的时间表条目,也可以用来进行时刻表的更行
	 *
	 *@param int $tain_id 列车id
	 *@param int $city_ids 城市id数组
	 *@param array $time_table 时刻表信息,定义如下
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
		PRIMARY KEY (`id`),
		FOREIGN KEY (`train_id`) REFERENCES trains(`train_id`)
			ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (`city_id`) REFERENCES cities(`city_id`)
			ON DELETE RESTRICT
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
	 *@return bool 执行状态
	 */
	function set_time_table($train_id, $cities)
	{
		$this->db->trans_start();
		$this->db->where('train_id', $train_id);
		$this->db->delete($this->time_table);
		$batch_data = array();
		$index = 0;
		foreach ($cities as $city) {
			$batch_data[] = array(
				'train_id' => $train_id,
				'city_id' => $city['city_id'],
				'order' => ($index),
				'arrive_time' => $city['arrive_time'],
				'leave_time' => $city['leave_time'],
				'created_at' => current_datetime()
			);
			$index += 1;
		}
		$this->db->insert_batch($this->time_table, $batch_data);
		$this->db->trans_complete();

		//handle error,log error and return FALSE
		if ($this->db->trans_status() == FALSE) {
			log_message('error', "add time_table combo fail. at ".__FILE__.__LINE__);
			return FALSE;
		}
		
		return TRUE;
	}

	/**
	 *改变车厢座位信息
	 *
	 *@param int $carriage_id 车厢id
	 *@param array $idle 空闲座位号数组
	 *@param array $occupied 占用座位号数组
	 *@param array $changing 正在办理座位号数组
	 *@return bool 更新状态
	 */
	function set_seat_status($carriage_id, $idle, $occupied, $changing)
	{
		$seat_status = array(
			'idle' => $idle,
			'occupied' => $occupied,
			'changing' => $changing
		);
		$carriage_info = array(
			'carriage_id' => $carriage_id,
			'seat_status' => json_encode($seat_status)
		);
		return $this->update_carriage($carriage_info);
	}
	
	/**
	 *获取特定车厢的座位信息
	 *
	 *@param int $carriage_id 
	 *@param array 列车信息数组
	 */
	function get_seat_status($carriage_id)
	{
		$seats_status = $this->get_carriage($carriage_id)['seat_status'];
		return  json_decode($seats_status, TRUE);
	}

	function empty_all()
	{
		$this->db->empty_table($this->train_table);
		$this->db->empty_table($this->carriage_table);
	}
}