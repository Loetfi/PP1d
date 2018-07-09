<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('User_account_model');
        
        $this->load->library('cart');
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('Home', 'api/mockup/depan');
    }
    
    function index(){
        if ($this->session->userdata('ses_ppid_user_status') == true){
            if (strtolower($this->session->userdata('ses_ppid_user_level')) == 'pemohon')
                redirect(site_url('permohonan'));
            else 
                redirect(site_url($this->session->userdata('ses_ppid_user_level').'/permohonan'));
        }else{
            $this->login();
        }
    }

    function login(){
        if ($this->session->userdata('ses_ppid_user_status') == true){
            redirect(site_url('home'));
        }else{
            $data['title'] = 'Login';
            $data['page'] = 'login_reg';
            $this->breadcrumbs->push('Login', '/');
            $this->load->view('template/tema',$data);
        }
    }
    function loginAct(){
        $dataLogin = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            // 'status' => 'Aktif',
            );
        $loginStatus = $this->User_account_model->loginPengguna($dataLogin);
        if ($loginStatus == 'sukses'){
            $aktor = strtolower($this->session->userdata('ses_ppid_user_level')) == 'pemohon' ? '' : $this->session->userdata('ses_ppid_user_level').'/';
            $arr = array(
                'loginStatus' => $loginStatus,
                'pesan' => 'Login Berhasil',
                'redirect' => site_url($aktor.'permohonan'),
                );
        }
        else if ($loginStatus == 'nonAktif'){
            $arr = array(
                'loginStatus' => $loginStatus,
                'pesan' => 'Username atau Password masih belum aktif. Silahkan cek email Anda',
                'redirect' => '',
                );
        }
        else {
            $arr = array(
                'loginStatus' => $loginStatus,
                'pesan' => 'Username atau Password salah',
                'redirect' => '',
                );
        }
        echo json_encode(@$arr);
    }
    function clearSession() {
        $sessionData = array(
            'ses_ppid_user_id' => '',
            'ses_ppid_user_nama' => '',
            'ses_ppid_user_username' => '',
            'ses_ppid_user_level' => '',
            'ses_ppid_user_unit' => '',
            'ses_ppid_user_code' => '',
            'ses_ppid_user_foto' => '',
            'ses_ppid_user_status' => false,
            );
        $this->session->set_userdata($sessionData);
        redirect(base_url());
    }

    function getCaptcha(){
        header("Content-type: image/png");
        // beri nama session dengan nama Captcha
        $_SESSION["CaptchaPPID"]="";
        //tentukan ukuran gambar
        $gbr = imagecreate(200, 34);
        //warna background gambar
        imagecolorallocate($gbr, 167, 218, 239);
        $grey = imagecolorallocate($gbr, 128, 128, 128);
        $black = imagecolorallocate($gbr, 0, 0,0);
        // tentukan font
        $font = realpath(__DIR__ . '/../../resources/myResources/fonts/monaco.ttf');
        // membuat nomor acak dan ditampilkan pada gambar
        for($i=0;$i<=5;$i++) {
            // jumlah karakter
            $nomor=rand(0, 9);
            $_SESSION["CaptchaPPID"].=$nomor;
            $sudut= rand(-25, 25);
            imagettftext($gbr, 20, $sudut, 8+15*$i, 25, $black, $font, $nomor);
            // efek shadow
            imagettftext ($gbr, 20, $sudut, 9+15*$i, 26, $grey, $font, $nomor);
        }
        //untuk membuat gambar 
        imagepng($gbr); 
        imagedestroy($gbr);
    }
    
    function cekCaptcha(){

        if($_SESSION["CaptchaPPID"]!=$_POST["kode_keamanan"]){
            echo "salah";
        }else{ // jika teryata lolos
            echo "benar";
        }
    }
    
    function register(){
        $data['page'] = 'registrasi';
        $this->breadcrumbs->push('Login', '/');
        
        // $img = $this->getCaptcha();
        $this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama harus diisi'));
        // $this->form_validation->set_rules('no_identitas', 'no_identitas', 'required');
        // if (empty($_FILES['userfile']['name'])) {
            // $this->form_validation->set_rules('userfile', 'Document', 'required');
        // }
        ## $this->form_validation->set_rules('userfile', 'userfile', 'required');
        // $this->form_validation->set_rules('alamat', 'alamat', 'required');
        // $this->form_validation->set_rules('tlp', 'tlp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[ppid_pengguna.email]');
        // $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[ppid_pengguna.username]');
        
        $this->form_validation->set_rules('password', 'password', 'required|matches[repassword]|min_length[6]');
        $this->form_validation->set_rules('repassword', 'RePassword', 'required|matches[password]|min_length[6]');
        
        if ($this->form_validation->run() == FALSE){
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                $this->session->set_flashdata('itemFlashData','insertGagal');
            $this->load->view('template/tema',$data);
        }
        else {
            $cekUsername = $this->cekUsername();
            $cekEmail = $this->cekEmail();
            
            if ($cekUsername == 'salah' || $cekEmail == 'salah'){
                $this->session->set_flashdata('itemFlashData','GagalUsernameEmail');
                $this->load->view('template/tema',$data);
            }
            else{
                // echo 'mari';
                // ## cek upload photo
                // $photo = null;
                // $paramPhoto = 'userfile';
                // $ext = pathinfo($_FILES[$paramPhoto]['name'], PATHINFO_EXTENSION);
                // $cekPhoto = $_FILES[$paramPhoto]['tmp_name'];
                
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
                // $file_name= time().'_'.$rand;
                
                // $config['upload_path'] = './uploads/profil/';
                // $config['allowed_types'] = '*';
                // $config['max_size'] = '3500';
                // $config['file_name'] = $file_name;
                // $photo = $config['file_name'].".".$ext;
                // $this->load->library('upload', $config);
                
                // if ( ! $this->upload->do_upload($paramPhoto)){
                    // $salah = $this->upload->display_errors();
                    // $this->session->set_flashdata('itemFlashData','Gagal');
                    // $this->load->view('template/tema',$data);
                // }
                // else {
                    $getLastId = $this->User_account_model->getLastId();
                    $userId = (int)$getLastId['id_pengguna'] + 1;
                    
                    $cdate = time();
                    $dataInsert = array(
                        'id_pengguna' => @$userId,
                        'username' => $_POST['username'],
                        'password' => $_POST['password'],
                        // 'type_identitas' => $_POST['type_identitas'],
                        // 'no_identitas' => $_POST['no_identitas'],
                        'nama' => $_POST['nama'],
                        // 'alamat' => $_POST['alamat'],
                        // 'tlp' => $_POST['tlp'],
                        'email' => $_POST['email'],
                        // 'pekerjaan' => $_POST['pekerjaan'],
                        // 'ktp_img' => $photo,
                        'status' => 'Pending',
                        'cdate' => $cdate,
                        'mdate' => $cdate,
                        'role' => 'pemohon',
                        'activation_code' => $kode_aktifasi,
                        );
                    $doInsert = $this->User_account_model->registrasi($dataInsert);
                    if ($doInsert){
                    ## email
                        $kepada = $_POST['email'];
                        $judul = 'Registrasi PPID Online';
                        $isi = '<p>Yang Terhormat Pemohon, <b>'.$_POST['nama'].'</b></p>
                        <p>Terima kasih telah melakukan registrasi permohonan informasi publik di PPID Kementerian Energi dan Sumber Daya Mineral (KESDM).</p>
                        <p>Berikut informasi username Anda untuk login ke aplikasi:<br>'.$_POST['username'].'</p>
                        <p>Silahkan klik link berikut untuk aktivasi akun Anda di Aplikasi PPID KESDM.<br>
                            <a href="'.site_url('auth/aktifasi/'.$kode_aktifasi).'" target="_blank">Aktifasi</a>
                        </p>
                        <br/>
                        <br/>

                        Salam Keterbukaan Informasi Publik,<br>
                        Admin Aplikasi PPID Kementerian ESDM
                        ';
                        $headers_ss  = 'MIME-Version: 1.0' . "\r\n";
                        $headers_ss .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
                        $send_email = mail($kepada, $judul, $isi, $headers_ss);

                        redirect(site_url('auth'));
                        $this->session->set_flashdata('itemFlashData','Sukses');
                        // echo '4';
                    } else{
                        $this->session->set_flashdata('itemFlashData','Gagal');
                        $this->load->view('template/tema',$data);
                    } // end insert
                // } // end upload photo
            } // end email validation
        } // end globarl validation
    }
    function cekUsername(){
        $username = $_POST['username'];
        $cek = $this->User_account_model->cekUsername($username);
        
        if ((int)$cek['terhitung'] > 0 ){
            $return = 'salah';
        } else {
            $return = 'sukses';
        }
        
        if (!$this->input->is_ajax_request()) {
            return $return;
        } else {
            echo $return;
        }
    }
    function cekEmail(){
        $email = $_POST['email'];
        $cek = $this->User_account_model->cekEmail($email);
        
        if ((int)$cek['terhitung'] > 0 ){
            $return = 'salah';
        } else {
            $return = 'sukses';
        }
        
        if (!$this->input->is_ajax_request()) {
            return $return;
        } else {
            echo $return;
        }
    }
    
    function registrerAct(){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_identitas', 'No Identitas', 'required');
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[ppid_pengguna.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[ppid_pengguna.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'RePassword', 'required|matches[password]');
        
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('tlp', 'Telepon', 'required');
        
        if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashGagal','Harap Melengkapi Form yang Telah Disediakan');
            $this->load->view('template',$data);
        }
        else{
            
        }
        $getLastId = $this->User_account_model->getLastId();
        $userId = (int)$getLastId['id_pengguna'] + 1;
        
        $config['upload_path'] = './uploads/profile/';
        $config['allowed_types'] = 'png|jpg|jpeg|xlsx|';
        $config['max_size'] = '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        
        $config['file_name']  = 'Scan_'.$userId;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $fileName = $data['upload_data']['file_name'];
        }
        
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
           .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789'); // and any other characters
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
        $kode_aktifasi=$rand;
        
        $cekUsername = $this->cekUsername($username);
        $cekEmail = $this->cekEmail($email);
        
        if ($cekUsername == 'salah' || $cekEmail == 'salah'){
            $this->session->set_flashdata('itemFlashData','GagalUsernameEmail');
        } else {

            $cdate = time();
            $dataInsert = array(
                'user_id' => $userId,
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'type_identitas' => $_POST['type_identitas'],
                'no_identitas' => $_POST['no_identitas'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'tlp' => $_POST['tlp'],
                'email' => $_POST['email'],
                'pekerjaan' => $_POST['pekerjaan'],
                'ktp_img' => $fileName,
                'status' => 'Pending',
                'cdate' => $cdate,
                'mdate' => $cdate,
                'role' => 'pemohon',
                'activation_code' => $kode_aktifasi,
                );
            $doInsert = $this->User_account_model->registrasi($dataInsert);
            if ($doInsert){
                $this->session->set_flashdata('itemFlashData','Sukses');
## email
                $kepada = $_POST['email'];
                $judul = 'Registrasi PPID Online';
                $isi = '<p>Yang Terhormat Pemohon, <b>'.$_POST['nama'].'</b></p>
                <p>Terima kasih telah melakukan registrasi permohonan informasi publik di PPID Kementerian Energi dan Sumber Daya Mineral (KESDM).</p>
                <p>Berikut informasi username Anda untuk login ke aplikasi:<br>'.$_POST['username'].'</p>
                <p>Silahkan klik link berikut untuk aktivasi akun Anda di Aplikasi PPID KESDM.<br>
                    <a href="'.site_url('User_account/aktifasi/'.$kode_aktifasi).'" target="_blank">Aktifasi</a>
                </p>
                <br/>
                <br/>

                Salam Keterbukaan Informasi Publik,<br>
                Admin Aplikasi PPID Kementerian ESDM
                ';
                $headers_ss  = 'MIME-Version: 1.0' . "\r\n";
                $headers_ss .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
                $send_email = mail($kepada, $judul, $isi, $headers_ss);

            } else {
                $this->session->set_flashdata('itemFlashData','Gagal');
            }
        }
        redirect(site_url('auth/register'));
    }
    
    function profile(){
        $data['title'] = 'Profile';
        // $data['page'] = 'User_account/profile';
        $data['page'] = 'admin/Pengguna/profil';
        
        // $userId = 31;
        $userId = $this->session->userdata('ses_ppid_user_id');
        $data['detail'] = $this->User_account_model->detailPengguna($userId);
        // print_r($data['detail']);
        $this->load->view('template/tema',$data);
    }
    function doProfile(){
        $cDate = time();
        $userId = $this->session->userdata('ses_ppid_user_id');
        
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
        $whereUpdate = array('user_id' => $userId);
        $doUpdate = $this->User_account_model->penggunaUpdate($dataUpdate, $whereUpdate);
        
        $sessionData = array(
            'ses_ppid_user_nama' => $_POST['nama'],
            'ses_ppid_user_code' => $_POST['no_identitas'],
            );
        $this->session->set_userdata($sessionData);
        
        redirect(site_url('User_account/profile'));
    }
    function doFoto(){
        $cDate = time();
        $userId = $this->session->userdata('ses_ppid_user_id');
        
        $config['upload_path'] = './uploads/profile/';
        $config['allowed_types'] = 'png|jpg|jpeg|xlsx|';
        $config['max_size'] = '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        
        $config['file_name']  = 'Profile_'.$userId;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $fileName = $data['upload_data']['file_name'];
            
            $dataUpdate = array(
                'foto' => $fileName,
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
        
        redirect(site_url('User_account/profile'));
    }
    function doScan(){
        $cDate = time();
        $userId = $this->session->userdata('ses_ppid_user_id');
        
        $config['upload_path'] = './uploads/profile/';
        $config['allowed_types'] = 'png|jpg|jpeg|xlsx|';
        $config['max_size'] = '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        
        $config['file_name']  = 'Scan_'.$userId;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $fileName = $data['upload_data']['file_name'];
            
            $dataUpdate = array(
                'ktp_img' => $fileName,
                'mdate' => $cDate,
                );
            $whereUpdate = array('user_id' => $userId);
            $doUpdate = $this->User_account_model->penggunaUpdate($dataUpdate, $whereUpdate);
            
            $this->session->set_flashdata('itemFlashData','Sukses');
        }
        
        redirect(site_url('User_account/profile'));
    }
    
    function detail($userId){
        if ($this->session->userdata('ses_ppid_user_level') == 'admin'){
            $data['title'] = 'Profile Pengguna';
            $data['page'] = 'User_account/profileMaster';

            $data['detail'] = $this->User_account_model->detailPenggnua($userId);
            $this->load->view('template_baru',$data);
        } else{
            show_404();
        }
    }
    
    function aktifasi($kode_aktifasi){
        $data['title'] = 'Aktifasi';
        $data['page'] = 'aktifasi';
        $detail = $this->User_account_model->detailPenggnuaKode($kode_aktifasi);
        $data['detail'] = $detail;
        
        if (count($detail) > 0){
            $text = 'Terima Kasih,<br>
            Akun anda sudah dapat dilakukan login<br>
            Klik link berikut untuk masuk ke Aplikasi PPID KESDM.<br>
            <a href="'.site_url('auth/login').'">Login</a>';
            
            $updateStatus = 'Aktif';
            $remarks = 'Aktifasi Sukses';
            $dataUpdate = array(
                'status' => @$updateStatus,
                'remarks' => @$remarks,
                'mdate' => @$cdate,
                );
            $whereUpdate = array('activation_code' => $kode_aktifasi);
            $doUpdate = $this->User_account_model->penggunaUpdate($dataUpdate, $whereUpdate);
            
            ## email
            $kepada = $detail['email'];
            $judul = 'Registrasi PPID Online';
            $isi = '<p>Yang Terhormat Pemohon, <b>'.$detail['nama'].'</b></p>
            <p>'.$text.'</p>
            <br/>
            <br/>
            Salam Keterbukaan Informasi Publik,<br>
            Admin Aplikasi PPID Kementerian ESDM';
            $headers_ss  = 'MIME-Version: 1.0' . "\r\n";
            $headers_ss .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
            $send_email = mail($kepada, $judul, $isi, $headers_ss);
        } else{
            $text = 'Data Tidak Ditemukan,<br>
            Akun aktifasi anda salah/tidak ditemukan';
        }
        $data['text'] = $text;
        $this->load->view('template/tema',$data);
    }
}
