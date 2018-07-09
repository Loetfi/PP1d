<?php

class Category_model extends CI_Model{
	
	function listCategory($number,$offset){
		
		if ($number == 0 and $offset == 0) {
			return $this->db->get('master_category');	
		} else {
			$this->db->select("a.*, b.first_name as namadepan1, b.last_name as namabelakang1 , c.first_name as anamadepan2, c.last_name as namabelakang2")
			->from("master_category as a")
			// ->join("") 
			->join('users as b', 'b.id = a.create_user','left')
			->join('users as c', 'c.id = a.update_user','left')
			->limit($number)
			->offset($offset);
			return $this->db->get()->result_array(); //->num_rows();
		} 
	}
	
	function insertCategory($dataInsert){
		return $this->db->insert('master_category', $dataInsert);
	}
	
	function detailCategory($id){
		$this->db->select('*')->from('master_category')->where('category_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function updateCategory($dataUpdate, $whereUpdate) {
		$this->db->where($whereUpdate);
		return $this->db->update('master_category', $dataUpdate);
	}
 
 


    // permainan untuk data tables.
    // dimulai dari sini
    var $table          = 'view_category';
    var $column_order   = array('category_id' , 'category_name', 'status' , 'namadepan1',  'namabelakang1' ,'namadepan2' , 'namabelakang2', 'create_date'          ,'update_date','relasi'); //set column field database for datatable orderable
    var $column_search  = array('category_id' , 'category_name', 'status' , 'namadepan1',  'namabelakang1' ,'namadepan2' , 'namabelakang2', 'create_date'          ,'update_date','relasi'); //set column field database for datatable searchable 
    var $order          = array('category_id' => 'desc'); // default order 
  
 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table); 
      
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
  



}

?>
