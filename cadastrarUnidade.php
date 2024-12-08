
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./inserirDesafio.css">
    <title>Cadastrar unidade</title>
</head>
<body>
<?php 

include './header.php'
?>
    <main>
        <h2>Cadastrar unidade</h2>    
        <form action="cadastraUnidade.php" method="post">

            <div class="mb-3">
                <label for="nomeDesafio" class="form-label">Nome da unidade</label>
                <input type="text" class="form-control" name="nomeUnidade" id="nomeUnidade" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3">
                <label for="nomeDesafio" class="form-label">Login</label>
                <input type="number" class="form-control" name="login" id="login">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="senha" class="form-control" name="senha" id="senha">
            </div>
            
            <button type="submit" class="btn btn-success">Cadastrar unidade</button>

        </form>
    </main>
    
</body>
</html>