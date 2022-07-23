<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Cliente;
use Source\Models\Pedido;
use Source\Models\Produto;
use Source\Models\FormaPagamento;

class Web
{

    private $view;
    
    public function __construct()
    {
        $this->view = Engine::create( __DIR__ . "/../../theme", "php" );
    }

    public function home(): void
    {
        $qtdClientes = (new Cliente)->find()->count();
        $qtdProdutos = (new Produto)->find()->count();
        $qtdPedidos = (new Pedido)->find()->count();
        $qtdFormasPagamento = (new FormaPagamento)->find()->count();

        echo $this->view->render("home", [
            "title" => "Início | " . SITE,
            "qtdClientes" => $qtdClientes,
            "qtdProdutos" => $qtdProdutos,
            "qtdPedidos" => $qtdPedidos,
            "qtdFormasPagamento" => $qtdFormasPagamento
        ]);
    }

    public function error($data): void
    {
        echo "ERRO {$data['errcode']}";
    }

}