<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/*
 *	用于写的临时程序
 */


class Tmp extends Demo_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		dump(111);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */