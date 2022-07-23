<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Cliente;

class ClienteApp
{

    private $view;
    
    public function __construct()
    {
        $this->view = Engine::create( __DIR__ . "/../../theme", "php" );
    }

    public function listaClientes(): void
    {

        $clientes = (new Cliente())->find()->fetch(true);

        echo $this->view->render("clientes/clientes", [
            "title" => "Clientes | " . SITE,
            "clientes" => $clientes
        ]);
    }

    public function clienteNovo(): void
    {
        echo $this->view->render("clientes/clienteNovo", [
            "title" => "Novo Cliente | " . SITE
        ]);
    }

    public function salvarCliente($data): void
    {
        $data['nome'] = strtoupper($data['nome']);
        $data['cpfCnpj'] = preg_replace("/\D/", "", $data['cpfCnpj']);
        $data['telefone'] = preg_replace("/\D/", "", $data['telefone']);
        $data['dataNascimento'] = date('Y-m-d', strtotime(str_replace("/", "-", $data['dataNascimento'])));
        
        $cliente = new Cliente();
        $cliente->nome = $data['nome'];
        $cliente->cpf_cnpj = $data['cpfCnpj'];
        $cliente->telefone = $data['telefone'];
        $cliente->data_nascimento = $data['dataNascimento'];
        $cliente->save();

        if($cliente->fail()){
            echo $cliente->fail()->getMessage();
        }else{
            header("Location: " . url("cliente"));
        }


    }

}