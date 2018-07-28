<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	function res($statusHeader,$status , $message, $data )
	{ 
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Access-Control-Allow-Methods: POST, GET'); 
		$this->output->set_header('Access-Control-Allow-Headers: Origin');
		$this->output->set_content_type('application/json');
		$this->output->set_status_header($statusHeader);
		$this->output->set_output(json_encode(array ('status' => $status , 'message' =>  $message , 'data' => $data)));
		$this->output->_display();
		exit();
	}


	function grafik_batang(){

		$tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
		$this->data['res'] = $this->dashboard_model->grafik_batang($tahun);
		try {  

			foreach($this->data['res'] as $row){
				if($row['status'] == 'Pending') $status = 'Total Permohonan';
				else if($row['status'] == 'Proses') $status = 'Tindakan Mandiri';
				else if($row['status'] == 'Disposisi') $status = 'Tindakan Disteruskan ke Unit';
				else $status = 'Tolak';

				$dataBulanan[$status][$row['bulan']] = (int)$row['nilai'];
			}

			$dataSeries = array();
			for($bulan=1; $bulan<=12; $bulan++){
				$categories[] = $this->bulan($bulan);

				$status = 'Total Permohonan';
				$arrBulanan[$status][] = @$dataBulanan[$status][$bulan];

				$status = 'Tindakan Mandiri';
				$arrBulanan[$status][] = @$dataBulanan[$status][$bulan];

				$status = 'Tindakan Disteruskan ke Unit';
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
			$status = 'Tindakan Disteruskan ke Unit';
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

			$response = array(
				'categories' => $categories,
				'series' => $series);

			$this->res(200, 1, 'Success', $response);
			
		} catch (Exception $e) {
			$this->res(400, 0, 'Failed', $e->getMessage());
		} 

	}

	// diagram batang unit 

	function grafik_batang_unit() {

		$tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');

		if (!is_numeric($tahun)) {
			$this->res(400, 0, 'Failed', []);
		}

		$sDate = ($tahun * 100);
		$eDate = ($tahun+1)*100;
		$id_unit = 1;
		$this->data['res'] = $this->dashboard_model->grafik_batang_by_unit($sDate , $eDate, $id_unit);

		try { 

			foreach($this->data['res'] as $row){
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

			$response =  
			array(
				'categories' => $categories,
				'series' => $series
			);
			$this->res(200, 1, 'Success', $response);

		} catch (Exception $e) {
			$this->res(400, 0, 'Failed', $e->getMessage());
		} 


	}


	// diagram pie 
	function grafik_pie_tindakan(){

		$tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
		$bulan = @$_REQUEST['bulan'] != '' ? $_REQUEST['bulan'] : date('m')-1;

		if (!is_numeric($tahun) OR !is_numeric($bulan)) {
			$this->res(400, 0, 'Failed', []);
			exit();
		}

		$tglYm = ((int)$tahun * 100) + (int)$bulan;
		$this->data['res'] = $this->dashboard_model->grafik_pie_tindakan($tglYm);

		try { 

			$dataSeries = array();
			foreach($this->data['res'] as $row){

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

			$response = array(
				'series' => $dataSeries );

			$this->res(200 , 1, 'Success' , $response);

		} catch (Exception $e) {
			$this->res(400, 0, 'Failed', $e->getMessage());
		}


	}

    // getDiagramPieTerusan
	####.  api/dashboard/grafik_pie_terusan?tahun=2017&bulan=11

	function grafik_pie_terusan(){
		$tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
		$bulan = @$_REQUEST['bulan'] != '' ? $_REQUEST['bulan'] : date('m')-1;

		if (!is_numeric($tahun) OR !is_numeric($bulan)) {
			$this->res(400, 0, 'Failed', []);
			exit();
		}

		$tglYm = ((int)$tahun * 100) + (int)$bulan;
		$this->data['res'] = $this->dashboard_model->diagram_pie_terusan($tglYm);

		try {
			$dataSeries = array();
			foreach($this->data['res'] as $row){

				$dataSeries[] = array(
					'name' => $row['nama_unit'],
					'y' => (int)$row['nilai']
				);
			} 

			$response = array(
				'series' => $dataSeries,
			);

			$this->res(200, 1, 'Success', $response);

		} catch (Exception $e) {
			$this->res(400, 0, 'Failed', $e->getMessage());
		}


	}

	/// getDiagramPieSumber
 	## api/dashboard/grafik_pie_sumber?tahun=2017&bulan=12

	function grafik_pie_sumber(){

		$tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
		$bulan = @$_REQUEST['bulan'] != '' ? $_REQUEST['bulan'] : date('m')-1;

		if (!is_numeric($tahun) OR !is_numeric($bulan)) {
			$this->res(400, 0, 'Failed', []);
			exit();
		}

		$tglYm = ((int)$tahun * 100) + (int)$bulan;
		$this->data['res'] = $this->dashboard_model->diagram_pie_sumber($tglYm);

		try {
			$dataSeries = array();
			foreach($this->data['res'] as $row){

				$dataSeries[] = array(
					'name' => $row['sumber'],
					'y' => (int)$row['nilai']
				);
			} 

			$response = array(
				'series' => $dataSeries,
			);

			$this->res(200, 1, 'Success', []);

		} catch (Exception $e) {
			$this->res(400, 0, 'Failed', $e->getMessage());
		}

	}


    // getDiagramPieTolak
	#### api/dashboard/grafik_pie_sumber?tahun=2018&bulan=12
	function grafik_pie_tolak(){

		$tahun = @$_REQUEST['tahun'] != '' ? $_REQUEST['tahun'] : date('Y');
		$bulan = @$_REQUEST['bulan'] != '' ? $_REQUEST['bulan'] : date('m')-1;

		if (!is_numeric($tahun) OR !is_numeric($bulan)) {
			$this->res(400, 0, 'Failed', []);
			exit();
		}

		$tglYm = ((int)$tahun * 100) + (int)$bulan;
		$this->data['res'] = $this->dashboard_model->grafik_pie_tolak($tglYm);

		try {

			$dataSeries = array();
			foreach($this->data['res'] as $row){

				$dataSeries[] = array(
					'name' => $row['sts'],
					'y' => (int)$row['nilai']
				);
			} 

			$response =
			array(
				'series' => $dataSeries
			);

			$this->res(200, 1, 'Success', $response);

		} catch (Exception $e) {
			$this->res(400, 0, 'Failed', $e->getMessage());
		}


	}


    // bulan 
	function bulan($bulan='')
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

}

/* End of file Dashboard.php */
/* Location: ./application/modules/api/controllers/Dashboard.php */
