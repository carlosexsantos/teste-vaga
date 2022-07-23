<?php $v->layout("_theme"); ?>

<div class="clearfix">
    
    <a href="<?= url("produto/novo"); ?>">
        <button type="button" class="btn btn-primary float-end">+ Novo</button>
    </a>
    <h2>Produtos</h2>
</div>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Descrição</th>
                <th scope="col">Unidade de Medida</th>
                <th scope="col text-end">Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php if($produtos): 
                foreach($produtos as $produto):
                ?>
            <tr>
                <td><?= $produto->id_produto; ?></td>
                <td><?= $produto->descricao; ?></td>
                <td><?= $produto->unidade_medida; ?></td>
                <td>R$ <?= number_format($produto->preco, 2, ',', '.'); ?></td>
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

<?php $v->start("scripts"); ?>

    <script>

    </script>

<?php $v->end(); ?>