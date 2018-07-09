<?php

class Language_model extends CI_Model{
	
	function listLanguage($where = array()){
		$this->db->select('*');
		$this->db->from('master_language');
		$this->db->order_by('language_id','ASC');
		if (count($where) > 0)
			$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function insertLanguage($dataInsert){
		return $this->db->insert('master_language', $dataInsert);
	}
	
	function detailLanguage($id){
		$this->db->select('*')->from('master_language')->where('language_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function updateLanguage($dataUpdate, $whereUpdate) {
		$this->db->where($whereUpdate);
		return $this->db->update('master_language', $dataUpdate);
	}
}

?>
