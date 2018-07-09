<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		$this->load->model('Language_model'); 
		$this->load->model('Menu_admin_model');
		$this->load->model('Settings_model');
		$this->load->model('News_model');

		$this->load->model('Hak_akses_model');

			###############################
		## END Cek Hak Akses
		/*if (!$this->ion_auth->logged_in()){
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
		}*/
		## END Cek Hak Akses
		###############################
	}



	// Index 
	public function index()
	{

		


		$data = array(
			'title' 	=> 'Setting Menu Admin', 
			);

		


 		// Tampilan 
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
		$this->load->view('menuadmin/menuadmin_index',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
		
	} 



	// keperluan untuk datatable.
	// bisa juga untuk keperluan Aplication Programming Interface
	public function ambildata()
	{



		$list = $this->Menu_admin_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) { 

			$no++;
			$row 	= array();  
			$row[] 	= $d->id_menu;
			$row[]	= $d->nama_menu;  

			//hanya admin
			// if ($this->ion_auth->is_admin()) {	
			// 	$row[] 	= $d->create_date;
			// 	$row[] 	= $d->update_date;
			// 	$row[] 	= $d->namadepan1.''.$d->namabelakang1;
			// 	$row[] 	= $d->namadepan2.''.$d->namabelakang2;
			// }
			// end


			// Action 
			$row[] 	=  	" <a href='".site_url('back/menu_admin/edit/'.$d->id_menu)."' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i> Edit </a> <a href='".site_url('back/menu_admin/delete/'.$d->id_menu)."' class='btn btn-danger btn-sm'  onclick=\"return confirm('Are you sure you want to delete this item?');\"> <i class='fa fa-trash'></i> Hapus </a>

			"; 
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Menu_admin_model->count_all(),
			"recordsFiltered" => $this->Menu_admin_model->count_filtered(),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}
	// End



	public function add()
	{ 


		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');  
        // EN_judulberita EN_isiberita
		if ($this->form_validation->run() == FALSE) { 


			// $this->add(); 
			$data = array(
				'title' => 'Add Menu Admin',
				);




 		// Tampilan 
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin',$data);
			$this->load->view('front/subkepalaadmin',$data);
			$this->load->view('menuadmin/add',$data); // disini bermain
			$this->load->view('front/footeradmin',$data);

		} else {

			$namamenu = $this->input->post('nama_menu');

			$insert = array(
				'nama_menu' 	=> $namamenu, 
				); 
			$update = $this->Menu_admin_model->insertMenuAdmin($insert); 

			$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Data Berhasil di tambahkan. </div>');

			redirect('back/menu_admin','refresh');

		}
	}




	public function edit($id = '')
	{ 

		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');  
        // EN_judulberita EN_isiberita
		if ($this->form_validation->run() == FALSE) { 

			$this->session->set_flashdata('message','<div class="alert alert-warning"> </div>');

			// $this->add(); 
			$data = array(
				'title' 	=> 'Edit Menu Admin',
				'data' 		=> $this->Menu_admin_model->getMenuAdmin($id), 
				'id'		=> $id,
				'setting'	=> $this->Settings_model->getSetting()
				);



 		// Tampilan 
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin',$data);
			$this->load->view('front/subkepalaadmin',$data);
			$this->load->view('menuadmin/edit',$data); // disini bermain
			$this->load->view('front/footeradmin',$data);

		} else {

			$namamenu 	= $this->input->post('nama_menu');
			$id_website = $this->input->post('id_website');

			$insert = array(
				'nama_menu' 	=> $namamenu, 
				'id_website'	=> $id_website
				);

			$where = array('id_menu' => $id);	 
			$update = $this->Menu_admin_model->updateMenuAdmin($insert, $where); 
			
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Data Berhasil di Ubah. </div>');

			redirect('back/menu_admin','refresh');

		}
	}

	// delete
	public function delete($id='')
	{ 


		if (!$this->ion_auth->is_admin())
		{
			//redirect them to the login page
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Maaf ini bukan hak akses kamu. </div>');
			redirect('back/dashboard', 'refresh');
		}


		$ambil 	= $this->Menu_admin_model->getMenuAdmin($id); 




		if (isset($id) and $ambil) {

			$dd 	= $ambil->id_menu." || ".$ambil->nama_menu; 

			$backup = array(
				'namatabel' => 'master_menu_admin',
				'isian'	 	=> $dd,
				'tanggal'	=> date("Y-m-d h:i:s")
				);

			// print_r($backup); 

			// $this->db->insert('Table', $object);


			$this->db->insert('log_system',$backup); 


			// $this->db->query("INSERT INTO master_menu_admin (namatabel, isian, tanggal) values ('master_menu_admin','')  ") 
			$this->db->query("DELETE from master_menu_admin where id_menu = '$id' ");
			
			// namatabel, isian, tanggal 

			$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Berhasil Di Hapus. </div>');
		// echo "Oke";
			redirect('back/menu_admin/','refresh');

		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> Ada yang keliru. </div>');
		// echo "Oke";
		redirect('back/menu_admin/','refresh');
	}




	public function logikasidebar()
	{


		$user = $this->ion_auth->user()->row();
		$userid = $user->id; 
		$grup = $this->db->query("SELECT group_id from users_groups where user_id = '$userid'")->row(); 
		$grup =  $grup->group_id; 
		$menu = $this->db->query("SELECT a.id_menu, a.nama_menu  FROM master_menu_admin a  inner join hakakses b on a.id_menu = b.id_menu where b.id_group = '$grup' group by a.id_menu, nama_menu")->result();  

		foreach ($menu as $m) {
			echo $m->nama_menu;
			$idmenu = $m->id_menu;

			$menu_detail = $this->db->query("SELECT b.*, c.* from hakakses a
				inner join master_menu_admin b on a.id_menu = b.id_menu
				inner join master_menu_detail_admin c on a.id_menu_detail = c.id_menu_detail
				where a.id_group = '$grup'  and a.id_menu = '$idmenu'")->result(); 

			foreach ($menu_detail as $md) {
				echo "<a href='".site_url($md->link_menu_detail)."'>".$md->nama_menu_detail." </a> ";
			}
		}


		// $this->db->query("");
	}

}

/* End of file Menu_admin.php */
/* Location: ./application/modules/back/controllers/Menu_admin.php */