<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemohon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pemohon_model');
	}

	function res($statusHeader,$status , $message, $data )
	{ 
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Access-Control-Allow-Methods: POST, GET'); 
		$this->output->set_header('Access-Control-Allow-Headers: Origin');
		$this->output->set_content_type('application/json');
		$this->output->set_status_header($statusHeader);
		$this->output->set_output(json_encode(array ('status' => $status , 'message' =>  $message , 'data' => $data)));
		$this->output->_display();
		exit();
	}

	public function list()
	{ 

		$this->data['res'] = $this->pemohon_model->list();
		try { 
			if(empty($this->data['res'])) {
				$this->res(400, 0, 'Failed', []);
			} else {
				$this->res(200, 1, 'Success', $this->data['res']);
			}
		} catch (Exception $e) {
				$this->res(400, 0, 'Failed', $e->getMessage());
		}

	}

	//detail 

	public function detail()
	{ 
		$id_pengguna = $this->input->get('id_pengguna');
		$this->data['res'] = $this->pemohon_model->detail($id_pengguna);

		try { 
			if(empty($this->data['res'])) {
				$this->res(200, 0, 'Not Found', []);
			} else {
				$this->res(200, 1, 'Success', $this->data['res']);
			}
		} catch (Exception $e) {
				$this->res(400, 0, 'Failed', $e->getMessage());
		}

	}
 
}

/* End of file Pemohon.php */
/* Location: ./application/modules/api/controllers/Pemohon.php */
