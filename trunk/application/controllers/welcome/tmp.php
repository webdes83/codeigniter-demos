<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*
 * 	用于写的临时程序
 */

class Tmp extends Demo_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		dump($_SERVER["SERVER_NAME"]);
		$d = explode(".", $_SERVER["SERVER_NAME"]);
		$domain = implode(".", array_slice($d, 0, count($d) - 2));
		dump($domain);
		dump($_SERVER);
	}

	/*
	 * 	memcache使用
	 * 	接收到的字符串格式为： qt.qb.com/codeigniter-demos/welcome/tmp/memcache&P=5|240&uint1=8|99
	 * 	memcache中存储的格式为： 'datagram' => array('minute' => array(array(), array()));
	 */

	public function memcached() {
		$ip = '127.0.0.1';
		$port = 11211;
		$mem = new Memcache; //创建Memcache对象
		if ($mem->connect($ip, $port)) {//连接Memcache服务器
			echo 'true';
		} else {
			echo 'false';
		}
		$string = 'qt.qb.com/codeigniter-demos/welcome/tmp/memcache&P=5|240&uint1=8|99';
		$minute = (int) date("i");
		$datagram = $mem->get('datagram');
		if (empty($datagram)) {
			$datagram = array();
		}
		$datagram[$minute][] = $string;
		$mem->set('datagram', $datagram);
		$mem->close();
	}

	public function get_mem_data() {
		$mem = init_mem();
		dump($mem->get('datagram'));
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */