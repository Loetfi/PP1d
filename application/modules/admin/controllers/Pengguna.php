<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Unit_model');
        $this->load->model('Pengguna_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        
        $this->breadcrumbs->push('Home', 'api/mockup/depan');
        $this->breadcrumbs->push('Master Pengguna', 'admin/pengguna');
    }
    
    /** List Pengguna **/
    function index(){
        $data['title'] = 'List Pengguna';
        $data['page'] = 'Pengguna/list';
        $this->breadcrumbs->push('List', '/');
        
        $data['list_pengguna'] = $this->Pengguna_model->list_pengguna();
        // $this->load->view('template',$data);
		$this->load->view('template/tema',$data);
    }
    
    /** Form add pengguna **/
    function add(){
        $data['title'] = 'Add Pengguna';
        $data['page'] = 'Pengguna/add';
        $this->breadcrumbs->push('Add', '/');
        
        $data['list_unit'] = $this->Unit_model->list_unit_all();
		
        $role = @$_POST['role'];
		if ($role == 'unit') $this->form_validation->set_rules('id_unit', 'Unit', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[ppid_pengguna.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'RePassword', 'required|matches[password]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[ppid_pengguna.email]');
        if ($this->form_validation->run() == FALSE){
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
				$this->session->set_flashdata('itemFlashGagal','Harap Melengkapi Form yang Telah Disediakan');
            // $this->load->view('template',$data);
            $this->load->view('template/tema',$data);
        }
        else{
            $id_unit = $_POST['role']=='unit'?$_POST['id_unit']:null;
            $dataInsert = array(
                'id_unit' => $id_unit,
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'status' => $_POST['status'],
                'cdate' => $cdate,
                'mdate' => $cdate,
                'role' => $_POST['role'],
            );
            $insert = $this->Pengguna_model->insert_pengguna($dataInsert);
            redirect('admin/pengguna');
        }
    }
    
    /** Form edit pengguna **/
    function edit($id){
        $data['title'] = 'Edit Pengguna';
        $data['page'] = 'Pengguna/edit';
        $this->breadcrumbs->push('Edit', '/');
        
        $data['detail'] = $this->Pengguna_model->detail_pengguna($id);
        $data['list_pengguna'] = $this->Pengguna_model->list_pengguna(array('id_parent'=>0));
        
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() == FALSE){
            // $this->load->view('Pengguna/edit',$data);
            // $this->load->view('template',$data);
			$this->load->view('template/tema',$data);
        }
        else{
            $id_unit = $_POST['role']=='unit'?$_POST['id_unit']:null;
            $data_update = array(
                'role' => @$_POST['role'],
                'id_unit' => @$id_unit,
                'nama' => @$_POST['nama'],
                'status' => @$_POST['status'],
            );
            if($_POST['password'] != '')
                $data_update['password'] = $_POST['password'];
            
            $where_update = array('id_pengguna' => $id);
            $update = $this->Pengguna_model->update_pengguna($data_update, $where_update);
            redirect('admin/pengguna');
        }
    }
    
    function get_child_pengguna(){
        $nilai = $this->Pengguna_model->list_pengguna_all();
        $head = @$nilai['head'];
        $child = @$nilai['child'];
        
        echo '<ul>';
        for($i=0; $i<count($head); $i++){
            echo '<li>';
            echo $head[$i]['id_pengguna'].'|'.$head[$i]['nama_pengguna'];
            
            if (count(@$child[$i]) > 0){
                echo '<ul>';
                for($j=0; $j<count($child[$i]); $j++){
                    echo '<li>';
                    echo $child[$i][$j]['id_pengguna'].'|'.$child[$i][$j]['nama_pengguna'];
                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
        
    }


     /** List Pengguna **/
    function profil(){ 
        $data['title'] = 'Detail Profil';
        $data['page'] = 'Pengguna/profil';
        $this->breadcrumbs->push('List', '/');
        
        $data['list_pengguna'] = $this->Pengguna_model->list_pengguna();
        $this->load->view('template/tema',$data);
    }
}

?>