<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengguna_model extends CI_Model{
    
    function list_pengguna(){
        $sql = "SELECT a.*, b.nama_unit
        FROM ppid_pengguna a
        LEFT JOIN ppid_unit b
            ON a.id_unit = b.id_unit
        ";
		$query = $this->db->query($sql);
		return $query->result_array();
    }
    
    function insert_pengguna($data_insert){
        return $this->db->insert('ppid_pengguna', $data_insert);
    }
    
    function detail_pengguna($id){
        $sql = "SELECT * FROM ppid_pengguna WHERE id_pengguna = $id";
		$query = $this->db->query($sql);
		return $query->row_array();
    }
    
    function update_pengguna($data_update, $where_update){
        $this->db->where($where_update);
		return $this->db->update('ppid_pengguna', $data_update);
    }
    
}

?>