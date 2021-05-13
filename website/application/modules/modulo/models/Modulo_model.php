<?php

class Modulo_model extends CI_Model
{
    public function getModulos()
    {
        $query = $this->db->get('task', 10);
        return $query->result();
    }
}
