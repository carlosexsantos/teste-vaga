<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Cliente;
use Source\Models\FormaPagamento;
use Source\Models\Produto;
use Source\Models\Pedido;
use Source\Models\PedidoItem;

class PedidoApp
{

    private $view;
    
    public function __construct()
    {
        $this->view = Engine::create( __DIR__ . "/../../theme", "php" );
    }

    public function listaPedidos(): void
    {
        $pedidos = (new Pedido)->find()->fetch(true);
        $pedidosItens = (new PedidoItem)->find()->fetch(true);
        $clientes = (new Cliente)->find()->fetch(true);
        $formasPagamento = (new FormaPagamento)->find()->fetch(true);
        $produtos = (new Produto)->find()->fetch(true);

        echo $this->view->render("pedidos/pedidos", [
            "title" => "Pedidos | " . SITE,
            "pedidos" => $pedidos,
            "pedidosItens" => $pedidosItens,
            "clientes" => $clientes,
            "formasPagamento" => $formasPagamento,
            "produtos" => $produtos
        ]);
    }

    public function pedidoNovo(): void
    {
        $clientes = (new Cliente)->find()->fetch(true);
        $formasPagamento = (new FormaPagamento)->find()->fetch(true);
        $produtos = (new Produto)->find()->fetch(true);
        
        echo $this->view->render("pedidos/pedidoNovo", [
            "title" => "Novo Pedido | " . SITE,
            "clientes" => $clientes,
            "formasPagamento" => $formasPagamento,
            "produtos" => $produtos
        ]);
    }

    public function salvarPedido($data)
    {
        $pedido = new Pedido();
        $pedido->id_cliente = $data['cliente'];
        $pedido->id_forma_pagamento = $data['formaPagamento'];
        $id_pedido = $pedido->save();

        if($pedido->fail()){
            echo $pedido->fail()->getMessage();
            return;
        }

        foreach ($data["produto"] as $key => $produto) {
            $pedidoItem = new PedidoItem();
            $pedidoItem->id_pedido = $id_pedido;
            $pedidoItem->id_produto = $produto;
            $pedidoItem->quantidade = $data["quantidade"][$key];
            $pedidoItem->save();

            if($pedido->fail()){
                echo $pedido->fail()->getMessage();
                break;
            }
        }

        header("Location: " . url("pedido"));
    }

    public function detalhesPedido($data): void
    {
        
        $pedido = (new Pedido)->findById($data['id']);
        $cliente = (new Cliente)->findById($pedido->id_pedido) ;
        $pedidoItens = (new PedidoItem)->find("id_pedido = :idPedido", "idPedido=".$pedido->id_pedido)->fetch(true);
        $formaPagamento  =(new FormaPagamento)->findById($pedido->id_forma_pagamento);
        $produtos = (new Produto)->find()->fetch(true);
        
        
        $pedido->nome_cliente = $cliente->nome;
        $pedido->forma_pagamento = $formaPagamento->desc_forma_pagamento;
        $pedido->itens = $pedidoItens;

        echo $this->view->render("pedidos/pedidoDetalhes", [
            "title" => "Detalhes do Pedido | " . SITE,
            "data" => $data,
            "pedido" => $pedido,
            "produtos" => $produtos
        ]);
    }

}