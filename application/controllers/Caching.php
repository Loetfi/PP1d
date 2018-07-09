<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caching extends CI_Controller {

    public function index()
    {
        $this->load->driver('cache');
        $this->cache->memcached->save('foo', 'bar', 10);        
    }

}

/* End of file Caching.php */
/* Location: ./application/controllers/Caching.php */