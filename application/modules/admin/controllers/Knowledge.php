<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Knowledge extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('Unit_model');
		$this->load->model('Permohonan_model');
		$this->load->model('unit/Disposisi_model', 'Disposisi_model');
		$this->load->model('auth/User_account_model', 'User_account_model');
        
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        
        $this->breadcrumbs->push('Home', '#');
        $this->breadcrumbs->push('Knowledge', 'admin/permohonan');
        if (!$this->session->userdata('ses_ppid_user_status')) redirect('auth');
	}
	public function index(){
        $data['title'] = 'List Knowledge Base';
        $data['page'] = 'Knowledge/list';
        $this->breadcrumbs->push('List', '/');
        
        $data['listData'] = $this->Permohonan_model->list_knowledge();
        $this->load->view('template/tema',$data);
    }
}