<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemohon_model extends CI_Model {

	function list()
	{
		return $this->db->select('*')
				->from('ppid_pengguna')
				->where('role','pemohon')
				->get()
				->result_array();
	}

	function detail($id_pengguna)
	{
		if (is_numeric($id_pengguna)) {
			$res =  $this->db->select('*')
				->from('ppid_pengguna')
				->where('role','pemohon')
				->where('id_pengguna',$id_pengguna)
				->get()
				->row_array();	
		} else {
			$res = array();
		}

		return $res;
		
	}

}

/* End of file Pemohon_model.php */
/* Location: ./application/modules/api/models/Pemohon_model.php */
