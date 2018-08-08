<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function index()
    {
        echo "<i>Sukses! terhubung ke service autentikasi...</i>";
    }
	
	public function login()
	{
		$arr_data = array();
		$post_param = $this->input->post();
		if(count($post_param) > 0)
		{
			$this->db->where('username', $post_param['username']);
			$query = $this->db->get('ppid_pengguna')->result();
			if(count($query) > 0)
			{
				if($query[0]->password === $post_param['password'])
				{
					$arr_data['msg'] = 'Data Ditemukan';
					$arr_data['data'] = $query;
				}
				else if($query[0]->password !== $post_param['password'])
				{
					$arr_data['msg'] = 'Password Salah';
					$arr_data['data'] = array();
				}
			}
			else
			{
				$arr_data['msg'] = 'Username Tidak Ada';
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
	
	public function registration()
	{
		$arr_data = array();
		$get_post = $this->input->post();
		if(count($get_post) > 0)
		{
			$this->db->where('username', $get_post['username']);
			$username = $this->db->get('ppid_pengguna')->result();
			if(count($username) > 0)
			{
				$arr_data['msg'] = 'Username sudah terdaftar, silahkan ketikkan username selain "'.$get_post['username'].'"';
				$arr_data['data'] = array();
			}
			else
			{
				$this->db->where('email', $get_post['email']);
				$email = $this->db->get('ppid_pengguna')->result();
				if(count($email) > 0)
				{
					$arr_data['msg'] = 'Alamat email sudah terdaftar, silahkan ketikkan email selain "'.$get_post['email'].'"';
					$arr_data['data'] = array();
				}
				else
				{
					$data = array(
						'nama'		=> $get_post['fullname'],
						'username'	=> $get_post['username'],
						'email'		=> $get_post['email'],
						'password'	=> $get_post['password'],
						'role'		=> 'pemohon'
					);
					$insert = $this->db->insert('ppid_pengguna', $data);
					
					if(@$insert)
					{
						$arr_data['msg'] = 'Data berhasil di tulis';
						$arr_data['data'] = array();
					}
					else
					{
						$arr_data['msg'] = 'Data tidak berhasil di tulis';
						$arr_data['data'] = array();
					}
				}
			}
		}
		else
		{
			$arr_data['msg'] = 'Parameter tidak terkirim';
			$arr_data['data'] = array();
		}
		
		// print response
		echo json_encode($arr_data);
	}
	
}