 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *Homepage Class
  *
  *@category mobile
  *@author dinsy
  */
 class Webpage extends CI_Controller {
	/**
	 *Show  index page
	*/
	function index()
	{
		$data['appname'] = 'Timetable';
		$data['params'] = 'type=time_table';
		$this->load->view('mobile/template', $data);
	}

	function order()
	{
		$data['appname'] = 'Order';
		$data['params'] = 'type=order&notice=order_status';
		$this->load->view('mobile/template', $data);
	}

	function messages()
	{
		$data['appname'] = 'Messages';
		$data['params'] = 'type=messages';
		$this->load->view('mobile/template', $data);
	}

	function message($message_id)
	{
		if (! isset($message_id)) {
			echo 'error location.';
			return;
		}
		$data['appname'] = 'Message';
		$data['params'] = 'type=message&notice=comment_status&message_id='.$message_id;
		$this->load->view('mobile/template', $data);
	}

	function lifetips()
	{
		$data['appname'] = 'Lifetips';
		$data['params'] = 'type=lifetips';
		$this->load->view('mobile/template', $data);
	}

	function article($article_id)
	{
		if (! isset($article_id)) {
			echo 'error location.';
			return;
		}
		$data['appname'] = 'Article';
		$data['params'] = 'type=article&article_id='.$article_id;
		$this->load->view('mobile/template', $data);
	}

	function traininfo()
	{
		$data['appname'] = 'Traininfo';
		$data['params'] = 'type=train_info';
		$this->load->view('mobile/template', $data);
	}

	function login()
	{
		if ( $this->session->userdata('is_login') === TRUE ) {
			$this->load->helper('url');
			$url = $this->input->get('url');
			$url = $url ? $url : '/mobile/';
			
			redirect($url, 'refresh');
			return;
		}
		$data['appname'] = 'Login';
		$data['params'] = '';
		$this->load->view('mobile/template', $data);
	}

	function test()
	{
		$a = 'cent_status';
		$this->session->set_flashdata('comment_status', 'asd');
		//$this->session->set_flashdata('seat_status', 'asfsdf');
		echo $this->session->flashdata($a);
		
	}
 }

