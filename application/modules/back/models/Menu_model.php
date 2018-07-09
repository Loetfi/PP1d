<?php

class Menu_model extends CI_Model{
	
	function listMenu(){
		$sql = "SELECT * FROM view_menu where status = '1'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function lastId(){
		$sql = "SELECT max(menu_id) menu_id FROM menu";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	function insertMenu($dataInsert){
		return $this->db->insert('menu', $dataInsert);
	}
	
	function detailMenu($id){
		$sql = "
		SELECT a.*, b.language_name
		FROM master_language b
		LEFT JOIN menu a
			ON a.language_id = b.language_id
		WHERE menu_id = '$id'
		ORDER BY b.language_id ASC
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function updateMenu($dataUpdate, $whereUpdate) {
		$this->db->where($whereUpdate);
		return $this->db->update('menu', $dataUpdate);
	}
	
####################################################
	// permainan untuk data tables.
    // dimulai dari sini
    var $table          = 'view_menu';
    var $column_order   = array('menu_id', 'menuName', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2',); //set column field database for datatable orderable
    var $column_search  = array('menu_id', 'menuName', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2',); //set column field database for datatable orderable
    var $order          = array('menu_id' => 'asc'); // default order 
	
	function _get_datatables_query(){
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item){ // loop column 
			if($_POST['search']['value']){ // if datatable send POST for search
				
				if($i===0){ // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				
				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
	}
	function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }
	function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
####################################################

}

?>
