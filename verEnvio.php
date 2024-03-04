<?php 
    include "./conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio</title>
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
    <h1>Desafio</h1>
    <h2><?=$dados['nome_desafio']?></h2>
    <p>Autor: <?=$dados['nome_unidade']?></p>

    <img src="<?=$dados['path_img']?>" alt="" width="200px">
    <div>
        <p>Relatório</p>
        <p><?=$dados['relatorio']?></p>
    </div>
    <form action="aprovar.php" method="post">
        <input type="hidden" name="uid" value="<?=$unidadeId?>">
        <input type="hidden" name="did" value="<?=$desafioId?>">
        <input type="hidden" name="pontos" value="<?=$dados['pontos']?>">
        <input type="hidden" name="pontosUnidade" value="<?=$dados['pontos_unidade']?>">
        <input type="submit" value="Aprovar">
    </form>
    <form action="reprovar.php" method="post">
        <input type="hidden" name="uid" value="<?=$unidadeId?>">
        <input type="hidden" name="did" value="<?=$desafioId?>">
        
        <input type="submit" value="Reprovar">
    </form>
    
    
</body>

</html>