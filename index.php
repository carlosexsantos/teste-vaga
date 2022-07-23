<?php

require_once __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router(ROOT);

$route->namespace("Source\App");

//Início
$route->group(null);
    $route->get("/", "Web:home");

//Cliente
$route->group("cliente");
    $route->get("/", "ClienteApp:listaClientes");
    $route->get("/novo", "ClienteApp:clienteNovo");
    $route->post("/novo", "ClienteApp:salvarCliente");

//Produto
$route->group("produto");
    $route->get("/", "ProdutoApp:listaProdutos");
    $route->get("/novo", "ProdutoApp:produtoNovo");
    $route->post("/novo", "ProdutoApp:salvarProduto");

//Forma de pagamento
$route->group("formaPagamento");
    $route->get("/", "FormaPagamentoApp:listaFormasPagamento");
    $route->get("/novo", "FormaPagamentoApp:formaPagamentoNovo");
    $route->post("/novo", "FormaPagamentoApp:salvarFormaPagamento");

//Pedido
$route->group("pedido");
    $route->get("/", "PedidoApp:listaPedidos");
    $route->get("/{id}", "PedidoApp:detalhesPedido");
    $route->get("/novo", "PedidoApp:pedidoNovo");
    $route->post("/novo", "PedidoApp:salvarPedido");

//Erro
$route->group("erro");
    $route->get("/{errcode}", "Web:error");

$route->dispatch();

if($route->error()){
    var_dump($route);
    // $route->redirect("/erro/{$route->error()}");
}

