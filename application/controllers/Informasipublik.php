<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasipublik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index()
	{
		// echo "Blog kuh";
		$data['title'] = 'Beranda';
		$data['page'] = 'front/news'; 
		$data['news'] = $this->Home_model->getNewsperKat(20, 'ID' , 100);
		$data['category'] = $this->Home_model->category();
		$this->load->view('template/tema', $data, FALSE);
	}

	function informasi_setiap_saat(){
		$data['title'] = 'Informasi setiap saat';
		$data['page'] = 'front/informasiPdf'; 
		
		$data['content'] = $this->db->query("
			SELECT *
			FROM menu_content a
			WHERE language_id = 1
				AND menu_detail_id = '10'
		")->result_array();

		$this->load->view('template/tema', $data, FALSE);
	}
	
	function _remap($method, $params = array()){
		if ($method == 'informasi-setiap-saat'){
			$data['title'] = 'Informasi setiap saat';
			$menu_detail_id = '10';
		}
		else if ($method == 'informasi-berkala'){
			$data['title'] = 'Informasi Berkala';
			$menu_detail_id = '11';
		}
		else if ($method == 'informasi-serta-merta'){
			$data['title'] = 'Informasi Serta-merta';
			$menu_detail_id = '12';
		}
		else {
			$data['title'] = 'Informasi setiap saat';
			$menu_detail_id = '10';
		}
		
		$data['content'] = $this->db->query("
			SELECT *
			FROM menu_content a
			WHERE language_id = 1
				AND menu_detail_id = '$menu_detail_id'
		")->result_array();
		
		$data['page'] = 'front/informasiPdf'; 
		$this->load->view('template/tema', $data, FALSE);
	}
}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */
