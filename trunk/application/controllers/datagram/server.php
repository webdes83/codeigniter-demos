<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/*
 * 	服务器进程，用于监听各种端口
 */

class Server extends Demo_Controller {

	public function __construct() {
		parent::__construct();
	}

	/*
	 * 	
	 */

	public function index() {
		echo 'server index';
	}

	/*
	 * 	udp服务器，接受发送过来的udp请求
	 * 	字符串格式： qt.qb.com/codeigniter-demos/welcome/tmp/memcache&P=5|240&uint1=8|99
	 */

	public function udp() {
		set_time_limit(0);
		$ip = '127.0.0.1';
		$port = 9527;
		$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		socket_bind($socket, $ip, $port);
		$mem = init_mem();
		if ($mem == false) {
			return;
		}
		while (true) {
			socket_recvfrom($socket, $content, 1024, 0, $ip, $port);
			if (empty($content)) {
				continue;
			}
			//$this->log_data($content);


			$minute = (int) date("i");
			$datagram = $mem->get('datagram');
			if (empty($datagram)) {
				$datagram = array();
			}
			$datagram[$minute][] = $content;
			$mem->set('datagram', $datagram);
		}
		socket_close($socket);
		$mem->close();
	}

	/*
	 *  创建文件夹
	 */

	function make_path($dir) {
		return is_dir($dir) or ($this->make_path(dirname($dir)) and (mkdir($dir, 0777) && chmod($dir, 0777)));
	}

	function log_data($content) {
		$day = date("d");
		$minute = (int) date("i");
		$dir = "data/$day/";
		$this->make_path($dir);
		$file_name = "$dir/$minute.txt";
		$content = "[" . date("Y-m-d H:i:s") . "]" . $content;
		file_put_contents($file_name, $content . "\n", FILE_APPEND);
	}

}

/* End of file server.php */
/* Location: ./application/controllers/datagram/server.php */