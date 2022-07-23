<?php $v->layout("_theme"); ?>

<h2>Novo Pedido</h2>

<div class="row g-5">
  <div class="col-md-7 col-lg-12">
    <form action="<?= url("pedido/novo"); ?>" method="POST" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-sm-12">
          <label for="cliente" class="form-label">Cliente</label>
          <select name="cliente" class="form-select" required>
            <option value selected>Selecionar Cliente...</option>
            <?php if($clientes):
              foreach($clientes as $cliente): ?>
            <option value="<?= $cliente->id_cliente; ?>"><?= $cliente->nome; ?></option>
              <?php endforeach;
            endif; ?>
          </select>
        </div>

        <div class="col-sm-6">
          <label for="formaPagamento" class="form-label">Forma de pagamento</label>
          <select name="formaPagamento" class="form-select" required>
            <option value selected>Selecionar forma de pagamento...</option>
            <?php if($formasPagamento):
              foreach($formasPagamento as $formaPagamento): ?>
            <option value="<?= $formaPagamento->id_forma_pagamento; ?>"><?= $formaPagamento->desc_forma_pagamento; ?></option>
              <?php endforeach;
            endif; ?>
          </select>
        </div>

        <hr>
        <div class="col-sm-2">
          <button id="adicionar" class="btn btn-success" type="button">+ Adicionar</button>
        </div>
        <br>
        <div class="produtos">
          <div class="produtos_produto_1 row">
            <div class="col-sm-6">
              <label for="produto" class="form-label">Produto</label>
              <select name="produto[]" onchange="informaPreco(this);" class="form-select produto" data-id=1 required>
                <option value selected>Selecionar Produto...</option>
                <?php if($produtos):
                  foreach($produtos as $produto): ?>

                <option value="<?= $produto->id_produto; ?>"><?= $produto->descricao; ?> <small>(<?= $produto->unidade_medida ?>)</small></option>
                <?php endforeach;
                endif; ?>
              </select>
            </div>

            <div class="col-sm-2">
              <label for="preco" class="form-label">Preço</label>
              <input type="text" name="preco[]" class="form-control preco" data-id=1 disabled>
            </div>

            <div class="col-sm-2">
              <label for="quantidade" class="form-label">Quantidade</label>
              <input type="text" name="quantidade[]" onkeyup="calculaTotal();" class="form-control quantidade" data-id=1 required>
            </div>
          </div>
        </div>


      </div>

      
      <div>
        <label>Total: R$ <span id="totalPedido">0,00</span></label>
      </div>

      <hr class="my-4">
      <div class="col-3">
        <a href="<?= url("pedido"); ?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
        <button class="btn btn-success" type="submit">Salvar</button>
      </div>
    </form>
  </div>
</div>

<?php $v->start("scripts"); ?>

<script>

  let cont= 1;

  var precosProduto = []; 
    <?php if($produtos):
      foreach($produtos as $produto): ?>
    precosProduto["<?= $produto->id_produto; ?>"] = <?= $produto->preco; ?>;
    <?php endforeach; 
    endif; ?>

  function informaPreco(item) {
    let codigoColuna = $(item).attr("data-id");
    let codigoProduto = $(item).val();
    let valorProduto = (codigoProduto) ? precosProduto[codigoProduto].toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) : "";
    $("input[name='preco[]'][data-id=" + codigoColuna + "]").val(valorProduto);

    calculaTotal();
  }

  function remover(elemento) {
    let indice = elemento.getAttribute("data-id");
    $(".produtos_produto_" + indice).remove();

    calculaTotal();
  }

  function calculaTotal() {
    let total = 0;
    var produtos = document.querySelectorAll(".produtos > *");    
    produtos.forEach(function(e) {
      let indice = e.querySelector(".produto").getAttribute("data-id");
      let produto = $("select[name='produto[]'][data-id=" + indice + "]").val();
      let quantidade = $("input[name='quantidade[]'][data-id=" + indice + "]").val();
      let preco = precosProduto[produto];
      if(produto && quantidade){
        total += quantidade * preco
      }
      console.log("quantidade: " + quantidade + "\npreco: " + preco);
    });
    $("span#totalPedido").html(total.toLocaleString('pt-br', {minimumFractionDigits: 2}));
  }
  
  $("#adicionar").on("click", function () {
    cont++;
    var novoProduto = '<div class="produtos_produto_' + cont + ' row">';
    novoProduto += '<div class="col-sm-6">';
    novoProduto += '<label for="produto" class="form-label">Produto</label>';
    novoProduto += '<select name="produto[]" onchange="informaPreco(this);" class="form-select produto" data-id=' + cont + ' required>';
    novoProduto += '<option value selected>Selecionar Produto...</option>';
    <?php if($produtos):
      foreach($produtos as $produto): ?>
    novoProduto += '<option value="<?= $produto->id_produto; ?>"><?= $produto->descricao; ?> <small>(<?= $produto->unidade_medida ?>)</small></option>';
    <?php endforeach;
    endif; ?>
    novoProduto += '</select>';
    novoProduto += '</div>';
    novoProduto += '<div class="col-sm-2">';
    novoProduto += '<label for="preco" class="form-label">Preço</label>';
    novoProduto += '<input type="text" name="preco[]" class="form-control preco" data-id=' + cont + ' disabled>';
    novoProduto += '</div>';
    novoProduto += '<div class="col-sm-2">';
    novoProduto += '<label for="quantidade" class="form-label">Quantidade</label>';
    novoProduto += '<input type="text" name="quantidade[]" class="form-control quantidade" onkeyup="calculaTotal();" data-id=' + cont + ' required>';
    novoProduto += '</div>';
    novoProduto += '<div class="col-sm-2">';
    novoProduto += '<button class="btn btn-danger mt-4" type="button" data-id=' + cont + ' onclick="remover(this)">- Remover</button>';
    novoProduto += '</div>';
    novoProduto += '</div>';

    $("div.produtos").append(novoProduto);

  });



  $("input[name=quantidade]").on('change', function() {
    calculaTotal();
  })


</script>

<?php $v->end(); ?>