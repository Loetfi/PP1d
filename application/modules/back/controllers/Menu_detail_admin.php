<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_detail_admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		$this->load->model('Language_model'); 
		$this->load->model('Menu_detail_admin_model');
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
		$this->load->view('menuadmindetail/index',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
		
	} 



	// keperluan untuk datatable.
	// bisa juga untuk keperluan Aplication Programming Interface
	public function ambildata()
	{
		$list = $this->Menu_detail_admin_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) { 

			$no++;
			$row 	= array();  
			// $row[]	= $d->id_menu_detail;
			$row[] 	= $d->nama_menu_detail;
			$row[]	= $d->nama_menu;   

			// 'id_menu_detail','nama_menu','nama_menu_detail','id_menu'

			//hanya admin
			// if ($this->ion_auth->is_admin()) {	
			// 	$row[] 	= $d->create_date;
			// 	$row[] 	= $d->update_date;
			// 	$row[] 	= $d->namadepan1.''.$d->namabelakang1;
			// 	$row[] 	= $d->namadepan2.''.$d->namabelakang2;
			// }
			// end


			// Action 
			$row[] 	=  	" <a href='".site_url('back/menu_detail_admin/edit/'.$d->id_menu_detail)."' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i> Edit </a> <a href='".site_url('back/menu_detail_admin/delete/'.$d->id_menu_detail)."' class='btn btn-danger btn-sm'  onclick=\"return confirm('Are you sure you want to delete this item?');\"> <i class='fa fa-trash'></i> Hapus </a>"; 
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Menu_detail_admin_model->count_all(),
			"recordsFiltered" => $this->Menu_detail_admin_model->count_filtered(),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}
	// End



	public function add()
	{
		$this->form_validation->set_rules('nama_menu_detail', 'Nama Sub Menu', 'trim|required');  
		$this->form_validation->set_rules('link_menu_detail', 'Link Menu', 'trim|required');
        // EN_judulberita EN_isiberita
		if ($this->form_validation->run() == FALSE) { 
 

			// $this->add(); 
			$data = array(
				'title' => 'Add Menu Admin',
				'data'	=> $this->Menu_detail_admin_model->getMenu()
				);

 		// Tampilan 
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin',$data);
			$this->load->view('front/subkepalaadmin',$data);
			$this->load->view('menuadmindetail/add',$data); // disini bermain
			$this->load->view('front/footeradmin',$data);

		} else {

			$namasubmenu 	= $this->input->post('nama_menu_detail');
			$linkmenu 		= $this->input->post('link_menu_detail');
			$id_menu 		= $this->input->post('id_menu');

			$insert = array(
				'nama_menu_detail' 	=> $namasubmenu, 
				'link_menu_detail'	=> $linkmenu,
				'id_menu'			=> $id_menu
				); 

			$update = $this->Menu_detail_admin_model->insertMenuAdmin($insert); 

			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> Data Berhasil di tambahkan. </div>');

			redirect('back/menu_detail_admin','refresh');

		}
	}



	// Edit
	public function edit($id = '')
	{
		// $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');   

		$this->form_validation->set_rules('nama_menu_detail', 'Nama Sub Menu', 'trim|required');  
		$this->form_validation->set_rules('link_menu_detail', 'Link Menu', 'trim|required');
        // EN_judulberita EN_isiberita
		if ($this->form_validation->run() == FALSE) { 
 

			// $this->add(); 
			$data = array(
				'title' => 'Edit Menu Admin',
				'data'	=> $this->Menu_detail_admin_model->getMenu(),
				'edit' 	=> $this->Menu_detail_admin_model->getMenuAdmin($id),  
				'id'	=> $id
				);

 		// Tampilan 
			$this->load->view('front/kepalaadmin',$data);
			$this->load->view('front/sidebaradmin',$data);
			$this->load->view('front/subkepalaadmin',$data);
			$this->load->view('menuadmindetail/edit',$data); // disini bermain
			$this->load->view('front/footeradmin',$data);

		} else {
 
			$namasubmenu 	= $this->input->post('nama_menu_detail');
			$linkmenu 		= $this->input->post('link_menu_detail');
			$id_menu 		= $this->input->post('id_menu');
			$id_menu_lama	= $this->input->post('id_menu_lama');

			$insert = array(
				'nama_menu_detail' 	=> $namasubmenu, 
				'link_menu_detail'	=> $linkmenu,
				'id_menu'			=> $id_menu
			);

			$where = array('id_menu_detail' => $id);	 
			$update = $this->Menu_detail_admin_model->updateMenuAdmin($insert, $where); 


			// update juga untuk hak akses

			$ganti = array(
				'id_menu' => $id_menu );


		/*	echo "
			Update hakakses set id_menu = '$id_menu' where id_menu = '$id_menu' and id_menu_detail= '$id'
			";*/

// id_menu, id_menu_detail, id_group

			$where = array('id_menu' => $id_menu_lama, 'id_menu_detail' => $id );
			// $this->db->update($ganti, $where); 
			$ganti = $this->Menu_detail_admin_model->updatehakakses($ganti, $where);

			/*select * from hakakses
			where id_menu = '2' and id_menu_detail = '12'*/
			
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> Data Berhasil di Ubah. </div>');

			redirect('back/menu_detail_admin','refresh');

		}
	}

	// delete
	public function delete($id='')
	{
		if (!$this->ion_auth->is_admin())
		{
			//redirect them to the login page
			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> Maaf ini bukan hak akses kamu. </div>');
			redirect('back/dashboard', 'refresh');
		}


		$ambil 	= $this->Menu_detail_admin_model->getMenuAdmin($id); 




		if (isset($id) and $ambil) {

			$dd 	= $ambil->id_menu." || ".$ambil->nama_menu_detail." || ".$ambil->link_menu_detail; 

			$backup = array(
				'namatabel' => 'master_menu_detail_admin',
				'isian'	 	=> $dd,
				'tanggal'	=> date("Y-m-d h:i:s")
				);

			// print_r($backup); 

			// $this->db->insert('Table', $object);


			$this->db->insert('log_system',$backup); 

 
			$this->db->query("DELETE from master_menu_detail_admin where id_menu_detail = '$id' ");
			
			// namatabel, isian, tanggal 

			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> Berhasil Di Hapus. </div>');
		// echo "Oke";
			redirect('back/menu_detail_admin','refresh'); 

		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> Ada yang keliru. </div>');
		// echo "Oke";
		redirect('back/menu_detail_admin','refresh'); 
	}


 
}

/* End of file Menu_detail_admin.php */
/* Location: ./application/modules/back/controllers/Menu_detail_admin.php */