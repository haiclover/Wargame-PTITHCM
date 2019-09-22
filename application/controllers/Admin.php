<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->load->model('Level_Model');
	}

	public function index()
	{
		$data_user = $this->User_Model->ShowAll();
		$data_question = $this->Level_Model->Show();
		$csrf = array(
			'name'=>$this->security->get_csrf_token_name(),
			'hash'=>$this->security->get_csrf_hash()
			);
		$data = array(
			'csrf'=>$csrf,
			'user'=>$data_user,
			'data_question'=>$data_question
		);
		if(empty($_SESSION['admin_username']) && empty($_SESSION['admin_password']))
		{
			$this->load->view('admin',$data);
		}
		else
		{
			$this->load->view('manage',$data);
		}
	}
	public function Login()
	{
		$admin_user = $this->User_Model->ShowAdmin();	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($admin_user[0]['username'] == $username && $admin_user[0]['password'] == $password)
		{
			$_SESSION['admin_username'] = $username;
			$_SESSION['admin_password'] = $password; 
			header("Location:".base_url()."Admin");
		}
	}
	public function Manage()
	{
		if(isset($_SESSION['admin_username']) && isset($_SESSION['admin_password']))
		{
			$title = $this->input->post('title');
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');
			$score = $this->input->post('point');
			$check = 0;
			for ($i = 0; $i < count($this->Level_Model->Show()); $i++) {
				if($title == $this->Level_Model->Show()[$i]["title"] || $title == "")
				{
					$check = 1;
				}
				
			}
			if($check == 1)
			{
				$this->Level_Model->Update($title,$question,$answer,$score);
				header("Location:".base_url()."Admin");
			}
			else
			{
				$this->Level_Model->Add($title,$question,$answer,$score);
				header("Location:".base_url()."Admin");
			}
		}
		else
		{
			header("Location:".base_url()."Admin");
		}
	}
	public function Time()
	{
		if(isset($_SESSION['admin_username']) && isset($_SESSION['admin_password']))
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$time_limit = date("m/d/Y H:i", strtotime(date("H:i")) + 60*$this->input->post('time_limit'));
			if(count($this->Level_Model->ShowTime()) != 0)
			{
				$this->Level_Model->UpdateTime($time_limit);
				$_SESSION["time_set"] = true;
			}
			else
			{
				$this->Level_Model->AddTime($time_limit);
				$_SESSION["time_set"] = true;
			}
		}
		else
		{
			header("Location:".base_url()."Admin");
		}
		redirect('Admin','refresh');
	}
	/****************************
	KHởi tạo username và password

	****************************/
	public function User()
	{
		if(isset($_SESSION['admin_username']) && isset($_SESSION['admin_password']))
		{
			$number_usr_create = $this->input->post('num_user');
			if($this->input->post('num_user') && $this->input->post('num_user') != 0 && $this->input->post('num_user') != "")
			{
				for($i=1;$i<=$number_usr_create;$i++)
				{
					if($i<10)
						$i = "00".$i;
					else
						$i = "0".$i;
					$usr = "PTIT_TEAM_".$i;
					$team = $usr;
					$pwd = substr(base64_encode(md5($usr.$team."HAICLOVER")), 0,10);
					$this->User_Model->Add($usr,$pwd,$team);
				}
				
			}
		}
		else
		{
			header("Location:".base_url()."Admin");
		}
	}
	public function Delete_User()
	{
		$this->User_Model->Delete_User();
		$_SESSION['delete_user'] = true;
		header("Location:".base_url()."Admin");
	}
	public function Delete_Level()
	{
		$this->User_Model->Delete_Level();
		$_SESSION['delete_level'] = true;
		header("Location:".base_url()."Admin");
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */