<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Level_Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}
	public function Show()
	{
		$this->db->select('*');
		$data = $this->db->get('level');
		$data = $data->result_array();
		return $data;
	}
	public function Add($title,$hint,$flag,$score)
	{
		$object = array(
			'title'=>$title,
			'hint'=>$hint,
			'flag'=>$flag,
			'score'=>$score
		);
		$this->db->insert('level', $object);
	}
	public function AddTime($time_limit)
	{
		$object = array(
			'time_limit'=>$time_limit,
		);
		$this->db->insert('time', $object);
	}
	public function UpdateTime($time_limit)
	{
		$this->db->where('id', 1);
		$object = array(
			'time_limit'=>$time_limit,
		);
		$this->db->update('time', $object);
	}
	public function ShowTime()
	{
		$this->db->select('*');
		$data = $this->db->get('time');
		$data = $data->result_array();
		return $data;
	}
	public function Update($title,$hint,$flag,$score)
	{
		$this->db->where('title', $title);
		$object = array(
			'title'=>$title,
			'hint'=>$hint,
			'flag'=>$flag,
			'score'=>$score
		);
		$this->db->update('level', $object);
	}
}

/* End of file Level.php */
/* Location: ./application/models/Level.php */