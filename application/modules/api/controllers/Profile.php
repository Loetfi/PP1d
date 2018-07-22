<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function index()
    {
        echo "<i>Sukses! terhubung ke service profil...</i>";
    }
	
	public function get_user()
	{
		$arr_data = array();
		$get_param = $this->input->get();
		if(count($get_param) > 0)
		{
			$this->db->where('id_pengguna', $get_param['id']);
			$query = $this->db->get('ppid_pengguna')->result();
			if(count($query) > 0)
			{
				$arr_data['msg'] = 'Profil Ditemukan';
				$arr_data['data'] = $query;
			}
			else
			{
				$arr_data['msg'] = 'Data Profil Tidak Ada';
				$arr_data['data'] = array();
			}
		}
		else
		{
			$arr_data['msg'] = 'Parameter Tidak Terkirim';
			$arr_data['data'] = array();
		}
		
		// print response
		echo json_encode($arr_data);
	}
	
}