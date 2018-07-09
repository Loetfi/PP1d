<?php 
class Disposisi_model extends CI_Model{
    
    /** List disposisi unit
    dari sisi unit **/
    function list_disposisi($id_unit=null){}
    
    function insert_disposisi($data_insert){
		return $this->db->insert('ppid_dispos', $data_insert);
	}
    
    /** List Disposisi permohonan **/
    function list_disposisi_permohonan($no_permohonan){}
    
    function update_disposisi($data_update, $where){
        $this->db->where($where);
		return $this->db->update('ppid_dispos', $data_update);
    }
    
}

?>