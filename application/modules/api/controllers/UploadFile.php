<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadFile extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->model('permohonan_model');
    }
	
	public function index()
    {
        echo "<i>Sukses! terhubung ke servis unggah berkas...</i>";
    }
	
	function res($statusHeader, $status, $message, $data)
	{ 
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Access-Control-Allow-Methods: POST, GET'); 
		$this->output->set_header('Access-Control-Allow-Headers: Origin');
		$this->output->set_content_type('application/json');
		$this->output->set_status_header($statusHeader);
		$this->output->set_output(json_encode(array('status' => $status , 'message' =>  $message , 'data' => $data)));
		$this->output->_display();
		exit();
	}
	
	public function unggah_berkas()
	{
		header('Access-Control-Allow-Origin: *');
		/*$posting = $_FILES;
		$param = array('id_permohonan' => $this->input->get()['id_permohonan'], 'body' => $posting);
		echo json_encode($param);
		exit;*/
		
		## get new id order ESDM-PPID/2016/07/15-0002
		/*$tgl = date('Y/m/d');
		$lastData = $this->permohonan_model->getLastNoPermohonan();
		$idOrder = (int)substr($lastData['no_permohonan'],21) + 1;
		$no_permohonan = "ESDM-PPID/".$tgl."-".str_pad($idOrder, 4, "0", STR_PAD_LEFT);*/

		## membuat folder untuk wadah upload file. ESDM-PPID-2016-07-15-0002
		$namaFolder = str_replace('/', '-', $this->input->get()['id_permohonan']);
		mkdir("uploads/".$namaFolder, 0755, true);

		## UNTUK UPLOAD FILE 
		$config = array();
		$config['upload_path']		= './uploads/'.$namaFolder;
		$config['allowed_types']	= '*';
		$config['max_size']			= '0';
		$config['overwrite']		= true;

		$files = $_FILES;
		for($i = 0; $i < count($files['ionfile']['name']); $i++)
		{
			if($files['ionfile']['error'][$i] == 0)
			{
				$_FILES['ionfile']['name']= $files['ionfile']['name'][$i];
				$_FILES['ionfile']['type']= $files['ionfile']['type'][$i];
				$_FILES['ionfile']['tmp_name']= $files['ionfile']['tmp_name'][$i];
				$_FILES['ionfile']['error']= $files['ionfile']['error'][$i];
				$_FILES['ionfile']['size']= $files['ionfile']['size'][$i];

				$ext = pathinfo($_FILES['ionfile']['name'], PATHINFO_EXTENSION);
				$cekPhoto = $_FILES['ionfile']['tmp_name'];

				## random text
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789'); // and any other characters
				shuffle($seed);
				$rand = '';
				foreach(array_rand($seed, 10) as $k)
				{
					$rand .= $seed[$k];
				}
				$file_name= $cDate.'_'.$rand;
				$config['file_name'] = $file_name;
				$uploadFileName = $config['file_name'].".".$ext;
				$this->load->library('upload', $config);

				$this->upload->initialize($config);
				if(!$this->upload->do_upload())
				{
					$salah = $this->upload->display_errors();
					$this->res(400, 0, 'Gagal', $salah);
				}
				else
				{
					//@$file_pendukung .= $uploadFileName.';';
					//@$file_nameasli .= $_FILES['ionfile']['name'].';';
					$insert_data = array(
						'id'	=> $this->input->get()['id_permohonan'],
						'data'	=> array(
							'file_pendukung'	=> $post['file_pendukung'],
							'file_nameasli'		=> $post['file_namaasli']
						)
					);

					$do_insert = $this->permohonan_model->update_permohonan_by_id($insert_data);
					if(@$update)
					{
						$this->res(200, 1, 'Data berhasil di ubah');
					}
					else
					{
						$this->res(400, 0, 'Data tidak berhasil di ubah');
					}
				}
			}
		}
	}
}