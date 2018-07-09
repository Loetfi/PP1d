<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor extends CI_Controller { 

	var $userid;
	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		$this->load->model('Language_model'); 
		$this->load->model('Kantor_model');
		$this->load->model('Hak_akses_model');

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

	function index(){
		$data = array(
			'listData' 		=> $this->Kantor_model->listKantor(),
			'title'			=> 'Office',
			);
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Kantor/list', $data);
		$this->load->view('front/footeradmin');
	}
	function input(){
		$this->load->library('googlemaps');                
		$config['center'] = '-4.178650, 115.773930';
		$config['zoom'] = '5';
		$config['map_height'] = 600;
		$config['onclick'] = 'alert(\'Lat: \' + event.latLng.lat() + \' | Long:\' + event.latLng.lng());';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		
		$data['listGrup'] = $this->Kantor_model->grupKantor();
		$data['title'] = 'Tambah Kantor';
		$data['action'] = 'back/kantor/input/';
		
		// $data = array(
			// 'listGrup'		=> $this->Kantor_model->grupKantor(),
			// 'title'			=> 'Menu Master',
			// 'action'		=> 'back/kantor/input/',
			// );
		
		$this->form_validation->set_rules('kantor_grup', 'kantor_grup', 'required');
		$this->form_validation->set_rules('kota', 'kota', 'required');
		// $this->form_validation->set_rules('nama_kantor', 'nama_kantor', 'required');
		$this->form_validation->set_rules('tlp', 'tlp', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('lat', 'lat', 'required');
		$this->form_validation->set_rules('long', 'long', 'required');

		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin');
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Kantor/input',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			$kantor_grup = $_POST['kantor_grup'];
			$kota = ucwords(strtolower(trim($_POST['kota'])));
			$nama_kantor = @$_POST['nama_kantor'];
			$alamat = $_POST['alamat'];
			$tlp = $_POST['tlp'];
			$lat = $_POST['lat'];
			$long = $_POST['long'];
			$status = $_POST['status'];
			$dataInsert = array(
				'kantor_grup' 	=> $kantor_grup,
				'kota' => $kota,
				'nama_kantor' => @$nama_kantor,
				'alamat' => $alamat,
				'tlp' => $tlp,
				'lat' => $lat,
				'long' => $long,
				'status' 		=> $status,
				'create_user' 	=> $this->userid,
				'create_date' 	=> date('Y-m-d H:i:s'),
				);
			$insert = $this->Kantor_model->insertKantor($dataInsert);
			
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/kantor');
			// print_r(@$_POST);
		}
		
	}
	function edit($id){
		$this->load->library('googlemaps');                
		$config['center'] = '-4.178650, 115.773930';
		$config['zoom'] = '5';
		$config['map_height'] = 600;
		$config['onclick'] = 'alert(\'Lat: \' + event.latLng.lat() + \' | Long:\' + event.latLng.lng());';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();
		
		$detail = $this->Kantor_model->detailKantor($id);
		$data['listGrup'] = $this->Kantor_model->grupKantor();
		$data['title'] = $asd;
		$data['detail'] = $detail;
		$data['action'] = 'back/kantor/edit/'.$id;
		// $data = array(
			// 'listGrup'		=> $this->Kantor_model->grupKantor(),
			// 'title'			=> 'Edit Kantor',
			// 'detail'		=> $detail,
			// 'action'		=> 'back/kantor/edit/'.$id,
			// );
		
		$this->form_validation->set_rules('kantor_grup', 'kantor_grup', 'required');
		$this->form_validation->set_rules('kota', 'kota', 'required');
		// $this->form_validation->set_rules('nama_kantor', 'nama_kantor', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('tlp', 'tlp', 'required');
		$this->form_validation->set_rules('lat', 'lat', 'required');
		$this->form_validation->set_rules('long', 'long', 'required');

		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin');
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Kantor/input',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			$id_kantor = $_POST['id_kantor'];
			$kantor_grup = $_POST['kantor_grup'];
			$kota = ucwords(strtolower(trim($_POST['kota'])));
			$nama_kantor = @$_POST['nama_kantor'];
			$tlp = $_POST['tlp'];
			$alamat = $_POST['alamat'];
			$lat = $_POST['lat'];
			$long = $_POST['long'];
			$status = $_POST['status'];
			
			$dataUpdate = array(
				'kantor_grup' => $kantor_grup,
				'kota' => $kota,
				'nama_kantor' => @$nama_kantor,
				'tlp' => $tlp,
				'alamat' => $alamat,
				'lat' => $lat,
				'long' => $long,
				'status' => $status,
				'update_user' => $this->userid, // @$update_user,
				'update_date' => date('Y-m-d H:i:s'),
				);
			$whereUpdate = array('id_kantor' => $id_kantor);
			$update = $this->Kantor_model->updateKantor($dataUpdate, $whereUpdate);
			
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/kantor');
			// print_r(@$_POST);
		}
		
	}
	function edit_old($id){
		
		
		$detail = $this->Menu_model->detailMenu($id);
		foreach($detail as $row){
			$detail['menu_name_'.$row['language_id']] = $row['menu_name'];
			$detail['status'] = $row['status'];
			$detail['position'] = $row['position'];
		}
		$detail['menu_id'] = $id;
		
		$data = array(
			'listLanguage' => $this->Language_model->listLanguage(array('status' => 1)),
			'detail' => $detail,
			);
		
		$this->form_validation->set_rules('position', 'position', 'required');
		foreach($data['listLanguage'] as $row)
			$this->form_validation->set_rules('menu_name_'.$row['language_id'], 'menu_name_'.$row['language_id'], 'required');

		if ($this->form_validation->run() == FALSE){
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin');
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Menu/edit',$data);
			$this->load->view('front/footeradmin');
		}
		else {
			
			// print_r(@$_POST);
			
			$menu_id = $_POST['menu_id'];
			$position = $_POST['position'];
			$status = $_POST['status'];
			foreach($data['listLanguage'] as $row){
				$menu_name = $_POST['menu_name_'.$row['language_id']];
				$language_id = $row['language_id'];
				
				$dataUpdate = array(
					'menu_name' => $menu_name,
					'position' => $position,
					'status' => $status,
					'update_user' => @$update_user,
					'update_date' => @$update_date,
					);
				$whereUpdate = array('menu_id' => $menu_id, 'language_id' => $language_id);
				$update = $this->Menu_model->updateMenu($dataUpdate, $whereUpdate);
			}
			
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/menu');
		}
		
	}
	
	function ambildata(){
		$listData = $this->Menu_model->get_datatables();
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
			$row[] 	= $d['position'];
			$row[] 	= $status;
			$row[] 	= $d['create_date'];
			$row[] 	= $d['namadepan1'].' '.$d['namabelakang1'];
			$row[] 	= $d['update_date'];
			$row[] 	= $d['namadepan2'].' '.$d['namabelakang2'];
			
			// Action 
			$row[] 	=  	"<a href='".site_url('back/menu/edit/'.$d['menu_id'])."' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i> Edit </a> 
			<a href='".site_url('back/menu/delete/'.$d['menu_id'])."' class='btn btn-danger btn-sm'  onclick=\"return confirm('Are you sure you want to delete this item?');\"> <i class='fa fa-trash'></i> Hapus </a>";

			//anchor('back/category/edit/'.$d->category_id, '<i class="fa fa-pencil"></i> Edit','class="btn btn-primary"')." oke ".anchor('back/category/delete/'.$row->category_id, '<i class="fa fa-trash"></i> Hapus', 'data-confirm="Apakah kamu ingin menghapusnya ?" class="btn btn-danger"'); 
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Menu_model->count_all(),
			"recordsFiltered" => $this->Menu_model->count_filtered(),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}
	
	function grup(){
		$data = array(
			'title'			=> 'Group Office',
			'listData'		=> $this->Kantor_model->grupKantor(),
			);
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Kantor/grup', $data);
		$this->load->view('front/footeradmin');
	}
	function grup_input(){
		$data = array(
			'title'			=> 'Input Group Office',
			);

		$this->form_validation->set_rules('nama_grup', 'Group Office Name', 'required');
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Kantor/grupInput', $data);
			$this->load->view('front/footeradmin');
		}
		else{
			$nama_grup = $_POST['nama_grup'];
			$status = $_POST['status'];
			$dataInsert = array(
				'nama_grup' => $nama_grup,
				'status' => $status,
				'create_user' 	=> @$create_user,
				'create_date' 	=> @$create_date,
				);
			$insert = $this->Kantor_model->insertGrup($dataInsert);
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/kantor/grup');
		}
	}
	function grup_edit($id){
		$data = array(
			'title'			=> 'Edit Group Office',
			'detail'			=> $this->Kantor_model->detailGrupKantor($id),
			);

		$this->form_validation->set_rules('nama_grup', 'Group Office Name', 'required');
		if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
			
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin');
			$this->load->view('front/subkepalaadmin');
			$this->load->view('Kantor/grupEdit', $data);
			$this->load->view('front/footeradmin');
		}
		else{
			$id = $_POST['id'];
			$nama_grup = $_POST['nama_grup'];
			$status = $_POST['status'];
			$dataUpdate = array(
				'nama_grup' => $nama_grup,
				'status' => $status,
				'update_user' => @$update_user,
				'update_date' => @$update_date,
				);
			$whereUpdate = array('id' => $id);
			$update = $this->Kantor_model->updateGrup($dataUpdate, $whereUpdate);
			
			$this->session->set_flashdata('itemFlashData','insertSukses');
			redirect('back/kantor/grup');
		}
	}

	function grup_delete($id='')
	{
		redirect('back/kantor/','refresh');
	}
	
	
	function coba(){
		$this->load->library('googlemaps');                
		$config['center'] = '-6.149745897492707, 106.88505291938782';
		$config['zoom'] = '16';
		$this->googlemaps->initialize($config);
		
		$arrKota = array();
		$arrKotaGrup = array();
		$listKantor = $this->Kantor_model->listKantor();
		foreach($listKantor as $row){
			$kota = $row['kota'];
			$nama_grup = $row['nama_grup'];
			$kantor_grup = $row['kantor_grup'];
			
			if (!in_array($kota, $arrKota)) {
				$arrKota[] = $kota;
				$arrKotaGrup[$kota]['nama'][] = $nama_grup;
				$arrKotaGrup[$kota]['id'][] = $kantor_grup;
			}
			else{
				if (!in_array($nama_grup, $arrKotaGrup[$kota])) {
					$arrKotaGrup[$kota]['nama'][] = $nama_grup;
					$arrKotaGrup[$kota]['id'][] = $kantor_grup;
				}
			}
			
			$marker = array();
			$marker['position'] = $row['lat'].', '.$row['long'];
			$marker['infowindow_content'] = $row['nama_kantor'];
			$this->googlemaps->add_marker($marker);
			
		}
		
		// $marker = array();
		// $marker['infowindow_content'] = "sanusi";
		// $marker['position'] = '-6.138762676538779, 106.84401512145996';
		// $this->googlemaps->add_marker($marker);
		
		$data['arrKota'] = $arrKota;
		$data['arrKotaGrup'] = $arrKotaGrup;
		$data['listKantor'] = $listKantor;
		
		// $marker = array();
		// $marker['position'] = '-6.1586461802876435, 106.7937183380127';
		// $this->googlemaps->add_marker($marker);
		
		$data['map'] = $this->googlemaps->create_map();
		
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin');
		$this->load->view('front/subkepalaadmin');
		$this->load->view('Kantor/dashboard', $data);
		$this->load->view('front/footeradmin');
	}









	// Contact Form
	public function contact_form()
	{
		$data = array(
			'title' 	=> 'Contact Form Management',
			// 'newsMenu' 	=> 'active'
			);

 		// Tampilan
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
		$this->load->view('Contact_form/contactindex',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
	}

	// View
	public function contact_view($id='')
	{
		$q = $this->db->query("
			SELECT * from view_contact_form a
			where id ='$id'")->row();
		
		$data = array(
			'title' 	=> 'Detail Contact Form Management',
			'q'			=> $q
			// 'newsMenu' 	=> 'active'
			);



 		// Tampilan
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
		$this->load->view('Contact_form/contactview',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
	}

	// keperluan untuk datatable.
	// bisa juga untuk keperluan Aplication Programming Interface
	public function contact_ambildata()
	{
		$list = $this->Kantor_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) {  
			$no++;
			$row 	= array();
			$row[]	= $d->nama;
			$row[]	= $d->email; 
			$row[]	= $d->telepon; 
			$row[]	= $d->namapekerjaan;  
			$row[]	= $d->perusahaan; 
			$row[]	= $d->namakategori; 
			$row[]	= $d->subjek; 
			$row[]  = "<a href='".site_url('back/kantor/contact_view/'.$d->id)."' class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View </a>"; 

			// end

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Kantor_model->count_all(),
			"recordsFiltered" => $this->Kantor_model->count_filtered(),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}
	// End
}
