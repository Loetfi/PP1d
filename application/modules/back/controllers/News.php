<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	var $userid;


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


	public function index()
	{

		$data = array(
			'title' 	=> 'News',
			// 'newsMenu' 	=> 'active'
			);

 		// Tampilan
		$this->load->view('front/kepalaadmin',$data);
		$this->load->view('front/sidebaradmin',$data);
		$this->load->view('front/subkepalaadmin',$data);
		$this->load->view('News/newsindex',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);

	}
	


	// keperluan untuk datatable.
	// bisa juga untuk keperluan Aplication Programming Interface
	public function ambildata()
	{
		$list = $this->News_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $d) {
			$status  = $d->status;
			// If Status
			if ($status == '1') {
				$status = "<a class='btn btn-primary btn-xs disabled'> Aktif </a>";
			} else { $status = "<a class='btn btn-default btn-xs disabled'> Tidak Aktif </a>"; }
			// End Status

			$no++;
			$row 	= array();
			$row[] 	= $d->judul;
			$row[] 	= $status;
			$row[] 	= date('d F Y h:i:s',strtotime($d->datepost));
			$row[]	= $d->category_name;
            $row[]	= $d->relasi;
 			// $row[]	= $d->namabu; 


			// Action
			// 'news/'.date('Y',strtotime($n->datepost)).'/'.date('m',strtotime($n->datepost)).'/'.$n->slug
            $row[] 	=  	"
            <a href='".site_url('news/'.date('Y',strtotime($d->datepost)).'/'.date('m',strtotime($d->datepost)).'/'.$d->slug)."' class='btn btn-primary btn-xs' target='_blank'><i class='fa fa-eye'></i> View </a>

            <a href='".site_url('back/news/edit/'.$d->id)."' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit </a> <a href='".site_url('back/news/delete/'.$d->id)."' class='btn btn-danger btn-xs'  onclick=\"return confirm('Are you sure you want to delete this item?');\"> <i class='fa fa-trash'></i> Hapus </a>

            ";
            $data[] = $row;
        }

        $output = array(
         "draw" => $_POST['draw'],
         "recordsTotal" => $this->News_model->count_all(),
         "recordsFiltered" => $this->News_model->count_filtered(),
         "data" => $data,
         );
        //output to json format
        echo json_encode($output);
    } 
	// End




	// fungsi add news
    public function add()
    {
		// array lemparan
      $data = array(
         'title' => 'Add Posting',
         'lang' 	=> $this->News_model->getLangNews(),
         'cat'	=> $this->News_model->getkategori(),
			// 'bu'	=> $this->News_model->getbisnisunit(), 
         'error' => ''

         );

 		// Tampilan
      $this->load->view('front/kepalaadmin',$data);
      $this->load->view('front/sidebaradmin',$data);
      $this->load->view('front/subkepalaadmin',$data);
		$this->load->view('News/newsadd',$data); // disini bermain
		$this->load->view('front/footeradmin',$data);
	}




	// upload photo

	public function proses()
	{

		
		$nmfile 					= md5(time()); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] 		= './uploads/news'; //path folder
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] 		= '2048'; //maksimum besar file 2M
        // $config['min_width']  		= '350'; //lebar maksimum 1288 px
        // $config['min_height']  		= '350'; //tinggi maksimu 768 px
        $config['file_name'] 		= $nmfile; // nama yang terupload nantinya

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        $data['upload_data'] = '';
        $data['error'] = '';


        $this->form_validation->set_rules('judulberita', 'Judul Berita', 'required');
        $this->form_validation->set_rules('tagberita[]', 'Tag Berita', 'required');
        // EN_judulberita EN_isiberita
        if ($this->form_validation->run() == FALSE) {


        	$data['error'] = $this->upload->display_errors('<div class="alert alert-warning">','</div>');

        	$this->add($data);

        } else {



        	if(isset($_FILES['filefoto']['name']))
        	{
        		if ($this->upload->do_upload('filefoto'))
        		{ 

        			$gbr 				= $this->upload->data();
        			$namafile 			= $gbr['file_name'];
        			$user_id 			= $this->session->userdata('user_id');

        		// } else {


        			// nilai setting
        			$dd 			= $this->db->query("SELECT idberita+1 as nilai FROM settings")->row();
        			$idberita 		= $dd->nilai;
        			$this->db->query("UPDATE settings SET idberita = '$idberita'");
 					// end


	        		// Input Berita
        			$judulberita 	= trim($_POST['judulberita']);
        			$isiberita 		= trim($_POST['isiberita']);
	        		// End

	        		// Settingan yang dipake banyak
        			$tglberita 		= date("Y-m-d");
        			$kategori 		= trim($_POST['kategori']);
        			$parent			= $_POST['parent'];
        			$status 		= trim($_POST['status']);


        			// tagberita

        			$tagberitaPost 		= $_POST['tagberita'];
        			for ($i=0; $i < count($tagberitaPost) ; $i++) { 
        				@$tagberita .= $tagberitaPost[$i].",";
        			}
        			$tagberita = substr($tagberita,0,-1);


        			$slugberita 	= slug($judulberita);

	        		// Input berita bahasa inggris
        			$enjudulberita	= '0';
        			$enisiberita	= '0';


        			// Session
        			$user 			= $this->ion_auth->user()->row();
        			$iduser 		= $user->id;
        			$create_date	= date("Y-m-d h:i:s");


        			// $bu 			= $_POST['bisnisunit'];

	        		// input pertama

        			$insertID = array(
        				'id' 			=> $idberita,
        				'datepost' 		=> $tglberita,
        				'title' 		=> $judulberita,
        				'slug' 			=> $slugberita,
        				'content' 		=> $isiberita,
        				'gambar' 		=> $namafile,
        				'category_id' 	=> $kategori,
        				'parent_id'		=> $parent,
        				'status' 		=> $status,
        				'language_id' 	=> 1,
        				'create_user' 	=> $iduser,
        				'create_date' 	=> $create_date,
        				// 'id_bu'			=> $bu,
        				'tagberita'		=> $tagberita
        				);
        			$this->db->insert('news_content', $insertID); 

        			$insertEN = array(
        				'id' 			=> $idberita,
        				'datepost' 		=> $tglberita,
        				'title' 		=> $enjudulberita,
        				'slug' 			=> $slugberita,
        				'content' 		=> $enisiberita,
        				'gambar' 		=> $namafile,
        				'category_id' 	=> $kategori,
        				'parent_id'		=> $parent,
        				'status' 		=> $status,
        				'language_id' 	=> 2,
        				'create_user' 	=> $iduser,
        				'create_date' 	=> $create_date,
        				// 'id_bu'			=> $bu,
        				'tagberita'		=> $tagberita
        				);
        			$this->db->insert('news_content', $insertEN); 
					// Memberikan pemberitahuan Berhasil
        			$this->session->set_flashdata('pesan', '<div class="alert alert-success"> Berita Berhasil di Posting. </div>');

        			// echo "Berhasil";
        			redirect('back/news/','refresh'); 


        		} else {

        								// $salah = $this->upload->display_errors();

        			/* menampilkan pesan error ketika file upload gagal / belum terpilih */
        			// $data['error'] = $this->upload->display_errors('<div class="alert alert-warning">','</div>');

        			// ";
        			// echo $this->upload->display_errors();  

        			$data = array(
        				'title' => 'Add Posting',
        				'lang' 	=> $this->News_model->getLangNews(),
        				'cat'	=> $this->News_model->getkategori(),
        				'error' => $this->upload->display_errors('<div class="alert alert-warning">','</div>')//''

        				);

 		// Tampilan
        			$this->load->view('front/kepalaadmin',$data);
        			$this->load->view('front/sidebaradmin',$data);
        			$this->load->view('front/subkepalaadmin',$data);
					$this->load->view('News/newsadd',$data); // disini bermain
					$this->load->view('front/footeradmin',$data);
        			//tambahkan
        			// $this->add($data);


				}

        	} // end form validation

        }




        // End

    }
    // end 


    public function edit($id = '')
    {

		$nmfile = md5(time()); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] 		= './uploads/news'; //path folder
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] 		= '2048'; //maksimum besar file 2M
        $config['file_name'] 		= $nmfile; // nama yang terupload nantinya

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        $data['upload_data'] 		= '';
        $data['error'] 				= '';


        $this->form_validation->set_rules('judulberita', 'Judul Berita', 'required'); 
        // EN_judulberita EN_isiberita
        if ($this->form_validation->run() == FALSE) {

        	$this->session->set_flashdata('pesan','<div class="alert alert-warning"> </div>');

        	// $this->add();
        	$idn = $this->db->query("SELECT * from news_content where id = '$id' and language_id = '1'")->row_array();
        	$eng = $this->db->query("SELECT * from news_content where id = '$id' and language_id = '2'")->row_array();


        	$data = array(
        		'title' => 'Edit News' ,
        		'idn'	=> $idn,
        		'eng'	=> $eng,
        		'cat'	=> $this->News_model->getkategori(), 
        		);

        	$this->load->view('front/kepalaadmin',$data);
        	$this->load->view('front/sidebaradmin',$data);
        	$this->load->view('front/subkepalaadmin',$data);
			$this->load->view('News/news_edit',$data); // disini bermain 
			$this->load->view('front/footeradmin',$data);

		} else { 

			$user_id 		= $this->session->userdata('user_id');

			$dd 			= $this->db->query("SELECT idberita+1 as nilai FROM settings")->row();
			$idberita 		= $dd->nilai;
			$this->db->query("UPDATE settings SET idberita = '$idberita'");
 					// end

	        		// Input Berita
			$judulberita 	= trim($_POST['judulberita']);
			$isiberita 		= trim($_POST['isiberita']);
	        		// End

	        		// Settingan yang dipake banyak
			$tglberita 		= date("Y-m-d");
			$kategori 		= trim($_POST['kategori']);
			$parent 		= trim($_POST['parent']);
			$status 		= trim($_POST['status']);

			$slugberita 	= slug($judulberita);

	        		// Input berita bahasa inggris
			$enjudulberita	= '0';//$_POST['EN_judulberita'];
			$enisiberita	= '0';//$_POST['EN_isiberita'];


        			// Session
			$user 			= $this->ion_auth->user()->row();
			$iduser 		= $user->id;
			$update_date	= date("Y-m-d h:i:s");

			// $bisnisunit		= $_POST['bisnisunit'];

			//Tag Berita
			$tagberitaPost 		= $_POST['tagberita'];
			for ($i=0; $i < count($tagberitaPost) ; $i++) { 
				@$tagberita .= $tagberitaPost[$i].",";
			}
			$tagberita = substr($tagberita,0,-1);



			if ($this->upload->do_upload('filefoto'))
			{
				$gbr 				= $this->upload->data();
				$namafile 			= $gbr['file_name'];
 
				$updateID = array(
					'title' 		=> $judulberita,
					'gambar' 		=> $namafile,
					'content' 		=> $isiberita,
					'category_id' 	=> $kategori,
					'parent_id'		=> $parent,
					'status' 		=> $status,
					'update_user' 	=> $iduser,
					'update_date' 	=> $update_date,
					// 'id_bu'			=>	$bisnisunit,
					'tagberita'		=> $tagberita
					);
				$this->db->where('id', $id);
				$this->db->where('language_id', 1);
				$this->db->update('news_content', $updateID); 


					$updateEN = array(
						'title' 		=> $enjudulberita,
						'gambar' 		=> $namafile,
						'content' 		=> $enisiberita,
						'category_id' 	=> $kategori,
						'parent_id'		=> $parent,
						'status' 		=> $status,
						'update_user' 	=> $iduser,
						'update_date' 	=> $update_date,
						// 'id_bu'			=>	$bisnisunit,
						'tagberita'		=> $tagberita
						);
					$this->db->where('id', $id);
					$this->db->where('language_id', 2);
					$this->db->update('news_content', $updateEN); 

					// Memberikan pemberitahuan Berhasil
                  $this->session->set_flashdata('pesan', '<div class="alert alert-info"> Berita Berhasil di Rubah.  </div>');

        			// echo "Berhasil";
                  redirect('back/news/','refresh');


        		// redirect(site_url('akun/posts/'),'refresh');

              } else { 

                  $updateID = array(
                     'title' 		=> $judulberita, 
                     'content' 		=> $isiberita,
                     'category_id' 	=> $kategori,
                     'parent_id'		=> $parent,
                     'status' 		=> $status,
                     'update_user' 	=> $iduser,
                     'update_date' 	=> $update_date,
							// 'id_bu'			=>	$bisnisunit,
                     'tagberita'		=> $tagberita
                     );
                  $this->db->where('id', $id);
                  $this->db->where('language_id', 1);
                  $this->db->update('news_content', $updateID); 

                  $updateEN = array(
                      'title' 		=> $enjudulberita, 
                      'content' 		=> $enisiberita,
                      'category_id' 	=> $kategori,
                      'parent_id'		=> $parent,
                      'status' 		=> $status,
                      'update_user' 	=> $iduser,
                      'update_date' 	=> $update_date,
						// 'id_bu'			=>	$bisnisunit,
                      'tagberita'		=> $tagberita
                      );
                  $this->db->where('id', $id);
                  $this->db->where('language_id', 2);
                  $this->db->update('news_content', $updateEN); 

					// Memberikan pemberitahuan Berhasil
                  $this->session->set_flashdata('pesan', '<div class="alert alert-info"> Berita Berhasil di Ubah.  </div>');  
                  redirect('back/news/','refresh');


              } 

          }



      }

	// Edit Proses
      public function editprosesIDs($idberita ='')
      { 


          $judulberita 	= trim($_POST['judulberita']);
          $isiberita 		= trim($_POST['isiberita']);
	        		// End

	        		// Settingan yang dipake banyak
          $tglberita 		= date("Y-m-d");
          $kategori 		= trim($_POST['kategori']);
          $status 		= trim($_POST['status']);

          $slugberita 	= slug($judulberita);

	        		// Input berita bahasa inggris
          $enjudulberita	= $_POST['EN_judulberita'];
          $enisiberita	= $_POST['EN_isiberita'];


	        		// input pertama
          echo ("INSERT into news_content (id, datepost, title, slug, content, gambar, category_id, status, language_id ) values ('$idberita','$tglberita','$judulberita', '$slugberita' ,'$isiberita' , '$namafile','$kategori', '$status','1')");
	        		// end input pertama

	        		// input kedua
          echo ("INSERT into news_content (id, datepost, title, slug, content, gambar, category_id, status, language_id ) values ('$idberita','$tglberita','$enjudulberita', '$slugberita' ,'$enisiberita' , '$namafile','$kategori', '$status','2')");
	        		// end input kedua

					// Memberikan pemberitahuan Berhasil
          $this->session->set_flashdata('pesan', '<div class="alert alert-info"> Berita Berhasil di Posting.  </div>');

          echo "Berhasil";

      }


	// edit proses ID
      public function editprosesID($idberita)
      {


          if (!$_POST) {
             redirect('back/news','refresh');
         }

		$nmfile = md5(time()); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './uploads/news'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['file_name'] = $nmfile; // nama yang terupload nantinya

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        $data['upload_data'] 	= '';
        $data['error'] 			= '';


        // $this->form_validation->set_rules('title', 'Judul Berita', 'required');
        // $this->form_validation->set_rules('EN_judulberita', 'Judul Berita Bahasa Inggris', 'required');
        // $this->form_validation->set_rules('EN_isiberita', 'Isi Berita Bahasa Inggris', 'required');
        // EN_judulberita EN_isiberita
       /* if ($this->form_validation->run() == FALSE) {

        	$this->session->set_flashdata('message','<div class="alert alert-warning"> </div>');

        	echo "gagal";
        	// $this->edit();

        } else {*/
        //



        	// if(isset($_FILES['filefoto']['name']))
        	// {
        	// 	if ($this->upload->do_upload('filefoto'))
        	// 	{

        	$gbr 				= $this->upload->data();
        	$namafile 			= $gbr['file_name'];
        	$user_id 			= $this->session->userdata('user_id');

        		// } else {


        			// nilai setting
        	$dd 			= $this->db->query("SELECT idberita+1 as nilai FROM settings")->row();
        	$idberita 		= $dd->nilai;
        	$this->db->query("UPDATE settings SET idberita = '$idberita'");
 					// end


	        		// Input Berita
        	$judulberita 	= trim($_POST['judulberita']);
        	$isiberita 		= trim($_POST['isiberita']);
	        		// End

	        		// Settingan yang dipake banyak
        	$tglberita 		= date("Y-m-d");
        	$kategori 		= trim($_POST['kategori']);
        	$status 		= trim($_POST['status']);

        	$slugberita 	= slug($judulberita);

	        		// Input berita bahasa inggris
        	$enjudulberita	= $_POST['EN_judulberita'];
        	$enisiberita	= $_POST['EN_isiberita'];


	        		// input pertama
        	echo ("INSERT into news_content (id, datepost, title, slug, content, gambar, category_id, status, language_id ) values ('$idberita','$tglberita','$judulberita', '$slugberita' ,'$isiberita' , '$namafile','$kategori', '$status','1')");
	        		// end input pertama

	        		// input kedua
        	echo ("INSERT into news_content (id, datepost, title, slug, content, gambar, category_id, status, language_id ) values ('$idberita','$tglberita','$enjudulberita', '$slugberita' ,'$enisiberita' , '$namafile','$kategori', '$status','2')");
	        		// end input kedua

					// Memberikan pemberitahuan Berhasil
        	$this->session->set_flashdata('pesan', '<div class="alert alert-info"> Berita Berhasil di Posting.  </div>');

        	echo "Berhasil";


        		// redirect(site_url('akun/posts/'),'refresh');

        		// } else {
        		// 	/* menampilkan pesan error ketika file upload gagal / belum terpilih */
        		// 	echo $data['error'] = $this->upload->display_errors('<div class="alert alert-warning">','</div>');
        		// 	$this->add();


        		// }

        	//} // end form validation

        }
	// }




        // Delete

        public function delete($idberita='')
        {
        	if (!$this->ion_auth->is_admin())
        	{
			//redirect them to the login page
        		$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Maaf ini bukan hak akses kamu. </div>');
        		redirect('back/dashboard', 'refresh');
        	}
        	else
        	{

        		$user 		= $this->ion_auth->user()->row();
        		$userid 	= $user->id;
        		$grup 		= $this->db->query("SELECT group_id from users_groups where user_id = '$userid'")->row();
        		$grup 		= $grup->group_id;
        		$ambil 		= $this->db->query("SELECT * from news_content where id = '$idberita'")->row();


        		if (isset($idberita) and $ambil) {

			/*id, category_id, title, datepost, content, slug, status, gambar,
			create_date, update_date, create_user, update_user, language_id*/
			$dd 	= $ambil->id." || ".$ambil->category_id." || ".$ambil->title." || ".$ambil->datepost." || ".$ambil->content." || ".$ambil->slug." || ".$ambil->status." || ".$ambil->gambar." || ".$ambil->create_date." || ".$ambil->update_date." || ".$ambil->create_user." || ".$ambil->update_user." || ".$ambil->language_id;

			$backup = array(
				'namatabel' => 'news_content',
				'isian'	 	=> $dd,
				'tanggal'	=> date("Y-m-d h:i:s")
				);

			$this->db->insert('log_system',$backup);


			$this->db->query("DELETE from news_content where id = '$idberita' ");

			$this->session->set_flashdata('pesan', '<div class="alert alert-warning"> Berhasil Di Hapus. </div>');
			redirect('back/news','refresh');

		}
	}

	$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> Ada yang keliru. </div>');
	redirect('back/news','refresh');

}


function getDetail(){  
	$kota = $_POST['kantor_grup'];
	$listData = $this->News_model->getDetail($kota);
		// echo json_encode(array('dataGrup' =>$listData)); 

	if ($kota == 0) {

     echo '<option value="0"> Pilih Dahulu Kategori</option>';
 } else {
   foreach($listData as $row){ 

     echo '<option value="'.$row->category_id.'">'.$row->category_name.'</option>';
 }
}
}


}

/* End of file News.php */
/* Location: ./application/modules/back/controllers/News.php */
