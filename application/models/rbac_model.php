<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
 *Rbac_model Class
 *
 *@category models
 *@author dinsy
 */ 
class Rbac_model extends CI_Model {
	private $user_table = 'users';
	private $group_table = 'groups';
	private $users_groups_table = 'users_groups';
	private $user_operations_table = 'user_operations';
	private $group_operations_table = 'group_operations';

	function __construct()
	{
		// Call the Model constructor
		 parent::__construct();
		 $this->load->database();
		 $this->load->helper('security');
	}

	/**
	 *增加新用户
	 *
	 *@param array $user_info 用户信息,参照如下定义
	 CREATE TABLE IF NOT EXISTS `users` (
		`user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(20) NOT NULL UNIQUE,
		`password` VARCHAR(20) NOT NULL,
		-- 是否为管理员 0-不是 1-是
		`is_admin` INT(1) DEFAULT '0',
		-- 用户权限
		`user_operations` INT(5) DEFAULT NULL,
		-- 用户与所在组关系表 多对多关系
		`users_groups` INT(5) DEFAULT NULL,
		-- 创建时间
		`created_at` DATETIME NOT NULL,
		-- 更新时间
		`modified_at` TIMESTAMP NOT NULL,
		PRIMARY KEY (`user_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
	 *@return bool 执行状态
	 */
	function insert_user($user_info)
	{
		$user_info['created_at'] = current_datetime();
		$user_info['password'] = do_hash($user_info['password']);
		//log_message('debug', $user_info['password'] );
		$this->db->insert($this->user_table, $user_info);

		return $this->db->insert_id();
	}

	function get_user($user_id_or_name)
	{
		switch (gettype($user_id_or_name)) {
		case 'interger':
			$this->db->where('user_id', $user_id_or_name);
			break;
		case 'string':
			$this->db->where('name', $user_id_or_name);
			break;
		default:
			return;
		}
		$query = $this->db->get($this->user_table, 1 ,0);
		return $query ->row_array();
	}

	//更新用户信息,参数如上个函数
	function update_user($user_info)
	{
		 if ( ! isset($user_info['user_id'])) {
				log_message('eror', 'user_id not is not suplied');
				return;
		}
		$this->db->where('user_id', $city_info['user_id']);
		return $this->db->update($this->user_table, $city_info);
	}

	function verify_user($user_info){
		$user = $this->get_user($user_info['name']);
		$password = do_hash($user_info['password']);
		if (isset($user['password']) &&  $user['password']=== $password) {
			return
		;
		} else {
			return false;
		}
	}

	/**
	 *删除用户条目
	 *
	 *@param int $city_id 城市id
	 *@return bool 删除状态
	 */
	function delete_user($user_id)
	{
		$this->db->delete($this->user_table, array('user_id' => $user_id));
	}

	/**
	 *增加新用户组
	 *
	 *@param array $group_info 用户组信息,参照如下定义
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
	 *@return bool 执行状态
	 */
	function insert_group($group_info)
	{
		$group_info['created_at'] = current_datetime();

		$this->db->insert($this->group_table, $group_info);

		return $this->db->insert_id();
	}

	function get_group($group_id_or_name)
	{
		switch (gettype($group_id_or_name)) {
		case 'interger':
			$this->db->where('group_id', $group_id_or_name);
			break;
		case 'string':
			$this->db->where('name', $group_id_or_name);
			break;
		default:
			return;
		}
		$query = $this->db->get($this->group_table, 1 ,0);
		return $query ->row_array();
	}

	function get_user_groups($user_id, $fields='groups.*'){
		$query = $this->db->select($fields)->from(' groups')->join('users_groups', 'users_groups.group_id=groups.group_id')->where('users_groups.user_id', $user_id)->get();
		return $query->result_array();
	}

	function get_group_users($group_id){
		$this->db->select('users.*')->from(' users')->join('users_groups_table', 'users_groups.user_id=users.user_id')->where('users_groups.group_id', $group_id)->get();
		return $this->result_array();
	}

	//更新用户组信息,参数如上个函数
	function update_group($group_info)
	{
		 if ( ! $group_info['group_id']) {
				log_message('eror', 'group_id not is not suplied');
				return;
		}
		$this->db->where('group_id', $group_info['group_id']);
		return $this->db->update($this->group_table, $group_info);
	}

	/**
	 *删除用户组条目
	 *
	 *@param int $group_id 用户组d
	 *@return bool 删除状态
	 */
	function delete_group($group_id)
	{
		return $this->db->delete($this->group_table, array('group_id' => $group_id));
	}

	/**
	 *增加操作
	 *
	 *@param array $operation_info 操作信息,参照如下定义
	 CREATE TABLE IF NOT EXISTS `operations` (
		`operation_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
		`name` VARCHAR(20) NOT NULL UNIQUE,
		-- 创建时间
		`created_at` DATETIME NOT NULL,
		-- 更新时间
		`modified_at` TIMESTAMP NOT NULL,
		PRIMARY KEY (`operation_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
	 *@return bool 执行状态
	 */
	function insert_operation($operation_info)
	{
		$operation_info['created_at'] = current_datetime();

		$this->db->insert($this->operation_table, $operation_info);

		return $this->db->insert_id();
	}

	//更新用户组信息,参数如上个函数
	function update_operation($operation_info)
	{
		 if ( ! $operation_info['operation_id']) {
				log_message('eror', 'operation_id not is not suplied');
				return;
		}
		$this->db->where('operation_id', $operation_info['operation_id']);
		return $this->db->update($this->operation_table, $operation_info);
	}
	
