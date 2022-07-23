<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

Class Produto extends DataLayer{

    public function __construct()
    {
        parent::__construct( "produto", ["descricao", "unidade_medida", "preco"], "id_produto", false);
    }

}