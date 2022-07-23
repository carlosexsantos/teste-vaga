<?php $v->layout("_theme"); ?>

<h2>Novo Produto</h2>

<div class="row g-5">
      <div class="col-md-7 col-lg-9">
        <form action="<?= url("produto/novo"); ?>" method="POST" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="descricao" class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control" id="descricao" placeholder="" value="" maxlength=30 required="">
            </div>

            <div class="col-6">
              <label for="unidadeMedida" class="form-label">Unidade de Medida</label>
                <input type="text" name="unidadeMedida" class="form-control" id="unidadeMedida" required="">
            </div>

            <div class="col-6">
              <label for="preco" class="form-label">Preço</label>
              <input type="text" name="preco" class="form-control" maxlength=10 id="preco">
            </div>

          <hr class="my-4">
          <div class="col-3">
          <a href="<?= url("produto"); ?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
          <button class="btn btn-success" type="submit">Salvar</button>
            </div>
        </form>
      </div>
    </div>

<?php $v->start("scripts"); ?>

<script>
  $('#preco').mask('#.##0,00', {reverse: true});
</script>

<?php $v->end(); ?>