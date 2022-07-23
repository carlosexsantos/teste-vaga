<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\FormaPagamento;

class FormaPagamentoApp
{

    private $view;
    
    public function __construct()
    {
        $this->view = Engine::create( __DIR__ . "/../../theme", "php" );
    }

    public function listaFormasPagamento(): void
    {
        $formasPagamento = (new FormaPagamento)->find()->fetch(true);

        echo $this->view->render("formasPagamento/formasPagamento", [
            "title" => "Formas de Pagamento | " . SITE,
            "formasPagamento" => $formasPagamento
        ]);
    }

    public function formaPagamentoNovo(): void
    {
        // echo "teste";
        echo $this->view->render("formasPagamento/formaPagamentoNovo", [
            "title" => "Nova Forma de Pagamento | " . SITE
        ]);
    }

    public function salvarFormaPagamento($data): void
    {
        $data['descricao'] = strtoupper($data['descricao']);

        $formaPagamento = new FormaPagamento();
        $formaPagamento->desc_forma_pagamento = $data['descricao'];
        $formaPagamento->save();

        
        if($formaPagamento->fail()){
            echo $formaPagamento->fail()->getMessage();
        }else{
            header("Location: " . url("formaPagamento"));
        }
    }

}