<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Produto;

class ProdutoApp
{

    private $view;
    
    public function __construct()
    {
        $this->view = Engine::create( __DIR__ . "/../../theme", "php" );
    }

    public function listaProdutos(): void
    {
        $produtos = (new Produto)->find()->fetch(true);

        echo $this->view->render("produtos/produtos", [
            "title" => "Produtos | " . SITE,
            "produtos" => $produtos
        ]);
    }

    public function produtoNovo(): void
    {
        echo $this->view->render("produtos/produtoNovo", [
            "title" => "Novo Produto | " . SITE
        ]);
    }

    public function salvarProduto($data): void
    {
        $data['descricao'] = strtoupper($data['descricao']);
        $data['unidadeMedida'] = strtoupper($data['unidadeMedida']);
        $data['preco'] = str_replace(",", ".", str_replace(".", "", $data['preco']));

        $produto = new Produto();
        $produto->descricao = $data['descricao'];
        $produto->unidade_medida = $data['unidadeMedida'];
        $produto->preco = $data['preco'];
        $produto->save();

        if($produto->fail()){
            echo $produto->fail()->getMessage();
        }else{
            header("Location: " . url("produto"));
        }

    }

}