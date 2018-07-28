<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function grafik_batang($year)
	{
		if (is_numeric($year)) {
			$res = $this->db->select('*')
			->from('view_grafik_count_status')
			->where('tahun', $year)
			->order_by('tglYm','ASC')
			->get()
			->result_array();
		} else {
			$res = [];
		}

		return $res;
	}

	function grafik_batang_by_unit($sDate , $eDate, $id_unit)
	{
		if (is_numeric($id_unit)) {
			$res = $this->db->select('count(*) nilai , sts, tglYm')
			->from('view_report_all_unit')
			->where("tglYm >= $sDate")
			->where("tglYm <= $eDate")
			->where('id_unit',$id_unit)
			->group_by('sts,tglYm')
			->order_by('tglYm','ASC')
			->get()
			->result_array();
		} else {
			$res = [];
		}

		return $res; 
	}


	/// grafik pie tindakan 
	function grafik_pie_tindakan($year)
	{
		if (is_numeric($year)) {

			$res = $this->db->select('count(*) nilai,sts,tglYm')
			->from('view_report_all_unit')
			->where('tglYm',$year)
			->group_by('sts,tglYm')
			->order_by('tglYm','ASC')
			->get()
			->result_array();

		} else {
			$res = array();
		}

		return $res;
	}

	// 
	function diagram_pie_terusan($year)
	{
		if (is_numeric($year)) {
			$res = $this->db->select("count(*) nilai,a.sts,a.id_unit,b.nama_unit")
			->from('view_report_all_unit a')
			->join('ppid_unit b','a.id_unit = b.id_unit','LEFT')
			->where('a.id_unit is not null')
			->where('tglYm ',$year)
			->group_by('a.sts , a.id_unit,b.nama_unit')
			->order_by('tglYm','ASC')
			->get()
			->result_array(); 
		} else {
			$res = array();
		}

		return $res;
	}

	// 

	function diagram_pie_sumber($year)
	{
		if (is_numeric($year)) {
			$res = $this->db->select('count(*) nilai, sumber')
			->from('ppid_permohonan')
			->where("date_format(from_unixtime(cdate),'%Y%m')", $year)
			->group_by('sumber')
			->get()
			->result_array();
		} else {
			$res = array();
		}

		return $res;
	}

	// 

	function grafik_pie_tolak($year)
	{

		if (is_numeric($year)) {
			$res = $this->db->select('count(*) nilai,deskripsi sts,tglYm')
			->from('view_grafik_tolak')
			->where('tglYm',$year)
			->group_by('sts,tglYm')
			->order_by('tglYm','ASC') 
			->get()
			->result_array();

		} else {
			$res = array();
		}

		return $res;
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/modules/api/models/Dashboard_model.php */
