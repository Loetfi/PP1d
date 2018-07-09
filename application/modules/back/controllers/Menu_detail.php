<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_detail extends CI_Controller {

	var $userid;
	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		$this->load->model('Language_model'); 
		$this->load->model('Menu_model');
		$this->load->model('Menu_detail_model');
		
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

	
	// Index Data Master Menu Detail
	// 
	function index(){
		$data = array(
			'listLanguage' 	=> $this->Language_model->listLanguage(array('status' => 1)),
			'listData' 		=> $this->Menu_detail_model->listMenuDetail(),
			'title'			=> 'Menu Detail',
			);
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Menu_detail/list', $data);
		$this->load->view('front/footeradmin');
	}
	// End


	function input(){
		$data = array(
			'listLanguage' => $this->Language_model->listLanguage(array('status' => 1)),
			'listMenu' => $this->Menu_model->listMenu(),
			);
		
		$this->form_validation->set_rules('menu_id', 'menu_id', 'required');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('slug', 'slug', 'required');
		$this->form_validation->set_rules('position', 'position', 'required');
		foreach($data['listLanguage'] as $row){
			$this->form_validation->set_rules('menu_detail_name_'.$row['language_id'], 'menu_detail_name_'.$row['language_id'], 'required');
			// $this->form_validation->set_rules('slug_'.$row['language_id'], 'slug_'.$row['language_name'], 'required');
		}
		
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Menu_detail/input',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			
			## get New Id MenuDetail
			$lastId = $this->Menu_detail_model->lastId();
			$menu_detail_id = (int)$lastId['menu_detail_id'] + 1;
			$menu_id = $_POST['menu_id'];
			$title = $_POST['title'];
			$slug = $_POST['slug'];
			$position = $_POST['position'];
			$status = $_POST['status'];
			foreach($data['listLanguage'] as $row){
				$menu_detail_name = $_POST['menu_detail_name_'.$row['language_id']];
				$language_id = $row['language_id'];
				
				$dataInsert = array(
					'menu_detail_id' => $menu_detail_id,
					'menu_id' => $menu_id,
					'menu_detail_name' => $menu_detail_name,
					'title' => $title,
					'slug' => $slug,
					'position' => $position,
					'status' => $status,
					'create_user' 	=> $this->userid,
					'create_date' 	=> date('Y-m-d H:i:s'),
					'language_id' => @$language_id,
					);
				// print_r($dataInsert);
				$insert = $this->Menu_detail_model->insertMenuDetail($dataInsert);
			}
			
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/menu_detail');
			
			// print_r(@$_POST);
		}
		
	}
	function edit($id){
		$detailAwal = $this->Menu_detail_model->detailMenuDetail($id);
		foreach($detailAwal as $row){
			$detail['menu_detail_id'] = $id;
			$detail['menu_detail_name_'.$row['language_id']] = $row['menu_detail_name'];
			$detail['status'] = $row['status'];
			$detail['menu_id'] = $row['menu_id'];
			$detail['title'] = $row['title'];
			$detail['slug'] = $row['slug'];
			$detail['position'] = $row['position'];
		}
		
		$data = array(
			'listLanguage' => $this->Language_model->listLanguage(array('status' => 1)),
			'listMenu' => $this->Menu_model->listMenu(),
			'detail' => $detail,
			);
		$this->form_validation->set_rules('menu_id', 'menu_id', 'required');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('position', 'position', 'required');
		foreach($data['listLanguage'] as $row){
			$this->form_validation->set_rules('menu_detail_name_'.$row['language_id'], 'menu_detail_name_'.$row['language_id'], 'required');
		}
		
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Menu_detail/edit',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			
			$menu_detail_id = $_POST['menu_detail_id'];
			$menu_id = $_POST['menu_id'];
			$status = $_POST['status'];
			$title = $_POST['title'];
			$position = $_POST['position'];
			
			foreach($data['listLanguage'] as $row){
				$menu_detail_name = $_POST['menu_detail_name_'.$row['language_id']];
				$language_id = $row['language_id'];
				
				$dataUpdate = array(
					'menu_id' => $menu_id,
					'menu_detail_name' => $menu_detail_name,
					'title' => $title,
					'position' => $position,
					'status' => $status,
					'update_user' 	=> $this->userid,
					'update_date' 	=> date('Y-m-d H:i:s'),
					);
				$whereUpdate = array('menu_detail_id' => $menu_detail_id, 'language_id' => $language_id);
				$update = $this->Menu_detail_model->updateMenuDetail($dataUpdate, $whereUpdate);
			}
			
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/menu_detail');
			
			// print_r(@$_POST);
		}
		
	}
	
	function ambildata(){
		$listData = $this->Menu_detail_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($listData as $d) {
			$status  = $d['status'];
			// If Status
			if ($status == '1') $status = "<a class='btn btn-primary btn-xs disabled'> Aktif </a>";
			else $status = "<a class='btn btn-default btn-xs disabled'> Tidak Aktif </a>";
			// End Status

			$no++;
			$row 	= array(); 
			$row[] 	= $no;
			$row[] 	= $d['menuName'];
			$row[] 	= $d['menuDetailName'];
			$row[] 	= $d['title'];
			$row[] 	= $d['position'];
			$row[] 	= $status;
			// $row[] 	= $d['create_date'];
			// $row[] 	= $d['namadepan1'].' '.$d['namabelakang1'];
			// $row[] 	= $d['update_date'];
			// $row[] 	= $d['namadepan2'].' '.$d['namabelakang2'];
			
			// Action 
			$row[] 	=  	"<a href='".site_url('back/menu_detail/edit/'.$d['menu_detail_id'])."' class='btn btn-primary'><i class='fa fa-pencil'></i> Edit </a> 
			<a href='".site_url('back/menu_detail/delete/'.$d['menu_detail_id'])."' class='btn btn-danger'  onclick=\"return confirm('Are you sure you want to delete this item?');\"> <i class='fa fa-trash'></i> Hapus </a>";

			//anchor('back/category/edit/'.$d->category_id, '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary"')." oke ".anchor('back/category/delete/'.$row->category_id, '<i class="fa fa-trash"></i> Hapus', 'data-confirm="Apakah kamu ingin menghapusnya ?" class="btn btn-danger"'); 
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Menu_detail_model->count_all(),
			"recordsFiltered" => $this->Menu_detail_model->count_filtered(),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}

}
