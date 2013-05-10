 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *Update Class
  *
  *@category mobile
  *@author dinsy
  */
 class Update extends CI_Controller {
	/**
	 *Show  index page
	*/
	function index()
	{
		//$this->load->database();
		$str = file_get_contents(ROOTPATH.'scripts/init_tables_0506.sql');
		//echo $sql;
		$conn = mysqli_connect('localhost', 'root', '123123');

		$explode = explode(";",$str);
		$lenght = count($explode);
		for($i=0;$i<$lenght ;$i++){

			$sql = $explode[$i];
			if (count($sql) > 0) {
				//echo $sql."\n<br>";
				@$conn->query($sql);
				$e = $conn->get_warnings();
				if ($e) {
					echo "Warning: $e->errno: $e->message\n\n<br><br>";
				}
			}
		}
		echo "成功更新数据库<br>";

		require(UNITEST_DATAPATH.'city_model_data.php');
		$this->load->model('city_model');
		$this->cities = $cities;

		require(UNITEST_DATAPATH.'train_model_data.php');
		$this->load->model('train_model');
		$this->trains = $trains;
		$this->carriages = $carriages;
		$this->time_table = $time_table;

		//$this->load->library('unit_test');

		//insert city data
		//insert user defined data to city table
		foreach ($this->cities as $city) {
			if ( ! $this->city_model->insert_city($city)) {
				echo "城市插入失败\n<br>";
				return;
			}
		}
		echo "城市插入成功\n<br>";
		//insert train data
		foreach ($this->trains as $t) {
			$train_id  = $this->train_model->insert_train($t);
			if( ! $train_id) {
				echo "列车插入失败\n<br>";
				return;
			}
		}
		echo "列车插入成功\n<br>";

		foreach ($this->carriages as $c) {
			$carriage_id = $this->train_model->insert_carriage($train_id, $c);
			if( ! $carriage_id) {
				echo "车厢插入失败\n<br>";
				return;
			}
		}
		echo "车厢插入成功\n<br>";

		$length = count($this->time_table);
		for ($i = 0; $i < $length; ++$i) {
			$this->time_table[$i]['city_id'] =
				$this->city_model->get_city($this->time_table[$i]['name'])['city_id'];
		}

		if  ($this->train_model->set_time_table($train_id, $this->time_table)) {
			echo "列车时刻表插入成功\n<br>";
		} else {
			echo "列车时刻表插入失败\n<br>";
		}

		//插入用户组表
	}
}
