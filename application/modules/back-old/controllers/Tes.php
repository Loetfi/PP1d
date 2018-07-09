<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

    public function index()
    {
        // echo "oke";
		$this->load->view('template', @$data, FALSE);
    }

}

/* End of file Tes.php */
/* Location: ./application/modules/Back/controllers/Tes.php */