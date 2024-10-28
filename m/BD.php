<?php

namespace m;

use PDO;

class BD
{

    /**
     * Strings de acesso ao banco
     * Quando for para a produção alterar essas variavies
     */
    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = '';
    private $bd = 'rabico';
    private $conn;

    //Conexão com o banco de dados
    public function conectar()
    {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->bd;
            $this->conn = new \PDO($dsn, $this->user, $this->pass);

            //Definindo o modo de erros para excessões
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Configura o modo charset UTF-8
            $this->conn->exec("set names utf8");
        } catch (\PDOException $e){
            echo 'Erro de conexão: ' . $e->getMessage();
        }
        return $this->conn;
    }

    //Método para realizar consultas
    public function query($sql, $params = [])
    {
        try {
            $statement = $this->conectar()->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (\PDOException $e){
            echo 'Erro na consulta: ' . $e->getMessage();
        }
    }

    //Método para retornar apenas um elemento
    public function fetch($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    //Método para buscar multiplos resultados
    public function fetchAll($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Método para inserir/atualizar/excluir
    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params);
    }
}