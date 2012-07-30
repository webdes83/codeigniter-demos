<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/*
 * 	服务器进程，用于监听各种端口
 */

class Client extends Demo_Controller {

	public function __construct() {
		parent::__construct();
	}

	/*
	 * 	
	 */

	public function index() {
		echo 'client index';
	}

	/*
	 * 	udp服务器，接受发送过来的udp请求
	 * 	
	 */

	public function udp() {
		set_time_limit(0);
		require_once 'common/UdpDgram.class.php';
		$ip = '127.0.0.1';
		$port = 9527;
		$udp = new UdpDgram();

		while (true) {
			$string = $this->rand_data();
			$udp->sendto($string, strlen($string), $ip, $port);
		}
	}

	//qt.qb.com/codeigniter-demos/welcome/tmp/memcache&P=5|240&uint1=8|99
	public function rand_data() {
		$hosts = array('qt.qb.com', 'www.qb.com');
		$urls = array('/codeigniter-demos/welcome/tmp/memcache', '/codeigniter-demos/welcome/tmp/index');
		$apis = array('P', 'web', 'test');
		$rts = array(0, 1, 2, 3);
		$delays = array(1000, 2000, 3000); //ms
		$data = array();
		$data[] = $hosts[rand(0, 1)] . $urls[rand(0, 1)];
		$data[] = $apis[rand(0, 2)] . '=' . $rts[rand(0, 3)] . '|' . $delays[rand(0, 2)];
		$string = implode('&', $data);
		return $string;
	}

}

/* End of file server.php */
/* Location: ./application/controllers/datagram/server.php */