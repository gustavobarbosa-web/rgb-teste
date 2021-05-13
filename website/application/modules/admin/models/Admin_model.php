<?php

class Admin_model extends CI_Model
{
    public function getUsuario($usuario)
    {
        try {
            $filter = array("login" => $usuario, "deleted_at" => NULL);
            $query = $this->db->where($filter)->get('usuarios');
            if (!$query) {
                throw new Exception("Ocorreu um erro ao buscar as configurações");
            }
            return $query->row();
        } catch (Exception $err) {
            return array("error" => $err->getMessage());
        }
    }

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

    public function addImagem($cadastro)
    {
        try {
            $data = array(
                'imagem' => $cadastro["imagem"],
                'desc_curta' => $cadastro["desc_curta"],
                'desc_longa' => $cadastro["desc_longa"],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );

            $this->db->insert('galeria', $data);
        } catch (Exception $err) {
            return array("error" => $err->getMessage());
        }
    }

    public function removeImagem($id)
    {
        try {
            $this->db->where('id', $id);
            $data = array(
                'deleted_at' => date("Y-m-d H:i:s"),
            );

            return $this->db->update('galeria', $data);
        } catch (Exception $err) {
            return array("error" => $err->getMessage());
        }
    }

    public function updateConfigs($update)
    {
        try {
            foreach ($update as $nome => $valor) {
                $this->db->where('nome', $nome);
                $data = array(
                    'valor' => $valor,
                );

                $this->db->update('configuracoes', $data);
            }
            return true;
        } catch (Exception $err) {
            return array("error" => $err->getMessage());
        }
    }
}
