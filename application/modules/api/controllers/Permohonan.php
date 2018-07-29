<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('permohonan_model');
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

	public function by_pengguna()
	{ 
		$id_pengguna = $this->input->get('id_pengguna');
		$this->data['important'] = $this->permohonan_model->by_pengguna($id_pengguna);

		try { 
			if(empty($this->data['important'])) {
				$this->res(400, 0, 'Gagal', []);
			} else {
				$this->res(200, 1, 'Berhasil', $this->permohonan_model->by_pengguna($id_pengguna));
			}
		} catch (Exception $e) {
				$this->res(400, 0, 'Gagal', $e->getMessage());
		}

	}

	// by detail permohonan 

	public function by_detail()
	{ 
		$id_pengguna = $this->input->get('id_pengguna');
		$id_permohonan = $this->input->get('id_permohonan');
		$this->data['res'] = $this->permohonan_model->by_detail($id_pengguna , $id_permohonan);

		try { 
			if(empty($this->data['res'])) {
				$this->res(400, 0, 'Gagal', []);
			} else {
				$this->res(200, 1, 'Berhasil', $this->permohonan_model->by_detail($id_pengguna , $id_permohonan));
			}
		} catch (Exception $e) {
			$this->res(200, 1, 'Berhasil', $e->getMessage());
		}
		
	}


	// riwayat
	public function by_riwayat()
	{
		$id_permohonan = $this->input->get('id_permohonan');
		$this->data['res'] = $this->permohonan_model->by_riwayat($id_permohonan);

		try { 
			if(empty($this->data['res'])) {
				$this->res(400, 0, 'Gagal', []);
			} else {
				$this->res(200, 1, 'Berhasil', $this->data['res']);
			}
		} catch (Exception $e) {
			$this->res(200, 1, 'Berhasil', $e->getMessage());
		}
	}
}

/* End of file Permohonan.php */
/* Location: ./application/modules/api/controllers/Permohonan.php */
