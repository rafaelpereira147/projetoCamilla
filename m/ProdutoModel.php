<?php

namespace m;

use m\BD;
class ProdutoModel
{
    private $db;

    public function __construct()
    {
        //Instancia a classe
        $this->db = new BD();
    }

    public function listaProdutosAtivos($ativo)
    {
        //Consulta produtos
        $sql = "SELECT * FROM produtos WHERE ativo = :ativo";
        $params = [
            ':ativo' => $ativo
        ];
        return $this->db->fetchAll($sql, $params);
    }

    public function detalhaProduto($id)
    {
        //Consulta e retorno
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $params = [
            ':id' => $id
        ];
        return $this->db->fetch($sql, $params);

    }
}