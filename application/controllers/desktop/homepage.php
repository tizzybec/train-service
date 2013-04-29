 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *Homepage Class
  *
  *@category desktop
  *@author power-m
  */
 class Homepage extends CI_Controller {
	/**
	 *Show  index page
	*/
	function index()
	{
		echo 'your current location is homepage.';
	}
 }

 //end of the file
 //location: application/contollers/desktop/homepage.php