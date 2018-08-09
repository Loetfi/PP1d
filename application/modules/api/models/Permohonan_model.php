<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_model extends CI_Model {

	
	function by_pengguna($param)
	{
		return $sql = $this->db->select('pp.*,
		usr.no_identitas,
		usr.type_identitas ,
		usr.nama , 
		usr.alamat , 
		usr.email,
		usr.pekerjaan,
		usr.ktp_img,
		usr.role,
		usr.remarks')
		->from('ppid_permohonan pp')
		->join('ppid_pengguna usr','pp.id_pengguna = usr.id_pengguna')
		->where('pp.id_pengguna', $param['id'])
		->limit($param['limit'], $param['offset'])
		->get()->result_array();
	}	

	function by_detail($id_pengguna , $id_permohonan)
	{
		return $sql = $this->db->select('pp.*,
		usr.no_identitas,
		usr.type_identitas ,
		usr.nama , 
		usr.alamat , 
		usr.email,
		usr.pekerjaan,
		usr.ktp_img,
		usr.role,
		usr.remarks')
		->from('ppid_permohonan pp')
		->join('ppid_pengguna usr','pp.id_pengguna = usr.id_pengguna')
		->where('pp.id_pengguna', $id_pengguna)
		->where('pp.no_permohonan', $id_permohonan)
		->get()
		->row_array();
	}
	
	function getLastNoPermohonan()
	{
		$sql = "select max(no_permohonan) as no_permohonan 
		from ppid_permohonan 
		where no_permohonan like 'ESDM-PPID/".date('Y/m/d')."%'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function insert_permohonan($data_insert){
		return $this->db->insert('ppid_permohonan', $data_insert);
	}

	// by riwayat 
	function by_riwayat($id_permohonan)
	{
		return $this->db->select('*')
		->from('ppid_permohonan_log')
		->where('no_permohonan',$id_permohonan)
		->order_by('cdate','asc')
		->get()
		->result_array();
	}

	// balasan 
	function by_balasan($no_permohonan)
	{
		return $this->db->select('*')
		->from('ppid_permohonan_balasan')
		->where('no_permohonan',$no_permohonan)
		->get()
		->result_array(); 
	}
	
	function insert_permohonan_log($data_insert)
	{
		return $this->db->insert('ppid_permohonan_log', $data_insert);
	}
	
	// update permohonan
	function update_permohonan_by_id($param)
	{
		$this->db->where('no_permohonan', $param['id']);
		return $this->db->update('ppid_permohonan', $param['data']);
	}

}

/* End of file Permohonan_model.php */
/* Location: ./application/modules/api/models/Permohonan_model.php */
