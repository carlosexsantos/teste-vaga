<?php $v->layout("_theme"); ?>

<h2>Nova Forma de Pagamento</h2>

<div class="row g-5">
  <div class="col-md-7 col-lg-9">
    <form action="<?= url("formaPagamento/novo"); ?>" method="POST" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-sm-12">
          <label for="descricao" class="form-label">Descrição</label>
          <input type="text" name="descricao" class="form-control" id="descricao" placeholder="" value="" maxlength=30 required="">
        </div>
      </div>
      <hr class="my-4">
      <div class="col-3">
        <a href="<?= url("formaPagamento"); ?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
        <button class="btn btn-success" type="submit">Salvar</button>
      </div>
    </form>
  </div> 
</div>