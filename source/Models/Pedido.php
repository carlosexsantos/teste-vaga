<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

Class Pedido extends DataLayer{

    public function __construct()
    {
        parent::__construct( "pedido", ["id_cliente", "id_forma_pagamento"], "id_pedido", false);
    }

    public function getItens(): Pedido
    {
        $this->itens = (new PedidoItem())->find("id_pedido = :idPedido", "idPedido=" . $this->id_pedido)->fetch(true);
        return $this;
    }

}