<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *Homepage Class
  *
  *@category mobile
  *@author dinsy
  */
 class Webapp extends CI_Controller {
	 function __construct()
	 {
			parent::__construct();
			$this->load->model('train_model');
			$this->load->model('order_model');
			$this->load->model('article_model');
			$this->load->model('message_model');
			$this->load->model('rbac_model');

			$this->output->set_content_type('application/json');
	}
	/**
	 *Show  index page
	*/
	function index()
	{
		echo "U happendly visit a wrong url, sorry!";
	}

	function process_login()
	{
		
		$post = $this->input->post();
		if ( ! isset($post['name']) || ! isset($post['password'])) {
			return;
		}
		if ($this->rbac_model->verify_user($this->input->post())) {
			$status = array( 'msg' => 'succed', 'code' => 0);
			$user = $this->rbac_model->get_user($post['name']);
			$this->session->set_userdata(array(
				'name' => $user['name'],
				'is_login' => TRUE,
				'user_id' => $user['user_id']
			));
		} else {
			$status = array( 'msg' => 'failed', 'code' => 1);
		}
		echo json_encode($status);
	}

	function submit_order()
	{
		$status = array('msg' => 'failed', 'code' => 1);

		$post = $this->input->post();

		if ( ! isset($post['order']) || ! isset($post['goods']) || ! isset($post['combos'])) {
			echo json_encode($status);
			return;
		}
		if ($this->order_model->add_order(
			json_decode($post['order'], TRUE),
			json_decode($post['combos'], TRUE),
			json_decode($post['goods'], TRUE)
		)) {
			$status = array('msg' => 'succed', 'code' => 0);
			$this->session->set_userdata('order_status', '您的订单提交成功,请耐心等待发货.');
		}

		echo json_encode($status);
	}

	function submit_seat()
	{
		
		$status = array('msg' => 'failed', 'code' => 1);
		
		$post = $this->input->post();
		log_message('debug', var_export($post, true));
		if ( ! isset($post['carriage_info'])) {
			echo json_encode($status);
			return;
		}
		if ($this->train_model->update_carriage(
			json_decode($post['carriage_info'], TRUE)
		)) {
			$status = array('msg' => 'succed', 'code' => 0);
			$this->session->set_userdata('seat_status', '车厢状态更新成功~');
		} 

		echo json_encode($status);
	}

	function submit_msg_comment()
	{
		$status = array('msg' => 'failed', 'code' => 1);

		$post = $this->input->post();

		if ( ! isset($post['comment_info'])) {
			echo json_encode($status);
			return;
		}

		if ($this->message_model->insert_comment(
			json_decode($post['comment_info'], TRUE)
		)) {
			$status = array('msg' => 'succed', 'code' => 0);
			$this->session->set_userdata('comment_status', '评论提交成功~');
		}

		echo json_encode($status);
	}

	function submit_message()
	{
		$status = array('msg' => 'failed', 'code' => 1);

		$post = $this->input->post();

		if ( ! isset($post['message_info'])) {
			echo json_encode($status);
			return;
		}

		if ($this->message_model->insert_message(
			json_decode($post['message_info'], TRUE)
		)) {
			$status = array('msg' => 'succed', 'code' => 0);
			$this->session->set_userdata('message_status', '评论提交成功~');
		}

		echo json_encode($status);
	}

	function appdata()
	{
		header('Content-Type:text/javascript');
		header('Cache-Control:max-age=0');
		
		$data_type = $this->input->get('type');
		$notice_type = $this->input->get('notice');
		$csrf_token_name = $this->security->get_csrf_token_name();
		$csrf_hash = $this->security->get_csrf_hash();
		$data = array();

		$msg = array();
		
		switch ($data_type) {
		case 'time_table':
			$data = $this->_time_table_data();
			break;
		case 'train_info':
			$data = $this->_train_info_data(); 
			break;
		case 'seat_status':
			$carriage_serial = $this->input->get('serial');
			if ( !$carriage_serial ) {
				log_message('error', 'Error api usage, no carriage_serial!');
				return;
			}
			$data = $this->_carriage_data($carriage_serial);
			break;
		case 'lifetips':
			$data = $this->_lifetips_data();
			break;
		case 'article':
			$article_id = $this->input->get('article_id');
			if ( !$article_id ) {
				log_message('error', 'Error api usage, no article_id!');
				return;
			}
			$data = $this->_article_data($article_id);
			break;
		case 'messages':
			$data = $this->_messages_data();
			break;
		case 'message':
			$message_id = $this->input->get('message_id');
			if ( !$message_id ) {
				log_message('error', 'Error api usage, no message_id!');
				return;
			}
			$data = $this->_message_data($message_id);
			break;
		case 'order':
			$data = $this->_order_data();
			break;
		default:
			break;
		}

		if ($notice_type) { 
			$m = $this->session->userdata($notice_type);
			$m && $msg[] = $m;
			$this->session->unset_userdata($notice_type);
		}

		//$msg[] = "消息测试";
		
		$data = json_encode($data, JSON_PRETTY_PRINT);
		$msg = json_encode($msg, JSON_PRETTY_PRINT);
		$str = "AppData = {};\n";
		$str .= "AppData[\"{$data_type}\"] = \n{$data}; \n";
		$str .= "AppData[\"csrf_token_name\"]  = \"{$csrf_token_name}\";\n";
		$str .= "AppData[\"csrf_hash\"]  = \"{$csrf_hash}\";\n";
		$str .= "AppData[\"msg\"] = {$msg};\n";
		$str .= "AppData[\"notice\"] = [];\n";
		echo $str;
	}

	//to-do: 后台是否进行列车方向更新, 如果不是, 那么必须显示来回方向的所有列车时刻
	private function _time_table_data()
	{
		$status = $this->train_model->get_current_status();

		$fields = '';
		if ($status['direction'] === 0) {
			$fields = 'train_cities.forth_arrive_time as arrive_time, train_cities.forth_leave_time as leave_time';
		} else {
			$fields = 'train_cities.back_arrive_time as arrive_time, train_cities.back_leave_time as leave_time';
		}
		
		$time_table = $this->train_model->get_time_table($status['train_id'], $fields);
		return $time_table;
	}

	private function _train_info_data()
	{
		$status = $this->train_model->get_current_status();
		$train = $this->train_model->get_train($status['train_id']);
		$extra_info = $train['extra_info'];
		$info = array();
		foreach ($extra_info as $key => $value) {
			$info[] = [$key, $value];
		}
		$train['extra_info'] = $info;
		return $train;
	}

	private function _order_data()
	{
		$combos = $this->order_model->get_combos();
		$goods = $this->order_model->get_mgoods();
		return ['combos' => $combos, 'goods' => $goods];
	}

	private function _carriage_data($serial)
	{
		$status = $this->train_model->get_current_status();
		
		$carriage = $this->train_model->get_train_carriage($status['train_id'], $serial);
		return $carriage;
	}

	private function _lifetips_data()
	{
		return $this->article_model->get_articles(10);
	}

	private function _article_data($article_id)
	{
		return $this->article_model->get_article($article_id);
	}

	private function _messages_data()
	{
		return $this->message_model->get_messages(10);
	}

	private function _message_data($message_id)
	{
		$message = $this->message_model->get_message($message_id);
		$comments = $this->message_model->get_comments($message_id);
		return ['message' => $message, 'comments' => $comments];
	}
 } 
