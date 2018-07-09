<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_content extends CI_Controller {

	var $userid;
	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth'); 
		$this->load->helper('slug_helper');
		$this->load->model('Language_model'); 
		$this->load->model('Menu_model');
		$this->load->model('Menu_detail_model');
		$this->load->model('Menu_content_model');
		
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

 	// Index
	function index(){
		$data = array(
			'listLanguage' 	=> $this->Language_model->listLanguage(array('status' => 1)),
			'listData' 		=> $this->Menu_detail_model->listMenuDetail(),
			'title'			=> 'Menu Content',
			);
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Menu_content/listMenuDetail', $data);
		$this->load->view('front/footeradmin');
	}
	// End


	// List menu detail dari menu content
	function listContent($idMenuDetail){
		$detailAwal = $this->Menu_detail_model->detailMenuDetail($idMenuDetail);
		foreach($detailAwal as $row){
			$detailMenu['menu_detail_id'] 							= $idMenuDetail;
			$detailMenu['menu_detail_name_'.$row['language_id']] 	= $row['menu_detail_name'];
			$detailMenu['status'] 									= $row['status'];
			$detailMenu['menu_id'] 									= $row['menu_id'];
			$detailMenu['title'] 									= $row['title'];
			$detailMenu['slug'] 									= $row['slug'];
			$detailMenu['position'] 								= $row['position'];
		}
		
		$data = array(
			'listLanguage' 	=> $this->Language_model->listLanguage(array('status' => 1)),
			'listData' 		=> $this->Menu_content_model->listContent($idMenuDetail),
			'detailMenu' 	=> $detailMenu,
			'title'			=> 'Menu List Content Detail',
			);
		$this->load->view('front/kepalaadmin');
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Menu_content/listContent', $data);
		$this->load->view('front/footeradmin');
	}

	// end


	function input($idMenuDetail){
		$detailAwal = $this->Menu_detail_model->detailMenuDetail($idMenuDetail);
		foreach($detailAwal as $row){
			$detailMenu['menu_detail_id'] = $idMenuDetail;
			$detailMenu['menu_detail_name_'.$row['language_id']] = $row['menu_detail_name'];
			$detailMenu['status'] = $row['status'];
			$detailMenu['menu_id'] = $row['menu_id'];
			$detailMenu['title'] = $row['title'];
			$detailMenu['slug'] = $row['slug'];
			$detailMenu['position'] = $row['position'];
		}
		
		$data = array(
			'listLanguage' => $this->Language_model->listLanguage(array('status' => 1)),
			'idMenuDetail' => $idMenuDetail,
			'detailMenu' => $detailMenu,
			'title' => 'Input Content Menu Detail',
			);
		
		foreach($data['listLanguage'] as $row){
			$this->form_validation->set_rules('content_'.$row['language_id'], 'content_'.$row['language_id'], 'required');
			$this->form_validation->set_rules('title_'.$row['language_id'], 'title_'.$row['language_id'], 'required');
		}
		$this->form_validation->set_rules('position', 'position', 'required');
		
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin', $data);
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Menu_content/input',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			
			## get New Id
			$lastId = $this->Menu_content_model->lastId();
			$content_id = (int)$lastId['content_id'] + 1;
			
			$menu_detail_id = $_POST['menu_detail_id'];
			$position = $_POST['position'];
			$status = $_POST['status'];
			
			## cek upload photo
			$photo = null;
			$paramPhoto = 'photo';
			if ($_FILES[$paramPhoto]['tmp_name']){
				$ext = pathinfo($_FILES[$paramPhoto]['name'], PATHINFO_EXTENSION);
				$cekPhoto = $_FILES[$paramPhoto]['tmp_name'];
				
				## random text
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
				 .'0123456789'); // and any other characters
				shuffle($seed);
				$rand = '';
				foreach (array_rand($seed, 10) as $k){
					$rand .= $seed[$k];
				}
				$file_name= time().'_'.$rand;
				
				$config['upload_path'] = "./uploads/contents";
				$config['allowed_types'] = '*';
				$config['max_size']	= '102400';
				$config['file_name'] = $file_name;
				$photo = $config['file_name'].".".$ext;
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload($paramPhoto)){
					$salah = $this->upload->display_errors();
					print_r($salah);
					die();
				}
			}
			
			$photo_litle = null;
			$paramPhoto = 'photo_litle';
			if ($_FILES[$paramPhoto]['tmp_name']){
				$ext = pathinfo($_FILES[$paramPhoto]['name'], PATHINFO_EXTENSION);
				$cekPhoto = $_FILES[$paramPhoto]['tmp_name'];
				
				## random text
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
				 .'0123456789'); // and any other characters
				shuffle($seed);
				$rand = '';
				foreach (array_rand($seed, 10) as $k){
					$rand .= $seed[$k];
				}
				$file_name= time().'_'.$rand;
				
				$config['upload_path'] = "./uploads/contents";
				$config['allowed_types'] = '*';
				$config['max_size']	= '102400';
				$config['file_name'] = $file_name;
				$photo_litle = $config['file_name'].".".$ext;
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload($paramPhoto)){
					$salah = $this->upload->display_errors();
					print_r($salah);
					die();
				}
			}
			
			foreach($data['listLanguage'] as $row){
				
				$content = $_POST['content_'.$row['language_id']];
				$title = $_POST['title_'.$row['language_id']];
				$subtitle = @$_POST['subtitle_'.$row['language_id']];
				$url_video = @$_POST['url_video'];
				$language_id = $row['language_id'];
				
				$dataInsert = array(
					'slug'		=> slug($title),
					'content_id' => $content_id,
					'menu_detail_id' => $menu_detail_id,
					'content' => $content,
					'photo' => $photo,
					'photo_litle' => $photo_litle,
					'title' => $title,
					'subtitle' => $subtitle,
					'position' => $position,
					'status' => $status,
					'create_user' 	=> $this->userid,
					'create_date' 	=> date('Y-m-d H:i:s'),
					'language_id' => @$language_id,
					'url_video' => @$url_video,
					);
				$insert = $this->Menu_content_model->insertContent($dataInsert);
				
			}
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/menu_content/listContent/'.$idMenuDetail);

		}
		
	}
	function detail($idMenuContent){
		
		$listContentDetail = $this->Menu_content_model->listContentDetail($idMenuContent);
		foreach($listContentDetail as $row){
			$detail['position'] = $row['position'];
			$detail['status'] = $row['status'];
			$idMenuDetail = $row['menu_detail_id'];
		}
		
		$detailAwal = $this->Menu_detail_model->detailMenuDetail($idMenuDetail);
		foreach($detailAwal as $row){
			$detailMenu['menu_detail_id'] = $idMenuDetail;
			$detailMenu['menu_detail_name_'.$row['language_id']] = $row['menu_detail_name'];
			$detailMenu['status'] = $row['status'];
			$detailMenu['menu_id'] = $row['menu_id'];
			$detailMenu['title'] = $row['title'];
			$detailMenu['slug'] = $row['slug'];
			$detailMenu['position'] = $row['position'];
		}
		
		$data = array(
			'detailMenu' => $detailMenu,
			'listLanguage' => $this->Language_model->listLanguage(array('status' => 1)),
			'listContentDetail' => $listContentDetail,
			'detail' => $detail,
			'title' => 'Detail Content Menu Detail',
			);
		
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Menu_content/detail',$data);
		$this->load->view('front/footeradmin');
		
	}
	
	function edit($idMenuContent){
		$listContentDetail = $this->Menu_content_model->listContentDetail($idMenuContent);
		foreach($listContentDetail as $row){
			$detail['position'] = $row['position'];
			$detail['status'] = $row['status'];
			$detail['photo'] = $row['photo'];
			$detail['photo_litle'] = $row['photo_litle'];
			$detail['url_video'] = $row['url_video'];
			$detail['title_'.$row['language_id']] = $row['title'];
			$detail['subtitle_'.$row['language_id']] = $row['subtitle'];
			$detail['content_'.$row['language_id']] = $row['content'];
			$idMenuContent = $row['content_id'];
			$idMenuDetail = $row['menu_detail_id'];
		}
		
		$detailAwal = $this->Menu_detail_model->detailMenuDetail($idMenuDetail);
		foreach($detailAwal as $row){
			$detailMenu['menu_detail_id'] = $idMenuDetail;
			$detailMenu['menu_detail_name_'.$row['language_id']] = $row['menu_detail_name'];
			$detailMenu['status'] = $row['status'];
			$detailMenu['menu_id'] = $row['menu_id'];
			$detailMenu['title'] = $row['title'];
			$detailMenu['slug'] = $row['slug'];
			$detailMenu['position'] = $row['position'];
		}
		
		
		$data = array(
			'listLanguage' => $this->Language_model->listLanguage(array('status' => 1)),
			'listMenu' => $this->Menu_model->listMenu(),
			'detailMenu' => $detailMenu,
			'detail' => $detail,
			'idMenuContent' => $idMenuContent,
			'title' => 'Edit Content Menu Detail',
			);
		
		foreach($data['listLanguage'] as $row){
			$this->form_validation->set_rules('content_'.$row['language_id'], 'content_'.$row['language_id'], 'required');
			$this->form_validation->set_rules('title_'.$row['language_id'], 'title_'.$row['language_id'], 'required');
		}
		$this->form_validation->set_rules('position', 'position', 'required');
		
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Menu_content/edit',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			// print_r($_POST);
			$content_id = $_POST['idMenuContent'];
			$position = $_POST['position'];
			$status = $_POST['status'];
			$url_video = @$_POST['url_video'];
			
			## cek upload photo
			$paramPhoto = 'photo';
			if ($_FILES[$paramPhoto]['tmp_name']){
				$ext = pathinfo($_FILES[$paramPhoto]['name'], PATHINFO_EXTENSION);
				$cekPhoto = $_FILES[$paramPhoto]['tmp_name'];
				
				## random text
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'
				 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
				 .'0123456789'); // and any other characters
				shuffle($seed);
				$rand = '';
				foreach (array_rand($seed, 10) as $k){
					$rand .= $seed[$k];
				}
				$file_name= time().'_'.$rand;
				
				$config['upload_path'] = "./uploads/contents";
				$config['allowed_types'] = '*';
				$config['max_size']	= '61440';
				$config['file_name'] = $file_name;
				$photo = $config['file_name'].".".$ext;
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload($paramPhoto)){
					$salah = $this->upload->display_errors();
					die();
				}
				$dataUpdate['photo'] = $photo;
			}
			
			$paramPhoto = 'photo_litle';
			if ($_FILES[$paramPhoto]['tmp_name']){
				$ext = pathinfo($_FILES[$paramPhoto]['name'], PATHINFO_EXTENSION);
				$cekPhoto = $_FILES[$paramPhoto]['tmp_name'];
				
				## random text
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'
				 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
				 .'0123456789'); // and any other characters
				shuffle($seed);
				$rand = '';
				foreach (array_rand($seed, 10) as $k){
					$rand .= $seed[$k];
				}
				$file_name= time().'_'.$rand;
				
				$config['upload_path'] = "./uploads/contents";
				$config['allowed_types'] = '*';
				$config['max_size']	= '61440';
				$config['file_name'] = $file_name;
				$photo_litle = $config['file_name'].".".$ext;
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload($paramPhoto)){
					$salah = $this->upload->display_errors();
					die();
				}
				$dataUpdate['photo_litle'] = $photo_litle;
			}
			
			foreach($data['listLanguage'] as $row){
				
				$content = $_POST['content_'.$row['language_id']];
				$title = $_POST['title_'.$row['language_id']];
				$subtitle = @$_POST['subtitle_'.$row['language_id']];
				$language_id = $row['language_id'];
				
				$dataUpdate['content_id'] = $content_id;
				$dataUpdate['content'] = $content;
				$dataUpdate['title'] = $title;
				$dataUpdate['subtitle'] = @$subtitle;
				$dataUpdate['position'] = $position;
				$dataUpdate['status'] = $status;
				$dataUpdate['url_video'] = $url_video;
				$dataUpdate['update_user'] =  $this->userid;
				$dataUpdate['update_date'] = date('Y-m-d H:i:s');
				
				$whereUpdate = array('content_id' => $content_id, 'language_id' => $language_id);
				$update = $this->Menu_content_model->updateContent($dataUpdate, $whereUpdate);
			}
			
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/menu_content/listContent/'.$idMenuDetail);
			
		}
		
	}
	



	// Urusan Data Table
	function ambildataMenuDetail(){
		$listData = $this->Menu_content_model->get_datatables_menu_detail();
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
			$idd = $d['menu_detail_id'];

			// Ambil Menu Detail
			$dd = $this->db->query("SELECT count(distinct b.content_id) as itungan from menu_content b where b.menu_detail_id = '$idd' ")->row();
			// End
			
			$row[] 	= @$dd->itungan;  
			// $row[] 	= $d['create_date'];
			// $row[] 	= $d['namadepan1'].' '.$d['namabelakang1'];
			// $row[] 	= $d['update_date'];
			// $row[] 	= $d['namadepan2'].' '.$d['namabelakang2'];
			
			// Action 
			$row[] 	=  	"<a href='".site_url('back/menu_content/listContent/'.$d['menu_detail_id'])."' class='btn btn-primary btn-sm'><i class='fa fa-eye'></i> Detail </a>";

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Menu_content_model->count_all_menu_detail(),
			"recordsFiltered" => $this->Menu_content_model->count_filtered_menu_detail(),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}




	// Data Tables
	function ambildata($idMenuDetail){
		$listData = $this->Menu_content_model->get_datatables($idMenuDetail);
		$data = array();
		$no = $_POST['start'];
		foreach ($listData as $d) {
			$status  = $d['status'];
			// If Status
			if ($status == '1') $status = "<a class='btn btn-primary btn-xs disabled'> Aktif </a>";
			else $status = "<a class='btn btn-default btn-xs disabled'> Tidak Aktif </a>";
			// End Status
			
			$imgArr = array('jpg','jpeg','png','bmp');
			$photo  = $d['photo'];
			$gambar = '';
			if ($photo != '') {
				
				if (strtolower(substr($photo,-3)) == 'mp4'){
					$gambar = '<i class="ti-control-play">&nbsp;Video</i>';
				} else if (in_array(substr($photo,-3), $imgArr) || in_array(substr($photo,-4), $imgArr)) {
					$gambar = '<img src="'.base_url().'/uploads/contents/'.$photo.'" width="100px">';
				} else{
					$gambar = '<i class="ti-file ">&nbsp;Other File</i>';
				}
				
			}

			$no++;
			$row 	= array(); 
			$row[] 	= $no;
			$row[] 	= $d['title'];
			$row[] 	= $d['position'];
			$row[] 	= @$gambar;
			$row[] 	= $status;
			// $row[] 	= $d['create_date'];
			// $row[] 	= $d['namadepan1'].' '.$d['namabelakang1'];
			// $row[] 	= $d['update_date'];
			// $row[] 	= $d['namadepan2'].' '.$d['namabelakang2'];
			
			// Action 
			$row[] 	=  	"
			<a href='".site_url('back/menu_content/detail/'.$d['content_id'])."' class='btn btn-success btn-sm'><i class='fa fa-eye'></i> Detail </a>
			<a href='".site_url('back/menu_content/edit/'.$d['content_id'])."' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i> Edit </a>
			";

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Menu_content_model->count_all($idMenuDetail),
			"recordsFiltered" => $this->Menu_content_model->count_filtered($idMenuDetail),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}

}
