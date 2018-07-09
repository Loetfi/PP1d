<?php

class User_account_model extends CI_Model{
	//put your code here
	function loginPengguna($dataLogin) {
		$query = $this->db->get_where('ppid_pengguna', $dataLogin);
		if ($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				if ($row->status == 'Aktif'){
					$sessionData = array(
						'ses_ppid_user_id' => $row->id_pengguna,
						'ses_ppid_user_nama' => $row->nama,
						'ses_ppid_user_username' => $row->username,
						'ses_ppid_user_level' => $row->role, // pemohon, admin, unit
						'ses_ppid_user_unit' => $row->id_unit,
						'ses_ppid_user_code' => $row->no_identitas,
						'ses_ppid_user_foto' => $row->ktp_img,
						'ses_ppid_user_status' => true
					);
					$return = "sukses";
				} else {
					$return = "nonAktif";
				}
			}
			if ($return == "sukses") $this->session->set_userdata($sessionData);
			return $return;
		
		} else {
			return "gagal";
		}
	}
	function detailPengguna($userId){
		$sql = "select * from ppid_pengguna where id_pengguna = '$userId' ";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function detailPenggnuaKode($kode_aktifasi){
		$sql = "select * from ppid_pengguna where activation_code = '$kode_aktifasi' ";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	function cekUsername($username){
		$sql = "select count(*) terhitung from ppid_pengguna where username='$username'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function cekEmail($email){
		$sql = "select count(*) terhitung from ppid_pengguna where email='$email'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function getLastId(){
		$sql = "select max(id_pengguna) as id_pengguna from ppid_pengguna";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	function registrasi($dataInsert){
		return $this->db->insert('ppid_pengguna', $dataInsert);
	}
	
	function penggunaUpdate($dataUpdate, $whereUpdate){
		$this->db->where($whereUpdate);
		return $this->db->update('ppid_pengguna', $dataUpdate);
	}
	function bagianUnit(){
		$sql = "SELECT DISTINCT `bagian_unit` FROM `ppid_pengguna` WHERE bagian_unit <> ''";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function adminList(){
		$sql = "SELECT * FROM ppid_pengguna WHERE role <> 'pemohon' ORDER BY id_pengguna ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}

?>
