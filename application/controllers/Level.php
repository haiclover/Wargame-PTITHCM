<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Level extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Level_Model');
		$this->load->model('User_Model');
		$this->load->helper('captcha');
		$this->load->helper('string');
	}

	
	public function index($title = null)
	{
		$title = base64_decode($title);
		$csrf = array(
			'name'=>$this->security->get_csrf_token_name(),
			'hash'=>$this->security->get_csrf_hash()
		);
		$level = $this->Level_Model->Show();
		for ($i = 0; $i < count($level); $i++) {
			if(isset($level[$i]) && $level[$i]['title'] == $title)
			{
				$id = $i;
			}
		}
		$level = $level[$id];
		$data = array(
			'csrf'=>$csrf,
			'level'=>$level
		);
		
		if($_SESSION['username'] && $_SESSION['password'])
		{
			if((isset($id) && $id > count($this->Level_Model->Show())) || $title == null)
			{
				header("Location:".base_url()."All_Level");
			}
			else
			{
				$this->load->view('level',$data);
			}
		}
		else
		{
			header("Location:".base_url()."Login");
		}
	}

	public function submit($submit_title = null)
	{
		$submit_title = base64_decode($submit_title);
		$csrf = array(
			'name'=>$this->security->get_csrf_token_name(),
			'hash'=>$this->security->get_csrf_hash()
		);
		$level = $this->Level_Model->Show();
		for ($i = 0; $i < count($level); $i++) {
			if(isset($level[$i]) && $level[$i]['title'] == $submit_title)
			{
				$level = $level[$i];
			}
		}
		$flag = $level['flag'];
		
		$flag = htmlspecialchars(htmlentities(trim($flag)));
		$data = array(
			'csrf'=>$csrf,
			'level'=>$level,
		);	
		if(isset($_SESSION['username']) && isset($_SESSION['password']))
		{
			if($submit_title == $level['title'])
			{	
				if($this->input->post('password') != $flag)
				{	
					$time =  $datetime[0]['time'];
					$date =  $datetime[0]['date'];
					$_SESSION['wrongpass'] = 'ok';
					header("Location:".base_url()."Level/".base64_encode($level['title']));
				}
				else {
					$data_user = $this->User_Model->Show();
					$data_level =  $this->Level_Model->Show();
					for ($i = 0; $i < count($data_level); $i++) {
						if($data_level[$i]['title'] == $submit_title)
						{
							$id = $i;
						}
					}
					for ($i = 0; $i < count($data_user); $i++) {
						if($data_user[$i]['team'] == $_SESSION['team'])
						{
							$team = $_SESSION['team'];
						}
					}
					$level_pass = $this->User_Model->ShowByTeam($team);
					$score_user = $this->User_Model->ShowByTeam($team);
					if(isset($level_pass[0]['level_pass']) && $level_pass[0]['level_pass'] != null)
					{
						$level_user_pass = explode("|", $level_pass[0]['level_pass']);
					}
					$check = 1;
					for($i=0;$i<count($level_user_pass);$i++)
					{
						if($level_user_pass[$i] == $submit_title)
						{
							$check = 0;
						}
					}
					if($check == 1)
					{
						$score = $score_user[0]['score'] + $data_level[$id]['score'];
						$this->User_Model->Update_Score($team,$score);
						if($level_pass[0]['level_pass'] == null)
						{
							$level_passed = $submit_title;
						}
						else
						{
							$level_passed = $level_pass[0]['level_pass']."|".$submit_title;
						}
						$this->User_Model->Update_Level_Pass($team,$level_passed);
					}

					unset($_SESSION['wrongpass']);
					header("Location:".base_url()."All_Level");
				}
			}
			
		}
		else
		{
			header("Location:".base_url()."Login");
		}

	}

}
/* End of file Level.php */
/* Location: ./application/controllers/Level.php */