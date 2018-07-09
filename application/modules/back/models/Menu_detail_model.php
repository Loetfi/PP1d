<?php

class Menu_detail_model extends CI_Model{
	
	function listMenuDetail(){
		$sql = "SELECT * FROM view_menu_detail ORDER BY menu_detail_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function lastId(){
		$sql = "SELECT max(menu_detail_id) menu_detail_id FROM menu_detail";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function insertMenuDetail($dataInsert){
		return $this->db->insert('menu_detail', $dataInsert);
	}
	function detailMenuDetail($id){
		$sql = "
		SELECT a.* FROM menu_detail a
		LEFT JOIN master_language c
			ON a.language_id = c.language_id
		WHERE c.status = '1' 
			AND menu_detail_id = '$id'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function updateMenuDetail($dataUpdate, $whereUpdate) {
		$this->db->where($whereUpdate);
		return $this->db->update('menu_detail', $dataUpdate);
	}
	
####################################################
	// permainan untuk data tables.
    // dimulai dari sini
    var $table          = 'view_menu_detail';
    var $column_order   = array('menu_detail_id', 'menuName', 'menuDetailName', 'title', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2',); //set column field database for datatable orderable
    var $column_search  = array('menu_detail_id', 'menuName', 'menuDetailName', 'title', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2',); //set column field database for datatable orderable
    var $order          = array('menu_detail_id' => 'asc'); // default order 
	
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
