<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

  public function getMenuDetail($id , $bahasa, $batas)
  {
    if (isset($batas)) { $limit = "limit $batas"; } else { $limit = ''; }
    $query = $this->db->query("SELECT * from menu_content a
      inner join master_language b on a.language_id = b.language_id
      where a.menu_detail_id = '$id' and b.language_name = '$bahasa'
      and a.status = '1' $limit")->result();
    return $query;
  }

    // get news per kategori
  public function getNewsperKat($kategori , $language , $batas)
  {
    if (isset($batas)) { $limit = "limit $batas"; } else { $limit = ''; }

    $query = $this->db->query("SELECT * from news_content a 
      inner join master_language b on a.language_id = b.language_id 
      where a.category_id = '$kategori' and b.language_name = '$language' and a.status = '1'  
      order by a.datepost desc $limit")->result();
    return $query;
  }

  // get news detail
  public function getNewsDetail($tahun, $bulan , $slug)
  {
    // if (isset($batas)) { $limit = "limit $batas"; } else { $limit = ''; }

    $query = $this->db->query(" SELECT * from news_content a 
      inner join master_language b on a.language_id = b.language_id 
      where b.language_name = 'ID' and month(a.datepost) = '$bulan' and year(a.datepost) = '$tahun'
      and a.slug = '$slug' and a.status = '1'")->row();
    return $query;
  }

   // get paer page
  public function gerperpage($slugpage)
  {
   $query = $this->db->query("SELECT * from menu_content a
    inner join master_language b on a.language_id = b.language_id  and b.language_name = 'ID' and a.slug = '$slugpage' and a.status = '1' ")->row_array();

   return $query;
 }


//search news for news modul front 
public function SearchNewsperKat($kategori , $language , $batas , $keyword)
  {
    if (isset($batas)) { $limit = "limit $batas"; } else { $limit = ''; }

    $query = $this->db->query("SELECT * from news_content a 
      inner join master_language b on a.language_id = b.language_id 
      where a.category_id = '$kategori' and b.language_name = '$language' and a.status = '1'  
      and a.title like '%$keyword%'
      order by a.datepost desc $limit")->result();
    return $query;
  }

// get category for news 
 public function category()
 {
   $query = $this->db->query("SELECT category_id ,category_name ,status , slugkategori from master_category where status = 1 ")->result();
   return $query;
 }

   // get news per kategori
 public function getSliderHome($id , $bahasa, $batas)
 {
  if (isset($batas)) { $limit = "limit $batas"; } else { $limit = ''; }

  $query = $this->db->query("SELECT a.* , b.*  from menu_content a
    inner join master_language b on a.language_id = b.language_id
    where a.menu_detail_id = '$id' and b.language_name = '$bahasa'
    and a.status = '1' 
    $limit
    order by a.create_date desc ")->result(); 
  return $query;
}


}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */
