<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index()
	{
		$get = @$_GET['q'];
		// echo "Blog kuh";
		$data['title'] = 'Cari Berita '.$get;
		$data['page'] = 'front/searchnews'; 
		// $data['news'] = $this->Home_model->getNewsperKat(20, 'ID' , 100);
		$data['news'] = $this->Home_model->SearchNewsperKat(20 , 'ID' , 100 , $get);
		$data['category'] = $this->Home_model->category();
		$this->load->view('template/tema', $data, FALSE);
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */
