<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahan_ion_model extends CI_Model {


	public function getUser($id)
	{
		$this->db->select("count(id) as hitung")
				->from('users')
				->where('id',"$id"); 
		$query = $this->db->get(); 
		return $query->row(); 
	}
 	

 	public function search($q)
 	{
 		$this->db->select("*")
				->from("users")
				->like("username", "$q", "both")
				->like("email","$q","both");
		$query = $this->db->get();
		return $query->result();  
 	}

// class M_data extends CI_Model{
// 	function data($number,$offset){
// 		return $query = $this->db->get('user',$number,$offset)->result();		
// 	}
 
	public function dataGroups($number,$offset){
		if ($number == 0 and $offset == 0) {
			return $this->db->get('groups');	
		} else {
			return $this->db->get('groups',$number,$offset); //->num_rows();
		}
	} 




	// permainan untuk data tables.
    // dimulai dari sini
    var $table          = 'view_users';
    var $column_order   = array('user_id', 'username','first_name', 'last_name' , 'active','name','description', 'email' ); //set column field database for datatable orderable
    var $column_search  = array('user_id', 'username','first_name',  'last_name' , 'active','name','description', 'email'); //set column field database for datatable searchable 
    var $order          = array('user_id' => 'asc'); // default order 
  
 
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

/* End of file Tambahan_ion_model.php */
/* Location: ./application/modules/back/models/Tambahan_ion_model.php */