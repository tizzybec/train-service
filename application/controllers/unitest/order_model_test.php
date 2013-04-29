 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *Order_model_test Class
  *
  *@category mobile
  *@author dinsy
  */
  
 class Order_model_test extends CI_Controller {
	/**
	 *Show  index page
	*/

	function __construct()
	{
		parent::__construct();
		
		$this->output->enable_profiler(TRUE);
		
		require(UNITEST_DATAPATH.'order_model_data.php');
		$this->load->model('order_model');
		$this->load->library('unit_test');
		$this->goods = $goods;
		$this->combos = $combos;
		$this->orders = $orders;;
	}
	
	function index()
	{
		$this->order_model->empty_all();
		
		foreach ($this->goods as $g) {
			$this->order_model->insert_goods($g);
		}

		print_r($this->order_model->get_mgoods());

		print_r($this->order_model->get_goods('方便面'));

		foreach ($this->combos as $c) {
			$this->order_model->add_combo($c['name'], $c['items']);
		}
		
		print_r($this->order_model->get_combo('方便面水套餐'));

		print_r($this->order_model->get_combos());
		
		foreach ($this->orders as $o) {
			$this->order_model->add_order(array_slice($o, 0,  3,  true), $o['combos'], $o['goods']);
		}

		print_r($this->order_model->get_orders());
	}
}
