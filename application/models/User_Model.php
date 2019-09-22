<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function Show()
	{
		$this->db->select('*');
		$this->db->order_by('score', 'desc');
		$data = $this->db->get('user');
		$data = $data->result_array();
		return $data;
	}
	public function ShowAll()
	{
		$this->db->select('*');
		$data = $this->db->get('user');
		$data = $data->result_array();
		return $data;
	}
	public function ShowByTeam($team)
	{
		$this->db->select('*');
		$this->db->where('team', $team);
		$data = $this->db->get('user');
		$data = $data->result_array();
		return $data;
	}
	public function ShowAdmin()
	{
		$this->db->select('*');
		$data = $this->db->get('admin');
		$data = $data->result_array();
		return $data;
	}
	public function Update_Infomation($username,$password,$team,$email)
	{
		$this->db->where('team', $team);
		$object = array(
			'username'=>$username,
			'email'=>$email,
			'team'=>$team,
			'password'=>$password
		);
		$this->db->update('user', $object);
	}

	public function Add($usr,$pwd,$team)
	{
		$object = array(
			'username'=>$usr,
			'password'=>$pwd,
			'team'=>$team
		);
		$this->db->insert('user', $object);
	}
	public function Update()
	{
		$object = array(
			'username'=>$username,
			'email'=>$email,
			'team'=>$team,
			'password'=>$password,
			'score'=>$score
		);
		$this->db->update('user', $object);
	}
	public function Update_Score($team,$score)
	{
		$this->db->where('team', $team);
		$object = array(
			'score'=>$score
		);
		$this->db->update('user', $object);
	}
	public function Update_Level_Pass($team,$level_pass)
	{
		$this->db->where('team', $team);
		$object = array(
			'level_pass'=>$level_pass
		);
		$this->db->update('user', $object);
	}
	public function Delete_User()
	{
		$this->db->empty_table('user');
	}
	public function Delete_Level()
	{
		$this->db->empty_table('level');
	}
}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */