<?php

class Investor_model extends CI_Model{
	
	function tahunReport(){
		$sql = "SELECT DISTINCT tahun from investor_report ORDER BY tahun DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function insertInvestor($dataInsert){
		return $this->db->insert('investor_report', $dataInsert);
	}
	function detailInvestor($tahun){
		$sql = "
		SELECT * FROM investor_report 
		WHERE tahun = '$tahun'
			AND id not in (4,5,8,9,11,12,14,16,17,21,22,23)
		ORDER BY tahun DESC, id ASC
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function updateInvestor($dataUpdate, $whereUpdate) {
		$this->db->where($whereUpdate);
		return $this->db->update('investor_report', $dataUpdate);
	}
	function getInvestor(){
		$sql = "select * from investor_report order by tahun DESC, id ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function hirarkiReport(){
		$sql = "
		SELECT 
			DISTINCT id, kepala, posisi, nama, tipe, satuan, kelompok
		FROM investor_report
		WHERE id not in (4,5,8,9,11,12,14,16,17,21,22,23)
		ORDER BY id, kepala, posisi, nama, tipe, satuan, kelompok
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}

?>
