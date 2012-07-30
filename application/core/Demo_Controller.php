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

//以下函数为了通用，暂时放在这里，后续会移动到相关的helper中
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

/*
 *	初始化memcache对象
 *	迟点改造成为单例模式
 *	reaturn: $mem/false
 */
function init_mem() {
	$mem_configs = config_item('memcache');
	$ip = $mem_configs['local']['ip'];
	$port = $mem_configs['local']['port'];
	$mem = new Memcache; //创建Memcache对象
	if ($mem->connect($ip, $port)) {//连接Memcache服务器
		return $mem;
	} else {
		return false;
	}
}

