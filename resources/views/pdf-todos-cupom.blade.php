<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PDF - santa carga</title>
</head>
<body>
<p>
<div class="row">
    <strong>Data: <?= date('d/m/Y H:i') ?></strong>
</div>

</p>
<p class="text-center" style="margin-top: 20px"><strong>Cupons</strong></p>
<hr>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Cupom</th>
        <th scope="col">Desconto(%)</th>
        <th scope="col">Data criação</th>
        <th scope="col">Data encerramento</th>
        <th scope="col">Afiliado</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($cupons as $c) {
        foreach ($afiliado as $a) {
            if($c->afiliado == $a->id) {
    ?>
    <tr class="table-active">
        <th scope="row"><?= $c->nome ?></th>
        <td><?= $c->desconto ?></td>
        <td><?= date('d/m/Y', strtotime($c->data_criacao)) ?></td>
        <td><?= date('d/m/Y', strtotime($c->data_encerrar)) ?></td>
        <td><?= $a->nome ?></td>
    </tr>
    <?php }}} ?>


    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>
