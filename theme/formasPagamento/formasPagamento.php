<?php $v->layout("_theme"); ?>

<div class="clearfix">
    
    <a href="<?= url("formaPagamento/novo"); ?>">
        <button type="button" class="btn btn-primary float-end">+ Novo</button>
    </a>
    <h2>Formas de Pagamento</h2>
</div>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php if($formasPagamento): 
                foreach($formasPagamento as $formaPagamento):
                ?>
            <tr>
                <td><?= $formaPagamento->id_forma_pagamento; ?></td>
                <td><?= $formaPagamento->desc_forma_pagamento; ?></td>
            </tr>
            <?php endforeach;
            else: ?>
            <tr>
                <td colspan=2>Nenhum produto encontrado...</td>
            </tr>
            <?php endif; ?>

        </tbody>
    </table>
</div>

<?php $v->start("scripts"); ?>

    <script>

    </script>

<?php $v->end(); ?>