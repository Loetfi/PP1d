<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {
 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','pagination'));

		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->load->model('Language_model'); 
		$this->lang->load('auth');

			###############################
		## END Cek Hak Akses
		if (!$this->ion_auth->logged_in()){
			//redirect them to the login page
			redirect('back/auth/login', 'refresh');
		} else {
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
			'listData' => $this->Language_model->listLanguage(),
		);
		$this->load->view('front/kepalaadmin');
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
			$this->load->view('Language/list', $data);
		$this->load->view('front/footeradmin');
	}
	function input(){
		
		$this->form_validation->set_rules('language_name', 'language_name', 'required');
		
		if ($this->form_validation->run() == FALSE){
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin');
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
				$this->load->view('Language/input');
			$this->load->view('front/footeradmin');
			
		}
		else {
			
			$language_name = @$_POST['language_name'];
			$status = (int)@$_POST['status'];
			$dataInsert = array(
				'language_name' => $language_name,
				'status' => $status,
				'create_user' => @$create_user,
				'create_date' => @$create_date,
			);
			$insert = $this->Language_model->insertLanguage($dataInsert);
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/language');
		}
		
	}
	function edit($id){
		$data = array(
			'detail' => $this->Language_model->detailLanguage($id),
		);
		
		// set_value('language_name', isset($data['detail']['language_name']) ? $data['detail']['language_name'] : '');
		
		$this->form_validation->set_rules('language_name', 'language_name', 'required');
		if ($this->form_validation->run() == FALSE){
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin');
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
				$this->load->view('Language/edit',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			$language_id = @$_POST['language_id'];
			$language_name = @$_POST['language_name'];
			$status = (int)@$_POST['status'];
			$dataUpdate = array(
				'language_name' => $language_name,
				'status' => $status,
				'update_user' => @$update_user,
				'update_date' => @$update_date,
			);
			$whereUpdate = array('language_id' => $language_id);
			$update = $this->Language_model->updateLanguage($dataUpdate, $whereUpdate);
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/language');
		}
		
	}
}
