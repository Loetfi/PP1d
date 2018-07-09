<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','pagination'));

		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
	

	public function index()
	{
		$data = array(
			'title' => 'Login Admin' , );
		$this->load->view('front/kepalaadmin');	
		$this->load->view('front/loginadmin');	
		$this->load->view('front/footeradmin');		
	}

	public function admin()
	{
		$this->load->view('front/kepalaadmin');
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('front/contentadmin'); // disini bermain
		$this->load->view('front/footeradmin');
	}

	public function editor()
	{
		
		$this->load->view('front/kepalaadmin');
		$this->load->view('front/editor');
	}

}

/* End of file Front.php */
/* Location: ./application/modules/back/controllers/Front.php */