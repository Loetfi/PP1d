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
	
	public function unggah_berkas()
	{
		header('Access-Control-Allow-Origin: *');
		$posting = $_FILES;
		echo json_encode($posting);
		exit;
		
		## get new id order ESDM-PPID/2016/07/15-0002
		$tgl = date('Y/m/d');
		$lastData = $this->permohonan_model->getLastNoPermohonan();
		$idOrder = (int)substr($lastData['no_permohonan'],21) + 1;
		$no_permohonan = "ESDM-PPID/".$tgl."-".str_pad($idOrder, 4, "0", STR_PAD_LEFT);

		## membuat folder untuk wadah upload file. ESDM-PPID-2016-07-15-0002
		$namaFolder = str_replace('/','-',$no_permohonan);
		mkdir("uploads/".$namaFolder, 0755, true);

		## UNTUK UPLOAD FILE 
		$config = array();
		$config['upload_path']		= './uploads/'.$namaFolder;
		$config['allowed_types']	= '*';
		$config['max_size']			= '0';
		$config['overwrite']		= true;

		$files = $_FILES;
		for($i=0; $i < count($files['ionfile']['name']); $i++) {
			if($files['ionfile']['error'][$i] == 0) {
				$_FILES['ionfile']['name']= $files['ionfile']['name'][$i];
				$_FILES['ionfile']['type']= $files['ionfile']['type'][$i];
				$_FILES['ionfile']['tmp_name']= $files['ionfile']['tmp_name'][$i];
				$_FILES['ionfile']['error']= $files['ionfile']['error'][$i];
				$_FILES['ionfile']['size']= $files['ionfile']['size'][$i];

				$ext = pathinfo($_FILES['ionfile']['name'], PATHINFO_EXTENSION);
				$cekPhoto = $_FILES['ionfile']['tmp_name'];

				## random text
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
				 .'0123456789'); // and any other characters
				shuffle($seed);
				$rand = '';
				foreach (array_rand($seed, 10) as $k){
					$rand .= $seed[$k];
				}
				$file_name= $cDate.'_'.$rand;
				$config['file_name'] = $file_name;
				$uploadFileName = $config['file_name'].".".$ext;
				$this->load->library('upload', $config);

				$this->upload->initialize($config);
				if (!$this->upload->do_upload()){
					$salah = $this->upload->display_errors();
					print_r($salah);
				} else {
					@$file_pendukung .= $uploadFileName.';';
					@$file_nameasli .= $_FILES['ionfile']['name'].';';
				}
			}
		}
	}
}