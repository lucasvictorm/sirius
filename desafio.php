<?php include "./conexao.php";
    $desafio_id = $_GET["id"];
    $sql = mysqli_fetch_assoc(mysqli_query($conexao,
    "SELECT nome from desafios where id = $desafio_id"));

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio</title>
</head>
<body>
    <h1><?=$sql['nome']?></h1>
    <form action="concluir.php" enctype="multipart/form-data" method="post" >
        <input type="hidden" name="desafio_id" value=<?=$desafio_id?>>
        <label for="foto">Enviar foto</label>
        <br>
        <input type="file" name="foto" id="foto">
        <br>
        <label for="relatorio">Relatório</label>
        <textarea name="relatorio" id="relatorio" cols="60" rows="10"></textarea>

        <input type="submit" value="Enviar">

    </form>

    
</body>
</html>