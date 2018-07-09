<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->helper('uri');
        echo current_url();
    }

    public function tes($value='')
    {
        echo "oke"; 
    }

    ###############
    public function front()
    {
        $data = array(
            'title' => 'test' , );
        $this->load->view('api/front', $data, FALSE);
    }

    public function mockup($slug)
    {
        $data = array(
            'title' => 'test' , );
        if ($slug == 'depan') {
            $this->load->view('mockup/buatdepan', $data, FALSE);
        } elseif ($slug == 'sejarah') {
            $this->load->view('mockup/sejarah', $data, FALSE);
        } 
    }

}

/* End of file Api.php */
/* Location: ./application/modules/Api/controllers/Api.php */