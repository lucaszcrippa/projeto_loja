<?php

class Database {
    private $host = "localhost";
    private $db = "projeto_loja2";
    private $user = "root";
    private $pass = "";

    public function conectar() {
        try {
            return new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}