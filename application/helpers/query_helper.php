<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function mainmenu()
{
    $ci =& get_instance();
    $query = $ci->db->query("SELECT a.menu_id, a.menu_name, b.menu_detail_id, b.menu_detail_name from menu a
        inner join menu_detail b on a.menu_id = b.menu_id
        where a.language_id = '1' and b.language_id = '1' and a.menu_id not in (2,3,1,7)
        and a.status = '1' and b.status = '1'")->result();
    return $query;
}

function submenu($menu_id)
{
    $ci =& get_instance();
    $query = $ci->db->query("SELECT * FROM menu_detail 
		WHERE menu_id = '$menu_id'
		AND language_id = 1 AND status = '1'
	")->result();
    return $query;
}


function menudetail($menu_detail_id)
{
    $ci =& get_instance();
    $query = $ci->db->query("SELECT * from menu_content a
            inner join master_language b on a.language_id = b.language_id
            where a.menu_detail_id = '$menu_detail_id' and b.language_name = 'ID'
            and a.status = '1' ")->result();
    return $query;
} 
