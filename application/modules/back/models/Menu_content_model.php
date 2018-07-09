<?php

class Menu_content_model extends CI_Model{
	
	function listContent($idMenuDetail){
		$sql = "
		SELECT * FROM view_menu_content
		WHERE menu_detail_id = '".$idMenuDetail."'
		ORDER BY position ASC, content_id ASC, menu_detail_id ASC
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function lastId(){
		$sql = "SELECT max(content_id) content_id FROM menu_content";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	function insertContent($dataInsert){
		return $this->db->insert('menu_content', $dataInsert);
	}
	
	function listContentDetail($id){
		$sql = "
		SELECT a.*, c.language_name
		FROM menu_content a
		LEFT JOIN master_language c
			ON c.language_id = a.language_id
		WHERE c.status = '1'
			AND a.content_id = '$id'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function detailContent($id){
		$sql = "
		SELECT * FROM menu_detail
		WHERE menu_detail_id = '$id'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function updateContent($dataUpdate, $whereUpdate) {
		$this->db->where($whereUpdate);
		return $this->db->update('menu_content', $dataUpdate);
	}
	
####################################################
	// permainan untuk data tables.
    // dimulai dari sini
    var $tableMenuDetail       = 'view_menu_detail';
    var $columnOrderMenuDetail = array('menu_detail_id', 'menuName', 'menuDetailName', 'title', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2' ); //set column field database for datatable orderable
    var $columnSearch          = array('menu_detail_id', 'menuName', 'menuDetailName', 'title', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2' ); //set column field database for datatable orderable
    var $orderMenuDetail       = array('menu_detail_id' => 'asc'); // default order 
	
	function _get_datatables_query_menu_detail(){
		$this->db->from($this->tableMenuDetail);
		$i = 0;
		foreach ($this->columnSearch as $item){ // loop column 
			if($_POST['search']['value']){ // if datatable send POST for search
				
				if($i===0){ // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				
				if(count($this->columnSearch) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
	}
	function get_datatables_menu_detail(){
        $this->_get_datatables_query_menu_detail();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }
	function count_filtered_menu_detail(){
        $this->_get_datatables_query_menu_detail();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_menu_detail(){
        $this->db->from($this->tableMenuDetail);
        return $this->db->count_all_results();
    }
####################################################
	
####################################################
	// permainan untuk data tables.
    // dimulai dari sini
    var $table          = 'view_menu_content';
    var $column_order   = array('content_id', 'title', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2',); //set column field database for datatable orderable
    var $column_search  = array('content_id', 'title', 'position', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2',); //set column field database for datatable orderable
    var $order          = array('position' => 'DESC'); // default order 

    // var $idMenuDetail = $idMenuDetail; 
	
	function _get_datatables_query($idMenuDetail){
		$this->db->from($this->table);
		$this->db->where(array('menu_detail_id' => $idMenuDetail));
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
	function get_datatables($idMenuDetail){
		$this->db->where(array('menu_detail_id' => $idMenuDetail));
		$this->db->order_by('position', 'ASC');
        $this->_get_datatables_query($idMenuDetail);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }
	function count_filtered($idMenuDetail){
        // $this->_get_datatables_query(); 
        $this->db->from($this->table);
		$this->db->where(array('menu_detail_id' => $idMenuDetail));
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all($idMenuDetail){

        $this->db->from($this->table);
		$this->db->where(array('menu_detail_id' => $idMenuDetail));
        // $this->db->from($this->table);
		// $this->db->where(array('menu_detail_id' => 20)); 
        return $this->db->count_all_results(); 
    }
####################################################
}

?>
