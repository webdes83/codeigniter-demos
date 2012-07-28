<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

define('IN_Demo', TRUE);

abstract class Demo_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->switch_theme('on', config_item('default_theme'));
	}
}

if (!function_exists('dump')) {

	//调试函数
	function dump($var, $echo = true) {
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		$output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
		$output = '<pre>' . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		if ($echo) {
			echo($output);
			return null;
		}else
			return $output;
	}

}