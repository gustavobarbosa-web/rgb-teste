<?php

class Home_model extends CI_Model
{
    public function getImages()
    {
        try {
            $filter = array("deleted_at" => NULL);
            $query = $this->db->where($filter)->get('galeria');
            if (!$query) {
                throw new Exception("Ocorreu um erro ao buscar as imagens");
            }
            return $query->result();
        } catch (Exception $err) {
            return array("error" => $err->getMessage());
        }
    }
}
