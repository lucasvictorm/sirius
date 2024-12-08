<?php 
    include "./conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio</title>
    <link rel="stylesheet" href="verEnvio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php 
    $unidadeId = $_GET['uid'];
    $desafioId = $_GET['did'];

    $dados = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT e.path_img, e.relatorio, e.data_upload, u.pontos as 'pontos_unidade', u.nome as 'nome_unidade', desafios.nome as 'nome_desafio', desafios.pontos  FROM `enviados` e
    join unidades u on u.id = e.id_unidade
    join desafios on desafios.id = e.id_desafio
    where e.id_desafio = $desafioId and e.id_unidade = $unidadeId
    "));

?>
<body>

    <?php include "./header.php"?>

    <main>
        <div class="info_envio">
            <h1>Desafio:</h1>
            <h2><?=$dados['nome_desafio']?> - <?=$dados['pontos']?> Pts</h2>
            <p>Autor: <?=$dados['nome_unidade']?></p>
        </div>
        
        <div class="conteudo_envio">
            <img src="<?=$dados['path_img']?>" alt="" width="200px">
            <div class="relatorio_div">
                <p>Relatório</p>
                <p><?=$dados['relatorio']?></p>
            </div>
        </div>

        <div class="actions">

        
            <form action="aprovar.php" method="post">
                <input type="hidden" name="uid" value="<?=$unidadeId?>">
                <input type="hidden" name="did" value="<?=$desafioId?>">
                <input type="hidden" name="pontos" value="<?=$dados['pontos']?>">
                <input type="hidden" name="pontosUnidade" value="<?=$dados['pontos_unidade']?>">
                <button type="submit" class="btn btn-success">Aprovar</button>
            </form>
            <form action="reprovar.php" method="post">
                <input type="hidden" name="uid" value="<?=$unidadeId?>">
                <input type="hidden" name="did" value="<?=$desafioId?>">
                
                <button type="submit" class="btn btn-danger">Reprovar</button>
            </form>
        </div>
    </main>
    
</body>

</html>