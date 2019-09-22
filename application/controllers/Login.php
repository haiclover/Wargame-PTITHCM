<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
	}

	public function index()
	{
		if(empty($_SESSION['username']) && empty($_SESSION['password']))
		{
			$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
			);
			$data = array('csrf'=>$csrf);
			$this->load->view('login',$data);
		}
		else {
			redirect('All_Level','refresh');
		}
	}
	public function User()
	{
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$useroremail = $this->input->post('useroremail');
		$password = $this->input->post('password');
		$user = $this->User_Model->Show();
		for($i=0;$i<count($user);$i++)
		{
			$username_from_db = $user[$i]['username'];
			$email_from_db = $user[$i]['email'];
			$password_from_db = $user[$i]['password'];
			$team = $user[$i]['team'];
			if(($useroremail == $username_from_db || $useroremail == $email_from_db) && ($password == $password_from_db))
			{
				$_SESSION['team'] = $team;
				$_SESSION['username'] = substr(base64_encode($useroremail), 0,5).substr(md5($useroremail), 0,5).strrev(base64_encode("HAICLOVER"));
				$_SESSION['password'] = substr(md5($password), 0,5).substr(base64_encode($password), 0,5).strrev(base64_encode("HAICLOVER"));
				redirect('All_Level','refresh');
			}
		}
		if(empty($_SESSION['team']) && empty($_SESSION['username']) && empty($_SESSION['password']))
		{
			redirect('Login','refresh');
		}
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */