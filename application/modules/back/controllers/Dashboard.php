<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','pagination'));

		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');


		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('back/auth/login', 'refresh');
		}
		
	}

	public function index()
	{ 
		$data = array(
			'title' => 'Dashboard Admin - Sera CMS',
			'jenis' => 'Dashboard',
			);

		// echo 'masuk sini';
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
		$this->load->view('front/contentadmin',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/back/controllers/Dashboard.php */