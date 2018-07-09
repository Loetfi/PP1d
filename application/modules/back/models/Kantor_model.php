<?php

class Kantor_model extends CI_Model{
	
	function listKantor(){
		$sql = "SELECT a.*, nama_grup
		FROM kantor a 
		LEFT JOIN kantor_group b ON a.kantor_grup=b.id
		ORDER BY a.id_kantor ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function insertKantor($dataInsert){
		return $this->db->insert('kantor', $dataInsert);
	}
	function detailKantor($id){
		$sql = "SELECT * FROM kantor WHERE id_kantor='$id'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function updateKantor($dataUpdate, $whereUpdate){
		$this->db->where($whereUpdate);
		return $this->db->update('kantor', $dataUpdate);
	}
	
	function grupKantor(){
		$sql = "SELECT * FROM kantor_group ORDER BY id ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function insertGrup($dataInsert){
		return $this->db->insert('kantor_group', $dataInsert);
	}
	function detailGrupKantor($id){
		$sql = "SELECT * FROM kantor_group WHERE id='$id'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function updateGrup($dataUpdate, $whereUpdate){
		$this->db->where($whereUpdate);
		return $this->db->update('kantor_group', $dataUpdate);
	}



	// Contact Form
	var $table          = 'view_contact_form';
	var $column_order   = array( 'id', 'nama','email', 'telepon', 'pekerjaan', 'perusahaan', 'kategori', 'subjek', 'namapekerjaan', 'namakategori');
    	    //set column field database for datatable orderable
    var $column_search  = array( 'id', 'nama','email', 'telepon', 'pekerjaan', 'perusahaan', 'kategori', 'subjek', 'namapekerjaan', 'namakategori'); //set column field database for datatable searchable
    var $order          = array('id' => 'asc'); // default order


    private function _get_datatables_query()
    {

    	$this->db->from($this->table);
        // $this->db->order_by('id','DESC');


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
        	// $this->db->order_by(key($order), $order[key($order)]);
            $this->db->order_by('id','DESC');
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

    // End untuk kebutuhan datatable
	
}

?>
