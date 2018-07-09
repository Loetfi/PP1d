<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends CI_Controller { 

	var $userid;
	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		$this->load->model('Language_model'); 
		$this->load->model('Menu_model');
		$this->load->model('Investor_model'); 
		
		###############################
		## END Cek Hak Akses
		if (!$this->ion_auth->logged_in()){
			//redirect them to the login page
			redirect('back/auth/login', 'refresh');
		} else {
			$this->load->model('Hak_akses_model');
			$uri 	=  $this->uri->segment(2);
			$user 	= $this->ion_auth->user()->row();
			$this->userid = $user->id; 
			$cek 	= $this->Hak_akses_model->cekHak($this->userid, $uri);

			if (!$cek) { 
				redirect('back/dashboard/','refresh'); 
			}
		}
		## END Cek Hak Akses
		###############################
	}
	

	function index(){
		$data = array(
			'listData' 		=> $this->Investor_model->tahunReport(),
			'title'			=> 'Investor Report',
			);
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Investor/list', $data);
		$this->load->view('front/footeradmin');
	}
	function input(){
		$data = array(
			'hirarkiReport' => $this->Investor_model->hirarkiReport(),
			);
		
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');

		foreach($data['hirarkiReport'] as $row){
			if($row['kepala'] == '0' && $row['tipe'] != ''){}
			else {
				$this->form_validation->set_rules('isian_id_'.$row['id'], $row['nama'], 'required');
			}
		}
		
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin');
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Investor/input',$data);
			$this->load->view('front/footeradmin');
			
		}
		else {
			foreach($data['hirarkiReport'] as $row){
				if($row['tipe'] != 'null'){
					$param = 'isian_id_'.$row['id'];
					$insertData = array(
						'id' => $row['id'],
						'kepala' => $row['kepala'],
						'posisi' => $row['posisi'],
						'nama' => $row['nama'],
						'tipe' => $row['tipe'],
						'satuan' => $row['satuan'],
						'kelompok' => $row['kelompok'],
						'tahun' => $_POST['tahun'],
						'nilai' => $_POST[$param],
						'create_user' 	=> $this->userid,
						'create_date' 	=> date('Y-m-d H:i:s'),
					);
					
				}
				else {
					$insertData = array(
						'id' => $row['id'],
						'kepala' => $row['kepala'],
						'posisi' => $row['posisi'],
						'nama' => $row['nama'],
						'tipe' => $row['tipe'],
						'satuan' => $row['satuan'],
						'kelompok' => $row['kelompok'],
						'tahun' => $_POST['tahun'],
						'create_user' 	=> $this->userid,
						'create_date' 	=> date('Y-m-d H:i:s'),
					);
				}
				$this->Investor_model->insertInvestor($insertData);
			}
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/investor');
		
		}
		
	}

	function edit($tahun){
		
		$listDetail = $this->Investor_model->detailInvestor($tahun);
		foreach($listDetail as $row){
			$detail['isian_id_'.$row['id']] = $row['nilai'];
		}
		
		$hirarkiReport = $this->Investor_model->hirarkiReport();
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		foreach($hirarkiReport as $row){
			if($row['kepala'] == '0' && $row['tipe'] != ''){}
			else {
				$this->form_validation->set_rules('isian_id_'.$row['id'], $row['nama'], 'required');
			}
		}
		
		$data = array(
			'hirarkiReport' => $this->Investor_model->hirarkiReport(),
			'tahun' => $tahun,
			'detail' => $detail,
			);
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin');
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Investor/edit',$data);
			$this->load->view('front/footeradmin');
			
		}
		else {
			foreach($data['hirarkiReport'] as $row){
				if($row['tipe'] != 'null'){
					$param = 'isian_id_'.$row['id'];
					$dataUpdate = array(
						'nilai' => $_POST[$param],
						'update_user' 	=> $this->userid,
						'update_date' 	=> date('Y-m-d H:i:s'),
					);
					$whereUpdate = array(
						'id' => $row['id'],
						'tahun' => $tahun,
					);
					
					$this->Investor_model->updateInvestor($dataUpdate, $whereUpdate);
				}
			}
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/investor');
		}
		
	}
	
	function dashboard(){
		$hirarkiReport = $this->Investor_model->hirarkiReport();
		
		$periode = array();
		$head = array();
		$arrKel = array();
		$listData = $this->Investor_model->getInvestor();
		foreach($listData as $row){
			$id = $row['id'];
			$tahun = $row['tahun'];
			$kepala = $row['kepala'];
			$tipe = $row['tipe'];
			$satuan = $row['satuan'];
			$kelompok = $row['kelompok'];
			
			$contentBaru[$tahun][$id] = $row;
			
			if (!in_array($tahun, $periode)) {
				$periode[] = $tahun;
			}
			if (!in_array($kelompok, $arrKel)) {
				$arrKel[] = $kelompok;
			}
			
			## set Parent Child
			if ($kepala == 0){
				$allHead[$tahun][] = $id;
				$tipeHead[$tahun][$id] = $tipe;
				$idHead[$tahun][$id] = array();
			} else{
				$idHead[$tahun][$kepala][] = $id;
			}
			
			## set nilai untuk yang tipenya adalah SUM
			if (@$tipeHead[$tahun][$kepala] == 'sum')
				@$contentBaru[$tahun][$kepala]['nilai'] += $row['nilai'];
			
		}
		
		foreach($hirarkiReport as $row){
			$id = $row['id'];
			$kelompok = $row['kelompok'];
			$thisRow = array();
			$thisRow['id'] = $row['id'];
			$thisRow['kepala'] = $row['kepala'];
			$thisRow['nama'] = $row['nama'];
			$thisRow['tipe'] = $row['tipe'];
			$thisRow['satuan'] = $row['satuan'];
			$thisRow['kelompok'] = $row['kelompok'];
			
			for($idxTahun=0; $idxTahun<count($periode); $idxTahun++){
				$tahun = $periode[$idxTahun];
				$thisRow[$tahun] = @$contentBaru[$tahun][$id]['nilai'];
			}
			$allRow[$kelompok][] = $thisRow;
		}
		$data = array(
			'allRow' => $allRow,
			'arrPeriode' => $periode,
			'arrKelompok' => $arrKel,
			'title'			=> 'Investor Report',
		);
		
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Investor/dashboard', $data);
		$this->load->view('front/footeradmin');
		
	}
}
