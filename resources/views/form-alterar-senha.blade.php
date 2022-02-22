<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alterar senha</title>
</head>
<body>

<div style="background-color: #1c7acb; width: 100%; height: 50px; margin-bottom: 20px">
    <span style="color: white; margin-left: 10px;text-align: center; font-size: 20px">Aletar senha</span>
</div>

<div class="container-fluid">
    <form method="post" action="api/alterar-senha">
        <div class="form-group">
            <label for="exampleInputEmail1">Seu email</label>
            <input type="email" class="form-control"
                   placeholder="Informe seu email"
                   name="email"
                   id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group mt-3">
            <label for="exampleInputPassword1">Nova senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1"
                   name="senha"
                placeholder="Informe sua nova senha"
            >
        </div>
        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</div>



</body>
</html>
