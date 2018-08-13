<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('permohonan_model');
		$this->load->model('auth/User_account_model', 'User_account_model');
	}

	function res($statusHeader, $status, $message, $data)
	{ 
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Access-Control-Allow-Methods: POST, GET'); 
		$this->output->set_header('Access-Control-Allow-Headers: Origin');
		$this->output->set_content_type('application/json');
		$this->output->set_status_header($statusHeader);
		$this->output->set_output(json_encode(array('status' => $status , 'message' =>  $message , 'data' => $data)));
		$this->output->_display();
		exit();
	}

	public function by_pengguna()
	{ 
		$post = $this->input->post();
		$this->data['important'] = $this->permohonan_model->by_pengguna($post);

		try { 
			if(empty($this->data['important'])) {
				$this->res(400, 0, 'Gagal', []);
			} else {
				$this->res(200, 1, 'Berhasil', $this->permohonan_model->by_pengguna($post));
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
		$this->data['res'] = $this->permohonan_model->by_detail($id_pengguna, $id_permohonan);

		try { 
			if(empty($this->data['res'])) {
				$this->res(400, 0, 'Gagal', []);
			} else {
				$this->res(200, 1, 'Berhasil', $this->permohonan_model->by_detail($id_pengguna, $id_permohonan));
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
		$detailPengguna = $this->User_account_model->detailPengguna(@$post['id_pengguna']);
		
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
			## insert ke log
			$dataInsertLog = array(
				'no_permohonan' => $no_permohonan,
				'status' => 'Pending',
				'deskripsi' => 'Permohonan Telah dikirimkan. Silahkan menunggu respon dari kami',
				'cdate' => $cDate,
			);
			$this->permohonan_model->insert_permohonan_log($dataInsertLog);

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
			$headers_ss .= 'From: PPID ESDM <noreply@ppid.esdm.go.id>' . "\r\n";
			// $headers_ss .= 'From: dule sundule<noreply@dule-sundule.com>' . "\r\n";
			$send_email = mail($kepada, $judul, $isi, $headers_ss);
			
			$this->res(200, 1, 'Berhasil', $no_permohonan);
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

				foreach ($this->data['res'] as $row) {
					$respon['id']	 =  $row['id'];
					$respon['no_permohonan'] = $row['no_permohonan'];
					$respon['status'] = $row['status'];
					$respon['deskripsi'] = $row['deskripsi'];
					$respon['cdate'] = date('d F Y', strtotime($row['cdate']));
					$respon['id_admin'] = $row['id_admin'];
					$res[] = $respon; 
				}

				$this->res(200, 1, 'Berhasil', $res);
			}
		} catch (Exception $e) {
			$this->res(200, 1, 'Berhasil', $e->getMessage());
		}
	}


	// permohonan/detail/ESDM-PPID/2017/12/05-0002

	function by_balasan(){
		$id_permohonan = $this->input->get('id_permohonan');
		$this->data['res'] = $this->permohonan_model->by_balasan($id_permohonan);

		try { 
			if(empty($this->data['res'])) {
				$this->res(400, 0, 'Gagal', []);
			} else {

				foreach ($this->data['res'] as $row) {
					$resp['no_permohonan'] = $row['no_permohonan'];
					$resp['id_admin'] = $row['id_admin'];
					$resp['subjek'] = $row['subjek'];
					$resp['balasan'] = $row['balasan']; 


					$file_nameasli = explode(';',$row['file_nameasli']);
					$file_pendukung = explode(';',$row['file_pendukung']);

					for($i=0; $i<count($file_pendukung) -1; $i++){ 
						$namaFile = $file_pendukung[$i]; 
						$namaFileAsli = $file_nameasli[$i];  
						//$resp['file_pendukung'][] = site_url(@$this->session->userdata('ses_ppid_user_level').'/permohonan/downloadFile/'.str_replace('/','-',$id_permohonan).'/'.$namaFile);
						$resp['file_pendukung'][] = base_url().'uploads/'.str_replace('/','-',$id_permohonan).'/'.$namaFile;
						$resp['file_nameasli'][] = $row['file_nameasli'];
					}

					$resp['cdate'] = $row['cdate'];
					$resp['mdate'] = $row['mdate'];
					$respon[] = $resp;
				}

				$this->res(200, 1, 'Berhasil', $respon);
			}
		} catch (Exception $e) {
			$this->res(200, 1, 'Berhasil', $e->getMessage());
		}
 
	} 

	function verifikasi()
	{
		$post = $this->input->post();
		$no_permohonan = $post['no_permohonan'];
		$id_admin = $post['id_admin'];
		$cDate = time();
		
		// update status
		$dataUpdate = array(
			'id' => $no_permohonan,
			'data' => array(
				'status' => 'Verifikasi',
				'vdate' => $cDate,
				'mdate' => $cDate
			)
		);
		$doUpdate = $this->permohonan_model->update_permohonan_by_id($dataUpdate);
		if($doUpdate)
		{
			
			## insert ke log
			$dataInsertLog = array(
				'no_permohonan' => $no_permohonan,
				'status' => 'Verifikasi',
				'deskripsi' => 'Permohonan sedang diverifikasi.',
				'cdate' => $cDate,
				'id_admin' => $id_admin,
			);
			$this->permohonan_model->insert_permohonan_log($dataInsertLog);
            $this->res(200, 1, 'Berhasil');
		}
		else
		{
			$this->res(400, 1, 'Gagal');
		}
	}

}

/* End of file Permohonan.php */
/* Location: ./application/modules/api/controllers/Permohonan.php */
