<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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

	public function detail($tahun =0, $bulan =0, $slug='')
	{
        if ($tahun ==0 || $bulan == 0 || $slug == ''){
            redirect('blog');
        }
		// echo "Blog kuh";
		$data['title'] = 'Beranda';
		$data['page'] = 'front/newsdetail'; 
		$data['news'] = $this->Home_model->getNewsDetail($tahun , $bulan , $slug);
		if ($data['news'] == "" ) {
			redirect('blog','refresh');
			exit();
		}
		$data['category'] = $this->Home_model->category();
		$this->load->view('template/tema', $data, FALSE);
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */
