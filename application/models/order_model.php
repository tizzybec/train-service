<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
 *Trains_model Class
 *
 *@category models
 *@author dinsy
 */
 class Order_model extends CI_Model {
	public $order_table = 'orders';
	public $goods_table = 'goods';
	public $combo_table = 'combos';
	public $order_combos_table = 'order_combos';
	public $order_goods_table = 'order_goods';
	public $combo_goods_table = 'combo_goods';
	
	 function __construct()
	 {
		 // Call the Model constructor
		 parent::__construct();
		 $this->load->database();
	}

	/**
	 *新建套餐条目
	 *
	 *@param string $combo_name 套餐名称
	 *@param array $goods 商品id数组
	 *@param int $status 套餐状态 1-供应 2-不供应
	 *@return bool 添加状态
	 */
	function add_combo($combo_name, $_goods, $status = 1)
	{
		if (count($_goods) > 0 && gettype($_goods[0]) == 'string') {
			foreach ($_goods as $g) {
				$goods[] = $this->get_goods($g)['goods_id'];
			}
		} else {
			$goods = $_goods;
		}
		
		$this->db->trans_start();
		$combo = array(
			'name' => $combo_name,
			'status' => $status,
			'created_at' => current_datetime()
		);
		$this->db->insert($this->combo_table, $combo);
		$combo_id = $this->db->insert_id();
		foreach ($goods as $g) {
			$this->db->insert($this->combo_goods_table, array(
				'combo_id' => $combo_id,
				'goods_id' => $g,
				'created_at' => current_datetime()
			));
		}
		$this->db->trans_complete();
		
		if ($this->db->trans_status() == FALSE) {
			log_message('error', "add new combo fail. at ".__FILE__.__LINE__);
			return FALSE;
		}
		return TRUE;
	}

	/**
	 *获取特定id的套餐信息
	 *
	 *@param int $combo_id_or_name 套餐id或者名称
	 *@param array 订单信息数组
	 */
	function get_combo($combo_id_or_name)
	{
		switch (gettype($combo_id_or_name)) {
			case 'interger':
				$this->db->where('combo_id', $combo_id_or_name);
				break;
			case 'string':
				$this->db->where('name', $combo_id_or_name);
				break;
			default:
				return;
		}
		$query = $this->db->get($this->combo_table, 1, 0);
		return $query ->row_array();
	}

	function get_combos($limit = 10, $offset = 0)
	{
		$query = $this->db->get($this->combo_table, $limit, $offset);
		$combos = $query->result_array();

		$result = array();

		foreach ($combos as $c) {
			$this->db->select('name')->from('goods')->join('combo_goods', 'goods.goods_id=combo_goods.goods_id')
				->where('combo_goods.combo_id', $c['combo_id']);
			$c['goods'] = $this->my_extract_array($this->db->get()->result_array());
			
			$result[] = $c;
		}
		
		return $result;
	}

	/**
	 *新建订单
	  *
	  *@param array $order 订单信息,定义如下
	  CREATE TABLE IF NOT EXISTS `orders` (
		`order_id` INT(5) UNSIGNED NOT NULL	AUTO_INCREMENT,
		-- 订单客户
		`custom` VARCHAR(20) DEFAULT 'sir/madam',
		-- 送餐位置,格式为(车厢, 座位号)
		`address` VARCHAR(10) NOT NULL,
		-- 商品列表,JSON编码
		`order_goods` INT(5) NOT NULL,
		`order_combos` INT(5) NOT NULL,
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
	 *@param array $combos 要添加的套餐数组
	 *@param array $goods 要添加的商品数组
	 *@return bool 添加状态
	 */
	function add_order($order, $_combos, $_goods)
	{
		if (count($_goods) > 0 && gettype($_goods[0]) == 'string') {
			foreach ($_goods as $g) {
				$goods[] = $this->get_goods($g)['goods_id'];
			}
		} else {
			$goods = $_goods;
		}

		if (count($_combos) > 0 && gettype($_combos[0]) == 'string') {
			foreach ($_combos as $c) {
				$combos[] = $this->get_combo($c)['combo_id'];
			}
		} else {
			$combos = $_combos;
		}

		$order['created_at'] = current_datetime();
		$this->db->trans_start();
		$this->db->insert($this->order_table, $order);
		$order_id = $this->db->insert_id();
		
		foreach ($combos as $c) {
			$this->db->insert($this->order_combos_table, array(
				'order_id' => $order_id,
				'combo_id' => $c,
				'created_at' => current_datetime() 
			));
		}

		foreach ($goods as $g) {
			$this->db->insert($this->order_goods_table, array(
				'order_id' => $order_id,
				'goods_id' => $g,
				'created_at' => current_datetime() 
			));
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() == FALSE) {
			log_message('error', "add new order fail. at ".__FILE__.__LINE__);
			return FALSE;
		}
		return TRUE;
	}

	/**
	 *获取特定id的order信息
	 *
	 *@param int $order_id 订单id
	 *@param array 订单信息数组
	 */
	function get_order($order_id)
	{
		$query = $this->db->get_where($this->order_table, array('order_id' => $order_id), 1, 0);
		return $query ->row_array();
	}

	private function my_extract_array($arr)
	{
		$r = array();
		foreach ($arr as $a) {
			$r[] = $a['name'];
		}
		return $r;
	}

	/**
	 *返回订单集
	 *
	 *@param int $limit 需要获取的订单数量
	 *@param int $offset 在数据表中的偏移
	 *@return 订单信息集
	 */
	function get_orders($limit = 10, $offset = 0)
	{
		$query = $this->db->get($this->order_table, $limit, $offset);
		$orders = $query ->result_array();
		$result = array();

		foreach ($orders as $o) {
			$this->db->select('name')->from('goods')->join('order_goods', 'goods.goods_id=order_goods.goods_id')
				->where('order_goods.order_id', $o['order_id']);
			$o['goods'] = $this->my_extract_array($this->db->get()->result_array());

			$this->db->select('name')->from('combos')->join('order_combos', 'combos.combo_id=order_combos.combo_id')
				->where('order_combos.order_id', $o['order_id']);
			$o['combos'] = $this->my_extract_array($this->db->get()->result_array());
			
			$result[] = $o;
		}
		return $result;
	}

	//更新订单信息,参数参照add_order函数
	function update_order($order_info)
	{
		if ( ! $order_info['order_id']) {
			log_message('eror', 'order_id not is not suplied');
			return;
		}
		$this->db->where('order_id', $order_info['order_id']);
		return $this->db->update($order_info);
	}

	//删除订单,参数参照add_order
	function delete_order($order_id)
	{
		return $this->db->delete($this->order_table, array('order_id' => $order_id));
	}

	/**
	 *新建商品条目
	 *
	 *@param array $goods_info 商品信息,定义如下
	 CREATE TABLE IF NOT EXISTS `goods` (
		`goods_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
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
		-- FOREIGN KEY (`goods_id`) REFERENCES combo_goods(`goods_id`)
		--	ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
	 *@return 执行状态
	 */
	function insert_goods($goods_info )
	{
		$goods_info['created_at'] = current_datetime();
		//返回值为1表示执行正确
		$this->db->insert($this->goods_table, $goods_info);
		return $this->db->insert_id();
	}

	//更新商品信息,参数如上个函数
	function update_goods($goods_info)
	{
		 if ( ! $goods_info['goods_id']) {
				log_message('eror', 'goods_id not is not suplied');
				return;
		}
		$this->db->where('goods_id', $goods_info['goods_id']);
		return $this->db->update($this->goods_table, $goods_info);
	}

	/**
	 *删除商品条目
	 *
	 *@param int $goods_id 商品id
	 *@return bool 删除状态
	 */
	function delete_goods($goods_id)
	{
		$this->db->delete($this->goods_table, array('goods_id' => $goods_id));
	}
	
	/**
	 *获取特定id的商品信息
	 *
	 *@param int $goods_id 套餐id
	 *@param array 订单信息数组
	 */
	function get_goods($goods_id_or_name)
	{
		switch (gettype($goods_id_or_name)) {
			case 'interger':
				$this->db->where('goods_id', $goods_id_or_name);
				break;
			case 'string':
				$this->db->where('name', $goods_id_or_name);
				break;
			default:
				return;
		}
		$query = $this->db->get($this->goods_table, 1, 0);
		return $query ->row_array();
	}

	/**
	 *返回商品集
	 *
	 *@param int $limit 需要获取的商品数量
	 *@param int $offset 在数据表中的偏移
	 *@return 套餐信息集
	 */
	function get_mgoods($limit = 10, $offset = 0)
	{
		$query = $this->db->get($this->goods_table, $limit, $offset);
		if  ($query->num_rows() > 0) {
			return $query ->result_array();
		}
	}

	function empty_all()
	{
		$this->db->empty_table($this->order_table);
		$this->db->empty_table($this->combo_table);
		$this->db->empty_table($this->goods_table);
		
			
	}
}
			