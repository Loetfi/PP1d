<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Unit_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        
        $this->breadcrumbs->push('Home', 'api/mockup/depan');
        $this->breadcrumbs->push('Master Unit', 'admin/unit');
    }
    
    /** List Unit **/
    function index(){
        $data['title'] = 'List Unit';
        $data['page'] = 'Unit/list';
        $this->breadcrumbs->push('List', '/');
        
        $data['list_unit'] = $this->Unit_model->list_unit();
        // $this->load->view('template',$data);
		$this->load->view('template/tema',$data);
    }
    
    /** Form add unit **/
    function add(){
        $data['title'] = 'Add Unit';
        $data['page'] = 'Unit/add';
        $this->breadcrumbs->push('Add', '/');
        
        $data['list_unit'] = $this->Unit_model->list_unit(array('id_parent'=>0));
        
        $this->form_validation->set_rules('nama_unit', 'nama_unit', 'required');
        if ($this->form_validation->run() == FALSE){
            // $this->load->view('Unit/add',$data);
            // $this->load->view('template',$data);
			$this->load->view('template/tema',$data);
        }
        else{
            $data_insert = array(
                'id_parent' => @$_POST['id_parent'],
                'nama_unit' => @$_POST['nama_unit'],
                'status' => @$_POST['status'],
            );
            $insert = $this->Unit_model->insert_unit($data_insert);
            redirect('admin/unit');
        }
    }
    
    /** Form edit unit **/
    function edit($id){
        $data['title'] = 'Edit Unit';
        $data['page'] = 'Unit/edit';
        $this->breadcrumbs->push('Edit', '/');
        
        $data['detail'] = $this->Unit_model->detail_unit($id);
        $data['list_unit'] = $this->Unit_model->list_unit(array('id_parent'=>0));
        
        $this->form_validation->set_rules('nama_unit', 'nama_unit', 'required');
        if ($this->form_validation->run() == FALSE){
            // $this->load->view('Unit/edit',$data);
            // $this->load->view('template',$data);
			$this->load->view('template/tema',$data);
        }
        else{
            $data_update = array(
                'id_parent' => @$_POST['id_parent'],
                'nama_unit' => @$_POST['nama_unit'],
                'status' => @$_POST['status'],
            );
            $where_update = array('id_unit' => $id);
            $update = $this->Unit_model->update_unit($data_update, $where_update);
            redirect('admin/unit');
        }
    }
    
    function get_child_unit(){
        $nilai = $this->Unit_model->list_unit_all();
        $head = @$nilai['head'];
        $child = @$nilai['child'];
        
        echo '<ul>';
        for($i=0; $i<count($head); $i++){
            echo '<li>';
            echo $head[$i]['id_unit'].'|'.$head[$i]['nama_unit'];
            
            if (count(@$child[$i]) > 0){
                echo '<ul>';
                for($j=0; $j<count($child[$i]); $j++){
                    echo '<li>';
                    echo $child[$i][$j]['id_unit'].'|'.$child[$i][$j]['nama_unit'];
                    echo '</li>';
                }
                echo '</ul>';
            }
            echo '</li>';
        }
        echo '</ul>';
        
    }
}

?>