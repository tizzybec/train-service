<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
 *Trains_model Class
 *
 *@category mobile
 *@author dinsy
 */

 function current_datetime()
 {
	 date_default_timezone_set('UTC');
	return date('Y-m-d H:i:s');
}
