<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ranking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Level_Model');
		$this->load->model('User_Model');
	}

	public function index()
	{
		$data_array = $this->User_Model->Show();
		$data = array(
			'data_array'=>$data_array
		);
		$this->load->view('ranking',$data);
	}

}

/* End of file Ranking.php */
/* Location: ./application/controllers/Ranking.php */