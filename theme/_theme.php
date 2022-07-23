<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= url("theme/src/bootstrap.min.css"); ?>" rel="stylesheet" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body>
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="<?= url(""); ?>" class="nav-link" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="<?= url("cliente"); ?>" class="nav-link">Clientes</a></li>
                <li class="nav-item"><a href="<?= url("produto"); ?>" class="nav-link">Produtos</a></li>
                <li class="nav-item"><a href="<?= url("pedido"); ?>" class="nav-link">Pedidos</a></li>
                <li class="nav-item"><a href="<?= url("formaPagamento"); ?>" class="nav-link">Forma de Pagamento</a></li>
            </ul>
        </header>
    </div>
    <main>
        <div class="container">
            <?= $v->section("content"); ?>

        </div>
    </main>
    <script src="<?= url("theme/src/jquery.min.js") ?>"></script>
    <script src="<?= url("theme/src/jquery.mask.js") ?>"></script>
    <?= $v->section("scripts"); ?>
</body>
</html>