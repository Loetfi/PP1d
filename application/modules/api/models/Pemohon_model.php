<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemohon_model extends CI_Model {

	function list($param)
	{
		return $this->db->select('*')
				->from('ppid_pengguna a')
				->join('ppid_permohonan b', 'b.id_pengguna = a.id_pengguna')
				->where('role', 'pemohon')
				->limit($param['limit'], $param['offset'])
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
