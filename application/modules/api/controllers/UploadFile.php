<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadFile extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function index()
    {
        echo "<i>Sukses! terhubung ke servis unggah berkas...</i>";
    }
	
	public function unggah_berkas()
	{
		$posting = $this->input->post();
		echo "<pre>"; print_r($posting); exit;
	}
}