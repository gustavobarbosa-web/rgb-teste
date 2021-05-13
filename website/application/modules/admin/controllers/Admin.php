<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
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
        $this->load->model("admin_model");
        if ($_POST) {
            if (!$_POST["login"] || !$_POST["senha"]) {
                $data["error"] = "Preencha todos os campos!";
            } else {
                $usuario = $this->admin_model->getUsuario($_POST["login"]);
                if (!$usuario) {
                    $data["error"] = "Usuário não encontrado!";
                } else {
                    if (!password_verify($_POST["senha"], $usuario->senha)) {
                        $data["error"] = "Senha incorreta!";
                    } else {
                        $_SESSION["login"] = $usuario->login;
                    }
                }
            }
        }

        if (!isset($_SESSION["login"])) {
            $this->load->view("login", $data);
            return true;
        }

        $data["imagens"] = $this->admin_model->getImages();
        $this->loadView("painel", $data);
    }

    public function cadastro()
    {
        if ($_POST) {
            $this->load->model("admin_model");
            $this->load->library("utils");
            $cadastro = array();
            foreach ($_POST as $key => $value) {
                $cadastro[$key] = $value;
            }

            foreach ($_FILES as $key => $value) {
                if ($value["error"] > 0) {
                    continue;
                }
                $cadastro[$key] = Utils::upload_image($_FILES[$key], "./public/assets/images/");
            }

            $this->admin_model->addImagem($cadastro);
            redirect('/admin');
        }
        $data["configuracoes"] = $this->configuracoes;
        if (!isset($_SESSION["login"])) {
            $this->load->view("login", $data);
            redirect('/admin');
        }

        $this->loadView("cadastro", $data);
    }

    public function remove()
    {
        $this->load->model("admin_model");
        $this->admin_model->removeImagem($_GET["id"]);
        redirect('/admin');
    }

    public function configuracoes()
    {
        if ($_POST) {
            $this->load->model("admin_model");
            $this->load->library("utils");
            $update = array();
            foreach ($_POST as $key => $value) {
                $update[$key] = $value;
            }

            foreach ($_FILES as $key => $value) {
                if ($value["error"] > 0) {
                    continue;
                }
                $update[$key] = Utils::upload_image($_FILES[$key], "./public/assets/images/");
            }

            $this->admin_model->updateConfigs($update);
            redirect('/admin/configuracoes');
        }
        $data["configuracoes"] = $this->configuracoes;
        if (!isset($_SESSION["login"])) {
            $this->load->view("login", $data);
            redirect('/admin');
        }

        $this->loadView("configuracoes", $data);
    }

    public function logout()
    {
        session_destroy();
        redirect('/admin');
    }

    public function loadView($view, $data = [])
    {
        $this->load->view('templates/header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer', $data);
    }
}
