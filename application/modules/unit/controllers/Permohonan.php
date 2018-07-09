<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/** Kode Permohonan
kode permohonan ESDM-PPID/2016/07/15-0002
[kodeInstansi]/[yyyy]/[mm]/[dd]-[dayNo]
**/

/** Tambah Permohonan
Apabila ada orang yang datang secara langsung, dan data yang butuhkan sudah tersedia secara langsung, sehingga admin harus :
- inputkan permohonan tersebut
- verifikasi
- tindak secara mandiri
- langsung balas
**/

/** Detail Permohonan dan tindakan
Di halaman detail, admin bisa sekaligus melakukan tindakan terhadap permohonan tsb, dan juga bisa melihat detail dari setiap pergerakan proses permohonan tsb.
**/

/** Log setiap tindakan permohonan
Pada setiap tindakan, dilakukan insert ke table ppid_permohonan_log
**/

class Permohonan extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('admin/Permohonan_model', 'Permohonan_model');
		$this->load->model('Disposisi_model');
		$this->load->model('auth/User_account_model', 'User_account_model');
        
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        
        $this->breadcrumbs->push('Home', '#');
        $this->breadcrumbs->push('Permohonan', $this->session->userdata('ses_ppid_user_level').'/permohonan');
	}
    
    /** List permohonan dengan kondisi menghitung keterlambatan dan status
    **/
    public function index(){
        $data['title'] = 'List Permohonan';
        $data['page'] = 'Permohonan/list';
        $this->breadcrumbs->push('List', '/');
        
        $data['listData'] = $this->Permohonan_model->list_permohonan();
        $this->load->view('template/tema',$data);
    }
    
    /** Balasan Disposisi dari Admin
    **/
    function disposisi(){
        $no_permohonan = @$_POST['no_permohonan'];
		$cDate = time();
        
        ## validasi upload file
		$fileUpload = 'kosong';
		$files = $_FILES;
		for($i=0; $i < count($files['userfile']['name']); $i++)
			if ($files['userfile']['error'][$i] == 0)
				$fileUpload = 'ada';
		
		if ($fileUpload == 'kosong')
			$this->form_validation->set_rules('fileUpload', 'Document', 'required');
        
        ## validasi balasan disposisi
        $this->form_validation->set_rules('replay', 'Balasan Disposisi', 'required');
        if ($this->form_validation->run() == FALSE){
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashData','insertGagal');
            
            $data['title'] = 'Detail Permohonan';
            $data['subtitle'] = $no_permohonan;
            $data['page'] = 'Permohonan/page_disposisi';
            $data['no_permohonan'] = $no_permohonan;
            
            $this->breadcrumbs->push($no_permohonan, '/');
            
            $data['detail'] = $this->Permohonan_model->detail_permohonan($no_permohonan);
            $data['log'] = $this->Permohonan_model->list_permohonan_log($no_permohonan);
            $data['detailPemohon'] = $this->User_account_model->detailPengguna($data['detail']['id_pengguna']);
            $data['list_disposisi'] = $this->Permohonan_model->list_disposisi_permohonan($no_permohonan);
            
            $this->load->view('template/tema',$data);
        }
        else{
            // print_r($_POST);
            $cDate = time();
            $id_pengguna = $this->session->userdata('ses_ppid_user_id');
            
            $detailPermohonan = $this->Permohonan_model->detail_permohonan($no_permohonan);
            $detailPemohon = $this->User_account_model->detailPengguna($detailPermohonan['id_pengguna']);
            
            ## UNTUK UPLOAD FILE 
			$namaFolder = str_replace('/','-',$no_permohonan);
            $config = array();
			$config['upload_path'] = './uploads/'.$namaFolder;
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['overwrite']     = true;
			
			for($i=0; $i < count($files['userfile']['name']); $i++){
				if ($files['userfile']['error'][$i] == 0){
					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];
					
					$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
					$cekPhoto = $_FILES['userfile']['tmp_name'];
					
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
						@$file_nameasli .= $_FILES['userfile']['name'].';';
					}
				}
			}
			
            ## untuk update status
            $dataUpdate = array(
                'dispos' => 'Balas',
                'mdate' => $cDate,
            );
            $whereUpdate = array('no_permohonan' => $no_permohonan);
            $doUpdatePermohonan = $this->Permohonan_model->update_permohonan($dataUpdate, $whereUpdate);
            
            ## UPDATE Disposisi
            $dataUpdateDispos = array(
				'replay' => $_POST['replay'],
				'file_replay' => $file_pendukung,
				'file_replayasli' => $file_nameasli,
				'status' => 'Balas',
				'mdate' => $cDate,
				'id_admin_unit' => $id_pengguna,
			);
			$whereUpdateDispos = array('no_permohonan' => $no_permohonan, 'unit_tujuan' => $this->session->userdata('ses_ppid_user_unit'));
			$doUpdateDisposisi = $this->Disposisi_model->update_disposisi($dataUpdateDispos, $whereUpdateDispos);
            if ($doUpdatePermohonan && $doUpdateDisposisi){
                ## insert ke log
                $dataInsertLog = array(
                    'no_permohonan' => $no_permohonan,
                    'status' => 'Balas Disposisi',
                    'deskripsi' => 'Permohonan Telah dikirimkan. Silahkan menunggu respon dari kami',
                    'cdate' => $cDate,
                    'id_admin' => $id_pengguna,
                );
                $this->Permohonan_model->insert_permohonan_log($dataInsertLog);
## email
$kepada = $detailPemohon['email'];
$judul = 'Permohonan Informasi No '.$no_permohonan.' PPID Kementerian ESDM';
$isi = "Status permohonan informasi Anda telah berubah:<br>
<b>Jawaban permohonan informasi Anda sudah diterima dari unit.</b><br>
Mohon menunggu untuk dilakukan balasan permohonan Anda dari kami.
<br><br>

Salam Keterbukaan Informasi Publik,<br>
Admin Aplikasi PPID Kementerian ESDM";
$headers_ss  = 'MIME-Version: 1.0' . "\r\n";
$headers_ss .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
$send_email = mail($kepada, $judul, $isi, $headers_ss);
                
                ## berhasil
                redirect(site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/detail/'.$no_permohonan));
            }
            else{
                echo "gagal|".$doUpdatePermohonan."|ss|".$doUpdateDisposisiupdate."|";
            }
            
        }
        
    }
    
    /** Form tambah permohonan
    **/
    function add(){
        $data['title'] = 'Tambah Permohonan';
        $data['page'] = 'admin/Permohonan/add';
        $this->breadcrumbs->push('Add', '/');
        
        $this->form_validation->set_rules('sumber', 'Sumber', 'required');
        $this->form_validation->set_rules('subjek', 'Subjek', 'required');
        $this->form_validation->set_rules('info_req', 'Informasi yang diperlukan', 'required');
        $this->form_validation->set_rules('info_tujuan', 'Tujuan penggunaan informasi', 'required');
        if ($this->form_validation->run() == FALSE){
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashGagal','Harap Melengkapi Form yang Telah Disediakan');
            $this->load->view('template/tema',$data);
        }
        else{
            $cDate = time();
            $id_pengguna = $this->session->userdata('ses_ppid_user_id');
            $role = $this->session->userdata('ses_ppid_user_level');
            $detailPengguna = $this->User_account_model->detailPengguna(@$_POST['user_id']);
            
            ## get new id order ESDM-PPID/2016/07/15-0002
			$tgl = date('Y/m/d');
			$lastData = $this->Permohonan_model->getLastNoPermohonan();
			$idOrder = (int)substr($lastData['no_permohonan'],21) + 1;
			$no_permohonan = "ESDM-PPID/".$tgl."-".str_pad($idOrder, 4, "0", STR_PAD_LEFT);
            
            ## membuat folder untuk wadah upload file. ESDM-PPID-2016-07-15-0002
            $namaFolder = str_replace('/','-',$no_permohonan);
            mkdir("uploads/".$namaFolder, 0755, true);
            
			## UNTUK UPLOAD FILE 
            $config = array();
			$config['upload_path'] = './uploads/'.$namaFolder;
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['overwrite']     = true;
			
			$files = $_FILES;
			for($i=0; $i < count($files['userfile']['name']); $i++){
				if ($files['userfile']['error'][$i] == 0){
					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];
					
					$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
					$cekPhoto = $_FILES['userfile']['tmp_name'];
					
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
						@$file_nameasli .= $_FILES['userfile']['name'].';';
					}
				}
			}
			
            ## INSERT
            $dataInsert = array(
				'no_permohonan' => $no_permohonan,
				'sumber' => $_POST['sumber'],
				'id_pengguna' => $id_pengguna,
				'subjek' => $_POST['subjek'],
				'info_req' => $_POST['info_req'],
				'info_tujuan' => $_POST['info_tujuan'],
				'file_pendukung' => @$file_pendukung,
				'file_nameasli' => @$file_nameasli,
				'status' => 'Pending',
				'cdate' => $cDate,
				'mdate' => $cDate,
				'delay_day' => 0,
			);
            
            $doInsert = $this->Permohonan_model->insert_permohonan($dataInsert);
			if ($doInsert){
				
				## insert ke log
				$dataInsertLog = array(
					'no_permohonan' => $no_permohonan,
					'status' => 'Pending',
					'deskripsi' => 'Permohonan Telah dikirimkan. Silahkan menunggu respon dari kami',
					'cdate' => $cDate,
				);
				$this->Permohonan_model->insert_permohonan_log($dataInsertLog);
				
                ## email
                $kepada = $detailPengguna['email'];
                $judul = 'Permohonan Informasi No '.$no_permohonan.' PPID Kementerian ESDM';
                $isi = "Terima kasih telah melakukan permohonan informasi publik. Permohonan Anda sedang diverifikasi.<br>

Berikut informasi Nomor Registrasi Permohonan Anda:<br>
".$no_permohonan."<br><br>

Salam Keterbukaan Informasi Publik,<br>
Admin Aplikasi PPID Kementerian ESDM";
                $headers_ss  = 'MIME-Version: 1.0' . "\r\n";
                $headers_ss .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // $headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
                $headers_ss .= 'From: dule sundule<noreply@dule-sundule.com>' . "\r\n";
                $send_email = mail($kepada, $judul, $isi, $headers_ss);
				
				$this->session->set_flashdata('itemFlashData','Sukses');
				redirect(site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/detail/'.$no_permohonan));
			}
            else {
                $this->session->set_flashdata('itemFlashGagal','Terdapat Kesalahan Pada Insert/Update Database');
                $this->load->view('template/tema',$data);
            }
            
        }
    }
    
    /** Detail Permohonan
    **/
    function detail($kodeInstansi, $Y, $m, $dayNo){
        $no_permohonan = $kodeInstansi.'/'.$Y.'/'.$m.'/'.$dayNo;
        
        $this->breadcrumbs->push($no_permohonan, '/');
        
        $data = $this->allDetailPermohonan($no_permohonan);
        if ($data['detail']['dispos'] != '')
            $data['page'] = 'Permohonan/page_disposisi';
        $this->load->view('template/tema',$data);
    }
    function allDetailPermohonan($no_permohonan){
        $data['title'] = 'Detail Permohonan';
        $data['subtitle'] = $no_permohonan;
        $data['page'] = 'Permohonan/detail';
        $data['no_permohonan'] = $no_permohonan;
        
        $data['detail'] = $this->Permohonan_model->detail_permohonan($no_permohonan);
		$data['log'] = $this->Permohonan_model->list_permohonan_log($no_permohonan);
		$data['detailPemohon'] = $this->User_account_model->detailPengguna($data['detail']['id_pengguna']);
        $data['detail_disposisi'] = $this->Permohonan_model->detail_disposisi_permohonan($no_permohonan);
		$data['list_disposisi'] = $this->Permohonan_model->list_disposisi_permohonan($no_permohonan);
		$data['balasan'] = $this->Permohonan_model->detail_balasan_permohonan($no_permohonan);
        return $data;
    }
    function downloadFile($path, $filename = NULL){
        $this->load->helper('download');
		$data = file_get_contents(base_url('/uploads/'.$path.'/'.$filename));
		
        ## permohonan
		$namaFileDownload = $filename;
		$thisData = $this->Permohonan_model->search_file_permohonan($filename);
		$file_nameasli = explode(";", $thisData['file_nameasli']);
		$file_pendukung = explode(";", $thisData['file_pendukung']);
		for($i=0; $i<count($file_pendukung); $i++){
			if ($filename == $file_pendukung[$i])
				$namaFileDownload = str_replace(';','',$file_nameasli[$i]);
		}
        
        ## disposisi
        if ($namaFileDownload == $filename){
            $thisData = $this->Permohonan_model->search_file_disposisi($filename);
            $file_nameasli = explode(";", $thisData['file_nameasli']);
            $file_pendukung = explode(";", $thisData['file_pendukung']);
            for($i=0; $i<count($file_pendukung); $i++){
                if ($filename == $file_pendukung[$i])
                    $namaFileDownload = str_replace(';','',$file_nameasli[$i]);
            }
        }
        
        ## balasan disposisi
        if ($namaFileDownload == $filename){
            $thisData = $this->Permohonan_model->search_file_balasan_disposisi($filename);
            $file_nameasli = explode(";", $thisData['file_nameasli']);
            $file_pendukung = explode(";", $thisData['file_pendukung']);
            for($i=0; $i<count($file_pendukung); $i++){
                if ($filename == $file_pendukung[$i])
                    $namaFileDownload = str_replace(';','',$file_nameasli[$i]);
            }
        }
        
        ## balasan permohonan
        if ($namaFileDownload == $filename){
            $thisData = $this->Permohonan_model->search_file_balasan_permohonan($filename);
            $file_nameasli = explode(";", $thisData['file_nameasli']);
            $file_pendukung = explode(";", $thisData['file_pendukung']);
            for($i=0; $i<count($file_pendukung); $i++){
                if ($filename == $file_pendukung[$i])
                    $namaFileDownload = str_replace(';','',$file_nameasli[$i]);
            }
        }
		force_download($namaFileDownload, $data);
    }
    
    /** Hanya sekedar verifikasi dari permohonan saja.
    **/
    function verifikasi(){
		$no_permohonan = $_POST['no_permohonan'];
		$id_admin = $this->session->userdata('ses_ppid_user_id');
		$cDate = time();
		
		## untuk update status
		$dataUpdate = array(
			'status' => 'Verifikasi',
			'vdate' => $cDate,
			'mdate' => $cDate,
		);
		$whereUpdate = array('no_permohonan' => $no_permohonan);
		$doUpdate = $this->Permohonan_model->update_permohonan($dataUpdate, $whereUpdate);
		if ($doUpdate){
			
			## insert ke log
			$dataInsertLog = array(
				'no_permohonan' => $no_permohonan,
				'status' => 'Verifikasi',
				'deskripsi' => 'Permohonan sedang diverifikasi.',
				'cdate' => $cDate,
				'id_admin' => $id_admin,
			);
			$this->Permohonan_model->insert_permohonan_log($dataInsertLog);
            $this->session->set_flashdata('itemFlashData','Update Permohonan Verifikasi, Sukses');
		}
		redirect(site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/detail/'.$no_permohonan));
	}
    
    /** Tindakan secara mandiri
    **/
    function tindakan(){
		$no_permohonan = $_POST['no_permohonan'];
		$tindakan = $_POST['tindakan'];
		if ($tindakan == 'Proses_Mandiri'){
			$this->proses_mandiri($no_permohonan);
		}
		else if ($tindakan == 'Proses_Disposisi'){
			$this->proses_disposisi($no_permohonan);
		}
		else if ($tindakan == 'Tolak'){
		}
	}
    function proses_mandiri($kodePermohonan){
        $no_permohonan = $kodePermohonan;
        $cDate = time();
        $id_pengguna = $this->session->userdata('ses_ppid_user_id');
        
        $detailPermohonan = $this->Permohonan_model->detail_permohonan($no_permohonan);
            $detailPemohon = $this->User_account_model->detailPengguna($detailPermohonan['id_pengguna']);
            ## untuk update status
			$dataUpdate = array(
				'status' => 'Proses',
				'mdate' => $cDate,
				'pdate' => $cDate,
			);
			$whereUpdate = array('no_permohonan' => $no_permohonan);
			$doUpdate = $this->Permohonan_model->update_permohonan($dataUpdate, $whereUpdate);
			if ($doUpdate){
                ## insert ke log
				$dataInsertLog = array(
					'no_permohonan' => $no_permohonan,
					'status' => 'Proses',
					'deskripsi' => 'Permohonan sedang dalam proses tindak lanjut Kami',
					'cdate' => $cDate,
					'id_admin' => $id_pengguna,
				);
				$this->Permohonan_model->insert_permohonan_log($dataInsertLog);
                
                ## email
$kepada = $detailPemohon ['email'];
$judul = 'Permohonan Informasi No '.$no_permohonan.' PPID Kementerian ESDM';
$isi = "Status permohonan informasi Anda telah berubah:<br>
<b>Permohonan informasi Anda sedang dalam proses tindak lanjut kami.</b>
<br><br>

Salam Keterbukaan Informasi Publik,<br>
Admin Aplikasi PPID Kementerian ESDM";
$headers_ss  = 'MIME-Version: 1.0' . "\r\n";
$headers_ss .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
$send_email = mail($kepada, $judul, $isi, $headers_ss);
                
                $this->session->set_flashdata('itemFlashData','Update Permohonan Proses Mandiri, Sukses');
                redirect(site_url($this->session->userdata('ses_ppid_user_level').'/permohonan/detail/'.$no_permohonan));
            }
            else {
				$this->breadcrumbs->push($no_permohonan, '/');
                $this->session->set_flashdata('itemFlashGagal','Terdapat Kesalahan Pada Insert/Update Database');
                $data = $this->allDetailPermohonan($no_permohonan);
                $this->load->view('template',$data);
			}
    }
    
    /** Balasan dari unit ke pengguna.
    Apabila unit yang input, maka balasan pun akan tetap sebagaimana biasanya.
    **/
    function balasPermohonan(){
        $no_permohonan = $_POST['no_permohonan'];
        
        $this->form_validation->set_rules('subjek', 'Judul Balasan Permohonan', 'required');
        $this->form_validation->set_rules('balasan', 'Balasan', 'required');
        
        ## validasi upload file
		$fileUpload = 'kosong';
		$files = $_FILES;
		for($i=0; $i < count($files['userfile']['name']); $i++)
			if ($files['userfile']['error'][$i] == 0)
				$fileUpload = 'ada';
		
		if ($fileUpload == 'kosong')
			$this->form_validation->set_rules('fileUpload', 'Document', 'required');
        
        if ($this->form_validation->run() == FALSE){
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashGagal','Harap Melengkapi Form yang Telah Disediakan');
            
			$this->breadcrumbs->push($no_permohonan, '/');
			$data = $this->allDetailPermohonan($no_permohonan);
			$this->load->view('template',$data);
		}
		else{
            // print_r($_POST);
            // print_r($files);
            
            $cDate = time();
            $id_pengguna = $this->session->userdata('ses_ppid_user_id');
            $role = $this->session->userdata('ses_ppid_user_level');
			
			$detailPermohonan = $this->Permohonan_model->detail_permohonan($no_permohonan);
            $detailPemohon = $this->User_account_model->detailPengguna($detailPermohonan['id_pengguna']);
            
			## UNTUK UPLOAD FILE 
			$namaFolder = str_replace('/','-',$no_permohonan);
            $config = array();
			$config['upload_path'] = './uploads/'.$namaFolder;
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['overwrite']     = true;
			
			for($i=0; $i < count($files['userfile']['name']); $i++){
				if ($files['userfile']['error'][$i] == 0){
					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];
					
					$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
					$cekPhoto = $_FILES['userfile']['tmp_name'];
					
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
						@$file_nameasli .= $_FILES['userfile']['name'].';';
					}
				}
			}
			
            $fileName = @$file_pendukung;
			$fileNameAsli = @$file_nameasli;
			
            ## UNTUK INSERT PEMBALASAN PERMOHONAN
			$dataInsert = array(
				'no_permohonan' => $no_permohonan,
				'id_admin' => $id_pengguna,
				'subjek' => @$_POST['subjek'],
				'balasan' => @$_POST['balasan'],
				'file_pendukung' => $fileName,
				'file_nameasli' => $fileNameAsli,
				'cdate' => $cDate,
				'mdate' => $cDate,
			);
            $doInsert = $this->Permohonan_model->insert_balasan_permohonan($dataInsert);
			if ($doInsert){
                ## untuk update status
                $dataUpdate = array(
					'status' => 'Selesai',
					'mdate' => $cDate,
				);
                $whereUpdate = array('no_permohonan' => $no_permohonan);
                $doUpdate = $this->Permohonan_model->update_permohonan($dataUpdate, $whereUpdate);
                
                ## insert ke log
				$dataInsertLog = array(
					'no_permohonan' => $no_permohonan,
					'status' => 'Selesai',
                    'deskripsi' => 'Proses tindak lanjut permohonan Selesai',
					'cdate' => $cDate,
					'id_admin' => $id_pengguna,
				);
				$this->Permohonan_model->insert_permohonan_log($dataInsertLog);
                
## email
$kepada = $detailPemohon['email'];
// $kepada = 'suvi.7888@gmail.com';
$judul = 'Permohonan Informasi No '.$no_permohonan.' PPID Kementerian ESDM';
$isi = "Status permohonan informasi Anda telah berubah:<br>
<b>Permohonan informasi Anda sudah kami balas.</b><br>
Silahkan kembali mengecek permohonan informasi Anda pada web kami.
<br><br>

Salam Keterbukaan Informasi Publik,<br>
Admin Aplikasi PPID Kementerian ESDM";
$headers_ss  = 'MIME-Version: 1.0' . "\r\n";
$headers_ss .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
$send_email = mail($kepada, $judul, $isi, $headers_ss);
                
                $this->session->set_flashdata('itemFlashData','Permohonan Berhasil Dibalas');
                redirect(site_url($this->session->userdata('ses_ppid_user_level').'/permohonan'));
            }
            else{
                $this->breadcrumbs->push($no_permohonan, '/');
                $this->session->set_flashdata('itemFlashGagal','Terdapat Kesalahan Pada Insert/Update Database');
                $data = $this->allDetailPermohonan($no_permohonan);
                $this->load->view('template',$data);
            }
        }
    }
    
}
?>