<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		session_destroy();
		header("Location:".base_url()."Main");	
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */