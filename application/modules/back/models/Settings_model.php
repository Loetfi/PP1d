<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {


	public function getGA()
	{
		$this->db->select('ga')
		->from('settings');
		
		$q = $this->db->get();

		return $q->row();


	}


	// get data setting

	public function sosmed($field='' , $where = '')
	{
		$this->db->select("$field")
		->from("settings");
		// ->where("$field",$where);

		$query = $this->db->get();

		return $query->row();
	}

	public function getSetting()
	{
		$this->db->select('*')->from('settings');
		$q = $this->db->get();

		return $q->result();
	}
	

}

/* End of file Settings_model.php */
/* Location: ./application/modules/back/models/Settings_model.php */