<?php $v->layout("_theme"); ?>

<div class="clearfix">
    
    <a href="<?= url("pedido/novo"); ?>">
        <button type="button" class="btn btn-primary float-end">+ Novo</button>
    </a>
    <h2>Pedidos</h2>
</div>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Cliente</th>
                <th scope="col">Forma de Pagamento</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php if($pedidos): 
                foreach($pedidos as $pedido):
                $codCliente = array_search($pedido->id_cliente, array_column($clientes, 'id_cliente'));
                $codPagamento = array_search($pedido->id_forma_pagamento, array_column($formasPagamento, 'id_forma_pagamento'));
                $total = 0;
                
                foreach(($pedido->getItens()->data->itens) as $item){
                    $codProduto = array_search($item->id_produto, array_column($produtos, 'id_produto'));
                    $total += $item->quantidade * $produtos[$codProduto]->data->preco;
                }
                
                ?>
            <tr>
                <td><?= $pedido->id_pedido; ?></td>
                <td><?= $clientes[$codCliente]->data->nome; ?></td>
                <td><?= $formasPagamento[$codPagamento]->data->desc_forma_pagamento; ?></td>
                <td>R$ <?= number_format($total, 2, ",", "."); ?></td>
                <td class="text-end">
                    <a href="<?= url('pedido') . "/" . $pedido->id_pedido; ?>">
                        <u>Detalhes</u>
                    </a>
                </td>
            </tr>
            <?php endforeach;
            else: ?>
            <tr>
                <td colspan=4>Nenhum produto encontrado...</td>
            </tr>
            <?php endif; ?>

        </tbody>
    </table>
</div>
