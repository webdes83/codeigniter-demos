<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Index extends Demo_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array('controller' => __FILE__);
		$this->load->view('welcome/welcome_view', $data);
	}

}

/*
 * 
 *  这个是CI自带的welcome
class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
 * 
 */
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */