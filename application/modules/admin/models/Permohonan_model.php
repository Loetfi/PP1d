<?php 
class Permohonan_model extends CI_Model{
    
    /** List seluruh permohonan
    termasuk yang dibuat oleh Unit **/
    function list_permohonan(){
        if ($this->session->userdata('ses_ppid_user_level') == 'admin'){
			$sql = "select 
				a.*, 
				(select role FROM ppid_pengguna WHERE id_pengguna = a.id_pengguna) role, 
				(select nama FROM ppid_pengguna WHERE id_pengguna = a.id_pengguna) nama
			from ppid_permohonan a
			order by cdate DESC";
		}
		else if ($this->session->userdata('ses_ppid_user_level') == 'pemohon'){
			$userId = $this->session->userdata('ses_ppid_user_id');
			$sql = "select 
                a.*,
                (select role FROM ppid_pengguna WHERE id_pengguna = a.id_pengguna) role, 
				(select nama FROM ppid_pengguna WHERE id_pengguna = a.id_pengguna) nama
            from ppid_permohonan a
			WHERE id_pengguna = '".$userId."'
			order by cdate DESC";
		}
		else if ($this->session->userdata('ses_ppid_user_level') == 'unit'){
			$unit = $this->session->userdata('ses_ppid_user_unit');
			$sql = "select 
				b.no_permohonan,
				b.subjek,
				b.cdate,
				b.pdate,
				
				a.status,
				a.cdate tglDispos,
				a.mdate updDispos,
				(select nama FROM ppid_pengguna WHERE id_pengguna = a.id_admin ) nama_admin,
				(select nama FROM ppid_pengguna WHERE id_pengguna = a.id_admin_unit ) nama_unit
			from ppid_dispos a
			LEFT JOIN ppid_permohonan b ON a.no_permohonan=b.no_permohonan
			WHERE a.unit_tujuan = '$unit'
			
			UNION ALL
			SELECT 
				a.no_permohonan,
				a.subjek,
				a.cdate,
				a.pdate,
				a.status,
				null,
				a.mdate,
				(select nama FROM ppid_pengguna WHERE id_pengguna = a.id_pengguna) nama_admin,
				(select nama FROM ppid_pengguna WHERE id_pengguna = a.id_pengguna ) nama_unit
			FROM ppid_permohonan a
			WHERE id_pengguna = '".$this->session->userdata('ses_ppid_user_id')."'

			ORDER BY cdate DESC
			";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
    }
    
    function getLastNoPermohonan(){
        $sql = "select max(no_permohonan) as no_permohonan 
		from ppid_permohonan 
		where no_permohonan like 'ESDM-PPID/".date('Y/m/d')."%'";
		$query = $this->db->query($sql);
		return $query->row_array();
    }
    
    function insert_permohonan($data_insert){
        return $this->db->insert('ppid_permohonan', $data_insert);
    }
    function detail_permohonan($no_permohonan){
        $sql = "SELECT a.*
		FROM ppid_permohonan a
		WHERE no_permohonan = '$no_permohonan'";
		$query = $this->db->query($sql);
		return $query->row_array();
    }
    function update_permohonan($data_update, $where){
		$this->db->where($where);
		return $this->db->update('ppid_permohonan', $data_update);
	}
    
	function insert_permohonan_disposisi($data_insert){
		return $this->db->insert('ppid_dispos', $data_insert);
	}
	
    function insert_balasan_permohonan($data_insert){
        return $this->db->insert('ppid_permohonan_balasan', $data_insert);
    }
    function detail_balasan_permohonan($no_permohonan){
        $sql = "SELECT *
        FROM ppid_permohonan_balasan
        WHERE no_permohonan = '$no_permohonan'
        ";
        $query = $this->db->query($sql);
		return $query->row_array();
    }
    
    
    function list_permohonan_log($no_permohonan){
        $sql = "select a.*, b.nama, b.username
		from ppid_permohonan_log a
		LEFT JOIN ppid_pengguna b ON a.id_admin = b.id_pengguna
		WHERE no_permohonan = '$no_permohonan'
		order by cdate asc";
		$query = $this->db->query($sql);
		return $query->result_array();
    }
    function insert_permohonan_log($data_insert){
        return $this->db->insert('ppid_permohonan_log', $data_insert);
    }
    
    function detail_disposisi_permohonan($no_permohonan){
        
        $sql = "SELECT 
            GROUP_CONCAT(b.nama_unit) nama_unit,
            a.sifat, 
            a.catatan, 
            a.file_nameasli, 
            a.file_pendukung, 
            a.cdate
        FROM ppid_dispos a
        LEFT JOIN ppid_unit b ON b.id_unit = a.unit_tujuan
        WHERE no_permohonan = '$no_permohonan'
        ";
        $query = $this->db->query($sql);
		return $query->row_array();
    }
    function list_disposisi_permohonan($no_permohonan){
        
        if ($this->session->userdata('ses_ppid_user_level') == 'admin'){
            $sql = "SELECT a.*, b.nama_unit
            FROM ppid_dispos a
            LEFT JOIN ppid_unit b 
                ON a.unit_tujuan = b.id_unit
            WHERE no_permohonan = '$no_permohonan'
            ORDER BY dispos_id ASC
            ";
        }
        else if ($this->session->userdata('ses_ppid_user_level') == 'unit'){
            $sql = "SELECT a.*, b.nama_unit
            FROM ppid_dispos a
            LEFT JOIN ppid_unit b 
                ON a.unit_tujuan = b.id_unit
            WHERE no_permohonan = '$no_permohonan'
                AND a.unit_tujuan = '".$this->session->userdata('ses_ppid_user_unit')."'
            ORDER BY dispos_id ASC
            ";
        }
        else if ($this->session->userdata('ses_ppid_user_level') == 'pemohon'){
            $sql = "SELECT a.*, b.nama_unit
            FROM ppid_dispos a
            LEFT JOIN ppid_unit b 
                ON a.unit_tujuan = b.id_unit
            WHERE no_permohonan = '$no_permohonan'
                AND a.unit_tujuan = '".$this->session->userdata('ses_ppid_user_unit')."'
            ORDER BY dispos_id ASC
            ";
        }
        $query = $this->db->query($sql);
		return $query->result_array();
    }
    
    function search_file_permohonan($filename){
		$sql = "
			SELECT 
				file_pendukung, file_nameasli 
			FROM ppid_permohonan 
			WHERE file_pendukung like '%".$filename."%'
			LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
    function search_file_disposisi($filename){
		$sql = "SELECT 
            GROUP_CONCAT(b.nama_unit) nama_unit,
            a.catatan, 
            a.file_nameasli, 
            a.file_pendukung, 
            a.cdate
        FROM ppid_dispos a
        LEFT JOIN ppid_unit b ON b.id_unit = a.unit_tujuan
        WHERE file_pendukung like '%".$filename."%'
        ";
        $query = $this->db->query($sql);
		return $query->row_array();
	}
    function search_file_balasan_disposisi($filename){
		$sql = "SELECT 
            GROUP_CONCAT(b.nama_unit) nama_unit,
            a.catatan, 
            a.file_replayasli file_nameasli, 
            a.file_replay file_pendukung, 
            a.cdate
        FROM ppid_dispos a
        LEFT JOIN ppid_unit b ON b.id_unit = a.unit_tujuan
        WHERE file_replay like '%".$filename."%'
        ";
        $query = $this->db->query($sql);
		return $query->row_array();
	}
	function search_file_balasan_permohonan($filename){
		$sql = "
			SELECT 
				file_pendukung, file_nameasli 
			FROM ppid_permohonan_balasan
			WHERE file_pendukung like '%".$filename."%'
			LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
    
	
}

?>