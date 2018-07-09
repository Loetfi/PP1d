<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {


	public function __construct()
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



	public function ga()
	{

		$data = array(
			'title' 	=> 'Google Analytics', 
			'ga'		=> $this->Settings_model->getGA(),
			);


		$this->form_validation->set_rules('ga', 'Google Analytics', 'required');
        // EN_judulberita EN_isiberita
		if ($this->form_validation->run() == FALSE) { 


			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin',$data);
			$this->load->view('front/subkepalaadmin',$data);
			$this->load->view('Settings/googleanalitycs',$data); // disini bermain
			$this->load->view('front/footeradmin',$data);
        	// $this->ga();

		} else { 

			$ga = $_POST['ga'];

			$insert = array(
				'ga' => $ga, );

			$this->db->update('settings', $insert);

			$this->session->set_flashdata('pesan', 'Berhasil dirubah ');
			redirect('back/setting/ga','refresh'); 

		}
 		// Tampilan
		
	}


	public function sosmed()
	{



		$data = array(
			'title' 	=> 'Sosial Media',
			'in'		=> $this->Settings_model->sosmed('sosmed_in'),
			'fb'		=> $this->Settings_model->sosmed('sosmed_fb'),
			'twitter'	=> $this->Settings_model->sosmed('sosmed_twitter'),
			'google'	=> $this->Settings_model->sosmed('sosmed_google'),

			);

		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
		$this->load->view('Settings/sosmed',$data); 
		$this->load->view('front/footeradmin',$data);

	}


	public function proses_sosmed()
	{
		$this->form_validation->set_rules('sosmed_in', 'Sosmed Linked In', 'required');
		$this->form_validation->set_rules('sosmed_fb', 'Sosmed Facebook', 'required');
		$this->form_validation->set_rules('sosmed_twitter', 'Sosmed Twitter', 'required');
		$this->form_validation->set_rules('sosmed_google', 'Sosmed Google', 'required');
        // EN_judulberita EN_isiberita
		if ($this->form_validation->run() == FALSE) { 
			
			// show_error('error bos'); 
			$this->sosmed();

		} else {

			// if ($_POST) {

			$sosmed_in 		= trim($_POST['sosmed_in']); 
			$sosmed_fb 		= trim($_POST['sosmed_fb']); 
			$sosmed_twitter = trim($_POST['sosmed_twitter']); 
			$sosmed_google 	= trim($_POST['sosmed_google']); 

			$data = array(
				'sosmed_in' 		=> $sosmed_in,
				'sosmed_fb' 		=> $sosmed_fb,
				'sosmed_twitter' 	=> $sosmed_twitter,
				'sosmed_google' 	=> $sosmed_google);
			$this->db->update('settings', $data);

			$this->session->set_flashdata('pesan',"<div class='alert alert-success'> Data berhasil ditambahkan. </div>");

			redirect('back/setting/sosmed','refresh');
			// }


		}
	}

}

/* End of file Setting.php */
/* Location: ./application/modules/back/controllers/Setting.php */