	/**
	 *删除操作条目
	 *
	 *@param int $operation_id 操作id
	 *@return bool 删除状态
	 */
	function delete_operation($operation_id)
	{
		return $this->db->delete($this->operation_table, array('operation_id' => $operation_id));
	}

	/**
	 *为特定用户添加允许操作
	 *
	 *@param int $user_id 用户id
	 *@param array $operations_id 操作id数组
	 *@return bool 执行状态
	 */
	function add_user_operations($user_id, $operations_id)
	{
		$batch_data = array();
		foreach ($operations_id as $op_id) {
			$batch_data[] = array(
				'user_id' => $user_id,
				'operation_id' => $op_id,
				'created_at' => current_datetime()
			);
		}
		return $this->db->insert_batch($this->user_operations_table, $batch_data);
	}

	/**
	 *为特定用户删除允许操作
	 *
	 *@param int $user_id 用户id
	 *@param array $operations_id 操作id数组
	 *@return bool 执行状态
	 */
	function delete_user_operations($user_id, $operations_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where_in('operation_id', $operations_id);
		return $this->db->delete($this->user_operations_table);
	}

	/**
	 *增加特定用户到多个组
	 *
	 *@param int $user_id 用户id
	 *@param array $groups_id 用户组id数组
	 *@return bool 执行状态
	 */
	function add_user_to_groups($user_id, $group_ids)
	{
		$batch_data = array();
		foreach ($group_ids as $g_id) {
			$batch_data[] = array(
				'user_id' => $user_id,
				'group_id' => $g_id,
				'created_at' => current_datetime()
			);
		}
		return $this->db->insert_batch($this->users_groups_table, $batch_data);
	}

	/**
	 *从特定用户组删除用户
	 *
	 *@param int $user_id 用户id
	 *@param array $groups_id 用户组id数组
	 *@return bool 执行状态
	 */
	function delete_user_from_groups($user_id, $groups_ids)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where_in('group_id', $groups_id);
		return $this->db->delete($this->users_groups_table);
	}

	/**
	 *删除用户组内的多个用户
	 *
	 *@param array $users_id 用户id数组
	 *@param array $group_id 用户组id
	 *@return bool 执行状态
	 */
	function delete_users_from_group($users_ids, $group_id)
	{
		$this->db->where('group_id', $group_id);
		$this->db->where_in('user_id', $users_id);
		return $this->db->delete($this->users_groups_table);
	}

	/**
	 *为特定用户组添加允许操作
	 *
	 *@param int $group_id 用户组id
	 *@param array $operations_id 操作id数组
	 *@return bool 执行状态
	 */
	function add_group_operations($group_id, $operations_id)
	{
		$batch_data = array();
		foreach ($operations_id as $op_id) {
			$batch_data[] = array(
				'group_id' => $group_id,
				'operation_id' => $op_id,
				'created_at' => current_datetime()
			);
		}
		return $this->db->insert_batch($this->group_operations_table, $batch_data);
	}

	/**
	 *为特定用户组删除允许操作
	 *
	 *@param int $group_id 用户id
	 *@param array $operations_id 操作id数组
	 *@return bool 执行状态
	 */
	function delete_group_operations($group_id, $operations_id)
	{
		$this->db->where('group_id', $group_id);
		$this->db->where_in('operation_id', $operations_id);
		return $this->db->delete($this->group_operations_table);
	}

	/**
	 *获取特定用户的所有权限
	 *
	 *@param int $user_id 用户id
	 *@return array 用户权限数组,形如{'delete_user' => TRUE, 'add_user' => TRUE}
	 */
	function get_user_operations($user_id)
	{
		//array to store operations
		$operations = array();

		//get user operations directly from user_operations
		$this->db->where('user_id', $user_id);
		$user_operations = $this->db->get($this->user_operations_table);
		foreach ($user_operations->result_array() as $op) {
			$operations[$op['name']] = TRUE;
		}

		//get operations from groups that user belong to
		$this->db->where('user_id', $user_id);
		$user_groups =  $this->db->get(users_groups_table);
		foreach ($user_groups->result_array() as $g) {
			$this->db->where('group_id', $g['group_id']);
			$group_operations = $this->db->get($this->group_operations_table);
			foreach ($group_operations->result_array() as $op) {
				$operations[$op['name']] = TRUE;
			}
		}
		
		return $operations;
	}

	/**
	 *检测用户是否具备某种权限
	  *
	  *@param int $user_id 要检测的用户id
	  *@param string $operation_id 要检测的操作id
	  *@return bool 是否具备权限
	  */
	function check_user_operation($user_id, $operation_id_or_name)
	{
		//check if this operation is in user_operations table
		if  (gettype($operation_id_or_name) === 'string') {
			$operation_id_or_name = $this->db->where('name', $operation_id_or_name)
					->get($this->operation_table)->row_array()['operation_id'];
		}
		$this->db->where(array(
			'user_id' => $user_id,
			'operation_id' => $operation_id_or_name
		));
		
		$user_operations = $this->db->get($this->user_operations_table);
		if ($user_operations->num_rows() > 0) {
			return TRUE;
		}

		//otherwise check if operation lay in group_operations table
		$this->db->where('user_id', $user_id);
		$user_groups =  $this->db->get(users_groups_table);
		foreach ($user_groups->result_array() as $g) {
			$this->db->where(array(
				'group_id' => $g['group_id'],
				'operation_id' => $operation_id
			));
			$group_operations = $this->db->get($this->group_operations_table);
			if (count($group_operations->result_array()) > 0) {
				return TRUE;
			}
		}
		return FALSE;
	}
}
?>