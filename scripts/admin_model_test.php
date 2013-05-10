 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *Admin_model_test Class
  *
  *@category unnitest
  *@author powerm
  */
  
 class Admin_model_test extends CI_Controller {
	/**
	 *Show  index page
	*/
	
	function __construct()
	{
		parent::__construct();
		
		$this->output->enable_profiler(TRUE);
		
		$this->load->model('admin_model');
		$this->load->library('unit_test');
		
	//	$this->menu = $menu;
	}
	
	function index()
	{


		//store the last id
		$train_id = '';
		$carriage_id = '';
		

		print_r($this->admin_model->get_child_menu(0));
		echo "\n";

		// foreach ($this->carriages as $c) {
			// $carriage_id = $this->train_model->insert_carriage($c);
		// }

		// print_r($this->train_model->get_carriages());
		// echo "\n";

		// $length = count($this->time_table);
		// for ($i = 0; $i < $length; ++$i) {
			// $this->time_table[$i]['city_id'] =
				// $this->city_model->get_city($this->time_table[$i]['name'])['city_id']; 
		// }

		// print_r($this->time_table);
		// echo "\n";

		// if ( ! $train_id || ! $carriage_id) {
			// echo "trains id or carriage id is not available.\n";
			// echo $train_id." ".$carriage_id."\n";
		// }
		
		// $this->train_model->set_time_table($train_id, $this->time_table);

		// print_r($this->train_model->get_time_table($train_id));
		// echo "\n";

		// $this->train_model->set_seat_status($carriage_id, [1,2,3], [4,5,6], [7,8,9]);

		// print_r($this->train_model->get_seat_status($carriage_id));
		// echo "\n";
	}
}
