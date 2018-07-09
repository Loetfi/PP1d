
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tatacara extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Tata Cara',
            );
		$data['page']       = 'front/tatacara'; 
        // $this->load->view('api/front', $data, FALSE);  assets/assets_frontend/media/general
        $this->load->view('template/tema', $data);
    }

}



/* End of file Front.php */
/* Location: ./application/controllers/Front.php */
