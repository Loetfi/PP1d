<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		$this->load->model('Language_model'); 
		$this->load->model('Kantor_model');
		$this->load->model('Hak_akses_model');

	}

	public function index()
	{
		$user 	= $this->ion_auth->user()->row();
		$userid = $user->id; 		
	}

}

/* End of file Manual.php */
/* Location: ./application/modules/back/controllers/Manual.php */