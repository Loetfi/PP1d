<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {


    function __construct(){
        parent::__construct();
        // $this->load->model('Unit_model');
        // $this->load->model('Permohonan_model');
        // $this->load->model('unit/Disposisi_model', 'Disposisi_model');
        $this->load->model('auth/User_account_model', 'User_account_model');

        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');

        $this->breadcrumbs->push('Home', '#');
        // $this->breadcrumbs->push('Permohonan', $this->session->userdata('ses_ppid_user_level').'/permohonan');
        // if (!$this->session->userdata('ses_ppid_user_status')) redirect('auth');
    }

    /** List permohonan dengan kondisi menghitung keterlambatan dan status
    **/

    public function bulan($bulan='')
    {

        Switch ($bulan){
            case 1 : $bulan="Januari";
            Break;
            case 2 : $bulan="Februari";
            Break;
            case 3 : $bulan="Maret";
            Break;
            case 4 : $bulan="April";
            Break;
            case 5 : $bulan="Mei";
            Break;
            case 6 : $bulan="Juni";
            Break;
            case 7 : $bulan="Juli";
            Break;
            case 8 : $bulan="Agustus";
            Break;
            case 9 : $bulan="September";
            Break;
            case 10 : $bulan="Oktober";
            Break;
            case 11 : $bulan="November";
            Break;
            case 12 : $bulan="Desember";
            Break;
        }
        return $bulan;

    }
    //
    public function index(){

        
        
        #####

        $data['title'] = 'Rekapitulasi';
        $data['page'] = 'chart/grafik';
		
        $this->breadcrumbs->push('Rekapitulasi', '/'); 
		
        $this->load->view('template/tema',$data);
    }
    
    

    public function indexs()
    { 
        // echo "<pre>";		
        // echo "pojok kiri bawah";

        $query = $this->db->query("SELECT count(*) nilai, sts, tglYm from view_report_all_unit where sts in ('Mandiri','Terusan') and tglYm = 201708 GROUP BY sts, tglYm;")->result_array();

        $kiribawah = $query;
        foreach ($kiribawah as $kb) {
            $kbi = array(
                'colors' => '#058DC7',
                'name' => $kb['sts'],
                'y' => $kb['nilai']
            );
            $kbii[] = $kbi; 
        }

        $data['kiribawah'] = $kbii;

        $data['title'] = 'Dashboard';
        $data['page'] = 'chart/grafik';
        // $data['page'] = 'Permohonan/list'; 
        $this->breadcrumbs->push('List', '/'); 
        // $this->load->view('chart/grafik', $data);
        // $this->load->view('template/tema',$data,FALSE);
        $this->load->view('template/tema',$data);

        exit();


        echo "<br>"; 
        echo "pojok kanan bawah";
        $query = $this->db->query("SELECT a.id_unit, b.nama_unit,
            count(*) nilai, tglYm
            from view_report_all_unit a
            left join ppid_unit b on a.id_unit = b.id_unit
            WHERE 
            a.id_unit is not null 
            and tglYm = 201708 
            GROUP BY a.id_unit, b.nama_unit, tglYm")->result_array();
        print_r($query);

        echo "<br>";
        echo "pojok kiri atas";
        $query = $this->db->query("SELECT * from view_grafik_count_status")->result_array();
        print_r($query);

        // echo "<br>"; 
        // echo "pojok kanan atas";
        // $query = $this->db->query("SELECT * from view_report_all_unit")->result_array();
        // print_r($query);

        $this->load->view('chart/grafik' , $data);
    }

    function getDiagramBatang(){
        $tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
		$sDate = ($tahun * 100);
		$eDate = ($tahun+1)*100;
		$id_unit = $this->session->userdata('ses_ppid_user_unit');
        $query = $this->db->query("
			SELECT 
				count(*) nilai,
				sts,
				tglYm
			FROM view_report_all_unit 
			WHERE tglYm >= '".$sDate."' AND tglYm <= '".$eDate."' 
			AND id_unit = '".$id_unit."'
			GROUP BY sts, tglYm
			ORDER BY tglYm ASC
			")->result_array();
        
        
        foreach($query as $row){
			$bulan = $row['tglYm'] - $sDate;
            if($row['sts'] == 'Terusan') $status = 'Tindakan Terusan';
            else if($row['sts'] == 'Mandiri') $status = 'Tindakan Mandiri';
            else $status = 'Tolak';
            
            $dataBulanan[$status][$bulan] = (int)$row['nilai'];
			
			$status = 'Total Permohonan';
            @$dataBulanan[$status][$bulan] += (int)$row['nilai'];
        }
        
        $dataSeries = array();
        for($bulan=1; $bulan<=12; $bulan++){
            $categories[] = $this->bulan($bulan);
            
            $status = 'Total Permohonan';
            $arrBulanan[$status][] = @$dataBulanan[$status][$bulan];
            
            $status = 'Tindakan Mandiri';
            $arrBulanan[$status][] = @$dataBulanan[$status][$bulan];
            
            $status = 'Tindakan Terusan';
            $arrBulanan[$status][] = @$dataBulanan[$status][$bulan];
            
            $status = 'Tolak';
            $arrBulanan[$status][] = @$dataBulanan[$status][$bulan];
        }
        
        $status = 'Total Permohonan';
        $series[] = array( 'name' => $status,
            'data' => $arrBulanan[$status],
        );
        $status = 'Tindakan Mandiri';
        $series[] = array( 'name' => $status,
            'data' => $arrBulanan[$status],
        );
        $status = 'Tindakan Terusan';
        $series[] = array( 'name' => $status,
            'data' => $arrBulanan[$status],
        );
        $status = 'Tolak';
        $series[] = array( 'name' => $status,
            'data' => $arrBulanan[$status],
        );
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET');
        header('Access-Control-Allow-Headers: Origin');
        header('Content-Type: application/json');
        
        echo $dataReturn = json_encode(
            array(
                'categories' => $categories,
                'series' => $series,
            )
        );
        
        
    }
    
    function getDiagramPieTindakan(){
        $tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
        $bulan = @$_REQUEST['bulan'] != '' ? $_REQUEST['bulan'] : date('m')-1;
		$tglYm = ((int)$tahun * 100) + (int)$bulan;
		$id_unit = $this->session->userdata('ses_ppid_user_unit');
        $query = $this->db->query("
			SELECT 
				count(*) nilai,
				sts,
				tglYm
			FROM view_report_all_unit 
			WHERE tglYm = '".$tglYm."' and id_unit = '".$id_unit."'
			GROUP BY sts, tglYm
			ORDER BY tglYm ASC
			")->result_array();
        
        $dataSeries = array();
        foreach($query as $row){
			
			if($row['sts'] == 'Terusan') $status = 'Terusan';
            else if($row['sts'] == 'Mandiri') $status = 'Mandiri';
            else $status = 'Tolak';
			
            $dataSeries[] = array(
				'name' => $status,
				'y' => (int)$row['nilai']
			);
        }
        
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET');
        header('Access-Control-Allow-Headers: Origin');
        header('Content-Type: application/json');
        
        echo $dataReturn = json_encode(
            array(
                'series' => $dataSeries,
            )
        );
        
        
    }
    function getDiagramPieTerusan(){
        $tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
        $bulan = @$_REQUEST['bulan'] != '' ? $_REQUEST['bulan'] : date('m')-1;
		$tglYm = ((int)$tahun * 100) + (int)$bulan;
		$id_unit = $this->session->userdata('ses_ppid_user_unit');
        $query = $this->db->query("
			SELECT 
				count(*) nilai,
				a.sts,
				a.id_unit,
				b.nama_unit
			from view_report_all_unit a
			left join ppid_unit b on a.id_unit = b.id_unit
			WHERE a.id_unit is not null AND tglYm = '".$tglYm."' and a.id_unit = '".$id_unit."'
			GROUP BY a.sts, a.id_unit, b.nama_unit
			order by tglYm ASC
			")->result_array();
        
        $dataSeries = array();
        foreach($query as $row){
			
            $dataSeries[] = array(
				'name' => $row['nama_unit'],
				'y' => (int)$row['nilai']
			);
        }
        
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET');
        header('Access-Control-Allow-Headers: Origin');
        header('Content-Type: application/json');
        
        echo $dataReturn = json_encode(
            array(
                'series' => $dataSeries,
            )
        );
        
        
    }
    function getDiagramPieSumber(){
        $tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
        $bulan = @$_REQUEST['bulan'] != '' ? $_REQUEST['bulan'] : date('m')-1;
		$tglYm = ((int)$tahun * 100) + (int)$bulan;
		$id_unit = $this->session->userdata('ses_ppid_user_unit');
        $query = $this->db->query("
			select 
				count(*) nilai, sumber 
			FROM view_report_all_unit
			WHERE tglYm = '".$tglYm."' and id_unit = '".$id_unit."'
			GROUP BY sumber
			")->result_array();
        
        $dataSeries = array();
        foreach($query as $row){
			
            $dataSeries[] = array(
				'name' => $row['sumber'],
				'y' => (int)$row['nilai']
			);
        }
        
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET');
        header('Access-Control-Allow-Headers: Origin');
        header('Content-Type: application/json');
        
        echo $dataReturn = json_encode(
            array(
                'series' => $dataSeries,
            )
        );
        
        
    }
    
}

/* End of file Chart.php */
/* Location: ./application/controllers/Chart.php */
