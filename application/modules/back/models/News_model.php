<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

	// permainan untuk data tables.
    // dimulai dari sini
	var $table          = 'view_news';
	var $column_order   = array( 'id',
      'judul','category_id' , 'datepost', 'slug', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2','relasi','namabu');
    	    //set column field database for datatable orderable
    var $column_search  = array( 'id', 'judul', 'category_id' , 'datepost', 'slug', 'status', 'create_date', 'namadepan1', 'namabelakang1', 'update_date', 'namadepan2', 'namabelakang2','relasi','namabu'); //set column field database for datatable searchable
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



   	// Start Custome function
   	public function getLangNews()
   	{
   		$this->db->select('*')
   				 ->from('master_language')
   				 ->where('status','1');
   		$query = $this->db->get();
   		return $query->result();
   		// end
   		// penggunaan
   		// $this->News_model->getLang()

   	}

    public function getKategori()
    {
        $this->db->select('*')
        ->from('master_category')
        ->where('status','1');
        $query = $this->db->get();
        return $query->result();
    }



    // Edit News Function
    public function edit_news($id , $bhs)

    /*
SELECT b.language_name, a.* FROM news_content a
LEFT JOIN master_language b ON a.language_id = b.language_id
WHERE a.id = '1'*/
    {
        $this->db->select('b.language_name, a.*')
                ->from('news_content as a')
                ->join('master_language as b', 'a.language_id = b.language_id')
                ->where('a.id',$id)
                ->where('b.language_name' , $bhs)
                ;
        $query = $this->db->get();
        return $query->row();
    }



		public function getbisnisunit()
		{
				$this->db->select('*')
								->from('master_bisnis_unit as a')
								// ->join('master_language as b', 'a.language_id = b.language_id')
								->where('a.status_bu',1)
								;
				$query = $this->db->get();
				return $query->result();
		}
		
		
		

function getDetail($detail){
    $sql = "SELECT category_id, category_name,relasi,status from master_category
    where status = '1' and relasi = '$detail'
    ";
    $query = $this->db->query($sql);
    return $query->result();
}





    // Input News
   /* public function inputnews($value='')
    {
    }*/
}

/* End of file News_model.php */
/* Location: ./application/modules/back/models/News_model.php */
