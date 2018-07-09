<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {

	public function __contstruct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','pagination'));

		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->model('News_model');
		$this->load->helper('slug_helper');
		$this->load->model('Hak_akses_model');
		$this->load->model('Settings_model');

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
	}

	public function index()
	{
		 
		redirect('back/dashboard','refresh');
		 


	}

}

/* End of file Back.php */
/* Location: ./application/modules/back/controllers/Back.php */