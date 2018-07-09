<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hak_akses_model extends CI_Model {

	var $table          = 'view_hakakses_grup';
	var $column_order   = array( 'id_group','name' , 'hitung' ); 
    	    //set column field database for datatable orderable
    var $column_search  = array( 'id_group','name' , 'hitung' ); //set column field database for datatable searchable 
    var $order          = array('id_group' => 'asc'); // default order 


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

    // End untuk kebutuhan datatable



    // Detail data table 

    var $table1         = 'view_hakakses_detail';
    // 
    var $column_order1   = array( 'id_menu', 'id_menu_detail', 'id_group', 'name', 'description','nama_menu', 'nama_menu_detail', 'link_menu_detail', 'active' ); 
            //set column field database for datatable orderable
    var $column_search1  = array( 'id_menu', 'id_menu_detail', 'id_group', 'name', 'description','nama_menu', 'nama_menu_detail', 'link_menu_detail', 'active' ); //set column field database for datatable searchable 
    var $order1          = array('id_menu' => 'asc'); // default order 


    public $id;

    private function _get_datatables_query1($id = '')
    {

        $this->db->from($this->table1);  
        $this->db->where('id_group',$id);


        $i = 0;

        foreach ($this->column_search1 as $item) // loop column 
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

                if(count($this->column_search1) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order1))
        {
            $order = $this->order1;
            $this->db->order_by(key($order), $order[key($order)]);  
        }
    }

    function get_datatables1($id)
    {
        $this->_get_datatables_query1($id);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered1($id = '')
    {
        // $this->_get_datatables_query1($id); 

        $this->db->from($this->table1);   
        $this->db->where('id_group',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all1($id = '')
    { 

        // $this->_get_datatables_query1($id); 

        $this->db->from($this->table1);  
        $this->db->where('id_group',$id);
        return $this->db->count_all_results();
    }



/*a.id_menu, a.id_menu_detail, a.id_group, b.name, b.description,
c.nama_menu, d.nama_menu_detail, d.link_menu_detail, d.active*/


public function cekHak($groupid='', $uri = '')
{

    $d = $this->db->query("SELECT * from users_groups where user_id = '$groupid' ")->row();
    $group = $d->group_id;

    $q = $this->db->query("SELECT b.*, c.* from hakakses a
     inner join master_menu_admin b on a.id_menu = b.id_menu
     inner join master_menu_detail_admin c on a.id_menu_detail = c.id_menu_detail
     inner join users_groups d on a.id_group = d.group_id
     where a.id_group = '$group' and link_menu_detail like '%$uri%'");

    return $q->row();

}


    // tambah
public function getgrupaddrole($value='')
{
    $query =  $this->db->query("SELECT * from groups a 
        where id not in (select id_group from hakakses GROUP BY id_group )");
    return $query->result();
}


// masukin hak akses 
function insert($data) { 
    return $this->db->insert('hakakses', $data);
}







    // Detail data table 

var $table2       = 'view_not_in_hakakses';
    // 
var $column_order2   = array( 'id_menu', 'nama_menu', 'id_menu_detail', 'nama_menu_detail' ); 
            //set column field database for datatable orderable
    var $column_search2  = array( 'id_menu', 'nama_menu', 'id_menu_detail', 'nama_menu_detail' ); //set column field database for datatable searchable 
    var $order2          = array('id_menu' => 'asc'); // default order 


    private function _get_datatables_query2($id = '')
    { 

        $this->db->from($this->table2);  
        $this->db->where("id_menu_detail not in (select id_menu_detail from hakakses where id_group = '$id')", NULL, FALSE);  

        $i = 0;

        foreach ($this->column_search2 as $item) // loop column 
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

                if(count($this->column_search2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order2))
        {
            $order = $this->order2;
            $this->db->order_by(key($order), $order[key($order)]);  
        }
    }

    function get_datatables2($id)
    {
        $this->_get_datatables_query2($id); 
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered2($id)
    {
        // $this->_get_datatables_query2($id); 
        $this->db->from($this->table2);  
        $this->db->where("id_menu_detail not in (select id_menu_detail from hakakses where id_group = '$id')", NULL, FALSE);  

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all2($id)
    {
        // $this->db->from($this->table2); 
        $this->db->from($this->table2);  
        $this->db->where("id_menu_detail not in (select id_menu_detail from hakakses where id_group = '$id')", NULL, FALSE);  

        return $this->db->count_all_results();
    }



}

/* End of file Hak_akses_model.php */
/* Location: ./application/modules/back/models/Hak_akses_model.php */