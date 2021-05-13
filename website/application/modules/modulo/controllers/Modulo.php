<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Modulo extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $this->load->model('modulo_model');
        $array = $this->modulo_model->getModulos();

        $this->response($array, 200);
    }
}