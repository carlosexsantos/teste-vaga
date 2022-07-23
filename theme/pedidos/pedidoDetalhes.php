<?php $v->layout("_theme"); ?>

<h2>Detalhes do Pedido</h2>
<br>
<p><strong>Código:</strong> <?= $pedido->id_pedido; ?></p>
<p><strong>Nome do Cliente:</strong> <?=$pedido->nome_cliente; ?></p>
<p><strong>Forma de Pagamento:</strong> <?= $pedido->forma_pagamento; ?></p>
<p><strong>Itens:</strong></p>
<div>
    <table class="table table-borderless">
        <tr>
            <th>Código</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor</th>
            <th>Total</th>
        </tr>
        <?php 
        $total = 0;
        foreach($pedido->itens as $item): 
        $codProduto = array_search($item->id_produto, array_column($produtos, 'id_produto'));
        $total += $item->quantidade * $produtos[$codProduto]->data->preco;
        $totalItem = $item->quantidade * $produtos[$codProduto]->data->preco;
        ?>
        <tr>
            <td><?= $item->id_pedido_item; ?></td>
            <td><?= $produtos[$codProduto]->data->descricao ?></td>
            <td><?= $item->quantidade; ?></td>
            <td>R$ <?= number_format($produtos[$codProduto]->data->preco, 2, ",", "."); ?></td>
            <td>R$ <?= number_format($totalItem, 2, ",", "."); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<p><strong>Total do pedido:</strong> R$ <?= number_format($total, 2, ",", "."); ?></p>
<a href="<?= url("pedido") ?>"><button class="btn btn-primary">Voltar</button></a>
