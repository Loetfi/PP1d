<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Unit_model extends CI_Model{
    
    function list_unit($where = array()){
        if (count($where) > 0) $this->db->where($where);
        
        $this->db->select('*');
        $this->db->from('ppid_unit');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function insert_unit($data_insert){
        return $this->db->insert('ppid_unit', $data_insert);
    }
    
    function detail_unit($id){
        $sql = "SELECT * FROM ppid_unit WHERE id_unit = $id";
		$query = $this->db->query($sql);
		return $query->row_array();
    }
    
    function update_unit($data_update, $where_update){
        $this->db->where($where_update);
		return $this->db->update('ppid_unit', $data_update);
    }
    
    function list_unit_all(){
        $sql = "select * from ppid_unit WHERE id_parent = 0 ORDER BY nama_unit ASC";
        $query = $this->db->query($sql)->result_array();
        $i=0;
		foreach($query as $row){
            $allArr['head'][$i] = $row;
            // echo $row['id_unit'].'|'.$row['nama_unit'].'<br>';
            $where = array('id_parent' => $row['id_unit']);
            $subUnit = $this->list_unit($where);
            $j=0;
            foreach($subUnit as $subRow){
                $allArr['child'][$i][$j] = $subRow;
                // echo '->->'.$subRow['id_unit'].'|'.$subRow['nama_unit'].'<br>';
                $j++;
            }
            // echo '<hr>';
            $i++;
        }
        return $allArr;
    }
    
    
}

?>