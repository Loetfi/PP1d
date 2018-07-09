<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    function __construct() {
        parent::__construct(); 
        $this->load->model('auth/User_account_model','User_account_model');
        $this->load->library('form_validation');
    }
    
    /** Detail profil
    **/
	function index(){
        $data['title'] = 'Profile';
        $data['page'] = 'profil';
        
        // $userId = 31;
        $userId = $this->session->userdata('ses_ppid_user_id');
        $data['detail'] = $this->User_account_model->detailPengguna($userId);
        // print_r($data['detail']);
        $this->load->view('template/tema',$data);
		// $this->load->view('welcome_message');
	}
    
    /** Form login dan aksi login
    **/
    function login(){}
    
    /** Form registrasi dan aksi registrasi
    **/
    function registrasi(){}
    
    /** Form reset password, kirim password baru ke email-nya
    **/
    function reset_password(){}
    
    /** Form update profile dan aksinya
    **/
    function update_profil(){
        
        $data['title'] = 'Profile';
        $data['page'] = 'profil';
        $userId = $this->session->userdata('ses_ppid_user_id');
        $data['detail'] = $this->User_account_model->detailPengguna($userId);
        
        $cdate = time();
        
        $this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('no_identitas', 'no_identitas', 'required');
        // if (empty($_FILES['userfile']['name'])) {
            // $this->form_validation->set_rules('userfile', 'Document', 'required');
        // }
        ## $this->form_validation->set_rules('userfile', 'userfile', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('tlp', 'tlp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        
        if ($this->form_validation->run() == FALSE){
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                $this->session->set_flashdata('itemFlashData','insertGagal');
            $this->load->view('template/tema',$data);
        } else {
            
            $dataUpdate = array(
                'type_identitas' => $_POST['type_identitas'],
                'no_identitas' => $_POST['no_identitas'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'tlp' => $_POST['tlp'],
                'email' => $_POST['email'],
                'pekerjaan' => $_POST['pekerjaan'],
                'mdate' => $cdate,
            );
            
            $sessionData = array(
                'ses_ppid_user_nama' => $_POST['nama'],
                'ses_ppid_user_code' => $_POST['no_identitas'],
            );
            // ## cek upload photo
            $photo = null;
            $paramPhoto = 'userfile';
            if (@$_FILES[$paramPhoto]['name']){
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
                $kode_aktifasi=$rand;
                $file_name= time().'_'.$rand;
                
                $config['upload_path'] = './uploads/profil/';
                $config['allowed_types'] = '*';
                $config['max_size'] = '3500';
                $config['file_name'] = $file_name;
                $photo = $config['file_name'].".".$ext;
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload($paramPhoto)){
                    $salah = $this->upload->display_errors();
                    $this->session->set_flashdata('itemFlashData','Gagal');
                }
                else {
                    $dataUpdate['ktp_img'] = $photo;
                    $sessionData['ses_ppid_user_foto'] = $photo;
                }
            } else {
                echo 'salah foto';
            }
            
            $whereUpdate = array('id_pengguna' => $userId);
            $doUpdate = $this->User_account_model->penggunaUpdate($dataUpdate, $whereUpdate);
            
            $this->session->set_userdata($sessionData);
            
            $this->session->set_flashdata('itemFlashData','Sukses');
            redirect(site_url('profil'));
            
        }
    }
    
    /** Form update foto KTP
    **/
    function upload_ktp(){
        $cdate = time();
        
        $photo = null;
        $paramPhoto = 'userfile';
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
        $config['upload_path'] = './uploads/profil/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '3500';
        $config['file_name'] = $file_name;
        $photo = $config['file_name'].".".$ext;
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload($paramPhoto)){
            $salah = $this->upload->display_errors();
            $this->session->set_flashdata('itemFlashData','Gagal');
        }
        else {
            $dataUpdate = array(
                'ktp_img' => $photo,
                'mdate' => $cDate,
            );
            $whereUpdate = array('user_id' => $userId);
            $doUpdate = $this->User_account_model->penggunaUpdate($dataUpdate, $whereUpdate);
            
            $sessionData = array(
                'ses_ppid_user_foto' => $fileName
            );
            $this->session->set_userdata($sessionData);
            
            $this->session->set_flashdata('itemFlashData','Sukses');
        }
        redirect(site_url('profil'));
    }
    
    
    
    function logout(){}
}
