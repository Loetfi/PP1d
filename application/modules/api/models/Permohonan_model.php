<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_model extends CI_Model {

	
	function by_pengguna($id_pengguna)
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
		->where('pp.id_pengguna',$id_pengguna)->get()->result_array();
		 
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
		->where('pp.id_pengguna',$id_pengguna)
		->where('pp.no_permohonan',$id_permohonan)
		->get()
		->row_array();
		 
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

}

/* End of file Permohonan_model.php */
/* Location: ./application/modules/api/models/Permohonan_model.php */
