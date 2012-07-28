<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Demo_Loader extends CI_Loader {

	function __construct() {
		parent::__construct();
	}

	function switch_theme($switcher = 'on', $theme = 'default', $path = 'themes/') {
		if ($switcher == 'on') {
			$this->_ci_view_paths = array(FCPATH . $path . $theme . '/' => TRUE);
		}
	}

	/*
	 *	重载CI_Loader中的函数
	 *	在模板中加入theme变量
	 */
	public function view($view, $vars = array(), $return = FALSE) {
		$vars['theme'] = config_item('default_theme');
		return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}

}

