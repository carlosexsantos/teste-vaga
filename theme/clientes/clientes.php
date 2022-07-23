<?php $v->layout("_theme"); ?>


<div class="clearfix">
    
    <a href="<?= url("cliente/novo"); ?>">
        <button type="button" class="btn btn-primary float-end">+ Novo</button>
    </a>
    <h2>Clientes</h2>
</div>

<?php 

function Mask($mask,$str){

$str = str_replace(" ","",$str);

for($i=0;$i<strlen($str);$i++){
    $mask[strpos($mask,"#")] = $str[$i];
}

return $mask;

}
?>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF/CNPJ</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php if($clientes): 
                foreach($clientes as $cliente):
                    ?>
                    <tr>
                        <td><?= $cliente->id_cliente; ?></td>
                        <td><?= $cliente->nome; ?></td>
                        <td><?= (strlen($cliente->cpf_cnpj) > 11) ? Mask("##.###.###/####-##",$cliente->cpf_cnpj) : Mask("###.###.###-##",$cliente->cpf_cnpj) ; ?></td>
                        <td><?= date("d/m/Y", strtotime($cliente->data_nascimento)); ?></td>
                        <td><?= (strlen($cliente->telefone) > 10) ? Mask("(##)# ####-####",$cliente->telefone) : Mask("(##)####-####",$cliente->telefone) ?></td>
                    </tr>
                <?php
                endforeach;
            else: ?>
            <tr>
                <td colspan=5>Nenhum cliente encontrado...</td>
            </tr>
            <?php endif; ?>

        </tbody>
    </table>
</div>