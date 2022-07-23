<?php $v->layout("_theme"); ?>

<h2>Novo Cliente</h2>

<div class="row g-5">
      <div class="col-md-7 col-lg-9">
       <form action="<?= url("cliente/novo"); ?>" method="POST" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="" maxlength=80 required="">
            </div>

            <div class="col-6">
              <label for="cpfCnpj" class="form-label">CPF/CNPJ</label>
                <input type="text" name="cpfCnpj" class="form-control" id="cpfCnpj" required="">
            </div>

            <div class="col-6">
              <label for="dataNascimento" class="form-label">Data de nascimento</label>
              <input type="text" name="dataNascimento" class="form-control" id="dataNascimento" required="">
            </div>

            <div class="col-6">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" name="telefone" class="form-control" id="telefone" required="">
            </div>
          <hr class="my-4">
          <div class="col-3">
          <a href="<?= url("cliente"); ?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
          <button class="btn btn-success" type="submit">Salvar</button>
            </div>
        </form>
      </div>
    </div>

<?php $v->start("scripts"); ?>

<script>

  var MascaraCpfCnpj = function (val) {
    return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
  },
  cpfCnpjpOptions = {
    onKeyPress: function(val, e, field, options) {
      field.mask(MascaraCpfCnpj.apply({}, arguments), options);
    }
  };

  var MascaraTelefone = function (val) {
    return val.replace(/\D/g, '').length <= 10 ? '(00)0000-00009' : '(00)0 0000-0000';
  },
  telefoneOptions = {
    onKeyPress: function(val, e, field, options) {
      field.mask(MascaraTelefone.apply({}, arguments), options);
    }
  };

  $('#dataNascimento').mask('00/00/0000');
  $('#telefone').mask(MascaraTelefone, telefoneOptions);
  $('#cpfCnpj').mask(MascaraCpfCnpj, cpfCnpjpOptions);



</script>

<?php $v->end(); ?>