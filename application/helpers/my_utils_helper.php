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

function array_value_recursive($arr){
    $values = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val){
        if($k == $key) {
			array_push($val, $v);
		}
    });
    return count($values) > 1 ? $values : array_pop($val);
}
