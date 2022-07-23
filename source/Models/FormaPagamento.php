<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

Class FormaPagamento extends DataLayer{

    public function __construct()
    {
        parent::__construct( "forma_pagamento", ["desc_forma_pagamento"], "id_forma_pagamento", false);
    }

}