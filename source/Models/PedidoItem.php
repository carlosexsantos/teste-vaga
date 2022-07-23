<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

Class PedidoItem extends DataLayer{

    public function __construct()
    {
        parent::__construct( "pedido_item", ["id_pedido", "id_produto", "quantidade"], "id_pedido_item", false);
    }

}