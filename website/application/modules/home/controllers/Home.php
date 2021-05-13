<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
    private $configuracoes;

    function __construct()
    {
        parent::__construct();
        $this->load->model('configuracoes_model');
        $array = $this->configuracoes_model->getConfigs();
        if (isset($array["error"])) {
            echo $array["error"];
            exit();
        } else {
            $this->configuracoes = array();
            foreach ($array as $config) {
                $this->configuracoes[$config->nome] = $config->valor;
            }

            $this->configuracoes = (object) $this->configuracoes;
        }
    }

    public function index()
    {
        $data["configuracoes"] = $this->configuracoes;
        $this->load->model('home_model');
        $data["imagens"] = $this->home_model->getImages();
        $this->loadView("home", $data);
    }

    public function loadView($view, $data = [])
    {
        $this->load->view('templates/header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer', $data);
    }
}
