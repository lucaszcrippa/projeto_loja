<?php

class Pedido {
    private $id;
    private $cliente;

    public function __construct($id, $cliente) {
        $this->id = $id;
        $this->cliente = $cliente;
    }

    public function getId() {
        return $this->id;
    }

    public function getCliente() {
        return $this->cliente;
    }
}