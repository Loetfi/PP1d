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
	
	// insert permohonan
	public function insert_permohonan() {
		$post = $this->input->post();
		
		// get date
		$cDate = time();
		
		// generate nomor permohonan
		$tgl = date('Y/m/d');
		$lastData = $this->permohonan_model->getLastNoPermohonan();
		$idOrder = (int)substr($lastData['no_permohonan'], 21) + 1;
		$no_permohonan = "ESDM-PPID/".$tgl."-".str_pad($idOrder, 4, "0", STR_PAD_LEFT);
		
		$insert_data = array(
			'no_permohonan'		=> $no_permohonan,
			'sumber'			=> 'Android',
			'id_pengguna'		=> $post['id_pengguna'],
			'subjek'			=> $post['subjek'],
			'info_req'			=> $post['info_req'],
			'info_tujuan'		=> $post['info_tujuan'],
			'file_pendukung'	=> $post['file_pendukung'],
			'file_nameasli'		=> $post['file_namaasli'],
			'status'			=> 'Pending',
			'cdate'				=> $cDate,
			'mdate'				=> $cDate,
			'delay_day'			=> 0,
		);

		$do_insert = $this->permohonan_model->insert_permohonan($insert_data);
		if(@$do_insert) {
			$this->res(200, 1, 'Berhasil');
		}
		else {
			$this->res(400, 0, 'Gagal');
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
