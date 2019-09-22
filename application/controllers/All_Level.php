<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_Level extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Level_Model');
		$this->load->model('User_Model');
	}

	public function index()
	{
		if(isset($_SESSION['username']) && isset($_SESSION['password']))
		{
			$level = $this->Level_Model->Show();
			$user = $this->User_Model->ShowByTeam($_SESSION['team']);
			if(count($this->Level_Model->ShowTime()) != 0)
			{
				$time_limit = $this->Level_Model->ShowTime()[0]['time_limit'];
			}
			else
			{
				$time_limit = 0;
			}
			$data = array(
				'level'=>$level,
				'user'=>$user,
				'time_limit'=>$time_limit
			);
			$this->load->view('all_level', $data, FALSE);
		}
		else
		{
			redirect('Main','refresh');
		}
	}

}

/* End of file All_Level.php */
/* Location: ./application/controllers/All_Level.php */