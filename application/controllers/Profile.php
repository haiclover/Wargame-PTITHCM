<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
	}

	public function index()
	{
		if(isset($_SESSION['team']))
		{
			$team = $_SESSION['team'];
		}
		else
		{
			redirect('Login','refresh');
		}
		$csrf = array(
			'name'=>$this->security->get_csrf_token_name(),
			'hash'=>$this->security->get_csrf_hash()
			);
		$user = $this->User_Model->ShowByTeam($team);
		$data = array(
			'csrf'=>$csrf,
			'user'=>$user
		);

		$this->load->view('profile', $data, FALSE);
	}
	public function Edit()
	{
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$team = $this->input->post('team',TRUE);
		$email = $this->input->post('email',TRUE);
		$show = $this->User_Model->Show();
		$count_show = count($show);
		for($i=0;$i<$count_show;$i++)
		{
			if($username == $show[$i]['username'])
			{
				unset($show[$i]);
			}
			if($team == $show[$i]['team'])
			{
				unset($show[$i]);
			}
		}
		if($username != null && $password != null && $team != null)
		{
			for ($i = 0; $i < $count_show; $i++) {
				if(($username == $show[$i]['username']))
				{
					$_SESSION['wrong_username'] = "Username này đã tồn tại";
					break;
				}
				else
				{
					if(isset($_SESSION['wrong_username']))
					{
						session_unset($_SESSION['wrong_username']);
					}
				}
				
			}
			for($i = 0; $i < $count_show; $i++)
			{
				if(($team == $show[$i]['team']))
				{
					$_SESSION['wrong_team'] = "Team này đã tồn tại";
				}
				else
				{
					if(isset($_SESSION['wrong_team']))
					{
						session_unset($_SESSION['wrong_team']);
					}
				}
			}
			if(empty($_SESSION['wrong_username']))
			{
				$this->User_Model->Update_Infomation($username,$password,$team,$email);
			}
			if(empty($_SESSION['wrong_team']))
			{
				$this->User_Model->Update_Infomation($username,$password,$team,$email);
			}
			header("Location:".base_url()."Profile");

		}
		else
		{	
			header("Location:".base_url()."Profile");
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */