<?php $v->layout("_theme"); ?>

<h2>Início</h2>

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Dados</th>
              <th scope="col">Quantidade</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Clientes</td>
              <td><?= $qtdClientes; ?></td>
            </tr>
            <tr>
              <td>Produtos</td>
              <td><?= $qtdProdutos; ?></td>
            </tr>
            <tr>
              <td>Pedidos</td>
              <td><?= $qtdPedidos; ?></td>
            </tr>
            <tr>
              <td>Formas de pagamento</td>
              <td><?= $qtdFormasPagamento; ?></td>
            </tr>
          </tbody>
        </table>
      </div>