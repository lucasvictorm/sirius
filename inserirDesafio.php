
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./inserirDesafio.css">
    <title>Inserir desafio</title>
</head>
<body>
<?php 

include './header.php'
?>
    <main>
        <h2>Inserir desafio</h2>    
        <form action="insereDesafio.php">

            <div class="mb-3">
                <label for="nomeDesafio" class="form-label">Nome do desafio</label>
                <input type="text" class="form-control" value="nomeDesafio" id="nomeDesafio" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3">
                <label for="pontos" class="form-label">Pontuação</label>
                <input type="number" class="form-control" value="pontos" id="pontos">
            </div>

            <button type="submit" class="btn btn-success">Inserir Desafio</button>

        </form>
    </main>
    
</body>
</html>