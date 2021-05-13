<?php

class Configuracoes_model extends CI_Model
{
    public function getConfigs()
    {
        try {
            $query = $this->db->get('configuracoes');
            if (!$query) {
                throw new Exception("Ocorreu um erro ao buscar as configurações");
            }
            return $query->result();
        } catch (Exception $err) {
            return array("error" => $err->getMessage());
        }
    }
}
