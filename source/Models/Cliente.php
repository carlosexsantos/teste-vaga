<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

Class Cliente extends DataLayer{

    public function __construct()
    {
        parent::__construct( "cliente", ["nome", "cpf_cnpj", "data_nascimento", "telefone"], "id_cliente", false);
    }

}