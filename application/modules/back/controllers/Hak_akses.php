<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hak_akses extends CI_Controller { 

	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation','pagination'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		
		$this->load->model('Language_model'); 
		$this->load->model('Hak_akses_model');

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

		// end
		
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
		$this->load->view('hakakses/index',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
		
	} 



	// keperluan untuk datatable.
	// bisa juga untuk keperluan Aplication Programming Interface
	public function ambildata()
	{
		$list = $this->Hak_akses_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) { 

			$no++;
			$row 	= array();  
			// $row[]	= $d->id_group; 
			$row[] 	= $d->name;
			$row[]	= $d->hitung;


			$row[] 	=  	" 
			<a href='".site_url('back/hak_akses/detail/'.$d->id_group.'?nama='.$d->name)."' class='btn btn-primary btn-sm'><i class='fa fa-eye'></i> Detail </a>
			<a href='".site_url('back/hak_akses/delete/'.$d->id_group.'?nama='.$d->name)."' class='btn btn-danger btn-sm'  onclick=\"return confirm('Are you sure you want to delete this item?');\"> <i class='fa fa-trash'></i> Hapus </a>"; 

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Hak_akses_model->count_all(),
			"recordsFiltered" => $this->Hak_akses_model->count_filtered(),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}
	// End





	// Detail Hak Akses
	public function detail($id = '')
	{ 
		$data = array(
			'title' 	=> 'Detail Hak Akses',  
			'id'		=> $id
			);

 		// Tampilan 
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
		$this->load->view('hakakses/detail',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
		
	} 



	// keperluan untuk datatable.
	// bisa juga untuk keperluan Aplication Programming Interface
	public function ambildatadetail($id = '')
	{
		$list = $this->Hak_akses_model->get_datatables1($id);

		// $this->Hak_akses_model->count_all1($id); 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) { 

			$no++;
			$row 	= array();  
			// $row[]	= $d->id_group; 
			$row[]	= $d->nama_menu_detail;
			$row[]	= $d->link_menu_detail;


			$row[] 	=  	"
			<a href='".site_url('back/hak_akses/delete/'.$d->id_menu.'/'.$d->id_menu_detail.'/'.$id)."' class='btn btn-danger btn-sm'  onclick=\"return confirm('Are you sure you want to delete this item?');\"> <i class='fa fa-trash'></i> Hapus </a>"; 

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Hak_akses_model->count_all1($id),
			"recordsFiltered" => $this->Hak_akses_model->count_filtered1($id),
			"data" => $data,
			);
        //output to json format
		echo json_encode($output);
	}
	// End 


	public function addrole($idgroup = '')
	{

		$detail = $this->db->query("SELECT a.id_menu, a.nama_menu, b.id_menu_detail, b.nama_menu_detail 
			from master_menu_admin a
			inner join master_menu_detail_admin b on a.id_menu = b.id_menu
			where b.id_menu_detail not in(select id_menu_detail from hakakses where id_group = '$idgroup')")->result();


		// $this->form_validation->set_rules('nama_menu_detail', 'Nama Sub Menu', 'trim|required');   
		// $this->form_validation->set_rules('link_menu_detail', 'Link Menu', 'trim|required'); 
        // EN_judulberita EN_isiberita
		// if ($this->form_validation->run() == FALSE) { 


			// $this->add(); 
		$data = array(
			'title' 	=> 'Add Menu', 
			'detail'	=> $detail,
			'id'		=> $idgroup
			);

	 		// Tampilan 
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
			$this->load->view('hakakses/addgruprole',$data); // disini bermain
			$this->load->view('front/footeradmin',$data);

		// } else {

			if ($_POST) {	

				$id_group		= $_POST['id_group'];
				$hakakses 		= explode('-', $_POST['hakakses']);

				$idmenu 		= $hakakses[0];
				$idmenudetail 	= $hakakses[1];

				$insert = array(

					'id_menu'			=> $idmenu, 
					'id_menu_detail'	=> $idmenudetail, 
					'id_group'			=> $id_group 
					); 

				$update = $this->Hak_akses_model->insert($insert); 

				$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Data Berhasil di tambahkan. </div>');

				redirect('back/hak_akses','refresh');  

			}

			if (isset($_GET['id_group']) && isset($_GET['hakakses'])) {	

				$id_group		= $_GET['id_group'];
				$hakakses 		= explode('-', $_GET['hakakses']);

				$idmenu 		= $hakakses[0];
				$idmenudetail 	= $hakakses[1];

				$insert = array(

					'id_menu'			=> $idmenu, 
					'id_menu_detail'	=> $idmenudetail, 
					'id_group'			=> $id_group 
					); 

				$update = $this->Hak_akses_model->insert($insert); 

				$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Data Berhasil di tambahkan. </div>');

				redirect('back/hak_akses','refresh');  

			}
		// }
		}




		public function ambildatatambah($id = '')
		{
			$list = $this->Hak_akses_model->get_datatables2($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $d) { 

				$no++;
				$row 	= array();  
			// $row[]	= $d->id_group; 
				$row[]	= $d->nama_menu;
				$row[]	= $d->nama_menu_detail;

				// 'nama_menu', 'id_menu_detail', 'nama_menu_detail'


				$row[] 	=  	"
				<a href='".site_url('back/hak_akses/addrole?id_group='.$id.'&hakakses='.$d->id_menu.'-'.$d->id_menu_detail)."' class='btn btn-primary btn-sm'  onclick=\"return confirm('Are you sure ?');\"> <i class='fa fa-link'></i> Beri Akses </a>"; 

				$data[] = $row;
			}

			$output = array(
				// "draw" => $_POST['draw'], 
				"recordsTotal" => $this->Hak_akses_model->count_all2($id),
				"recordsFiltered" => $this->Hak_akses_model->count_filtered2($id),
				"data" => $data,
				);
        //output to json format
			echo json_encode($output);
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
					'data'	=> $this->Hak_akses_model->getMenu(),
					'edit' 	=> $this->Hak_akses_model->getMenuAdmin($id),  
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

			$insert = array(
				'nama_menu_detail' 	=> $namasubmenu, 
				'link_menu_detail'	=> $linkmenu,
				'id_menu'			=> $id_menu
				);

			$where = array('id_menu_detail' => $id);	 
			$update = $this->Hak_akses_model->updateMenuAdmin($insert, $where); 
			
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Data Berhasil di Ubah. </div>');

			redirect('back/menu_detail_admin','refresh');

		}
	}

	// delete
	public function delete($idmenu='' , $idmenudetail = '', $id_group='')
	{
		if (!$this->ion_auth->is_admin())
		{ 
			//redirect them to the login page
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Maaf ini bukan hak akses kamu. </div>');
			redirect('back/dashboard', 'refresh');
		}
		else  
		{

			$user 	= $this->ion_auth->user()->row();
			$userid = $user->id; 
			$grup 	= $this->db->query("SELECT group_id from users_groups where user_id = '$id_group'")->row(); 
			$grup 	=  $grup->group_id; 

			$ambil 		= $this->db->query("SELECT * from hakakses where id_menu = '$idmenu' and id_menu_detail = '$idmenudetail' and id_group = '$grup' ")->row();


			if (isset($idmenu) and $ambil) {

				$dd 	= $ambil->id_menu." || ".$ambil->id_menu_detail." || ".$ambil->id_group; 

				$backup = array(
					'namatabel' => 'hakakses',
					'isian'	 	=> $dd,
					'tanggal'	=> date("Y-m-d h:i:s")
					); 

				$this->db->insert('log_system',$backup); 


				$this->db->query("DELETE from hakakses where id_menu = '$idmenu' and id_menu_detail = '$idmenudetail' and id_group = '$grup'"); 

				$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Berhasil Di Hapus. </div>');
				redirect('back/hak_akses','refresh'); 

			}
		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> Ada yang keliru. </div>');
		// echo "Oke";
		redirect('back/hak_akses','refresh'); 

	}

}

/* End of file Hak_akses.php */
/* Location: ./application/modules/back/controllers/Hak_akses.php */