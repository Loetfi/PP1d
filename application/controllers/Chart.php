<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	function __construct(){
        parent::__construct();
        // $this->load->model('Unit_model');
        // $this->load->model('Pengguna_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        
        $this->breadcrumbs->push('Home', 'api/mockup/depan');
        $this->breadcrumbs->push('Master Pengguna', 'admin/pengguna');
    }
    

	public function index()
	{ 
		// echo "<pre>";		
		// echo "pojok kiri bawah";

		$query = $this->db->query("SELECT count(*) nilai, sts, tglYm from view_report_all_unit where sts in ('Mandiri','Terusan') and tglYm = 201708 GROUP BY sts, tglYm;")->result_array();

		$kiribawah = $query;
		foreach ($kiribawah as $kb) {
			$kbi = array(
				'colors' => '#058DC7',
				'name' => $kb['sts'],
				'y' => $kb['nilai'] 
			);
			$kbii[] = $kbi; 
		}

		$data['kiribawah'] = $kbii;

		$data['title'] = 'Dashboard';
        $data['page'] = 'chart/grafik';
        $this->breadcrumbs->push('List', '/'); 
       	$this->load->view('chart/grafik', $data);
        // $this->load->view('template/tema',$data);

        exit();
		

		echo "<br>"; 
		echo "pojok kanan bawah";
		$query = $this->db->query("SELECT a.id_unit, b.nama_unit,
			count(*) nilai, tglYm
			from view_report_all_unit a
			left join ppid_unit b on a.id_unit = b.id_unit
			WHERE 
			a.id_unit is not null 
			and tglYm = 201708 
			GROUP BY a.id_unit, b.nama_unit, tglYm")->result_array();
		print_r($query);

		echo "<br>";
		echo "pojok kiri atas";
		$query = $this->db->query("SELECT * from view_grafik_count_status")->result_array();
		print_r($query);

		// echo "<br>"; 
		// echo "pojok kanan atas";
		// $query = $this->db->query("SELECT * from view_report_all_unit")->result_array();
		// print_r($query);

		$this->load->view('chart/grafik' , $data);
	}

}

/* End of file Chart.php */
/* Location: ./application/controllers/Chart.php */
